<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aferta extends Model
{
    use SoftDeletes, HasHistory;
    protected $fillable = ['text'];
    protected $casts    = [
        'text' => 'array',
    ];
}
