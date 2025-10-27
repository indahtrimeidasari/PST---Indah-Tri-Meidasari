<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('shipping_phone');
            $table->string('email');
            $table->integer('quantity')->default(0);
            $table->bigInteger('total_price')->default(0);
            $table->string('payment_method');
            $table->string('delivery_method');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
