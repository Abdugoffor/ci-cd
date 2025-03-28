<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Translation extends Model
{
    use HasHistory;
    protected $fillable = [
        "slug",
        "name",
        "default",
    ];
    protected $casts = [
        'name' => 'array',
    ];
}
