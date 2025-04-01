<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Models\Contact;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $models = Contact::orderByDesc('id')->paginate(10);
        return view('admin.contacts.index', data: ['models' => $models]);
    }
    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('title')) {
            $query->where('title', 'LIKE', "%{$request->title}%");
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN));
        }

        $models = $query->paginate(10);
        $models->appends($request->only(['title', 'is_active']));

        return view('admin.contacts.index', ['models' => $models]);
    }
    public function create()
    {
        return view('admin.contacts.create');
    }
    public function store(ContactStoreRequest $request)
    {
        $data = $request->all();

        $data['title']['default'] = reset($data['title']);

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }
        Contact::create($data);

        return redirect()->route('contacts.index')->with('notification', getTranslation('notification'));
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', ['contact' => $contact]);
    }
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', ['model' => $contact]);
    }

    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::uploadFile($request->file('photo'));
        }

        $contact->update($data);

        return redirect()->route('contacts.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('notification', getTranslation('notification'));
    }
    public function status(Contact $contacts)
    {
        $contacts->update(['is_active' => ! $contacts->is_active]);
        return back()->with('notification', getTranslation('notification'));
    }
}
