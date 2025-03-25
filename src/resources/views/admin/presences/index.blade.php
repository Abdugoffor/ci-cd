@extends('layouts.admin')
@section('title', getTranslation('partners'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Support tickets -->
                @if (session('notification'))
                    <div class="alert bg-teal text-white alert-rounded alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        <span class="font-weight-semibold">{{ session('notification') }}</span>
                    </div>
                @endif
                <div class="card">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width="3%">№</th>
                                    <th class="text-center">{{ getTranslation('name') }}</th>
                                    <th class="text-center">{{ getTranslation('arrival-date') }}</th>
                                    <th class="text-center"></th>
                                </tr>
                                <form action="{{ route('presence.index', [], false) }}" method="get">
                                    @csrf
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="{{ getTranslation('name') }}"
                                                value="{{ old('name', request('name')) }}">
                                        </th>
                                        <th class="text-center">
                                            <input type="date" class="form-control" name="date" value="{{ old('date', request('date')) }}">
                                        </th>
                                        <th class="text-center"><button class="btn btn-teal">{{ getTranslation('search') }}</button></th>
                                    </tr>
                                </form>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}</td>
                                        <td>{{ $model->participant->first_name }}</td>
                                        <td>
                                            {{ $model->created_at->format('Y-m-d, H:i') }}
                                        </td>
                                        <td>
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
