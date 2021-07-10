@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Bienvenido Sr(a). <span class="o_o_text_minucula">{{ strtolower(Auth::user()->name) }}</span></h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Don Harold</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                        </ol> 
                    </div>
                    {{--<div class="d-flex">
                        <div class="justify-content-center">
                            <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                            <i class="fe fe-download mr-2"></i> Import
                            </button>
                            <!--<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                            <i class="fe fe-filter mr-2"></i> Filter
                            </button>-->
                            <button type="button" class="btn btn-primary my-2 btn-icon-text">
                            <i class="fe fe-download-cloud mr-2"></i> Download Report
                            </button>
                        </div>
                    </div>--}}
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="row row-sm">
                    <div class="col-sm-12 col-lg-12 col-xl-12">

                        <!--Row-->
                        <div class="row row-sm  mt-lg-4">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="card bg-primary custom-card card-box">
                                    <div class="card-body p-4">
                                        <div class="row align-items-center">
                                            <div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12 img-bg ">
                                                <h4 class="d-flex  mb-3">
                                                    <span class="font-weight-bold text-white ">Datos actuales!</span>
                                                </h4>
                                                <p class="tx-white-7 mb-1">Desde este apartado podrá visualizar de manera grafica los datos actuales del sistema.
                                            </div>
                                            <img src="assets/img/pngs/codetime.png" alt="user-img" class="wd-200">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Row -->

                        <!--Row-->
                        <!--End row-->
                        <!--row-->
								<div class="row row-sm">
									<div class="col-sm-12 col-lg-12 col-xl-12">
										<div class="card custom-card overflow-hidden">
											<div class="card-header border-bottom-0">
												<div>
													<label class="main-content-label mb-2">Reporte por insumos </label> <span class="d-block tx-12 mb-0 text-muted">Se muestra reporte gráfico de insumos.</span>
												</div>
											</div>
											<div class="card-body pl-0">
												<div class>
													<div class="container">
														<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- Row end -->
								<div class="row row-sm">
									<div class="col-lg-12">
										<div class="card custom-card">
											<div class="card-body">
												<div>
													<h6 class="main-content-label mb-1">Tabla Productos/Proveedor</h6>
													<p class="text-muted card-sub-title">Se muestra a detalle las cantidades actuales de los productos </p>
												</div>
												<div class="table-responsive border">
													<table class="table text-nowrap text-md-nowrap mg-b-0">
														<thead>
		                                            <tr>
		                                                <th>Item</th>
		                                                <th>Producto</th>
		                                                <th>Proveedor</th>
		                                                <th>cargas</th>
		                                                <th>Cant. Inicial</th>
		                                                <th>Cant. Cortada</th>
		                                                <th>Cant. Restante</th>
		                                            </tr>
		                                        </thead>
		                                        <tbody>
		                                            @if (!empty($productos))
		                                                @foreach ($productos as $item)
		                                                    <tr>
		                                                        <td>{{$n_p++}}</td>
		                                                        <td>{{$item->producto}}</td>
		                                                        <td>{{$item->proveedor}}</td>
		                                                        <td>{{$item->cargas}}</td>
		                                                        <td>{{$item->cantidad}} {{$item->uni_medida}}  </td>
		                                                        <td>
		                                                            @if($item->productos_id == 1)
		                                                                {{$madeja->can_cortada}} {{$item->uni_medida}}  
		                                                            @else
		                                                                {{$item->cantidad-$item->cantidad_cortada}} {{$item->uni_medida}} 
		                                                            @endif
		                                                        </td>
		                                                        <td class="o_o_f_bold 
		                                                            @if($item->productos_id == 1)
		                                                                {{($madeja->can_cortada==$item->cantidad)? 'text-secondary':'text-success'}}
		                                                            @else
		                                                                {{($item->cantidad_cortada==0)? 'text-secondary':'text-success'}}
		                                                            @endif">
		                                                            @if($item->productos_id == 1)
		                                                                {{$item->cantidad-$madeja->can_cortada}} {{$item->uni_medida}} 
		                                                            @else
		                                                                {{$item->cantidad_cortada}} {{$item->uni_medida}} 
		                                                            @endif 
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
								<div class="row row-sm">
									<div class="col-lg-12">
										<div class="card custom-card">
											<div class="card-body">
												<div>
													<h6 class="main-content-label mb-1">Tabla Chorizos</h6>
													<p class="text-muted card-sub-title">Se muestra a detalle las cantidades actuales de los chorizos. </p>
												</div>
												<div class="table-responsive border">
													<table class="table text-nowrap text-md-nowrap mg-b-0">
														<thead>
				                                            <tr>
				                                                <th class="text-center">Cod</th>
				                                                <th>Tipo Chorizo</th>
				                                                <th class="text-center">Stock Actual</th>
				                                            </tr>
				                                        </thead>
				                                        <tbody>
				                                            @if (!empty($chorisos))
				                                                @foreach ($chorisos as $item)
				                                                    <tr>
				                                                        <td class="text-center">{{$n_c++}}</td>
				                                                        <td>{{$item->descripcion}}</td>
				                                                        <td class="text-center">{{$item->stock}}</td>
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
								<div class="row row-sm">
									<div class="col-lg-12">
										<div class="card custom-card">
											<div class="card-body">
												<div>
													<h6 class="main-content-label mb-1">Tabla Insumos</h6>
													<p class="text-muted card-sub-title">Se muestra a detalle las cantidades actuales de los Insumos. </p>
												</div>
												<div class="table-responsive border">
													<table class="table text-nowrap text-md-nowrap mg-b-0">
														<thead>
				                                            <tr>
				                                                <th>#</th>
				                                                <th>Insumos</th>
				                                                <th class="text-center">Stock ACTUAL</th>
				                                            </tr>
				                                        </thead>
				                                        <tbody>
				                                            @if (!empty($insumos))
				                                                @foreach ($insumos as $item)
				                                                    <tr>
				                                                        <td class="text-center">{{$n_i++}}</td>
				                                                        <td>{{$item->descripcion}}</td>
				                                                        <td class="text-center">{{$item->total}} kg</td>
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

                    </div><!-- col end -->
                    
                </div><!-- Row end -->
            </div>
        </div>
    </div>
@endsection



{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@section('scripts')

    <script>
		$(function(){
			iniciargraficobarras();
		});
		function iniciargraficobarras(){
			var ruta="{{route('insumos.index')}}";
			$.ajax({
				url     : ruta,
				type    : 'GET',
				dataType: "Json",
				success : function(data){
					var insumos = new Array();
					var cantidad = new Array();
					$.each(data, function(key, value){
						insu = String(value.descripcion);
						insumos.push(insu);
						total = Number(value.total);
						cantidad.push(total);
					});
					graficobarras(cantidad,insumos);
				},
			});
		}
		function graficobarras(cantidad, insumos){
			Highcharts.chart('container', {
				chart: {
					type: 'column'
				},
				title: {
					text: 'INSUMOS'
				},
				subtitle: {
					text: 'Fuente: Sistema procesos '
				},
				xAxis: {
					categories: insumos,
					crosshair: true
				},
				yAxis: {
					min: 0,
					title: {
						text: 'cantidad (kg)'
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						'<td style="padding:0"><b>{point.y:.1f} kg</b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true
				},
				plotOptions: {
					series: {
						borderWidth: 0,
						dataLabels: {
							enabled: true,
							format: '{point.y:.0f}'
						}
					}
				},
				series: [{
					name: 'Insumos',
					data: cantidad
				}]
			});
		}
    </script>
@endsection