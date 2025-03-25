@extends('layouts.client')
@section('banner')
@endsection
@section('content')
    <main class="container">
        <section class="register-personal">
            <div class="inner-img-content">
                {!! getLocale($model->text) !!}
            </div>
        </section>
    </main>
@endsection
