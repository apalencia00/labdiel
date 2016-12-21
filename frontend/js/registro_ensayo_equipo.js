
$(document).ready(function(){

	$("#form").submit(function(event){

		event.preventDefault();



	});

	$.ajax({

		url : "../backend/Source/Oferta_Servicio.php",
		type : "GET",
		dataType : "json",
		contentType : "application/json",
		data : {"method" : 'getlistCliente'},

		success : function(json){

			var $select = $("select#listCliente");

			var obj = $.parseJSON(json);

			console.log(obj);

			for (var i = 0 ;obj.length - 1; i++) {
				
				$select.append('<option value=' + obj[i]['id_cliente'] + '>' + obj[i]['nombre'] + '</option>'); 	

			}

		}

	});


	$.ajax({
		
		type: 'GET',
		url: '../backend/Source/Cliente.php',
		contentType : "application/json",
		dataType : "json",
		data : {"method" : 'getCiudad'},
		success: function(json)
		{

			
			var $select = $('#ciudad'); 

			var obj = jQuery.parseJSON( json);

			for (var i = 0 ;obj.length - 1; i++) {

				$select.append('<option value=' + obj[i]['divipo'] + '>' + obj[i]['descripcion'] + '</option>'); 	

			}
		}
	});



		$.ajax({
			
			url: '../backend/Source/Ensayo_Equipo.php',
			type: 'GET',
			contentType : "application/json",
			dataType : "json",
			data : {"method" : 'tipoequipo'},
			success: function(json)
			{

				var $select = $("#tipoequipo");

				var obj = jQuery.parseJSON(json);
				
				for (var i = 1 ;obj.length - 1; i++) {
				
				$select.append('<option value=' + obj[i]['tipo_equipo'] + '>' + obj[i]['descripcion'] + ' - ' + obj[i]['desc_clase'] + '</option>'); 	

			}

			}
		});


		$("#addensayo").click(function(){

			var fechax      = $("input#fecha").val();
			var cliente     = $("#listCliente").val();
			var indoor      = document.getElementsByName("ejecucion");
			
			var res;
			var lugar_revision;	
			for (var i = 0; i <= indoor.length; i++) {
					//console.log(indoor);
				 if(indoor[i].checked){
				 res = indoor[i].value;	
				 	
				 	if(res == "0"){

				 		lugar_revision = 'Laboratorio Dielectrico';

				 	}else{
				 		lugar_revision = 'Instalacion Externa';
				 		var dire_rev    = $("#direrev").val();
				 	}

                	break;
				 }


			}


				$.ajax({
					
					url: '../backend/Source/Ensayo_Equipo.php',
					type: 'GET',
					contentType : "application/json",
					dataType : "json",
					data : {"method" : 'addennsayo', "fecha" : fechax, "cliente" : cliente, "lugare" : lugar_revision, "direrev" : dire_rev, "capacidad" : 'S', 'ensayoindoor' : res},
					success: function(json)
					{
						
						alert(json);

					}
				});
			
			

		});

	
	$("select#listCliente").change(function(){

	var value = $("select#listCliente").val();

	if(value != 0){

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

}

});

	$("input[type='radio']").change(function(){
		
		if($( this ).val() === "1" ) {
			
			$("#direrev").prop("disabled", false);

		}else{
			$("#direrev").prop("disabled", true);

			
		}

	});

	$("#adddetalleensayo").click(function(){

    	var result = getTds();
    	var cliente_id     = $("select#listCliente").val();

    	
    		$.ajax({
    			
    			url: '../backend/Source/Ensayo_Equipo.php',
    			type: 'GET',
    			contentType : "application/json",
    			dataType : "json",
    			data : {"method" : 'regDetalleEnsayo',"datos" : result, "cliente" : cliente_id, "revision" : $("#idrevision").val() },
    			success: function(data)
    			{
    				console.log(data);
    			}
    		});
    
    	
		localStorage.clear();
   		

});

	// GET LAST ID_REVISION BY USUARIO

	 
	 	$.ajax({
	 		
	 		url: '../backend/Source/Ensayo_Equipo.php',
	 		type: 'GET',
	 		contentType : "application/json",
	 		dataType : "json",
	 		data : {'method' : 'getLastIDRevisionByUsuario'},
	 		success: function(data)
	 		{
	 			arr = jQuery.parseJSON(data);
	 			console.log(arr);
	 			$("#idrevision").val(arr[0].id_revision_ensayo);
	 		}
	 	});

	 	
	


	$("select#tipoequipo").change(function(){

		var cliente_id     = $("select#listCliente").val();
		var este_equipo    = $(this).val();
		var session_id_rev = $("#idrevision").val();

		console.log(cliente_id);
		console.log(este_equipo);
		console.log(session_id_rev);

			$.ajax({
				
				url: '../backend/Source/Ensayo_Equipo.php',
				type: 'GET',
				contentType : "application/json",
				dataType : "json",
				data : {"method" : 'getInfoRevisio_Equipo', "cliente" : cliente_id, 'revisionensayo' : session_id_rev, 'equipo' : este_equipo},
				success: function(json)
				{

					var arr = jQuery.parseJSON(json);
					console.log(arr);									
					var html = '<table class="table table-striped" border="0">';
					var i = 0;
					$.each(arr, function(key, value){

						console.log(arr);
						html += '<td width="10%" >' +  arr[key].descripcion + '</td>' + '<td width="10%" >' +  arr[key].id_tipo_equipo + '</td>' + '<td width="10%" >' + arr[key].cantidad + '</td>'  +  '<td width="10%" >' + arr[key].fk_cliente_in + '</td>' + '</td>' ;
						html += '</tr>';

						

					});
					
					html += '</table>';
					$('#act_table').html(html);
					

				}
			});
		

		

	});

	function getTds(){

		var dupla = "";
    	var tds = $("#mytable").find("tbody>tr>td");

   		for (var i = 1; i < tds.length; i++) {
   			dupla += tds[i].textContent + "-";

   			
   		}

   		return dupla;

	}


});



