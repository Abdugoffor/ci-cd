<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'fide_id',
        'tournament_id',
        'first_name',                 // Ism (pasportdagidek)
        'last_name',                  // Familiya (pasportdagidek)
        'date_of_birth',              // Tug‘ilgan sana (YYYY-MM-DD)
        'gender',                     // Jins (Erkak - M / Ayol - F)
        'passport_number',            // Pasport yoki ID raqami
        'passport_issue_date',        // Pasport berilgan sana
        'passport_expiry_date',       // Pasport amal qilish muddati
        'passport_issuing_authority', // Pasportni bergan tashkilot (Ichki ishlar vazirligi)
        'passport_copy',              // Pasport nusxasi (JPEG yoki PDF formatda yuklanishi kerak)
        'citizenship',                // Fuqaroligi (O‘zbekiston, Rossiya va h.k.)
        'email',                      // Elektron pochta
        'phone',                      // Telefon raqami
        'photo',                      // Akkreditatsiya uchun rasm (JPEG formatda, oq fon)
        'requires_visa',              // Viza kerakmi? (Ha - 1 / Yo‘q - 0)
        'arrival_details',            // Kelish ma’lumotlari
        'departure_details',          // Ketish ma’lumotlari
        'accommodation_details',      // Mehmonxona va yashash ma’lumotlari
        'pcr_test_details',           // PCR testi ma’lumotlari
    ];

}
