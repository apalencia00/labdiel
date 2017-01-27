
$(document).ready(function(){

console.log("DOM READY!!");

$("#form").submit(function(event){

	event.preventDefault();




});

$("#genped").click(function(){
	//alert("WUAPEAA");
	 var men = prompt("Tiempo estimado de ensayo para ejecucion del servicio");

  var win = window.open('http://ec2-35-154-118-56.ap-south-1.compute.amazonaws.com:8080/LabDielectrico/webresources/cotizacion/imprimirCotizacion?ncotic='+$("#nocotic").val()+"&tiempo="+men, '_blank');
  win.focus();


});


$("#generarpdf").click(function(){
	
    
var win = window.open('http://ec2-35-154-118-56.ap-south-1.compute.amazonaws.com:8080/LabDielectrico/webresources/recibo_inout/imprimirCotizacion?ncotic='+$("#nocotic").val()+"id_cliente="+$("#listCliente").val(), '_blank');
win.focus();


});

$.ajax({
		
		url: '../backend/Source/Oferta_Servicio.php',
		type: 'GET',
		contentType : "application/json",
		dataType : "json",
		data : {"method" : 'getnumbercotic'},

		success: function(json)
		{	
			console.log(json);
			var obj = jQuery.parseJSON(json);
			$("#nocotic").val(obj[0]['num_cotizacion']);
			$("#idrevision").val(obj[0]['fk_revision_ensayo_equipo']);

		}
	});

$.ajax({

url : "../backend/Source/Oferta_Servicio.php",
type : "GET",
dataType : "json",
contentType : "application/json",
data : {"method" : 'getlistCliente'},

success : function(json){

try{

var $select = $("#listCliente");

var obj = jQuery.parseJSON(json);
		 console.log(obj);
	
			for (var i = 0 ;obj.length - 1; i++) {
				
				$select.append('<option value=' + obj[i]['id_cliente'] + '>' + obj[i]['nombre'] + '</option>'); 	

			}

}catch(e){}



}

});

$("select#listCliente").change(function(){

	var value = $("select#listCliente").val();

	$.ajax({

		url : "../backend/Source/Oferta_Servicio.php",
		type : "GET",
		dataType : "json",
		contentType : "application/json",
		data : {"method" : 'getClienteById' ,"cliente" : value },

		success : function(json){

			var arr = jQuery.parseJSON(json);

			$("input#docu").val(arr[0].documento);
			$("input#nombre").val(arr[0].nombre);
			$("input#tele").val(arr[0].tele);
			$("input#persona").val(arr[0].contacto);
			$("input#nombre").val(arr[0].nombre);
			$("input#email").val(arr[0].email);
			$("input#dire").val(arr[0].direccion);
			$("input#tele").val(arr[0].tel_cliente);

			$('#checkdetalle').bootstrapToggle('enable');


		}


	});


});

$("#checkdetalle").change("click", function(){

	var value = $("select#listCliente").val();

    $.ajax({

 	url : "../backend/Source/Oferta_Servicio.php",
		type : "GET",
		dataType : "json",
		contentType : "application/json",
		data : {"method" : 'getEquipoEnsayo' ,"cliente" : value, "id_revision" : $("#idrevision").val() },

		beforeSend : function(event){

			waitingDialog.show('Cargando.. Por favor espere');setTimeout(function () {waitingDialog.hide();}, 5000)

		},

		success : function(json){

			var arr = jQuery.parseJSON(json);

			console.log(arr);
				
				var html = '<table id="tbl1" class="table table-striped" border="0">';
				var i = 0;
				$.each(arr, function(key, value){
						
						console.log(arr[key]);
					html += '<td width="10%" >' +  arr[key].id_tipo_equipo + '</td>' + '<td width="10%" >' +  arr[key].descripcion + '</td>' + '<td width="10%" >' +  arr[key].cantidad + '</td>' + '<td width="10%" >' + arr[key].valor + '</td>' ;
					html += '</tr>';

				});

				html += '</table>';
				$('#act_table').html(html);
			


		}


    });

  });

$('#aprobar').on('click', function() {


var table = document.getElementById('act_table'), 
    rows = table.getElementsByTagName('tr'),
    i, j, cells, customerId;

for (i = 0, j = rows.length; i < j; ++i) {
    cells = rows[i].getElementsByTagName('td');
    if (!cells.length) {
        continue;
    }

    console.log(cells[0].innerHTML);
    console.log(cells[2].innerHTML);
    console.log(cells[3].innerHTML);
   
    	$.ajax({
    		
    		url: '../backend/Source/Oferta_Servicio.php',
    		type: 'GET',
    		contentType : "application/json",
    		dataType : "json",
    		data : {"method" : 'regDetalleCotizacion',"cotizacion" : $("#nocotic").val(), "codigoe" : cells[0].innerHTML, "cantidad" : cells[2].innerHTML, "valor" : cells[3].innerHTML},
    		beforeSend : function(){

    			waitingDialog.show('Cargando.. Por favor espere');setTimeout(function () {waitingDialog.hide();}, 2000)


    		},

    		success: function(json)
    		{

    			console.log(json);

    			var obj = jQuery.parseJSON(json);
					console.log(obj.success);
					if(obj[0].success){ 

					BootstrapDialog.show({
						title : 'Operacion Exitosa',
						type : BootstrapDialog.TYPE_SUCCESS,
						message: obj[0].mensaje,
						buttons: [{
							label: 'Aceptar',
							action: function(dialogItself){
								dialogItself.close();
							}
						} ]
					});    

				 }else{

				 	BootstrapDialog.show({
				 		title : 'Error',
						type : BootstrapDialog.TYPE_DANGER,
						message: obj[0].mensaje,
						buttons: [{
							label: 'Ok',
							action: function(dialogItself){
								dialogItself.close();
							}
						} ]
					});  

				 }
    		},error : function(event){

    			BootstrapDialog.show({
						title : 'Error en Peticion',
						type : BootstrapDialog.TYPE_DANGER,
						message: 'Error no se pudo realizar la solicitud',
						buttons: [{
							label: 'Ok',
							action: function(dialogItself){
								dialogItself.close();
							}
						} ]
					}); 

    		}
    	});

    }

});

 

});




