<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Menyu extends Model
{
    use HasHistory;
    protected $fillable = ["name", "url", 'is_active'];
    protected $casts    = [
        'name' => 'array',
    ];

}
