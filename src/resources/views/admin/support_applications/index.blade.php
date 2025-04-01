@extends('layouts.admin')
@section('title', getTranslation('support_applications'))
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
                            <a href="{{ route('support-applications.create', [], false) }}" class="btn btn-teal">
                                <i class="icon-plus3 icon-1x mr-1"></i>{{ getTranslation('add') }}
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">№</th>
                                    <th class="text-center" width="7%">ID</th>
                                    <th class="text-center">{{ getTranslation('name') }}</th>
                                    <th class="text-center">{{ getTranslation('fide-id') }}</th>
                                    <th class="text-center">{{ getTranslation('email') }}</th>
                                    <th class="text-center">{{ getTranslation('competitions') }}</th>
                                    <th class="text-center">{{ getTranslation('country') }}</th>
                                    <th class="text-center">{{ getTranslation('photo') }}</th>
                                    <th class="text-center" width="10%">{{ getTranslation('status') }}</th>
                                    <th class="text-center" width="5%">{{ getTranslation('function') }}</th>
                                </tr>
                                <form action="{{ route('support-applications.search', [], false) }}" method="get">
                                    <tr>
                                        <th class="text-center">
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="id" placeholder="ID"
                                                value="{{ old('id', request('id')) }}">
                                        </th>
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
                                            <input type="text" class="form-control" name="email"
                                                placeholder="{{ getTranslation('email') }}"
                                                value="{{ old('email', request('email')) }}">
                                        </th>
                                        <th class="text-center">
                                        </th>
                                        <th class="text-center">
                                        </th>
                                        <th class="text-center">
                                        </th>
                                        <th class="text-center">
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
                                        <td>{{ $model->id }}</td>
                                        <td>{{ $model->first_name }}</td>
                                        <td>{{ $model->fide_id }}</td>
                                        <td>{{ $model->email }}</td>
                                        <td>{{ getLocale($model->tournament->name ?? 'N/A') }}</td>
                                        <td>{{ $model->country?->label_en }}</td>
                                        <td>
                                            @if ($model->photo)
                                                <img src="{{ asset($model->photo) }}" width="100px" alt="Photo">
                                            @else
                                                {{ getTranslation('no-photo') }}
                                            @endif
                                        </td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $model->status == 'unfinished' ? 'secondary' : ($model->status == 'pending' ? 'warning' : ($model->status == 'approved' ? 'success' : 'danger')) }} badge-pill ml-auto">
                                                {{ getTranslation($model->status == 'unfinished' ? 'unfinished' : ($model->status == 'pending' ? 'pending' : ($model->status == 'approved' ? 'approved' : 'canceled'))) }}
                                        </td>
                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('support-applications.show', $model->id, false) }}"
                                                    class="btn btn-outline-info">
                                                    <i class="icon-eye8"></i>
                                                </a>
                                                <a href="{{ route('support-applications.edit', $model->id, false) }}"
                                                    class="btn btn-outline-success ml-2">
                                                    <i class="icon-pencil3"></i>
                                                </a>
                                                <button type="button" class="btn btn-outline-danger ml-2"
                                                    data-toggle="modal" data-target="#modal_full{{ $model->id }}">
                                                    <i class="icon-trash"></i>
                                                </button>
                                                <!-- Full width modal -->
                                                <div id="modal_full{{ $model->id }}" class="modal fade" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">×</button>
                                                            </div>
                                                            <form
                                                                action="{{ route('support-applications.destroy', $model->id, false) }}"
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
                                                                        data-dismiss="modal">
                                                                        {{ getTranslation('close') }}
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">
                                                                        {{ getTranslation('confirm') }}
                                                                    </button>
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
