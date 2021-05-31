<div class="form-row">

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="telefono" class="">Proveedor</label>
            <select class="multiselect-dropdown form-control" name="proveedor_id" id="proveedor_id">
                <option value=""></option>
                <optgroup label="Proveedor">
                    @foreach ($proveedors as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                </optgroup>
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="ruc" class="">Categoría</label>
            <select class="multiselect-dropdown form-control" name="categoria_id" id="categoria_id">
                <option value=""></option>
                <optgroup label="Categoría">
                    @foreach ($categorias as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                </optgroup>
            </select>
        </div>
    </div>

</div>
<div class="form-row">

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="descripcion" class="">Descripcion</label>
            <input name="descripcion" id="nombre" placeholder="Descripción ..." type="text" class="form-control">
        </div>
    </div>
    
    <div class="col-md-2">
        <div class="position-relative form-group">
            <label for="precio_compra" class="">Precio Compra :</label>
            <input name="precio_compra" id="precio_compra" placeholder="S/" type="number" class="form-control" onkeyup="calculoimporte()">
        </div>
    </div>

    <div class="col-md-2">
        <div class="position-relative form-group">
            <label for="cantidad" class="">Cantidad Kg :</label>
            <input name="cantidad" id="cantidad" placeholder="00" type="number" class="form-control" onkeyup="calculoimporte()">
        </div>
    </div>

    <div class="col-md-2">
        <div class="position-relative form-group">
            <label for="importe" class="">Importe Total :</label>
            <input type="hidden" id="importe" name="importe">
            <input name="importever" id="importever" placeholder="0.00 s/" type="number" class="form-control" disabled>
        </div>
    </div>

</div>