<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqUpdateRequest extends FormRequest
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
            'question'  => 'required|array',
            'answer'    => 'required|array',
            'is_active' => 'required|boolean',
        ];

        $rules = array_merge($rules, validateTranslation('question'), validateTranslation('answer'));

        return $rules;
    }
}
