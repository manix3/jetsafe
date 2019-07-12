<?php

/**
 *
 */
class Categorias_caja extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Modelo_categorias_caja');
  }

  public function index()
  {
    if($data['sesion'] = $this->session->userdata('logged_in')){

      $this->load->view('includes/head');
      $this->load->view('includes/header', $data);
      $this->load->view('includes/menu');
      $this->load->view('categorias_caja_view');
      $this->load->view('includes/footer');

    }else {
      redirect('login','refresh');
    }
  }


    public function list_categorias()
    {
      $res = $this->Modelo_categorias_caja->list_categorias();

      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
    }

    public function get_cat($id)
    {
      $res = $this->Modelo_categorias_caja->get_cat($id);

      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
    }
    public function ins()
    {
      $data = array(
        'nom_cat_caja' => $this->input->post('inp_text2'),
      );
      $res = $this->Modelo_categorias_caja->ins($data);

      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
    }

    public function del()
    {
      $datos = array('is_active_cat' => 0 );
      $id = $this->input->post('inp_text1');
      $res = $this->Modelo_categorias_caja->del($id, $datos);

      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
    }
    public function upd()
    {
      $datos = array(
        'nom_cat_caja' => $this->input->post('inp_text2'),
        );
      $id = $this->input->post('inp_text1');
      $res = $this->Modelo_categorias_caja->upd($id, $datos);

      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
    }


}


 ?>
