// Eliminación
$(document).ready(function(){
	$(document).on('click', '.eliminar', function(){
		var Nombre=$(this).val();

		$('#eliminar').modal('show');
		document.querySelector('#name').innerText = Nombre;
		//$('#name').val(Nombre);
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