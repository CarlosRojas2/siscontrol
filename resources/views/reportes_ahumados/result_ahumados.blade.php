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
                                <form method="POST" action="">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Desde:</label>
                                                <input type="date" class="form-control" name="fecha_inicio" value="{{ $fecha_inicio }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Hasta:</label>
                                                <input type="date" class="form-control" name="fecha_fin" value="{{ $fecha_fin }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for=""></label>
                                                <input class="btn btn-success" class="form-control" type="submit" value="Generar" formaction="reportes_ahumados">
                                                <a class="btn btn-danger"class="form-control"  href="{{url('reportes_ahumados')}}" role="button">Restablecer</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
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
