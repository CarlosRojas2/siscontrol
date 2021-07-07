@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">  
            <div class="inner-body"> 


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección Reportes de ahumados</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reportes de ahumados</li>
                        </ol>
                    </div>
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">Listado de insumos ahumados</h6>
                                    <p class="text-muted card-sub-title">Eres libre de exportar los datos</p>
                                </div>
                                <div class="row table-filter">
                                    <div class="col-lg-9 d-lg-flex">
                                        <form method="POST" action="{{route('reportes_ahumados')}}">
                                            @csrf
                                            <div class="d-flex mt-4 mt-lg-0">
                                                <div class="filter-group">
                                                    <label>Desde    :</label>
                                                    <input class="form-control fc-datepicker" value="{{ $fecha_inicio }}" type="date" placeholder="MM/DD/YYYY" name="fecha_inicio" required="true">
                                                </div>
                                                <div class="filter-group ml-3">
                                                    <label>Hasta    :</label>
                                                    <input class="form-control" value="{{ $fecha_fin }}" type="date" name="fecha_fin" required = "true">
                                                </div>
                                                <div class="input-group-btn search-panel">
                                                    <button type="submit" class="btn ripple btn-primary btn-icon"><i class="fe fe-refresh-ccw"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Insumos</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{$n = $n+1}}</td>
                                                <td>Cecina</td>
                                                <td>{{$carne_cecina}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">{{$n = $n+1}}</td>
                                                <td>Lomo</td>
                                                <td>{{$carne_file}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">{{$n = $n+1}}</td>
                                                <td>Costilla</td>
                                                <td>{{$costilla}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">{{$n = $n+1}}</td>
                                                <td>Cuero</td>
                                                <td>{{$cuero}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">{{$n = $n+1}}</td>
                                                <td>Hueso</td>
                                                <td>{{$hueso_colum}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">{{$n = $n+1}}</td>
                                                <td>Hueso Raspado</td>
                                                <td>{{$hueso_raspado}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">{{$n = $n+1}}</td>
                                                <td>Cabeza</td>
                                                <td>{{$cabeza}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">{{$n = $n+1}}</td>
                                                <td>Patas</td>
                                                <td>{{$patas}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">{{$n = $n+1}}</td>
                                                <td>Tocino</td>
                                                <td>{{$tocino_choriso}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row end -->
            </div>
        </div>
    </div>
@endsection
