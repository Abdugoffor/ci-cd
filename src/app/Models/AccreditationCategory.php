<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccreditationCategory extends Model
{
    use SoftDeletes, HasHistory;
    protected $fillable = ['name', 'slug'];
    protected $casts    = [
        'name' => 'array',
    ];
}
