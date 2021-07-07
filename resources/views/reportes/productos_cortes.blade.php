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
                                <div class="table-responsive">
                                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Insumos</th>
                                                <th>Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($insumos))
                                                @foreach ($insumos as $item)
                                                    <tr>
                                                        <td class="text-center">{{$n++}}</td>
                                                        <td>{{$item->nombre}}</td>
                                                        <td>{{$item->total}}</td>
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

    @section('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        @if (session('reporte')=='error')
        
            <script>
                Swal.fire({
                icon: 'error',
                title: 'UPS...',
                text: '!Algo salio mal!',
                footer: 'Acción denegada, ingrese rango de fechas valida'
                })
            </script>
            
        @endif
    @endsection

@endsection
