
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

				var $select = $("#listCliente");

				var obj = jQuery.parseJSON(json);
		 //console.log(obj);

		 for (var i = 0 ;obj.length - 1; i++) {

		 	$select.append('<option value=' + obj[i]['id_cliente'] + '>' + obj[i]['nombre'] + '</option>'); 	

		 }

		}catch(e){}



	}

});

	$("select#listCliente").change(function(){

		$.ajax({



			url: '../backend/Source/Equipos_aprobados.php',
			type: 'GET',
			contentType : "application/json",
			dataType : "json",
			data : {"method" : 'getCotizacionCliente', "cliente" : $("#listCliente").val()},
			success: function(json)
			{

				try{

					var arr = jQuery.parseJSON(json);

					var html = '<table class="table table-striped" border="0">';

					$.each(arr, function(key, value){

						//console.log(arr[0].num_cotizacion);
						var idcoti = arr[key].id_cotizacion;
						html += '<tr> <td onclick="loadEquiposCotizados('+idcoti+')"  width="10%"  >' +  idcoti + '</td>' ;
						html += '<td width="10%" >' +  arr[key].num_cotizacion + '</td>' ;
						html += '<td width="10%" >' +  arr[key].fecha_registro + '</td>' ;
						html += '<td width="10%" >' +  arr[key].nombre_cliente + '</td>' ;
						html += '</tr>';

					});

					html += '</table>';
					$('#act_table_cotic').html(html); 	

				}catch(e){}
			}
		});

	});



	$(document).on("click", "#myclass", function () {

		var codigo = $(this).data('id');
		$("#cotizacion").val( codigo );
		$("#tipo_equipo").val( "GUANTES DIELECTRICOS" );
		$("#cantidad").val("1");





	});

	$(document).on("click", "#aceptarTodo", function(){

		var codigoe =	$("#myModal #cod_equipo").val();
		var cantidad =  $("#myModal #cantidad").val();
		localStorage.setItem("cantie",cantidad);
		var cotic = localStorage.getItem("coti");
		

		$.ajax({

			url: '../backend/Source/Equipos_aprobados.php',
			type: 'GET',
			contentType : "application/json",
			dataType : "json",
			data : {"method" : 'aprobarCantidadEquipo', "tipoe" : codigoe, "cantidad" : cantidad, "cotinum" : cotic},
			success: function(json)
			{
				var arr = jQuery.parseJSON(json);

				var html = '<table class="table table-striped" border="0">';
				var i = 0;
				$.each(arr, function(key, value){

					html += '<td width="10%" scope="row" data-toggle="modal" id="myclass" data-id="'+arr[key].fk_cotizacion+'" data-target="#myModal2" >' +  arr[key].fk_cod_tipo_equipo + '</td>' + '<td width="10%" >' +  arr[key].descripcion_equipo + '</td>' + '<td width="10%" >' + arr[key].cantidad + '</td>'  ;
					html += '</tr>';

				});
				
				html += '</table>';
				$('#act_table').html(html);
				localStorage.clear();

			}
		});


	});



});

$("#generarTodo").click(function(){

        var codigoe  =  $("#myModal2 #cod_equipo").val();
		var cantidad =  $("#myModal2 #cantidad").val();
		localStorage.setItem("cantie",cantidad);
		var cotic = localStorage.getItem("coti");
		


});


function loadEquiposCotizados(val){

	localStorage.setItem("coti", val);

	$.ajax({

		url : "../backend/Source/Equipos_aprobados.php",
		type : "GET",
		dataType : "json",
		contentType : "application/json",
		data : {"method" : 'getEquiposCotizados', 'cotizacion' :  val },

		success : function(json){

			try{

				var arr = jQuery.parseJSON(json);

//a				console.log(arr);

				var html = '<table class="table table-striped" border="0">';
				var i = 0;
				$.each(arr, function(key, value){

					//console.log("AQUI ESTOY!!"+arr);
					html += ' <tr> <td width="10%" scope="row" data-toggle="modal" id="myclass" onclick="setDatosAprobados()"  >' +  arr[key].fk_cod_tipo_equipo + '</td>' + '<td width="10%" >' +  arr[key].descripcion_equipo + '</td>' + '<td width="10%" >' +  arr[key].cantidad+ '</td>'  ;
					html += '</tr>';

				});

				html += '</table>';
				$('#act_table').html(html);   

			}catch(e){}


		}

	});

}

function setDatosAprobados(){

	ventana = window.open("");
	ventana.focus();


}









