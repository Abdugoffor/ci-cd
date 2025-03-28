<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationCancellation extends Model
{
    use HasHistory;
    protected $fillable = [
        'participant_id',
        'cancel_reason',
    ];
}
