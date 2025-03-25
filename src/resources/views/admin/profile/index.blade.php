@extends('layouts.admin')
@section('title', getTranslation('users'))
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
                            <a href="{{ route('users.create', [], false) }}" class="btn btn-teal">
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
                                    <th class="text-center">{{ getTranslation('role') }}</th>
                                    <th class="text-center">{{ getTranslation('email') }}</th>
                                    <th class="text-center" width="10%">{{ getTranslation('status') }}</th>
                                    <th class="text-center" width="5%">{{ getTranslation('function') }}</th>
                                    <th class="text-center">{{ getTranslation('history') }}</th>
                                </tr>
                                <form action="{{ route('users.search', [], false) }}" method="get">
                                    @csrf
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="{{ getTranslation('name') }}">
                                        </th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="email"
                                                placeholder="{{ getTranslation('email') }}">
                                        </th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="email"
                                                placeholder="{{ getTranslation('email') }}">
                                        </th>
                                        <th class="text-center">
                                            <select class="form-control custom-select" name="is_active" id="select_date">
                                                <option></option>
                                                <option value="true">
                                                    {{ getTranslation('assets') }}
                                                </option>
                                                <option value="false">
                                                    {{ getTranslation('not-active') }}</option>
                                            </select>
                                        </th>
                                        <th class="text-center"></th>
                                        <th class="text-center"><button class="btn btn-teal">{{ getTranslation('search') }}</button></th>
                                    </tr>
                                </form>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}</td>
                                        <td>{{ $model->name }}</td>
                                        <td>
                                            {{ $model->role }}
                                        </td>
                                        <td>
                                            {{ $model->email }}
                                        </td>
                                        <td>
                                            <a href="{{ route('users.status', $model->id, false) }}"
                                                class="badge badge-{{ $model->status ? 'primary' : 'danger' }}">
                                                {{ $model->status ? getTranslation('assets') : getTranslation('not-active') }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('users.edit', $model->id, false) }}"
                                                    class="btn btn-sm btn-outline-success">
                                                    <i class="icon-pencil3"></i>
                                                </a>

                                                <button type="button" class="btn btn-outline-danger ml-2"
                                                    data-toggle="modal" data-target="#modal_full{{ $model->id }}"><i
                                                        class="icon-trash"></i>
                                                </button>
                                                <!-- Full width modal -->
                                                <div id="modal_full{{ $model->id }}" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">{{ getTranslation('users') }}</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <form action="{{ route('users.destroy', $model->id, false) }}"
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
