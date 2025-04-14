@extends('layouts.admin')
@section('title', getTranslation('zones'))
@section('content')
    <!-- Content area -->
    <div class="content">
        @if (isset($zone) && $zone->parent_id != null)
            <a href="{{ route('sub-zones.view', $zone->parent_id, false) }}" class="btn btn-outline-secondary mb-3">
                {{ getTranslation('back') }} 
                {{-- {{ isset($zone) ? $zone->title : '' }} --}}
            </a>
            {{-- <a href="#" class="btn btn-sm btn-outline-secondary mb-3">
                {{ isset($zone) ? $zone->title : '' }}
            </a> --}}
        @elseif(isset($zone))
            <a href="{{ route('zones.index', [], false) }}" class="btn btn-outline-secondary mb-3">
                {{ getTranslation('back') }} 
                {{-- {{ isset($zone) ? $zone->title : '' }} --}}
            </a>
            {{-- <a href="#" class="btn btn-sm btn-outline-secondary mb-3">
                {{ isset($zone) ? $zone->title : '' }}
            </a> --}}
        @endif

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
                            @if (isset($zone))
                                <a href="{{ route('sub-zones.create', $zone->id, false) }}" class="btn btn-teal">
                                    <i class="icon-plus3 icon-1x mr-1"></i>{{ getTranslation('add') }}
                                </a>
                            @else
                                <a href="{{ route('zones.create', [], false) }}" class="btn btn-teal">
                                    <i class="icon-plus3 icon-1x mr-1"></i>{{ getTranslation('add') }}
                                </a>
                            @endif

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">№</th>
                                    <th class="text-center">{{ getTranslation('title') }}</th>
                                    <th class="text-center">{{ getTranslation('description') }}</th>
                                    <th class="text-center" width="10%">{{ getTranslation('status') }}</th>
                                    <th class="text-center" width="5%">{{ getTranslation('function') }}</th>
                                </tr>
                                <form action="{{ route('zones.search', [], false) }}" method="get">
                                    @csrf
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="title"
                                                placeholder="{{ getTranslation('title') }}"
                                                value="{{ old('title', request('title')) }}">
                                        </th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="description"
                                                placeholder="{{ getTranslation('description') }}"
                                                value="{{ old('description', request('description')) }}">
                                            @if (isset($zone))
                                                <input type="hidden" name="parent_id" value="{{ $zone->id }}"
                                                    id="">
                                            @endif
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
                                        <td>{{ $model->title }}</td>
                                        <td>
                                            {{ getLocale($model->description) }}
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-{{ $model->is_active ? 'primary' : 'danger' }}">
                                                {{ $model->is_active ? getTranslation('assets') : getTranslation('not-active') }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('sub-zones.view', $model->id, false) }}"
                                                    class="btn btn-outline-secondary ml-2">
                                                    {{ getTranslation('sub_zone_view') }}
                                                </a>
                                                <a href="{{ route('zones.show', $model->id, false) }}"
                                                    class="btn btn-outline-info ml-2">
                                                    <i class="icon-eye8"></i>
                                                </a>
                                                <a href="{{ route('zones.edit', $model->id, false) }}"
                                                    class="btn btn-outline-success ml-2">
                                                    <i class="icon-pencil3"></i>
                                                </a>

                                                <button type="button" class="btn btn-outline-danger ml-2"
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

                                                            <form action="{{ route('zones.destroy', $model->id, false) }}"
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
