<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <meta name="description"
        content="Международная шахматная федерация. Мировые шахматные новости, турниры, отели, обновления шахматной олимпиады и интересные вопросы и ответы по FIDE" />
    <meta name="keywords"
        content="FIDE международный шахматный чемпионат, FIDE шахматная олимпиада, Новости Международной шахматной федерации, Новости Международной шахматной федерацииРазвитие шахмат FIDE">
    <meta name="author" content="Chess Federation">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ getLocale($siteSettings->name) }}" />
    <meta property="og:description" content="{{ getLocale($siteSettings->title) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ $siteSettings->photo_1 }}" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ getLocale($siteSettings->name) ?? 'Homepage' }}" />
    <meta name="twitter:description" content="{{ getLocale($siteSettings->description) }}" />
    <meta name="twitter:image"
        content="{{ $siteSettings->photo_1 ?? asset('frontend/assets/seo/default-twitter.jpg') }}" />

    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    <!-- Favicons -->
    <link rel="icon" type="image/svg+xml" href="/frontend/assets/header_banner/chess_logo.svg" />
    <link rel="apple-touch-icon" sizes="180x180" href="/frontend/assets/header_banner/chess_logo.svg" />

    <meta name="theme-color" content="#17a8d0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="/frontend/css/style.css?v=1.3" />
    <link rel="stylesheet" href="/frontend/css/media.css?v=1.3" />

</head>

<body>
    <header class="header">
        <nav class="nav container" style="flex-wrap: nowrap">
            <div class="nav-left">
                <div class="logo-wrapper">
                    <a href="{{ route('home', ['lang' => app()->getLocale()], false) }}" class="logo"
                        style="height: 60px;">
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
                    <a href="{{ $menu->url }}">
                        <li class="nav-item">{{ getLocale($menu->name) }}</li>
                    </a>
                @endforeach
                <li class="nav-item lang-selector">
                    <a href="#" class="lang" style="text-transform: uppercase;">{{ app()->getLocale() }}</a>
                    <ul class="lang-dropdown">
                        @foreach ($languages as $language)
                            <li>
                                <a href="{{ route('change.language', ['lang' => $language->slug], false) }}"
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
                        <a href="{{ $menu->url }}">
                            <li class="nav-item">{{ getLocale($menu->name) }}</li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </nav>
        @yield('banner')
    </header>
    <div class="container">
        @if (Route::currentRouteName() &&
                Breadcrumbs::exists(Route::currentRouteName()) &&
                !app('request')->is('*/404') &&
                !app('request')->is('*/news-latest/*') &&
                !app('request')->is('*/hotel/*') &&
                !app('request')->is('*/content/*'))
            {{ Breadcrumbs::render(Route::currentRouteName(), Route::current()->parameters()) }}
        @endif
        {{-- @if (Breadcrumbs::exists(Route::currentRouteName()))
            {{ Breadcrumbs::render(Route::currentRouteName(), Route::current()->parameters()) }}
        @endif --}}
    </div>
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
                            <a
                                href="{{ route('page.index', ['lang' => app()->getLocale(), 'content' => $menu->id], false) }}">
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
    <script src="/frontend/js/main.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render('html_element', {
                'sitekey': "{{ config('services.recaptcha.site_key') }}"
            });
        };
    </script>
</body>
<script>
    const toast = {
        create: function(message, type = 'error', duration = 5000) {
            const toastContainer = document.querySelector('.toast-container');
            if (!toastContainer) return;

            const toastElement = document.createElement('div');
            toastElement.className = `toast ${type}`;

            toastElement.innerHTML = `
          <div class="toast-icon">
            ${type === 'error' ? `
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM11 15H9V13H11V15ZM11 11H9V5H11V11Z" fill="#ff4b4b"/>
              </svg>
            ` : type === 'success' ? `
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM8 15L3 10L4.41 8.59L8 12.17L15.59 4.58L17 6L8 15Z" fill="#00C851"/>
              </svg>
            ` : ''}
          </div>
          <div class="toast-message">${message}</div>
          <div class="toast-close" onclick="this.parentElement.remove()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
              <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="currentColor"/>
            </svg>
          </div>
        `;

            toastContainer.appendChild(toastElement);

            setTimeout(() => {
                toastElement.style.animation = 'slideOut 0.3s ease-in-out forwards';
                setTimeout(() => {
                    toastElement.remove();
                }, 300);
            }, duration);
        }
    };
</script>
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

</style>

</html>
