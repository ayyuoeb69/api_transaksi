<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("customer_id");
            $table->foreign('customer_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->unsignedBigInteger("merchant_id");
            $table->foreign('merchant_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            // Opsi Payment -> Tunai / COD / Transfer Bank / GOPAY / Dana / OVO
            $table->string("payment");
            $table->integer("postal_fee");
            $table->integer("total_price");
            $table->string("status");
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
        Schema::dropIfExists('transactions');
    }
}
