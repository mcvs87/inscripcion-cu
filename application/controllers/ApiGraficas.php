<?php


class ApiGraficas extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	/**
	* FUnción que sirve para obetner los datos del participante
	* con ralacion a los creditos del tronco común y su 
	* aprovechamiento escolar, solicita como parametro numero 
	* de cuenta.
	/// NOTA: como no se encuentra tabla carrera no se solicita el id 
	/// de la carrera
	*/
	public function experiencia(){

		$array = array(
			"creditosTC" => [128, 140, 96,28,28,30],
			"creditosMateria" => [8, 10, 8,30,50,30]
			 );
		$json = json_encode($array);
		echo  $json;
	}

}  // class
 ?>
