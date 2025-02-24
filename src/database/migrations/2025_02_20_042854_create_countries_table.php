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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('code', 2);
            $table->unique('code');
            $table->string('code3', 3)->nullable();
            $table->string('codeNumeric', 4)->nullable();
            $table->string('domain', 4)->nullable();
            $table->string('label_nl', 75);
            $table->string('label_en', 75)->nullable();
            $table->string('label_de', 75)->nullable();
            $table->string('label_es', 75)->nullable();
            $table->string('label_fr', 75)->nullable();
            $table->string('postCode', 75)->nullable();
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
