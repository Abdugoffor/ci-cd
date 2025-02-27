<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasHistory;
    protected $fillable = [
        'name', 'default', 'code', 'code3', 'codeNumeric', 'postCode', 'active', 'label_nl', 'label_en', 'label_es', 'label_fr', 'domain',
    ];

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }
}
