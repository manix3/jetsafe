<?php /**
 *
 */
class Profesor extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('academia/Modelo_profesor');
  }

  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('academia/vista_profesores',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }


  public function prof_listar($id=null)
  {
    $resultado = $this->Modelo_profesor->prof_listar($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }
  public function prof_ins()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];
    $datos = array(
      'pro_nom' => $this->input->post('inp_text2'),
      'pro_ape_pat' => $this->input->post('inp_text3'),
      'pro_ape_mat' => $this->input->post('inp_text4'),
      'pro_tel1' => $this->input->post('inp_text5'),
      'pro_dir' => $this->input->post('inp_text6'),
      'ide_empresa'  =>$s_ie,
      'is_active'  =>1,
     );
     $res = $this->Modelo_profesor->prof_ins($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }
  public function prof_upd()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];
    $datos = array(
      'pro_nom' => $this->input->post('inp_text2'),
      'pro_ape_pat' => $this->input->post('inp_text3'),
      'pro_ape_mat' => $this->input->post('inp_text4'),
      'pro_tel1' => $this->input->post('inp_text5'),
      'pro_dir' => $this->input->post('inp_text6'),
     );
     $res = $this->Modelo_profesor->prof_upd($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }
  public function prof_del()
  {
    $datos = array(
      'is_active' => 0,
     );
     $res = $this->Modelo_profesor->prof_del($datos);
     $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));
  }
}
 ?>
