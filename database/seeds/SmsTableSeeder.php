<?php

use App\Models\Sms;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SmsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('sms')->insertGetId([
            'user_id' => 1,
            'type' => 1,
            'message' => 'Salam hormetli musteri',
            'status' => true,
            'delete' => false,
            'phone' => '055 746 31 60'
        ]);
    }
}
