@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header --> 
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de Materia Prima</h2>
                       <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Materia prima</li>
                        </ol>
                    </div>
                    <div class="d-flex"> 
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('materias.index')}}" class="o_o_pd_top_7 btn btn-primary my-2 btn-icon-text">
                            <i class="si si-layers mr-2 o_o_ico_btn"></i> Ver Materias
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
                                    <h6 class="main-content-label mb-1">Registro de materia prima</h6>
                                    <p class="text-muted card-sub-title">Complete el formulario para registrar una nueva Materia Prima.</p>
                                </div>
                                <form id="materias" method="POST" action="{{route('materias.store')}}">
                                    @csrf
                                    <div class="row row-sm mg-t-20">
                                        <div class="col-lg">
                                            <p class="mg-b-10">Producto</p>
                                            <div class="form-group">
                                                <select name="producto_id" id="producto_id" class="form-control select-lg select2">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($productos as $item)
                                                    <option value="{{$item->id}}" {{( old('producto_id')== $item->id)? 'selected' : ''}}>{{$item->nombre}} - {{$item->stock}}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="col-lg">
                                            <p class="mg-b-10">Unidad medida</p>
                                            <div class="form-group">
                                                <select name="unidadmedida_id" id="unidadmedida_id" class="form-control select-lg select2">
                                                    @foreach ($unidadmedida as $item)
                                                    <option value="{{$item->id}}" {{( old('unidadmedida_id')== $item->id)? 'selected' : ''}} >{{$item->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg">
                                            <p class="mg-b-10">Proveedor</p>
                                            <div class="form-group">
                                                <select name="proveedor_id" id="proveedor_id" class="form-control select-lg select2">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($proveedors as $item)
                                                    <option value="{{$item->id}}" {{( old('proveedor_id')== $item->id)? 'selected' : ''}} >{{$item->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                            
                                    </div>
                                    <div class="row row-sm">
                                        

                                        <div class="col-lg">
                                            <p class="mg-b-10">Cantidad</p>
                                            <input id="cantidad" name="cantidad" class="form-control" type="text" value="{{ old('cantidad') }}" onkeypress="return filterFloat(event,this);" onkeyup="calculoimporte()">
                                        </div>

                                        <div class="col-lg">
                                            <p class="mg-b-10">Precio compra</p>
                                            <input id="precio_compra" name="precio_compra" class="form-control" placeholder="S/" type="text" value="{{ old('precio_compra') }}" onkeypress="return filterFloat(event,this);" onkeyup="calculoimporte()">
                                        </div>

                                        <div class="col-lg">
                                            <p class="mg-b-10">Importe total</p>
                                            <input id="importe" name="importe" class="o_o_disabled form-control" placeholder="S/" type="text" value="{{ old('importe') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-end mb-0 mg-t-30" align="center">
                                        <div class="col-md-12 pl-md-6 text-white">
                                            <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-10" value="registrar">Registrar</button>
                                            <a type="button" href="{{route('materias.index')}}" class="btn ripple btn-secondary pd-x-30">Cancelar</a>
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
@section('scripts')

<script type="text/javascript" src="{{asset('assets/js/misjs/materias.js')}}"></script>

    
@endsection
