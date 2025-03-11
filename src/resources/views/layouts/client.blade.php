<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chess Olympiad 2025</title>
    <link rel="icon" type="image/svg+xml" href="./assets/header_banner/chess_logo.svg" />
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/header_banner/chess_logo.svg" />
    <meta name="theme-color" content="#17a8d0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    {{-- <link rel="stylesheet" href="{{ asset('client/css/style.css') }}" /> --}}
    <link rel="stylesheet" href="{{ secure_asset('client/css/style.css') }}" />
</head>

<body>
    <header class="header">
        <nav class="nav container">
            <div class="nav-left">
                <div class="logo-wrapper">
                    <a href="/" class="logo">
                        <img src="{{ asset('client/assets/header_banner/chess_logo.svg') }}"
                            alt="Chess Olympiad 2025" />
                    </a>

                    <div class="logo-text">
                        <div>46th FIDE CHESS OLYMPIAD</div>
                        <strong>SAMARKAND 2025</strong>
                    </div>
                </div>
                <div class="nav-line"></div>
                <img class="fide-logo" src="{{ asset('client/assets/header_banner/fide.svg') }}" alt="fide" />
            </div>
            <button class="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-list">
                @foreach ($menus as $menu)
                    <a href="#">
                        <li class="nav-item">{{ getLocale($menu->name) }}</li>
                    </a>
                @endforeach
                <li class="nav-item lang-selector">
                    <button class="lang-btn">EN</button>
                    <ul class="lang-dropdown">
                        <li><a href="?lang=en" class="active">EN</a></li>
                        <li><a href="?lang=ru">RU</a></li>
                        <li><a href="?lang=uz">UZ</a></li>
                    </ul>
                </li>
            </ul>
            <div class="mobile-menu">
                <ul class="nav-list">
                    <li class="nav-item lang-selector">
                        <ul class="lang-dropdown">
                            <li><a href="?lang=en" class="active">EN</a></li>
                            <li><a href="?lang=ru">RU</a></li>
                            <li><a href="?lang=uz">UZ</a></li>
                        </ul>
                    </li>
                    <a href="#">
                        <li class="nav-item">About</li>
                    </a>
                    <a href="#">
                        <li class="nav-item">Schedule</li>
                    </a>
                    <a href="#">
                        <li class="nav-item">Participants</li>
                    </a>
                    <a href="#">
                        <li class="nav-item">Tickets</li>
                    </a>
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
                        <img src="{{ asset('client/assets/footer/footer-logo.svg') }}" alt="Chess Olympiad" />
                    </a>
                    <div class="footer-logo-text">
                        <div>46th FIDE CHESS OLYMPIAD</div>
                        <strong>SAMARKAND 2025</strong>
                    </div>
                </div>
                <div class="footer-sponsors">
                    <img src="{{ asset('client/assets/footer/footer-sponsor1.svg') }}" alt="sponsor1" />
                </div>
            </div>
            <div class="footer-nav">
                <ul>
                    @foreach ($menus as $menu)
                        <a href="#">
                            <li class="nav-item">{{ getLocale($menu->name) }}</li>
                        </a>
                    @endforeach
                </ul>
            </div>
            <div class="footer-line"></div>
            <div class="footer-copy">
                &copy; Copyrights 2025 Uzbekistan Chess Federation & FIDE
                International Chess Federation. All Rights Reserved.
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    {{-- <script src="{{ asset('client/js/main.js') }}"></script> --}}
    <script src="{{ secure_asset('client/js/main.js') }}"></script>
</body>

</html>
