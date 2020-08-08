<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();

		$this->load->model('alumno');
		$this->load->helper('formulario');
	}

	
	public function index()
	{
		$data = array(
			'script' => array('jsInicio')  
		);

		$jsFooter['jsFooter'] = [
			'const.js',
			'graficas/code/highcharts.js',
			'graficas/code/highcharts-3d.js',
			'graficas/code/exporting.js',
			'graficas/code/export-data.js',
			'graficas/code/accessibility.js',			
			'grafiasactividad.js',
			'tablaInicio',
			'alumno/formularioA.js'			
		];

		

		$alumnos['alumnos'] = $this->alumno->getAlumnos();
		
		$this->load->view('head',$data);
		$this->load->view('menu');
		//$this->load->view('alumno/formulario');
		$this->load->view('alumno/alumnos', $alumnos);
		$this->load->view('footer',$jsFooter);
	}

	public function guardar()
	{
		
		$fechaActual = date("Y-m-d");

		if (!$this->input->is_ajax_request()) {
			echo 'No es una petición Ajax';
		}else{
			$datos = [
				'nombre' => $this->input->post('nombre'),
				'apPaterno' => $this->input->post('apPaterno'),
				'apMaterno' => $this->input->post('apMaterno'),
				'id' => $this->input->post('numCuenta'),
				'email' => $this->input->post('email'),
				'pass' => hash ("sha256", $this->input->post('password')),
				'create_at' => $fechaActual
			];	

			try {
			    $insertarAlumno = $this->alumno->crearAlumno($datos);
			 } catch (UserException $error){
			     echo $error->getMessage();
    			die();

			 }
		}		
	}

	public function editar(){
		if (!$this->input->is_ajax_request()) {
			echo 'No es una petición Ajax';
		}else{
			$numCuenta = $this->input->post('numCuenta');
			$dataAlumno = $this->alumno->getAlmByNumCuenta($numCuenta);
		}
	}

	public function actualizar($numCuenta)
	{
		$fechaActual = date("Y-m-d");

		if (!$this->input->is_ajax_request()) {
			echo 'No es una petición Ajax';
		}else{
			$datos = [
				'nombre' => $this->input->post('nombre'),
				'apPaterno' => $this->input->post('apPaterno'),
				'apMaterno' => $this->input->post('apMaterno'),
				'id' => $numCuenta,
				'email' => $this->input->post('email'),
				'pass' => hash ("sha256", $this->input->post('password')),
				'create_at' => $fechaActual
			];	

			try {
			    $editarAlumno = $this->alumno->actualizarAlumno($datos, 
			    	$numCuenta);
			 } catch (UserException $error){
			    echo $error->getMessage();
    			die();

			 }
		}		
		
	}

	public function eliminarAlumno(){
		$fechaActual = date("Y-m-d");

		if (!$this->input->is_ajax_request()) {
			echo 'No es una petición Ajax';
		}else{
			try {
			    $eliminarAlumno = $this->alumno->eliminarAlumno( 
			    	$numCuenta);
			 } catch (UserException $error){
			    echo $error->getMessage();
    			die();

			 }
		}		
	}
}
