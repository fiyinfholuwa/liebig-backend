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
        Schema::create('gift_inventories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userid')->nullable();
            $table->string('reward_id')->nullable();
            $table->string('reward_name')->nullable();
            $table->string('reward_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_inventories');
    }
};
