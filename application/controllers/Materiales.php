<?php


class Materiales extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Modelo_materiales');

  }

  public function list_materiales()
  {
    $res = $this->Modelo_materiales->list_materiales();

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function get_mat($id)
  {
    $res = $this->Modelo_materiales->get_mat($id);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function ins()
  {
    $data = array(
      'nom_mat' => $this->input->post('inp_text2'),
      'pre_est_mat' => $this->input->post('inp_text3'),
      'ide_cat' => $this->input->post('inp_text4'),
      'ide_tip_unidad' => $this->input->post('inp_text5'),
    );
    $res = $this->Modelo_materiales->ins($data);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function del()
  {
    $datos = array('is_active_mat' => 0 );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_materiales->del($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function upd()
  {
    $datos = array(
      'nom_mat' => $this->input->post('inp_text2'),
      'pre_est_mat' => $this->input->post('inp_text3'),
      'ide_cat' => $this->input->post('inp_text4'),
      'ide_tip_unidad' => $this->input->post('inp_text5'),
      );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_materiales->upd($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

}

 ?>
