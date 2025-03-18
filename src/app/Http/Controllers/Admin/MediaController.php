<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaStoreRequest;
use App\Http\Requests\MediaUpdateRequest;
use App\Models\Media;
use App\Services\FileUploadService;
use Exception;

class MediaController extends Controller
{

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

            $data = $request->all();

            $data['name']['default'] = reset($data['name']);

            $data['title']['default'] = reset($data['title']);

            $data['description']['default'] = reset($data['description']);

            $data['text']['default'] = reset($data['text']);

            if ($request->hasFile('photo_1')) {

                $data['photo_1'] = FileUploadService::uploadFile($request->file('photo_1'));
            }

            if ($request->hasFile('photo_2')) {

                $data['photo_2'] = FileUploadService::uploadFile($request->file('photo_2'));
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
            $data = $request->all();
            
            $data['name']['default'] = reset($data['name']);

            $data['title']['default'] = reset($data['title']);

            $data['description']['default'] = reset($data['description']);

            $data['text']['default'] = reset($data['text']);

            if ($request->hasFile('photo_1')) {
                
                $data['photo_1'] = FileUploadService::uploadFile($request->file('photo_1'));
            }

            if ($request->hasFile('photo_2')) {

                $data['photo_2'] = FileUploadService::uploadFile($request->file('photo_2'));
            }

            $medium->update($data);

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
