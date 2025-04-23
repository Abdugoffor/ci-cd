@extends('layouts.client')

@section('title', '404 - ' . getTranslation('page_not_found'))

@section('content')
    <div class="container" style="text-align: center; padding: 100px 0; min-height: 60vh;">
        <h1 style="font-size: 100px; color: #e74c3c; margin: 0;">404</h1>
        <h2 style="color: #083f4f; font-weight: 600; font-family: 'Poppins', sans-serif;">
            {{ getTranslation('page_not_found') }}

        </h2>
        <p style="color: #083f4f;font-size: 20px;font-family: 'Open Sans', sans-serif; font-weight: 400; margin-top: 20px;">
            {{ getTranslation('page_not_found_message') }}
        </p>
        <a href="{{ route('home', ['lang' => app()->getLocale()]) }}" class="btn"
            style="text-decoration: none; display: flex; justify-content: center; align-items: center; margin: 0 auto; margin-top: 20px;">
            {{ getTranslation('home') }}
        </a>
    </div>
@endsection
