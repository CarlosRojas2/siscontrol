@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de materia prima</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar entrada de materia</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('materias.index')}}" class="btn btn-primary my-2 btn-icon-text">
                            <i class="fe fe-eye mr-2"></i> Ver Materias
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">Formulario de materia prima</h6>
                                    <p class="text-muted card-sub-title">Editar materia prima.</p>
                                </div>
                                <form id="materias" method="POST" action="{{route('materias.update', $materia)}}">
                                    @csrf
                                    @method('put')
                                    <div class="row row-sm mg-t-20">
                                        <div class="col-lg">
                                            <p class="mg-b-10">Producto</p>
                                            <div class="form-group">
                                                <select name="producto_id" id="producto_id" class="form-control select-lg select2">
                                                    <option value="">Large Select</option>
                                                    @foreach ($productos as $item)
                                                    <option value="{{$item->id}}" <?php if( old('producto_id') == $item->id){ echo "selected"; } else{ if($materia->producto_id == $item->id){ echo 'selected'; }} ?> >{{$item->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg">
                                            <p class="mg-b-10">Unidad medida</p>
                                            <div class="form-group">
                                                <select name="unidadmedida_id" id="unidadmedida_id" class="form-control select-lg select2">
                                                    @foreach ($unidadmedida as $item)
                                                    <option value="{{$item->id}}" <?php if( old('unidadmedida_id') == $item->id){ echo "selected"; } else{ if($materia->unidadmedida_id == $item->id){ echo 'selected'; }} ?> >{{$item->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg">
                                            <p class="mg-b-10">Proveedor</p>
                                            <div class="form-group">
                                                <select name="proveedor_id" id="proveedor_id" class="form-control select-lg select2">
                                                    <option value="">Large Select</option>
                                                    @foreach ($proveedors as $item)
                                                    <option value="{{$item->id}}" <?php if( old('proveedor_id') == $item->id){ echo "selected"; } else{ if($materia->proveedor_id == $item->id){ echo 'selected'; }} ?> >{{$item->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="row row-sm">
                                        <input type="hidden" value="{{$materia->producto_id}}" name="refe_pro">
                                        

                                        <div class="col-lg">
                                            <p class="mg-b-10">Cantidad</p>
                                            <input id="cantidad" name="cantidad" class="form-control" placeholder="Kg" type="text" onkeypress="return filterFloat(event,this);" onkeyup="calculoimporte()" value="{{old('cantidad',$materia->cantidad)}}">
                                        </div>

                                        <div class="col-lg">
                                            <p class="mg-b-10">Precio compra</p>
                                            <input id="precio_compra" name="precio_compra" class="form-control" placeholder="S/" type="text" onkeypress="return filterFloat(event,this);" onkeyup="calculoimporte()" value="{{old('precio_compra',$materia->precio_compra)}}">
                                        </div>

                                        <div class="col-lg">
                                            <p class="mg-b-10">Importe total</p>
                                            <input type="hidden" id="importe" name="importe" value="{{$materia->importe}}">
                                            <input id="importever" name="importever" class="o_o_disabled form-control" placeholder="S/" type="text" value="{{old('importe',$materia->importe)}}">
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-end mb-0 mg-t-20" align="center">
                                        <div class="col-md-12 pl-md-6 text-white">
                                            <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-10" value="registrar">Editar</button>
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
