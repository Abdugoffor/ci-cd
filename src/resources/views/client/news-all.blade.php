@extends('layouts.client')
@section('title', getTranslation('latest_news'))
@section('banner')
@endsection
@section('content')
    <main class="container montserrat">
        <section class="container news-all-container ">
            <h1 class="inner-title">{{ getTranslation('latest_news') }}</h1>
            <div class="news-cards">
                @foreach ($news as $new)
                    <!-- news update start  -->
                    <div class="news-card">
                        <a href="{{ route('news.latest', $new->id, false) }}">
                            <img src="/{{ $new->photo }}" alt="" />
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
