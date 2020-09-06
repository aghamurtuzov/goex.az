<?php

use App\Models\SmsTemplate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SmsTemplateTableSeeder extends Seeder
{

    public function run()
    {
        DB::table("sms_templates")->insert([
            [
                'message' => 'Salam hormetli musteri',
                'status' => true,
                'delete' => false,
            ]
        ]);

    }
}
