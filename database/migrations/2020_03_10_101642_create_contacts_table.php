<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('phone')->nullable();
            $table->string('wp')->nullable();
            $table->string('email')->unique();
            $table->string('address_az')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_ru')->nullable();
            $table->string('work_date_az')->nullable();
            $table->string('work_date_en')->nullable();
            $table->string('work_date_ru')->nullable();
            $table->string('work_hour')->nullable();
            $table->boolean("status")->nullable()->default(true);
            $table->boolean("delete")->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
