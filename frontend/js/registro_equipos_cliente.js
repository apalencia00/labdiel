
$(document).ready(function(){
	console.log("DOM READY!!");
	$("#form").submit(function(event){

		event.preventDefault();

		var cliente = $("select#listCliente").val();
		var tipo_equipo = $("select#tipo_equipo").val();
		var producto = $("input#cod_producto").val();
		var nombre = $("input#nomb_equipo").val();
		var marca = $("input#marca").val();

		$.ajax({

			url : "../backend/Source/Cliente.php",
			type : "GET",
			contentType : "application/json",
			dataType : "json",
			error : function() {alert("The connection to the server is not available, please try again later!");},
			data : {"method" : 'addEquipo', "listCliente" : cliente, "tipo_equipo" : tipo_equipo, "cod_producto" : producto, "nomb_equipo" : nombre, "marca" : marca},

			success : function(json){

				
				var arr = $.parseJSON(json);
				//console.log(arr);
					var html = '<table class="table table-striped" border="0">';

					$.each(arr, function(key, value){
						
						html += '<tr>  <td width="10%" >' + arr[key].cod_equipo + '</td>' + '<td width="10%" >' +  arr[key].descripcion + '</td>' + '<td width="10%" >' +  arr[key].fk_id_cliente + '</td>' ;
						html += '</tr>';

					});

					html += '</table>';
					$('#act_table').html(html);


			}
		});


	});


	$.ajax({

		url : "../backend/Source/Cliente.php",
		type : "GET",
		contentType : "application/json",
		dataType : "json",
		data : {"method" : 'getListCliente'},

		beforeSend : function(){


		},

		success : function(json){

			var $select = $('#listCliente');

			var obj = jQuery.parseJSON( json);
				console.log(obj);

		if(obj != null){

			for (var i = 0 ;obj.length - 1; i++) {
				
				$select.append('<option value=' + obj[i]['id_cliente'] + '>' + obj[i]['nombre'] + '</option>'); 	

			}

		}

		}
	});


	$.ajax({

		url : "../backend/Source/Cliente.php",
		type : "GET",
		contentType : "application/json",
		dataType : "json",
		data : {"method" : 'getTipoEquipo'},

		beforeSend : function(){


		},

		success : function(json){

			var $select = $('#tipo_equipo');

			var obj = jQuery.parseJSON( json);
				console.log(obj);

		if(obj != null){

			for (var i = 0 ;obj.length - 1; i++) {
				
				$select.append('<option value=' + obj[i]['tipo_equipo'] + '>' + obj[i]['descripcion'] + '</option>'); 	

			}

		}

		}
	});


});