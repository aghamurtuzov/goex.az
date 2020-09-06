<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        factory(App\Models\Country::class, 5)->create();
        factory(App\Models\City::class, 10)->create();
        factory(App\Models\Filial::class, 5)->create();
        factory(App\Models\Sms::class, 5)->create();
        factory(App\Models\SmsTemplate::class, 5)->create();
        factory(App\Models\Company::class, 5)->create();
        factory(App\Models\Tariff::class, 5)->create();
        factory(App\Models\Customer::class, 15)->create();
        factory(App\Models\Stock::class, 5)->create();
        factory(App\Models\Section::class, 5)->create();
        factory(App\Models\SubSection::class, 5)->create();
        factory(App\Models\Sack::class, 5)->create();
        factory(App\Models\Service::class, 5)->create();
        factory(App\Models\About::class, 5)->create();
        factory(App\Models\Faq::class, 5)->create();
        factory(App\Models\Condition::class, 5)->create();
        factory(App\Models\Contact::class, 5)->create();
        factory(App\Models\Slider::class, 5)->create();
        factory(App\Models\ForbiddenProduct::class, 5)->create();
        factory(App\Models\Information::class, 5)->create();
        factory(App\Models\Shop::class, 5)->create();
        factory(App\Models\Category::class, 5)->create();
        factory(App\Models\Address::class, 5)->create();

    }
}
