@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de reportes de Produccion Chorisos</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reportes de Produccion Chorisos</li>
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
                                    <h6 class="main-content-label mb-1">Produccion Chorisos</h6>
                                    <p class="text-muted card-sub-title">Eres libre de exportar los datos</p>
                                </div>
                                <div class="row table-filter">
                                    <div class="col-lg-9 d-lg-flex">
                                        <form method="POST" action="{{route('reporte.prodChorisos')}}">
                                            @csrf
                                            <div class="d-flex mt-4 mt-lg-0">
                                                <div class="filter-group">
                                                    <label>Desde    :</label>
                                                    <input class="form-control fc-datepicker" value="{{$desde}}" type="date" placeholder="MM/DD/YYYY" name="desde" id="desde" required="true">
                                                </div>
                                                <div class="filter-group ml-3">
                                                    <label>Hasta    :</label>
                                                    <input class="form-control" value="{{$hasta}}" type="date" name="hasta" id="hasta" required = "true">
                                                </div>
                                                <div class="input-group-btn search-panel">
                                                    <button type="submit" id="filtrar" class="btn ripple btn-primary btn-icon"><i class="fe fe-refresh-ccw"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th>Cod</th>
                                                <th>Tipo Choriso</th>
                                                <th>Cant. Producida</th>
                                                <th>Fecha Registro</th>
                                                <th class="text-center">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($consulta))
                                                @foreach ($consulta as $item)
                                                    <tr>
                                                        <td class="text-center">{{$n++}}</td>
                                                        <td><a href="{{route('prod_chorisos.show', $item->id)}}">{{$item->producto}}</a></td>
                                                        <td>{{$item->cantidad_producida}}</td>
                                                        <td>{{$item->fecha_reg}}</td>
                                                        <td class="text-center">
                                                            @if($item->deleted_at == null)
                                                            <span class="badge badge-pill badge-primary-light">Activo</span>
                                                            @else
                                                            <span class="badge badge-pill badge-danger-light">Anulado</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
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
