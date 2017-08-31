<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class program extends Model
{
	public $timestamps = false;
    protected $fillable = ['programs_id', 'program_name', 'master_program', 'item_name', 'value', 'ter_condition', 'image'];
}
