<!doctype html>
<html lang="en">
@include("components.HeadTag")
<body data-layout="horizontal">
<div id="wrapper">
    <!-- Navigation Bar-->
    <header id="topnav">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                           href="/" role="button">
                            <span class="text-white ml-1">
                                <strong>Thông tin xét tuyển</strong>
                            </span>
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                           href="{{route("dang_ky_xet_tuyen")}}" role="button">
                            <span class="ml-1 text-white">
                                <strong>Đăng ký xét tuyển</strong>
                            </span>
                        </a>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                               href="{{route("dashboard")}}" role="button">
                            <span class="text-white ml-1">
                                <strong>Quản lý</strong>
                            </span>
                            </a>
                        </li>
                    @else
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                               href="{{route("login")}}" role="button">
                            <span class="text-white ml-1">
                                <strong>Đăng Nhập</strong>
                            </span>
                            </a>
                        </li>
                    @endif
                </ul>
                <!-- LOGO -->
                <div class="logo-box">
                    <a href="#" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="{{asset("assets\images\logo-dark.png")}}" alt="" height="16">
                            <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">V</span> -->
                            <img src="{{asset("assets\images\logo-sm.png")}}" alt="" height="22">
                        </span>
                    </a>
                    <a href="#" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="{{asset("assets\images\logo-light.png")}}" alt="" height="16">
                            <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">V</span> -->
                            <img src="{{asset("assets\images\logo-sm.png")}}" alt="" height="20">
                        </span>
                    </a>
                </div>
                <!-- LOGO -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->
    </header>
    <!-- End Navigation Bar-->
</div>
@yield("content")
@include("components.ScriptLib")
@stack('scripts')
</body>
</html>
