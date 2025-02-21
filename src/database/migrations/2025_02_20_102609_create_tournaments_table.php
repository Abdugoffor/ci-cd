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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->jsonb('name');
            $table->string('country', 3);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->dateTime('registration_start');
            $table->dateTime('registration_deadline');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('logo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
