
$(document).ready(function(){
	console.log("DOM READY!!");
	$("#form").submit(function(event){

		event.preventDefault();

		var cod_equipo = $("#cod_equipo").val();
		var nom_equipo = $("#nom_equipo").val();
		var marca      = $("#marca").val();
		var claseeq    = $("#claseeq").val();
		var unidad     = $("#unidad").val();
		var proc_eq    = $("#procedimiento").val();


			$.ajax({
		
				url: '../backend/Source/Registro_equipos.php',
				type: 'GET',
				contentType : "application/json",
				dataType : "json",
				data : {"method" : 'add' , "cod_equipo" : cod_equipo, "nomb" : nom_equipo, "marca" : marca, "clase" : claseeq, "unidad" : unidad, "proc_eq" : proc_eq },
				success: function(json)
				{
					

					console.log(json);

				}
			});
		
		


	});


	$.ajax({

		url: '../backend/Source/Registro_equipos.php',
		type: 'GET',
		contentType : "application/json",
		dataType : "json",
		data : {"method" : 'getclase'},
		success: function(json)
		{
			
			try{
		var $select = $('#claseeq'); 

		var obj = jQuery.parseJSON( json);
		 
		 console.log(obj);

		if(obj != null){

			for (var i = 0 ;obj.length - 1; i++) {
				
				$select.append('<option value=' + obj[i]['id_clase'] + '>' + obj[i]['descripcion'] + '</option>'); 	

			}

		}

		}catch(e){}

		}
	});


	$.ajax({

		url: '../backend/Source/Registro_equipos.php',
		type: 'GET',
		contentType : "application/json",
		dataType : "json",
		data : {"method" : 'getProcedimiento'},
		success: function(json)
		{
				
				try{
		var $select = $('#procedimiento'); 

		var obj = jQuery.parseJSON(json);
		 
		 console.log(obj);

		if(obj != null){

			for (var i = 0 ;obj.length - 1; i++) {
				
				$select.append('<option value=' + obj[i]['id_procedimiento'] + '>' + obj[i]['documento'] + '</option>'); 	

			}

		}

		}catch(e){}


		}
	});



});