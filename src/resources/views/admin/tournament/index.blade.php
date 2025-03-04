@extends('layouts.admin')
@section('title', getTranslation('competitions'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-12">


                <!-- Support tickets -->
                <div class="card">

                    <div class="card-body d-lg-flex align-items-lg-center justify-content-lg-between flex-lg-wrap">
                        <div class="d-flex align-items-center mb-3 mb-lg-0">
                            {{-- <div id="tickets-status"></div> --}}
                            <div class="ml-3">
                                <h5 class="font-weight-semibold mb-0">14,327 <span
                                        class="text-success font-size-sm font-weight-normal"><i class="icon-arrow-up12"></i>
                                        (+2.9%)</span></h5>
                                <span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">Jun
                                    16, 10:00 am</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mb-lg-0">
                            <a href="#"
                                class="btn bg-transparent border-indigo text-indigo rounded-pill border-2 btn-icon">
                                <i class="icon-alarm-add"></i>
                            </a>
                            <div class="ml-3">
                                <h5 class="font-weight-semibold mb-0">1,132</h5>
                                <span class="text-muted">total tickets</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3 mb-lg-0">
                            <a href="#"
                                class="btn bg-transparent border-indigo text-indigo rounded-pill border-2 btn-icon">
                                <i class="icon-spinner11"></i>
                            </a>
                            <div class="ml-3">
                                <h5 class="font-weight-semibold mb-0">06:25:00</h5>
                                <span class="text-muted">response time</span>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('tournaments.create', [], false) }}" class="btn btn-teal">
                                <i class="icon-plus3 icon-1x mr-1"></i>{{ getTranslation('add') }}
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>{{ getTranslation('name') }}</th>
                                    <th>{{ getTranslation('competition-type') }}</th>
                                    <th>{{ getTranslation('country') }}</th>
                                    <th>{{ getTranslation('start-of-registration') }}</th>
                                    <th>{{ getTranslation('registration-completed') }}</th>
                                    <th>{{ getTranslation('start') }}</th>
                                    <th>{{ getTranslation('finished') }}</th>
                                    <th>{{ getTranslation('status') }}</th>
                                    <th>{{ getTranslation('participants') }}</th>
                                    <th>{{ getTranslation('function') }}</th>
                                    <th>{{ getTranslation('history') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}</td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3">
                                                    <img src="{{ asset($model->logo) }}"
                                                        class="btn btn-teal rounded-pill btn-icon btn-sm" alt="">
                                                    </a>
                                                </div>
                                                <div>
                                                    {{ getLocale($model->name) }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ getLocale($model->category->name) }}
                                        </td>
                                        <td>
                                            {{ $model->country->label_en }}
                                        </td>
                                        <td>
                                            {{ $model->registration_start->format('d-m-Y') }}
                                        </td>
                                        <td>
                                            {{ $model->registration_end->format('d-m-Y') }}
                                        </td>
                                        <td>

                                            {{ $model->start_date->format('d-m-Y') }}
                                        </td>
                                        <td>
                                            {{ $model->end_date->format('d-m-Y') }}
                                        </td>
                                        <td>
                                            <span class="badge badge-teal badge-pill ml-auto">
                                                {{ $model->status }}
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
                                        <td>
                                            <h6 class="mb-0">{{ $model->participants()->count() }}</h6>
                                            <div class="font-size-sm text-muted line-height-1">
                                                {{ getTranslation('participants') }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown"><i
                                                            class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="{{ route('tournaments.edit', $model->id, false) }}"
                                                            class="dropdown-item"><i
                                                                class="icon-pencil3 mr-2 text-success"></i>
                                                            {{ getTranslation('change') }}</a>
                                                        <form
                                                            action="{{ route('tournaments.destroy', $model->id, false) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="icon-cross2 text-danger"></i>
                                                                {{ getTranslation('delete') }}
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {!! historyCheck($model) !!}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /support tickets -->
                {{ $models->links() }}
            </div>
        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /content area -->
@endsection
