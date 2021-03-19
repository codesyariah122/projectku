<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
    	$data = [
    		'title'=> 'Puji Ermanto | HomePage',
    		'products'=> Product::all()
    	];
        return view('test.index')->with($data);
    }
}
