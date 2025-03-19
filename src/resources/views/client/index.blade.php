@extends('layouts.client')
@section('banner')
    <div class="banner">

        <!-- banner update start titles -->
        <div class="container">
            <div class="banner-content">
                <div class="banner-titles">
                    @if (session('notification'))
                        <div class="alert alert-success" style="color: white;">
                            {{ session('notification') }}
                        </div>
                    @endif
                    <span>{{ isset($model) && $model->name ? getLocale($model->name) : '' }}</span>
                    <h1>{{ isset($model) && $model->category ? getLocale($model->category->name) : '' }}</h1>
                    <!-- banner update end text -->
                    <div>
                        {{ isset($model) ? getLocale($model->title) : '' }}
                    </div>
                </div>
                <div class="info-blocks-wrapper">
                    <div class="info-block">
                        <img src="{{ asset('frontend/assets/header_banner/calendar.svg') }}" alt="calendar" />
                        <div class="info-block__content">
                            <div>
                                {{ $model?->registration_start?->format('d') ?? '' }} -
                                {{ $model?->registration_end?->format('d') ?? '' }}
                            </div>
                            <span>
                                {{ $model?->registration_start?->format('M') ?? '' }} -
                                {{ $model?->registration_end?->format('M') ?? '' }}
                            </span>
                        </div>
                    </div>
                    <div class="info-block info-block__secondary">
                        <img src="{{ asset('frontend/assets/header_banner/location.svg') }}" alt="location" />
                        <div class="info-block__content">
                            <div>{{ isset($model) ? $model->country->label_en : '' }}</div>
                            <span>{{ isset($model) ? getLocale($model->category->name) : '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset($siteSettings?->photo_1 ?? 'frontend/assets/header_banner/banner-chess.svg') }}"
                alt="banner-chess" class="banner-img" />
        </div>
    </div>
@endsection
@section('content')
    <main>
        <!-- history update start  -->
        <section class="history">
            <img src="{{ asset($siteSettings?->photo_2 ?? 'frontend/assets/main/history-image.svg') }}" alt="history"
                class="history-img" />
            <img src="{{ asset('frontend/assets/main/substract.svg') }}" alt="substract" class="substract" />
            <div class="container">
                <div class="history-content">
                    <div class="history-title">
                        {{ getLocale($siteSettings?->description) ?: 'Strategy Meets History' }}
                    </div>
                    <div class="history-line"></div>
                    <div class="history-text">
                        {{ getLocale($siteSettings?->text) ?:
                            ' Hosted in the historic city of Samarkand, this event will be an unforgettable fusion of strategy, culture, and global unity' }}
                    </div>
                    <button class="btn">action button</button>
                </div>
            </div>
        </section>
        <!-- history update end  -->
        <section class="register container">
            <!-- register update start  -->
            <div class="register-form">
                <h2>{{ getTranslation('register_event') }}</h2>
                <div class="register-text">
                    {{ getTranslation('register_event_fide_id') }}
                </div>
                <div class="forms-div">
                    @if ($model)
                        <form action="{{ route('application', $model->id, false) }}" id="fideForm1">
                            @csrf
                            <label for="fide-id">FIDE ID</label>
                            <div class="register-section">
                                <input type="text" name="fide_id" value="{{ old('fide_id') }}" id="fide-id"
                                    class="input" />
                                <button type="submit" class="btn form-btn">{{ getTranslation('check') }}</button>
                            </div>
                        </form>
                        <form action="{{ route('application', $model->id, false) }}" id="fideForm2">
                            @csrf
                            <button type="submit" class="btn">{{ getTranslation('register_as_guest') }}</button>
                        </form>
                        <br>
                    @endif
                </div>
                @error('fide_id')
                    <p style="color: red; font-size: 12px">{{ $message }}</p>
                @enderror
            </div>
            {{-- <div class="modal" id="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>FIDE ID Check</h2>
                    <p>Ваш FIDE ID успешно проверен!</p>
                </div>
            </div> --}}
            <!-- register update end  -->
        </section>

        <section class="sponsor">
            <div class="container">
                <div class="swiper sponsors-slider">
                    <div class="swiper-wrapper">
                        @foreach ($partners as $partner)
                            <div class="swiper-slide">
                                <img src="{{ asset($partner->photo) }}" alt="FIDE" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="news container">
            <h1>{{ getTranslation('latest_news') }}</h1>
            <div class="news-cards">
                @foreach ($news as $new)
                    <!-- news update start  -->
                    <div class="news-card">
                        <a href="{{ route('news.latest', $new->id, false) }}">
                            <img src="{{ asset($new->photo) }}" alt="" />
                            <div class="news-card__content">
                                <h3>
                                    {{ getLocale($new->title) }}
                                </h3>
                                <span>
                                    {{ getLocale($new->description) }}
                                </span>
                                <div class="news-card__date">
                                    <span>{{ $new->created_at->format('d-M-Y') }}</span>
                                    <a href="{{ route('news.latest', $new->id, false) }}" class="news-more">
                                        {{ getTranslation('read_more') }}
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- news update end  -->
                @endforeach
            </div>
        </section>
        <div class="hotels-line"></div>
        <section class="hotels">
            <div class="container">
                <h1>{{ getTranslation('hotel_title') }}</h1>
                <h3>
                    {{ getTranslation('hotel_description') }}
                </h3>
                <div class="hotels-slider__buttons">
                    <div class="swiper-button-prev">
                        <svg width="47" height="51" viewBox="0 0 47 51" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M33.7812 26.0312H18.2331L24.2873 19.98C24.8601 19.4072 24.8601 18.4818 24.2873 17.8943C23.713 17.3215 22.7833 17.3215 22.209 17.8943L13.9002 26.2075C13.5492 26.56 13.439 27.0447 13.5198 27.5C13.439 27.9553 13.5492 28.44 13.9002 28.7925L22.209 37.1057C22.7833 37.6785 23.713 37.6785 24.2873 37.1057C24.8601 36.5329 24.8601 35.5928 24.2873 35.02L18.2331 28.9688H33.7812C34.592 28.9688 35.25 28.3078 35.25 27.5C35.25 26.6922 34.592 26.0312 33.7812 26.0312ZM23.5 48.0625C12.1436 48.0625 2.9375 38.8534 2.9375 27.5C2.9375 16.1466 12.1436 6.9375 23.5 6.9375C34.8564 6.9375 44.0625 16.1466 44.0625 27.5C44.0625 38.8534 34.8564 48.0625 23.5 48.0625ZM23.5 4C10.5221 4 0 14.5162 0 27.5C0 40.4837 10.5221 51 23.5 51C36.4779 51 47 40.4837 47 27.5C47 14.5162 36.4779 4 23.5 4Z"
                                fill="#ACC8CB" />
                        </svg>
                    </div>
                    <div class="swiper-button-next">
                        <svg width="47" height="51" viewBox="0 0 47 51" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.2188 26.0312H28.7669L22.7127 19.98C22.1399 19.4072 22.1399 18.4818 22.7127 17.8943C23.287 17.3215 24.2167 17.3215 24.791 17.8943L33.0998 26.2075C33.4508 26.56 33.561 27.0447 33.4802 27.5C33.561 27.9553 33.4508 28.44 33.0998 28.7925L24.791 37.1057C24.2167 37.6785 23.287 37.6785 22.7127 37.1057C22.1399 36.5329 22.1399 35.5928 22.7127 35.02L28.7669 28.9688H13.2188C12.408 28.9688 11.75 28.3078 11.75 27.5C11.75 26.6922 12.408 26.0312 13.2188 26.0312ZM23.5 48.0625C34.8564 48.0625 44.0625 38.8534 44.0625 27.5C44.0625 16.1466 34.8564 6.9375 23.5 6.9375C12.1436 6.9375 2.9375 16.1466 2.9375 27.5C2.9375 38.8534 12.1436 48.0625 23.5 48.0625ZM23.5 4C36.4779 4 47 14.5162 47 27.5C47 40.4837 36.4779 51 23.5 51C10.5221 51 0 40.4837 0 27.5C0 14.5162 10.5221 4 23.5 4Z"
                                fill="#ACC8CB" />
                        </svg>
                    </div>
                </div>
                <div class="hotels-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach ($hotels as $hotel)
                            <div class="swiper-slide">
                                <div class="hotel-card">
                                    <img src="{{ asset($hotel->photo) }}" alt="Hilton Samarkand" />
                                    <div class="hotel-info">
                                        <div class="hotel-distance">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="13"
                                                viewBox="0 0 10 13" fill="none">
                                                <path
                                                    d="M4.6921 12.1978C4.54253 12.1978 4.41433 12.1598 4.3075 12.0839C4.20067 12.0079 4.12054 11.9082 4.06712 11.7847C3.86414 11.2529 3.60774 10.7544 3.29792 10.289C2.99878 9.82372 2.57679 9.27768 2.03194 8.65092C1.48708 8.02416 1.04372 7.42589 0.701856 6.85611C0.370671 6.28633 0.205078 5.59785 0.205078 4.79066C0.205078 3.67958 0.637755 2.73945 1.50311 1.97024C2.37915 1.19154 3.44214 0.802193 4.6921 0.802193C5.94206 0.802193 6.99971 1.19154 7.86507 1.97024C8.74111 2.73945 9.17912 3.67958 9.17912 4.79066C9.17912 5.65482 8.99217 6.37655 8.61825 6.95582C8.25501 7.5256 7.83302 8.09064 7.35227 8.65092C6.77536 9.33466 6.33734 9.90444 6.03821 10.3603C5.74976 10.8066 5.50938 11.2814 5.31708 11.7847C5.26366 11.9177 5.1782 12.0221 5.06068 12.0981C4.95384 12.1646 4.83099 12.1978 4.6921 12.1978ZM4.6921 6.21511C5.1408 6.21511 5.52006 6.07741 5.82988 5.80202C6.1397 5.52662 6.29461 5.1895 6.29461 4.79066C6.29461 4.39181 6.1397 4.05469 5.82988 3.7793C5.52006 3.5039 5.1408 3.36621 4.6921 3.36621C4.2434 3.36621 3.86414 3.5039 3.55432 3.7793C3.2445 4.05469 3.08959 4.39181 3.08959 4.79066C3.08959 5.1895 3.2445 5.52662 3.55432 5.80202C3.86414 6.07741 4.2434 6.21511 4.6921 6.21511Z"
                                                    fill="#308FAA" />
                                            </svg>
                                            {{ $hotel->location }}
                                        </div>
                                        <h4 class="hotel-name">{{ getLocale($hotel->title) }}</h4>
                                        <div class="hotel-rating">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.96827 16.3881L5.35417 10.3968L0.706055 6.36697L6.84669 5.83393L9.23471 0.183696L11.6227 5.83393L17.7634 6.36697L13.1152 10.3968L14.5012 16.3881L9.23471 13.2112L3.96827 16.3881Z"
                                                    fill="url(#paint0_linear_213_121_1)" />
                                                <defs>
                                                    <linearGradient id="paint0_linear_213_121_1" x1="9.2561"
                                                        y1="-1.71928" x2="9.2561" y2="14.5195"
                                                        gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#F7CA82" />
                                                        <stop offset="0.629445" stop-color="#F7B955" />
                                                        <stop offset="1" stop-color="#F7B74F" />
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                            <span class="stars">{{ $hotel->rating }}</span>
                                        </div>
                                        <p>
                                            {{ getLocale($hotel->description) }}
                                        </p>
                                    </div>
                                    <div class="hotel-card__overlay">
                                        <a href="{{ route('hotel.index', $hotel->id, false) }}" class="book-now">
                                            {{ getTranslation('read_more') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
