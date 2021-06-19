@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de Proveedores</h2><br>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Proveedores</li>
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
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div>
                            <h4>DATOS DEL PROVEEDOR: {{$proveedor->id}}</h4><br> 
                        </div>
                            <h4>Nombre: {{$proveedor['nombre']}}</h4>  
                            <h4>Email: {{$proveedor['email']}}</h4>    
                            <h4>Numero de RUC: {{$proveedor['numero_ruc']}}</h4>    
                            <h4>Telefono: {{$proveedor['telefono']}}</h4>    
                            <h4>Direccion: {{$proveedor['direccion']}}</h4>    
                            <h4>Fecha de Registro: {{$proveedor['created_at']}}</h4>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('proveedors.index')}}" class="btn btn-info">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection