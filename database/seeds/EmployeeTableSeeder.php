<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'Superb',
            'address' => 'dirumah bapak emaknya',
            'age' => '22',
            'gender' => 'Pria',
            'email' => 'superb@email.com',
            'phonenumber' => '8474639292',
            'bornday' => '1991-09-01',
            'positions_id' => 1,
            'joined_at' => '2020-02-02',
            'status_id' => 1,
            'educations_id' => 1
        ]);
    }
}
