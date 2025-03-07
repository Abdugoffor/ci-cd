<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaStoreRequest;
use App\Http\Requests\MediaUpdateRequest;
use App\Models\Media;
use Exception;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    private $photoFields = ['photo_1', 'photo_2', 'photo_3', 'photo_4', 'photo_5', 'photo_6'];

    private function uploadPhoto($file, $existingPath = null): string
    {
        if ($existingPath && file_exists(public_path($existingPath))) {
            unlink(public_path($existingPath));
        }

        $filename = date('d-m-Y') . Str::random(40) . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('uploaded'), $filename);

        return 'uploaded/' . $filename;
    }
    public function index()
    {
        $models = Media::orderBy('id', 'desc')->paginate(10);

        return view("admin.media.index", ['models' => $models]);
    }
    public function create()
    {
        return view("admin.media.create");
    }
    public function store(MediaStoreRequest $request)
    {
        try {
            $data = [];

            foreach ($this->photoFields as $field) {
                if ($request->hasFile($field) && $request->file($field)->isValid()) {
                    $data[$field] = $this->uploadPhoto($request->file($field));
                }
            }
            Media::create($data);

            return redirect()->route('media.index')->with('notification', getTranslation('notification'));

        } catch (Exception $e) {

            return back()->with('notification', 'Error: ' . $e->getMessage());
        }
    }

    public function edit(Media $medium)
    {
        return view("admin.media.edit", ["media" => $medium]);
    }

    public function show(Media $medium)
    {
        return view("admin.media.show", ["model" => $medium]);
    }

    public function update(MediaUpdateRequest $request, Media $medium)
    {
        try {
            $data = [];

            foreach ($this->photoFields as $field) {
                if ($request->hasFile($field) && $request->file($field)->isValid()) {
                    $data[$field] = $this->uploadPhoto($request->file($field), $medium->$field);
                }
            }

            if ($data) {

                $medium->update($data);
            }

            return redirect()->route('media.index')->with('notification', getTranslation('notification'));

        } catch (Exception $e) {

            return back()->with('notification', 'Error: ' . $e->getMessage());
        }
    }
    public function destroy(Media $medium)
    {
        $medium->delete();
        return back()->with('notification', getTranslation('notification'));
    }
    public function status(Media $medium)
    {
        $medium->update(['is_active' => ! $medium->is_active]);
        return back()->with('notification', getTranslation('notification'));
    }

}
