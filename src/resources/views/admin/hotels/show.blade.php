@extends('layouts.admin')
@section('title', getTranslation('hotels'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('hotels.index', [], false) }}" class="btn btn-sm btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('hotels.edit', $model->id, false) }}" class="btn btn-outline-secondary ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">
                <table class="table text-nowrap table-bordered">
                    <tbody>
                        <tr>
                            <th class="text-center">{{ getTranslation('title') }}</th>
                            <td>{{ getLocale($model->title) }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('description') }}</th>
                            <td>{{ getLocale($model->description) }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('text') }}</th>
                            <td>{!! getLocale($model->text) !!}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('photo') }}</th>
                            <td><img src="{{ asset($model->photo) }}" width="100px" alt=""></td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('rating') }}</th>
                            <td>{{ $model->rating }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('location') }}</th>
                            <td>
                                {{ $model->location }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('phone') }}</th>
                            <td>
                                <a href="tel:{{ $model->phone }}" target="_blank">{{ $model->phone }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('status') }}</th>
                            <td>
                                <span class="badge badge-{{ $model->is_active ? 'primary' : 'danger' }}">
                                    {{ $model->is_active ? getTranslation('assets') : getTranslation('not-active') }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('created') }}</th>
                            <th class="text-center">
                                {{ $model->created_at ? $model->created_at->format('d-m-Y, H:i') : '' }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('change') }}</th>
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
