@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de Salidas de Chorizos</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Salidas de Chorizos</li>
                        </ol>
                    </div>
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">Salidas Chorizos</h6>
                                    <p class="text-muted card-sub-title">Eres libre de exportar los datos</p>
                                </div>
                                {{--<div class="row table-filter">
                                    <div class="col-lg-9 d-lg-flex">
                                        <form method="POST" action="{{route('reporte.prodChorisos')}}">
                                            @csrf
                                            <div class="d-flex mt-4 mt-lg-0">
                                                <div class="filter-group">
                                                    <label>Desde    :</label>
                                                    <input class="form-control fc-datepicker" value="{{$desde}}" type="date" placeholder="MM/DD/YYYY" name="desde" id="desde" required="true">
                                                </div>
                                                <div class="filter-group ml-3">
                                                    <label>Hasta    :</label>
                                                    <input class="form-control" value="{{$hasta}}" type="date" name="hasta" id="hasta" required = "true">
                                                </div>
                                                <div class="input-group-btn search-panel">
                                                    <button type="submit" id="filtrar" class="btn ripple btn-primary btn-icon"><i class="fe fe-refresh-ccw"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>--}}
                                <div class="table-responsive">
                                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th class="text-center">Cod</th>
                                                <th>Tipo Chorizo</th>
                                                <th class="text-center">Stock Actual</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($consulta))
                                                @foreach ($consulta as $item)
                                                    <tr>
                                                        <td class="text-center">{{$n++}}</td>
                                                        <td>{{$item->descripcion}}</td>
                                                        <td class="text-center o_o_f_bold {{($item->stock == 0)? 'text-secondary':'text-success'}}">{{$item->stock}}</td>
                                                        <td class="text-center" >
                                                            <a  class="btn btn-sm btn-primary o_o_text-write" title="salida" onclick="sacar_cho({{$item->id}},'{{$item->descripcion}}',{{$item->stock}})" {{($item->stock == 0)? 'hidden ': ' '}} >
                                                                <i class="fe fe-log-out"></i>
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

<!-- Datepicker modal -->
<div class="modal" id="modal-datepicker">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Salida de Chorizos</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
                    <form class="form_salida" action="{{route('salir.chorisos')}}"  method="POST">
                        @csrf
						<div class="modal-body">
                            <input  type="hidden" name="id_choriso" id="id_choriso" value="0">
                            <h6>Tipo Chorizo</h6>
							<!-- Select2 -->
							<input  class="edit-item-date form-control"  type="text" name="tipo_cho" id="tipo_cho" disabled >
							<!-- Select2 --><br>
							<h6>Stok actual</h6>
							<!-- Select2 -->
							<input  class="edit-item-date form-control"  type="text" name="stock" id="stock" disabled >
							<!-- Select2 -->
                            <!-- Select2 --><br>
							<h6>Cantidad Salida</h6>
							<!-- Select2 -->
							<input  class="edit-item-date form-control"  type="text" name="cant_salida" id="cant_salida" onkeyup="select_cant_salida(this)" onkeypress="return filterFloat(event,this);">
							<!-- Select2 -->
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" tipe="submit">Dar salida</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Cancelar</button>
						</div>
                    </form>
					</div>
				</div>
			</div>
<!-- End modal -->
@include('salidas._myjs')
@endsection
