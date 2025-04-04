@extends('layouts.admin')
@section('title', getTranslation('competitions'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('tournaments.index', [], false) }}" class="btn btn-sm btn-outline-secondary">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('tournaments.edit', $model->id, false) }}" class="btn btn-outline-secondary ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <table class="table text-nowrap table-bordered">
                    <thead>
                        <tr>
                            <th>{{ getTranslation('name') }}</th>
                            <td>{{ getLocale($model->name) }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('title') }}</th>
                            <td>{{ getLocale($model->title) }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('description') }}</th>
                            <td>{!! getLocale($model->description) !!}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('category') }}</th>
                            <td>{{ getLocale($model->category->name) }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('country') }}</th>
                            <td>{{ $model->country->label_en }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('start-of-registration') }}</th>
                            <td>{{ $model->registration_start->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('registration-completed') }}</th>
                            <td>{{ $model->registration_end->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('start') }}</th>
                            <td>{{ $model->start_date->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('finished') }}</th>
                            <td>{{ $model->end_date->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('logo') }}</th>
                            <td><img src="{{ asset($model->logo) }}" width="100px" alt="">
                            </td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('status') }}</th>
                            <td>
                                <span class="badge badge-teal badge-pill ml-auto">
                                    {{ getTranslation($model->status) }}
                                    <div class="list-icons ml-2">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i
                                                    class="icon-menu7"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('status.update', [$model->id, 'pending'], false) }}"
                                                    class="dropdown-item">
                                                    {{ getTranslation('pending') }}
                                                </a>
                                                <a href="{{ route('status.update', [$model->id, 'ongoing'], false) }}"
                                                    class="dropdown-item">
                                                    {{ getTranslation('ongoing') }}
                                                </a>
                                                <a href="{{ route('status.update', [$model->id, 'completed'], false) }}"
                                                    class="dropdown-item">
                                                    {{ getTranslation('completed') }}
                                                </a>
                                                <a href="{{ route('status.update', [$model->id, 'canceled'], false) }}"
                                                    class="dropdown-item">
                                                    {{ getTranslation('canceled') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('participants') }}</th>
                            <td>
                                <h6 class="mb-0">{{ $model->participants()->count() }}</h6>
                                <div class="font-size-sm text-muted line-height-1">
                                    {{ getTranslation('participants') }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('created') }}</th>
                            <td>{{ $model->created_at->format('d-m-Y, H:i') }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('change') }}</th>
                            <td>{{ $model->updated_at->format('d-m-Y, H:i') }}</td>
                        </tr>
                        <tr>
                            <th>{{ getTranslation('view') }}</th>
                            <td>
                                <span class="badge badge-{{ $model->is_active ? 'primary' : 'danger' }}">
                                    {{ $model->is_active ? getTranslation('yes') : getTranslation('no') }}
                                </span>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
