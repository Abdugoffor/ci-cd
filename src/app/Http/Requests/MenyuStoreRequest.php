<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenyuStoreRequest extends FormRequest
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
            'name'  => 'required|array',
            'path'  => 'required|string',
            'is_active' => 'required|boolean',
        ];

        $rules = array_merge($rules, validateTranslation('name'));

        return $rules;
    }
}
