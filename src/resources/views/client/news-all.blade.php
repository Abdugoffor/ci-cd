@extends('layouts.client')
@section('banner')
@endsection
@section('content')
    <main class="container montserrat">
        <section class="register-personal">
            <div class="breadcrumb">
                <a href="/">
                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.757 10.8292H7.65622L10.4205 8.06495C10.6828 7.80268 10.6828 7.37808 10.4205 7.11648C10.1589 6.85421 9.73428 6.85421 9.47201 7.11648L5.6781 10.9103C5.51712 11.0713 5.4668 11.2914 5.5037 11.5C5.4668 11.7086 5.51712 11.9286 5.6781 12.0896L9.47201 15.8868C9.73428 16.1484 10.1589 16.1484 10.4205 15.8868C10.6828 15.6252 10.6828 15.1959 10.4205 14.9343L7.65622 12.1707H14.757C15.128 12.1707 15.4278 11.8709 15.4278 11.5C15.4278 11.1297 15.128 10.8292 14.757 10.8292ZM20.1232 19.5493C20.1232 20.2871 19.5222 20.8908 18.7817 20.8908H2.6831C1.94256 20.8908 1.34155 20.2871 1.34155 19.5493V3.45068C1.34155 2.71014 1.94256 2.10913 2.6831 2.10913H18.7817C19.5222 2.10913 20.1232 2.71014 20.1232 3.45068V19.5493ZM18.7817 0.767578H2.6831C1.20136 0.767578 0 1.96894 0 3.45068V19.5493C0 21.0317 1.20136 22.2324 2.6831 22.2324H18.7817C20.2634 22.2324 21.4648 21.0317 21.4648 19.5493V3.45068C21.4648 1.96894 20.2634 0.767578 18.7817 0.767578Z"
                            fill="#7B9DA7" />
                    </svg>
                </a>
                <div>{{ getTranslation('back_to_homepage') }}</div>
            </div>
        </section>
        <section class="news container news-all-container">
            <h1>{{ getTranslation('latest_news') }}</h1>
            <div class="news-cards">
                @foreach ($news as $new)
                    <!-- news update start  -->
                    <div class="news-card">
                        <a href="{{ route('news.latest', $new->id, false) }}">
                            <img src="/{{ ($new->photo) }}" alt="" />
                            <div class="news-card__content">
                                <h3>
                                    {{ getLocale($new->title) }}
                                </h3>
                                <span>
                                    {{ getLocale($new->description) }}
                                </span>
                                <div class="news-card__date">
                                    <span>{{ $new->date }}</span>
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
            {{ $news->links() }}
        </section>
    </main>
@endsection
