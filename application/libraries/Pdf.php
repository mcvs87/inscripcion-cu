<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    // class Pdf extends FPDF {
      
        


class PDF extends FPDF {
        
  public function __construct() {
        parent::__construct();
         
  }
  // Page header
/*
  function Header()
  {
    // Logo
     $logo= "librerias/img/hoja.jpg";
    $this->Image($logo,0,0,205);
 
  }
 */
 /* function Footer()
  {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','B',9);
      $this->Cell(195, 0, utf8_decode("Edificio \"Adolfo Ruiz Cortines\" Av. Wilfrido Massieu s/n esq. Luis Enrique Erro, Unidad Profesional \"Adolfo López Mateos\","), 0, 1, 'C');
      $this->ln(4);
      $this->SetFont('Arial','B',9);
      $this->Cell(195, 0, utf8_decode("Zacatenco, Ciudad de México, C.P. 07738. Teléfonos: +52 (55) 5729 6000, Extensiones 57176; 57182; 57131; finvestedu@ipn.mx"), 0, 1, 'C');

  }  */
}