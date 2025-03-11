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
        Schema::create('player_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained('participants')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->date('birthyear')->nullable();
            $table->string('title')->nullable();
            $table->bigInteger('standard_rating')->nullable();
            $table->bigInteger('blitz_rating')->nullable();
            $table->bigInteger('rapid_rating')->nullable();
            $table->string('image_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_infos');
    }
};
