<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportApplicationStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'fide_id'                    => 'nullable|string|max:255',
            'first_name'                 => 'required|string|max:255',
            'last_name'                  => 'required|string|max:255',
            'email'                      => 'required|email|max:255',
            'date_of_birth'              => 'required|date',
            'tournament_id'              => 'required|exists:tournaments,id',
            'accreditation_category_id'  => 'required|exists:accreditation_categories,id',
            'gender'                     => 'required|in:M,F',
            'passport_number'            => 'required|string|max:255',
            'passport_issue_date'        => 'required|date',
            'passport_expiry_date'       => 'required|date|after:passport_issue_date',
            'arrival_details'            => 'required|date',
            'departure_details'          => 'required|date|after_or_equal:arrival_details',
            'passport_issuing_authority' => 'required|string|max:255',
            'pcr_test_details'           => 'required|in:yes,no',
            'phone'                      => 'required|string|max:20',
            'country_id'                 => 'required|exists:countries,id',
            'accommodation_details'      => 'required|exists:hotels,id',
            'requires_visa'              => 'required|in:0,1',
            'passport_copy'              => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'photo'                      => 'required|file|mimes:jpg,jpeg,png|max:5120',
        ];
    }
}
