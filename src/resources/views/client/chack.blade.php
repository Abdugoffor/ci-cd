@extends('layouts.client')

@section('banner')
@endsection
@section('content')
    <main class="container">
        <section class="register-personal">
            @if (session('notification'))
                <div class="register-personal-top">
                    <div class="alert alert-success" style="color: white;">
                        {{ session('notification') }}
                    </div>
                </div>
            @endif
            <form action="{{ route('chack.application.srach', [], false) }}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <div class="input-wrapper">
                        <label for="first-name" class="input-label">ID Заявки:</label>
                        <input type="text" id="first-name" name="participant_id"
                            placeholder="{{ getTranslation('participant_id') }}" value="{{ old('participant_id') }}"
                            class="input-text" />
                        @error('participant_id')
                            <p style="color: red; font-size: 12px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-wrapper">
                        <label for="first-name" class="input-label">Ключ:</label>
                        <input type="text" id="first-name" name="key" placeholder="{{ getTranslation('key') }}"
                            value="{{ old('key') }}" class="input-text" />
                        @error('key')
                            <p style="color: red; font-size: 12px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-wrapper">
                        <button type="submit" class="btn"
                            style="margin-top: 25px;">{{ getTranslation('search') }}</button>
                    </div>
                </div>
            </form>

            @if (isset($participant))
                <div style="padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                        <tbody>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('name') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->first_name }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('name') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->first_name }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('last-name') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->last_name }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('birth-date') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->date_of_birth->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('gender') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->gender }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('email') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->email }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('email-confirmed') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->email_verified_at ? $participant->email_verified_at->format('d-m-Y, H:i') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('fide-id') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->fide_id }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('accreditation-category') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->accreditationCategory ? getLocale($participant->accreditationCategory->name) : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('citizenship') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ optional($participant->country)->label_en ?? '' }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('passport-number') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->passport_number }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('passport-issue-date') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->passport_issue_date }}
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('Passport-validity-period') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->passport_expiry_date }}
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('passport-issuing-authority') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->passport_issuing_authority }}
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('copy-of-passport') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    @if ($participant->passport_copy)
                                        <a href="{{ asset($participant->passport_copy) }}"
                                            target="_blank">{{ getTranslation('view') }}</a>
                                    @else
                                        {{ getTranslation('no-data') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('phone') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    <a href="tel:{{ $participant->phone }}" target="_blank">
                                        {{ $participant->phone }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('photo') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    @if ($participant->photo)
                                        <img src="{{ asset($participant->photo) }}" alt="Фото" width="100">
                                    @else
                                        {{ getTranslation('no-photo') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('visa-required') }}?
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->requires_visa ? getTranslation('yes') : getTranslation('no') }}
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('arrival-date') }}

                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ optional($participant->arrival_details)->format('d-m-Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('departure-date') }}

                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ optional($participant->departure_details)->format('d-m-Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('accommodation-details') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ getLocale(optional($participant->accommodationDetail)->title) ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('pcr-test-details') }}
                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->pcr_test_details }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('status') }}

                                </th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    <span
                                        class="badge badge-{{ $participant->status == 'unfinished' ? 'secondary' : ($participant->status == 'pending' ? 'warning' : ($participant->status == 'approved' ? 'success' : 'danger')) }} badge-pill ml-auto">
                                        {{ getTranslation($participant->status == 'unfinished' ? 'unfinished' : ($participant->status == 'pending' ? 'pending' : ($participant->status == 'approved' ? 'approved' : 'canceled'))) }}

                                    </span>

                                </td>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('created') }}</th>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ $participant->created_at->format('d-m-Y, H:i') }}</th>
                            </tr>
                            <tr>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('change') }}</th>
                                <th style="text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ $participant->updated_at->format('d-m-Y, H:i') }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-danger">Ma’lumot topilmadi!</p>
            @endif

            <div style="margin-top: 200px;"></div>
        </section>
    </main>
@endsection
