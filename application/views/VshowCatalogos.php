<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$this->load->view('librerias');
	?>
	<meta charset="utf-8">
	<title>Catalogos</title>
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
	<h1 align="center">Catalogos.</h1>
	<table align="center">
		<tr>
			<td><label for="t_respaldo">Catalogo: </label></td>
			<td style="padding:10px;">
				<select name="select" id="select" class="form-control">
					
					<option class="form-control"></option>
					<option value="tiposExamenes" class="form-control">Tipos de Examenes</option>
					<option value="salones" class="form-control">Salones</option>
					<option value="carreras" class="form-control">Carreras</option>
					<option value="planesE" class="form-control">Planes de Estudio</option>
					<option value="profesores" class="form-control">Profesores</option>
					<option value="materias" class="form-control">Materias</option>
					<option value="alumnos" class="form-control">Alumnos</option>
  		     	</select>

  	  		</td> 
	<table align="center">
		<div id="div_tiposExamenes" class="contenido" style="text-align:center;">
          		<?php
	    			for ($i=0; $i < count($this->tExamenes); $i++) {?>
	    			 Id: <input type="text" value=" <?php echo $this->tExamenes[$i]['id_tipo_examen'] ;?> " readonly> <input type="text" value=" <?php echo $this->tExamenes[$i]['tipo_examen'] ;?> " readonly><br>
	    		<?php } ?>
  		</div>

  		<div id="div_salones" class="contenido" style="text-align:center;">
  				<?php
	    			for ($i=0; $i < count($this->salones); $i++) {?>
	    			 Id: <input type="text" value=" <?php echo $this->salones[$i]['id_salon'] ;?> " readonly> <input type="text" value=" <?php echo $this->salones[$i]['salon'] ;?> " readonly><br>
	    		<?php } ?>
  		</div>

  		<div id="div_carreras" class="contenido" style="text-align:center;">
				<?php
	    			for ($i=0; $i < count($this->carreras); $i++) {?>
	    			 Id: <input type="text" value=" <?php echo $this->carreras[$i]['id_carrera'] ;?> " readonly> <input type="text" value=" <?php echo $this->carreras[$i]['nom_carrera'] ;?> " readonly><br>
	    		<?php } ?>
  		</div>

  		<div id="div_planesE" class="contenido" style="text-align:center;">
				<?php
	    			for ($i=0; $i < count($this->planes); $i++) {?>
	    			 Id: <input type="text" value=" <?php echo $this->planes[$i]['id_plan'] ;?> " readonly> Plan: <input type="text" value=" <?php echo $this->planes[$i]['plan_estudio'] ;?> " readonly>Id de Carrera: <input type="text" value=" <?php echo $this->planes[$i]['id_carrera'] ;?> " readonly><br>
	    		<?php } ?>
  		</div>

  		<div id="div_profesores" class="contenido" style="text-align:center;">
				<?php
	    			for ($i=0; $i < count($this->profesores); $i++) {?>
	    			 Id: <input type="text" value=" <?php echo $this->profesores[$i]['id_profesor'] ;?> " readonly> Nombre: <input type="text" value=" <?php echo $this->profesores[$i]['nom_profesor'] ;?> " readonly><br>
	    		<?php } ?>
  		</div>

  		<div id="div_materias" class="contenido" style="text-align:center;">
				<?php
	    			for ($i=0; $i < count($this->materias); $i++) {?>
	    			 Id: <input type="text" value=" <?php echo $this->materias[$i]['id_materia'] ;?> " readonly> Nombre: <input type="text" value=" <?php echo $this->materias[$i]['nom_materia'] ;?> " readonly><br>
	    		<?php } ?>
  		</div>

  		<div id="div_alumnos" class="contenido" style="text-align:center;">
				<?php
	    			for ($i=0; $i < count($this->Alumnos); $i++) {?>
	    			 Id: <input type="text" value=" <?php echo $this->Alumnos[$i]['id_alumno'] ;?> " readonly> Nombre: <input type="text" value=" <?php echo $this->Alumnos[$i]['nom_alumno'] ;?> " readonly>Plan: <input type="text" value=" <?php echo $this->Alumnos[$i]['id_plan'] ;?> " readonly><br>
	    		<?php } ?>
  		</div>
  		<input type="submit" value="Regresar"> 
  	</form>
	</table>
</tr>
</table>
</body>
</html>
