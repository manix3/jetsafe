<?php /**
 *
 */
class Usuarios extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Modelo_usuarios');
  }


  public function index()
  {
    if($data['sesion'] = $this->session->userdata('logged_in')['SES_TIPO'] == '1'){
      $data['sesion'] = $this->session->userdata('logged_in');
      $this->load->view('includes/head');
      $this->load->view('includes/header', $data);
      $this->load->view('includes/menu');
      $this->load->view('Usuarios');
      $this->load->view('includes/footer');

    }else {
      redirect('login','refresh');
    }
  }

  private function hash($dato)
  {
    return md5($dato);
  }

  public function list_usu($id = null)
  {
    $res = $this->Modelo_usuarios->list_usu($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ins()
  {
    $datos = array(
      'nombres' => $this->input->post('inp_text2'),
      'usuario' => $this->input->post('inp_text3'),
      'clave' => $this->hash($this->input->post('inp_text4')),
      'estado' => $this->input->post('inp_text5'),
      'ejecutivo' => $this->input->post('inp_text6'),
      'admin' => $this->input->post('inp_text7'),
      'fecha' => date('Y-m-d H:i:s')
    );

    $res = $this->Modelo_usuarios->ins($datos);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function upd()
  {
    $datos = array(
      'nombres' => $this->input->post('inp_text2'),
      'usuario' => $this->input->post('inp_text3'),
      'estado' => $this->input->post('inp_text5'),
      'ejecutivo' => $this->input->post('inp_text6'),
      'admin' => $this->input->post('inp_text7'),
    );
    if ($this->input->post('inp_text4') != '') {
      $datos['clave'] = $this->hash($this->input->post('inp_text4'));
    }
    $res = $this->Modelo_usuarios->upd($datos,$this->input->post('inp_text1'));
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function del($id = null)
  {
    $datos = array('estado' => 0);
    $res = $this->Modelo_usuarios->upd($datos,$this->input->post('inp_text1'));
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


}
 ?>
