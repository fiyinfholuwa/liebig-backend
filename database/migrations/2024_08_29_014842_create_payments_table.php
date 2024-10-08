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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id', 50)->nullable();
            $table->string('amount', 50)->nullable();
            $table->string('user_email', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('payment_type', 50)->nullable();
            $table->string('gateway', 50)->nullable();
            $table->string('subscription_status', 50)->nullable();
            $table->string('credit_num', 50)->nullable();
            $table->string('referenceId', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
