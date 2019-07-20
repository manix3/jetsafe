<?php


class Empresa extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->library('email');
    $this->load->model('Modelo_empresa');
  }

  public function index()
  {
    if($data['sesion'] = $this->session->userdata('logged_in')){
      $this->load->view('includes/head');
      $this->load->view('includes/header', $data);
      $this->load->view('includes/menu');
      $this->load->view('empresas');
      $this->load->view('includes/footer');
    }else {
      redirect('login','refresh');
    }
  }

  public function list_emp($id=null)
  {
    $res = $this->Modelo_empresa->list_emp($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ins()
  {
    $data = array(
       'codigo_afiliacion' => $this->input->post('inp_text2'),
       'ruc' => $this->input->post('inp_text3'),
       'razon_social' => $this->input->post('inp_text4'),
       'nombre_comercial' => $this->input->post('inp_text5'),
       'email' => $this->input->post('inp_text6'),
       'clave' => $this->hash(),
    );
    $res = $this->Modelo_empresa->ins($data);

    $this->send_email($this->input->post('inp_text6'),$data->clave);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


  public function send_email($email,$clave)
  {
    $data = $this->Modelo_empresa->get_smtp();
    $config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://'.$data[1]->texto,
    'smtp_port' => '465',
    'smtp_user' => $data[2]->texto,
    'smtp_pass' => $data[3]->texto,
    'mailtype'  => 'html',
    'charset'   => 'utf-8'
      );
      // print_r($config);
      $this->email->initialize($config);
      $this->email->set_mailtype("html");
      $this->email->set_newline("\r\n");

      //Email content
      $htmlContent = '<h1>Contraseña de acceso</h1>';
      $htmlContent .= "<p>Esta es la clave para el acceso a nuestra pagina web $clave</p>";

      $this->email->to($email);
      $this->email->from($data[5]->texto,$data[0]->texto);
      $this->email->subject('Contraseña para el ingreso a nuestra red con el registro de tu empresa');
      $this->email->message($htmlContent);

      //Send email
      return $this->email->send();
  }


  public function upd()
  {
    $datos = array(
       'codigo_afiliacion' => $this->input->post('inp_text2'),
       'ruc' => $this->input->post('inp_text3'),
       'razon_social' => $this->input->post('inp_text4'),
       'nombre_comercial' => $this->input->post('inp_text5'),
       'email' => $this->input->post('inp_text6'),
    );

    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_empresa->upd($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function del()
  {

    $res = $this->Modelo_empresa->del($this->input->post('inp_text1'));
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  private function hash()
  {
    $rand='';
    for ($i=0; $i < 6 ; $i++) {
      $rand.= rand(0, 9);
    }
    return md5($rand);
  }

}

 ?>
