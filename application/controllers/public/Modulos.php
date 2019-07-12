<?php
/**
 *  Clientes pertenecientes al schema public.
 */
class Modulos extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('public/Modelo_modulos');
  }


  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('public/vista_clientes',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }
  public function listar($id=null)
  {
    $res = $this->Modelo_modulos->listar($id);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }
  public function cli_ins()
  {

    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];

    $datos = array(
      'cli_doc' => $this->input->post('inp_doc_cli'),
      'cli_nom' => $this->input->post('inp_nom_cli'),
      'cli_ape_pat' => $this->input->post('inp_ape_pat'),
      'cli_ape_mat' => $this->input->post('inp_ape_mat'),
      'cli_dir' => $this->input->post('inp_dir_cli'),
      'cli_ruc' => $this->input->post('inp_ruc_cli'),
      'cli_tel1' => $this->input->post('inp_tel_cli1'),
      'cli_tel2' => $this->input->post('inp_tel_cli2'),
      'cli_email' => $this->input->post('inp_ema_cli'),
      'cli_facebook' => $this->input->post('inp_fb_cli'),
      'cli_twitter' => $this->input->post('inp_twt_cli'),
      'cli_gls' => $this->input->post('gls_obs_cli'),
      'cli_fecha_nac' => $this->input->post('inp_fech_nac'),
      'ide_empresa' => $s_ie,

    );

     $res = $this->Modelo_clientes->cli_ins($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));

  }
  public function cli_upd()
  {

        $sess=$this->session->userdata('logged_in');
        $s_ni=$sess['nivel'];
        $s_ie=$sess['ie'];
        $s_id=$sess['id'];

        $datos = array(
          'cli_doc' => $this->input->post('inp_doc_cli'),
          'cli_nom' => $this->input->post('inp_nom_cli'),
          'cli_ape_pat' => $this->input->post('inp_ape_pat'),
          'cli_ape_mat' => $this->input->post('inp_ape_mat'),
          'cli_dir' => $this->input->post('inp_dir_cli'),
          'cli_ruc' => $this->input->post('inp_ruc_cli'),
          'cli_tel1' => $this->input->post('inp_tel_cli1'),
          'cli_tel2' => $this->input->post('inp_tel_cli2'),
          'cli_email' => $this->input->post('inp_ema_cli'),
          'cli_facebook' => $this->input->post('inp_fb_cli'),
          'cli_twitter' => $this->input->post('inp_twt_cli'),
          'cli_gls' => $this->input->post('gls_obs_cli'),
          'cli_fecha_nac' => $this->input->post('inp_fech_nac'),
          'ide_empresa' => $s_ie,

        );

         $res = $this->Modelo_clientes->cli_upd($datos,$s_ie);
         $this->output->set_content_type('application/json')
        ->set_output(json_encode( $res ));

  }
  public function cli_del()
  {

    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];


    $datos = array(
      'is_active' => 0,
    );
    $res = $this->Modelo_clientes->cli_del($datos,$s_ie);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }
}
 ?>
