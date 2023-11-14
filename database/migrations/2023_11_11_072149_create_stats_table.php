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
        Schema::create('player_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->decimal('acceleration')->nullable();
            $table->decimal('sprint_speed')->nullable();
            $table->decimal('vision')->nullable();
            $table->decimal('crossing')->nullable();
            $table->decimal('short_pass')->nullable();
            $table->decimal('finishing')->nullable();
            $table->decimal('shot_power')->nullable();
            $table->decimal('stamina')->nullable();
            $table->decimal('strength')->nullable();
            $table->decimal('aggression')->nullable();
            $table->decimal('sliding_tackle')->nullable();
            $table->decimal('interceptions')->nullable();
            $table->decimal('agility')->nullable();
            $table->decimal('ball_control')->nullable();
            $table->decimal('dribbling')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_stats');
    }
};
