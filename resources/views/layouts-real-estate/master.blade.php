<!DOCTYPE html>
<html lang="ar">
    <head>

        @include('layouts-real-estate.style')

        @yield('css')

    </head>

    <!-- body start -->
    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('layouts-real-estate.menu')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts-real-estate.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    @yield('content')
                    <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                @include('layouts-real-estate.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- setting Sidebar -->
        @include('layouts-real-estate.setting')
        <!-- /setting-bar -->


        @include('layouts-real-estate.script')


        @yield('js')



    </body>
</html>
