<?php /**
 *
 */
class Pagos extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('social/Modelo_pagos');
  }

  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('social/vista_pagos',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }


  public function pag_listar($id=null)
  {
    $resultado = $this->Modelo_pagos->pag_listar($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }
  public function pag_ins()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];
/*
INSERT INTO social.tp_ingresos(
            ide_ing, ide_per, ide_int, ide_tip_ing, ide_for_pag, fil_ing,
            mon_ing, fec_ing, gls_est_ing, ide_empresa)

*/

    $datos = array(
      'ide_int' => $this->input->post('inp_text2'),
      'ide_for_pag' => $this->input->post('inp_text3'),
      'ide_tip_ing' => $this->input->post('inp_text4'),
      'mon_ing' => $this->input->post('inp_text6'),
      'fec_ing' => $this->input->post('inp_text7'),
      'ide_per'  =>1,
      'ide_empresa'  =>$s_ie,
      'is_active'  =>1,
     );
     $res = $this->Modelo_pagos->pag_ins($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }


  public function pag_upd()
  {

    $datos = array(
      'mon_ing' => $this->input->post('inp_text6'),
      'fec_ing' => $this->input->post('inp_text7'),
      'gls_est_ing' => $this->input->post('gls_pag'),
      'ide_int' => $this->input->post('inp_text2'),
      'ide_for_pag' => $this->input->post('inp_text3'),
      'ide_tip_ing' => $this->input->post('inp_text4'),
     );

     $res = $this->Modelo_pagos->pag_upd($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }


  public function pag_del()
  {
    $datos = array(
      'is_active' => 0,
     );
     $res = $this->Modelo_pagos->pag_del($datos);
     $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));
  }



  public function pago_estu($id)
  {
    $resultado = $this->Modelo_pagos->pago_estu($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }

  public function get_grup($ide)
  {
    $resultado = $this->Modelo_pagos->get_grup($ide);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }
  public function get_per($ide)
  {
    $resultado = $this->Modelo_pagos->get_per($ide);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }
}
 ?>
