@extends('layouts.client')
@section('banner')
@endsection
@section('content')
    <main class="container">
        <section class="register-personal">
            <h1 class="inner-title">
                {{ getLocale($currentNews->title) }}
            </h1>
            <div class="inner-img-content">
                <img src="{{ asset($currentNews->photo) }}" alt="detail-page" />
                <div class="img-details">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22" viewBox="0 0 21 22"
                            fill="none">
                            <path
                                d="M19.25 11.0002C19.25 7.57818 19.25 5.86716 18.2249 4.80406C17.1997 3.74097 15.5498 3.74097 12.25 3.74097H8.75C5.4502 3.74097 3.80021 3.74097 2.77515 4.80406C1.75 5.86716 1.75 7.57818 1.75 11.0002V12.815C1.75 16.2371 1.75 17.9482 2.77515 19.0112C3.80021 20.0743 5.4502 20.0743 8.75 20.0743H12.25C15.5498 20.0743 17.1997 20.0743 18.2249 19.0112C19.25 17.9482 19.25 16.2371 19.25 12.815V11.0002Z"
                                stroke="#487379" stroke-width="1.3125" />
                            <path d="M14.875 4.32422V3.01172" stroke="#487379" stroke-width="1.3125"
                                stroke-linecap="round" />
                            <path d="M6.125 4.32422V3.01172" stroke="#487379" stroke-width="1.3125"
                                stroke-linecap="round" />
                            <path d="M18.8125 8.69922H2.1875" stroke="#487379" stroke-width="1.3125"
                                stroke-linecap="round" />
                            <path
                                d="M5.25 15.6992C5.25 16.1825 5.64174 16.5742 6.125 16.5742C6.60826 16.5742 7 16.1825 7 15.6992C7 15.216 6.60826 14.8242 6.125 14.8242C5.64174 14.8242 5.25 15.216 5.25 15.6992Z"
                                fill="#487379" />
                            <path
                                d="M5.25 12.1992C5.25 12.6825 5.64174 13.0742 6.125 13.0742C6.60826 13.0742 7 12.6825 7 12.1992C7 11.716 6.60826 11.3242 6.125 11.3242C5.64174 11.3242 5.25 11.716 5.25 12.1992Z"
                                fill="#487379" />
                            <path
                                d="M9.625 15.6992C9.625 16.1825 10.0167 16.5742 10.5 16.5742C10.9833 16.5742 11.375 16.1825 11.375 15.6992C11.375 15.216 10.9833 14.8242 10.5 14.8242C10.0167 14.8242 9.625 15.216 9.625 15.6992Z"
                                fill="#487379" />
                            <path
                                d="M9.625 12.1992C9.625 12.6825 10.0167 13.0742 10.5 13.0742C10.9833 13.0742 11.375 12.6825 11.375 12.1992C11.375 11.716 10.9833 11.3242 10.5 11.3242C10.0167 11.3242 9.625 11.716 9.625 12.1992Z"
                                fill="#487379" />
                            <path
                                d="M14 15.6992C14 16.1825 14.3918 16.5742 14.875 16.5742C15.3582 16.5742 15.75 16.1825 15.75 15.6992C15.75 15.216 15.3582 14.8242 14.875 14.8242C14.3918 14.8242 14 15.216 14 15.6992Z"
                                fill="#487379" />
                            <path
                                d="M14 12.1992C14 12.6825 14.3918 13.0742 14.875 13.0742C15.3582 13.0742 15.75 12.6825 15.75 12.1992C15.75 11.716 15.3582 11.3242 14.875 11.3242C14.3918 11.3242 14 11.716 14 12.1992Z"
                                fill="#487379" />
                        </svg>
                        <span class="inner-span">{{ $currentNews->created_at->format('d-M-Y') }}</span>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content-text">
                    {{ getLocale($currentNews->description) }}
                </div>
            </div>
            <div class="content-last">
                <div class="content-text">
                    {{ getLocale($currentNews->text) }}
                </div>
            </div>
        </section>
        <div class="news-swiper">
            <div class="news-slider__buttons">
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
            <div class="news-slider swiper">
                <div class="swiper-wrapper">
                    @foreach ($relatedNews as $relatedNew)
                        <div class="swiper-slide">

                            <div class="news-card">
                                <img src="{{ asset($relatedNew->photo) }}" alt="" />
                                <div class="news-card__content">
                                    <h3>
                                        {{ getLocale($relatedNew->title) }}
                                    </h3>
                                    <span>
                                        {{ getLocale($relatedNew->description) }}
                                    </span>
                                    <div class="news-card__date">
                                        <span>{{ $relatedNew->created_at->format('d-M-Y') }}</span>
                                        <a href="{{ route('news.latest', $relatedNew->id, false) }}" class="more">
                                            {{ getTranslation('read_more') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
