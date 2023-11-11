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
        Schema::create('player_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rater_id');
            $table->foreign('rater_id')->references('id')->on('users');
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->decimal('pace')->nullable();
            $table->decimal('passing')->nullable();
            $table->decimal('shooting')->nullable();
            $table->decimal('physicality')->nullable();
            $table->decimal('defending')->nullable();
            $table->decimal('dribbling')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_ratings');
    }
};
