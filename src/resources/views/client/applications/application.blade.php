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
            @if ($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        @foreach ($errors->all() as $error)
                            toast.create("{{ $error }}");
                        @endforeach
                    });
                </script>
            @endif
            <form action="{{ route('application.store', [], false) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="personal-info">{{ getTranslation('personal_info') }}</div>
                <div class="input-section1 ">
                    <div class="input-group input-groupGrid">
                        <div class="input-wrapper">
                            <input type="hidden" name="tournament_id" value="{{ $tournament->id }}" id="">
                            <label for="first-name" class="input-label">{{ getTranslation('name') }}
                                <span>({{ getTranslation('in_passport') }})</span></label>
                            <input type="text" id="first-name" name="first_name" value="{{ old('first_name') }}"
                                class="input-text" placeholder="{{ getTranslation('name') }}" />

                        </div>
                        <div class="input-wrapper">
                            <label for="last-name"
                                class="input-label">{{ getTranslation('last-name') }}<span>({{ getTranslation('in_passport') }})</span></label>
                            <input type="text" id="last-name" name="last_name" value="{{ old('last_name') }}"
                                class="input-text" placeholder="{{ getTranslation('last-name') }}" />

                        </div>
                    </div>
                    <div class="input-group input-groupGrid">
                        <div class="input-wrapper">
                            <label for="passport-id" class="input-label">{{ getTranslation('email') }}</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="{{ getTranslation('email') }}" class="input-text" />
                        </div>
                        <div class="input-wrapper">
                            <label for="date-of-birth" class="input-label">{{ getTranslation('birth-date') }}</label>
                            <div class="date-container" onclick="openDatePicker('date_of_birth')">
                                <input type="date" id="date_of_birth" name="date_of_birth"
                                    value="{{ old('date_of_birth') }}" class="date-input"
                                    onchange="updateDate('date_of_birth')" oninput="updateDate('date_of_birth')" />
                                <span id="date_of_birthPlaceholder" class="placeholder">DD/MM/YYYY</span>
                                <img src="{{ asset('frontend/assets/register-page/calendar-icon.svg') }}"
                                    class="calendar-icon" />
                            </div>
                        </div>
                    </div>
                    <div class="input-group input-groupGrid">

                        <div class="radio-group">
                            <label for="gender" class="input-label">{{ getTranslation('gender') }}</label>
                            <div>
                                <label class="radio-label">
                                    <input type="radio" name="gender" value="M"
                                        {{ old('gender', optional(session('player'))['sex'] ?? '') == 'M' ? 'checked' : '' }} />
                                    <span class="custom-radio"></span>
                                    {{ getTranslation('m') }}
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="gender" value="F"
                                        {{ old('gender', optional(session('player'))['sex'] ?? '') == 'L' ? 'checked' : '' }} />
                                    <span class="custom-radio"></span>
                                    {{ getTranslation('f') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    @if (session('player'))
                        <div class="example">
                            <img src="{{ asset(session('player')['image_file'] ?? 'frontend/assets/player.png') }}"
                                alt="Player Image" />
                            <ul>
                                <li>{{ getTranslation('name') }}: <span>{{ session('player')['name'] }}</span></li>
                                <li>{{ getTranslation('country') }}: <span>{{ session('player')['country'] }}</span></li>
                                <li>{{ getTranslation('gender') }}: <span>{{ session('player')['sex'] }}</span></li>
                                <li>{{ getTranslation('birth-date') }}: <span>{{ session('player')['birthyear'] }}</span>
                                </li>
                                <li>{{ getTranslation('title') }}:
                                    <span>{{ session('player')['title'] ?? getTranslation('not_available') }}</span>
                                </li>
                                <li>{{ getTranslation('standard_rating') }}:<span>{{ session('player')['standard_rating'] ?? getTranslation('not_available') }}</span>
                                </li>
                                <li>{{ getTranslation('blitz_rating') }}:
                                    <span>{{ session('player')['blitz_rating'] ?? getTranslation('not_available') }}</span>
                                </li>
                                <li>{{ getTranslation('rapid_rating') }}:
                                    <span>{{ session('player')['rapid_rating'] ?? getTranslation('not_available') }}</span>
                                </li>
                            </ul>
                        </div>
                    @endif

                </div>

                <div class="personal-info"></div>
                <div class="terms">
                    <label class="custom-checkbox">
                        <input type="checkbox" name="terms" id="terms" required />
                        <span class="checkmark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                fill="none">
                                <path d="M2 6.99999L4.76923 10L11 3.25" stroke="#39585C" stroke-width="1.37813"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </label>
                    <label for="terms">
                        {{ getTranslation('i_agree') }} |
                    </label>
                    <a href="/aferta" target="_blank"> {{ getTranslation('aferta') }}</a>
                </div>
                <button type="submit" class="btn">{{ getTranslation('add') }}</button>
            </form>
        </section>
        <div class="toast-container"></div>
    </main>
@endsection
