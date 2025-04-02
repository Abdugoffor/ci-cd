<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccreditationCategory extends Model
{
    use HasHistory, SoftDeletes;
    protected $fillable = ['name', 'slug', 'is_active','color'];
    protected $casts    = [
        'name' => 'array',
    ];
}
