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

/*-----------------------------------PROCESAR ahumado------------------------------*/

    const procesar=(e)=>{
        event.preventDefault();

        if( document.getElementById('table_1').querySelector('.o_o_error')){
            return false;
        }
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
                    
                    var data_form = $('#ahumados').serializeArray();
                    var ahumado_id= $('#ahumado_id').val();
                    var formulario = {}; 
                    $.each(data_form,function(i,item){
                        if(item.value==''){
                            item.value=0;
                        }
                        formulario[item.name] = item.value;
                    });
                    if(ahumado_id == 'insert'){ 
                        var ruta    ="{{route('prod_ahumados.store')}}";
                        var metodo  ="POST";
                    }else{ 
                        var ruta="{{route('prod_ahumados.update','update')}}";
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
                                    case 1:
                                        $('#cecina').addClass('o_o_error');
                                        $('#cecina').focus();
                                        return false;
                                    case 2:
                                        $('#lomo').addClass('o_o_error');
                                        $('#lomo').focus();
                                        return false;
                                    case 3:
                                        $('#costilla').addClass('o_o_error');
                                        $('#costilla').focus();
                                        return false;
                                    case 4:
                                        $('#hueso').addClass('o_o_error');
                                        $('#hueso').focus();
                                        return false;
                                    case 5:
                                        $('#cuero').addClass('o_o_error');
                                        $('#cuero').focus();
                                        return false;
                                    case 6:
                                        $('#hueso_raspado').addClass('o_o_error');
                                        $('#hueso_raspado').focus();
                                        return false;
                                    case 7:
                                        $('#cabeza').addClass('o_o_error');
                                        $('#cabeza').focus();
                                        return false;
                                    case 8:
                                        $('#patas').addClass('o_o_error');
                                        $('#patas').focus();
                                        return false;
                                    case 9:
                                        $('#tocino').addClass('o_o_error');
                                        $('#tocino').focus();
                                        return false;
                                    case 10:
                                        $('#panceta').addClass('o_o_error');
                                        $('#panceta').focus();
                                        return false;
                                }   
                                if(data=='update') {
                                    localStorage.mensaje_codetime="Produción Editada con éxito."; 
                                }else{
                                    localStorage.mensaje_codetime="Produción Insertada con éxito."; 
                                }
                                window.location ="{{route('prod_ahumados.index')}}";
                               
                        },
                        error: function () {
                                alert("error");
                        }
                    });
                }
            })

    }
/*-------------------------CALCULOS DE CANTIDAD PROCESADA--- -------------------------*/
const calcular_total=(cant_usar)=>{
        cant_procesada=0;
		$('.cant_clas').each(function(item, e){
	      	var num = parseFloat($(e).val());
	      	if (isNaN(num) | num == undefined){ //Validamos si está vacío o no es un número para acumular
	        	num=0;
	       	}
	       	cant_procesada += num;
	    });
		cant_procesada		=	cant_procesada.toFixed(2);

		$('#total').val(cant_procesada);
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