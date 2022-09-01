<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Home</li>

                @if (App\Models\MainCompanys::get()->count() == 0)
                    <li>
                        <a href="{{ route('dashboard') }}" class="waves-effect">
                            <i class="mdi mdi-account-plus"></i>
                            <span class="badge badge-pill badge-primary float-right">New</span>
                            <span>Add Lab Details</span>
                        </a>
                    </li>
                @else
                    @if (Auth::user()->user_type == 'Super Admin' || Auth::user()->user_type == 'Admin')
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-ball-pile"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('labdetails.show') }}">
                                <i class="fas fa-building"></i>
                                <span> Lab Information </span>
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
                            <a href="{{ route('activities') }}">
                                <i class="fas fa-user-friends"></i>
                                <span> Activities </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('Attendance') }}">
                                <i class="fas fa-user-friends"></i>
                                <span> Attendance </span>
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
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('labtest') }}">
                                <i class="fas fa-vial"></i>
                                <span> Test Category </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="fas fa-boxes"></i>
                                <span> Inventory Managemen </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('inventories') }}">Inventories</a>
                                </li>
                                <li>
                                    <a href="{{ route('inventories.history') }}">Purchase History</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('referrels.list') }}">
                                <i class="fad fa-asterisk"></i>
                                <span> Referral </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="fas fa-money-bill"></i>
                                <span> Patient Billing System </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('billing') }}">Bill Create</a>
                                </li>
                                <li>
                                    <a href="{{ route('allbills') }}">All Bill</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('pathology') }}">
                                <i class="fas fa-vial"></i>
                                <span> Pathology </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('radiology') }}">
                                <i class="fas fa-skeleton"></i>
                                <span> Radiology </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('Electrocardiography') }}">
                                <i class="fas fa-monitor-heart-rate"></i>
                                <span> Electrocardiography </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('ultrasonography') }}">
                                <i class="fas fa-monitor-heart-rate"></i>
                                <span> Ultrasonography </span>
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
                                    <a href="{{ route('all.bills') }}">Billing History</a>
                                </li>
                                <li>
                                    <a href="{{ route('other.transection') }}">Other Transaction</a>
                                </li>
                                <li>
                                    <a href="{{ route('transection.record') }}">Transaction History</a>
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
                    @else
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="fas fa-ball-pile"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        @if (Auth::user()->employees == 1)
                            <li>
                                <a href="{{ route('employees') }}">
                                    <i class="fas fa-user-friends"></i>
                                    <span> Employee </span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->patitents == 1)
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
                                </ul>
                            </li>
                        @endif
                        @if (Auth::user()->testcategory == 1)
                            <li>
                                <a href="{{ route('labtest') }}">
                                    <i class="fas fa-vial"></i>
                                    <span> Test Category </span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->referral == 1)
                            <li>
                                <a href="{{ route('referrels.list') }}">
                                    <i class="fad fa-asterisk"></i>
                                    <span> Referral </span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->inventory == 1)
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fas fa-boxes"></i>
                                <span> Inventory Managemen </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('inventories') }}">Inventories</a>
                                </li>
                                <li>
                                    <a href="{{ route('inventories.history') }}">Purchase History</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if (Auth::user()->billing == 1)
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-money-bill"></i>
                                    <span> Patient Billing System </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ route('billing') }}">Bill Create</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('allbills') }}">All Bill</a>
                                    </li>

                                </ul>
                            </li>
                        @endif
                        @if (Auth::user()->pathology == 1)
                            <li>
                                <a href="{{ route('pathology') }}">
                                    <i class="fas fa-vial"></i>
                                    <span> Pathology </span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->radiology == 1)
                            <li>
                                <a href="{{ route('radiology') }}">
                                    <i class="fas fa-skeleton"></i>
                                    <span> Radiology </span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->ultrasonography == 1)
                            <li>
                                <a href="{{ route('ultrasonography') }}">
                                    <i class="fas fa-monitor-heart-rate"></i>
                                    <span> Ultrasonography </span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->electrocardiography == 1)
                            <li>
                                <a href="{{ route('electrocardiography') }}">
                                    <i class="fas fa-monitor-heart-rate"></i>
                                    <span> Electrocardiography </span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->reportbooth == 1)
                            <li>
                                <a href="{{ route('reportbooth') }}">
                                    <i class="dripicons-meter"></i>
                                    <span> Report Booth </span>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->financial == 1)
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="dripicons-mail"></i>
                                    <span> Financial Management </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ route('all.bills') }}">Billing History</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('other.transection') }}">Other Transaction</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('transection.record') }}">Transaction History</a>
                                    </li>

                                </ul>
                            </li>
                        @endif

                        @if (Auth::user()->report_g == 1)
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
                                    <li>
                                        <a href="{{ route('referralreport') }}">Referral Report</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endif


                @endif


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
