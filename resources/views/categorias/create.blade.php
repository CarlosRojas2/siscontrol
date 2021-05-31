@extends('includes/base')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-picture text-danger"></i>
                    </div>
                    <div>Nueva categoría
                        <div class="page-title-subheading">Agregar nueva categoría.</div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a type="button" href="{{route('categorias.index')}}" data-toggle="tooltip" title="Agregar categoría" data-placement="bottom"
                        class="mb-2 mr-2 btn-hover-shine btn btn-success">Ver ctegorías 
                        <i class="fa fa-plus-square"></i>
                    </a>
                </div>     
            </div>
        </div>        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form id="categorias" class="col-md-10 mx-auto" method="POST" action="{{route('categorias.store')}}">
                    @csrf
                    @include('categorias/_form')
                    
                    <div class="form-group" align="center">
                        <button type="submit" class="mb-2 mr-2 btn-hover-shine btn btn-alternate" value="guardar">Registrar</button>
                        <a type="submit" href="{{route('categorias.index')}}"  class="mb-2 mr-2 btn-hover-shine btn btn-light" name="signup" value="Sign up">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection