<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('img/icon.png') }}" alt="homepage" class="dark-logo" width="50" />
                    <!-- Light Logo icon -->
                    {{-- <img src="{{ asset('xtreme/assets/images/logo-icon.png') }}" alt="homepage" class="light-logo" /> --}}
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                     <!-- dark Logo text -->
                     {{-- <img src="{{ asset('img/icon.png') }}" alt="homepage" class="dark-logo" /> --}}
                    {{-- <img src="{{ asset('img/logo.png') }}" alt="homepage" class="dark-logo"/> --}}
                     <!-- Light Logo text -->    
                     {{-- <img src="../../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> --}}
                </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
            </ul>
      
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('xtreme/assets/images/users/1.jpg') }}" alt="user" class="rounded-circle" width="31">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <span class="with-arrow"><span class="bg-primary"></span></span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
                            <div class=""><img src="{{ asset('xtreme/assets/images/users/1.jpg') }}" alt="user" class="img-circle" width="60"></div>
                            <div class="ml-2">
                                <h4 class="mb-0">{{\Auth::user()->name}}</h4>
                                <p class=" mb-0">{{\Auth::user()->email}}</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="#"><i class="ti-user mr-1 ml-1"></i> Change Password</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off mr-1 ml-1"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>