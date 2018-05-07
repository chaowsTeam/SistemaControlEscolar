<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$this->load->view('librerias');
	?>
	<meta charset="utf-8">
	<title>Agregar Usuario</title>
	<script lenguage="javascript" type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

	<script  lenguage="javascript" type="text/javascript">
	$(document).ready(function(){
		$(".contenido").hide();
		$("#select").change(function(){
			$(".contenido").hide();
			$("#div_" + $(this).val()).show();
		});
	});
	</script>

</head>
<body>
<form method= "post" action="fCargaVadministrador">
	<h1 align="center">Agregar Usuario.</h1>
	<table align="center">
		<tr>
			<td><label for="t_respaldo">Tipo de Usuario: </label></td>
			<td style="padding:10px;">
				<select name="select" id="select" class="form-control">
					<option class="form-control"></option>
					<option value="Administrador" class="form-control">Administrador</option>
					<option value="Docente" class="form-control">Docente</option>
					<option value="Alumno" class="form-control">Alumno</option>
  		     	</select>
  		     <input type="submit" value="Regresar"> 
  	  		</td> 
 </form>

	<table align="center">
		<div id="div_Administrador" class="contenido" style="text-align:center;">
			<form method="post" action="fAgregaAdmin">
				Nombre: <input type="text" id="name" name="name" required>
				Contraseña: <input type="text" id="psw"  name="psw" required>
				Tipo: <input type="text" id="type"  name="type" readonly value="Administrador" >
				<br><input type="submit" value="Agregar">
  	  		</form>
  		</div>

  		<div id="div_Docente" class="contenido" style="text-align:center;">
  			<form method="post" action="fAgregaDocen">
  				Nombre: <input type="text" id="name" name="name" required>
  				Contraseña: <input type="text" id="psw"  name="psw" required>
  				Tipo: <input type="text" id="type"  name="type" readonly value="Docente" >
				<br><input type="submit" value="Agregar">
  	  		</form>
  		</div>

  		<div id="div_Alumno" class="contenido" style="text-align:center;">
			<form method="post" action="fAgregaAlumno">
				Nombre: <input type="text" id="name" name="name" required>
  				Contraseña: <input type="text" id="psw"  name="psw" required>
  				Plan: <input type="text" id="plan"  name="plan" required>
  				Tipo: <input type="text" id="type"  name="type" readonly value="Alumno" >
				<br><input type="submit" value="Agregar">
  	  		</form>
  		</div>
	</table>
</tr>
</table>
</body>
</html>
