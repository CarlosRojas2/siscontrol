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
                                                <th>Nombre</th>
                                                <th>Proveedor</th>
                                                <th>Unid medida</th>
                                                <th>Cantidad</th>
                                                <th>Sin procesar</th>
                                                <th>Precio compra</th>
                                                <th>Importe total</th>
                                                <th class="wd-lg-20p text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($materias))
                                                @foreach ($materias as $item)
                                                    <tr>
                                                        <td>{{$item->codigo}}</td>
                                                        <td><a href="{{route('materias.show', $item->id)}}">{{$item->producto->nombre}}</a></td>
                                                        <td>{{$item->proveedor->nombre}}</td>
                                                        <td>{{$item->unidadmedida->nombre}}</td>
                                                        <td>{{$item->cantidad}} Kg</td>
                                                        <td>{{$item->resto}} Kg</td>
                                                        <td>{{$item->precio_compra}} S/</td>
                                                        <td>{{$item->importe}} S/</td>
                                                        <td class="text-center">
                                                            <form action="{{route('materias.destroy', $item)}}" class="eliminar-materia" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <?php if($item->unidadmedida_id != '1' && $item->resto != 0){?>
                                                                    <a href="{{route('crear_corte', $item->id)}}" class="btn btn-sm btn-primary" title="Cortes">
                                                                        <i class="fe fe-scissors"></i>
                                                                    </a>
                                                                <?php } ?>
                                                                <a href="{{route('materias.edit', $item->id)}}" class="btn btn-sm btn-success" title="Editar">
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