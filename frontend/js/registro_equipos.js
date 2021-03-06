
$(document).ready(function(){
	console.log("DOM READY!!");
	$("#form").submit(function(event){

		event.preventDefault();

		var desc = $("#desc").val();
		var claseeq    = $("#claseeq").val();
		var unidad     = $("#unidad").val();
		var proc_eq    = $("#procedimiento").val();


		$.ajax({
			
			url: '../backend/Source/Registro_equipos.php',
			type: 'GET',
			contentType : "application/json",
			dataType : "json",
			data : {"method" : 'addParam' , "desc" : desc, "clase" : claseeq, "unidad" : unidad, "proc_eq" : proc_eq }
			,
			beforeSend: function(){

				waitingDialog.show('Cargando.. Por favor espere');setTimeout(function () {waitingDialog.hide();}, 2000);

				//submit.prop('disabled', true);
				
			},
			success: function(json)
			{
				
				var obj = jQuery.parseJSON(json);
				console.log(obj);

				if(obj.success){ 

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

				}else{

					BootstrapDialog.show({
						title : 'Error',
						type : BootstrapDialog.TYPE_DANGER,
						message: obj.mensaje,
						buttons: [{
							label: 'Ok',
							action: function(dialogItself){
								dialogItself.close();
							}
						} ]
					});  

				}
   // ......   

},
error : function(event){

	BootstrapDialog.show({
		title : 'Error en Peticion',
		type : BootstrapDialog.TYPE_DANGER,
		message: 'Error no se pudo realizar la solicitud',
		buttons: [{
			label: 'Ok',
			action: function(dialogItself){
				dialogItself.close();
			}
		} ]
	}); 

}
});
		
		


	});

	$("#submit_equipo").click(function(){

		var cod_equipo		  = $("#cod_equipo").val();
		var serial_interno    = $("#serial_interno").val();
		var marca     		  = $("#marca").val();
		var tipo    	      = $("#tipo").val();

		 //

		 var pathern = new RegExp("^([A-Z])\\w*([A-Z]){0}\\w-([0-9]){0}\\w([A-B]){0,1}$");
		 console.log(pathern);
		 if(pathern.test(cod_equipo)){ 

		$.ajax({
			
			url: '../backend/Source/Registro_equipos.php',
			type: 'GET',
			contentType : "application/json",
			dataType : "json",
			data : {"method" : 'add' , "cod_equipo" : cod_equipo, "serial_interno" : serial_interno, "marca" : marca, "tipo" : tipo },
			success: function(json)
			{

				console.log(json);
				var obj = jQuery.parseJSON(json);
				console.log(obj);
				if(obj.success){ 

					BootstrapDialog.show({
						title : 'Operacion Exitosa',
						type : BootstrapDialog.TYPE_SUCCESS,
						message: obj.mensaje,
						buttons: [{
							label: 'Aceptar',
							action: function(dialogItself){
								dialogItself.close();
								window.location.href=window.location.href; 
							}
						} ]
					});    

				}else{

					BootstrapDialog.show({
						title : 'Error',
						type : BootstrapDialog.TYPE_INFO,
						message: obj.mensaje,
						buttons: [{
							label: 'Ok',
							action: function(dialogItself){
								dialogItself.close();
							}
						} ]
					});  

				}

			},
			error : function(event){

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

			}
		});


	    }else{
	    	console.log("Error este codigo no es valido");
	    	$("#classmadre").addClass("class:form-group has-error has-feedback");
	    	
	    }

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
		data : {"method" : 'gettipo'},
		success: function(json)
		{
			
			try{ 
			var selecttipo = $('select#tipo'); 

			var obj = jQuery.parseJSON(json);
			
			console.log(obj);

			for (var i = 0 ;obj.length; i++) {
				
				selecttipo.append("<option value=" + obj[i]['tipo_equipo'] + ">" + obj[i]['descripcion'] + "</option>"); 	
				console.log(obj[i]['tipo_equipo']);
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

	$("#btn_reg").click(function(){

		var tipo_equipo = $("#tipo").val();
		var precio      = $("#precio").val();

		$.ajax({
			
			url: '../backend/Source/Registro_equipos.php',
			type: 'GET',
			contentType : "application/json",
			dataType : "json",
			data : {"method" : 'addPrecio' , "tipoe" : tipo_equipo, "precio" : precio }
			,
			beforeSend: function(){

				waitingDialog.show('Cargando.. Por favor espere');setTimeout(function () {waitingDialog.hide();}, 2000);

				//submit.prop('disabled', true);
				
			},
			success: function(json)
			{
				
				var obj = jQuery.parseJSON(json);
				console.log(obj);

				if(obj.success){ 

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

				}else{

					BootstrapDialog.show({
						title : 'Error',
						type : BootstrapDialog.TYPE_INFO,
						message: obj.mensaje,
						buttons: [{
							label: 'Ok',
							action: function(dialogItself){
								dialogItself.close();
							}
						} ]
					});  

				}
   // ......   

},
error : function(event){

	BootstrapDialog.show({
		title : 'Error en Peticion',
		type : BootstrapDialog.TYPE_DANGER,
		message: 'Error no se pudo realizar la solicitud',
		buttons: [{
			label: 'Ok',
			action: function(dialogItself){
				dialogItself.close();
			}
		} ]
	}); 

}
});





	});



});