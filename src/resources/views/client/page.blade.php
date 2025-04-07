@extends('layouts.client')
@section('title', getLocale($page->title))
@section('banner')
@endsection
@section('content')
    <main class="container montserrat">
        <section class="news container news-all-container">
            <section class="register-personal">

                <h1 class="inner-title">
                    {{ getLocale($page->title) }}
                </h1>
                <div class="inner-img-content">
                    <img src="{{ asset($page->photo) }}" alt="detail-page" />
                </div>
                <div class="content">
                    <div class="content-text">
                        {{ getLocale($page->description) }}
                    </div>
                    <div class="content-text">
                        {!! getLocale($page->text) !!}
                    </div>
                </div>
            </section>

        </section>
    </main>
@endsection
