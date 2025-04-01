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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('accreditation_category_id')->nullable();
            $table->foreignId('tournament_id')->constrained('tournaments')->onDelete('cascade');
            $table->string('fide_id')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['M', 'F']);
            $table->string('passport_number')->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('passport_issuing_authority')->nullable();
            $table->string('passport_copy')->nullable();
            $table->bigInteger('country_id')->nullable();
            $table->string('email');
            $table->dateTime('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('requires_visa')->default(false);
            $table->date('arrival_details')->nullable();
            $table->date('departure_details')->nullable();
            $table->text('accommodation_details')->nullable();
            $table->text('pcr_test_details')->nullable();
            $table->enum('status', ['unfinished', 'pending', 'approved', 'canceled'])->default('unfinished');
            $table->string('qk_code')->nullable();
            $table->string('qk_code_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
