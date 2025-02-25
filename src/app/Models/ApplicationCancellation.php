<?php
namespace App\Models;

use App\Traits\HasHistory;
use Illuminate\Database\Eloquent\Model;

class ApplicationCancellation extends Model
{
    use HasHistory;
    protected $fillable = [
        'participant_id',
        'cancel_reason',
    ];
}
