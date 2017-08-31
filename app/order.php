<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
	public $timestamps = false;
    protected $fillable = ['trx_no', 'trx_time', 'referral_code', 'purchase_id' => 'array'];
}
