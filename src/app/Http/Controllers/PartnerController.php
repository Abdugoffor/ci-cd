<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerStoreRequest;
use App\Models\Partner;
use App\Traits\SearchColumTranslations;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    protected $searhcModel = Partner::class;
    protected $path        = "partners";

    use SearchColumTranslations;
    public function index()
    {
        $models = Partner::orderByDesc('id')->paginate(10);
        return view(view: 'admin.partners.index', data: ['models' => $models]);
    }
    public function create()
    {
        return view('admin.partners.create');
    }
    public function store(PartnerStoreRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = date('d-m-Y') . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['photo'] = 'uploaded/' . $filename;
        }

        $data['name']['default'] = reset($data['name']);

        Partner::create($data);

        return redirect()->route('partners.index');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', ['partner' => $partner]);
    }

    public function update(PartnerStoreRequest $request, Partner $partner)
    {
        $data = $request->all();
        // dd($data);
        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = date('d-m-Y') . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['photo'] = 'uploaded/' . $filename;
        }

        $partner->update($data);

        return redirect()->route('partners.index');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index');
    }
    public function status(Partner $partner)
    {
        $partner->update(['is_active' => ! $partner->is_active]);
        return back();
    }
}
