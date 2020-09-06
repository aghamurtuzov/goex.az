<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHistoriesTable extends Migration
{

    public function up()
    {
        Schema::create('order_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->text("text")->nullable();
            $table->integer('status')->default(false);
            $table->boolean('delete')->default(false);
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('stock_id')->references('id')->on('stocks');

        });

    }

    public function down()
    {
        Schema::dropIfExists('order_histories');
    }
}
