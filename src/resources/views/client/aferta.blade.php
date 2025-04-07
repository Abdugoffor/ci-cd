@extends('layouts.client')
@section('title', getTranslation('aferta'))
@section('banner')
@endsection
@section('content')
    <main class="container montserrat">
        <section class="register-personal">
            <div class="inner-img-content">
                {!! getLocale(optional($model)->text) !!}
            </div>

        </section>
    </main>
@endsection
