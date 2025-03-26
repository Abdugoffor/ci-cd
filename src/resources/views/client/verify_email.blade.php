@extends('layouts.client')
@section('banner')
@endsection
@section('content')
    <main class="container">
        <section class="register-personal">
            <div class="register-personal-top">
                <h1>{{ getTranslation('register_for_accreditation') }}</h1>
                <div>
                    <img src="{{ asset('frontend/assets/register-page/chess-logo.svg') }}" alt="chess-logo" />
                    <div class="register-logo-text">
                        <span>{{ getLocale($tournament->name) }}</span>
                        <strong>{{ getLocale($tournament->title) }}</strong>
                    </div>
                </div>
            </div>
            <form action="{{ route('verify.code.post', $model->id, false) }}" method="GET">
                @csrf
                <div class="personal-info">{{ getTranslation('code_verifay') }},
                    {{ cache()->get('email_verification_' . $model->email) }} 
                </div>
                <div class="input-section1" style="margin-bottom: 50px;">
                    <div class="input-group">
                        <div class="input-wrapper">
                            <label for="first-name" class="input-label">{{ getTranslation('code_verifay') }}</label>
                            <input type="number" id="first-name" name="code" class="input-text"
                                placeholder="{{ getTranslation('code_verifay') }}" />
                            @error('code')
                                <p style="color: red; font-size: 12px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-wrapper" style="margin-top: 15px;">
                            <button type="submit" class="btn" style="margin-top: 10px;">{{ getTranslation('check') }}</button>
                        </div>
                    </div>
                </div>
            </form>

        </section>
    </main>
@endsection
