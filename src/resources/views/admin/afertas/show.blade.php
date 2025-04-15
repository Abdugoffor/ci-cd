@extends('layouts.admin')
@section('title', getTranslation('aferta'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('aferta.index', [], false) }}" class="btn btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('aferta.edit', $model->id, false) }}" class="btn btn-outline-secondary ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <table class="table text-nowrap table-bordered">
                    <tbody>
                        <tr>
                            <th>{{ getTranslation('text') }}</th>
                            <td>{!! getLocale($model->text) !!}</td>
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
