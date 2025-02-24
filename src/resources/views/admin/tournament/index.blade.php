@extends('layouts.admin')
@section('title', 'Login')
@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-12">


                <!-- Support tickets -->
                <div class="card">
                    <div class="card-header header-elements-sm-inline">
                        <h6 class="card-title">Support tickets</h6>
                    </div>

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
                            <a href="{{ route('tournament.create') }}" class="btn btn-teal">
                                <i class="icon-plus3 icon-1x mr-1"></i> Add
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Название</th>
                                    <th>Тип соревнования</th>
                                    <th>Страна</th>
                                    <th>Начало регистрации</th>
                                    <th>Оконч регистрации</th>
                                    <th>Начало</th>
                                    <th>Оконч</th>
                                    <th>Статус</th>
                                    <th>Участники</th>
                                    <th></th>
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
                                                    {{ $model->name['uz'] }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $model->category->name['uz'] }}
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
                                            </span>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">12</h6>
                                            <div class="font-size-sm text-muted line-height-1">участники</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown"><i
                                                            class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="{{ route('tournament.edit', $model->id) }}"
                                                            class="dropdown-item"><i
                                                                class="icon-pencil3 mr-2 text-success"></i>
                                                            Edit</a>
                                                        <a href="#" class="dropdown-item"><i
                                                                class="icon-cross2 text-danger"></i> Close
                                                            issue</a>
                                                        {{-- <a href="#" class="dropdown-item"><i
                                                                class="icon-checkmark3 text-success"></i>
                                                            Resolve issue</a> --}}
                                                    </div>
                                                </div>
                                            </div>
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
