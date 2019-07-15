<?php


class Productos extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Modelo_productos');

  }

  public function index()
  {
    if($data['sesion'] = $this->session->userdata('logged_in')){

      $this->load->view('includes/head');
      $this->load->view('includes/header', $data);
      $this->load->view('includes/menu');
      $this->load->view('productos');
      $this->load->view('includes/footer');

    }else {
      redirect('login','refresh');
    }
  }

  public function list_prod($id=null)
  {
    $res = $this->Modelo_productos->list_prod($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ins()
  {
    $data = array(
      'titulo' => $this->input->post('inp_text2'),
      'titulo_en' => $this->input->post('inp_text3'),
      'precio' => $this->input->post('inp_text4'),
      'orden' => $this->input->post('inp_text5'),
      'informacion_adicional' => $this->input->post('inp_text6'),
      'estado' => $this->input->post('inp_text7'),
      'fecha' => date('Y-m-d H:i:s')
    );
    $res = $this->Modelo_productos->ins($data);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function upd()
  {
    $datos = array(
      'titulo' => $this->input->post('inp_text2'),
      'titulo_en' => $this->input->post('inp_text3'),
      'precio' => $this->input->post('inp_text4'),
      'orden' => $this->input->post('inp_text5'),
      'informacion_adicional' => $this->input->post('inp_text6'),
      'estado' => $this->input->post('inp_text7'),
      'fecha_update' => date('Y-m-d H:i:s')
    );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_productos->upd($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function del()
  {
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_productos->del($id);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


}

 ?>
