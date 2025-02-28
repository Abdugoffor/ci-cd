<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait SearchColum
{
    public function search(Request $request)
    {
        $query = $this->searhcModel::query();

        foreach ($request->all() as $field => $value) {

            if ($field == "_token" || empty($value)) {
                continue;
            }

            if ($field === 'is_active') {

                $query->orWhere($field, filter_var($value, FILTER_VALIDATE_BOOLEAN));
            }

            $query->orWhere("{$field}", 'LIKE', "%{$value}%");
        }
        return view('admin.' . $this->path . '.index', ['models' => $query->paginate(10)]);
    }
}
