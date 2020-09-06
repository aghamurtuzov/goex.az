<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->boolean("type")->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('delete')->default(false);
            $table ->dateTime( 'date' ) ->default( DB ::raw( 'CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP' ) );


          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('section_id')->references('id')->on('sections');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_sections');
    }
}
