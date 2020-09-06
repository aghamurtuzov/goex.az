<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->boolean("gender")->nullable();
            $table->date("date_of_birth")->nullable();
            $table->string("address")->nullable();
            $table->unsignedBigInteger("filial_id")->nullable();
            $table->string("passport", 8)->nullable();
            $table->string("passport_fin", 7)->nullable();
            $table->string("phone")->nullable()->index();
            $table->date("date")->nullable();
            $table->string("email")->nullable();
            $table->string("password")->nullable();
            $table->boolean("status")->nullable()->default(true);
            $table->boolean("delete")->nullable()->default(false);
            $table->string("customer_code")->nullable()->unique();
            $table->decimal("discount")->nullable()->default(0);
            $table->boolean("type")->nullable();
            $table->rememberToken();

//            $table->foreign('filial_id')->references('id')->on('filials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
