@extends('includes/base')
@section('content')

<div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">

                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h1 class="main-content-title tx-24 mg-b-5">REGISTRAR NUEVA CATEGORÍA</h1><br>
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
                        <form class="col-md-10 mx-auto" method="POST" action="{{route('categorias.index')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <div>
                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre ..." value="{{ old('nombre') }}" required maxlength="60">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <div>
                                            <input type="text" class="form-control" name="descripcion" placeholder="Descripcion ... " value="{{ old('descripcion') }}" required maxlength="60">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group" align="center">
                                <button type="submit" class="btn btn-success">Registrar</button>
                                <a type="submit" href="{{route('categorias.index')}}"  class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
                                    
      
            </div>
        </div>
    </div>
@endsection
