<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title_az')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ru')->nullable();
            $table->text('content_az')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_ru')->nullable();
            $table->string('image')->nullable();
            $table->string('view')->nullable();
            $table->string('category')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('delete')->default(false);
            $table ->date( 'date' ) ->nullable();
            $table ->string( 'date_between')->nullable();
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
        Schema::dropIfExists('information');
    }
}
