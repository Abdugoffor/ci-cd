<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerStoreRequest;
use App\Models\Partner;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index()
    {
        $models = Partner::orderByDesc('id')->paginate(10);

        return view(view: 'admin.partners.index', data: ['models' => $models]);
    }
    public function search(Request $request)
    {
        $query  = Partner::query();
        $locale = app()->getLocale();

        if ($request->filled('name')) {
            $query->where("name->$locale", 'LIKE', "%{$request->name}%");
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN));
        }

        $models = $query->paginate(10);
        $models->appends($request->only(['name', 'is_active']));

        return view('admin.partners.index', ['models' => $models]);
    }
    public function create()
    {
        return view('admin.partners.create');
    }
    public function store(PartnerStoreRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {

            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        $data['name']['default'] = reset($data['name']);

        Partner::create($data);

        return redirect()->route('partners.index')->with('notification', getTranslation('notification'));
    }

    public function show(Partner $partner)
    {
        return view('admin.partners.show', ['model' => $partner]);
    }
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', ['partner' => $partner]);
    }

    public function update(PartnerStoreRequest $request, Partner $partner)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        $partner->update($data);

        return redirect()->route('partners.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index')->with('notification', getTranslation('notification'));
    }
    public function status(Partner $partner)
    {
        $partner->update(['is_active' => ! $partner->is_active]);
        return back()->with('notification', getTranslation('notification'));
    }
}
