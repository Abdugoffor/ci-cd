<?php
namespace App\Http\Requests;

use App\Models\Translation;
use Illuminate\Foundation\Http\FormRequest;

class TranslationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules['default'] = [
            'required',
            'string',
            function ($attribute, $value, $fail) {
                $slug = slug($value);
                if (Translation::where('slug', $slug)->exists()) {
                    $fail("The generated slug '{$slug}' has already been taken.");
                }
            },
        ];

        $rules = [
            'name' => 'required|array',
        ];

        $rules = array_merge($rules, validateTranslation('name'));

        return $rules;

    }
}
