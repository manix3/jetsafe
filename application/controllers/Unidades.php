<?php


class Unidades extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Modelo_unidades');

  }

  public function list_tip_uni()
  {
    $res = $this->Modelo_unidades->list_tip_uni();

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function get_tip_uni($id)
  {
    $res = $this->Modelo_unidades->get_tip_uni($id);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function ins()
  {
    $data = array(
      'nom_tip_uni' => $this->input->post('inp_text2'),
      'sim_tip_uni' => $this->input->post('inp_text3'),
    );
    $res = $this->Modelo_unidades->ins($data);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function del()
  {
    $datos = array('is_active_tip_uni' => 0 );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_unidades->del($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function upd()
  {
    $datos = array(
      'nom_tip_uni' => $this->input->post('inp_text2'),
      'sim_tip_uni' => $this->input->post('inp_text3'),
      );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_unidades->upd($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

}

 ?>
