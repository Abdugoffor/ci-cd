<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasHistory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'text',
        'menyu_id',
        'photo',
        'date',
        'is_active',
    ];
    protected $casts = [
        'title'       => 'array',
        'description' => 'array',
        'text'        => 'array',
        'is_active'   => 'boolean',
    ];
    public function menyu()
    {
        return $this->belongsTo(Menyu::class, 'menyu_id', 'id');
    }
}
