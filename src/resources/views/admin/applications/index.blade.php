@extends('layouts.admin')
@section('title', getTranslation('applications'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Support tickets -->
                <div class="card">

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>{{ getTranslation('name') }}</th>
                                    <th>{{ getTranslation('type') }}</th>
                                    <th>{{ getTranslation('birth-date') }}</th>
                                    <th>{{ getTranslation('gender') }}</th>
                                    <th>{{ getTranslation('email') }}</th>
                                    <th>{{ getTranslation('visa-required') }}</th>
                                    <th>{{ getTranslation('registration-end') }}</th>
                                    <th>{{ getTranslation('arrival-date') }}</th>
                                    <th>{{ getTranslation('departure-date') }}</th>
                                    <th>{{ getTranslation('status') }}</th>
                                    <th>{{ getTranslation('view') }}</th>
                                    <th>{{ getTranslation('history') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}</td>
                                        <td>{{ $model->first_name }}</td>
                                        <td>{{ optional($model->accreditationCategory)->name['uz'] ?? '' }}</td>
                                        <td>
                                            {{ $model->date_of_birth }}
                                        </td>
                                        <td>
                                            {{ $model->gender }}
                                        </td>
                                        <td>
                                            {{ $model->email }}
                                        </td>
                                        <td>
                                            {{ $model->requires_visa ? 'Да' : 'Нет' }}
                                        </td>
                                        <td>
                                            {{ $model->email_verified_at ? $model->email_verified_at->format('d-m-Y, H:i') : '' }}
                                        </td>
                                        <td>
                                            {{ $model->arrival_details ? $model->arrival_details->format('d-m-Y') : '' }}
                                        </td>
                                        <td>
                                            {{ $model->departure_details ? $model->departure_details->format('d-m-Y') : '' }}
                                        </td>
                                        <td>
                                            <span class="badge badge-teal badge-pill ml-auto">
                                                {{ $model->status }}
                                                <div class="list-icons ml-2">
                                                    <div class="dropdown">
                                                        <a href="#" class="list-icons-item" data-toggle="dropdown"><i
                                                                class="icon-menu7"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <!-- Qabul qilish tugmasi -->
                                                            <a href="{{ route('application.status', [$model->id, 'approved']) }}"
                                                                class="dropdown-item">
                                                                <i class="icon-checkmark3 text-success"></i>{{ getTranslation('acceptance') }}
                                                            </a>
                                                            <!-- Canceled tugmasi: Modalni ochadi -->
                                                            <span href="#" class="dropdown-item canceled-btn"
                                                                data-toggle="modal"
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
                                                            <h5 class="modal-title">{{ getTranslation('reason-for-cancellation') }}:
                                                                {{ $model->first_name }}</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <form action="{{ route('application.cancel', $model->id) }}"
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
                                        <td>
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal_full{{ $model->id }}">
                                                <i class="icon-eye8"></i>
                                            </button>
                                            <!-- Full width modal -->
                                            <div id="modal_full{{ $model->id }}" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{ getTranslation('application') }}
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="table table-bordered">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>{{ getTranslation('name') }}</th>
                                                                                <td>{{ $model->first_name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('last-name') }}</th>
                                                                                <td>{{ $model->last_name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('birth-date') }}</th>
                                                                                <td>{{ $model->date_of_birth }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('gender') }}</th>
                                                                                <td>{{ $model->gender }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('email') }}</th>
                                                                                <td>{{ $model->email }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('email-confirmed') }}
                                                                                </th>
                                                                                <td>{{ $model->email_verified_at ? $model->email_verified_at->format('d-m-Y, H:i') : '' }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('fide-id') }}</th>
                                                                                <td>{{ $model->fide_id }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('accreditation-category') }}
                                                                                </th>
                                                                                <td>{{ $model->accreditation_category_id }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('citizenship') }}
                                                                                </th>
                                                                                <td>{{ $model->citizenship }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('passport-number') }}
                                                                                </th>
                                                                                <td>{{ $model->passport_number }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('passport-issue-date') }}
                                                                                </th>
                                                                                <td>{{ $model->passport_issue_date }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('Passport-validity-period') }}
                                                                                </th>
                                                                                <td>{{ $model->passport_expiry_date }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('passport-issuing-authority') }}
                                                                                </th>
                                                                                <td>{{ $model->passport_issuing_authority }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('copy-of-passport') }}
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
                                                                                <th>
                                                                                    {{ getTranslation('phone') }}
                                                                                </th>
                                                                                <td>{{ $model->phone }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ getTranslation('photo') }}
                                                                                </th>
                                                                                <td>
                                                                                    @if ($model->photo)
                                                                                        <img src="{{ asset($model->photo) }}"
                                                                                            alt="Фото" width="100">
                                                                                    @else
                                                                                        {{ getTranslation('no-photo') }}
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ getTranslation('visa-required') }}?
                                                                                </th>
                                                                                <td>
                                                                                    {{ $model->requires_visa ? 'Да' : 'Нет' }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ getTranslation('arrival-date') }}

                                                                                </th>
                                                                                <td>{{ optional($model->arrival_details)->format('d-m-Y') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ getTranslation('departure-date') }}

                                                                                </th>
                                                                                <td>{{ optional($model->departure_details)->format('d-m-Y') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>{{ getTranslation('accommodation-details') }}

                                                                                </th>
                                                                                <td>{{ $model->accommodation_details }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ getTranslation('pcr-test-details') }}
                                                                                </th>
                                                                                <td>{{ $model->pcr_test_details }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>
                                                                                    {{ getTranslation('status') }}

                                                                                </th>
                                                                                <td>{{ $model->status }}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal">{{ getTranslation('close') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /full width modal -->
                                        </td>
                                        <td>
                                            {!! historyCheck($model) !!}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /support tickets -->
                {{ $models->links() }}
            </div>
        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /content area -->
@endsection
