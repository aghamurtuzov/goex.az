<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price',10,2)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('weight_text_az')->nullable();
            $table->string('weight_text_en')->nullable();
            $table->string('weight_text_ru')->nullable();
            $table->integer('type')->nullable();
            $table->integer('sort')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->decimal('start_weight',10,2);
            $table->decimal('end_weight',10,2);
            $table->boolean("status")->nullable()->default(true);
            $table->boolean("delete")->nullable()->default(false);

            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('country_id')->references('id')->on('countries');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariffs');
    }
}
