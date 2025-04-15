@extends('layouts.admin')
@section('title', getTranslation('translations'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('translations.index', [], false) }}" class="btn btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('translations.edit', $model->id, false) }}" class="btn btn-outline-secondary ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">

            <div class="card-body">
                <table class="table text-nowrap table-bordered">
                    <tbody>
                        <tr>
                            <th>{{ getTranslation('standard') }}</th>
                            <td>{{ getLocale($model->name) }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('created') }}</th>
                            <th>{{ $model->created_at ? $model->created_at->format('d-m-Y, H:i') : '' }}</th>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('change') }}</th>
                            <th>{{ $model->updated_at ? $model->updated_at->format('d-m-Y, H:i') : '' }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
