@extends('layouts.admin')
@section('title', getTranslation('accreditation-categories'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('accreditation-categories.index', [], false) }}" class="btn btn-sm btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('accreditation-categories.edit', $model->id, false) }}" class="btn btn-outline-secondary ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">
                <table class="table text-nowrap table-bordered">
                    <tbody>
                        <tr>
                            <th>{{ getTranslation('name') }}</th>
                            <td>{{ getLocale($model->name) }}</td>
                        </tr>
                        <tr>
                            <th>
                                {{ getTranslation('status') }}

                            </th>
                            <td>
                                <a href="{{ route('accreditation-categories.status', $model->id, false) }}"
                                    class="badge badge-{{ $model->is_active ? 'primary' : 'danger' }}">
                                    {{ $model->is_active ? getTranslation('assets') : getTranslation('not-active') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ getTranslation('color') }}

                            </th>
                            <td>
                                <span style="background: linear-gradient({{ $model->color }});width:100px;">color</span>
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
