<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    public function show($table, $where)
    {
    	$data = DB::table($table)
    	->orderBy($where[0], $where[1])
    	->get();
    	return $data;
    }

    public function create($table, $data)
    {
    	DB::table($table)->insert([
    		$data
    	]);
    }
}
