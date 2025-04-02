<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasHistory, SoftDeletes;
    protected $fillable = [
        'name',
        'title',
        'description',
        'text',
        'photo_1',
        'photo_2',
        'is_active',
    ];

    protected $casts = [
        'name'        => 'array',
        'title'       => 'array',
        'description' => 'array',
        'text'        => 'array',
    ];
}
