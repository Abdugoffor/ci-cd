@extends('layouts.admin')
@section('title', getTranslation('scanner'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('skan.store', [], false) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{ getTranslation('scanner') }}
                        </legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">{{ getTranslation('qk_code') }}</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" name="qk_code"
                                    placeholder="{{ getTranslation('qk_code') }}" autofocus>
                            </div>
                            @error('qk_code')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">{{ getTranslation('add') }}</button>
                        </div>
                    </fieldset>
                </form>
                @if (isset($participant))
                    <table class="table table-bordered">
                        <tbody>

                            <tr>
                                <th class="text-center">
                                    {{ getTranslation('photo') }}
                                </th>
                                <td>
                                    @if ($participant->photo)
                                        <img src="{{ asset($participant->photo) }}" alt="Фото" width="100">
                                    @else
                                        {{ getTranslation('no-photo') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('name') }}</th>
                                <td>{{ $participant->first_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('last-name') }}</th>
                                <td>{{ $participant->last_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('birth-date') }}</th>
                                <td>{{ $participant->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('gender') }}</th>
                                <td>{{ $participant->gender }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('email') }}</th>
                                <td>{{ $participant->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('email-confirmed') }}
                                </th>
                                <td>{{ $participant->email_verified_at ? $participant->email_verified_at->format('d-m-Y, H:i') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('fide-id') }}</th>
                                <td>{{ $participant->fide_id }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('accreditation-category') }}
                                </th>
                                <td>
                                    {{ getLocale(optional($participant->accreditationCategory)->name) }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('citizenship') }}
                                </th>
                                <td>{{ optional($participant->country)->label_en }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('passport-number') }}
                                </th>
                                <td>{{ $participant->passport_number }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('passport-issue-date') }}
                                </th>
                                <td>{{ $participant->passport_issue_date }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('Passport-validity-period') }}
                                </th>
                                <td>{{ $participant->passport_expiry_date }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('passport-issuing-authority') }}
                                </th>
                                <td>{{ $participant->passport_issuing_authority }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('copy-of-passport') }}
                                </th>
                                <td>
                                    @if ($participant->passport_copy)
                                        <a href="{{ asset($participant->passport_copy) }}"
                                            target="_blank">{{ getTranslation('view') }}</a>
                                    @else
                                        {{ getTranslation('no-data') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    {{ getTranslation('phone') }}
                                </th>
                                <td>{{ $participant->phone }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    {{ getTranslation('visa-required') }}?
                                </th>
                                <td>
                                    {{ $participant->requires_visa ? 'Да' : 'Нет' }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    {{ getTranslation('arrival-date') }}

                                </th>
                                <td>{{ optional($participant->arrival_details)->format('d-m-Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    {{ getTranslation('departure-date') }}

                                </th>
                                <td>{{ optional($participant->departure_details)->format('d-m-Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">{{ getTranslation('accommodation-details') }}

                                </th>
                                <td>
                                    {{ getLocale(optional($participant->accommodationDetail)->title) }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    {{ getTranslation('pcr-test-details') }}
                                </th>
                                <td>{{ $participant->pcr_test_details }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">
                                    {{ getTranslation('status') }}

                                </th>
                                <td>{{ getTranslation($participant->status) }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endif

                @if (isset($errorMessage))
                    <div class="alert alert-danger border-0 alert-dismissible mt-2">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        {{ $errorMessage }}
                    </div>
                @endif
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
