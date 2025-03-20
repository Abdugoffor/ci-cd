@extends('layouts.admin')
@section('title', getTranslation('competitions'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="d-inline-flex gap-2">
            <a href="{{ route('tournaments.index', [], false) }}" class="btn btn-sm btn-outline-success">
                {{ getTranslation('back') }}
            </a>
            <a href="{{ route('tournaments.edit', $model->id, false) }}" class="btn btn-outline-success ml-2">
                {{ getTranslation('change') }}
            </a>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <table class="table text-nowrap table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ getTranslation('name') }}</th>
                            <th class="text-center">{{ getLocale($model->name) }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('title') }}</th>
                            <th class="text-center">{{ getLocale($model->title) }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('description') }}</th>
                            <th class="text-center">{!! getLocale($model->description) !!}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('category') }}</th>
                            <th class="text-center">{{ getLocale($model->category->name) }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('country') }}</th>
                            <th class="text-center">{{ $model->country->label_en }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('start-of-registration') }}</th>
                            <th class="text-center">{{ $model->registration_start->format('d-m-Y') }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('registration-completed') }}</th>
                            <th class="text-center">{{ $model->registration_end->format('d-m-Y') }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('start') }}</th>
                            <th class="text-center">{{ $model->start_date->format('d-m-Y') }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('finished') }}</th>
                            <th class="text-center">{{ $model->end_date->format('d-m-Y') }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('logo') }}</th>
                            <th class="text-center"><img src="{{ asset($model->logo) }}" width="100px" alt=""></th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('status') }}</th>
                            <th class="text-center">
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
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ getTranslation('participants') }}</th>
                            <td>
                                <h6 class="mb-0">{{ $model->participants()->count() }}</h6>
                                <div class="font-size-sm text-muted line-height-1">
                                    {{ getTranslation('participants') }}
                                </div>
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
                    </thead>
                </table>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection
