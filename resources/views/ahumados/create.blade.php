@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">

 
                <!-- Page Header -->
                <div class="page-header"> 
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección Producción de Productos/Ahumar</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Producción de Productos/Ahumar</li>
                        </ol>
                    </div>
                    <div class="d-flex"> 
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('prod_ahumados.index')}}" class="o_o_pd_top_7 btn btn-primary my-2 btn-icon-text">
                            <i class="si si-layers mr-2 o_o_ico_btn"></i> Ver Producción de Productos/Ahumar
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
                                    <h6 class="main-content-label mb-1">Registro de una nueva Producción</h6>
                                    <p class="text-muted card-sub-title">Complete el formulario para registrar una nueva Producción de Productos/Ahumar.</p>
                                </div>
                                <form id="ahumados" onsubmit="procesar(event)">

                                   <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <div class="row row-sm">
                                        
                                        <input id="ahumado_id" name="ahumado_id" class="form-control" type="hidden" value="insert" readonly>
                                        <div class="col-xl-4 col-lg">
                                            <p class="mg-b-4">Descripcion</p>
                                            <input id="descripcion" name="descripcion" class="form-control" type="text" required>
                                        </div>
                                        <div class="col-xl-4 col-lg">
                                            <p class="mg-b-4">Fecha</p>
                                            <input id="fecha_reg" name="fecha_reg" class="form-control" type="date" value="{{ date('Y-m-d') }}">
                                        </div>
                                        <div class="col-xl-4 col-lg">
                                            <p class="mg-b-4">Cantidad Producida</p>
                                            <input id="cant_procesada" name="cant_procesada" class="text-center form-control" type="text" value=0 readonly>
                                        </div>
                                    </div><br>
                                    <div class="d-flex">
                                        <div class="col-xl-12">
                                            <div class="table-responsive">
                                                    <table id="table_1" class="tabla table text-nowrap text-md-nowrap table-bordered mg-b-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Item</th>
                                                                <th>Insumo</th>
                                                                <th class="text-center">Cantidad Disponible </th>
                                                                <th class="text-center">Cantidad Usar </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($insumos as $item)
                                                                <tr>
                                                                    <th class="text-center">{{$n=$n+1}}</th>
                                                                    <td>{{$item->descripcion}}</td>
                                                                    <td class="text-center" id="total_{{$item->nombre}}">{{$item->total}}</td>
                                                                    <td><input type="hidden" name="{{$item->nombre}}_resto" id="{{$item->nombre}}_resto" value="{{$item->total}}"><input type="text" class="text-center cant_clas form-control" name="{{$item->nombre}}" id="{{$item->nombre}}" onkeypress="return filterFloat(event,this);"></td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="form-group row justify-content-end mb-0 mg-t-30" align="center">
                                        <div class="col-md-12 pl-md-6 text-white">
                                            <button id="reg_bt" type="submit" class="btn ripple btn-primary pd-x-30 mg-r-10" value="registrar">Registrar</button>
                                            <a type="button" href="{{route('prod_ahumados.index')}}" class="btn ripple btn-secondary pd-x-30">Cancelar</a>
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
@include('ahumados._myjs')
@endsection