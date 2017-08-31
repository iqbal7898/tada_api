<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gift;
use App\order;
use App\purchase;
use App\program;
use Carbon\Carbon;
use Response;

class Egift extends Controller
{
    public function listAllGift(Request $req){
		$content = gift::all();
		$listgift = [];
		for($j = 0; $j < count($content); $j++){
			$listprograms = [];
			$c = $content[$j];
			$listprog = $c->programs;
			for($i = 0; $i < count(json_decode($listprog)); $i++){
				$b = program::where('programs_id',json_decode($listprog)[$i])->first();
				array_push($listprograms, [
						'program_id' => $b->programs_id,
						'program_name' => $b->program_name,
						'master_program' => $b->master_program,
						'item_name' => $b->item_name,
						'value' => $b->value,
						'term_condition' => $b->ter_condition,
						'image' => $b->image
					]);
			};
			array_push($listgift, [
					'brand' => $c->brand,
					'programs' => $listprograms
				]);
		};

        return json_encode($listgift);
  //       return $content;
	}

	public function purchaseNewGift(Request $req){
		$content = $req->getContent();
		$param = json_decode($content);
		$egiftcode = '11111111';
		$order = new order;
		$purchaselist = $param->purchases;
		$purchaseid = [];
		for($i = 0; $i < count($purchaselist); $i++){
			$program = program::where('programs_id', $purchaselist[$i]->program_id)->first();
			for($j = 0; $j < $purchaselist[$i]->quantity; $j++){
						$listpurchase = new purchase;
						$listpurchase->brand = $this->getBrandFromProgram($purchaselist[$i]->program_id);
						$listpurchase->egift_code = $egiftcode;
						$listpurchase->program_name = $program->program_name;
						$listpurchase->master_program = $program->master_program;
						$listpurchase->item_name = $program->item_name;
						$listpurchase->value = $program->value;
						$listpurchase->expired_date = Carbon::now(7)->addDays(json_encode($param->purchases[1]->expired_value))->toDateTimeString();
						$listpurchase->url = 'http://bit.ly/zzzz';
						$listpurchase->save();
						array_push($purchaseid, $listpurchase->id);
			}
		}

		$order->trx_time = Carbon::now(7)->toDateTimeString();
		$order->referral_code = $param->referral_code;
		$order->purchase_id = json_encode($purchaseid);
		$order->save();
		// $add = purchase::create($content);
        return json_encode($order);
	}

	public function getDetailOrder(Request $req, $order_number){
		// $content = ['GET Request', 'order number = '.$order_number];

		$content = order::where('trx_no', $order_number)->first();
		$purchase = $content->purchase_id;
		$printpurchase = [];
		for($i = 0; $i < count(json_decode($purchase)); $i++){
			$a = purchase::find(json_decode($purchase)[$i]);
			array_push($printpurchase , [
					'brand'=> $a->brand,
					'egift_code'=> $a->egift_code,
					'program_name'=> $a->program_name,
					'master_program'=> $a->master_program,
					'item_name'=> $a->item_name,
					'value'=> $a->value,
					'expired_date'=> $a->expired_date,
					'url'=> $a->url
				]); 
		}

		$print = [
			'trx_no'=> $content->trx_no,
			'trx_time'=> $content->trx_time,
			'referral_code'=> $content->referral_code,
			'purchases'=> $printpurchase
		];
        return json_encode($print);
	}

	public function getBrandFromProgram($programid){
		$content = gift::all();
		$listprograms = [];
		for($j = 0; $j < count($content); $j++){
			$c = $content[$j];
			$listprog = $c->programs;
			if(in_array($programid, json_decode($listprog))){
				return $c->brand;
			};
				
		};

		return null;
	}
}
