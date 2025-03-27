<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationAdditionRequest extends FormRequest
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
            'fide_id'                    => 'nullable|string|max:255',
            'accreditation_category_id'  => 'required|exists:accreditation_categories,id',
            'country_id'                 => 'required|exists:countries,id',
            'passport_number'            => 'required|string|max:20',
            'passport_issue_date'        => 'required|date',
            'passport_expiry_date'       => 'required|date|after:passport_issue_date',
            'passport_issuing_authority' => 'required|string|max:255',
            'passport_copy'              => 'required|file|mimes:jpg,jpeg,png,pdf|max:4096',
            'photo'                      => 'required|file|mimes:jpg,jpeg,png|max:4096',
            'phone'                      => 'required|string|max:20',
            'requires_visa'              => 'required|boolean',
            'arrival_details'            => 'required|date',
            'departure_details'          => 'required|date|after_or_equal:arrival_details',
            'accommodation_details'      => 'required|string',
            'pcr_test_details'           => 'required|string',
        ];
    }
}
