@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de productos por proveedor</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Registros</li>
                        </ol>
                    </div>
                    {{-- <div class="d-flex">
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('productos.create')}}" class="o_o_pd_top_7 btn btn-primary my-2 btn-icon-text">
                            <i class="fe fe-plus mr-2 o_o_ico_btn"></i> Nuevo Producto
                            </a>
                        </div>
                    </div> --}}
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">Listado de productos por proveedors</h6>
                                    <p class="text-muted card-sub-title">Eres libre de exportar los datos</p>
                                </div>
                                <div class="table-responsive">
                                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Proveedor</th>
                                                <th>Producto</th>
                                                <th>cargas</th>
                                                <th>Can inicial</th>
                                                <th>Can cortada</th>
                                                <th>Can restante</th>
                                                <th>Can merma</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($consulta))
                                            <?php $n = 0; ?>
                                                @foreach ($consulta as $item)
                                                    <tr>
                                                        <td>{{$n=$n+1}}</td>
                                                        <td>{{$item->proveedor}}</td>
                                                        <td>{{$item->producto}}</td>
                                                        <td>{{$item->cargas}}</td>
                                                        <td>{{$item->cantidad}} Kg</td>
                                                        <td>{{$item->cantidad_cortada}} Kg</td>
                                                        <td>{{$item->cantidad_restante}} Kg</td>
                                                        <td>{{$item->cantidad_merma}} Kg</td>
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

@if (session('eliminar')=='error')

    <script>
        Swal.fire({
        icon: 'error',
        title: 'UPS...',
        text: '!Algo salio mal!',
        footer: 'Acción denegada, el producto tiene stock en materias'
        })
    </script>
    
@endif

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