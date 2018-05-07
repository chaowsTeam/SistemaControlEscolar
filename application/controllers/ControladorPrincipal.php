<?php
session_start(); //Se inicia una session, para poder usar el tipo de usuario y nombre a lo largo del proyecto
defined('BASEPATH') OR exit('No direct script access allowed');

//WINDOWS:  
require('C:\xampp\fpdf\fpdf.php'); //Libreria para la creación de PDF´s
//UBUNTU: require('/opt/lampp/htdocs/fpdf/fpdf.php');

class PDF extends FPDF{ //Clase que extiende de FPDF, 

	function Header(){ //Header de los PDF´s
		$this->SetFont('Times','I',12);
		$this->Cell(35,2,date('F d, o'),0,1,'C');
	}

	function Footer(){ //Footer de los PDF´s
		//Imagen de footer
		//Para WINDOWS:
		//$this->Image('C:\xampp\fpdf\footerUaemex.png',2,25,15,3);

		//Para UBUNTU: $this->Image('/opt/lampp/htdocs/fpdf/footerUaemex.jpeg',2,25,15,3);
	}

}

class ControladorPrincipal extends CI_Controller { //Definición principal

	public function __construct(){ //Definición del modelo
		parent:: __construct();
		$this->load->model('ModelosP');
	}

	public function login(){ //Funcion que carga el Login principal
		$this->load->view('Vlogin');
	}

	public function fCargaVAgregarUsr(){ //Función para cargar vista para agregar usuarios
		$this->load->view('VaddUser');
	}

	public function fsalir(){ //Funcion para salir (Cargar el Login)
		$this->load->view('Vlogin');
	}

	public function fUserTipe(){ //Funcion para verificar si existe el Usuario
		//Obtener el usuario y la contraseña del login
		$usr = strtoupper($this->input->post('usr'));
		$psw = strtoupper($this->input->post('psw'));
		$period = strtoupper($this->input->post('period'));

		$psw2 = $this->ModelosP->verifyPsw($usr); //Obtener la contraseña del usuario ingresado
		$psw2 = $psw2['contraseña'];

		if($psw2 == NULL){ //No se econtro contraseña, ese usuario NO existe
			$this->load->view('Vlogin');
		}elseif ($psw2 != $psw) { //Se encontro una contraseña, PERO NO COINCIDEN
			$this->load->view('Vlogin');
		}else{ //Se Encontro contraseña y SI COINCIDEN
			//Averiguar de que tipo es el usuario que está ingresando
			$tUser = $this->ModelosP->getTypeUser($usr);
			$tUser = $tUser['tipo'];

			//Se asignan las variables de SESSION (Variables 'superglobales', el NOMBRE y el tipo de USUARIO), para poder ser utilizadas a lo largo de todo el proyecto
			$_SESSION["S_usr"]=$usr;
			$_SESSION["S_tUser"]=$tUser;
			$_SESSION["S_period"]=$period;

			//Una vez obtenido el tipo de USUARIO se cargaran las diferentes vistas para cada uno de estos
			if($tUser == 'Administrador'){ 
				$this->load->view('Vadministrador'); //Cargar vista de  Administrador
			}elseif($tUser == 'Docente') { 
				$this->load->view('Vprofesor'); //Cargar vista de  profesor
			}else{ 
				$this->load->view('Valumno'); //Cargar vista de Alumno
			}

		}
	}

	public function fCargaVadministrador(){ //Funcion para cargar la vista de adminsitrador
		$this->load->view('Vadministrador'); //Cargar vista de  Administrador
	}

	public function fAgregaCarrera(){ //Funcion para CARGAR la vista para agregar una CARRERA
		$this->load->view('VagregaCarrera'); //Cargar la vista para agregar una carrera	
	}

