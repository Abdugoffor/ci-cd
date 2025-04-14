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
            if (!empty($changes)) {
                $original = array_intersect_key($model->getOriginal(), $changes);
                $detailedChanges = [];

                foreach ($changes as $key => $value) {
                    if ($key !== 'updated_at') {
                        $oldValue = $original[$key] ?? null;
                        $newValue = $value;

                        if (is_string($oldValue) && json_decode($oldValue, true)) {
                            $oldValue = json_decode($oldValue, true);
                        }
                        if (is_string($newValue) && json_decode($newValue, true)) {
                            $newValue = json_decode($newValue, true);
                        }

                        $detailedChanges[$key] = [
                            'old' => $oldValue,
                            'new' => $newValue,
                        ];
                    }
                }

                if (!empty($detailedChanges)) {
                    $model->storeHistory('update', $detailedChanges);
                }
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
            'user_id'    => Auth::id() ?? null,
            'action'     => $action,
            'changes'    => $changes,
        ]);
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'model_id')
            ->where('model_type', get_class($this));
    }
}
