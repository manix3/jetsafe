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
      'nom_man' => $this->input->post('inp_text2'),
      'ide_cat' => $this->input->post('inp_text3'),
    );
    $res = $this->Modelo_productos->ins($data);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function upd()
  {
    $datos = array(
      'nom_man' => $this->input->post('inp_text2'),
      'ide_cat' => $this->input->post('inp_text3'),
      );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_productos->del($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function del()
  {
    $datos = array('is_active_man' => 0 );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_productos->del($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


}

 ?>
