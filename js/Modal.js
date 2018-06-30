// Eliminación de 
$(document).ready(function(){
	$(document).on('click', '.DetalleHojaResponsabilidad', function(){
		var id=$(this).val();
	
		$('#frmVerDetalle').modal('show');
		$('#idHojaResponsabilidad').val(id);
	});
});

// Eliminación de usuario
 $(document).ready(function(){
	$(document).on('click', '.EliminarUsuario', function(){
 		var id=$(this).val();
		var Nombres=$('#NombreUsuario'+id).text();
		var Apellidos=$('#ApellidoUsuario'+id).text();
		var Usuario=$('#idPersonaEliminar'+id).text();
 	
		$('#frmEliminar').modal('show');
		document.querySelector('#NombresApellidos').innerText = Nombres + " " + Apellidos;
		$('#idAEliminar').val(Usuario);
 	});
 });

// Edición usuario
$(document).ready(function(){
	$(document).on('click', '.EditarUsuario', function(){
		var id=$(this).val();
		var PersonaEliminar=$('#idPersonaEliminar'+id).text();
		var NombreUsuario=$('#NombreUsuario'+id).text();
		var ApellidoUsuario=$('#ApellidoUsuario'+id).text();
		var DireccionUsuario=$('#DireccionUsuario'+id).text();
		var DPIUsuario=$('#DPIUsuario'+id).text();
		var TelefonoUsuario=$('#TelefonoUsuario'+id).text();
		var FechaNacUsuario=$('#FechaNacUsuario'+id).text();
		var CorreoUsuario=$('#CorreoUsuario'+id).text();
		var PrivilegioUsuario=$('#PrivilegioUsuario'+id).text();
	
		$('#frmEditar').modal('show');
		$('#idEditar').val(PersonaEliminar);
		$('#NombreEditar').val(NombreUsuario);
		$('#ApellidoEditar').val(ApellidoUsuario);
		$('#DireccionEditar').val(DireccionUsuario);
		$('#DPIEditar').val(DPIUsuario);
		$('#TelefonoEditar').val(TelefonoUsuario);
		$('#FechaNacEditar').val(FechaNacUsuario);
		$('#CorreoEditar').val(CorreoUsuario);
		$('#PrivilegioEditar').val(PrivilegioUsuario);
	});
});

// Eliminación de producto
 $(document).ready(function(){
	$(document).on('click', '.DeshabilitarProducto', function(){
 		var id=$(this).val();
		var Nombre=$('#NombreProducto'+id).text();
		var Producto=$('#idProducto'+id).text();
 	
		$('#ModalDeshabilitar').modal('show');
		document.querySelector('#NombreProductoDeshabilitar').innerText = Nombre;
		$('#idProductoDeshabilitar').val(id);
 	});
 });
 
 // Eliminación de producto
 $(document).ready(function(){
	$(document).on('click', '.HabilitarProducto', function(){
 		var id=$(this).val();
		var Nombre=$('#NombreProducto'+id).text();
		var Producto=$('#idProducto'+id).text();
 	
		$('#ModalHabilitar').modal('show');
		document.querySelector('#NombreProductoHabilitar').innerText = Nombre;
		$('#idProductoHabilitar').val(id);
 	});
 });
 
 // Edición usuario
$(document).ready(function(){
	$(document).on('click', '.EditarProducto', function(){
		var id=$(this).val();
		var NombreProducto=$('#NombreProducto'+id).text();
		var idMarca=$('#idMarca'+id).text();
		var ModeloProducto=$('#ModeloProducto'+id).text();
		var NombreLineaProducto=$('#NombreLineaProducto'+id).text();
		var NombreUnidadMedida=$('#NombreUnidadMedida'+id).text();
		var ColorProducto=$('#ColorProducto'+id).text();
		var PrecioProducto=$('#PrecioProducto'+id).text();
	
		$('#ModalEditarProducto').modal('show');
		$('#idEditar').val(id);
		$('#NombreProducto').val(NombreProducto);
		//$('#Marca').val(idMarca);
		$('#ModeloProducto').val(ModeloProducto);
		//$('#LineaProducto').val(NombreLineaProducto);
		//$('#UnidadMedida').val(NombreUnidadMedida);
		$('#ColorProducto').val(ColorProducto);
		$('#PrecioProducto').val(PrecioProducto);
	});
});

$(document).ready(function () {
	(function ($) {
		$('#filtrar').keyup(function () {
			var rex = new RegExp($(this).val(), 'i');
			$('.buscar tr').hide();
			$('.buscar tr').filter(function () {
				return rex.test($(this).text());
			}).show();
			
		})
		
	}(jQuery));
});