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
        $languages = getLanguage()->where('is_active', true)->pluck('slug')->toArray();

        $rules = [
            'category_id'        => 'required|exists:categories,id',
            'country_id'         => 'required|exists:countries,id',
            'registration_start' => 'nullable|date',
            'registration_end'   => 'nullable|date|after_or_equal:registration_start',
            'start_date'         => 'nullable|date',
            'end_date'           => 'nullable|date|after_or_equal:start_date',
            'name'               => 'required|array',
            'description'        => 'required|array',
            'logo'               => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ];

        foreach ($languages as $lang) {
            $rules["name.$lang"]        = 'required|string|max:255';
            $rules["description.$lang"] = 'required|string';
        }

        return $rules;
    }
}
