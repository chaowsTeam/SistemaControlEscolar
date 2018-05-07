<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$this->load->view('librerias');
	?>
	<meta charset="utf-8">
	<title>Alumno</title>
</head>
<body>

<div align="center">
	<h1>Alumno: <?php echo $_SESSION["S_usr"] ?>--<?php echo $_SESSION["S_period"] ?>--  </h1>

	<form action="cargaVInscrGrupo" method="post">
		<input type="submit" value="Inscripción a Grupo" style="margin-top: 10px; width: 175px;">
	</form>

	<form action="frepoInscrip" method="post">
		<input type="submit" value="Reporte de Inscripciones" style="margin-top: 10px; width: 175px;" >
	</form>

	<form action="fKardex" method="post">
		<input type="submit" value="Reporte de Kardex" style="margin-top: 10px; width: 175px;" >
	</form>


	<form action="fsalir" method="post">
		<input type="submit" value="Salir" style="margin-top: 20px; width: 175px;" >
	</form>

</div>

</body>
</html>
