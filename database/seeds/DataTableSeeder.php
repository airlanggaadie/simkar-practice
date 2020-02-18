<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'name' => 'Staff'
        ]);

        DB::table('status')->insert([
            'name' => 'Kontrak'
        ]);

        DB::table('educations')->insert([
            'name' => 'Graduated'
        ]);
    }
}
