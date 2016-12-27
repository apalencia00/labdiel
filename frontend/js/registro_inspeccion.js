
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
						html += '<tr> <td scope="row" data-toggle="modal" id="myclass3" data-id="'+idcoti+'" data-target="#myModal" width="10%"  >' +  idcoti + '</td>' ;
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
			data : {"method" : 'getserialesEquipos', 'cotizacion' :  codigo },

			success : function(json){

				try{

					var arr = jQuery.parseJSON(json);

					console.log(arr);

					var html = '<table class="table table-striped" border="0">';
					var i = 0;
					$.each(arr, function(key, value){

					//console.log("AQUI ESTOY!!"+arr);
					html += ' <tr> <td width="10%"  onclick="setSerial('+arr[key].ID_DET_COTI_SERIAL_EQUIPO+')"  >' +  arr[key].ID_DET_COTI_SERIAL_EQUIPO + '</td>' +'<td width="10%"    >' +  arr[key].DESCRIPCION + '</td>' + '<td width="10%" >' +  arr[key].FK_COD_TIPO_EQUIPO + '</td>' + '<td width="10%" >' +  arr[key].COD_SERIAL+ '</td>'  ;
					html += '</tr>';

				});

					html += '</table>';
					$('#act_table_serial').html(html);   

				}catch(e){}


			}

		});

	});


$("#btn_aceptar").click(function()
{
	
alert("WUAPEA!! WILLy");
	var serial_eq = localStorage.getItem("serie");

	var clase_eq     		= $("#clase").val();
	var obs_clase    		= $("#obs").val();
	var tension_eq   		= $("#tension").val();
	var obs_tension  		= $("#obs2").val();
	var tipo_eq      		= $("#obs3").val();
	var estilo_eq    		= $("#estilo").val();
	var obs_estilo   		= $("#obs4").val();
	var color_eq     		= $("#color").val();
	var obs_color    		= $("#obs5").val();
	var talla_eq     		= $("#talla").val();
	var obs_talla    		= $("#obs6").val();
	var longitud_eq  		= $("#longitud").val();
	var obs_longitud 		= $("#obs7").val();
	var perforacion_eq 		= $("#perforacion").val();
	var obs_perforacion		= $("#obs8").val();
	var abrasion_eq  		= $("#abrasion").val();
	var obs_abrasion 		= $("#obs9").val();
	var degradacion_eq 		= $("#degradacion").val();
	var obs_degradacion 	= $("#obs10").val();
	var ozono_equipo  		= $("#ozono").val();
	var obs_ozono    		= $("#obs11").val();
	var cristal_eq   		= $("#cristal").val();
	var obs_cristal  		= $("#obs_cristal").val();
	var quemadura_eq 		= $("#quemadura").val();
	var obs_quemadura 		= $("#obs_quemadura").val();
	var contaminacion_eq 	= $("#contaminacion").val();
	var obs_contaminacion 	= $("#obs_contamiacion").val();
	var inflado_eq   		= $("#inflado").val();
	var obs_inflado  		= $("#obs_inflado").val();
	var inspeccion_eq 		= $("#inspeccion").val();
	var obs_inspeccion 		= $("#obs_inspeccion").val();
	var cotic 				= $("#cotic").val();

	/*console.log( "La clas : "       +clase_eq);
	console.log( "La desc clase : " +obs_clase);
	console.log( "La tension : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);

	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
	console.log( "La clas : " clase_eq);
*/
	$.ajax({
		
		url: '../backend/Source/Registro_inspeccion.php',
		type: 'GET',
		contentType : "application/json",
		dataType : "json",
		data : {"method" : 'add', 'serial' : serial_eq, "cotizacion" : cotic,
		'clase' : clase_eq, 'obsclase' : obs_clase, 
		'tension' : tension_eq, 'obs_tension' : obs_tension,  
		'tipoeq' : tipo_eq, 'obestilo' : obs_estilo,
		'coloreq' : color_eq, 'obscolor' : obs_color,
		'tallaeq' : talla_eq, 'obstalla' : obs_talla,
		'longitudeq' : longitud_eq, 'obslogintud' : obs_longitud,
		'perforacioneq' : perforacion_eq, 'obsperforacion' : obs_perforacion,
		'abrasioneq' : abrasion_eq, 'obs_abrasion' : obs_abrasion,
		'degradacioneq' : degradacion_eq, 'obsdegradacion' : obs_degradacion,
		'ozonoeq' : ozono_equipo, 'obsozono' : obs_ozono,
		'cristaleq' : cristal_eq, 'obscristal' : obs_cristal,
		'quemaduraeq' : quemadura_eq, 'obsquemadura' : obs_quemadura,
		'contaminacioneq' : contaminacion_eq, 'obscontaminacion' : obs_contamiacion,
		'infladoeq' : inflado_eq, 'obsinflado' : obs_inflado,
		'inspeccioneq' : inspeccion_eq, 'obsinspeccion' : obs_inspeccion  


	}



	,

	success: function(json)
	{



	}
});



});



});

function setSerial(serial){

	localStorage.setItem("serie", serial);

	console.log(serial);

}







