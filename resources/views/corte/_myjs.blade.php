@section('myjs')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
/*----------------------------------VARIABLE GENERAL------------------------*/
	var cant_t	=	0;
	
/*----------------------------------MENSAJES SWAL---------------------------*/

/*---------------------CONFIRMACION----------------------------*/

	$(document).ready(function(){

        if (localStorage.getItem("mensaje_codetime")) {
               swal.fire({
				  title: "Cortes",
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
    $('.delet_cortes').submit(function(e){
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

/*----------------------NUEVO CORTE ENVIO CONTROLLER-------------------------*/

	const create_corte=(e)=>{
		event.preventDefault();

		swal.fire({
              title: "¿Está seguro?",
              text: "Confirmar si deseas proceder a cortar",
              icon: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn btn-danger",
              confirmButtonText: "¡Sí, Cortar!",
              cancelButtonText: "Cancelar",
              closeOnConfirm: false
            }).then((result)=>{
                if(result.value){
                  
			        var data_form= $('#cortes').serializeArray();
			        var corte_id= $('#corte_id').val();
			        var formulario = {}; 
			        $.each(data_form,function(i,item){
			        	if(item.value==''){
			        		item.value=0;
			        	}
			            formulario[item.name] = item.value;
			        });
			        if(corte_id == 'insert'){ 
			        	var ruta	="{{route('cortes.store')}}";
			        	var metodo	="POST";
			        }else{ 
			        	var ruta="{{route('cortes.update','update')}}";
			        	var metodo	="PATCH";
			        }
			        $.ajax({
			        	headers	: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			            url     : ruta,
			            type    : 'POST',
			            data    : {'formulario':JSON.stringify(formulario)},
			            dataType: "html",
			            method	: metodo,
			            success : function(data){
			                    data=eval(data);
			                    console.log(data);
			                    if(data==0){
			                    	$('#descripcion').addClass('o_o_error_form');
			                    	$('#descripcion').focus();
			                    	return false;
			                    }
			                    if(data=='update') {
			                    	localStorage.mensaje_codetime="Corte Editado con éxito."; 
			                    }else{
			                    	localStorage.mensaje_codetime="Corte Insertado con éxito."; 
			                    }
			                    window.location ="{{route('cortes.index')}}";
			                   
			            },
			            error: function () {
			                    alert("error");
			            }
			        });
			    }
            })

	}

/*----------------------SELECIONAR CANTIDAD A USAR -------------------------*/

	const select_cant=(e)=>{
		cant_d=parseFloat($('#cantidad_d').val());
		cant_u=parseFloat(e.value);
		
		if(cant_u<=0){ 
			$('#table_1 input').attr('readonly',true);  
			$('#table_2 input').attr('readonly',true);
			$('#cantidad_detalle').val(''); 
			return false;
		}

		if(cant_u > cant_d){
			e.value=cant_d;
			cant_u=cant_d;
			$('#cantidad_detalle').val(cant_d);
		}
		else{
			$('#cantidad_detalle').val(cant_u);
		}

		if (isNaN(cant_u) | cant_u == undefined){
			$('#cantidad_detalle').val('');
			$('#merma').val('');
			$('#table_1 input').attr('readonly',true);  
			$('#table_2 input').attr('readonly',true);
			$('#reg_bt').attr('disabled',true);
			return false;
	    }
		var c_t=calcular_total(cant_u);
		
		if(c_t == false){
			return false;
		}
		/*if($('#merma').val() == cant_u){
			$('#merma').val('');
		}
		else{}*/
		$('#merma').removeClass('o_o_error');
		$('#reg_bt').attr('disabled',false);
		$('#table_1 input').attr('readonly',false);  
		$('#table_2 input').attr('readonly',false);  
	}

/*----------------------INGRESO DE DATOS EN TABLA -------------------------*/

	$('.tablas').on('keyup', 'input', function (e) {
		var elemt=$(this);
		if(elemt.attr('readonly')){return false;}

		var cant_usar 	= 	parseFloat($('#cantidad').val());
	   	var c_t			=	calcular_total(cant_usar);
	   	if(c_t == false){	return false;}

	   	/*if (cant_t==0) {
	   		$('#merma').val('');
			$('#merma').removeClass('o_o_error');
			$('#reg_bt').attr('disabled',true);
			return false;
	   	}*/
		$('#merma').removeClass('o_o_error');
		$('#reg_bt').attr('disabled',false);
	});

/*-------------------------CALCULOS DEL TOTAL--- -------------------------*/

	const calcular_total=(cant_usar)=>{
		cant_t=0;
		$('.cant_clas').each(function(item, e){
	      	var num = parseFloat($(e).val());
	      	if (isNaN(num) | num == undefined){ //Validamos si está vacío o no es un número para acumular
	        	num=0;
	       	}
	       	cant_t += num;
	    });
		cant_t		=	cant_t.toFixed(2);
		var merma	= 	(cant_usar-cant_t).toFixed(2);

		$('#total').val(cant_t);
		$('#merma').val(merma);

		if(merma<0){
			$('#merma').addClass('o_o_error');
			$('#reg_bt').attr('disabled',true);
			return false;
		}
		return true;
	}
</script>
@endsection