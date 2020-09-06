<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSacksTable extends Migration
{

    public function up()
    {
        Schema::create('sacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stock_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->integer('position')->nullable();
            $table->boolean("type")->nullable();
			$table->boolean('is_full')->default(false);
            $table->boolean('status')->default(false);
            $table->boolean('delete')->default(false);
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('stock_id')->references('id')->on('stocks');

        });

    }

    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
