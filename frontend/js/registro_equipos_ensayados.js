
var number_cotic;

$(document).ready(function(){

	console.log("DOM READY!!");

	$("#form").submit(function(event){

		event.preventDefault();




	});

	$(document).on("click", "#myclass3", function () {

      var data = $(this).data('id');
      $("#ncotic").val(data);

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
						

						html += '<tr> <td width="10%" scope="row" data-toggle="modal" id="myclass3" data-id="'+arr[key].num_cotizacion+'" data-target="#myModal" >' +  idcoti + '</td>' ;
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
						

						html += '<tr> <td width="10%" scope="row" data-toggle="modal" id="myclass3" data-id="'+number_cotic+'" data-target="#myModal" >' +  arr[key].id_cotizacion + '</td>' ;
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

	 $("#myModal #genpdfproteccion_guantes").click(function(){

	 	var cotic = $("#form #ncotic").val();

	 	console.log("aqui bacano :" + cotic);

  var win = window.open('http://35.154.118.56:8080/LabDielectrico/webresources/inspeccion/imprimirEnsayoGuante?cotic=COTIC-'+cotic, '_blank');
  win.focus();


  });

      $("#myModal #genpdfproteccion_mantas").click(function(){

      	var cotic = $("#form #ncotic").val();

  var win = window.open('http://35.154.118.56:8080/LabDielectrico/webresources/inspeccion/imprimirEnsayoMantas?cotic=COTIC-'+cotic, '_blank');
  win.focus();


  });

      $("#myModal #genpdfproteccion_calzado").click(function(){

      	var cotic = $("#form #ncotic").val();

  var win = window.open('http://35.154.118.56:8080/LabDielectrico/webresources/inspeccion/imprimirEnsayoCalzado?cotic=COTIC-'+cotic, '_blank');
  win.focus();


  });

       $("#myModal #genpdfproteccion_puestatierra").click(function(){

      	var cotic = $("#form #ncotic").val();

  var win = window.open('http://35.154.118.56:8080/LabDielectrico/webresources/inspeccion/imprimirEnsayoPuestaTierra?cotic=COTIC-'+cotic, '_blank');
  win.focus();


  });



       $("#myModal #genpdfproteccion_linear").click(function(){

      	var cotic = $("#form #ncotic").val();

  var win = window.open('http://35.154.118.56:8080/LabDielectrico/webresources/inspeccion/imprimirEnsayoGuante?cotic=COTIC-'+cotic, '_blank');
  win.focus();


  });



       $("#myModal #genpdfproteccion_elevacion").click(function(){

      	var cotic = $("#form #ncotic").val();

  var win = window.open('http://35.154.118.56:8080/LabDielectrico/webresources/inspeccion/imprimirEnsayoGuante?cotic=COTIC-'+cotic, '_blank');
  win.focus();


  });



     


	});


function imprimir_report(number){


 var win = window.open('http://localhost:8080/LabDielectrico/webresources/inspeccion/imprimirEnsayoGuante?serial='+number, '_blank');
 win.focus();


}


