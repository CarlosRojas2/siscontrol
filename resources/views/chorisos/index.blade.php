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
                            <a type="button" href="{{route('prod_chorisos.create')}}" class="o_o_pd_top_7 btn btn-primary my-2 btn-icon-text">
                            <i class="fe fe-plus mr-2 o_o_ico_btn"></i> Registrar Nueva Producción
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
                                    <h6 class="main-content-label mb-1">Listado de Chorisos</h6>
                                    <p class="text-muted card-sub-title">Eres libre de exportar los datos</p>
                                </div>
                                <div class="table-responsive">
                                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo Choriso</th>
                                                <th>Cant. Producida</th>
                                                <th>Fecha Registro</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($chorisos))
                                                @foreach ($chorisos as $item)
                                                    <tr>
                                                        <td class="text-center">{{$n=$n+1}}</td>
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
                                                        <td class="text-center">
                                                                <form class="form_delete" action="{{route('prod_chorisos.destroy', $item)}}"  method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    {{--<a href="{{route('prod_chorisos.edit', $item->id)}}" class=" {{ ($item->deleted_at == null)? ' ': 'o_o_enlace_no'}}  btn btn-sm btn-success">
                                                                        <i class="fe fe-edit-2"></i>
                                                                    </a>--}}
                                                                    <button tipe="submit" class="btn btn-sm btn-danger" {{ ($item->deleted_at == null)? ' ': 'disabled'}}>
                                                                        <i class="fe fe-trash"></i>
                                                                    </button>
                                                                </form>
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
@include('chorisos._myjs')
@endsection
