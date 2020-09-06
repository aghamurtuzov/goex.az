<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceHistoriesTable extends Migration
{

    public function up()
    {
        Schema::create('balance_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('balance_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('order_id');
            $table->text("content")->nullable();
			$table->decimal("price",10,2)->nullable();
            $table->integer('status')->nullable();
            $table->boolean('delete')->default(false);
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    public function down()
    {
        Schema::dropIfExists('balance_histories');
    }
}
