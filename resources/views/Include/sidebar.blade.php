<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Home</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="dripicons-meter"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="dripicons-meter"></i>
                        <span> Users </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('employees') }}">
                        <i class="dripicons-meter"></i>
                        <span> Employee </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="dripicons-mail"></i>
                        <span> Patient </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('patients') }}">Patient Register</a>
                        </li>
                        <li>
                            <a href="#">Patient List</a>
                        </li>
                        {{-- <li>
                            <a href="#">Compose Email</a>
                        </li> --}}
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="dripicons-meter"></i>
                        <span> LAB Test Category </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="dripicons-meter"></i>
                        <span> Patient Billing System </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="dripicons-meter"></i>
                        <span> Test Report </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="dripicons-mail"></i>
                        <span> Financial Record Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="#">Patient Billing System</a>
                        </li>
                        <li>
                            <a href="#">Payment Records</a>
                        </li>
                        <li>
                            <a href="#">Other Transection</a>
                        </li>
                        <li>
                            <a href="#">Transection History</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="dripicons-mail"></i>
                        <span> Report Genaration </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="#">Patient List</a>
                        </li>
                        <li>
                            <a href="#">Transection History</a>
                        </li>
                        <li>
                            <a href="#">Expenses Record</a>
                        </li>
                        <li>
                            <a href="#">Referral Report</a>
                        </li>
                        <li>
                            <a href="#">Scanning Report</a>
                        </li>
                    </ul>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
