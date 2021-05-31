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
                    <div>Nuevo proveedor
                        <div class="page-title-subheading">Agregar nuevo proveedor.</div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a type="button" href="{{route('proveedors.index')}}" data-toggle="tooltip" title="Ver proveedor" data-placement="bottom"
                        class="mb-2 mr-2 btn-hover-shine btn btn-success">Ver proveedor 
                        <i class="fa fa-plus-square"></i>
                    </a>
                </div>     
            </div>
        </div>        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form id="proveedors" class="col-md-10 mx-auto" method="POST" action="{{route('proveedors.store')}}">
                    @csrf
                    @include('proveedors/_form')
                    
                    <div class="form-group" align="center">
                        <button type="submit" class="mb-2 mr-2 btn-hover-shine btn btn-alternate" value="registrar">Registrar</button>
                        <a type="submit" href="{{route('proveedors.index')}}"  class="mb-2 mr-2 btn-hover-shine btn btn-light" name="cancelar" value="Cancelar">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection