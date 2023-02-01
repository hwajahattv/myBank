<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('amount_of_transaction');
            $table->unsignedBigInteger('transaction_type_id')->nullable();
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types');
            $table->timestamp('date_of_transaction');

            $table->unsignedBigInteger('utility_id')->nullable();
            $table->foreign('utility_id')->references('id')->on('utilities')->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('consumer_number')->nullable();

            $table->unsignedBigInteger('taccount_id')->nullable();
            $table->foreign('taccount_id')->references('id')->on('accounts')->cascadeOnDelete()->cascadeOnUpdate();

            $table->unsignedBigInteger('faccount_id');
            $table->foreign('faccount_id')->references('id')->on('accounts')->cascadeOnDelete()->cascadeOnUpdate();
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
};
