<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSackHistoryTable extends Migration
{

	public function up()
	{
		Schema::create('sack_history', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('sack_id');
			$table->text('content')->nullable();
			$table->integer('position')->nullable();
			$table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

//            $table->foreign('sack_id')->references('id')->on('sacks');

		});

	}

	public function down()
	{
		Schema::dropIfExists('sack_history');
	}
}
