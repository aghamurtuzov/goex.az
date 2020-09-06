<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('situation')->nullable()->comment('1-Aktiv, 2-Problemli, 3-Geri qaytarılmış sifarişlər, 4-Bitmiş');
            $table->integer('confirmation')->nullable()->comment('operator_id');
            $table->integer('accepted')->nullable()->comment('operator_id');
            $table->integer('controls')->nullable()->comment('operator_id');
            $table->boolean('category')->nullable()->comment('1 -ci Müştəri özü aldığı sifarişlər , 2 -ci Bizim müştəriyə aldıgımız sifarişlər');
            $table->string('link')->nullable();
            $table->string('barcode')->nullable();
            $table->string('prodcut_name')->nullable();
            $table->integer('sack_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('follow_code')->nullable();
            $table->string('product_company')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('tracking_code')->nullable();
            $table->boolean('price_status')->nullable();
            $table->dateTime('publish_date')->nullable();
            $table->string('exchange')->nullable();
            $table->boolean('product_type')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('position')->nullable();
            $table->string('comment')->nullable();
            $table->double('product_price',10,2)->nullable();
            $table->double('delivery_price',10,2)->nullable();
            $table->double('width',10,2)->nullable();
            $table->double('length',10,2)->nullable();
            $table->double('weight',10,2)->nullable();
            $table->double('value',10,2)->nullable();
            $table->double('total_price',10,2)->nullable();
            $table->dateTime('receipt_date')->nullable();
            $table->boolean('is_edit')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
