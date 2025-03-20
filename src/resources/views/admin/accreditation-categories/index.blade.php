@extends('layouts.admin')
@section('title', getTranslation('accreditation-categories'))
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
                            <div class="ml-3">
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mb-lg-0">
                        </div>

                        <div class="d-flex align-items-center mb-3 mb-lg-0">
                        </div>

                        <div>
                            <a href="{{ route('accreditation-categories.create', [], false) }}" class="btn btn-teal">
                                <i class="icon-plus3 icon-1x mr-1"></i>{{ getTranslation('add') }}
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">№</th>
                                    <th class="text-center">{{ getTranslation('name') }}</th>
                                    <th class="text-center">{{ getTranslation('status') }}</th>
                                    <th class="text-center">{{ getTranslation('function') }}</th>
                                </tr>
                                <form action="{{ route('accreditation-categories.search', [], false) }}" method="get">
                                    @csrf
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="{{ getTranslation('name') }}"
                                                value="{{ old('name', request('name')) }}">
                                        </th>
                                        <th class="text-center">
                                            <select class="form-control custom-select" name="is_active" id="select_date">
                                                <option value=""></option>
                                                <option value="true"
                                                    {{ old('is_active', request('is_active')) === 'true' ? 'selected' : '' }}>
                                                    {{ getTranslation('assets') }}
                                                </option>
                                                <option value="false"
                                                    {{ old('is_active', request('is_active')) === 'false' ? 'selected' : '' }}>
                                                    {{ getTranslation('not-active') }}
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
                                        <td>{{ getLocale($model->name) }}</td>
                                        <td>
                                            <a href="{{ route('accreditation-categories.status', $model->id, false) }}"
                                                class="badge badge-{{ $model->is_active ? 'primary' : 'danger' }}">
                                                {{ $model->is_active ? getTranslation('assets') : getTranslation('not-active') }}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('accreditation-categories.show', $model->id, false) }}"
                                                    class="btn btn-outline-info">
                                                    <i class="icon-eye8"></i>
                                                </a>
                                                <a href="{{ route('accreditation-categories.edit', $model->id, false) }}"
                                                    class="btn btn-outline-success ml-2">
                                                    <i class="icon-pencil3"></i>
                                                </a>

                                                {{-- <button type="button" class="btn btn-outline-danger ml-2"
                                                    data-toggle="modal" data-target="#modal_full{{ $model->id }}"><i
                                                        class="icon-trash"></i>
                                                </button> --}}
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
                                                                action="{{ route('accreditation-categories.destroy', $model->id, false) }}"
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

                                                                <div
                                                                    class="modal-footer d-flex justify-content-center pb-4">
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
                                            </div>
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
