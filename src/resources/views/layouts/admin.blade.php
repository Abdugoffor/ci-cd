<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') 123</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

    <!--local uchun -->

    {{-- <link href="{{ asset('backend/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">

    <!-- /core JS files -->

    <!-- Core JS files -->
    <script src="{{ asset('backend/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('backend/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('backend/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('backend/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('backend/global_assets/js/demo_pages/dashboard.js') }}"></script>

    <script src="{{ asset('backend/global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>

    <script src="{{ asset('backend/global_assets/js/demo_pages/editor_summernote.js') }}"></script> --}}



    <!--server uchun -->

    <link href="{{ secure_asset('backend/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ secure_asset('backend/assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
    <!-- Core JS files -->
    <script src="{{ secure_asset('backend/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('backend/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script src="{{ secure_asset('backend/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ secure_asset('backend/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ secure_asset('backend/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ secure_asset('backend/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ secure_asset('backend/assets/js/app.js') }}"></script>
    <script src="{{ secure_asset('backend/global_assets/js/demo_pages/dashboard.js') }}"></script>

    <script src="{{ secure_asset('backend/global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
    <script src="{{ secure_asset('backend/global_assets/js/demo_pages/editor_summernote.js') }}"></script>

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-lg navbar-dark navbar-static">
        <div class="d-flex flex-1 d-lg-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-paragraph-justify3"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-transmission"></i>
            </button>
        </div>

        <div class="navbar-brand text-center text-lg-left">
            <a href="/" class="d-inline-block">
                <img src="{{ asset('backend/global_assets/images/logo_light.png') }}" class="d-none d-sm-block"
                    alt="">
                <img src="{{ asset('backend/global_assets/images/logo_icon_light.png') }}" class="d-sm-none"
                    alt="">
            </a>
        </div>
        <div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">

        </div>

        <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">

            <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
                <a href="#"
                    class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100"
                    data-toggle="dropdown">
                    <span class="d-none d-lg-inline-block">{{ app()->getLocale() }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    @foreach ($languages as $language)
                        <a
                            href="{{ route('change.language', $language->slug, false) }}"class="dropdown-item {{ app()->getLocale() == $language->slug ? 'active' : '' }}">
                            {{ $language->name }}
                        </a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
                <a href="#"
                    class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100"
                    data-toggle="dropdown">
                    <span class="d-none d-lg-inline-block">{{ auth()->user()->role ?? 'User' }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('profile.edit', [], false) }}" class="dropdown-item"><i
                            class="icon-user-plus"></i>
                        {{ getTranslation('my_profile') }}
                    </a>
                    <form action="{{ route('profile.logout', [], false) }}" method="post">
                        @csrf
                        <button class="dropdown-item">
                            <i class="icon-switch2"></i>
                            <span>{{ getTranslation('logout') }}</span>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-section sidebar-user my-1">
                    <div class="sidebar-section-body">
                        <div class="media">
                            <a href="/" target="_blank" class="mr-3">
                                <img src="{{ asset('frontend/assets/1.png') }}" class="rounded-circle" alt="">
                            </a>

                            <div class="media-body">
                                <div class="font-weight-semibold">{{ auth()->user()->name }}</div>
                                <div class="font-size-sm line-height-sm opacity-50">
                                    {{ auth()->user()->email }}
                                </div>
                            </div>

                            <div class="ml-3 align-self-center">
                                <button type="button"
                                    class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                    <i class="icon-transmission"></i>
                                </button>

                                <button type="button"
                                    class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                                    <i class="icon-cross2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="sidebar-section">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        @if (hasRole(['admin', 'moderator']))
                            <li class="nav-item">
                                <a href="{{ route('tournaments.index', [], false) }}"
                                    class="nav-link {{ activeMenu('tournaments.index') }}">
                                    <i class="icon-list-unordered"></i>
                                    <span>{{ getTranslation('competitions') }}</span>
                                </a>
                            </li>
                        @endif

                        @if (hasRole(['admin', 'moderator', 'user']))
                            <li class="nav-item">
                                <a href="{{ route('application.index', [], false) }}"
                                    class="nav-link {{ activeMenu('application.index') }}">
                                    <i class="icon-list-unordered"></i>
                                    <span>{{ getTranslation('applications') }}</span>
                                </a>
                            </li>
                        @endif

                        @if (hasRole(['admin', 'moderator', 'user']))
                            <li class="nav-item">
                                <a href="{{ route('skan.index', [], false) }}"
                                    class="nav-link {{ activeMenu('skan.index') }}">
                                    <i class="icon-list-unordered"></i>
                                    <span>{{ getTranslation('scanner') }}</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('presence.index', [], false) }}"
                                    class="nav-link {{ activeMenu('presence.index') }}">
                                    <i class="icon-list-unordered"></i>
                                    <span>{{ getTranslation('presence') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (hasRole(['admin', 'moderator']))
                            @php
                                $isActive =
                                    activeMenu('categories.index') ||
                                    activeMenu('accreditation-categories.index') ||
                                    activeMenu('languages.index') ||
                                    activeMenu('translations.index') ||
                                    activeMenu('contacts.index') ||
                                    activeMenu('hotels.index') ||
                                    activeMenu('menus.index') ||
                                    activeMenu('news.index') ||
                                    activeMenu('partners.index') ||
                                    activeMenu('media.index') ||
                                    activeMenu('users.index');
                            @endphp
                            <li class="nav-item nav-item-submenu {{ $isActive ? 'nav-item-open' : '' }}">
                                <a href="#" class="nav-link">
                                    <i class="icon-gear"></i>
                                    <span>{{ getTranslation('setting') }}</span></a>

                                <ul class="nav nav-group-sub {{ $isActive ? 'd-block' : '' }}"
                                    data-submenu-title="Themes">
                                    @if (hasRole(['admin', 'moderator']))
                                        <li class="nav-item">
                                            <a href="{{ route('categories.index', [], false) }}"
                                                class="nav-link {{ activeMenu('categories.index') }}">
                                                <i class="icon-list-unordered"></i>
                                                <span>{{ getTranslation('category') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('accreditation-categories.index', [], false) }}"
                                                class="nav-link {{ activeMenu('accreditation-categories.index') }}">
                                                <i class="icon-list-unordered"></i>
                                                <span>{{ getTranslation('accreditation-categories') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('languages.index', [], false) }}"
                                                class="nav-link {{ activeMenu('languages.index') }}">
                                                <i class="icon-list-unordered"></i>
                                                <span>{{ getTranslation('language') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('translations.index', [], false) }}"
                                                class="nav-link {{ activeMenu('translations.index') }}">
                                                <i class="icon-list-unordered"></i>
                                                <span>{{ getTranslation('translations') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('contacts.index', [], false) }}"
                                                class="nav-link {{ activeMenu('contacts.index') }}">
                                                <i class="icon-list-unordered"></i>
                                                <span>{{ getTranslation('contacts') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('hotels.index', [], false) }}"
                                                class="nav-link {{ activeMenu('hotels.index') }}">
                                                <i class="icon-list-unordered"></i>
                                                <span>{{ getTranslation('hotels') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('menus.index', [], false) }}"
                                                class="nav-link {{ activeMenu('menus.index') }}">
                                                <i class="icon-list-unordered"></i>
                                                <span>{{ getTranslation('menus') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('news.index', [], false) }}"
                                                class="nav-link {{ activeMenu('news.index') }}">
                                                <i class="icon-list-unordered"></i>
                                                <span>{{ getTranslation('news') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('partners.index', [], false) }}"
                                                class="nav-link {{ activeMenu('partners.index') }}">
                                                <i class="icon-list-unordered"></i>
                                                <span>{{ getTranslation('partners') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('media.index', [], false) }}"
                                                class="nav-link {{ activeMenu('media.index') }}">
                                                <i class="icon-list-unordered"></i>
                                                <span>{{ getTranslation('media') }}</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if (hasRole(['admin']))
                                        <li class="nav-item">
                                            <a href="{{ route('users.index', [], false) }}"
                                                class="nav-link {{ activeMenu('users.index') }}">
                                                <i class="icon-list-unordered"></i>
                                                <span>{{ getTranslation('users') }}</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /main navigation -->
            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Page header -->
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-lg-inline">
                        <div class="page-title d-flex">
                            <h4>
                                <span class="font-weight-semibold">@yield('title')</span>
                            </h4>
                            <a href="#" class="header-elements-toggle text-body d-lg-none"><i
                                    class="icon-more"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /page header -->

                @yield('content')

                <!-- Footer -->
                <div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
                    <div class="text-center d-lg-none w-100">
                        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                            data-target="#navbar-footer">
                            <i class="icon-unfold mr-2"></i>
                            {{-- Footer --}}
                        </button>
                    </div>

                    <div class="navbar-collapse collapse" id="navbar-footer">
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a href="https://uzinfocom.uz" target="_blank"
                                    class="navbar-nav-link font-weight-semibold">
                                    <span class="text-pink">uzinfocom</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /footer -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>
<script>
    function previewImage(event, id) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var img = document.getElementById(id);
            img.src = reader.result;
            img.classList.remove('d-none'); // Rasmni ko'rsatish
        };

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</html>
