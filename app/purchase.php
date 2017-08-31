<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
	public $timestamps = false;
    protected $fillable = ['id', 'brand', 'egift_code', 'program_name', 'master_program', 'item_name', 'value', 'expired_date', 'url'];
}
