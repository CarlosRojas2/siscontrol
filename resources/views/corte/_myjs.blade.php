@section('myjs')

<script type="text/javascript">
var cant_t=0;
	
	const create_corte=(e)=>{

		event.preventDefault();
        var data_form= $('#cortes').serializeArray();
        var formulario = {};
        $.each(data_form,function(i,item){
        	if(item.value==''){
        		item.value=0;
        	}
            formulario[item.name] = item.value;
        });
        $.ajax({
        	headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url     : "{{route('corte.store')}}",
            type    : 'POST',
            data    :  {'formulario':JSON.stringify(formulario)},
            dataType: "html",
            success : function(data){
                    data=eval(data);
                    console.log(data);
                   
            },
            error: function () {
                    alert("error");
            }
        });

	}
	const select_cant=(e)=>{
		cant_d=$('#cantidad_d').val();
		if(e.value<=0){ 
			$('#table_1 input').attr('readonly',true);  
			$('#table_2 input').attr('readonly',true);
			$('#cantidad_detalle').val(''); 
			return false;
		}

		if(e.value > parseInt(cant_d)){
			e.value=cant_d;
			$('#cantidad_detalle').val(cant_d);
		}
		else{
			$('#cantidad_detalle').val(e.value);
		}
		calcular_total(e.value);
		if($('#merma').val() == e.value){
			$('#merma').val('');
		}
		else{
			$('#total').removeClass('o_o_error');
			$('#merma').removeClass('o_o_error');
			$('#reg_bt').attr('disabled',false);
		}
		$('#table_1 input').attr('readonly',false);  
		$('#table_2 input').attr('readonly',false);  
	}

	$('.tablas').on('keyup', 'input', function (e) {
		var elemt=$(this);
		if(elemt.attr('readonly')){return false;}

		var cant_usar	= $('#cantidad').val();
	   	calcular_total(cant_usar);
	   	if (cant_t==0) {
	   		$('#merma').val('');
	   		$('#total').removeClass('o_o_error');
			$('#merma').removeClass('o_o_error');
			$('#reg_bt').attr('disabled',true);
			return false;
	   	}
		if(cant_t>cant_usar){
			$('#total').addClass('o_o_error');
			$('#merma').addClass('o_o_error');
			$('#reg_bt').attr('disabled',true);
			return false;
		}
		$('#total').removeClass('o_o_error');
		$('#merma').removeClass('o_o_error');
		$('#reg_bt').attr('disabled',false);
	});

	const calcular_total=(cant_usar)=>{
		cant_t=0;
		$('.cant_clas').each(function(item, e){
	      	var num = parseInt($(e).val());
	      	if (isNaN(num) | num == undefined){ //Validamos si está vacío o no es un número para acumular
	        	num=0;
	       	}
	       	cant_t += num;
	    });

		$('#total').val(cant_t);
		$('#merma').val(cant_usar-cant_t);
	}
</script>
@endsection