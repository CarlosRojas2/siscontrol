<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="{{route('dashboard')}}">
            <img src="{{asset('assets/img/brand/logo-light.png')}}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{asset('assets/img/brand/icon-light.png')}}" class="header-brand-img icon-logo" alt="logo">
            <img src="{{asset('assets/img/brand/logo.png')}}" class="header-brand-img desktop-logo theme-logo" alt="logo">
            <img src="{{asset('assets/img/brand/icon.png')}}" class="header-brand-img icon-logo theme-logo" alt="logo">
        </a>
    </div>
    <div class="main-sidebar-body">
        <ul class="nav">
            <li class="nav-header"><span class="nav-label">App</span></li>
        
            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-write sidemenu-icon"></i><span class="sidemenu-label">MATERIA PRIMA</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('proveedors.index')}}">PROVEEDORES</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('categorias.index')}}">CATEGORÍAS</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('materias.index')}}">MATERIA PRIMA</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-face-smile sidemenu-icon"></i><span class="sidemenu-label">ALMACÉN</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('productos.index')}}">PRODUCTOS</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="icons02.html">Material Design Icons</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="icons03.html">Simple Line Icons</a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-agenda sidemenu-icon"></i><span class="sidemenu-label">Tables</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="tablebasic.html">Basic Tables</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="tabledata.html">Data Tables</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>