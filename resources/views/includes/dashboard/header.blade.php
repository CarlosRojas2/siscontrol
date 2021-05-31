<div class="main-header side-header sticky">
    <div class="container-fluid">
        <div class="main-header-left">
            <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
        </div>
        
        <div class="main-header-right">
            
            <div class="dropdown d-md-flex">
                <a class="nav-link icon full-screen-link" href="#">
                    <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                    <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                </a>
            </div>
            
            <div class="dropdown main-profile-menu">
                <a class="d-flex" href="#">
                    <span class="main-img-user" ><img alt="avatar" src="{{asset('assets/img/users/1.jpg')}}"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="header-navheading">
                        <h6 class="main-notification-title">{{ Auth::user()->name }}</h6>
                        <p class="main-notification-text">Admin</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="dropdown-item border-top" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </a>
                    </form>
                    
                    {{-- <a class="dropdown-item border-top" href="signin.html">
                        <i class="fe fe-power"></i> Cerrar sesión
                    </a> --}}
                </div>
            </div>
            <div class="dropdown d-md-flex header-settings">
                <a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
                    <i class="fe fe-align-right header-icons"></i>
                </a>
            </div>
            <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
            </button><!-- Navresponsive closed -->
        </div>
    </div>
</div>