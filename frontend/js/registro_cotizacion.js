
$(document).ready(function(){

console.log("DOM READY!!");

$("#form").submit(function(event){

	event.preventDefault();




});

$("#genped").click(function(){
	//alert("WUAPEAA");
  var win = window.open('http://localhost:8080/LabDielectrico/webresources/cotizacion/imprimirCotizacion?ncotic='+$("#nocotic").val(), '_blank');
  win.focus();


});


$("#generarpdf").click(function(){
	
  var win = window.open('http://localhost:8080/LabDielectrico/webresources/recibo_inout/imprimirCotizacion?ncotic='+$("#nocotic").val()+"id_cliente=1000", '_blank');
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
					html += '<td width="10%" >' +  arr[key].id_tipo_equipo + '</td>' + '<td width="10%" >' +  arr[key].descripcion + '</td>' + '<td width="10%" >' +  arr[key].cantidad + '</td>' + '<td width="10%" >' + arr[key].valor + '</td>'  + '<td width="10%" align="center" > <input type="checkbox"   >  </td>' ;
					html += '</tr>';

				});

				html += '</table>';
				$('#act_table').html(html);
			


		}


    });

  });

$('#aprobar').on('click', function() {
  //Get checked checkboxes

  var checkedCheckboxes = $("#tbl1 :checkbox:checked"),
    arr = [];

  //For each checkbox
  for (var i = 0; i < checkedCheckboxes.length; i++) {

    //Get checkbox
    var checkbox = $(checkedCheckboxes[i]);

    //Get checkbox value
    var checkboxValue = checkbox.val();

    //Get siblings
    var siblings = checkbox.parent().siblings();

    //Get values of siblings
    var value1 = $(siblings[0]).text(); //codigo equipo
    var value2 = $(siblings[1]).text(); // tipo equipo
    var value3 = $(siblings[2]).text(); // cantidad
    var value4 = $(siblings[3]).text(); // valor

  

    }

    	$.ajax({
    		
    		url: '../backend/Source/Oferta_Servicio.php',
    		type: 'GET',
    		contentType : "application/json",
    		dataType : "json",
    		data : {"method" : 'regDetalleCotizacion',"cotizacion" : $("#nocotic").val(), "codigoe" : value1, "cantidad" : value3, "valor" : value4},
    		success: function(data)
    		{
    			
    		}
    	});

    


  

});


});




