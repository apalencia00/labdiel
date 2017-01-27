
$(document).ready(function(){

	console.log("DOM READY!!");

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

			try{

				var $select = $("#listClientetierra");

				var obj = jQuery.parseJSON(json);
		 //console.log(obj);

		 for (var i = 0 ;obj.length - 1; i++) {

		 	$select.append('<option value=' + obj[i]['id_cliente'] + '>' + obj[i]['nombre'] + '</option>'); 	

		 }

		}catch(e){}



	}

});

	$("select#listClientetierra").change(function(){

		$.ajax({



			url: '../backend/Source/Equipos_aprobados.php',
			type: 'GET',
			contentType : "application/json",
			dataType : "json",
			data : {"method" : 'getCotizacionCliente', "cliente" : $("#listClientetierra").val()},
			success: function(json)
			{

				try{

					var arr = jQuery.parseJSON(json);

					var html = '<table class="table table-striped" border="0">';

					$.each(arr, function(key, value){

						//console.log(arr[0].num_cotizacion);
						var idcoti = arr[key].id_cotizacion;
						html += '<tr> <td scope="row"   id="myclass3"  data-id="'+arr[key].num_cotizacion+'"  width="10%"  >' +  idcoti + '</td>' ;
						html += '<td width="10%" >' +  arr[key].num_cotizacion + '</td>' ;
						html += '<td width="10%" >' +  arr[key].fecha_registro + '</td>' ;
						html += '<td width="10%" >' +  arr[key].nombre_cliente + '</td>' ;
						html += '</tr>';

					});		

					html += '</table>';
					$('#act_table_cotictierra').html(html); 	

				}catch(e){}
			}
		});

	});



	$(document).on("click", "#myclass3", function () {

		var codigo = $(this).data('id');

		console.log(codigo);

		$("#cotic").val( codigo );
		//$("#cotizacion").val( codigo );
		
		$.ajax({

			url : "../backend/Source/Registro_inspeccion.php",
			type : "GET",
			dataType : "json",
			contentType : "application/json",
			data : {"method" : 'getserialesEquiposPuestaTierra', 'cotizacion' :  codigo },

			success : function(json){

				try{

					var arr = jQuery.parseJSON(json);

					console.log(arr);

					var html = '<table class="table table-striped" border="0">';
					var i = 0;
					$.each(arr, function(key, value){

					//console.log("AQUI ESTOY!!"+arr);
					html += ' <tr> <td width="10%" id="bacano"  data-target="#myModal" data-toggle="modal" data-id="'+arr[key].COD_SERIAL+'" >' +  arr[key].COD_SERIAL + '</td>' +'<td width="10%"    >' +  arr[key].DESCRIPCION + '</td>' + '<td width="10%" >' +  arr[key].FK_COD_TIPO_EQUIPO + '</td>'  ;
					html += '</tr>';

				});

					html += '</table>';
					$('#act_table_serialtierra').html(html);   

				}catch(e){}


			}

		});

	});

	 $(document).on("click", "#bacano", function (e) {
     var data = $(this).data('id');
     $("#myModal #num_serialequipo").val(data);
     $("#myModal #num_serial").text(data);
     
     
}); 






});








