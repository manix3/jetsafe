<?php /**
 *
 */
class Empresas extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('public/Modelo_empresas');
  }

  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('public/vista_empresas',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }


  public function emp_list($id=null)
  {
    $res = $this->Modelo_empresas->emp_list($id);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }
  public function emp_ins()
  {
    $datos = array(
      'emp_nombre' => $this->input->post('inp_text3'),
      'nombre_comercial' => $this->input->post('inp_text9'),
      'emp_cod' => $this->input->post('inp_text10'),
      'emp_ruc' => $this->input->post('inp_text7'),
      'emp_telefono1' => $this->input->post('inp_text4'),
      'correo_empresa' => $this->input->post('inp_text5'),
      'emp_direccion' => $this->input->post('inp_text6'),
      'firma' => $this->input->post('inp_text8'),
     );
    $res = $this->Modelo_empresas->emp_ins($datos);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }
  public function emp_upd()
  {
    $datos = array(
      'emp_nombre' => $this->input->post('inp_text3'),
      'nombre_comercial' => $this->input->post('inp_text9'),
      'emp_cod' => $this->input->post('inp_text10'),
      'emp_ruc' => $this->input->post('inp_text7'),
      'emp_telefono1' => $this->input->post('inp_text4'),
      'correo_empresa' => $this->input->post('inp_text5'),
      'emp_direccion' => $this->input->post('inp_text6'),
      'firma' => $this->input->post('inp_text8'),
     );
    $res = $this->Modelo_empresas->emp_upd($datos);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }
  public function emp_del()
  {
    $data = array('is_active' => 0);
    $res = $this->Modelo_empresas->emp_del($data);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }



}
   ?>
