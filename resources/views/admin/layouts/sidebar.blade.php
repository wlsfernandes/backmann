<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ url('index') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/admin/images/logos/devpromaster.png') }}" alt="" height="60">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/admin/images/logos/devpromaster.png') }}" alt="" height="60">
            </span>
        </a>

        <a href="{{ url('index') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/admin/images/logos/devpromaster.png') }}" alt="" height="60">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/admin/images/logos/devpromaster.png') }}" alt="" height="60">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">


                @can('access-website-admin')
                    <li>
                        <a href="#" class="has-arrow waves-effect" onclick="return false;">
                            <i class="dripicons-browser"></i>
                            <span>Website</span>
                        </a>

                        <ul class="sub-menu" aria-expanded="false">


                            <li>
                                <a href="#" class="has-arrow waves-effect" onclick="return false;">
                                    <i class="uil uil-home"></i>
                                    <span>Home</span>
                                </a>

                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="{{ route('admin.banners.index') }}">
                                            <i class="fas fa-image"></i> Banners
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- ABOUT PAGE ITEMS --}}
                            <li>
                                <a href="#" class="has-arrow waves-effect" onclick="return false;">
                                    <i class="fas fa-info"></i>
                                    <span>About Us</span>
                                </a>

                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.abouts.index') }}"><i class="fas fa-info"></i> About</a>
                                    </li>
                                    <li><a href="{{ route('admin.blogs.index') }}"><i class="uil-blogger-alt"></i> Blog</a>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="{{ route('admin.projects.index') }}"><i class="uil uil-calendar-alt"></i>
                                    Projects</a>
                            </li>


                            <li>
                                <a href="{{ route('admin.settings.form') }}">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                            </li>
                            <li class="menu-title">Configuration</li>
                            <li><a href="{{ route('admin.social-links.index') }}"><i class="fas fa-share-alt"></i> Social
                                    Media</a></li>

                        </ul>
                    </li>
                @endcan
                @can('access-admin')
                    <li>
                        <a href="#" class="has-arrow waves-effect" onclick="return false;">
                            <i class="uil-setting"></i>
                            <span>Administration</span>
                        </a>

                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.users.index') }}"><i class="uil-chat-bubble-user"></i> Users</a>
                            </li>
                            <li><a href="{{ route('admin.system-logs.index') }}"><i class="uil uil-bug"></i> System
                                    Logs</a></li>
                        </ul>
                    </li>
                @endcan

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
