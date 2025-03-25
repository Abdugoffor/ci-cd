@extends('layouts.admin')
@section('title', getTranslation('applications'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Support tickets -->
                <a href="{{ route('participant.export', [], false) }}" class="btn btn-primary m-2">
                    Export
                </a>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">{{ getTranslation('name') }}</th>
                                    <th class="text-center">{{ getTranslation('fide-id') }}</th>
                                    <th class="text-center">{{ getTranslation('type') }}</th>
                                    <th class="text-center">{{ getTranslation('birth-date') }}</th>
                                    <th class="text-center">{{ getTranslation('email') }}</th>
                                    <th class="text-center">{{ getTranslation('registration-end') }}</th>
                                    <th class="text-center">{{ getTranslation('status') }}</th>
                                    <th class="text-center">{{ getTranslation('function') }}</th>
                                </tr>
                                <form action="{{ route('application.search', [], false) }}" method="get">
                                    @csrf
                                    <tr>
                                        <th class="text-center">
                                            <input type="number" class="form-control" name="id" placeholder="ID"
                                                value="{{ old('id', request('id')) }}">
                                        </th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="first_name"
                                                placeholder="{{ getTranslation('name') }}"
                                                value="{{ old('first_name', request('first_name')) }}">
                                        </th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="fide_id"
                                                placeholder="{{ getTranslation('fide-id') }}"
                                                value="{{ old('fide_id', request('fide_id')) }}">
                                        </th>
                                        <th class="text-center">
                                            <select class="form-control custom-select" name="accreditation_category_id"
                                                id="select_date">
                                                <option></option>
                                                @foreach ($accreditationCategories as $categories)
                                                    <option value="{{ $categories->id }}">
                                                        {{ getLocale($categories->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <th class="text-center">
                                            <input type="date" class="form-control" name="date_of_birth"
                                                value="{{ old('date_of_birth', request('date_of_birth')) }}">
                                        </th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="email"
                                                placeholder="{{ getTranslation('email') }}"
                                                value="{{ old('email', request('email')) }}">
                                        </th>
                                        <th class="text-center">
                                            <input type="date" class="form-control" name="updated_at"
                                                value="{{ old('updated_at', request('updated_at')) }}">
                                        </th>
                                        <th class="text-center">
                                            <select class="form-control custom-select" name="status" id="select_date">
                                                <option></option>
                                                <option value="unfinished"
                                                    {{ old('status', request('status')) === 'unfinished' ? 'selected' : '' }}>
                                                    {{ getTranslation('unfinished') }}
                                                </option>
                                                <option value="pending"
                                                    {{ old('status', request('status')) === 'pending' ? 'selected' : '' }}>
                                                    {{ getTranslation('pending') }}
                                                </option>
                                                <option value="approved"
                                                    {{ old('status', request('status')) === 'approved' ? 'selected' : '' }}>
                                                    {{ getTranslation('approved') }}
                                                </option>
                                                <option value="canceled"
                                                    {{ old('status', request('status')) === 'canceled' ? 'selected' : '' }}>
                                                    {{ getTranslation('canceled') }}
                                                </option>
                                            </select>
                                        </th>
                                        <th class="text-center"><button
                                                class="btn btn-teal">{{ getTranslation('search') }}</button></th>
                                    </tr>
                                </form>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}</td>
                                        <td>{{ $model->first_name }}</td>
                                        <td>{{ $model->fide_id }}</td>
                                        <td>
                                            {{ $model->accreditationCategory ? getLocale($model->accreditationCategory->name) : '' }}
                                        </td>
                                        <td>
                                            {{ $model->date_of_birth->format('d-m-Y') }}
                                        </td>
                                        <td>
                                            {{ $model->email }}
                                        </td>
                                        <td>
                                            {{ $model->email_verified_at ? $model->email_verified_at->format('d-m-Y, H:i') : '' }}
                                        </td>
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
                                                            <span href="#" class="dropdown-item canceled-btn"
                                                                data-toggle="modal"
                                                                data-target="#cancelModal{{ $model->id }}">
                                                                <i
                                                                    class="icon-cross2 text-danger"></i>{{ getTranslation('canceled') }}
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
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
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
                                        <td>
                                            <a href="{{ route('application.show', $model->id, false) }}"
                                                class="btn btn-outline-info mr-2">
                                                <i class="icon-eye8"></i>
                                            </a>
                                            {!! historyCheck($model) !!}
                                            {{-- <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                                data-target="#modal_full{{ $model->id }}">
                                                <i class="icon-eye8"></i>
                                            </button> --}}
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
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('name') }}</th>
                                                                                <td>{{ $model->first_name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('last-name') }}</th>
                                                                                <td>{{ $model->last_name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('birth-date') }}</th>
                                                                                <td>{{ $model->date_of_birth }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('gender') }}</th>
                                                                                <td>{{ $model->gender }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('email') }}</th>
                                                                                <td>{{ $model->email }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('email-confirmed') }}
                                                                                </th>
                                                                                <td>{{ $model->email_verified_at ? $model->email_verified_at->format('d-m-Y, H:i') : '' }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('fide-id') }}</th>
                                                                                <td>{{ $model->fide_id }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('accreditation-category') }}
                                                                                </th>
                                                                                <td>
                                                                                    {{ $model->accreditationCategory ? getLocale($model->accreditationCategory->name) : '' }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('citizenship') }}
                                                                                </th>
                                                                                <td>{{ $model->citizenship }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('passport-number') }}
                                                                                </th>
                                                                                <td>{{ $model->passport_number }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('passport-issue-date') }}
                                                                                </th>
                                                                                <td>{{ $model->passport_issue_date }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('Passport-validity-period') }}
                                                                                </th>
                                                                                <td>{{ $model->passport_expiry_date }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('passport-issuing-authority') }}
                                                                                </th>
                                                                                <td>{{ $model->passport_issuing_authority }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('copy-of-passport') }}
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
                                                                                <td>{{ $model->phone }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
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
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('visa-required') }}?
                                                                                </th>
                                                                                <td>
                                                                                    {{ $model->requires_visa ? 'Да' : 'Нет' }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    {{ getTranslation('arrival-date') }}

                                                                                </th>
                                                                                <td>{{ optional($model->arrival_details)->format('d-m-Y') }}
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
                                                                                <td>{{ getLocale(optional($model->accommodationDetail)->title) ?? '' }}
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
                                                                                <td>{{ getTranslation($model->status) }}
                                                                                </td>
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
