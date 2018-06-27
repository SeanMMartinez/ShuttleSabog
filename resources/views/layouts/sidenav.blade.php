{{--@extends('layouts.app')

@section('sidenav')
<style>
    .keybutton {
        border-top: rgba(0, 0, 0, 0.1) solid 1px;
    }

    .keybuttonlast {
        border-top: rgba(0, 0, 0, 0.1) solid 1px;
        border-bottom: rgba(0, 0, 0, 0.1) solid 1px;
    }
</style>
<body class="fixed-sn white-skin">
<header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav side-nav-light fixed">
        <ul class="custom-scrollbar">
            <!-- Logo -->
            <li>
                <div class="logo-wrapper">
                    <a href="#"><img src="{{asset('img/logo.png')}}" class="img-fluid flex-center"></a>
                </div>
            </li>

            <!--/. Logo -->
            <!--Social
            <li>
                <ul class="social">
                    <li><a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
                    <li><a href="#" class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
                    <li><a href="#" class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
                    <li><a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
                </ul>
            </li>
            /Social-->
            <!--Search Form-->
            <br><br><br>
            <hr>
            <li>
                <form class="search-form" role="search">
                    <div class="form-group md-form mt-0 pt-1 waves-light">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
            </li>
            <!--/.Search Form-->
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect arrow-r" href="{{ route('announcements.index') }}">
                            Announcements
                        </a>
                    </li>
                    <li class="keybutton">
                        <a class="collapsible-header waves-effect arrow-r">
                            Manage<i class="fa fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body"> <ul class="sub-menu">
                                <li><a class="waves-effect" href="{{ route('users.index') }}">Manage Users</a></li>
                                <li><a class="waves-effect" href="{{ route('roles.index') }}">Manage Roles</a></li>
                                <li><a class="waves-effect" href="#">Manage Personnel</a></li>
                                <li><a class="waves-effect" href="#">Manage Rooms</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="keybutton">
                            <a class="collapsible-header waves-effect arrow-r">
                                Register<i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                    <div class="collapsible-body"> <ul class="sub-menu">
                            <li><a class="waves-effect" href="/register/tenant">Register Tenant</a></li>
                            <li><a class="waves-effect" href="/register/employee">Register Employee</a></li>
                        </ul>
                    </div>
                    </li>
                    <li class="keybutton">
                        <a class="collapsible-header waves-effect arrow-r" href="/chat">
                            Chat Assistance
                        </a>
                    </li>
                    <li class="keybutton">
                        <a class="collapsible-header waves-effect arrow-r">
                            Tenant Profile
                        </a>
                    </li>
                    <li class="keybutton">
                        <a class="collapsible-header waves-effect arrow-r">
                            Bills
                        </a>
                    </li>
                    <li class="keybutton">
                        <a class="collapsible-header waves-effect arrow-r">
                            Service Request
                        </a>
                    </li>
                    <li class="keybutton"><a class="collapsible-header waves-effect arrow-r" href="/shuttle">
                            Shuttle Schedule
                        </a>
                    </li>
                    <li class="keybuttonlast">
                        <a class="collapsible-header waves-effect arrow-r">
                            Analytics
                        </a>
                    </li>
                </ul>
            </li>
            <!--/. Side navigation links -->
        </ul>
            <div class="container fixed-bottom">
                <p style="color: grey">Hi, {{ Auth::user()->user->User_FirstName.' '.Auth::user()->user->User_LastName }}</p>
                <div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-user-circle fa-3x"></i>
                    </div>
                    <div class="col-md-9 justify-content-center mt-1">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="text-center mb-3">{{ csrf_field() }}
                            <button type="submit" class="btn btn-md btn-block btn-info z-depth-2">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars black-text"></i></a>
        </div>
        <!-- Breadcrumb-->
        <div class="breadcrumb-dn mr-auto">
            <p style="font-size: 30px"></p>
        </div>
    </nav>
    <!-- /.Navbar -->
</header>
@endsection--}}

