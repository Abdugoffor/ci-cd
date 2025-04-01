<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes, HasHistory;
    protected $fillable = [
        'title',
        'description',
        'text',
        'photo',
        'date',
        'is_active',
    ];
    protected $casts = [
        'title'       => 'array',
        'description' => 'array',
        'text'        => 'array',
        'is_active'   => 'boolean',
    ];
}
