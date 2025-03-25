<?php
namespace App\Exports;

use App\Models\Participant;
use App\Models\Translation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ParticipantExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    public function collection()
    {
        $participants = Participant::with(['country', 'accreditationCategory', 'accommodationDetail'])->get();

        return $participants->map(function ($model) {
            return [
                'name'                       => $model->first_name,
                'last_name'                  => $model->last_name,
                'birth_date'                 => $model->date_of_birth ? $model->date_of_birth->format('d-m-Y') : '',
                'gender'                     => $model->gender,
                'email'                      => $model->email,
                'email_confirmed'            => $model->email_verified_at ? $model->email_verified_at->format('d-m-Y, H:i') : '',
                'fide_id'                    => $model->fide_id,
                'accreditation_category'     => $model->accreditationCategory ? $this->getLocale($model->accreditationCategory->name) : '',
                'citizenship'                => optional($model->country)->label_en ?? '',
                'passport_number'            => $model->passport_number,
                'passport_issue_date'        => $model->passport_issue_date,
                'passport_validity_period'   => $model->passport_expiry_date,
                'passport_issuing_authority' => $model->passport_issuing_authority,
                'phone'                      => $model->phone,
                'visa_required'              => $model->requires_visa ? 'Yes' : 'No',
                'arrival_date'               => optional($model->arrival_details)->format('d-m-Y') ?? '',
                'departure_date'             => optional($model->departure_details)->format('d-m-Y') ?? '',
                'accommodation_details'      => $model->accommodationDetail ? $this->getLocale($model->accommodationDetail->title) : '',
                'pcr_test_details'           => $model->pcr_test_details,
                'status'                     => $this->getTranslation($model->status),
                'created'                    => $model->created_at->format('d-m-Y, H:i'),
                'change'                     => $model->updated_at->format('d-m-Y, H:i'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            $this->getTranslation('name'),
            $this->getTranslation('last-name'),
            $this->getTranslation('birth-date'),
            $this->getTranslation('gender'),
            $this->getTranslation('email'),
            $this->getTranslation('email-confirmed'),
            $this->getTranslation('fide-id'),
            $this->getTranslation('accreditation-category'),
            $this->getTranslation('citizenship'),
            $this->getTranslation('passport-number'),
            $this->getTranslation('passport-issue-date'),
            $this->getTranslation('Passport-validity-period'),
            $this->getTranslation('passport-issuing-authority'),
            $this->getTranslation('phone'),
            $this->getTranslation('visa-required') . '?',
            $this->getTranslation('arrival-date'),
            $this->getTranslation('departure-date'),
            $this->getTranslation('accommodation-details'),
            $this->getTranslation('pcr-test-details'),
            $this->getTranslation('status'),
            $this->getTranslation('created'),
            $this->getTranslation('change'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Barcha qatorlar sonini aniqlash
        $totalRows    = $sheet->getHighestRow();
        $totalColumns = $sheet->getHighestColumn();

        return [
            // Sarlavha
            1                                  => [
                'font'      => [
                    'bold'  => true,
                    'color' => ['rgb' => 'FFFFFF'], // Oq rangdagi matn
                ],
                'fill'      => [
                    'fillType'   => 'solid',
                    'startColor' => ['rgb' => '4F81BD'], // Moviy fon
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Markazda
                ],
            ],
            // Barcha
            'A2:' . $totalColumns . $totalRows => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                ],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20, // Name
            'B' => 20, // Last Name
            'C' => 15, // Birth Date
            'D' => 10, // Gender
            'E' => 25, // Email
            'F' => 25, // Email Confirmed
            'G' => 10, // FIDE ID
            'H' => 25, // Accreditation Category
            'I' => 15, // Citizenship
            'J' => 20, // Passport Number
            'K' => 25, // Passport Issue Date
            'L' => 25, // Passport Validity Period
            'M' => 25, // Passport Issuing Authority
            'N' => 15, // Phone
            'O' => 10, // Visa Required
            'P' => 15, // Arrival Date
            'Q' => 15, // Departure Date
            'R' => 25, // Accommodation Details
            'S' => 20, // PCR Test Details
            'T' => 20, // Status
            'U' => 20, // Created
            'V' => 20, // Change
        ];
    }

    private function getTranslation($slug)
    {
        $locale = app()->getLocale() ?? 'en';

        $translation = Translation::where('slug', $slug)->first();

        if ($translation && isset($translation->name[$locale])) {
            return $translation->name[$locale];
        }

        return $slug;
    }

    private function getLocale($model)
    {
        if (! $model || ! is_array($model)) {
            return '';
        }

        $locale = app()->getLocale() ?? 'en';

        if ($locale && isset($model[$locale])) {
            return $model[$locale];
        }

        return $model['default'] ?? '';
    }
}
