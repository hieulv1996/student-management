@extends("MainLayout")
@section("layout")
    <!-- Begin page -->
    <div id="wrapper">
    @include("components.TopBar")
    @include("components.LeftSideMenu")
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                    @yield("content")
            </div>
        </div>
    </div>
    </div>
@endsection
