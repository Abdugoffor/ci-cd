@extends('layouts.admin')
@section('title', getTranslation('contacts'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Support tickets -->
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
                            <a href="{{ route('contacts.create', [], false) }}" class="btn btn-teal">
                                <i class="icon-plus3 icon-1x mr-1"></i>{{ getTranslation('add') }}
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>{{ getTranslation('title') }}</th>
                                    <th>{{ getTranslation('path') }}</th>
                                    <th>{{ getTranslation('photo') }}</th>
                                    <th>{{ getTranslation('status') }}</th>
                                    <th>{{ getTranslation('function') }}</th>
                                    <th>{{ getTranslation('history') }}</th>
                                </tr>
                                <form action="{{ route('contacts.search', [], false) }}" method="get">
                                    @csrf
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="{{ getTranslation('title') }}"
                                                value="{{ old('title', request('title')) }}">
                                        </th>
                                        <th></th>
                                        <th></th>
                                        <th>
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
                                        <th></th>
                                        <th><button class="btn btn-teal">{{ getTranslation('search') }}</button></th>
                                    </tr>
                                </form>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}</td>
                                        <td>
                                            {{ getLocale($model->title) }}
                                        </td>
                                        <td>
                                            <a href="{{ $model->path }}" target="_blank">
                                                {{ getTranslation('path') }}
                                            </a>
                                        </td>
                                        <td>
                                            <img src="{{ asset($model->photo) }}" width="100px" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ route('contacts.status', $model->id, false) }}"
                                                class="badge badge-{{ $model->is_active ? 'primary' : 'danger' }}">
                                                {{ $model->is_active ? getTranslation('assets') : getTranslation('not-active') }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('contacts.show', $model->id, false) }}"
                                                    class="btn btn-outline-info">
                                                    <i class="icon-eye8"></i>
                                                </a>

                                                <a href="{{ route('contacts.edit', $model->id, false) }}"
                                                    class="btn btn-sm btn-outline-success ml-2">
                                                    <i class="icon-pencil3"></i>
                                                </a>

                                                <button type="button" class="btn btn-sm btn-outline-danger ml-2"
                                                    data-toggle="modal" data-target="#modal_full{{ $model->id }}"><i
                                                        class="icon-trash"></i>
                                                </button>
                                                <!-- Full width modal -->
                                                <div id="modal_full{{ $model->id }}" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">{{ getTranslation('contacts') }}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <form
                                                                action="{{ route('contacts.destroy', $model->id, false) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <h3>{{ getTranslation('do-you-want-to-delete') }}?
                                                                            </h3>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer">
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
                                            </div>
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
