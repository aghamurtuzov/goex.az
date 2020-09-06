<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_az')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tariff_id');
            $table->decimal("discount")->nullable()->default(0);
            $table->integer('is_fix_or_person');
            $table->time('start_time');
            $table->time('end_time');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean("status")->nullable()->default(true);
            $table->boolean("delete")->nullable()->default(false);

            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('tariff_id')->references('id')->on('tariffs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
