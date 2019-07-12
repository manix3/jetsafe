<?php


class Mano_de_obra extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Modelo_mano_de_obra');

  }

  public function list_man_de_obra()
  {
    $res = $this->Modelo_mano_de_obra->list_man_de_obra();

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function get_man_obra($id)
  {
    $res = $this->Modelo_mano_de_obra->get_fia($id);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function ins()
  {
    $data = array(
      'nom_man' => $this->input->post('inp_text2'),
      'ide_cat' => $this->input->post('inp_text3'),
    );
    $res = $this->Modelo_mano_de_obra->ins($data);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function del()
  {
    $datos = array('is_active_man' => 0 );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_mano_de_obra->del($id, $datos);

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
    $res = $this->Modelo_mano_de_obra->del($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

}

 ?>
