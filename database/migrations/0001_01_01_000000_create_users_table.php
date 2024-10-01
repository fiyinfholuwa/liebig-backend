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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('user_type')->nullable();
            $table->string('interested_in')->nullable();
            $table->integer('coin_balance')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_image')->nullable(); // For storing the profile image
            $table->text('about_me')->nullable(); // For storing "About Me"
            $table->string('my_interest')->nullable(); // For storing Interests
            $table->string('address')->nullable(); // For storing Address
            $table->string('sexuality')->nullable(); // For storing Sexuality
            $table->string('eye_color')->nullable(); // For storing Eye Color
            $table->string('hair')->nullable(); // For storing Hair type
            $table->string('body_type')->nullable(); // For storing Body Type
            $table->string('spin_today')->nullable(); // For storing Body Type
            $table->string('height')->nullable(); // For storing Height
            $table->integer('ethnicity')->nullable(); // For storing Ethnicity as an integer
            $table->text('images')->nullable(); // For storing multiple images in JSON format
            $table->text('followed_models')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
