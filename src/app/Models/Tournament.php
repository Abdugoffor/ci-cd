<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use SoftDeletes, HasHistory;

    protected $fillable = [
        "name",
        "title",
        'description',
        "country_id",
        "category_id",
        "registration_start",
        "registration_end",
        "start_date",
        "end_date",
        "logo",
        "status",
    ];
    protected $casts = [
        'name'               => 'array',
        'title'               => 'array',
        'description'        => 'array',
        'registration_start' => 'date',
        'registration_end'   => 'date',
        'start_date'         => 'date',
        'end_date'           => 'date',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, "country_id");
    }
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function participants()
    {
        return $this->hasMany(Participant::class, "tournament_id");
    }
}
