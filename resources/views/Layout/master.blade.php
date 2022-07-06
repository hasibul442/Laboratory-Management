@include('Include.link')

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('Include.topbar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('Include.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        @yield("content")
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                @include('Include.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

@include('Include.script')
