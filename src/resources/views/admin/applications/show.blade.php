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
                <table class="table text-nowrap table-bordered">
                    <tbody>
                        <tr>
                            <th class="text-center">{{ getTranslation('name') }}</th>
                            <td>{{ $model->first_name }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('last-name') }}</th>
                            <td>{{ $model->last_name }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('birth-date') }}</th>
                            <td>{{ $model->date_of_birth->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('gender') }}</th>
                            <td>{{ $model->gender }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('email') }}</th>
                            <td>{{ $model->email }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('email-confirmed') }}
                            </th>
                            <td>{{ $model->email_verified_at ? $model->email_verified_at->format('d-m-Y, H:i') : '' }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('fide-id') }}</th>
                            <td>{{ $model->fide_id }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('accreditation-category') }}
                            </th>
                            <td>
                                {{ $model->accreditationCategory ? getLocale($model->accreditationCategory->name) : '' }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('citizenship') }}
                            </th>
                            <td>{{ optional($model->country)->label_en ?? '' }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('passport-number') }}
                            </th>
                            <td>{{ $model->passport_number }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('passport-issue-date') }}
                            </th>
                            <td>{{ $model->passport_issue_date }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('Passport-validity-period') }}
                            </th>
                            <td>{{ $model->passport_expiry_date }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('passport-issuing-authority') }}
                            </th>
                            <td>{{ $model->passport_issuing_authority }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('copy-of-passport') }}
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
                            <th class="text-center">
                                {{ getTranslation('phone') }}
                            </th>
                            <td>
                                <a href="tel:{{ $model->phone }}" target="_blank">
                                    {{ $model->phone }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">
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
                            <th class="text-center">
                                {{ getTranslation('visa-required') }}?
                            </th>
                            <td>
                                {{ $model->requires_visa ? getTranslation('yes') : getTranslation('no') }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">
                                {{ getTranslation('arrival-date') }}

                            </th>
                            <td>
                                {{ optional($model->arrival_details)->format('d-m-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">
                                {{ getTranslation('departure-date') }}

                            </th>
                            <td>{{ optional($model->departure_details)->format('d-m-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">
                                {{ getTranslation('accommodation-details') }}
                            </th>
                            <td>
                                {{ getLocale(optional($model->accommodationDetail)->title) ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">
                                {{ getTranslation('pcr-test-details') }}
                            </th>
                            <td>{{ $model->pcr_test_details }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">
                                {{ getTranslation('status') }}

                            </th>
                            <td>
                                <span class="badge badge-{{ $model->status == 'unfinished' ? 'secondary' : ($model->status == 'pending' ? 'warning' : ($model->status == 'approved' ? 'success' : 'danger')) }} badge-pill ml-auto">
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
                            <th class="text-center">{{ getTranslation('created') }}</th>
                            <th class="text-center">{{ $model->created_at->format('d-m-Y, H:i') }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('change') }}</th>
                            <th class="text-center">{{ $model->updated_at->format('d-m-Y, H:i') }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
