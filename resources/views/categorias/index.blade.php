@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">

                @include('flash::message')
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de Categorías</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Categorías</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('categorias.create')}}" class="o_o_pd_top_7 btn btn-primary my-2 btn-icon-text">
                            <i class="fe fe-plus mr-2"></i>Registrar Categoría
                            </a>
                        </div>
                    </div>
                </div>
                <!--Row-->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">Listado de Categorías</h6>
                                    <p class="text-muted card-sub-title">Eres libre de exportar los datos</p>
                                </div>
                                <div class="table-responsive">
                                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
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
                                                            <button type="submit" class="btn btn-sm btn-danger">
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
                <!-- Row end -->
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
