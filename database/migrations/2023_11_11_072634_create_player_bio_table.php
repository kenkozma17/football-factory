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
        Schema::create('player_bios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('position')->nullable();
            $table->string('secondary_position')->nullable();
            $table->string('current_club')->nullable();
            $table->date('birthdate')->nullable();
            $table->decimal('height')->nullable();
            $table->decimal('weight')->nullable();
            $table->string('nationality')->nullable();
            $table->string('preferred_foot')->nullable();
            $table->string('current_school')->nullable();
            $table->string('graduation_year')->nullable();
            $table->string('highlights_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_public')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_bios');
    }
};
