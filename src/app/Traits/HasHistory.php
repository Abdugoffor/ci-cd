<?php
namespace App\Traits;

use App\Models\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait HasHistory
{
    public static function bootHasHistory()
    {
        static::created(function (Model $model) {
            $model->storeHistory('create');
        });

        static::updated(function (Model $model) {
            $changes = $model->getChanges();
            if (! empty($changes)) {
                $model->storeHistory('update', $changes);
            }
        });

        static::deleted(function (Model $model) {
            $model->storeHistory('delete');
        });
    }

    public function storeHistory($action, $changes = [])
    {
        History::create([
            'model_type' => get_class($this),
            'model_id'   => $this->id,
            'user_id'    => Auth::id(),
            'changes'    => $changes,
            'action'     => $action,
            'user_id'    => Auth::id(),
        ]);
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'model_id')
            ->where('model_type', get_class($this));
    }
}
