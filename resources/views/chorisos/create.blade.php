@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">

 
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección Producción de Chorisos</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Producción de Chorisos</li>
                        </ol>
                    </div>
                    <div class="d-flex"> 
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('prod_chorisos.index')}}" class="o_o_pd_top_7 btn btn-primary my-2 btn-icon-text">
                            <i class="si si-layers mr-2 o_o_ico_btn"></i> Ver Producción de Chorisos
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
                                    <p class="text-muted card-sub-title">Complete el formulario para registrar una nueva Producción de Chorisos.</p>
                                </div>
                                <form id="chorisos" onsubmit="procesar(event)">

                                   <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <div class="row row-sm">
                                        
                                        <input id="choriso_id" name="choriso_id" class="form-control" type="hidden" value="insert" readonly>
                                        <div class="col-xl-7 col-lg">
                                            <p class="mg-b-10">Producto</p>
                                            <div class="form-group">
                                                <select onchange="select_salida_produto(this)" name="salida_producto_id" id="salida_producto_id" class="form-control select-lg select2">
                                                    @foreach ($prod_productos as $item)
                                                    <option value="{{$item->id}}"  data-stok="{{$item->stock}}">{{$item->descripcion}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-5 col-lg">
                                            <p class="mg-b-10">Stock actual</p>
                                            <input id="stock" name="stock" class="text-center form-control" type="text" value="{{$prod_productos[0]->stock}}" readonly>
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-xl-7 col-lg">
                                            <p class="mg-b-10">Fecha</p>
                                            <input id="fecha_reg" name="fecha_reg" class="form-control" type="date" value="{{ date('Y-m-d') }}">
                                        </div>
                                        <div class="col-xl-5 col-lg">
                                            <p class="mg-b-10">Cantidad Producida</p>
                                            <input id="cant_procesada" name="cant_procesada" class="text-center form-control" type="text" onkeypress="return filterFloat(event,this);">
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
                                                                <tr>
                                                                    <th class="text-center">{{$n=$n+1}}</th>
                                                                    <td>Madeja</td>
                                                                    <td class="text-center" id="total_madeja">{{$madeja->resto}}</td>
                                                                    <td><input type="hidden" name="id_materia" id="id_materia" value="{{$madeja->id}}"><input type="hidden" name="madeja_resto" id="madeja_resto" value="{{$madeja->resto}}"><input type="text" class="text-center cant_clas form-control" name="madeja" id="madeja" onkeypress="return filterFloat(event,this);"></td>
                                                                </tr>
                                                        </tbody>
                                                    </table>

                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="form-group row justify-content-end mb-0 mg-t-30" align="center">
                                        <div class="col-md-12 pl-md-6 text-white">
                                            <button id="reg_bt" type="submit" class="btn ripple btn-primary pd-x-30 mg-r-10" value="registrar">Registrar</button>
                                            <a type="button" href="{{route('prod_chorisos.index')}}" class="btn ripple btn-secondary pd-x-30">Cancelar</a>
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
@include('chorisos._myjs')
@endsection