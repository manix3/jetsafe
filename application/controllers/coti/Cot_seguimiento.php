<?php /**
 *
 */
class Cot_seguimiento extends CI_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Modelo_tc_reportes');
  }

  public function index()
  {
    if($this->session->userdata('logged_in'))
		{
			$resultado['sesion']=$this->session->userdata('logged_in');
			$resultado['nro_servicios'] = $this->Modelo_tc_reportes->cuenta_estado_servicios_dia();
			//print_r($resultado);
			$this->load->view('coti/coti_vista_seguimiento',$resultado);
		}
		else
		{
			redirect('login', 'refresh');
		}
  }
}
 ?>
