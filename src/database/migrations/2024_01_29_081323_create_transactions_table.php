<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subscription_id')->unsigned();
            $table->string('payment_method');
            $table->integer('tax');
            $table->integer('discount');
            $table->integer('final_amount');
            $table->string('status');
            $table->string('ref_code')->nullable();
            $table->string('description')->nullable();
            $table->dateTime('time')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('subscription_id')->references('id')
                ->on('subscriptions')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
