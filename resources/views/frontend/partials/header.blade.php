<div id="loader"></div>

<!-- Mouse Cursor -->
<div class="mouseCursor cursor-outer"></div>
<div class="mouseCursor cursor-inner"><span>Drag</span></div>

<!-- Header Area -->
<div id="header-1" class="header-area absolute-header">
    <div id="header-sticky">
        <div class="navigation">
            <div class="container-fluid">
                <div class="header-inner-box">

                    <!-- Main Menu -->
                    <div class="main-menu d-none d-lg-block">
                        <ul>

                            <li class="active">
                                <a class="navlink" href="{{ url('/') }}">Home</a>
                            </li>

                            <li>
                                <a class="navlink" href="{{ url('/about') }}">About Us</a>
                            </li>
                            <li>
                                <a class="navlink" href="{{ url('/services') }}">Services</a>
                            </li>
                            <li>
                                <a class="navlink" href="{{ url('/projects') }}">Projects</a>
                            </li>
                            <li>
                                <a class="navlink" href="{{ url('/contact') }}">Contact</a>
                            </li>

                        </ul>
                    </div>

                    <!-- Logo -->
                    <div class="logo">
                        @if ($setting->image_url)
                            <img src="{{ route('admin.images.preview', ['model' => 'settings', 'id' => $setting->id]) }}"
                                alt="Banner image" style="width:198px;height:64px">
                        @else
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{ asset('assets/frontend/img/logo-white.png') }}" alt="logo">
                            </a>
                        @endif
                    </div>

                    <div class="header-right">

                        <!-- Search Button -->
                        <ul class="header-tools">

                            <li>
                                <a href="{{ route('lang.switch', 'en') }}">
                                    <img src="{{ asset('/assets/admin/images/flags/us.jpg') }}" alt="English">
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('lang.switch', 'es') }}">
                                    <img src="{{ asset('/assets/admin/images/flags/spain.jpg') }}" alt="Español">
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/admin') }}" title="Admin">
                                    <i class="las la-cog"></i>
                                </a>
                            </li>
                            <li><span></span></li>

                        </ul>

                        <div class="contact-number d-none">
                            <div class="icon">
                                <i class="las la-phone-volume"></i>
                            </div>
                            <div class="title">
                                <h4>{{ $setting->contact_phone }}</h4>
                            </div>
                        </div>

                        <div class="header-btn">
                            <div class="menu-trigger">
                                <span class="lines"></span>
                                <span class="lines"></span>
                                <span class="lines"></span>
                            </div>
                        </div>

                    </div>

                    <!-- Mobile Menu -->
                    <div class="mobile-nav-bar d-block col-sm-1 col-6 d-lg-none">

                        <div class="mobile-nav-wrap">

                            <div id="hamburger">
                                <i class="las la-bars"></i>
                            </div>

                            <div class="mobile-nav">

                                <button type="button" class="close-nav">
                                    <i class="las la-times-circle"></i>
                                </button>

                                <nav class="sidebar-nav">

                                    <ul class="metismenu" id="mobile-menu">

                                        <li>
                                            <a href="{{ url('/') }}">Home</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('/about') }}">About</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('/services') }}">Services</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('/projects') }}">Projects</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('/blog') }}">Blog</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('/contact') }}">Contact</a>
                                        </li>

                                    </ul>

                                </nav>

                                <div class="action-bar">
                                    <a href="mailto:{{ $setting->contact_email ?? '' }}">
                                        <i class="las la-envelope"></i> {{ $setting->contact_email ?? '' }}
                                    </a>

                                    <a href="tel:{{ $setting->contact_phone ?? '' }}">
                                        <i class="fal fa-phone"></i> {{ $setting->contact_phone ?? '' }}
                                    </a>

                                    <a href="{{ url('/contact') }}" class="theme-btn">
                                        Contact Us
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
