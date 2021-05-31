@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">

                <br>@include('flash::message')
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h1 class="main-content-title tx-24 mg-b-5">LISTADO DE CATEGORÍAS</h1><br>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center">
                            <a type="button" href="{{route('categorias.create')}}" data-toggle="tooltip" title="Agregar categoría" data-placement="bottom"
                        class="mb-2 mr-2 btn-hover-shine btn btn-primary">
                            <i class="fe fe-download-cloud mr-2"></i> Nueva Categoria
                        </a>
                        </div>
                    </div>
                </div>
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($categorias as $cat)
                                                <tr>
                                                    <td>{{$n++}}</td>
                                                    <td>{{$cat->nombre}}</a></td>
                                                    <td>{{$cat->descripcion}}</td>
                                                    <td>
                                                        <a href="{{route('categorias.edit', $cat->id)}}" class="btn btn-sm btn-warning"><i class="fe fe-edit-2"></i></a>
                                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-categoriaid="{{$cat['id']}}"><i class="fe fe-trash"></i></a>
                                                        </form>
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
            </div>
        </div>
    </div>
    @section('modal')
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de que quieres eliminar esta categoria?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
           
                <div class="modal-body">Confirme si desea Eliminar la categoria. </div>
                
                    <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Cerrar</button>
                    @if ($cont>0)
                    <form method="POST" action="{{route('categorias.destroy', $cat->id)}}">
                        @method('delete')
                        @csrf
                        {{-- <input type="hidden" id="categoria_id" name="categoria_id" value=""> --}}
                        <a class="btn btn-danger" style="color:White" role="button" onclick="$(this).closest('form').submit();">Confirmar</a>
                    </form>
                    @endif
                    
    
                </div>
            </div>
        </div>
    </div>
    @endsection

@endsection
