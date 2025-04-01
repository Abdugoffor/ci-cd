<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerInfo extends Model
{
    use HasHistory;
    protected $fillable = [
        'participant_id',
        'name',
        'country',
        'sex',
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
