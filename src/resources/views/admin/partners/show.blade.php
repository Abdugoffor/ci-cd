@extends('layouts.admin')
@section('title', getTranslation('partners'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('partners.index', [], false) }}" class="btn btn-sm btn-outline-success">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('partners.edit', $model->id, false) }}" class="btn btn-outline-success ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <table class="table text-nowrap table-bordered">
                    <tbody>
                        <tr>
                            <th class="text-center">{{ getTranslation('name') }}</th>
                            <td>{{ getLocale($model->name) }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('path') }}</th>
                            <td>
                                <a href="{{ $model->path }}" target="_blank">
                                    {{ $model->path ? getTranslation('path') : '-' }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('photo') }}</th>
                            <td>
                                <img src="{{ asset($model->photo) }}" width="100px" alt="">
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">
                                {{ getTranslation('status') }}
                            </th>
                            <td>
                                <a href="{{ route('partners.status', $model->id, false) }}"
                                    class="badge badge-{{ $model->is_active ? 'primary' : 'danger' }}">
                                    {{ $model->is_active ? getTranslation('assets') : getTranslation('not-active') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('created') }}</th>
                            <th class="text-center">{{ $model->created_at->format('d-m-Y, H:i') }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('change') }}</th>
                            <th class="text-center">{{ $model->updated_at->format('d-m-Y, H:i') }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
