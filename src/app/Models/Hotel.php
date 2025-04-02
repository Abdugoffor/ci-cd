<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasHistory,SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'text',
        'photo',
        'rating',
        'location',
        'phone',
        'is_active',
    ];
    protected $casts = [
        'title'       => 'array',
        'description' => 'array',
        'text'        => 'array',
    ];
}
