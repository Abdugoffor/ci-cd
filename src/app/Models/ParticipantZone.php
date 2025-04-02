<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParticipantZone extends Model
{
    protected $fillable = [
        'tournament_id',
        'participant_id',
        'zone_id',
    ];
}
