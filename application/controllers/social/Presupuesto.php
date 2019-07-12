<?php /**
 *
 */
class Presupuesto extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('social/Modelo_pagos');
    $this->load->model('social/Modelo_presupuesto');

  }

  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('social/vista_presupuesto',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }


  public function presupuesto_x_evento($id=null)
  {
    $resultado = $this->Modelo_presupuesto->presupuesto_x_evento($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }

  public function presupuesto_x_evento_get($id=null)
  {
    $resultado = $this->Modelo_presupuesto->get_stshi($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }



  public function presu_det_ins()
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

/*ide_pre_eve, ide_eve, ide_tip_ser, ide_pro,
            num_per, num_dia, fec_ini, fec_fin, mon_tot_eve, por_tot_eve,
            ade_tot_eve, gls_pre_eve_det, ide_empresa, is_active */

$data = array(
  'ide_eve' => $this->input->post('inp_text20'),
  'gls_pre_eve' => $this->input->post('inp_text21'),
  'ide_empresa' => $s_ie,
);


$ide_pre_eve = $this->Modelo_presupuesto->presu_ins($data);


if ($this->input->post('inp_text4')) {  $num_per=$this->input->post('inp_text4');} else {  $num_per=null; }
if ($this->input->post('inp_text5')) {  $num_dia=$this->input->post('inp_text5');} else {  $num_dia=null; }
if ($this->input->post('inp_text6')) {  $fec_ini=$this->input->post('inp_text6');} else {  $fec_ini=null; }
if ($this->input->post('inp_text7')) {  $fec_fin=$this->input->post('inp_text7');} else {  $fec_fin=null; }


    $datos = array(
      'ide_pre_eve' => $ide_pre_eve,
      'ide_eve' => $this->input->post('inp_text20'),
      'ide_tip_ser' => $this->input->post('inp_text2'),
      'ide_pro' => $this->input->post('inp_text3'),
      'num_per' => $num_per,
      'num_dia' => $num_dia,
      'fec_ini'  =>$fec_ini,
      'fec_fin'  =>$fec_fin,
       'mon_tot_eve'=>$this->input->post('inp_text8'),
       'por_tot_eve'=>$this->input->post('inp_text9'),
       'ade_tot_eve'=>$this->input->post('inp_text10'),
       'gls_pre_eve_det'=>$this->input->post('gls_ite_pre'),

     );
     $res = $this->Modelo_presupuesto->presu_det_ins($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }








  public function pag_listar($id=null)
  {
    $resultado = $this->Modelo_pagos->pag_listar($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }

  public function pag_upd()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];

    $data = array(
      'ide_eve' => $this->input->post('inp_text20'),
      'gls_pre_eve' => $this->input->post('inp_text21'),    
    );


    $ide_pre_eve = $this->Modelo_presupuesto->presu_upd($data);



    if ($this->input->post('inp_text4')) {  $num_per=$this->input->post('inp_text4');} else {  $num_per=null; }
    if ($this->input->post('inp_text5')) {  $num_dia=$this->input->post('inp_text5');} else {  $num_dia=null; }
    if ($this->input->post('inp_text6')) {  $fec_ini=$this->input->post('inp_text6');} else {  $fec_ini=null; }
    if ($this->input->post('inp_text7')) {  $fec_fin=$this->input->post('inp_text7');} else {  $fec_fin=null; }
        $datos = array(
          'ide_tip_ser' => $this->input->post('inp_text2'),
          'ide_pro' => $this->input->post('inp_text3'),
          'num_per' => $num_per,
          'num_dia' => $num_dia,
          'fec_ini'  =>$fec_ini,
          'fec_fin'  =>$fec_fin,
           'mon_tot_eve'=>$this->input->post('inp_text8'),
           'por_tot_eve'=>$this->input->post('inp_text9'),
           'ade_tot_eve'=>$this->input->post('inp_text10'),
           'gls_pre_eve_det'=>$this->input->post('gls_ite_pre'),

         );
         $res = $this->Modelo_presupuesto->pag_upd($datos);
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
