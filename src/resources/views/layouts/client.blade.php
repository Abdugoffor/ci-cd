<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chess Olympiad 2025</title>

    
    {{-- <link rel="icon" type="image/svg+xml" href="{{ asset('frontend/assets/header_banner/chess_logo.svg') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/assets/header_banner/chess_logo.svg') }}" /> --}}
    
    <link rel="icon" type="image/svg+xml" href="{{ secure_asset('frontend/assets/header_banner/chess_logo.svg') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('frontend/assets/header_banner/chess_logo.svg') }}" />

    <meta name="theme-color" content="#17a8d0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" /> --}}

    <link rel="stylesheet" href="{{ secure_asset('frontend/css/style.css') }}" />
</head>

<body>
    <header class="header">
        <nav class="nav container">
            <div class="nav-left">
                <div class="logo-wrapper">
                    <a href="/" class="logo">
                        <img src="{{ asset('frontend/assets/header_banner/chess_logo.svg') }}"
                            alt="Chess Olympiad 2025" />
                    </a>

                    <div class="logo-text">
                        <div>{{ getLocale($siteSettings?->name) ?: 'Chess Olympiad' }}</div>
                        <strong>{{ getLocale($siteSettings?->title) ?: 'Chess Olympiad' }}</strong>
                    </div>
                </div>
                <div class="nav-line"></div>
                <img class="fide-logo" src="{{ asset('frontend/assets/header_banner/fide.svg') }}" alt="fide" />
            </div>
            <button class="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-list">
                @foreach ($menus as $menu)
                    <a href="{{ route('page.index', $menu->id, false) }}">
                        <li class="nav-item">{{ getLocale($menu->name) }}</li>
                    </a>
                @endforeach
                <li class="nav-item lang-selector">
                    <a class="lang" style="text-transform: uppercase;">{{ app()->getLocale() }}</a>
                    <ul class="lang-dropdown">
                        @foreach ($languages as $language)
                            <li>
                                <a href="{{ route('change.language', $language->slug) }}"
                                    class="{{ app()->getLocale() == $language->slug ? 'active' : '' }}"
                                    style="text-transform: uppercase;">
                                    {{ $language->slug }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <div class="mobile-menu">
                <ul class="nav-list">
                    <li class="nav-item lang-selector">
                        <ul class="lang-dropdown">
                            @foreach ($languages as $language)
                                <li>
                                    <a href="{{ route('change.language', $language->slug, false) }}"
                                        class="{{ app()->getLocale() == $language->slug ? 'active' : '' }}">
                                        {{ $language->slug }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @foreach ($menus as $menu)
                        <a href="{{ route('page.index', $menu->id, false) }}">
                            <li class="nav-item">{{ getLocale($menu->name) }}</li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </nav>
        @yield('banner')
    </header>
    @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-logo">
                    <a href="#">
                        <img src="{{ asset('frontend/assets/footer/footer-logo.svg') }}" alt="Chess Olympiad" />
                    </a>
                    <div class="footer-logo-text">
                        <div>{{ getLocale($siteSettings?->name) ?: 'Chess Olympiad' }}</div>
                        <strong>{{ getLocale($siteSettings?->title) ?: 'Chess Olympiad' }}</strong>
                    </div>
                </div>
                <div class="footer-sponsors">
                    <img src="{{ asset('frontend/assets/footer/footer-sponsor1.svg') }}" alt="sponsor1" />
                </div>
            </div>
            <div class="footer-nav">
                <ul>
                    @foreach ($menus as $menu)
                        <li>
                            <a href="{{ route('page.index', $menu->id, false) }}">
                                {{ getLocale($menu->name) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-line"></div>
            <div class="footer-copy">
                &copy; {{ getTranslation('footer_text') }}
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    {{-- <script src="{{ asset('frontend/js/main.js') }}"></script> --}}
    <script src="{{ secure_asset('frontend/js/main.js') }}"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".lang-dropdown a").forEach(function(el) {
            el.addEventListener("click", function(event) {
                event
                    .preventDefault();
                window.location.href = this.getAttribute(
                    "href");
            });
        });
    });
</script>
<style>
    nav {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }

    .pagination {
        display: flex;
        align-items: center;
        list-style: none;
        padding: 0;
        gap: 10px;
    }

    .page-item {
        display: inline-block;
    }

    .page-link {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-decoration: none;
        font-size: 16px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .page-item .page-link {
        background-color: #ffffff;
        color: #333;
        border: 1px solid #ddd;
    }

    .page-item .page-link:hover {
        background-color: #f0f0f0;
        border-color: #bbb;
    }

    .page-item.active .page-link {
        background-color: #0b5e76;
        color: #ffffff;
        border: none;

    }

    .page-item.disabled .page-link {
        background-color: #e9ecef;
        color: #6c757d;
        border: none;
        cursor: not-allowed;
    }

    .page-item:first-child .page-link,
    .page-item:last-child .page-link {
        font-size: 18px;
    }
</style>

</html>
