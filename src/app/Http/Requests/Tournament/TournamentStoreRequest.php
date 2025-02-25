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
        return [
            'uz'                 => 'required|string|max:255',
            'ru'                 => 'required|string|max:255',
            'en'                 => 'required|string|max:255',
            'country_id'         => 'required|exists:countries,id',
            'category_id'        => 'required|exists:categories,id',
            'registration_start' => 'required|date',
            'registration_end'   => 'required|date',
            'start_date'         => 'required|date',
            'end_date'           => 'required|date',
            'logo'               => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'description'        => 'required|string',
        ];
    }
}
