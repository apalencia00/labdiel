
$( document ).ready(function() {
	console.log("DOM READY!");
	$( "#form" ).submit(function( event ) {

		var formEl = $(this);
		var submitButton = $('input[type=submit]');

		var tipo = $("select#tipodoc").val();
		var doc  = $("input#docu").val();
		var nomb  = $("input#nomb").val();
		var ape  = $("input#ape").val();
		var tele  = $("input#tele").val();
		var ciudad = $("select#ciudad").val();
		var contacto  = $("input#contacto").val();
		var email  = $("input#email").val();
		var direccion  = $("input#direccion").val();
		//console.log(tipo);

		event.preventDefault();

		$.ajax({
			url: "../backend/Source/Cliente.php",
			type : "GET",
			contentType: "application/json",
			dataType: 'json',
			data : {"method" : 'add', "tipo" : tipo, "docu" : doc, 
			"nombre" : nomb, "apellido" : ape, "tele" : tele, "ciudad" : ciudad, "contacto" : contacto,
			"email" : email, "direccion" : direccion
			},
			
			beforeSend: function(){

				submitButton.prop('disabled', true);
     			
 			},
			 success: function(json){

			 	alert(json);
   // ......
			}



	});

		

	});

	$.ajax({

		url : "../backend/Source/Cliente.php",
		type : "GET",
		contentType : "application/json",
		dataType : "json",
		data : {"method" : 'getListTipoIde' },
		beforeSend : function(json){

		},

		success : function(json){

try{
		var $select = $('#tipodoc'); 

		var obj = jQuery.parseJSON( json);
		 
		 console.log(obj);

		if(obj != null){

			for (var i = 0 ;obj.length - 1; i++) {
				
				$select.append('<option value=' + obj[i]['tipo_id'] + '>' + obj[i]['descripcion'] + '</option>'); 	

			}

		}

		}catch(e){
    if(e){
    // If fails, Do something else
    }
}

		}

		});

	$.ajax({

		url : "../backend/Source/Cliente.php",
		type : "GET",
		contentType : "application/json",
		dataType : "json",
		data : {"method" : 'getCiudad' },
		beforeSend : function(json){

		},

		success : function(json){

try{

var $select = $('#ciudad'); 

var obj = jQuery.parseJSON( json);
//	 obj);

for (var i = 0 ;obj.length - 1; i++) {

	$select.append('<option value=' + obj[i]['divipo'] + '>' + obj[i]['descripcion'] + '</option>'); 	

}

}catch(e){
    if(e){
    // If fails, Do something else
    }
}

}

});

});