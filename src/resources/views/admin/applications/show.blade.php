@extends('layouts.admin')
@section('title', getTranslation('applications'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('application.index', [], false) }}" class="btn btn-sm btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                @if (!is_null($model->playerInfo))
                    <div class="d-flex justify-content-between align-items-center example">
                        <ul class="list-unstyled">
                            <li><strong>{{ getTranslation('name') }}:</strong> <span>{{ $model->playerInfo->name }}</span>
                            </li>
                            <li><strong>{{ getTranslation('country') }}:</strong>
                                <span>{{ $model->playerInfo->country ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('gender') }}:</strong>
                                <span>{{ $model->playerInfo->sex ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('birth-date') }}:</strong>
                                <span>{{ $model->playerInfo->birthyear ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('title') }}:</strong>
                                <span>{{ $model->playerInfo->title ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('standard_rating') }}:</strong>
                                <span>{{ $model->playerInfo->standard_rating ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('blitz_rating') }}:</strong>
                                <span>{{ $model->playerInfo->blitz_rating ?? getTranslation('not_available') }}</span>
                            </li>
                            <li><strong>{{ getTranslation('rapid_rating') }}:</strong>
                                <span>{{ $model->playerInfo->rapid_rating ?? getTranslation('not_available') }}</span>
                            </li>
                        </ul>
                        <img src="{{ asset($model->playerInfo->image_file ?? 'frontend/assets/player.png') }}"
                            alt="Player Image" width="200px" class="rounded shadow-sm ms-4">
                    </div>
                @endif


                <table class="table text-nowrap table-bordered mt-2">
                    <tbody>
                        <tr>
                            <th width="45%">
                                ID
                            </th>
                            <td>
                                {{ $model->id }}
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">
                                {{ getTranslation('key') }}
                            </th>
                            <td>
                                {{ $model->key }}
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">
                                {{ getTranslation('photo') }}
                            </th>
                            <td>
                                @if ($model->photo)
                                    <img src="{{ asset($model->photo) }}" alt="Фото" width="100">
                                @else
                                    {{ getTranslation('no-photo') }}
                                @endif
                                
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">
                                {{ getTranslation('qk_code') }}
                            </th>
                            <td>
                                @if ($model->qk_code_path)
                                    <a href="{{ asset($model->qk_code_path) }}" download>
                                        <img src="{{ asset($model->qk_code_path) }}" alt="Фото" width="100">
                                    </a>
                                @else
                                    {{ getTranslation('no-photo') }}
                                @endif
                                <p style="margin-top: 10px;">
                                    1234567{{ $model->qk_code }}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('name') }}</th>
                            <td>{{ $model->first_name }}</td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('last-name') }}</th>
                            <td>{{ $model->last_name }}</td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('birth-date') }}</th>
                            <td>{{ $model->date_of_birth->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('gender') }}</th>
                            <td>{{ $model->gender }}</td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('email') }}</th>
                            <td>{{ $model->email }}</td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('email-confirmed') }}
                            </th>
                            <td>{{ $model->email_verified_at ? $model->email_verified_at->format('d-m-Y, H:i') : '' }}
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('fide-id') }}</th>
                            <td>{{ $model->fide_id }}</td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('accreditation-category') }}
                            </th>
                            <td>
                                {{ $model->accreditationCategory ? getLocale($model->accreditationCategory->name) : '' }}
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('citizenship') }}
                            </th>
                            <td>{{ optional($model->country)->label_en ?? '' }}</td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('passport-number') }}
                            </th>
                            <td>{{ $model->passport_number }}</td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('passport-issue-date') }}
                            </th>
                            <td>{{ $model->passport_issue_date }}</td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('Passport-validity-period') }}
                            </th>
                            <td>{{ $model->passport_expiry_date }}</td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('passport-issuing-authority') }}
                            </th>
                            <td>{{ $model->passport_issuing_authority }}
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('copy-of-passport') }}
                            </th>
                            <td>
                                @if ($model->passport_copy)
                                    <a href="{{ asset($model->passport_copy) }}"
                                        target="_blank">{{ getTranslation('view') }}</a>
                                @else
                                    {{ getTranslation('no-data') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">
                                {{ getTranslation('phone') }}
                            </th>
                            <td>
                                <a href="tel:{{ $model->phone }}" target="_blank">
                                    {{ $model->phone }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">
                                {{ getTranslation('visa-required') }}?
                            </th>
                            <td>
                                {{ $model->requires_visa ? getTranslation('yes') : getTranslation('no') }}
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">
                                {{ getTranslation('arrival-date') }}

                            </th>
                            <td>
                                {{ optional($model->arrival_details)->format('d-m-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">
                                {{ getTranslation('departure-date') }}

                            </th>
                            <td>{{ optional($model->departure_details)->format('d-m-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">
                                {{ getTranslation('accommodation-details') }}
                            </th>
                            <td>
                                {{ getLocale(optional($model->accommodationDetail)->title) ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th width="45%">
                                {{ getTranslation('pcr-test-details') }}
                            </th>
                            <td>{{ $model->pcr_test_details }}</td>
                        </tr>
                        <tr>
                            <th width="45%">
                                {{ getTranslation('status') }}

                            </th>
                            <td>
                                <span
                                    class="badge badge-{{ $model->status == 'unfinished' ? 'secondary' : ($model->status == 'pending' ? 'warning' : ($model->status == 'approved' ? 'success' : 'danger')) }} badge-pill ml-auto">
                                    {{ getTranslation($model->status == 'unfinished' ? 'unfinished' : ($model->status == 'pending' ? 'pending' : ($model->status == 'approved' ? 'approved' : 'canceled'))) }}

                                    <div class="list-icons ml-2">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i
                                                    class="icon-menu7"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- Qabul qilish tugmasi -->
                                                <a href="{{ route('application.status', [$model->id, 'approved'], false) }}"
                                                    class="dropdown-item">
                                                    <i class="icon-checkmark3 text-success"></i>
                                                    {{ getTranslation('acceptance') }}
                                                </a>
                                                <!-- Canceled tugmasi: Modalni ochadi -->
                                                <span href="#" class="dropdown-item canceled-btn" data-toggle="modal"
                                                    data-target="#cancelModal{{ $model->id }}">
                                                    <i class="icon-cross2 text-danger"></i>{{ getTranslation('canceled') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </span>

                                <!-- Canceled Modal (Har bir model uchun alohida) -->
                                <div id="cancelModal{{ $model->id }}" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ getTranslation('reason-for-cancellation') }}:
                                                    {{ $model->first_name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <form action="{{ route('application.cancel', $model->id, false) }}"
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
                            <th width="45%">{{ getTranslation('created') }}</th>
                            <th>{{ $model->created_at->format('d-m-Y, H:i') }}</th>
                        </tr>
                        <tr>
                            <th width="45%">{{ getTranslation('change') }}</th>
                            <th>{{ $model->updated_at->format('d-m-Y, H:i') }}</th>
                        </tr>
                    </tbody>
                </table>
                @if (!is_null($model->applicationCancellations) && $model->applicationCancellations->count() > 0)
                    {{-- <div class="card shadow-sm p-3 mb-3"> --}}
                        <h5 class="card-title text-primary">{{ getTranslation('application_cancellations') }}</h5>
                        <ul class="list-group">
                            @foreach ($model->applicationCancellations as $index => $applicationCancellation)
                                <li class="list-group-item d-flex justify-content-between align-items-center border mb-2">
                                    <span><strong>{{ $index + 1 }}.</strong>
                                        {{ $applicationCancellation->cancel_reason }}</span>
                                    <span class="badge bg-danger">Cancelled,
                                        {{ $applicationCancellation->created_at->format('d-m-Y H:i') }}</span>
                                </li>
                            @endforeach
                        </ul>

                    {{-- </div> --}}
                @endif

            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
