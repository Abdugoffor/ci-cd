<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
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
