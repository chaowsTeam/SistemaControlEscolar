<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
<div align="center">
	<h1>Bienvenido!</h1>
	<form action="fUserTipe" method="post">
		<div align="center">
		Usuario: <input type="text" required name="usr" style="margin-top: 10px; width: 150px;"><br>
		Contraseña: <input type="password" required name="psw" style="margin-top: 10px; width: 150px;"><br>
		Periodo: <select name="period" id="period" class="form-control">
					<option value="2018A" class="form-control">2018A</option>
					<option value="2017B" class="form-control">2017B</option>
					<option value="2017A" class="form-control">2017A</option>
					<option value="2016B" class="form-control">2016B</option>
					<option value="2016A" class="form-control">2016A</option>
  		     	</select><br>
		<input type="submit" value="Ingresar"> <input type="Reset" value="Limpiar">
		</div>
	</form>
</div>
</body>
</html>
