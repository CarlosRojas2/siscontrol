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
                    <div>Editar proveedor
                        <div class="page-title-subheading">Editar proveedor.</div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a type="button" href="{{route('proveedors.index')}}" data-toggle="tooltip" title="Agregar Proveedor" data-placement="bottom"
                        class="mb-2 mr-2 btn-hover-shine btn btn-success">Ver proveedor 
                        <i class="fa fa-plus-square"></i>
                    </a>
                </div>     
            </div>
        </div>        
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form id="proveedors" class="col-md-10 mx-auto" method="POST" action="{{route('proveedors.update', $proveedor)}}">
                    @csrf
                    @method('put')
                    <div class="form-row">
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
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="ruc" class="">Numero ruc</label>
                                <input name="numero_ruc" id="numero_ruc" placeholder="Numero ruc ..." type="number" class="form-control" value="{{$proveedor->numero_ruc}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="telefono" class="">Teléfono</label>
                                <input name="telefono" id="telefono" placeholder="Telefono ..." type="number" class="form-control" value="{{$proveedor->telefono}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <div>
                            <textarea rows="1" class="form-control autosize-input" name="direccion" id="direccion" style="height: 35px;" placeholder="Direccion ...">{{$proveedor->direccion}}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group" align="center">
                        <button type="submit" class="mb-2 mr-2 btn-hover-shine btn btn-alternate" value="registrar">Registrar</button>
                        <a type="submit" href="{{route('proveedors.index')}}"  class="mb-2 mr-2 btn-hover-shine btn btn-light" name="cancelar" value="Cancelar">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection