<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$this->load->view('librerias');
	?>
	<meta charset="utf-8">
	<title>Profesor</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<script type="text/javascript">

$(document).ready(function() {
var iCnt = 0;

// Crear un elemento div añadiendo estilos CSS
var container = $(document.createElement('div')).css({
padding: '15px', margin: '30px', width: '200px',
borderTopColor: '#999', borderBottomColor: '#999',
borderLeftColor: '#999', borderRightColor: '#999'
});

$('#btAdd').click(function() {
if (iCnt <= 19) {

iCnt = iCnt + 1;


$(container).append('<tr><td>Día: <select class="form-control" name="dias[]" style="width: 130px" required ><option></option><option>Lunes</option><option>Martes</option><option>Miercoles</option><option>Jueves</option><option>Viernes</option><option>Sábado</option></select></td> <td>H.I: <input style="margin-left: 25px; width: 90px"  type="time" class="form-control" name="H_I[]" required ></td><td>H.F: <input style="margin-left: 25px; width: 90px" type="time" class="form-control" name="H_F[]" required ></td></tr>');

//<tr> <td> <label id=tb'+iCnt+' style="margin-left: 150px;" >Elige el producto: '+iCnt+' </label><select  class="form-control" name="dias[]"><option value="--" class="form-control">---</option></select></td> <td align="center" style="padding:10px;"> <label id=tb'+iCnt+' style="margin-left: 250px;" >Cantidad: </label> <input type="number"  style="margin-left: 250px;" min=1 class="form-control" name="cantArts[]"> </td> </tr>

if (iCnt == 1) {

var divSubmit = $(document.createElement('div'));
$(divSubmit).append('');
}

$('#main').after(container, divSubmit);
}
else { //se establece un limite para añadir elementos, 20 es el limite

$(container).append('<label>Limite Alcanzado</label>');
$('#btAdd').attr('class', 'bt-disable');
$('#btAdd').attr('disabled', 'disabled');

}
});

$('#btRemove').click(function() { // Elimina un elemento por click
	if (iCnt != 0) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; }
	if (iCnt == 0) { $(container).empty();
		$(container).remove();
		$('#btSubmit').remove();
		$('#btAdd').removeAttr('disabled');
		$('#btAdd').attr('class', 'bt')
	}
});



$('#btRemoveAll').click(function() { // Elimina todos los elementos del contenedor

$(container).empty();
$(container).remove();
$('#btSubmit').remove(); iCnt = 0;
$('#btAdd').removeAttr('disabled');
$('#btAdd').attr('class', 'bt');

});
});

// Obtiene los valores de los textbox al dar click en el boton "Enviar"
var divValue, values = '';

function GetTextValue() {

$(divValue).empty();
$(divValue).remove(); values = '';

$('.input').each(function() {
divValue = $(document.createElement('div')).css({
padding:'5px', width:'200px'
});
values += this.value + '<br />'
});

$(divValue).append('<p><b>Tus valores añadidos</b></p>' + values);
$('body').append(divValue);

}

</script>
<body>

<div align="center">
	<h1>Crear Un Grupo </h1>
	<form action="fCrearUnGrupo" method="post">
		<table align="center">
		<tr>
			<td><label for="t_respaldo">Profesor: </label></td>
			<td style="padding:10px;">
				<select name="profe" id="profe" class="form-control" required>
					<option></option>
					<?php
						for ($i=0; $i < count($this->profesores); $i++) {?>
						<option  class="form-control"><?php echo $this->profesores[$i]['nom_profesor'] ;?></option>
					<?php } ?>
  		     	</select>
  	  		</td>
  	  		<td><label for="t_respaldo">Materia: </label></td>
  	  		<td style="padding:10px;">
				<select name="materia" id="materia" class="form-control" required>
					<option class="form-control"></option>
					<?php
						for ($i=0; $i < count($this->materias); $i++) {?>
						<option  class="form-control"><?php echo $this->materias[$i]['nom_materia'] ;?></option>
					<?php } ?>
  		     	</select>
  	  		</td>
  	  		<td><label for="t_respaldo">Salón: </label></td>
  	  		<td style="padding:10px;">
				<select name="salon" id="salon" class="form-control" required>
					<option class="form-control"></option>
					<?php
						for ($i=0; $i < count($this->salones); $i++) {?>
						<option  class="form-control"><?php echo $this->salones[$i]['id_salon'] ;?></option>
					<?php } ?>
  		     	</select>
  	  		</td> 
  	  	</tr>
  	  </table>




  	  <table align="center">
  	  	<h1>Horario: </h1>
  	  	<div class="content">
  	  		<!-- Aqui es donde se van a colocar las cosas que aparecen al presionar el botón de agregar-->
  	  	</div>

  	  	<div id="main" align="center" style="margin-top: 40px;">
  	  		<input type="button" id="btAdd" value="Añadir Día" class="bt" />
  	  		<input type="button" id="btRemoveAll" value="Eliminar Todos" class="bt" /><br />
  	  	</div>


  	  </table>

		<input type="submit" value="Crear" style="margin-top: 40px">
	</form>

	<form action="fCargaVadministrador" method="post">
		<input type="submit" value="Regresar" style="margin-top: 20px; width: 175px;" >
	</form>

</div>

</body>
</html>
