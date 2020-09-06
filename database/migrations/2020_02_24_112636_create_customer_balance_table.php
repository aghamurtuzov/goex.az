<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_balance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("balance_id")->nullable();
            $table->unsignedBigInteger("customer_id")->nullable();
            $table->decimal("amount")->nullable()->default(0);

            $table->foreign('balance_id')->references('id')->on('balances');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_balance');
    }
}
