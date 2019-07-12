<?php /**
 *
 */
class Reportes extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('academia/Modelo_reportes');
  }


  public function rep_asis_gru_index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('academia/rep_asis_gru',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }

  public function grup_listar()
  {

    $resultado = $this->Modelo_reportes->grup_listar();
     $this->output->set_content_type('application/json')
     ->set_output(json_encode( $resultado ));
  }

  public function get_asis($id)
  {
    $resultado = $this->Modelo_reportes->get_asis($id);
     $this->output->set_content_type('application/json')
     ->set_output(json_encode( $resultado ));
  }

}
 ?>
