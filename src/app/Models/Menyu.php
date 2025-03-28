<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menyu extends Model
{
    use SoftDeletes, HasHistory;
    protected $fillable = ["name", "url", 'is_active'];
    protected $casts    = [
        'name' => 'array',
    ];

}
