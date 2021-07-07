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
                            <a type="button" href="{{route('materias.create')}}" class="o_o_pd_top_7 btn btn-primary my-2 btn-icon-text">
                            <i class="fe fe-plus mr-2 o_o_ico_btn"></i> Registrar materia
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->
                <!--Row-->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">Listado de materias</h6>
                                    <p class="text-muted card-sub-title">Eres libre de exportar los datos</p>
                                </div>
                                <div class="table-responsive">
                                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Descripción</th>
                                                <th>Fecha Registro</th>
                                                <th>Cantidad</th>
                                                <th>Pre. compra</th>
                                                <th>Imp. total</th>
                                                <th>Cant. Restante</th>
                                                <th class="wd-lg-20p text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($materias))
                                                @foreach ($materias as $item)
                                                    <tr>
                                                        <td>{{$n=$n+1}}</td>
                                                        <td>{{$item->producto->nombre}} - {{$item->proveedor->nombre}}</td>
                                                        <td>{{$item->created_at}}</td>
                                                        <td class="text-center">{{$item->cantidad}} {{$item->unidadmedida->nombre}}</td>
                                                        <td>{{$item->precio_compra}} S/</td>
                                                        <td>{{$item->importe}} S/</td>
                                                        <td class="o_o_f_bold text-center {{($item->resto==0)? 'text-secondary':'text-success'}}">
                                                            @if($item->producto->id!=1)
                                                                {{$item->resto.' '.$item->unidadmedida->nombre}}
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                                @if($item->resto != 0 and $item->producto->id != 1)
                                                                    <a href="{{route('crear_corte', $item->id)}}" class="btn btn-sm btn-primary" title="Cortes">
                                                                        <i class="fe fe-scissors"></i>
                                                                    </a>
                                                                @endif
                                                                <a href="{{route('materias.edit', $item->id)}}" class="btn btn-sm btn-success" title="Editar" {{($item->cantidad != $item->resto)? 'hidden': ' '}}>
                                                                    <i class="fe fe-edit-2" ></i>
                                                                </a>
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
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('registrar')=='ok')
    <script>
        swal.fire({
                  title: "¡Registrado!",
                  text: "¡La materia fue registrada con éxito.",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500
                });
    </script>
@endif
@if (session('editar')=='ok')
    <script>
        swal.fire({
                  title: "¡Editado!",
                  text: "La materia fue editada con éxito.",
                  icon: "success",
                  showConfirmButton: false,
                  timer: 1500
                });
    </script>
@endif
    
@endsection