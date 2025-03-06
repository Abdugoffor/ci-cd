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
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>{{ getTranslation('name') }}</th>
                                    <th>{{ getTranslation('arrival-date') }}</th>
                                    <th></th>
                                </tr>
                                <form action="{{ route('presence.index', [], false) }}" method="get">
                                    @csrf
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="{{ getTranslation('name') }}"
                                                value="{{ old('name', request('name')) }}">
                                        </th>
                                        <th>
                                            <input type="date" class="form-control" name="date" value="{{ old('date', request('date')) }}">
                                        </th>
                                        <th><button class="btn btn-teal">{{ getTranslation('search') }}</button></th>
                                    </tr>
                                </form>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ ($models->currentPage() - 1) * $models->perPage() + $loop->iteration }}</td>
                                        <td>{{ $model->participant->first_name }}</td>
                                        <td>
                                            {{ $model->date }}
                                        </td>
                                        <td>
                                            {{ $model->created_at->format('Y-m-d, H:i') }}
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
