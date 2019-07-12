<?php

/**
 *
 */
class Seguimiento_bancos extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Modelo_seguimiento_bancos');
  }

  public function index()
  {
    if ($this->session->userdata('logged_in')) {
      $data['sesion'] = $this->session->userdata('logged_in');

      $this->load->view('includes/head');
      $this->load->view('includes/header');
      $this->load->view('includes/menu');
      $this->load->view('seguimientos_bancos_view');
      $this->load->view('includes/footer');

    } else {
      redirect('login','refresh');
    }
  }

  public function list($id=null)
  {


    $banco = $this->input->post('banco');
    $empresa = $this->input->post('empresa');


    $res = $this->Modelo_seguimiento_bancos->list($id,$empresa, $banco);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ins()
  {
    $datos[] = array(
      'ide_banco' => $this->input->post('inp_text2_'.$i),
      'ide_tip_seg' => $this->input->post('inp_text3_'.$i),
      'categoria_seg_banco' => $this->input->post('inp_text4_'.$i),
      'det_seg_banco' => $this->input->post('inp_text5_'.$i),
      'mon_seg_obr' => $this->input->post('inp_text6_'.$i),
      'empresa' => $this->input->post('inp_text7_'.$i),
      'ide_usu_seg_banco' => $this->session->userdata('logged_in')['id'],

    );

      $res = $this->Modelo_seguimiento_bancos->ins($datos);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
  }

  public function ins_admin()
  {
    $datos = array();
    $contador = $this->input->post('contador');

      for ($i=0; $i < $contador + 1; $i++) {

        $datos[] = array(
          'ide_banco' => $this->input->post('inp_text2_'.$i),
          'ide_tip_seg' => $this->input->post('inp_text3_'.$i),
          'categoria_seg_banco' => $this->input->post('inp_text4_'.$i),
          'det_seg_banco' => $this->input->post('inp_text5_'.$i),
          'mont_seg_banco' => $this->input->post('inp_text6_'.$i),
          'ide_empresa' => $this->input->post('inp_text7_'.$i),
          'ide_usu_seg_banco' => $this->session->userdata('logged_in')['id'],

        );

    }
    // print_r($datos);
    $res = $this->Modelo_seguimiento_bancos->ins_admin($datos);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));

  }

  public function list_obras_combo()
  {
    $res = $this->Modelo_seguimientos_obras->list_obras_combo();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


  public function get_by_rank()
  {
    $fecha = $this->input->post('fecha');
    $fe_ex = explode(" ",$fecha);

    $fech1= strtotime($fe_ex[0]);
    $fech2= strtotime($fe_ex[2]);

    $fecha1= date('Y-m-d',$fech1);
    $fecha2= date('Y-m-d',$fech2);

    if ($fecha1 === $fecha2) {
          $fecha2 = null;
    }
    // echo($fecha1.'-'.$fecha2);
    $res = $this->Modelo_seguimiento_bancos->get_by_rank($fecha1,$fecha2);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
}


 ?>
