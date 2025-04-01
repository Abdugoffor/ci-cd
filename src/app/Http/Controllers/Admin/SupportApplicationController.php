<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportApplicationStoreRequest;
use App\Http\Requests\SupportApplicationUpdateRequest;
use App\Models\AccreditationCategory;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Participant;
use App\Models\Tournament;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class SupportApplicationController extends Controller
{
    public function index()
    {
        $models = Participant::where('user_id', auth()->user()->id)->orderByDesc('id')->paginate(10);

        return view('admin.support_applications.index', data: ['models' => $models]);
    }
    public function search(Request $request)
    {
        $query = Participant::query();

        if ($request->filled('id')) {
            $query->where('id', 'LIKE', "%{$request->id}%");
        }

        if ($request->filled('first_name')) {
            $query->where('first_name', 'LIKE', "%{$request->first_name}%");
        }

        if ($request->filled('fide_id')) {
            $query->where('fide_id', 'LIKE', "%{$request->fide_id}%");
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', "%{$request->email}%");
        }

        if ($request->filled('status') && $request->status !== '') {
            $query->where('status', filter_var($request->status, FILTER_VALIDATE_BOOLEAN));
        }
        
        $query->where('user_id', auth()->user()->id);

        $models = $query->paginate(10);

        $models->appends($request->only(['name', 'role', 'email', 'country_id', 'status']));

        return view('admin.support_applications.index', data: ['models' => $models]);
    }
    public function create()
    {
        $countrys = Country::all();

        $accreditationCategories = AccreditationCategory::where('is_active', true)->get();

        $hotels = Hotel::where('is_active', true)->get();

        $tournaments = Tournament::all();

        return view('admin.support_applications.create', ['countrys' => $countrys, 'accreditationCategories' => $accreditationCategories, 'hotels' => $hotels, 'tournaments' => $tournaments]);
    }
    public function store(SupportApplicationStoreRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('passport_copy')) {

            $data['passport_copy'] = FileUploadService::uploadFile($request->file('passport_copy'));
        }

        if ($request->hasFile('photo')) {

            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        $data['user_id'] = auth()->user()->id;

        Participant::create($data);

        return redirect()->route('support-applications.index')->with('notification', getTranslation('notification'));
    }

    public function show(Participant $support_application)
    {
        return view('admin.support_applications.show', ['model' => $support_application]);
    }
    public function edit(Participant $support_application)
    {
        $countrys = Country::all();

        $accreditationCategories = AccreditationCategory::where('is_active', true)->get();

        $hotels = Hotel::where('is_active', true)->get();

        $tournaments = Tournament::all();

        return view('admin.support_applications.edit', ['model' => $support_application, 'countrys' => $countrys, 'accreditationCategories' => $accreditationCategories, 'hotels' => $hotels, 'tournaments' => $tournaments]);
    }

    public function update(SupportApplicationUpdateRequest $request, Participant $support_application)
    {

        $data = $request->all();

        if ($request->hasFile('passport_copy')) {

            $data['passport_copy'] = FileUploadService::uploadFile($request->file('passport_copy'));
        }

        if ($request->hasFile('photo')) {

            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        $support_application->update($data);

        return redirect()->route('support-applications.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Participant $support_application)
    {
        $support_application->delete();
        return redirect()->route('support-applications.index')->with('notification', getTranslation('notification'));
    }
}