@extends('layouts.app')

@section('sidenav')
    <style>
        .keybutton {
            border-top: rgba(0, 0, 0, 0.1) solid 1px;
        }

        .keybuttonlast {
            border-top: rgba(0, 0, 0, 0.1) solid 1px;
            border-bottom: rgba(0, 0, 0, 0.1) solid 1px;
        }
    </style>
    <body class="fixed-sn white-skin">
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav side-nav-light fixed">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper">
                        <a href="#"><img src="{{asset('img/logo.png')}}" class="img-fluid flex-center"></a>
                    </div>
                </li>

                <!--/. Logo -->
                <!--Social
                <li>
                    <ul class="social">
                        <li><a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
                        <li><a href="#" class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
                        <li><a href="#" class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
                        <li><a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
                    </ul>
                </li>
                /Social-->
                <!--Search Form-->
                <br><br><br><br>
                <hr/>
                <form class="search-form" role="search">
                    <div class="form-group md-form waves-light mt-0 mb-0">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                <!--/.Search Form-->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header waves-effect arrow-r" href="{{ route('profile.index') }}">
                                Profile
                            </a>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r" href="{{ route('announcements.index') }}">
                                Announcements
                            </a>
                        </li>
                        <li class="keybutton">
                            <a class="collapsible-header waves-effect arrow-r">
                                Register<i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul class="sub-menu">
                                    <li><a class="waves-effect" href="{{ route('users.create') }}">Register Tenant</a></li>
                                    <li><a class="waves-effect" href="{{ route('employees.create') }}">Register Employee</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="keybutton">
                            <a class="collapsible-header waves-effect arrow-r" href="/chat">
                                Chat Assistance
                            </a>
                        </li>
                        <li class="keybutton">
                            <a class="collapsible-header waves-effect arrow-r">
                                Manage<i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul class="sub-menu">
                                    <li><a class="waves-effect" href="{{ route('users.index') }}">Manage Tenants</a></li>
                                    <li><a class="waves-effect" href="{{ route('employees.index') }}">Manage Employee</a></li>
                                    <li><a class="waves-effect" href="{{ route('rooms.index') }}">Manage Rooms</a></li>
                                    <li><a class="waves-effect" href="{{ route('roles.index') }}">Manage Roles</a></li>
                                    <li><a class="waves-effect" href="{{ route('personnels.index') }}">Manage Personnel</a></li>
                                </ul>
                            </div>
                        </li>
                      <!--  <li class="keybutton">
                            <a class="collapsible-header waves-effect arrow-r" href="{{ route('bills.index') }}">
                                Bills
                            </a>
                        </li>
                        -->
                        <li class="keybutton">
                            <a class="collapsible-header waves-effect arrow-r">
                                Bills<i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul class="sub-menu">
                                    <li><a class="waves-effect" href="{{ route('bills.create') }}">Create Bill</a></li>
                                    <li><a class="waves-effect" href="/paidbills">Paid Bills</a></li>
                                    <li><a class="waves-effect" href="/unpaidbills">Unpaid Bills</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="keybutton">
                            <a class="collapsible-header waves-effect arrow-r">
                                Service Request
                            </a>
                        </li>
                        <li class="keybutton"><a class="collapsible-header waves-effect arrow-r" href="/shuttle/index">
                                Shuttle Schedule
                            </a>
                        </li>
                        <li class="keybuttonlast">
                            <a class="collapsible-header waves-effect arrow-r">
                                Analytics
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->

        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars black-text"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p style="font-size: 30px">@yield('title')</p>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">{{ csrf_field() }}
                <button type="submit" class="btn btn-rounded btn-md btn-info">
                    <i class="fa fa-sign-out-alt"></i>
                    Log Out
                </button>
            </form>
        </nav>
        <!-- /.Navbar -->
    </header>
@endsection