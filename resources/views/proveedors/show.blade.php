@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h1 class="main-content-title tx-24 mg-b-5">DATOS DE LA PROVEEDORES {{$proveedor->id}}</h1><br>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">proveedors</li>
                        </ol>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                            <h4>Nombre: {{$proveedor['nombre']}}</h4>  
                            <h4>Email: {{$proveedor['email']}}</h4>    
                            <h4>Numero de RUC: {{$proveedor['numero_ruc']}}</h4>    
                            <h4>Telefono: {{$proveedor['telefono']}}</h4>    
                            <h4>Direccion: {{$proveedor['direccion']}}</h4>    
                            <h4>Fecha de Registro: {{$proveedor['created_at']}}</h4>
                            @if ($proveedor->estado=='1')
                                <h4>Estado: {{'Activo'}}</h4> 
                            @endif 
                    </div>
                    <div class="card-footer">
                        <a href="{{route('proveedors.index')}}" class="btn btn-info">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection