<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
	protected $fillable = [
		'name', 'description', 'price'
	];
	
    public function create($table, $data){
    	DB::table($table)->insertOrIgnore($data);
    }
}
