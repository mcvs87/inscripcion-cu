<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Alumno extends CI_Model {

	const tabla="alumno";

  	public function __construct()
    {
      	parent::__construct();
    }

	public function getAlumnos(){
		$query = $this->db->get(self::tabla);
        return $query->result_array();
	 
	}

	public function getAlmByNumCuenta($numCuenta){
		$this->db->where('id', $numCuenta);
		$query = $this->db->get(self::tabla);
        return $query->result();
	 
	}

	public function crearAlumno($dataAlumno){
		$this->db->db_debug = false;
		$crear = $this->db->insert(self::tabla, $dataAlumno);	 
		if(!$crear)
	    {
	        $error = $this->db->error();
	        return $error;
	        //return array $error['code'] & $error['message']
	    }
	    else
	    {
	        return 1;
	    }
		
	}

	public function actualizarAlumno($dataAlumno,$numCuenta){
		$this->db->db_debug = false;

		$this->db->where('id', $numCuenta);
		$editar = $this->db->update(self::tabla, $dataAlumno);
		if(!$crear)
	    {
	        $error = $this->db->error();
	        return $error;
	        //return array $error['code'] & $error['message']
	    }
	    else
	    {
	        return 1;
	    }		
		
	}

	public function eliminarAlumno($numCuenta){
		$this->db->db_debug = false;

		$editar = $this->db->delete(self::tabla, array('id' => $numCuenta));
		if(!$crear)
	    {
	        $error = $this->db->error();
	        return $error;
	        //return array $error['code'] & $error['message']
	    }
	    else
	    {
	        return 1;
	    }		
	}



}
