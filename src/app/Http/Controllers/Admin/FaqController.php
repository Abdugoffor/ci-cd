<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqStoreRequest;
use App\Http\Requests\FaqUpdateRequest;
use App\Models\Faq;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $models = Faq::orderByDesc('id')->paginate(10);
        return view('admin.faqs.index', data: ['models' => $models]);
    }
    public function search(Request $request)
    {
        $query  = Faq::query();
        $locale = app()->getLocale();

        if ($request->filled('question')) {
            $query->where("question->$locale", 'LIKE', "%{$request->question}%");
        }

        if ($request->filled('answer')) {
            $query->where("answer->$locale", 'LIKE', "%{$request->answer}%");
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN));
        }

        $models = $query->paginate(10);

        $models->appends($request->only(['question', 'answer', 'is_active']));

        return view('admin.faqs.index', ['models' => $models]);
    }
    public function create()
    {
        return view('admin.faqs.create');
    }
    public function store(FaqStoreRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $data['question']['default'] = reset($data['question']);

        $data['answer']['default'] = reset($data['answer']);

        Faq::create($data);

        return redirect()->route('faqs.index')->with('notification', getTranslation('notification'));
    }

    public function show(Faq $faq)
    {
        return view('admin.faqs.show', ['model' => $faq]);
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', ['faq' => $faq]);
    }

    public function update(FaqUpdateRequest $request, Faq $faq)
    {
        $data = $request->all();

        $faq->update($data);

        return redirect()->route('faqs.index')->with('notification', getTranslation('notification'));
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('notification', getTranslation('notification'));
    }
}
