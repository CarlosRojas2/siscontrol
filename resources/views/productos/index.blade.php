@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de productos</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Productos</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('productos.create')}}" class="btn btn-primary my-2 btn-icon-text">
                            <i class="fe fe-download-cloud mr-2"></i> Nuevo Producto
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
                                    <h6 class="main-content-label mb-1">Listado de productos</h6>
                                    <p class="text-muted card-sub-title">Eres libre de exportar los datos:</p>
                                </div>
                                <div class="table-responsive">
                                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th>Cod</th>
                                                <th>Nombre</th>
                                                <th>Stock</th>
                                                <th>Categoría</th>
                                                <th>Proveedor</th>
                                                <th>Estado</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($productos))
                                                @foreach ($productos as $item)
                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td><a href="{{route('productos.show', $item->id)}}">{{$item->nombre}}</a></td>
                                                        <td>{{$item->stock}}</td>
                                                        <td>{{$item->categoria->nombre}}</td>
                                                        <td>{{$item->proveedor->nombre}}</td>
                                                        <td>{{$item->estado}}</td>
                                                        <td>

                                                            <form action="{{route('productos.destroy', $item)}}" class="eliminar-producto" method="POST">
                                                                @csrf
                                                                @method('delete')

                                                                <a href="#" class="btn btn-sm btn-primary">
                                                                    <i class="fe fe-eye"></i>
                                                                </a>
                                                                <a href="{{route('productos.edit', $item->id)}}" class="btn btn-sm btn-success">
                                                                    <i class="fe fe-edit-2"></i>
                                                                </a>

                                                                <button tipe="submit" class="btn btn-sm btn-danger">
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
@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar')=='ok')
    <script>
        swal.fire("¡Eliminado!", "El producto se eliminó con éxito.", "success")
    </script>
@endif

<script>
    $('.eliminar-producto').submit(function(e){
        e.preventDefault();
        swal.fire({
		  title: "¿Está seguro?",
		  text: "No podrá recuperar éste archivo!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "¡Sí, Bórralo!",
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