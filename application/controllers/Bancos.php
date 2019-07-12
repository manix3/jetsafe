<?php


class Bancos extends CI_Controller {

  public function __construct(){
    parent::__construct();
     $this->load->database('default');
     $this->load->helper( array('html','url','form') );
     $this->load->library(array('form_validation'));
    $this->load->model('Modelo_bancos');

  }
  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('vista_usuario',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }


  }
  public function list_bank()
  {
    $res = $this->Modelo_bancos->list_bank();

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function get_bank($id)
  {
    $res = $this->Modelo_bancos->get_bank($id);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function ins()
  {
    $data = array(
      'nom_ban' => $this->input->post('inp_text2'),
      'total_ban' => $this->input->post('inp_text3'),
      'nro_cta_ban' => $this->input->post('inp_text4'),
      'nom_empresa' => $this->input->post('inp_text5'),
    );
    $res = $this->Modelo_bancos->ins($data);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function del()
  {
    $datos = array('is_active_ban' => 0 );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_bancos->del($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
  public function upd()
  {
    $datos = array(
      'nom_ban' => $this->input->post('inp_text2'),
      'total_ban' => $this->input->post('inp_text3'),
      'nro_cta_ban' => $this->input->post('inp_text4'),
      'nom_empresa' => $this->input->post('inp_text5'),
      );
    $id = $this->input->post('inp_text1');
    $res = $this->Modelo_bancos->upd($id, $datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

}

 ?>
