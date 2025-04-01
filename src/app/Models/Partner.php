<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasHistory;
    protected $fillable = ["name", "path", 'photo','is_active'];
    protected $casts    = [
        'name' => 'array',
    ];
}
