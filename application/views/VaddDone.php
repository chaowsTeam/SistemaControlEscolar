<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$this->load->view('librerias');
	?>
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
	<h1 align="center">¡ÉXITO! :D</h1>
	<table align="center">
		<tr>
			<td style="padding:10px;">
				<input type="submit" value="Regresar"> 
  	  		</td> 
 </form>
</tr>
</table>
</body>
</html>
