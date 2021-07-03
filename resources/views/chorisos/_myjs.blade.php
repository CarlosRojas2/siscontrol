@section('myjs')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

/*----------------------------------MENSAJES SWAL---------------------------*/

/*---------------------CONFIRMACION----------------------------*/

	$(document).ready(function(){

        if (localStorage.getItem("mensaje_codetime")) {
               swal.fire({
				  title: "Producción",
				  text: localStorage.getItem("mensaje_codetime"),
				  icon: "success",
				  showConfirmButton: false,
                  timer: 1500,
				});
                setTimeout(borrar_mesaje,100);
            }
    });
    const borrar_mesaje=()=>{
            localStorage.removeItem("mensaje_codetime");
    }
/*---------------------ELIMINACION----------------------------*/
    $('.form_delete').submit(function(e){
            e.preventDefault();
            swal.fire({
              title: "¿Está seguro?",
              text: "Confirmar si deceas Eliminar",
              icon: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn btn-danger",
              confirmButtonText: "¡Sí, Bórralo!",
              cancelButtonText: "Cancelar",
              closeOnConfirm: false
            }).then((result)=>{
                if(result.value){
                    this.submit();
                }
            })
	});

/*-----------------------------------PROCESAR CHORISO------------------------------*/

    const procesar=(e)=>{
        event.preventDefault();

        /*if( document.getElementById('table_1').querySelector('.o_o_error')){
            return false;
        }*/ 
        swal.fire({
              title: "¿Está seguro?",
              text: "Confirmar si deseas proceder",
              icon: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn btn-danger",
              confirmButtonText: "¡Sí, Procesar!",
              cancelButtonText: "Cancelar",
              closeOnConfirm: false
            }).then((result)=>{
                if(result.value){
                    
                    var data_form = $('#chorisos').serializeArray();
                    var choriso_id= $('#choriso_id').val();
                    var formulario = {}; 
                    $.each(data_form,function(i,item){
                        if(item.value==''){
                            item.value=0;
                        }
                        formulario[item.name] = item.value;
                    });
                    if(choriso_id == 'insert'){ 
                        var ruta    ="{{route('prod_chorisos.store')}}";
                        var metodo  ="POST";
                    }else{ 
                        var ruta="{{route('prod_chorisos.update','update')}}";
                        var metodo  ="PATCH";
                    }
                    $.ajax({
                        headers : { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        url     : ruta,
                        type    : 'POST',
                        data    : {'formulario':JSON.stringify(formulario)},
                        dataType: "html",
                        method  : metodo,
                        success : function(data){
                                data=eval(data);
                                switch (data) {
                                    case 4:
                                        return false;
                                    case 0:
                                        $('#cant_procesada').addClass('o_o_error_form');
                                        $('#cant_procesada').focus();
                                        return false;
                                    case 1:
                                        $('#carne_picada').addClass('o_o_error');
                                        $('#tocino_choriso').addClass('o_o_error');
                                        $('#papada').addClass('o_o_error');
                                        $('#carne_picada').focus();
                                        return false;
                                    case 2:
                                        $('#cant_procesada').removeClass('o_o_error_form');
                                        $('#carne_picada').removeClass('o_o_error');
                                        $('#tocino_choriso').removeClass('o_o_error');
                                        $('#papada').removeClass('o_o_error');
                                        $('#madeja').addClass('o_o_error');
                                        $('#madeja').focus();
                                        return false;
                                }   
                                if(data=='update') {
                                    localStorage.mensaje_codetime="Produción Editada con éxito."; 
                                }else{
                                    localStorage.mensaje_codetime="Produción Insertada con éxito."; 
                                }
                                window.location ="{{route('prod_chorisos.index')}}";
                               
                        },
                        error: function () {
                                alert("error");
                        }
                    });
                }
            })

    }
 /*-------------------------SELECCIONAR SALIDA PRODUCTO----------------------*/

    const select_salida_produto=(e)=>{
        var stok = $('option:selected', e).attr('data-stok');
        $('#stock').val(stok);
    }

/*----------------------INGRESO DE DATOS EN TABLA -------------------------*/

    $('#table_1').on('keyup', 'input', function (e) {
        var elemt       = $(this);
        var total       = parseFloat(elemt.val());
        var total_usar  = $('#total_'+elemt.attr('name')).text();
        total_usar      = parseFloat(total_usar);
        if(total <= 0 | total>total_usar){
             $('#'+elemt.attr('name')).addClass('o_o_error');
             return false;
        }
        $('#'+elemt.attr('name')).removeClass('o_o_error');
        /*if( document.getElementById('table_1').querySelector('.o_o_error')){
            return console.log('existe errores');
        }*/
    });

</script>
@endsection