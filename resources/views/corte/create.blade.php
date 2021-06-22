@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de Cortes</h2>
                       <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cortes</li>
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

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">Registro de nuevo corte</h6>
                                    <p class="text-muted card-sub-title">Complete el formulario para registrar un nuevo Corte.</p>
                                </div>
                                <form id="cortes" onsubmit="create_corte(event)">

                                   <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <div class="row row-sm">
                                        
                                        <div class="col-lg">
                                            <p class="mg-b-10">Producto</p>
                                            <input id="producto" name="producto" class="form-control" type="text" value="{{$materia->producto->nombre}} - {{$materia->proveedor->nombre}}" readonly>
                                            <input id="materia_id" name="materia_id" class="form-control" type="hidden" value="{{$materia->id}}" readonly>
                                        </div>

                                        <div class="col-lg">
                                            <p class="mg-b-10">Precio Compra</p>
                                            <input id="p_compra" name="p_compra" class="form-control" type="text" value="{{$materia->precio_compra}}" readonly>
                                        </div>
                                        <div class="col-lg">
                                            <p class="mg-b-10">Cantidad Disponible (Kg)</p>
                                            <input id="cantidad_d" name="cantidad_d" class="form-control" type="text" value="{{$materia->resto}}" readonly>
                                        </div>
                                    </div><br>
                                    <div class="row row-sm">
                                        
                                        <div class="col-xl-4 col-lg">
                                            <p class="mg-b-10">Descripcion</p>
                                            <input id="descripcion" name="descripcion" class="form-control" type="text">
                                        </div>
                                        <div class="col-xl-4 col-lg">
                                            <p class="mg-b-10">Fecha</p>
                                            <input id="fecha_reg" name="fecha_reg" class="form-control" type="date" value="{{ date('Y-m-d') }}">
                                        </div>
                                        <div class="col-xl-4 col-lg">
                                            <p class="mg-b-10">Cantidad  a usar (Kg)</p>
                                            <input id="cantidad" name="cantidad" class="form-control" type="text" onkeyup="select_cant(this)" onkeypress="return filterFloat(event,this);">
                                        </div>
                                    </div><br>
                                    <div class="d-flex">
                                        <div class="col-xl-6">
                                            <div class="table-responsive">
                                                    <table id="table_1" class="tablas table text-nowrap text-md-nowrap table-bordered mg-b-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Item</th>
                                                                <th>Nombre</th>
                                                                <th>Cantidad (Kg)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center">3</th>
                                                                <td>Costilla</td>
                                                                <td><input type="text" class="cant_clas form-control" name="costilla" id="costilla" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">4</th>
                                                                <td>Carne Picada</td>
                                                                <td><input type="text" class="cant_clas form-control" name="carne_picada" id="carne_picada" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">5</th>
                                                                <td>Hueso Raspado</td>
                                                                <td><input type="text" class="cant_clas form-control" name="hueso_raspado" id="hueso_raspado" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">6</th>
                                                                <td>Tocino Choriso</td>
                                                                <td><input type="text" class="cant_clas form-control" name="tocino_choriso" id="tocino_choriso" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">7</th>
                                                                <td>Hueso columna</td>
                                                                <td><input type="text" class="cant_clas form-control" name="hueso_colum" id="hueso_colum" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">8</th>
                                                                <td>Cuero</td>
                                                                <td><input type="text" class="cant_clas form-control" name="cuero" id="cuero" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">9</th>
                                                                <td>Papada</td>
                                                                <td><input type="text" class="cant_clas form-control" name="papada" id="papada" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">10</th>
                                                                <td>Carne pe/ Cecina</td>
                                                                <td><input type="text" class="cant_clas form-control" name="carne_cecina" id="carne_cecina" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">11</th>
                                                                <td>Carne pe/ File</td>
                                                                <td><input type="text" class="cant_clas form-control" name="carne_file" id="carne_file" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="table-responsive">
                                                    <table id="table_2" class="tablas table text-nowrap text-md-nowrap table-bordered mg-b-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Item</th>
                                                                <th>Nombre</th>
                                                                <th>Cantidad (Kg)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center">12</th>
                                                                <td>Brazuelo</td>
                                                                <td><input type="text" class="cant_clas form-control" name="brazuelo" id="brazuelo" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">13</th>
                                                                <td>Piernas</td>
                                                                <td><input type="text" class="cant_clas form-control" name="piernas" id="piernas" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">14</th>
                                                                <td>Chaleco</td>
                                                                <td><input type="text" class="cant_clas form-control" name="chaleco" id="chaleco" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">15</th>
                                                                <td>Cabeza</td>
                                                                <td><input type="text" class="cant_clas form-control" name="cabeza" id="cabeza" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center">16</th>
                                                                <td>Patas</td>
                                                                <td><input type="text" class="cant_clas form-control" name="patas" id="patas" onkeypress="return filterFloat(event,this);" readonly></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                            </div>
                                            <br><br>
                                            <div class="form-group row justify-content-center mb-0 mg-t-30" align="center">
                                                <div class="col-xl-8 input-group mb-1">
                                                        <div class="input-group-prepend">
                                                            <span class="btn ripple btn-primary">CANTIDAD</span>
                                                        </div>
                                                        <input  type="text" class="text-center form-control" name="cantidad_detalle" id="cantidad_detalle" readonly> 
                                                </div>
                                                <div class="col-xl-8 input-group mb-1">
                                                        <div class="input-group-prepend">
                                                            <span class="btn ripple btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;TOTAL&nbsp;&nbsp;&nbsp;</span>
                                                        </div>
                                                        <input  type="text" class="text-center form-control" name="total" id="total" value=0 readonly> 
                                                </div>
                                                <div class="col-xl-8 input-group mb-1">
                                                        <div class="input-group-prepend">
                                                            <span class="btn ripple btn-primary">&nbsp;&nbsp;&nbsp;MERMA&nbsp;&nbsp;</span>
                                                        </div>
                                                        <input  type="text" class="text-center form-control" name="merma" id="merma" readonly> 
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="form-group row justify-content-end mb-0 mg-t-30" align="center">
                                        <div class="col-md-12 pl-md-6 text-white">
                                            <button id="reg_bt" type="submit" class="btn ripple btn-primary pd-x-30 mg-r-10" value="registrar" disabled>Registrar</button>
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
@include('corte._myjs')
@endsection