<?php


class Categorias extends CI_Controller {

  public function __construct(){
    parent::__construct();
     $this->load->database('default');
     $this->load->helper( array('html','url','form') );
     $this->load->library(array('form_validation'));
    $this->load->model('Modelo_categorias');

  }

  public function list_categorias()
  {
    $res = $this->Modelo_categorias->list_categorias();

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function get_cat($id)
  {
    $res = $this->Modelo_categorias->get_cat($id);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function ins()
  {
    $data = array(
      'nom_cat' => $this->input->post('inp_text2'),
    );
    $res = $this->Modelo_categorias->ins($data);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function del()
  {
    $datos = array('is_active_cat' => 0 );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_categorias->del($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function upd()
  {
    $datos = array(
      'nom_cat' => $this->input->post('inp_text2'),
      );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_categorias->upd($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

}

 ?>
