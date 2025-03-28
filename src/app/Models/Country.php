<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasHistory;
    protected $fillable = [
        'name', 'default', 'code', 'code3', 'codeNumeric', 'postCode', 'active', 'label_en', 'domain',
    ];

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }
}
