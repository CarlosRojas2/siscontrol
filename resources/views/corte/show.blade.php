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
                            <a type="button" href="{{route('cortes.index')}}" class="o_o_pd_top_7  btn btn-primary my-2 btn-icon-text">
                            <i class="si si-logout mr-2"></i>Volver a Cortes
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="row square">
                    <div class="col-sm-12 col-md-7 col-xl-12">
								<div class="card custom-card">
									<div class="">
										<div class="main-content-body main-content-body-contacts">
											<div class="main-contact-info-header pt-3">
												<div class="media">
													<div class="media-list">
														<h4>{{$corte->descripcion}}</h4>
														<span>{{$corte->fecha_reg}}</span>
													</div>
												</div>
												<div class="main-contact-action btn-list pt-4 pr-3">
													@if($corte->deleted_at == null)
														<div class="main-chat-msg-name">
															<h6>&nbsp;</h6>
															<span class="dot-label bg-success"></span><small class="text-success mr-3">ACTIVO</small>
														</div>
													@else
														<div class="main-chat-msg-name">
															<h6>&nbsp;</h6>
															<span class="dot-label bg-danger "></span><small class="text-danger  mr-3">ANULADO</small>
														</div>
													@endif
												</div>
											</div>
											<div class="card-body p-0 border p-0 rounded-10">
												<div class="p-4">
													<h5 class="mb-3">Detalle </h5>
													<div class="d-sm-flex">
														<div class="mg-sm-r-20 mg-b-10">
															<div class="main-profile-contact-list">
																<div class="media">
																	<div class="media-icon bg-success-transparent text-success"> <i class="si si-user"></i> </div>
																	<div class="media-body"> <span>Proveedor</span>
																		<div> {{$corte->proveedor}} </div>
																	</div>
																</div>
															</div>
														</div>
														<div class="mg-sm-r-20 mg-b-10">
															<div class="main-profile-contact-list">
																<div class="media">
																	<div class="media-icon bg-success-transparent text-success"> <i class="si si-social-dropbox"></i> </div>
																	<div class="media-body"> <span>Producto</span>
																		<div> {{$corte->producto}} </div>
																	</div>
																</div>
															</div>
														</div>

														<div class="mg-sm-r-20 mg-b-10">
															<div class="main-profile-contact-list">
																<div class="media">
																	<div class="media-icon bg-success-transparent text-success"> <i class="si si-tag"></i> </div>
																	<div class="media-body"> <span>Categoría</span>
																		<div> {{$corte->categoria}} </div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="profile-cover__info">
			                                        <ul class="nav">
			                                            <li><strong>{{$corte->total}}</strong>Peso Corte</li>
			                                            <li><strong>{{$corte->merma}}</strong>Merma</li>
			                                            <li><strong>{{$corte->cantidad}}</strong>Peso Planta</li>
			                                        </ul>
			                                    </div>
											</div>
											<div class="main-contact-info-body">
												<h5 class="mb-3">Desglose (kg)</h5>
												<div class="col-xl-12">
														<div class="table-responsive">
															<table class="table mb-0 border-top table-bordered text-nowrap">
																<tbody>
																	<tr>
																		<th scope="row">Costilla</th>
																		<td>{{ $corte->costilla }} </td>
																	</tr>
																	<tr>
																		<th scope="row">Carne Picada</th>
																		<td>{{ $corte->carne_picada }} </td>
																	</tr>
																	<tr>
																		<th scope="row">Hueso Raspado</th>
																		<td>{{$corte->hueso_raspado}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Tocino Choriso</th>
																		<td>{{$corte->tocino_choriso}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Hueso columna</th>
																		<td>{{$corte->hueso_colum}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Cuero </th>
																		<td>{{$corte->cuero}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Papada </th>
																		<td>{{$corte->papada}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Carne pe/ Cecina</th>
																		<td>{{$corte->carne_cecina}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Carne pe/ File</th>
																		<td>{{$corte->carne_file}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Brazuelo</th>
																		<td>{{$corte->brazuelo}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Piernas</th>
																		<td>{{$corte->piernas}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Chaleco</th>
																		<td>{{$corte->chaleco}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Cabeza</th>
																		<td>{{$corte->cabeza}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Patas</th>
																		<td>{{$corte->patas }} </td>
																	</tr>
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
                <!-- Row end -->
            </div>
        </div>
    </div>
@endsection