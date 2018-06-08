// Eliminación de 
$(document).ready(function(){
	$(document).on('click', '.DetalleHojaResponsabilidad', function(){
		var id=$(this).val();
	
		$('#frmVerDetalle').modal('show');
		$('#idHojaResponsabilidad').val(Usuario);
	});
});
