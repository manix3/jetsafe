<?php /**
 *
 */
class Parametros extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Modelo_parametros');
  }

  public function index()
  {
    if ($this->session->userdata('logged_in')['SES_TIPO'] == '1') {
      $data = $this->session->userdata('logged_in');
      $this->load->view('includes/head');
      $this->load->view('includes/header');
      $this->load->view('includes/menu',$data);
      $this->load->view('Parametros');
      $this->load->view('includes/footer');
    } else {
      redirect('login','refresh');
    }
  }

  public function list_param($id = null)
  {
    $res = $this->Modelo_parametros->list_param($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  function upd()
  {
    $datos = array('texto' => $this->input->post('inp_text3'));

    $res = $this->Modelo_parametros->upd($datos,$this->input->post('inp_text1'));
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

}




 ?>
