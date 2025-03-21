@extends('layouts.client')
@section('banner')
@endsection
@section('content')
    <main class="container">
        <section class="news container">
            <h1>{{ getLocale(isset($page) ? $page->name : '') }}</h1>
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
            {{ $news->links() }}
        </section>
    </main>
@endsection