	public function fAddCarrera(){ //Funncion para agregar UNA CARRERA
		$nomCarrera = $this->input->post('name');
		$id = $this->input->post('id');
		$respuesta = $this->ModelosP->agregaCarrera($nomCarrera, $id);
		if($respuesta == NULL){
			echo "Ocurrio un PROBLEMA :C";
		}else{
			$this->load->view('VaddDone');
		}
	}

	public function fAgregaAdmin(){ //Funcion para agregar un administrador (solo a la tabla de usuarios)
		$usr = strtoupper($this->input->post('name')); 
		$psw = strtoupper($this->input->post('psw'));
		$type = $this->input->post('type');
		//Se agrega a la base de datos
		$respuesta = $this->ModelosP->agregaUser($usr, $psw, $type);
		if($respuesta == NULL){
			echo "Hubo un Problema al insertar el usuario";
		}else{
			$this->load->view('VaddDone');
		}
	}

	public function fAgregaDocen(){ //Funcion para agregar un Docente
		$usr = strtoupper($this->input->post('name')); 
		$psw = strtoupper($this->input->post('psw'));
		$type = $this->input->post('type');
		//Se agrega a la base de datos
		$respuesta = $this->ModelosP->agregaUser($usr, $psw, $type);
		$respuesta = $this->ModelosP->agregaDocen($usr);
		if($respuesta == NULL){
			echo "Hubo un Problema al insertar el usuario";
		}else{
			$this->load->view('VaddDone');
		}
	}

	public function fAgregaAlumno(){ //Funcion para agregar un Alumno
		$usr = strtoupper($this->input->post('name')); 
		$psw = strtoupper($this->input->post('psw'));
		$plan = ($this->input->post('plan'));
		$type = $this->input->post('type');
		//Se agrega a la base de datos
		$respuesta = $this->ModelosP->agregaUser($usr, $psw, $type);
		$respuesta = $this->ModelosP->agregaAlu($usr, $plan);
		if($respuesta == NULL){
			echo "Hubo un Problema al insertar el usuario";
		}else{
			$this->load->view('VaddDone');
		}
	}

	public function fCatalogos(){ //Funcion para cargar la vista que mostrará todos los CATALOGOS
		//OJO aquí, por la manera en la que se desplegaran los catalogos, primero hay que obtenerlos (planes, carreras, alumnos etc.) para que en la vista a través de un SELECT se deplieguen los que se requieren y eviytar estar haciendo uno por uno
		//Obtener todos los catalogos de la base de datos

		//Obtener tipos de examenes
		$this->tExamenes = $this->ModelosP->obtenTexamenes();
		//Obtener los salones
		$this->salones = $this->ModelosP->obtenSalones();
		//Obtener las carreras
		$this->carreras = $this->ModelosP->obtenCarreras();
		//Obtener los planes de estudio
		$this->planes = $this->ModelosP->obtenPlanes();
		//Obtener los PROfesores
		$this->profesores = $this->ModelosP->obtenProfesores();
		//Obtener las materias
		$this->materias = $this->ModelosP->obtenMaterias(0);
		//Obtener los alumnos
		$this->Alumnos = $this->ModelosP->obtenAlumnos();

		//Ya se tiene todos los catalogos en esas variables, solo queda enviarsela a una vista que despliegue los que el usuario quiera en ese momoento
		$this->load->view('VshowCatalogos', $this->tExamenes, $this->salones, $this->carreras, $this->planes, $this->profesores, $this->materias, $this->Alumnos);
	}

	public function fcargaCreaGrupo(){ //Funcion que carga la vista para la creacion de un grupo
		//Como desde la vista se elige el profesor, materia del grupo, hay que obtenerlos de la base
		//Obtener los PROfesores
		$this->profesores = $this->ModelosP->obtenProfesores();
		//Obtener las materias
		$this->materias = $this->ModelosP->obtenMaterias(0);
		//Obtener los salones
		$this->salones = $this->ModelosP->obtenSalones();

		//Enviarselos a la vista
		$this->load->view('VcreaGrupo', $this->profesores, $this->materias, $this->salones);
	}

