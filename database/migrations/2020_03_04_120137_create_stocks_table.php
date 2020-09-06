<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{

    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->string('address')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('phone_3')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean("type")->nullable();
            $table->unsignedBigInteger('user_id');
            $table->boolean('status')->default(false);
            $table->boolean('delete')->default(false);
            $table -> dateTime( 'date' ) ->default( DB ::raw( 'CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP' ) );


//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('country_id')->references('id')->on('countries');
//            $table->foreign('city_id')->references('id')->on('cities');


        });
    }

    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
