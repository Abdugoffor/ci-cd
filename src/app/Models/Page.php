<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasHistory, SoftDeletes;
    protected $fillable = [
        'url',
        'title',
        'description',
        'text',
        'photo',
        'is_active',
    ];

    protected $casts = [
        'title'       => 'array',
        'description' => 'array',
        'text'        => 'array',
        'is_active'   => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($page) {

            $domain = request()->getSchemeAndHttpHost();

            $page->url = $domain . '/content/' . $page->id;

            $page->save();
        });
    }
}
