<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParticipantZone extends Model
{
    use HasHistory, SoftDeletes;
    protected $fillable = [
        'tournament_id',
        'participant_id',
        'zone_id',
    ];
}
