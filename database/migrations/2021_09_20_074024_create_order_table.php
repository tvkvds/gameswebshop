<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('shipping_method_id')->constrained();
            $table->foreignId('payment_method_id')->constrained();
            $table->integer('shipping_address'); //connect?
            $table->integer('billing_address'); //connect?
            $table->text('user_note')->nullable();
            $table->enum('status', ['processing', 'awaiting delivery', 'delivered']);
            $table->integer('total_price');
            $table->integer('total_vat');
            $table->timestamps();
            $table->softdeletes();
       
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
