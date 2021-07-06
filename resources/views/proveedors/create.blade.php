@extends('includes/base')
@section('content')

<div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body"> 

                <!-- Page Header -->
                <div class="page-header"> 
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de Proveedores</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Proveedores</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('proveedors.index')}}" class="o_o_pd_top_7 btn btn-primary my-2 btn-icon-text">
                            <i class="si si-layers mr-2 o_o_ico_btn"></i> Ver Proveedores
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->
                <!-- Page Mensaje de errores -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- End Mensaje de errores -->  
                <!--Row-->
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">Registro de Proveedor</h6>
                                    <p class="text-muted card-sub-title">Complete el formulario para registrar un nuevo Proveedor.</p>
                                </div>
                                <form  method="POST" action="{{route('proveedors.index')}}" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="nombres" class="">Nombres</label>
                                                <input name="nombre" placeholder="Nombres ..." type="text" class="form-control" value="{{ old('nombre') }}" required maxlength="60">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="email" class="">Email</label>
                                                <input name="email" id="email" placeholder="ejemplo@gmail.com" type="email" class="form-control" value="{{ old('email') }}" required max="60">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="ruc" class="">Numero ruc</label>
                                                <input name="numero_ruc" placeholder="Numero ruc ..." type="text" class="form-control" value="{{ old('numero_ruc') }}" onkeypress="return validaNumericos(event);" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="telefono" class="">Teléfono</label>
                                                <input name="telefono"  placeholder="Telefono ..." type="text" class="form-control" value="{{ old('telefono') }}" onkeypress="return validaNumericos(event);" maxlength="9" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="direccion">Direccion</label>
                                                <div>
                                                    <input type="text" class="form-control" name="direccion" placeholder="Direccion ... " value="{{ old('direccion') }}" maxlength="60">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-end mb-0" align="center">
                                                <div class="col-md-12 pl-md-6 text-white">
                                                    <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-10" value="registrar">Registrar</button>
                                                    <a type="button" href="{{route('proveedors.index')}}" class="btn ripple btn-secondary pd-x-30">Cancelar</a>
                                                </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row end -->
            </div>
        </div>
    </div>
@endsection
