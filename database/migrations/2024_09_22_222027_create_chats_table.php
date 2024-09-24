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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->string('user_type', 100)->nullable();
            $table->text('image')->nullable();
            $table->string('userid', 100)->nullable();
            $table->string('modelId', 100)->nullable();
            $table->string('model_status', 100)->default('pending');
            $table->string('user_status', 100)->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
