<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
			$table->string('name_az')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
			$table->string('slug_az')->nullable();
			$table->string('slug_ru')->nullable();
			$table->string('slug_en')->nullable();
            $table->boolean("status")->nullable()->default(true);
            $table->boolean("delete")->nullable()->default(false);
			$table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balances');
    }
}
