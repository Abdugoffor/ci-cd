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
        return [
            'photo_1' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'photo_2' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'photo_3' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'photo_4' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'photo_5' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'photo_6' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ];
    }
}
