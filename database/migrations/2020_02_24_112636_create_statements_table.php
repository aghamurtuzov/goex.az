<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statements', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger("customer_id")->nullable();
			$table->unsignedBigInteger("balance_id")->nullable();
            $table->string("tracking_code")->nullable();
            $table->string("company")->nullable();
            $table->string("product")->nullable();
			$table->decimal("price")->nullable()->default(0);
			$table->decimal("quantity")->nullable()->default(0);
            $table->text("text")->nullable();
            $table->string("attachment")->nullable();
			$table->date("date")->nullable();
			$table->boolean("status")->nullable()->default(true);
            $table->boolean("delete")->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statements');
    }
}
