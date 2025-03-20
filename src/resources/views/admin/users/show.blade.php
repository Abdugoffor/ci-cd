@extends('layouts.admin')
@section('title', getTranslation('users'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('users.index', [], false) }}" class="btn btn-sm btn-outline-success">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('users.edit', $model->id, false) }}" class="btn btn-outline-success ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <table class="table text-nowrap table-bordered">
                    <tbody>
                        <tr>
                            <th class="text-center">{{ getTranslation('name') }}</th>
                            <td>{{ $model->name }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('role') }}</th>
                            <td>{{ $model->role }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('email') }}</th>
                            <td>{{ $model->email }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">
                                {{ getTranslation('status') }}
                            </th>
                            <td>
                                <a href="{{ route('users.status', $model->id, false) }}"
                                    class="badge badge-{{ $model->status ? 'primary' : 'danger' }}">
                                    {{ $model->status ? getTranslation('assets') : getTranslation('not-active') }}
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
