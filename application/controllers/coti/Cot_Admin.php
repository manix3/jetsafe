<?php /**
 *
 */
class Cot_Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('coti/Modelo_cot_admin');
  }

  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('coti/coti_vista_admin',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }
}
 ?>
