<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gift extends Model
{
	public $timestamps = false;
    protected $fillable = ['id', 'brand' => 'array', 'programs'];
}
