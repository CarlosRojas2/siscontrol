@extends('includes/base')
@section('content')

    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h1 class="main-content-title tx-24 mg-b-5">DATOS DE LA CATEGORÍA {{$categoria->id}}</h1><br>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                        </ol>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                            <h4>Nombre: {{$categoria['nombre']}}</h4>  
                            <h4>Descripcion: {{$categoria['descripcion']}}</h4>    
                            <h4>Fecha de Registro: {{$categoria['created_at']}}</h4>
                            @if ($categoria->estado=='1')
                                <h4>Estado: {{'Activo'}}</h4> 
                            @endif 
                    </div>
                    <div class="card-footer">
                        <a href="{{route('categorias.index')}}" class="btn btn-info">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection