<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasHistory, SoftDeletes;
    protected $fillable = [
        'question',
        'answer',
        'is_active',
    ];
    protected $casts = [
        'question'  => 'array',
        'answer'    => 'array',
        'is_active' => 'boolean',
    ];
}
