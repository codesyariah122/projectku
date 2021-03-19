<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    protected $field=[];
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function new($field)
    {
        $this->field = $field;
        Schema::table('products', function(Blueprint $table){
            foreach($this->field as $dataField):
                $table->string($dataField);
            endforeach;
        });
    }

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });

        if(!Schema::hasColumn('products', 'name') && !Schema::hasColumn('products', 'description') && !Schema::hasColumn('products', 'price')){

            $newField = ['name', 'description', 'price'];
            $this->new($newField);
            
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
