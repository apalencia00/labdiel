
$(document).ready(function(){
console.log("DOM READY!!");

$("#form").submit(function(event){

	event.preventDefault();




});

$.ajax({
		
		url: '../backend/Source/Oferta_Servicio.php',
		type: 'GET',
		contentType : "application/json",
		dataType : "json",
		data : {"method" : 'getnumbercotic'},

		success: function(json)
		{

			var obj = jQuery.parseJSON(json);
			console.log(obj[0].num_cotizacion);
			localStorage.setItem("ncotic",obj[0].num_cotizacion);

		}
	});

 $(document).on("click", "#myclass", function () {
      
     var codigo = $(this).data('id');
     $("#cod_equipo").val( codigo );
     $("#tipo_equipo").val( "GUANTES DIELECTRICOS" );
     $("#cantidad").val("1");




     
});

    $(document).on("click", "#aceptar", function(){
    		var html = '<table class="table table-striped" border="0">';
    		html += '<td width="10%" >' +  3 + '</td>' + '<td width="10%" >' +  1 + '</td>'  ;
			html += '</tr>';

			html += '</table>';
				$('#act_table2').html(html); 

    });

var session_id_coti = localStorage.getItem("ncotic");

		if(!session_id_coti){
			localStorage.setItem("ncotic" , session_id_coti);
			
		}

$.ajax({



url : "../backend/Source/Equipos_aprobados.php",
type : "GET",
dataType : "json",
contentType : "application/json",
data : {"method" : 'getEquiposCotizados', 'cotizacion' :  session_id_coti },

success : function(json){

var arr = jQuery.parseJSON(json);
		 
		 console.log(arr[0].fk_cod_tipo_equipo);

				 					
				var html = '<table class="table table-striped" border="0">';
				var i = 0;
				$.each(arr, function(key, value){

					console.log(arr[key]);
					html += '<td width="10%" data-toggle="modal" id="myclass" data-id="'+arr[key].fk_cod_tipo_equipo+'" data-target="#myModal"  scope="row" >' +  arr[key].fk_cod_tipo_equipo + '</td>' + '<td width="10%" >' +  arr[key].cantidad + '</td>'  ;
					html += '</tr>';

				});

				html += '</table>';
				$('#act_table').html(html); 	


}

});

localStorage.clear();

$("#generar").click(function(){


	waitingDialog.show('Generando Codigos.. Por favor espere');setTimeout(function () {waitingDialog.hide();}, 5000)

});

});



