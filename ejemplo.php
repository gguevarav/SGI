<html>

<head>

<title>Crear Campo de texto</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script type="text/javascript">

 

icremento =0;

function crear(obj) {

  icremento++;

 

  field = document.getElementById('field');

 contenedor = document.createElement('div');

  contenedor.id = 'div'+icremento;

  field.appendChild(contenedor);

 

  boton = document.createElement('input');

  boton.type = 'text';

  boton.name = 'text'+'[ ]';

  contenedor.appendChild(boton);

 

 

}

function borrar(obj) {

  field = document.getElementById('field');

  field.removeChild(document.getElementById(obj));

}

</script>

</head>

<body>

<form name="form1" method="POST" action="save.php">

 

<fieldset id="field">

<input type="button" value="Crear caja de texto" onclick="crear(this)">

<input name="save" type="submit" value="Guardar" onclick="enviar(this)">

</fieldset>

</form>

</body>

</html>