<?php


class Fianza extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Modelo_fianza');

  }

  public function list_fianzas()
  {
    $res = $this->Modelo_fianza->list_fianzas();

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function get_fia($id)
  {
    $res = $this->Modelo_fianza->get_fia($id);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function ins()
  {
    $data = array(
      'nom_fia' => $this->input->post('inp_text2'),
      'ide_cat' => $this->input->post('inp_text3'),
    );
    $res = $this->Modelo_fianza->ins($data);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function del()
  {
    $datos = array('is_active_fia' => 0 );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_fianza->del($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function upd()
  {
    $datos = array(
      'nom_fia' => $this->input->post('inp_text2'),
      'ide_cat' => $this->input->post('inp_text3'),
      );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_fianza->upd($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

}

 ?>
