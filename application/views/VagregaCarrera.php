<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$this->load->view('librerias');
	?>
	<meta charset="utf-8">
	<title>Agregar Carrera</title>
</head>
<body>
	<h1 align="center">Agregar Carrera.</h1>
	<table align="center">
		<div class="contenido" style="text-align:center;">
			<form method="post" action="fAddCarrera">
				Nombre de la Carrera: <input type="text" id="name" name="name" required>
				Identificador de la Carrera: <input type="text" id="id" name="id" required>
				<br><input type="submit" value="Agregar">
  	  		</form>
  		</div>
	</table>
</tr>
</table>
</body>
</html>
