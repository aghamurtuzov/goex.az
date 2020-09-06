<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stock_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('delete')->default(false);
            $table ->dateTime( 'date' ) ->default( DB ::raw( 'CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP' ) );
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
        Schema::dropIfExists('sections');
    }
}
