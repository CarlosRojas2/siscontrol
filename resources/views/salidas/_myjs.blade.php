@section('myjs')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

/*----------------------------------MENSAJES SWAL---------------------------*/

/*---------------------CONFIRMACION----------------------------*/

	$(document).ready(function(){

        if (localStorage.getItem("mensaje_codetime")) {
               swal.fire({
				  title: "Salidas",
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
/*----------------------INGRESO SACAR CHORISO -------------------------*/

const sacar_cho=(id,choriso,cant)=>{
        $('#id_choriso').val(id);
        $('#tipo_cho').val(choriso);
        $('#stock').val(cant);
        $('#modal-datepicker').appendTo("body").modal('show');
}
/*---------------------INGRESO DE LA CANTIDAD -------------------------*/
error=0;
const select_cant_salida=(e)=>{
    stock=$('#stock').val();
    cant_u=parseFloat(e.value);
    if(cant_u>stock){ 
		$('#cant_salida').addClass('o_o_error');
        $error=1; 
		return false;
	}
    $('#cant_salida').removeClass('o_o_error');
    error=0;
}

/*---------------------ELIMINACION----------------------------*/

$('.form_salida').submit(function(e){
    e.preventDefault();
    var cant_u=$('#cant_salida').val();
    if(error==1 | cant_u=='' | cant_u==' ' | cant_u==0){
        return false;
    }
    this.submit();
});
</script>
@endsection