<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Aferta extends Model
{
    use HasHistory;
    protected $fillable = ['text'];
    protected $casts    = [
        'text' => 'array',
    ];
}
