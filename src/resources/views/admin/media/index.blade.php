@extends('layouts.admin')
@section('title', getTranslation('media'))
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
                            <a href="{{ route('media.create', [], false) }}" class="btn btn-teal">
                                <i class="icon-plus3 icon-1x mr-1"></i>{{ getTranslation('add') }}
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>{{ getTranslation('photo') }} 1</th>
                                    <th>{{ getTranslation('photo') }} 2</th>
                                    <th>{{ getTranslation('photo') }} 3</th>
                                    <th>{{ getTranslation('photo') }} 4</th>
                                    <th>{{ getTranslation('photo') }} 5</th>
                                    <th>{{ getTranslation('photo') }} 6</th>
                                    <th>{{ getTranslation('status') }}</th>
                                    <th>{{ getTranslation('function') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($model->photo_1) }}" width="100px" alt="">
                                        </td>
                                        <td>
                                            <img src="{{ asset($model->photo_1) }}" width="100px" alt="">
                                        </td>
                                        <td>
                                            <img src="{{ asset($model->photo_2) }}" width="100px" alt="">
                                        </td>
                                        <td>
                                            <img src="{{ asset($model->photo_3) }}" width="100px" alt="">
                                        </td>
                                        <td>
                                            <img src="{{ asset($model->photo_4) }}" width="100px" alt="">
                                        </td>
                                        <td>
                                            <img src="{{ asset($model->photo_5) }}" width="100px" alt="">
                                        </td>
                                        <td>
                                            <img src="{{ asset($model->photo_6) }}" width="100px" alt="">
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('media.status', $model->id, false) }}"
                                                class="badge badge-{{ $model->is_active ? 'primary' : 'danger' }}">
                                                {{ $model->is_active ? getTranslation('assets') : getTranslation('not-active') }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('media.edit', $model->id, false) }}"
                                                    class="btn btn-sm btn-outline-success">
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
                                                                <h5 class="modal-title">{{ getTranslation('language') }}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <form action="{{ route('media.destroy', $model->id, false) }}"
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
                                            {{-- {!! historyCheck($model) !!} --}}
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
