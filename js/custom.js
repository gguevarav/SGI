// Eliminación
$(document).ready(function(){
	$(document).on('click', '.eliminar', function(){
		var id=$(this).val();
		var Nombres=$('#NombreUsuario'+id).text();
		var Apellidos=$('#ApellidoUsuario'+id).text();
		var Usuario=$('#idPersonaEliminar'+id).text();
	
		$('#eliminar').modal('show');
		document.querySelector('#NombresApellidos').innerText = Nombres + " " + Apellidos;
		$('#idAEliminar').val(Usuario);
	});
});

// Edición
$(document).ready(function(){
	$(document).on('click', '.editar', function(){
		var Nombre=$(this).val();

		$('#editar').modal('show');
		document.querySelector('#name').innerText = Nombre;
		//$('#name').val(Nombre);
	});
});