<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $fillable = [
        'participant_id',
        'date',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }
}
