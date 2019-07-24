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
    $rand='';
    for ($i=0; $i < 6 ; $i++) {
      $rand.= rand(0, 9);
    }
    $data = array(
       'codigo_afiliacion' => $this->input->post('inp_text2'),
       'ruc' => $this->input->post('inp_text3'),
       'razon_social' => $this->input->post('inp_text4'),
       'nombre_comercial' => $this->input->post('inp_text5'),
       'email' => $this->input->post('inp_text6'),
       'fecha' => date('Y-m-d H:i:s'),
       'clave' => $this->hash($rand),
    );
    $res = $this->Modelo_empresa->ins($data);

    $this->send_email($this->input->post('inp_text6'),$rand,$data['razon_social'],$data['codigo_afiliacion'],$data['nombre_comercial'],0);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


  public function upd()
  {
    $data = array(
       'codigo_afiliacion' => $this->input->post('inp_text2'),
       'ruc' => $this->input->post('inp_text3'),
       'razon_social' => $this->input->post('inp_text4'),
       'nombre_comercial' => $this->input->post('inp_text5'),
       'email' => $this->input->post('inp_text6'),
       'fecha_update' => date('Y-m-d H:i:s')

    );

    $res = $this->Modelo_empresa->upd($this->input->post('inp_text1'),$data);



    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function upd_clave()
  {
      // upd clave

      $data['clave'] = $this->hash($this->input->post('inp_text2'));
      $data['fecha_update'] = date('Y-m-d H:i:s');
      $this->Modelo_empresa->upd($this->input->post('inp_text1'),$data);

      // fin upd clave
      // obtener datos de la empresa para email
      $email = $this->Modelo_empresa->get_data_for_mail($this->input->post('inp_text1'));
      //fin consulta envio de email
      // print_r($email);
      $res = $this->send_email($email->email,$this->input->post('inp_text2'),$email->razon_social,$email->codigo_afiliacion,$email->nombre_comercial,1);

      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));

  }

  public function send_email($email,$clave,$razon_social,$codigo_afiliacion,$nombre_comercial,$if)
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
      if ($if == '0') {
        $htmlContent = "<h1>Contraseña de acceso para $nombre_comercial</h1>";
        $htmlContent .= "<p>Esta es la clave para el acceso a nuestra pagina web $clave y el codigo para acceso es $codigo_afiliacion</p>";

      } else {
        $htmlContent = "<h1>Contraseña de acceso para $nombre_comercial</h1>";
        $htmlContent .= "<p>Esta es la clave nueva para acceso a nuestra pagina web $clave y el codigo para acceso es $codigo_afiliacion ha sido actualizada con exito</p>";

      }

      $this->email->to($email);
      $this->email->from($data[5]->texto,$data[0]->texto);
      $this->email->subject('Contraseña para el ingreso a nuestra red con el registro de tu empresa');
      $this->email->message($htmlContent);

      //Send email
      return $this->email->send();
  }




  public function del()
  {
    $res = '';
    $condicion = $this->Modelo_empresa->is_deletable($this->input->post('inp_text1'));
    if ($condicion == '') {
      $res = $this->Modelo_empresa->del($this->input->post('inp_text1'));
    }
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  private function hash($rand)
  {
    return md5($rand);
  }

}

 ?>
