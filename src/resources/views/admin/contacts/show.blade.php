@extends('layouts.admin')
@section('title', getTranslation('contacts'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('contacts.index', [], false) }}" class="btn btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('contacts.edit', $model->id, false) }}" class="btn btn-outline-secondary ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">
                <table class="table text-nowrap table-bordered">
                    <tbody>
                        <tr>
                            <th>{{ getTranslation('title') }}</th>
                            <td>{{ getLocale($model->title) }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('path') }}</th>
                            <td><a href="{{ $model->path }}" target="_blank">{{ getTranslation('path') }}</a></td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('photo') }}</th>
                            <td><img src="{{ asset($model->photo) }}" width="100px" alt=""></td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('status') }}</th>
                            <td>
                                <span class="badge badge-{{ $model->is_active ? 'primary' : 'danger' }}">
                                    {{ $model->is_active ? getTranslation('assets') : getTranslation('not-active') }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('created') }}</th>
                            <th class="text-center">
                                {{ $model->created_at ? $model->created_at->format('d-m-Y, H:i') : '' }}</th>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('change') }}</th>
                            <th class="text-center">
                                {{ $model->updated_at ? $model->updated_at->format('d-m-Y, H:i') : '' }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
