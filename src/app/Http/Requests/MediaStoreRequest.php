<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaStoreRequest extends FormRequest
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
        $rules = [
            'name'        => 'required|array',
            'title'       => 'required|array',
            'description' => 'required|array',
            'text'        => 'required|array',
            'photo_1'     => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
            'photo_2'     => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
        ];

        $rules = array_merge($rules, validateTranslation('name'), validateTranslation('title'), validateTranslation('description'), validateTranslation('text'));

        return $rules;
    }
}
