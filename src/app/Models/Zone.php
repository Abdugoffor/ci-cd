<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasHistory;
    protected $fillable = [
        'parent_id',
        'title',
        'description',
        'is_active',
    ];

    protected $casts = [
        'description' => 'array',
        'is_active'   => 'boolean',
    ];

    // Zone ning ishtirokchilari (many-to-many)
    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'participant_zones', 'zone_id', 'participant_id')
            ->withPivot('tournament_id');
    }

    public function children()
    {
        return $this->hasMany(Zone::class, 'parent_id');
    }

    // Ota zona
    public function parent()
    {
        return $this->belongsTo(Zone::class, 'parent_id');
    }

}
