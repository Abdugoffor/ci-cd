<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;
use App\Traits\SearchColumTranslations;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    protected $searhcModel = Contact::class;
    protected $path = "contacts";

    use SearchColumTranslations;
    public function index()
    {
        $models = Contact::orderByDesc('id')->paginate(10);
        return view('admin.contacts.index', data: ['models' => $models]);
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
            $file       = $request->file('photo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = date('d-m-Y') . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['photo'] = 'uploaded/' . $filename;
        }
        Contact::create($data);

        return redirect()->route('contacts.index');
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', ['contact' => $contact]);
    }

    public function update(ContactStoreRequest $request, Contact $contact)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $extensions = $file->getClientOriginalExtension();
            $filename   = date('d-m-Y') . Str::random(40) . '.' . $extensions;
            $file->move(public_path('uploaded'), $filename);
            $data['photo'] = 'uploaded/' . $filename;
        }

        $contact->update($data);

        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
    public function status(Contact $contacts)
    {
        $contacts->update(['is_active' => ! $contacts->is_active]);
        return back();
    }
}
