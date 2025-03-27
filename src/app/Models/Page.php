<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasHistory;
    protected $fillable = [
        'slug',
        'title',
        'description',
        'text',
        'photo',
        'is_active',
    ];
}
