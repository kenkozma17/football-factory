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
            $table->integer('acceleration')->nullable();
            $table->integer('sprint_speed')->nullable();
            $table->integer('vision')->nullable();
            $table->integer('crossing')->nullable();
            $table->integer('short_pass')->nullable();
            $table->integer('finishing')->nullable();
            $table->integer('shot_power')->nullable();
            $table->integer('stamina')->nullable();
            $table->integer('strength')->nullable();
            $table->integer('aggression')->nullable();
            $table->integer('sliding_tackle')->nullable();
            $table->integer('interceptions')->nullable();
            $table->integer('agility')->nullable();
            $table->integer('ball_control')->nullable();
            $table->integer('dribbling')->nullable();
            $table->integer('overall_rating')->nullable();
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
