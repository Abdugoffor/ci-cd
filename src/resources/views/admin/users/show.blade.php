@extends('layouts.admin')
@section('title', getTranslation('users'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('users.index', [], false) }}" class="btn btn-sm btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('users.edit', $model->id, false) }}" class="btn btn-outline-secondary ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <table class="table text-nowrap table-bordered">
                    <tbody>
                        <tr>
                            <th>{{ getTranslation('name') }}</th>
                            <td>{{ $model->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('role') }}</th>
                            <td>{{ $model->role }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('email') }}</th>
                            <td>{{ $model->email }}</td>
                        </tr>
                        <tr>
                            <th>
                                {{ getTranslation('status') }}
                            </th>
                            <td>
                                <span class="badge badge-{{ $model->status ? 'primary' : 'danger' }}">
                                    {{ $model->status ? getTranslation('assets') : getTranslation('not-active') }}
                                </span>
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
