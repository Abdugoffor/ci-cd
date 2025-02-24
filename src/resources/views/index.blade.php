@extends('layouts.auth')
@section('title', 'Register')
@section('content')
    <div class="row">
        @foreach ($models as $model)
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary text-white header-elements-inline">
                        <h6 class="card-title">{{ $model->name['uz'] }}</h6>
                    </div>

                    <div class="card-body">
                        <img src="{{ asset($model->logo) }}" class="rounded-pill" alt="" width="200px"><br>

                        Country: {{ $model->country->label_en }}, <br>
                        Category: {{ $model->category->name['en'] }}, <br>
                        Registration start: {{ $model->registration_start->format('d-m-Y') }},
                        Registration end: {{ $model->registration_end->format('d-m-Y') }} <br>
                        <a href="{{ route('application', $model->id) }}" class="btn btn-primary mt-2">application</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
