<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chess Olympiad 2025</title>


    <link rel="icon" type="image/svg+xml" href="/frontend/assets/header_banner/chess_logo.svg" />
    <link rel="apple-touch-icon" sizes="180x180" href="/frontend/assets/header_banner/chess_logo.svg" />

    <meta name="theme-color" content="#17a8d0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="/frontend/css/style.css" />

</head>
<style>
    .alert_static {
        background-color: #4ca89a;
        color: white;
        padding: 15px 30px 15px 20px;
        border-radius: 8px;
        display: block;
        width: 100%;
        margin: 0 auto 25px auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .close {
        background: none;
        border: none;
        color: white;
        font-size: 18px;
        cursor: pointer;
        position: absolute;
        right: 15px;
        top: 10px;
    }
</style>
<style>
    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
    }

    .toast {
        background: #fff;
        border-radius: 8px;
        padding: 12px 24px;
        margin-bottom: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        gap: 8px;
        animation: slideIn 0.3s ease-in-out;
        min-width: 300px;
        max-width: 500px;
    }

    .toast.error {
        border-left: 4px solid #ff4b4b;
    }

    .toast-icon {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .toast-message {
        color: #333;
        font-size: 14px;
        flex: 1;
    }

    .toast-close {
        cursor: pointer;
        opacity: 0.7;
        transition: opacity 0.2s;
    }

    .toast-close:hover {
        opacity: 1;
    }

    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }

        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
</style>

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
                    <a href="{{ $menu->url }}">
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
                        <a href="{{ $menu->url }}">
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
    <script src="/frontend/js/main.js"></script>
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
