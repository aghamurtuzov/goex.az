<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerCompaniesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_companies', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
			$table->string('name_az')->nullable();
			$table->string('name_ru')->nullable();
			$table->string('name_en')->nullable();
			$table->integer('customer_type')->nullable();
			$table->integer('order_number')->nullable();
			$table->decimal("discount")->nullable()->default(0);
			$table->integer('is_free')->nullable();
			$table->integer('is_fix_or_person')->nullable();
			$table->boolean("status")->nullable()->default(true);
			$table->boolean("delete")->nullable()->default(false);
			$table->timestamps();

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
		Schema::dropIfExists('customer_companies');
	}
}
