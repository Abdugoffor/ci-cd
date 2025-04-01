<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZoneStoreRequest extends FormRequest
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
            'parent_id'   => 'nullable|exists:zones,id',
            'title'       => 'required|string:max:255',
            'description' => 'nullable|array',
            'is_active'   => 'required|boolean',
        ];

        $rules = array_merge($rules, validateTranslation('description'));

        return $rules;
    }
}
