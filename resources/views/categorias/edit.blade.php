@extends('includes/base')
@section('content')

<div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Sección de Categorías</h2><br>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categorías</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center text-white">
                            <a type="button" href="{{route('categorias.index')}}" class="o_o_pd_top_7 btn btn-primary my-2 btn-icon-text">
                            <i class="si si-layers mr-2 o_o_ico_btn"></i> Ver Categorías
                            </a>
                        </div>
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
                        <div>
                            <h6 class="main-content-label mb-1">EDITAR CATEGORIA</h6>
                            <p class="text-muted card-sub-title">Actualice el formulario para Editar la Categoría {{$categoria->id}}.</p>
                        </div>
                        <form class="col-md-10 mx-auto" method="POST" action="{{route('categorias.update', $categoria)}}"  enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf()
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <div>
                                            <input type="text" class="form-control"  name="nombre" value="{{$categoria->nombre}}" maxlength="120"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group" align="center">
                                <button type="submit" class="btn btn-primary pd-x-30 mg-r-10">Editar</button>
                                <a type="button" href="{{route('categorias.index')}}" class="btn ripple btn-secondary pd-x-30">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
                                    
      
            </div>
        </div>
    </div>
@endsection
