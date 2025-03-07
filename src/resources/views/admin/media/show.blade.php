@extends('layouts.admin')
@section('title', getTranslation('media'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('media.index', [], false) }}" class="btn btn-sm btn-outline-success">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('media.edit', $model->id, false) }}" class="btn btn-sm btn-outline-success ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <table class="table text-nowrap">
                    <tbody>
                        <tr>
                            <th>{{ getTranslation('photo') }} 1</th>
                            <td><img src="{{ asset($model->photo_1) }}" width="100px" alt=""></td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('photo') }} 2</th>
                            <td><img src="{{ asset($model->photo_2) }}" width="100px" alt=""></td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('photo') }} 3</th>
                            <td><img src="{{ asset($model->photo_3) }}" width="100px" alt=""></td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('photo') }} 4</th>
                            <td><img src="{{ asset($model->photo_4) }}" width="100px" alt=""></td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('photo') }} 5</th>
                            <td><img src="{{ asset($model->photo_5) }}" width="100px" alt=""></td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('photo') }} 6</th>
                            <td><img src="{{ asset($model->photo_6) }}" width="100px" alt=""></td>
                        </tr>
                        <tr>
                            <th>
                                {{ getTranslation('status') }}
                            </th>
                            <td>
                                <a href="{{ route('media.status', $model->id, false) }}"
                                    class="badge badge-{{ $model->is_active ? 'primary' : 'danger' }}">
                                    {{ $model->is_active ? getTranslation('assets') : getTranslation('not-active') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('created') }}</th>
                            <th>{{ $model->created_at->format('d-m-Y, H:i') }}</th>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('change') }}</th>
                            <th>{{ $model->updated_at->format('d-m-Y, H:i') }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
