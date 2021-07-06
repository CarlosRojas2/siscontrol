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
            <li class="nav-header"><span class="nav-label">Módulos</span></li>
        
            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-panel sidemenu-icon"></i><span class="sidemenu-label">PROCESOS</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('materias.index')}}">MATERIA PRIMA</a>
                    </li>
                     <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('cortes.index')}}">CORTES</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-package sidemenu-icon"></i><span class="sidemenu-label">PRODUCTOS</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('materias_det')}}">PRODUCTOS PROVEEDOR</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('productos.index')}}">PRODUCTOS</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('categorias.index')}}">CATEGORÍAS</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('proveedors.index')}}">PROVEEDORES</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-receipt sidemenu-icon"></i><span class="sidemenu-label">PRODUCCIÓN</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('prod_chorisos.index')}}">CHORISOS</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('prod_ahumados.index')}}">AHUMADOS</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-bar-chart sidemenu-icon"></i><span class="sidemenu-label">REPORTES</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="tablebasic.html">MATERIA PRIMA</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="tabledata.html">CORTES</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="tabledata.html">SALIDA CHORISO</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{url('reportes_ahumados')}}">SALIDA AHUMADOS</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>