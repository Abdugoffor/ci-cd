@extends('layouts.client')
@section('title', getTranslation('hotel_title'))
@section('banner')
@endsection
@section('content')
    <main class="container montserrat">
        <section class=" container news-all-container">
            <h1 class="inner-title">{{ getTranslation('hotel_title') }}</h1>
            <div class="news-cards">
                @foreach ($hotels as $hotel)
                    <!-- news update start  -->
                    <div class="news-card">
                        <a href="{{ route('hotel.index', $hotel->id, false) }}" style="color: #083f4f;">
                            <img src="/{{ $hotel->photo }}" alt="" />
                            <div class="hotel-distance">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="13" viewBox="0 0 10 13"
                                    fill="none">
                                    <path
                                        d="M4.6921 12.1978C4.54253 12.1978 4.41433 12.1598 4.3075 12.0839C4.20067 12.0079 4.12054 11.9082 4.06712 11.7847C3.86414 11.2529 3.60774 10.7544 3.29792 10.289C2.99878 9.82372 2.57679 9.27768 2.03194 8.65092C1.48708 8.02416 1.04372 7.42589 0.701856 6.85611C0.370671 6.28633 0.205078 5.59785 0.205078 4.79066C0.205078 3.67958 0.637755 2.73945 1.50311 1.97024C2.37915 1.19154 3.44214 0.802193 4.6921 0.802193C5.94206 0.802193 6.99971 1.19154 7.86507 1.97024C8.74111 2.73945 9.17912 3.67958 9.17912 4.79066C9.17912 5.65482 8.99217 6.37655 8.61825 6.95582C8.25501 7.5256 7.83302 8.09064 7.35227 8.65092C6.77536 9.33466 6.33734 9.90444 6.03821 10.3603C5.74976 10.8066 5.50938 11.2814 5.31708 11.7847C5.26366 11.9177 5.1782 12.0221 5.06068 12.0981C4.95384 12.1646 4.83099 12.1978 4.6921 12.1978ZM4.6921 6.21511C5.1408 6.21511 5.52006 6.07741 5.82988 5.80202C6.1397 5.52662 6.29461 5.1895 6.29461 4.79066C6.29461 4.39181 6.1397 4.05469 5.82988 3.7793C5.52006 3.5039 5.1408 3.36621 4.6921 3.36621C4.2434 3.36621 3.86414 3.5039 3.55432 3.7793C3.2445 4.05469 3.08959 4.39181 3.08959 4.79066C3.08959 5.1895 3.2445 5.52662 3.55432 5.80202C3.86414 6.07741 4.2434 6.21511 4.6921 6.21511Z"
                                        fill="#308FAA" />
                                </svg>
                                {{ $hotel->location }}
                            </div>
                            <div class="news-card__content">
                                <div>
                                    {{ getLocale($hotel->title) }}
                                </div>
                                <div class="hotel-rating">
                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.96827 16.3881L5.35417 10.3968L0.706055 6.36697L6.84669 5.83393L9.23471 0.183696L11.6227 5.83393L17.7634 6.36697L13.1152 10.3968L14.5012 16.3881L9.23471 13.2112L3.96827 16.3881Z"
                                            fill="url(#paint0_linear_213_121_1)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_213_121_1" x1="9.2561" y1="-1.71928"
                                                x2="9.2561" y2="14.5195" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#F7CA82" />
                                                <stop offset="0.629445" stop-color="#F7B955" />
                                                <stop offset="1" stop-color="#F7B74F" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <span class="stars">{{ $hotel->rating }}</span>
                                </div>
                                <span
                                    style="overflow: hidden;
                                        display: -webkit-box;
                                        -webkit-box-orient: vertical;
                                        -webkit-line-clamp: 2;">
                                    {{ getLocale($hotel->description) }}
                                </span>
                                <div class="news-card__date">
                                    <span>{{ $hotel->date }}</span>
                                    <a href="{{ route('hotel.index', $hotel->id, false) }}" class="news-more">
                                        {{ getTranslation('read_more') }}
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- news update end  -->
                @endforeach
            </div>
            {{ $hotels->links() }}
        </section>
    </main>
@endsection
