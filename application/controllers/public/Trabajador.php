<?php
/**
 *  Clientes pertenecientes al schema public.
 */
class Trabajador extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('public/Modelo_trabajador');
  }


  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('public/vista_trabajador',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }
  public function trab_listar($id=null)
  {
    $res = $this->Modelo_trabajador->trab_listar($id);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }
  public function trab_ins()
  {

    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];

    $datos = array(
      'trab_doc' => $this->input->post('inp_doc_trab'),
      'trab_nombre' => $this->input->post('inp_nom_trab'),
      'trab_ape_pat' => $this->input->post('inp_ape_pat'),
      'trab_ape_mat' => $this->input->post('inp_ape_mat'),
      'trab_tel1' => $this->input->post('inp_tel_trab1'),
      'trab_tel2' => $this->input->post('inp_tel_trab2'),
      'trab_email' => $this->input->post('inp_ema_trab'),
      'trab_fecha_nac' => $this->input->post('inp_fech_nac'),
      'trab_est_civil' => $this->input->post('trab_est_civil'),
      'ide_empresa' => $s_ie,

    );

     $res = $this->Modelo_trabajador->trab_ins($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));

  }
  public function trab_upd()
  {

        $sess=$this->session->userdata('logged_in');
        $s_ni=$sess['nivel'];
        $s_ie=$sess['ie'];
        $s_id=$sess['id'];

        $datos = array(
          'trab_doc' => $this->input->post('inp_doc_trab'),
          'trab_nombre' => $this->input->post('inp_nom_trab'),
          'trab_ape_pat' => $this->input->post('inp_ape_pat'),
          'trab_ape_mat' => $this->input->post('inp_ape_mat'),
          'trab_tel1' => $this->input->post('inp_tel_trab1'),
          'trab_tel2' => $this->input->post('inp_tel_trab2'),
          'trab_email' => $this->input->post('inp_ema_trab'),
          'trab_fecha_nac' => $this->input->post('inp_fech_nac'),
          'trab_est_civil' => $this->input->post('trab_est_civil'),
          'ide_empresa' => $s_ie,

        );

         $res = $this->Modelo_trabajador->trab_upd($datos,$s_ie);
         $this->output->set_content_type('application/json')
        ->set_output(json_encode( $res ));

  }
  public function trab_del()
  {

    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];


    $datos = array(
      'is_active' => 0,
    );
    $res = $this->Modelo_trabajador->trab_del($datos,$s_ie);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }
}
 ?>
