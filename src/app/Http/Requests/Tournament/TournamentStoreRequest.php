<?php
namespace App\Http\Requests\Tournament;

use Illuminate\Foundation\Http\FormRequest;

class TournamentStoreRequest extends FormRequest
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
            'category_id'        => 'required|exists:categories,id',
            'country_id'         => 'required|exists:countries,id',
            'registration_start' => 'required|date',
            'registration_end'   => 'required|date|after_or_equal:registration_start',
            'start_date'         => 'required|date',
            'end_date'           => 'required|date|after_or_equal:start_date',
            'logo'               => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'name'               => 'required|array',
            'title'               => 'required|array',
            'description'        => 'required|array',
        ];

        $rules = array_merge($rules, validateTranslation('name'), validateTranslation('description'));

        return $rules;
    }
}
