@extends('layouts.admin')
@section('title', getTranslation('faqs'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('faqs.index', [], false) }}" class="btn btn-sm btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('faqs.edit', $model->id, false) }}" class="btn btn-outline-secondary ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">
                <table class="table text-nowrap table-bordered">
                    <tbody>
                        <tr>
                            <th>{{ getTranslation('question') }}</th>
                            <td>{{ getLocale($model->question) }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('answer') }}</th>
                            <td>{{ getLocale($model->answer) }}</td>
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
                            <td>
                                {{ $model->created_at ? $model->created_at->format('d-m-Y, H:i') : '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('change') }}</th>
                            <td>
                                {{ $model->updated_at ? $model->updated_at->format('d-m-Y, H:i') : '' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
