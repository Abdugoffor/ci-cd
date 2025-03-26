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
                        <label for="first-name" class="input-label">ID</label>
                        <input type="text" id="first-name" name="participant_id"
                            placeholder="{{ getTranslation('participant_id') }}" value="{{ old('participant_id') }}"
                            class="input-text" />
                        @error('participant_id')
                            <p style="color: red; font-size: 12px;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-wrapper">
                        <label for="first-name" class="input-label">{{ getTranslation('key') }} </label>
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

            <div style="padding: 20px; border: 1px solid #ddd; border-radius: 8px; margin-top: 10px;">
                @if (isset($participant->playerInfo))
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li><strong>{{ getTranslation('name') }}:</strong>
                                <span>{{ $participant->playerInfo->name }}</span>
                            </li>
                            <li><strong>{{ getTranslation('country') }}:</strong>
                                <span>{{ $participant->playerInfo->country ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('gender') }}:</strong>
                                <span>{{ $participant->playerInfo->sex ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('birth-date') }}:</strong>
                                <span>{{ $participant->playerInfo->birthyear ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('title') }}:</strong>
                                <span>{{ $participant->playerInfo->title ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('standard_rating') }}:</strong>
                                <span>{{ $participant->playerInfo->standard_rating ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('blitz_rating') }}:</strong>
                                <span>{{ $participant->playerInfo->blitz_rating ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('rapid_rating') }}:</strong>
                                <span>{{ $participant->playerInfo->rapid_rating ?? getTranslation('not_available') }}</span>
                            </li>
                        </ul>
                        <img src="{{ asset($participant->playerInfo->image_file ?? 'frontend/assets/player.png') }}"
                            alt="Player Image"
                            style="width: 200px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-left: 16px;">
                    </div>
                @endif

                @if (isset($participant))
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd; margin-top: 10px;">
                        <tbody>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    ID</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->id }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('key') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->key }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('photo') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    @if ($participant->photo)
                                        <img src="{{ asset($participant->photo) }}" alt="Фото" style="width: 100px;">
                                    @else
                                        {{ getTranslation('no-photo') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('qk_code') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    @if ($participant->qk_code_path)
                                        <a href="{{ asset($participant->qk_code_path) }}" download>
                                            <img src="{{ asset($participant->qk_code_path) }}" alt="Фото"
                                                style="width: 100px;">
                                        </a>
                                    @else
                                        {{ getTranslation('no-photo') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('name') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->first_name }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('last-name') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->last_name }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('birth-date') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->date_of_birth->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('gender') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->gender }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('email') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->email }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('email-confirmed') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->email_verified_at ? $participant->email_verified_at->format('d-m-Y, H:i') : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('fide-id') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->fide_id }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('accreditation-category') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->accreditationCategory ? getLocale($participant->accreditationCategory->name) : '' }}
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('citizenship') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ optional($participant->country)->label_en ?? '' }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('passport-number') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->passport_number }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('passport-issue-date') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->passport_issue_date }}
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('Passport-validity-period') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->passport_expiry_date }}
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('passport-issuing-authority') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->passport_issuing_authority }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('copy-of-passport') }}</th>
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
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('phone') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    <a href="tel:{{ $participant->phone }}" target="_blank">{{ $participant->phone }}</a>
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('visa-required') }}?</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->requires_visa ? getTranslation('yes') : getTranslation('no') }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('arrival-date') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ optional($participant->arrival_details)->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('departure-date') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ optional($participant->departure_details)->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('accommodation-details') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ getLocale(optional($participant->accommodationDetail)->title) ?? '' }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('pcr-test-details') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">{{ $participant->pcr_test_details }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('status') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    <span
                                        style="display: inline-block; padding: 5px 10px; border-radius: 12px; color: #fff; 
                                background-color: {{ $participant->status == 'unfinished' ? '#6c757d' : ($participant->status == 'pending' ? '#ffc107' : ($participant->status == 'approved' ? '#28a745' : '#dc3545')) }};">
                                        {{ getTranslation($participant->status == 'unfinished' ? 'unfinished' : ($participant->status == 'pending' ? 'pending' : ($participant->status == 'approved' ? 'approved' : 'canceled'))) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('created') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->created_at->format('d-m-Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 45%; text-align: left; padding: 8px; border: 1px solid #ddd; background: #f8f8f8;">
                                    {{ getTranslation('change') }}</th>
                                <td style="padding: 8px; border: 1px solid #ddd;">
                                    {{ $participant->updated_at->format('d-m-Y, H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endif

                @if (isset($participant->applicationCancellations) && $participant->applicationCancellations->count() > 0)
                    <div style="padding: 15px; margin-top: 15px;">
                        <h5 style="color: #007bff; margin-bottom: 10px;">{{ getTranslation('application_cancellations') }}
                        </h5>
                        <ul style="list-style: none; padding: 0;">
                            @foreach ($participant->applicationCancellations as $index => $applicationCancellation)
                                <li
                                    style="display: flex; justify-content: space-between; align-items: center; border: 1px solid #ddd; margin-bottom: 8px; padding: 8px;">
                                    <div style="display: flex; flex-direction: column;">
                                        <span><strong>{{ $index + 1 }}.</strong>
                                            {{ $applicationCancellation->cancel_reason }}</span>
                                        <span
                                            style="font-size: 0.9em; color: #666;">{{ $applicationCancellation->created_at->format('d-m-Y H:i') }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div style="margin-top: 200px;"></div>
        </section>
    </main>
@endsection
