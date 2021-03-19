<?php

use App\Employee;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Employees');

        for($i=11; $i<=20; $i++){
        	DB::table('employees')->insert([
                'created_at'=> $faker->date($format='Y-m-d', $timezone='Asia/Jakarta').' | '.$faker->time($format='H:i:s', $timezone='Asia/Jakarta'),
                'updated_at'=> $faker->date($format='Y-m-d', $timezone='Asia/Jakarta').' | '.$faker->time($format='H:i:s', $timezone='Asia/Jakarta'),
        		'name' => $faker->name($gender='male'),
        		'email' => $faker->email(),
        		'jobdesk' => $faker->jobTitle()
        	]);
        }
        // $employee = new Employee;
        // $data = [
        //     'name' => 'Puji Ermanto',
        //     'email' => 'pujiermanto@gmail.com',
        //     'jobdesk' => 'Frontend Dev'
        // ];

        // $employee->create('employees', $data);
    }
}
