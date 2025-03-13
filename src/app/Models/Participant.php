<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Participant extends Model
{
    use HasHistory, SoftDeletes;
    protected $fillable = [
        // 'fide_id',
        // 'first_name',    // Ism (pasportdagidek)
        // 'country_id',                 // Fuqaroligi (mamlakati)
        // 'gender',        // Jins (Erkak - M / Ayol - F)
        // 'date_of_birth', // Tug‘ilgan sana (YYYY-MM-DD)

        'tournament_id',
        'fide_id',
        'first_name',    // Ism (pasportdagidek)
        'last_name',     // Familiya (pasportdagidek)
        'date_of_birth', // Tug‘ilgan sana (YYYY-MM-DD)
        'gender',        // Jins (Erkak - M / Ayol - F)
        'email',         // Elektron pochta
        'email_verified_at',

        'accreditation_category_id',
        'country_id',                 // Fuqaroligi (mamlakati)
        'passport_number',            // Pasport seria
        'passport_issue_date',        // Pasport berilgan sana
        'passport_expiry_date',       // Pasport amal qilish muddati
        'passport_issuing_authority', // Pasportni bergan tashkilot (Ichki ishlar vazirligi)
        'passport_copy',              // Pasport nusxasi (JPEG yoki PDF formatda yuklanishi kerak)
        'phone',                      // Telefon raqami
        'photo',                      // Akkreditatsiya uchun rasm (JPEG formatda)
        'requires_visa',              // Viza kerakmi? (Ha - 1 / Yo‘q - 0)
        'arrival_details',            // Kelish ma’lumotlari
        'departure_details',          // Ketish ma’lumotlari
        'accommodation_details',      // Mehmonxona va yashash ma’lumotlari
        'pcr_test_details',           // PCR testi ma’lumotlari
        'qk_code',
        'status',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'arrival_details'   => 'datetime',
        'departure_details' => 'datetime',
        'date_of_birth'     => 'date',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function accreditationCategory()
    {
        return $this->belongsTo(AccreditationCategory::class, 'accreditation_category_id');
    }
    public function presences()
    {
        return $this->hasMany(Presence::class, 'participant_id');
    }
    public function playerInfo()
    {
        return $this->hasOne(PlayerInfo::class, 'participant_id');
    }
    public function accommodation_detail()
    {
        return $this->belongsTo(Hotel::class, 'accommodation_details');
    }
}
