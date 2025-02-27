<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, HasHistory;
    protected $fillable = ["name", "description", "slug", 'default'];
    protected $casts    = [
        'name'        => 'array',
        'description' => 'array',
    ];

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }
}
