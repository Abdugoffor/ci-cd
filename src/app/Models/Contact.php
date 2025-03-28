<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'path',
        'photo',
        'is_active',
    ];
    protected $casts = [
        'title'       => 'array',
    ];
}
