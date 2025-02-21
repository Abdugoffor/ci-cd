<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "name",
        "country",
        "category_id",
        "registration_start",
        "registration_deadline",
        "start_date",
        "end_date",
        "logo",
    ];
    protected $casts = [
        'name' => 'array',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }
}
