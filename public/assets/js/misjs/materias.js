$('document').ready(function(){
    // function calculoimporte(){
    //     var precio_compra, cantidad, importe;
    //     precio_compra = document.getElementById('precio_compra').value;
    //     cantidad = document.getElementById('cantidad').value;
    //     importe = precio_compra*cantidad;
    //     alert(importe);
    //     $('#importe').val(importe);
    // }
    
});
function calculoimporte(){
    var precio_compra, cantidad, importe;
    precio_compra = document.getElementById('precio_compra').value;
    cantidad = document.getElementById('cantidad').value;
    importe = precio_compra*cantidad;
    $('#importe').val(importe);
    $('#importever').val(importe);

}