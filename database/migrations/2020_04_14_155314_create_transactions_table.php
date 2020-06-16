<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB;
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
            $table->increments('id');
            $table->integer('additional_visa')->nullable();
            $table->integer('transaction_total');
            $table->enum('transaction_status', ['IN_CART', 'PENDING', 'SUCCESS', 'CANCEL', 'FAILED', 'CHALLENGE'])->nullable();
            $table->integer('travel_package_id');
            $table->integer('user_id');

            $table->softDeletes();
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