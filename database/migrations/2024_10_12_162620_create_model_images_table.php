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
        Schema::create('model_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userid')->nullable();
            $table->text('image')->nullable();
            $table->text('image_type')->nullable();
            $table->text('amount')->nullable();
            $table->text('logged_users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_images');
    }
};
