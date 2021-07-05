@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección Producción de ahumados</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Producción de ahumados</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('prod_ahumados.index')}}" class="o_o_pd_top_7  btn btn-primary my-2 btn-icon-text">
                            <i class="si si-logout mr-2"></i>Volver a Porducción de ahumados
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
														<h4>{{$consulta->descripcion}}</h4>
														<span>{{$consulta->fecha_reg}}</span>
													</div>
												</div>
												<div class="main-contact-action btn-list pt-4 pr-3">
													@if($consulta->deleted_at == null)
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
											<div class="profile-cover__info">
			                                        <ul class="nav">
			                                            <li><strong>{{$consulta->cantidad_producida}}</strong>Cantidad Producida</li>
			                                        </ul>
			                                </div>
											<div class="main-contact-info-body">
												<h5 class="mb-3">Productos (kg)</h5>
												<div class="col-xl-12">
														<div class="table-responsive">
															<table class="table mb-0 border-top table-bordered text-nowrap">
																<tbody>
																	<tr>
																		<th scope="row">Cecina</th>
																		<td>{{ $consulta->carne_cecina }} </td>
																	</tr>
																	<tr>
																		<th scope="row">Lomo</th>
																		<td>{{$consulta->carne_file}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Costilla </th>
																		<td>{{$consulta->costilla}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Hueso</th>
																		<td>{{$consulta->hueso_colum}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Hueso Raspado</th>
																		<td>{{$consulta->hueso_raspado}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Cabeza</th>
																		<td>{{$consulta->cabeza}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Patas</th>
																		<td>{{$consulta->patas}} </td>
																	</tr>
																	<tr>
																		<th scope="row">Tocino</th>
																		<td>{{$consulta->tocino_choriso}} </td>
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