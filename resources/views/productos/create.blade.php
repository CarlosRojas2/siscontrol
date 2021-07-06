@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de productos</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Productos</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('productos.index')}}" class="o_o_pd_top_7 btn btn-primary my-2 btn-icon-text">
                            <i class="si si-layers mr-2 o_o_ico_btn"></i> Ver Productos
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->
                <!-- Page Mensaje de errores -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- End Mensaje de errores --> 

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">Registros de productos</h6>
                                    <p class="text-muted card-sub-title">Complete el formulario para registrar un nuevo Producto.</p>
                                </div>
                                <form id="productos" method="POST" action="{{route('productos.store')}}">
                                    @csrf
                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <p class="mg-b-10">Producto</p>
                                            <input id="nombre" name="nombre" class="form-control" placeholder="...." type="text" value="{{ old('nombre') }}">
                                        </div>
                                        
                                        <div class="col-lg">
                                            <p class="mg-b-10">Categoría</p>
                                            <div class="form-group">
                                                <select name="categoria_id" id="categoria_id" class="form-control select-lg select2" value="{{ old('categoria_id') }}">
                                                    @foreach ($categorias as $item)
                                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-end mb-0" align="center">
                                        <div class="col-md-12 pl-md-6 text-white">
                                            <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-10" value="registrar">Registrar</button>
                                            <a type="button" href="{{route('productos.index')}}" class="btn ripple btn-secondary pd-x-30">Cancelar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row end -->
            </div>
        </div>
    </div>
@endsection
