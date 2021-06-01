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
                                                        <form action="{{route('categorias.destroy', $cat)}}" class="eliminar-categoria" method="POST">
                                                            @csrf
                                                            @method('delete')

                                                            <a href="{{route('categorias.show', $cat->id)}}" class="btn btn-sm btn-warning">
                                                                <i class="fe fe-eye"></i>
                                                            </a>
                                                            <a href="{{route('categorias.edit', $cat->id)}}" class="btn btn-sm btn-success">
                                                                <i class="fe fe-edit-2"></i>
                                                            </a>
                                                            <button tipe="submit" class="btn btn-sm btn-danger">
                                                                <i class="fe fe-trash"></i>
                                                            </button>

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
@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $('.eliminar-categoria').submit(function(e){
            e.preventDefault();
            swal.fire({
              title: "¿Estas seguro?",
              text: "Confirmar si deceas Elimnar",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn btn-danger",
              confirmButtonText: "Confirmar",
              cancelButtonText: "Cancelar",
              closeOnConfirm: false
            }).then((result)=>{
                if(result.value){
                    this.submit();
                    // swal.fire("Deleted!", "Your imaginary file has been deleted.", "success")
                }
            })
            
        })
    </script>

@endsection
