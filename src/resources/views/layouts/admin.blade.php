<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ secure_asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ secure_asset('assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ secure_asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ secure_asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ secure_asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ secure_asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ secure_asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

    <script src="{{ secure_asset('assets/js/app.js') }}"></script>
    <script src="{{ secure_asset('global_assets/js/demo_pages/dashboard.js') }}"></script>

    <!-- Theme JS ckeditor files -->
    <script src="{{ secure_asset('global_assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ secure_asset('global_assets/js/demo_pages/editor_ckeditor_default.js') }}"></script>
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
            <a href="index.html" class="d-inline-block">
                <img src="{{ secure_asset('global_assets/images/logo_light.png') }}" class="d-none d-sm-block" alt="">
                <img src="{{ secure_asset('global_assets/images/logo_icon_light.png') }}" class="d-sm-none" alt="">
            </a>
        </div>
        <div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">

            {{-- <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link" data-toggle="dropdown">
                        <i class="icon-people"></i>
                        <span class="d-lg-none ml-3">Messages</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-lg-300">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Users online</span>
                            <a href="#" class="text-body"><i class="icon-search4 font-size-base"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3">
                                        <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Jordana Ansley</a>
                                        <span class="d-block text-muted font-size-sm">Lead web developer</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span
                                            class="badge badge-mark border-success"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Will Brason</a>
                                        <span class="d-block text-muted font-size-sm">Marketing manager</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span
                                            class="badge badge-mark border-danger"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Hanna Walden</a>
                                        <span class="d-block text-muted font-size-sm">Project manager</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span
                                            class="badge badge-mark border-success"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Dori Laperriere</a>
                                        <span class="d-block text-muted font-size-sm">Business developer</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span
                                            class="badge badge-mark border-warning"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Vanessa
                                            Aurelius</a>
                                        <span class="d-block text-muted font-size-sm">UX expert</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span
                                            class="badge badge-mark border-secondary"></span></div>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown-content-footer bg-light">
                            <a href="#" class="text-body mr-auto">All users</a>
                            <a href="#" class="text-body"><i class="icon-gear"></i></a>
                        </div>
                    </div>
                </li>
            </ul> --}}
        </div>

        <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">

            <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
                <a href="#"
                    class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100"
                    data-toggle="dropdown">
                    <img src="global_assets/images/placeholders/placeholder.jpg" class="rounded-pill mr-lg-2"
                        height="34" alt="">
                    <span class="d-none d-lg-inline-block">{{ app()->getLocale() }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    @foreach ($languages as $language)
                        <a
                            href="{{ route('change.language', $language->slug) }}"class="dropdown-item {{ app()->getLocale() == $language->slug ? 'active' : '' }}">
                            {{ $language->name }}
                        </a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
                <a href="#"
                    class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100"
                    data-toggle="dropdown">
                    <img src="global_assets/images/placeholders/placeholder.jpg" class="rounded-pill mr-lg-2"
                        height="34" alt="">
                    <span class="d-none d-lg-inline-block">{{ auth()->user()->name ?? 'User' }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item"><i class="icon-user-plus"></i> My
                        profile</a>
                    <form action="{{ secure_url(route('profile.logout')) }}" method="post">
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
                            <a href="#" class="mr-3">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                    class="rounded-circle" alt="">
                            </a>

                            <div class="media-body">
                                <div class="font-weight-semibold">Victoria Baker</div>
                                <div class="font-size-sm line-height-sm opacity-50">
                                    Senior developer
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
                        <li class="nav-item">
                            <a href="{{ route('tournaments.index') }}" class="nav-link">
                                <i class="icon-list-unordered"></i>
                                <span>{{ getTranslation('competitions') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('application.index') }}" class="nav-link">
                                <i class="icon-list-unordered"></i>
                                <span>{{ getTranslation('applications') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="icon-list-unordered"></i>
                                <span>{{ getTranslation('category') }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('accreditation-categories.index') }}" class="nav-link">
                                <i class="icon-list-unordered"></i>
                                <span>{{ getTranslation('accreditation-categories') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="icon-list-unordered"></i>
                                <span>{{ getTranslation('users') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('languages.index') }}" class="nav-link">
                                <i class="icon-list-unordered"></i>
                                <span>{{ getTranslation('language') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('translations.index') }}" class="nav-link">
                                <i class="icon-list-unordered"></i>
                                <span>{{ getTranslation('translations') }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contacts.index') }}" class="nav-link">
                                <i class="icon-list-unordered"></i>
                                <span>{{ getTranslation('contacts') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('hotels.index') }}" class="nav-link">
                                <i class="icon-list-unordered"></i>
                                <span>{{ getTranslation('hotels') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('news.index') }}" class="nav-link">
                                <i class="icon-list-unordered"></i>
                                <span>{{ getTranslation('news') }}</span>
                            </a>
                        </li>
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
                            Footer
                        </button>
                    </div>

                    <div class="navbar-collapse collapse" id="navbar-footer">
                        <span class="navbar-text">
                            &copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a
                                href="https://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                        </span>

                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link"
                                    target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                            <li class="nav-item"><a href="https://demo.interface.club/limitless/docs/"
                                    class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i>
                                    Docs</a></li>
                            <li class="nav-item"><a
                                    href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov"
                                    class="navbar-nav-link font-weight-semibold"><span class="text-pink"><i
                                            class="icon-cart2 mr-2"></i> Purchase</span></a></li>
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

</html>