	public function fCrearUnGrupo(){ //Funcion que CREA UN GRUPO
		$profe = $this->input->post('profe');
		$materia = $this->input->post('materia');
		$salon = $this->input->post('salon');
		$dias = $this->input->post('dias');
		$H_I = $this->input->post('H_I');
		$H_F = $this->input->post('H_F');

		//Obtener el id del profedsor (Por que entró su nombre)
		$idProfe = $this->ModelosP->ObtenIdProfe($profe);
		//Obtener el id de una materia (Por qué le entró su nombre)
		$idMateria = $this->ModelosP->ObtenIdMateria($materia);
		//Insertar el grupo y el horario.
		//El horario (Dias y horas) están en un vector, una para cada uno, se harán arreglos para poder insertarse en la base de datos.
		
		$dias = implode(",", $dias); //Se une el vector en un String separado por comas
		$H_I = implode(",", $H_I); //Lo mismo con la hora inicial
		$H_F = implode(",", $H_F); //Lo mismo con la hora final

		//Se obtiene el ultimo id del "---" (Funcion generica que lo hace), esta ves será de grupo
		//(Le entra el nombre de la tabla y el nombre del atributo)
		$lastIdGroup = $this->ModelosP->LastId("grupo", "id_grupo");
		$lastIdGroup = $lastIdGroup +1;

		//Insertar el grupo y el horario (Y)
		$this->ModelosP->InsertaGrupo($lastIdGroup, $idProfe, $idMateria);
		$this->ModelosP->InsertaHorario($salon, $dias, $lastIdGroup, $H_I, $H_F);

		$this->load->view('VaddDone');
	}

	public function fcargaVregistroCalif(){ //Funcion para cargar la vista para registrar calificaciones
		//La vista de registro de calificaciones necesita de varios parametros. Primero obtener esos parametros.
		$idProfe = $this->ModelosP->ObtenIdProfe($_SESSION["S_usr"]); //Obtiene el id del profe (usando su nombre)
		$this->materiasProfe = $this->ModelosP->obtenMaterias($idProfe); //Obtiene las materias de un profe

		$this->load->view('VRegisCalif', $this->materiasProfe); //Se carga la vista con los datos necesarios
	}

	public function fRegistraCalif(){ //Funcion para registras calificaciones

	}

	public function flistamateriasHorarios(){ //Funcion para listar als materias y horarios

	}

	public function flistaAlumnosGrupo(){ //Funcion para listar los ALUMNOS y GRUPOS

	}

	public function fRepoCalif(){ //Funcion para reporte de CALIFICACIONES (EL QUE GENERA EL PROFE)

	}

	public function cargaVInscrGrupo(){ //Funcion para hacer una inscripción a un grupo
		//Se necesitan varias cosas para cargar esa vista: 
		//Primero se obtiene la info de los grupos que hay (Materias, profesores, horarios)
		//Para que pueda elegir el alumno a cual inscribirse
		$this->info = $this->ModelosP->obtenInfoGrupos();

		//Como la tabla contiene id´s y nos interesan los nombres, se modificaran los arreglos obtenidos.
		for ($i=0; $i < count($this->info); $i++) { 
			$this->info[$i]['id_profesor'] = $this->ModelosP->ObtenNomProfe($this->info[$i]['id_profesor']);
			$this->info[$i]['id_materia'] = $this->ModelosP->ObtenNomMateria($this->info[$i]['id_materia']);
		}

		$this->load->view('VInscripGrupo');
	}

	public function frepoInscrip(){ //Reporte de INSCRIPCIONES

	}

	public function fKardex(){ //Funcion para generar el KARDEX de una alumno

	}

	public function fRepoMateriasProfe(){ //Reporte de Materias-Profesor (Administrador)

	}

	public function fRepoSalon(){ //Reporte de Salon (Administrador)

	}
}
