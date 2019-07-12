

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/factura/fpdf/fpdf.php";

    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf2 extends FPDF {
        // public function __construct() {
        //     parent::__construct();
        // }
        // El encabezado del PDF
        public function Header(){

       }
       // El pie del pdf
       public function Footer(){
         $this->SetTextColor(0,0,0);
         $this->SetFont('arial','',12);
         $this->SetXY(18,26.2);
         $this->Cell(0.8, 0.25, utf8_decode("Pág. ").$this->PageNo().' de {nb}', 0, 1,'L', 0);
      }
    }

?>
