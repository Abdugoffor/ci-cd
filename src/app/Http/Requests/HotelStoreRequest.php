<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelStoreRequest extends FormRequest
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
            'title'       => 'required|array',
            'description' => 'required|array',
            'text'        => 'required|array',
            'photo'       => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
            'rating'      => 'required|numeric|max:5',
            'location'    => 'required|string',
            'phone'       => 'required|string',
            'is_active'   => 'required|boolean',
        ];

        $rules = array_merge($rules, validateTranslation('title'), validateTranslation('description'), validateTranslation('text'));

        return $rules;
    }
}
