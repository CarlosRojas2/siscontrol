@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de cortes de materia prima</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cortes</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('materias.create')}}" class="btn btn-primary my-2 btn-icon-text">
                            <i class="fe fe-plus mr-2"></i> cualquier cosa
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="row square">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="panel profile-cover">
                                    <div class="profile-cover__img">
                                        <h3 class="h3">{{$materia->producto->nombre}}</h3>
                                    </div>
                                    {{-- <div class="btn-profile">
                                        <button class="btn btn-rounded btn-danger">
                                            <i class="fa fa-plus"></i>
                                            <span>Follow</span>
                                        </button>
                                        <button class="btn btn-rounded btn-success">
                                            <i class="fa fa-comment"></i>
                                            <span>Message</span>
                                        </button>
                                    </div> --}}
                                    <div class="profile-cover__action bg-img"></div>
                                    <div class="profile-cover__info">
                                        <ul class="nav">
                                            <li><strong>{{$materia->cantidad}}</strong>Kg</li>
                                            <li><strong>{{$materia->precio_compra}}</strong>Precio compra</li>
                                            <li><strong>{{$materia->importe}}</strong>Total</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-tab tab-menu-heading">
                                    <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100">
                                        <a class="nav-link  active" data-toggle="tab" href="#about">Cortes</a>
                                        <a class="nav-link" data-toggle="tab" href="#edit">Más</a>
                                        <a class="nav-link" data-toggle="tab" href="#timeline">Más</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row end -->

                <!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card main-content-body-profile">
									<div class="tab-content">
										<div class="main-content-body tab-pane p-4 border-top-0 active" id="about">
											<div class="card-body border">
												<div class="mb-4 main-content-label">Parte 1</div>
												<form class="form-horizontal">
													<div class="mb-4 main-content-label">Name</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">User Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="User Name" value="Mack Adamia">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">First Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="First Name" value="Mack Adamia">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">last Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Last Name" value="Mack Adamia">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Nick Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Nick Name" value="Spruha">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Designation</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Designation" value="Web Designer">
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
										<div class="main-content-body tab-pane p-4 border-top-0" id="edit">
											<div class="card-body border">
												<div class="mb-4 main-content-label">Parte 2</div>
												<form class="form-horizontal">
													<div class="mb-4 main-content-label">Name</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">User Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="User Name" value="Mack Adamia">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">First Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="First Name" value="Mack Adamia">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">last Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Last Name" value="Mack Adamia">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Nick Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Nick Name" value="Spruha">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Designation</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Designation" value="Web Designer">
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
										<div class="main-content-body tab-pane p-4 border-top-0" id="timeline">
											<div class="card-body border">
												<div class="mb-4 main-content-label">Parte 3</div>
												<form class="form-horizontal">
													<div class="mb-4 main-content-label">Name</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">User Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="User Name" value="Mack Adamia">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">First Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="First Name" value="Mack Adamia">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">last Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Last Name" value="Mack Adamia">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Nick Name</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Nick Name" value="Spruha">
															</div>
														</div>
													</div>
													<div class="form-group ">
														<div class="row row-sm">
															<div class="col-md-3">
																<label class="form-label">Designation</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="Designation" value="Web Designer">
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
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