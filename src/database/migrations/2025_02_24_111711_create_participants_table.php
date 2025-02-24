<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->integer('accreditation_category_id')->nullable();
            $table->foreignId( 'tournament_id')->constrained('tournaments')->onDelete('cascade');
            $table->string('fide_id')->nullable()->unique();
            $table->string('first_name');                         
            $table->string('last_name')->nullable();                          // Familiya (pasportdagidek)
            $table->date('date_of_birth')->nullable();                        // Tug‘ilgan sana (YYYY-MM-DD)
            $table->enum('gender', ['M', 'F']);
            $table->string('passport_number')->unique()->nullable();          // Pasport seria
            $table->date('passport_issue_date')->nullable();                  // Pasport berilgan sana
            $table->date('passport_expiry_date')->nullable();                 // Pasport amal qilish muddati
            $table->string('passport_issuing_authority')->nullable();         // Pasportni bergan tashkilot
            $table->string('passport_copy')->nullable();                      // Pasport nusxasi (JPEG yoki PDF)
            $table->string('citizenship')->nullable();                        
            $table->bigInteger( 'country_id')->nullable();                                 // Fuqaroligi (mamlakati)
            $table->string('email');
            $table->dateTime('email_verified_at')->nullable();
            $table->string('phone')->nullable();                  
            $table->string('photo')->nullable();                                // Akkreditatsiya uchun rasm (JPEG)
            $table->boolean('requires_visa')->default(false);                   // Viza kerakmi? (Ha - 1 / Yo‘q - 0)
            $table->text('arrival_details')->nullable();                        // Kelish ma’lumotlari
            $table->text('departure_details')->nullable();                      // Ketish ma’lumotlari
            $table->text('accommodation_details')->nullable();                  // Mehmonxona va yashash ma’lumotlari
            $table->text('pcr_test_details')->nullable();                       // PCR testi ma’lumotlari
            $table->timestamps();
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
