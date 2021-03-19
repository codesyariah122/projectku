<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    protected $field=[];

    public function new($tableName, $field)
    {
        $this->field = $field;
        Schema::table($tableName, function(Blueprint $table){
            foreach($this->field as $dataField):
                $table->string($dataField);
            endforeach;
        });
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });

         if(!Schema::hasColumn('employees', 'name') && !Schema::hasColumn('employees', 'email') && !Schema::hasColumn('employees', 'jobdesk')){
            $tableName = 'employees';
            $dataField = [
                "name",
                "email",
                "jobdesk"
            ];
            $this->new($tableName, $dataField);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
