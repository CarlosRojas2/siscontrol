@extends('includes/base')
@section('content') 

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
 
                @include('flash::message')
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de Proveedores</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Proveedores</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('proveedors.create')}}" class="o_o_pd_top_7 btn btn-primary my-2 btn-icon-text">
                            <i class="mdi mdi-account-plus mr-2"></i>Registrar proveedor
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
                                    <h6 class="main-content-label mb-1">Listado de proveedores</h6>
                                    <p class="text-muted card-sub-title">Eres libre de exportar los datos</p>
                                </div>
                                <div class="table-responsive">
                                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Email</th>                                    
                                                <th>Numero de RUC</th>
                                                <th>Teléfono</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proveedors as $prov)
                                                <tr>
                                                    <td>{{$n++}}</td>
                                                    <td>{{$prov->nombre}}</a></td>
                                                    <td>{{$prov->email}}</td>
                                                    <td>{{$prov->numero_ruc}}</td>
                                                    <td>{{$prov->telefono}}</td>
                                                    <td>
                                                        <a href="{{route('proveedors.edit', $prov->id)}}" class="btn btn-sm btn-success"><i class="fe fe-edit-2"></i></a>
                                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-proveedorid="{{$prov['id']}}"><i class="fe fe-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
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


    @section('modal')
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de que quieres eliminar este proveedor?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
           
                <div class="modal-body">Confirme si desea Eliminar el proveedor. </div>
                
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Cerrar</button>
                    @if ($cont>0)
                    <form method="POST" action="{{route('proveedors.destroy', $prov->id)}}">
                        @method('delete')
                        @csrf
                        {{-- <input type="hidden" id="proveedor_id" name="proveedor_id" value=""> --}}
                        <a class="btn btn-danger" style="color:White" role="button" onclick="$(this).closest('form').submit();">Confirmar</a>
                    </form>
                    @endif
                    
    
                </div>
            </div>
        </div>
    </div>
    @endsection

@endsection
