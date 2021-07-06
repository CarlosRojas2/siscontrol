@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de reportes por producto</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reportes por producto</li>
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
                                    <h6 class="main-content-label mb-1">Productos</h6>
                                    <p class="text-muted card-sub-title">Eres libre de exportar los datos</p>
                                </div>
                                <div class="row table-filter">
                                    <div class="col-lg-9 d-lg-flex">
                                        <form method="POST" action="{{route('reporteproducto')}}">
                                            @csrf
                                            <div class="d-flex mt-4 mt-lg-0">
                                                <div class="filter-group">
                                                    <label>Desde    :</label>
                                                    <input class="form-control fc-datepicker" value="{{old('desde')}}" type="date" placeholder="MM/DD/YYYY" name="desde" id="desde" required="true">
                                                </div>
                                                <div class="filter-group ml-3">
                                                    <label>Hasta    :</label>
                                                    <input class="form-control" value="{{old('hasta')}}" type="date" name="hasta" id="hasta" required = "true">
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
                                                <th>Nombre</th>
                                                <th>Categoría</th>
                                                <th>Cantidad</th>
                                                <th>Cargas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($productos))
                                                @foreach ($productos as $item)
                                                    <tr>
                                                        <td>{{$n = $n+1}}</td>
                                                        <td>{{$item->nombre}}</a></td>
                                                        <td>{{$item->categoria->nombre}}</td>
                                                        <td>{{$item->cantidad_inicial}}</td>
                                                        <td>{{$item->stock}}</td>
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

{{-- scripts --}}
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.onload = function(){
        var fecha = new Date();
        var mes = fecha.getMonth()+1;
        var dia = fecha.getDate();
        var ano = fecha.getFullYear();
        if (dia<10)
        dia = '0'+dia;
        if (mes<10)
        mes = '0'+mes;
        document.getElementById('hasta').value=ano+'-'+mes+'-'+dia;
    }
    // $(function(){
    //     var desde, hasta;
    //     desde = document.getElementById('desde').value;
    //     hasta = document.getElementById('hasta').value;
    //     $("#filtrar").on("click", function(){
    //         alert(desde);
    //     });
    // });
</script>
    
@endsection