<?php /**
 *
 */
class clientes extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Modelo_clientes');
  }



  public function index()
  {
    if($data['sesion'] = $this->session->userdata('logged_in')){

      $this->load->view('includes/head');
      $this->load->view('includes/header', $data);
      $this->load->view('includes/menu');
      $this->load->view('clientes');
      $this->load->view('includes/footer');

    }else {
      redirect('login','refresh');
    }
  }
}
 ?>
