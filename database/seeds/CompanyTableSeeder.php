<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanyTableSeeder extends Seeder
{

    public function run()
    {
        DB::table("companies")->insert([
            [
                'user_id' => 1,
                'tariff_id' => 1,
                'is_fix_or_person' => true,
                'start_time' => Date::now(),
                'end_time' => Date::now(),
                'start_date' => Date::now(),
                'end_date' => Date::now(),
                'name' => 'test',
                'discount' => 0,
                'status' => true,
                'delete' => false,
            ]
        ]);

    }
}
