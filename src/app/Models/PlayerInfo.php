<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerInfo extends Model
{
    protected $fillable = [
        'participant_id',
        'name',
        'birthyear',
        'title',
        'standard_rating',
        'blitz_rating',
        'rapid_rating',
        'image_file',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }
}
