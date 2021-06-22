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
                            <i class="fe fe-plus mr-2 o_o_ico_btn"></i> Registrar Corte
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
                                    <h6 class="main-content-label mb-1">Listado de cortes</h6>
                                    <p class="text-muted card-sub-title">Eres libre de exportar los datos</p>
                                </div>
                                <div class="table-responsive">
                                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Descripción</th>
                                                <th>Materia</th>
                                                <th>Cantidad</th>
                                                <th>Corte</th>
                                                <th>Merma</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($corte))
                                                @foreach ($corte as $item)
                                                    <tr>
                                                        <td class="text-center">{{$n=$n+1}}</td>
                                                        <td><a href="{{route('cortes.show', $item->id)}}">{{$item->descripcion}}</a></td>
                                                        <td>{{$item->producto}}</td>
                                                        <td>{{$item->cantidad_d}} Kg</td>
                                                        <td>{{$item->cantidad}} kg</td>
                                                        <td>{{$item->merma}} kg</td>
                                                        <td class="text-center">
                                                            @if($item->deleted_at == null)
                                                            <span class="badge badge-pill badge-primary-light">Activo</span>
                                                            @else
                                                            <span class="badge badge-pill badge-danger-light">Anulado</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">

                                                            <form class="delet_cortes" action="{{route('cortes.destroy', $item)}}"  method="POST">
                                                                @csrf
                                                                @method('delete')

                                                                <a href="{{route('materias.edit', $item->id)}}" class="btn btn-sm btn-success">
                                                                    <i class="fe fe-edit-2"></i>
                                                                </a>

                                                                <button tipe="submit" class="btn btn-sm btn-danger" {{($item->deleted_at == null)? ' ' : 'disabled'}}>
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
@include('corte._myjs')
@endsection
