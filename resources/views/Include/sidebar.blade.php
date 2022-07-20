<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Home</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-ball-pile"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user') }}">
                        <i class="fas fa-users"></i>
                        <span> Users </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('employees') }}">
                        <i class="fas fa-user-friends"></i>
                        <span> Employee </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-user-injured"></i>
                        <span> Patient </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('patients.create') }}">Patient Register</a>
                        </li>
                        <li>
                            <a href="{{ route('patients.list') }}">Patient List</a>
                        </li>
                        {{-- <li>
                            <a href="#">Compose Email</a>
                        </li> --}}
                    </ul>
                </li>
                <li>
                    <a href="{{ route('labtest') }}">
                        <i class="fas fa-vial"></i>
                        <span> Test Category </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('referrels.list') }}">
                        <i class="fad fa-asterisk"></i>
                        <span> Referrel </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('billing') }}">
                        <i class="fas fa-money-bill"></i>
                        <span> Patient Billing System </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('xrayreport') }}">
                        <i class="dripicons-meter"></i>
                        <span> Test Report </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reportbooth') }}">
                        <i class="dripicons-meter"></i>
                        <span> Report Booth </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="dripicons-mail"></i>
                        <span> Financial Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{ route('allbills') }}">Billing History</a>
                        </li>
                        <li>
                            <a href="{{ route('other.transection') }}">Other Transection</a>
                        </li>
                        <li>
                            <a href="{{ route('transection.record') }}">Transection History</a>
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
                            <a href="{{ route('patientreport') }}">Patient List</a>
                        </li>
                        <li>
                            <a href="{{ route('ledger') }}">Accounts Statement</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('expanseledger') }}">Expenses Record</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('referralreport') }}">Referral Report</a>
                        </li>
                        {{-- <li>
                            <a href="#">Test Report</a>
                        </li> --}}
                    </ul>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
