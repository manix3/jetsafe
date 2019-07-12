<?php


class Profesionales extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Modelo_profesionales');

  }

  public function list_profesionales()
  {
    $res = $this->Modelo_profesionales->list_profesionales();

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function get_profesional($id)
  {
    $res = $this->Modelo_profesionales->get_profesional($id);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function ins()
  {
    $data = array(
      'nom_prof' => $this->input->post('inp_text2'),
      'tfl_prof' => $this->input->post('inp_text3'),
      'ide_cat' => $this->input->post('inp_text4'),
    );
    $res = $this->Modelo_profesionales->ins($data);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function del()
  {
    $datos = array('is_active_prof' => 0 );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_profesionales->del($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function upd()
  {
    $datos = array(
      'nom_prof' => $this->input->post('inp_text2'),
      'tfl_prof' => $this->input->post('inp_text3'),
      'ide_cat' => $this->input->post('inp_text4'),
      );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_profesionales->upd($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

}

 ?>
