<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	
	public function index()
	{
		$data = array(
			'scriptHeader' => array('jsInicio')  
		);

		$jsFooter['jsFooter'] = [
			'const.js',
			'graficas/code/highcharts.js',
			'graficas/code/highcharts-3d.js',
			'graficas/code/exporting.js',
			'graficas/code/export-data.js',
			'graficas/code/accessibility.js',	
			'alumno/dataReporte.js',	
			'jspdf.js',
			'rgbcolor.js',
			'canvg.js',

		];	
		
		$this->load->view('head',$data);
		$this->load->view('menu');
		$this->load->view('principal');
		$this->load->view('footer',$jsFooter);
	}
}
