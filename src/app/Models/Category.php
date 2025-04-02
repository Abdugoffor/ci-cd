<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasHistory, SoftDeletes;
    protected $fillable = ["name", "description", "slug",'is_active'];
    protected $casts    = [
        'name'        => 'array',
        'description' => 'array',
    ];

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }
}
