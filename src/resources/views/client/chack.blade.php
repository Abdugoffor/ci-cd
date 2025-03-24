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
            @if (session('errors'))
                <div class="alert alert-danger">
                    @foreach (session('errors')->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if (isset($participant))
                <table class="table">
                    <tbody>
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
                            <td>{{ $participant->date_of_birth->format('d-m-Y') }}</td>
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
                                {{ $participant->accreditationCategory ? getLocale($participant->accreditationCategory->name) : '' }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('citizenship') }}
                            </th>
                            <td>{{ optional($participant->country)->label_en ?? '' }}</td>
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
                            <td>
                                <a href="tel:{{ $participant->phone }}" target="_blank">
                                    {{ $participant->phone }}
                                </a>
                            </td>
                        </tr>
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
                            <th class="text-center">
                                {{ getTranslation('visa-required') }}?
                            </th>
                            <td>
                                {{ $participant->requires_visa ? getTranslation('yes') : getTranslation('no') }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">
                                {{ getTranslation('arrival-date') }}

                            </th>
                            <td>
                                {{ optional($participant->arrival_details)->format('d-m-Y') }}
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
                            <th class="text-center">
                                {{ getTranslation('accommodation-details') }}
                            </th>
                            <td>
                                {{ getLocale(optional($participant->accommodationDetail)->title) ?? '' }}
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
                            <td>
                                <span
                                    class="badge badge-{{ $participant->status == 'unfinished' ? 'secondary' : ($participant->status == 'pending' ? 'warning' : ($participant->status == 'approved' ? 'success' : 'danger')) }} badge-pill ml-auto">
                                    {{ getTranslation($participant->status == 'unfinished' ? 'unfinished' : ($participant->status == 'pending' ? 'pending' : ($participant->status == 'approved' ? 'approved' : 'canceled'))) }}

                                    <div class="list-icons ml-2">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i
                                                    class="icon-menu7"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- Qabul qilish tugmasi -->
                                                <a href="{{ route('application.status', [$participant->id, 'approved'], false) }}"
                                                    class="dropdown-item">
                                                    <i class="icon-checkmark3 text-success"></i>
                                                    {{ getTranslation('acceptance') }}
                                                </a>
                                                <!-- Canceled tugmasi: Modalni ochadi -->
                                                <span href="#" class="dropdown-item canceled-btn" data-toggle="modal"
                                                    data-target="#cancelModal{{ $participant->id }}">
                                                    <i class="icon-cross2 text-danger"></i>{{ getTranslation('canceled') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </span>

                                <!-- Canceled Modal (Har bir model uchun alohida) -->
                                <div id="cancelModal{{ $participant->id }}" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ getTranslation('reason-for-cancellation') }}:
                                                    {{ $participant->first_name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <form action="{{ route('application.cancel', $participant->id, false) }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>
                                                            {{ getTranslation('reason-for-cancellation') }}:
                                                        </label>
                                                        <textarea name="cancel_reason" class="form-control" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ getTranslation('close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ getTranslation('confirm') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('created') }}</th>
                            <th class="text-center">{{ $participant->created_at->format('d-m-Y, H:i') }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('change') }}</th>
                            <th class="text-center">{{ $participant->updated_at->format('d-m-Y, H:i') }}</th>
                        </tr>
                    </tbody>
                </table>
            @else
                <p class="text-danger">Ma’lumot topilmadi!</p>
            @endif

            <div style="margin-top: 200px;"></div>
        </section>
    </main>
@endsection
