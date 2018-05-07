<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$this->load->view('librerias');
	?>
	<meta charset="utf-8">
	<title>Profesor</title>
</head>
<body>

<div align="center">
	<h1>Profesor: <?php echo $_SESSION["S_usr"] ?> --<?php echo $_SESSION["S_period"] ?>-- </h1>
	<form action="fcargaVregistroCalif" method="post">
		<input type="submit" value="Registro de Calificaciones" style="margin-top: 10px; width: 175px;" >
	</form>

	<form action="flistamateriasHorarios" method="post">
		<input type="submit" value="Lista Materias/Horarios" style="margin-top: 10px; width: 175px;">
	</form>

	<form action="flistaAlumnosGrupo" method="post">
		<input type="submit" value="Lista Alumnos/Grupo" style="margin-top: 10px; width: 175px;" >
	</form>

	<form action="fRepoCalif" method="post">
		<input type="submit" value="Reporte de Calificaciones" style="margin-top: 10px; width: 175px;" >
	</form>

	<form action="fsalir" method="post">
		<input type="submit" value="Salir" style="margin-top: 20px; width: 175px;" >
	</form>

</div>

</body>
</html>
