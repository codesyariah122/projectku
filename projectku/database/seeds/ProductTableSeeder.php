<?php
use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date = date('Y-m-d H:i:s');
    	$data = [
    		'name'=>'Converse',
    		'created_at'=>$date,
    		'updated_at'=>NULL,
    		'description'=>'Cool life with converse',
    		'price'=> '250k'
    	];

    	$productData = new Product;
    	$productData->create('products', $data);

    }
}
