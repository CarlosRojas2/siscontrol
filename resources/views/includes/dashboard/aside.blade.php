<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="{{route('dashboard')}}">
            <img src="{{asset('assets/img/brand/logo-light.png')}}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{asset('assets/img/brand/icon-light.png')}}" class="header-brand-img icon-logo" alt="logo">
            <img src="{{asset('assets/img/brand/poco.jpg')}}" class="header-brand-img desktop-logo theme-logo" alt="logo">
            <img src="{{asset('assets/img/brand/poco.jpg')}}" class="header-brand-img icon-logo theme-logo" alt="logo">
        </a>
    </div>
    <div class="main-sidebar-body"> 
        <ul class="nav">
            <li class="nav-header"><span class="nav-label">Módulos</span></li>
        
            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-receipt sidemenu-icon"></i><span class="sidemenu-label">PRODUCCIÓN</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('salidas.chorisos')}}">SALIDAS/CHORISOS</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('prod_chorisos.index')}}">PRODUCTOS/CHORISOS</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('prod_ahumados.index')}}">PRODUCTOS/AHUMAR</a>
                    </li>
                </ul>
            </li>
            
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
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-bar-chart sidemenu-icon"></i><span class="sidemenu-label">REPORTES</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('materias_det')}}">PRODUCTOS/PROVEEDOR</a>
                    </li>
                    <li class="nav-sub-item">
                        <form method="POST" action="{{ route('reporte.detCortes') }}">
                            @csrf
                            <input type="hidden" name="desde" value="1">
                            <input type="hidden" name="hasta" value="1">
                            <a class="nav-sub-link o_o_bt-reporte" href="route('reporte.detCortes')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('CORTES') }}
                            </a>
                        </form>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('productos_cortes')}}">PRODUCTOS/CORTES</a>
                    </li>
                    <li class="nav-sub-item">
                        <form method="POST" action="{{ route('reporte.prodChorisos') }}">
                            @csrf
                            <input type="hidden" name="desde" value="1">
                            <input type="hidden" name="hasta" value="1">
                            <a class="nav-sub-link o_o_bt-reporte" href="route('reporte.prodChorisos')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('PRODUCCIÓN/CHORISOS') }}
                            </a>
                        </form>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('reporte.chorisos')}}">CHORISOS</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>