<?php

use Illuminate\Database\Seeder;
use App\Models\Tariff;
use Illuminate\Support\Facades\DB;

class TariffTableSeeder extends Seeder
{

    public function run()
    {
        DB::table("tariffs")->insert([
            'price' => 1,
            'user_id' => 1,
            'weight_text' => '5-10 kq (hər kq görə)',
            'status' => true,
            'delete' => false,
            'type' => 1,
            'sort' => 1,
            'country_id' => 1,
            'start_weight' => 1,
            'end_weight' => 1,

        ]);
    }
}
