<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$this->load->view('librerias');
	?>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>

<div align="center">
	<h1>Administrador:  <?php echo $_SESSION["S_usr"] ?> --<?php echo $_SESSION["S_period"] ?>--</h1>

	<form action="fAgregaCarrera" method="post">
		<input type="submit" value="Agregar Carrera" style="margin-top: 10px; width: 115px;" >
	</form>

	<form action="fCargaVAgregarUsr" method="post">
		<input type="submit" value="Agregar Usuario" style="margin-top: 10px; width: 115px;">
	</form>

	<form action="fCatalogos" method="post">
		<input type="submit" value="Catalogos" style="margin-top: 10px; width: 115px;" >
	</form>

	<form action="fcargaCreaGrupo" method="post">
		<input type="submit" value="Crear Grupo" style="margin-top: 10px; width: 115px;" >
	</form>

	<form action="fRepoMateriasProfe" method="post">
		<input type="submit" value="Reporte Materias/Profesor" style="margin-top: 10px; width: 115px;" >
	</form>

	<form action="fRepoSalon" method="post">
		<input type="submit" value="Reporte Salon" style="margin-top: 10px; width: 115px;" >
	</form>

	<form action="fsalir" method="post">
		<input type="submit" value="Salir" style="margin-top: 20px; width: 115px;" >
	</form>

</div>

</body>
</html>
