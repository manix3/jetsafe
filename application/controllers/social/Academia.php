<?php /**
 *
 */
class Academia extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('academia/Modelo_academia');
  }


  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('social/vista_estudiante',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }


  public function data_count()
  {
    $resultado = $this->Modelo_academia->data_count();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }


  public function pag_list($ano,$mes)
  {
    $resultado = $this->Modelo_academia->pag_list($ano,$mes);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }

}

 ?>
