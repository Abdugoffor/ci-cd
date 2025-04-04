@extends('layouts.admin')
@section('title', getTranslation('competitions'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-12">
                @if (session('notification'))
                    <div class="alert bg-teal text-white alert-rounded alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        <span class="font-weight-semibold">{{ session('notification') }}</span>
                    </div>
                @endif
                <div class="card">

                    <div class="card-body d-lg-flex align-items-lg-center justify-content-lg-between flex-lg-wrap">
                        <div class="d-flex align-items-center mb-3 mb-lg-0">

                        </div>

                        <div class="d-flex align-items-center mb-3 mb-lg-0">

                        </div>

                        <div class="d-flex align-items-center mb-3 mb-lg-0">

                        </div>

                        <div>
                            <a href="{{ route('tournaments.create', [], false) }}" class="btn btn-teal">
                                <i class="icon-plus3 icon-1x mr-1"></i>{{ getTranslation('add') }}
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">№</th>
                                    <th class="text-center">{{ getTranslation('name') }}</th>
                                    <th class="text-center">{{ getTranslation('competition-type') }}</th>
                                    <th class="text-center">{{ getTranslation('country') }}</th>
                                    <th class="text-center">{{ getTranslation('start-of-registration') }}</th>
                                    <th class="text-center">{{ getTranslation('view') }}</th>
                                    <th class="text-center" width="10%">{{ getTranslation('status') }}</th>
                                    <th class="text-center" width="5%">{{ getTranslation('function') }}</th>
                                </tr>
                                <form action="{{ route('tournaments.search', [], false) }}" method="get">
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="{{ getTranslation('name') }}"
                                                value="{{ old('name', request('name')) }}">
                                        </th>
                                        <th class="text-center">
                                            <select class="form-control custom-select" name="category_id"
                                                id="select_category">
                                                <option value="">{{ getTranslation('all_categories') }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id', request('category_id')) == $category->id ? 'selected' : '' }}>
                                                        {{ getLocale($category->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <th class="text-center">
                                            <select class="form-control custom-select" name="country_id"
                                                id="select_country">
                                                <option></option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ old('country_id', request('country_id')) == $country->id ? 'selected' : '' }}>
                                                        {{ $country->label_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <th class="text-center">
                                            <input type="date" class="form-control" name="registration_start"
                                                value="{{ old('registration_start', request('registration_start')) }}">
                                        </th>
                                        <th class="text-center">
                                            <select class="form-control custom-select" name="is_active" id="select_date">
                                                <option value="">{{ getTranslation('all') }}</option>
                                                <option value="true"
                                                    {{ old('is_active', request('is_active')) === 'true' ? 'selected' : '' }}>
                                                    {{ getTranslation('yes') }}
                                                </option>
                                                <option value="false"
                                                    {{ old('is_active', request('is_active')) === 'false' ? 'selected' : '' }}>
                                                    {{ getTranslation('no') }}
                                                </option>
                                            </select>
                                        </th>
                                        <th class="text-center">
                                            <select class="form-control custom-select" name="status" id="select_status">
                                                <option value="">{{ getTranslation('all_statuses') }}</option>
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

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3">
                                                    <img src="{{ asset($model->logo) }}"
                                                        class="btn btn-teal rounded-pill btn-icon btn-sm" alt="">
                                                    </a>
                                                </div>
                                                <div>
                                                    {{ getLocale($model->name) }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ getLocale($model->category->name) }}
                                        </td>
                                        <td>
                                            {{ $model->country->label_en }}
                                        </td>
                                        <td>
                                            {{ $model->registration_start->format('d-m-Y') }}
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $model->is_active ? 'primary' : 'danger' }}">
                                                {{ $model->is_active ? getTranslation('yes') : getTranslation('no') }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-teal badge-pill ml-auto">
                                                {{ getTranslation($model->status) }}
                                                <div class="list-icons ml-2">
                                                    <div class="dropdown">
                                                        <a href="#" class="list-icons-item" data-toggle="dropdown"><i
                                                                class="icon-menu7"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="{{ route('status.update', [$model->id, 'pending'], false) }}"
                                                                class="dropdown-item">
                                                                {{ getTranslation('pending') }}
                                                            </a>
                                                            <a href="{{ route('status.update', [$model->id, 'ongoing'], false) }}"
                                                                class="dropdown-item">
                                                                {{ getTranslation('ongoing') }}
                                                            </a>
                                                            <a href="{{ route('status.update', [$model->id, 'completed'], false) }}"
                                                                class="dropdown-item">
                                                                {{ getTranslation('completed') }}
                                                            </a>
                                                            <a href="{{ route('status.update', [$model->id, 'canceled'], false) }}"
                                                                class="dropdown-item">
                                                                {{ getTranslation('canceled') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('tournaments.show', $model->id, false) }}"
                                                class="btn btn-outline-info">
                                                <i class="icon-eye8"></i>
                                            </a>
                                            <a href="{{ route('tournaments.edit', $model->id, false) }}"
                                                class="btn btn-sm btn-outline-success ml-1">
                                                <i class="icon-pencil3"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger ml-1"
                                                data-toggle="modal" data-target="#modal_full{{ $model->id }}"><i
                                                    class="icon-trash"></i>
                                            </button>
                                            <!-- Full width modal -->
                                            <div id="modal_full{{ $model->id }}" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            {{-- <h5 class="modal-title">{{ getTranslation('competitions') }}
                                                            </h5> --}}
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <form
                                                            action="{{ route('tournaments.destroy', $model->id, false) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h3 class="text-center">
                                                                            {{ getTranslation('do-you-want-to-delete') }}
                                                                        </h3>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="modal-footer d-flex justify-content-center pb-4">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal"
                                                                    data-dashlane-label="true">{{ getTranslation('close') }}</button>
                                                                <button type="submit" class="btn btn-danger"
                                                                    data-dashlane-label="true">{{ getTranslation('confirm') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /full width modal -->
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
