@extends('includes/base')
@section('content')

<div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">


                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h1 class="main-content-title tx-24 mg-b-5">EDITAR CATEGORÍA {{$proveedor->id}}</h1><br>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                        </ol>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif      
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form class="col-md-10 mx-auto" method="POST" action="{{route('proveedors.update', $proveedor)}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf()
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="nombres" class="">Nombres</label>
                                        <input name="nombre" id="nombre" placeholder="Nombres ..." type="text" class="form-control" value="{{$proveedor->nombre}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="email" class="">Email</label>
                                        <input name="email" id="email" placeholder="ejemplo@gmail.com" type="email" class="form-control" value="{{$proveedor->email}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="ruc" class="">Numero ruc</label>
                                        <input name="numero_ruc"  placeholder="Numero ruc ..." type="number" class="form-control" value="{{$proveedor->numero_ruc}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="telefono" class="">Teléfono</label>
                                        <input name="telefono" id="telefono" placeholder="Telefono ..." type="number" class="form-control" value="{{$proveedor->telefono}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <div>
                                            <input type="text"  class="form-control" name="direccion" value="{{$proveedor->direccion}}" maxlength="60">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group" align="center">
                                <button type="submit" class="btn btn-success">Actualizar</button>
                                <a type="submit" href="/proveedors"  class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
                                    
      
            </div>
        </div>
    </div>
@endsection
