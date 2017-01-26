
var number_cotic;

$(document).ready(function(){

	console.log("DOM READY!!");

	$("#form").submit(function(event){

		event.preventDefault();




	});

	$(document).on("click", "#myclass3", function () {

      var data = $(this).data('id');
      $("#cod_equipo").val(data);

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
						

						html += '<tr> <td width="10%" class="myclass2" id="myclass2" data-id="'+idcoti+'" >' +  idcoti + '</td>' ;
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



	$(document).on("click", "#myclass2", function () {

		var codigo ;

			if( $("#ncotic").val() != "" ){

			codigo	= $("#ncotic").val();

			}else{
				codigo = $(this).data('id');
			}

		$("#cotizacion").val(codigo);
		localStorage.setItem("numbcotizacion", 'COTIC-' + codigo);
		
		$.ajax({

			url : "../backend/Source/Equipos_aprobados.php",
			type : "GET",
			dataType : "json",
			contentType : "application/json",
			data : {"method" : 'getEquiposCotizados', 'cotizacion' :  codigo },

			success : function(json){

				try{


					var arr = jQuery.parseJSON(json);

					console.log(arr);

					var html = '<table class="table table-striped" border="0">';
					var i = 0;
					$.each(arr, function(key, value){

					//console.log("AQUI ESTOY!!"+arr);
					html += ' <tr> <td width="10%" scope="row" data-toggle="modal" id="myclass3" data-id="'+arr[key].fk_cod_tipo_equipo+'" data-target="#myModal" width="10%"   >' +  arr[key].fk_cod_tipo_equipo + '</td>' + '<td width="10%" >' +  arr[key].descripcion_equipo + '</td>' + '<td width="10%" >' +  arr[key].cantidad+ '</td>'  ;
					html += '</tr>';

				});

					

					html += '</table>';
					$('#act_table').html(html);   

				}catch(e){}


			}

		});

	});

	$( "#ncotic" ).keypress(function( event ) {
		if ( event.which == 13 ) {
			event.preventDefault();

			number_cotic = $("#ncotic").val();
			//alert(number_cotic);
			$.ajax({

			url: '../backend/Source/Equipos_aprobados.php',
			type: 'GET',
			contentType : "application/json",
			dataType : "json",
			data : {"method" : 'getCotizacion', "numbcoti" : number_cotic},
			success: function(json)
			{

				try{

					var arr = jQuery.parseJSON(json);

					var html = '<table class="table table-striped" border="0">';

					$.each(arr, function(key, value){
						

						html += '<tr> <td width="10%" class="myclass2" id="myclass2" >' +  arr[key].id_cotizacion + '</td>' ;
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


		}

	});




		$(document).on("click", "#aceptarTodo", function(){

			var codigoe   =	$("#myModal #cod_equipo").val();
			var cantidad  = $("#myModal #cantidad").val();
			var cotic     = $("#myModal #cotizacion").val();

			$.ajax({

				url: '../backend/Source/Equipos_aprobados.php',
				type: 'GET',
				contentType : "application/json",
				dataType : "json",
				data : {"method" : 'aprobarCantidadEquipo', "tipoe" : codigoe, "cantidad" : cantidad, "cotinum" : cotic},
				success: function(json)
				{
						var obj = jQuery.parseJSON(json);
						BootstrapDialog.show({
						title : 'Operacion Exitosa',
						type : BootstrapDialog.TYPE_SUCCESS,
						message: obj.mensaje,
						buttons: [{
							label: 'Aceptar',
							action: function(dialogItself){
								dialogItself.close();
							}
						} ]
					});  

						getListaAprobados(cotic);
					

			},error : function(event){

					BootstrapDialog.show({
						title : 'Operacion Exitosa',
						type : BootstrapDialog.TYPE_DANGER,
						message: 'Error no se pudo realizar la solicitud',
						buttons: [{
							label: 'Ok',
							action: function(dialogItself){
								dialogItself.close();
							}
						} ]
					}); 

				},

				complete : function(event, xhr, settings){

					getListaAprobados(cotic);
					
				}
		});


		});

		$("#myModal #generarTodo").click(function(){

			var codigoe    =  $("#myModal #cod_equipo").val();
			var textoequipo=  $("#myModal #cod_equipo option:selected").text();
			var cantidad   =  $("#myModal #cantidad").val();
			var cotizacion =  $("#myModal #cotizacion").val();

			//alert(textoequipo);
			
			$.ajax({

				url: '../backend/Source/Equipos_aprobados.php',
				type: 'GET',
				contentType : "application/json",
				dataType : "json",
				data : {'method' : 'regdetalle_serial','cod_equipos' : codigoe, 'desc_equipo' : textoequipo, 'cant_equi' : cantidad, 'cotizacion' : cotizacion},
				success: function(data)
				{




				},
				beforeSend : function(){

					waitingDialog.show('Cargando.. Por favor espere');setTimeout(function () {waitingDialog.hide();}, 5000)

				}
			});

		});




	});

function getListaAprobados(){ 

	$.ajax({

			url: '../backend/Source/Equipos_aprobados.php',
			type: 'GET',
			contentType : "application/json",
			dataType : "json",
			data : {"method" : 'getEquiposAprobados', "cotizacion" : localStorage.getItem("numbcotizacion") },
			success: function(json)
			{
				//console.log(json);
				try{

					var arr = jQuery.parseJSON(json);

					var html = '<table class="table table-striped" border="0">';

					$.each(arr, function(key, value){
					console.log(arr);					

						html += '<tr> <td width="10%">' +  arr[key].fk_cod_tipo_equipo + '</td>' ;
						html += '<td width="10%" >' +  arr[key].descr + '</td>' ;
				
						html += '<td width="10%" >' +  arr[key].cantidad + '</td>' ;
						html += '</tr>';

					});

					html += '</table>';
					$('#act_table_aprobados').html(html); 	

				}catch(e){}
			}
		});


	 }



        //alert($(this).attr('#myModal #cod_equipo'));


/*function loadEquiposCotizados(val){

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
					html += ' <tr> <td width="10%" scope="row" data-toggle="modal" id="myclass" data-id="'+arr[key].fk_cotizacion+'" data-target="#myModal"   >' +  arr[key].fk_cod_tipo_equipo + '</td>' + '<td width="10%" >' +  arr[key].descripcion_equipo + '</td>' + '<td width="10%" >' +  arr[key].cantidad+ '</td>'  ;
					html += '</tr>';

				});

				html += '</table>';
				$('#act_table').html(html);   

			}catch(e){}


		}

	});

}
*/








