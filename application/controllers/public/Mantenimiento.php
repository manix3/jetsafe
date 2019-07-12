<?php
/**
 *  Clientes pertenecientes al schema public.
 */
class Mantenimiento extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('public/Modelo_Mantenimiento');
  }

/*
    Periodo

*/


  public function vista_periodo()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('public/vista_periodo',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }



  public function per_listar($id=null)
  {
    $res = $this->Modelo_Mantenimiento->per_listar($id);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }
  public function per_ins()
  {

    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];

    $datos = array(
        'nom_ide_periodo' => $this->input->post('inp_text2'),
        'year' => $this->input->post('inp_text3'),
        'ide_empresa' => $s_ie,
    );

     $res = $this->Modelo_Mantenimiento->per_ins($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));

  }
  public function per_upd()
  {

        $sess=$this->session->userdata('logged_in');
        $s_ni=$sess['nivel'];
        $s_ie=$sess['ie'];
        $s_id=$sess['id'];

        $datos = array(
            'nom_ide_periodo' => $this->input->post('inp_text2'),
            'year' => $this->input->post('inp_text3'),
        );

         $res = $this->Modelo_Mantenimiento->per_upd($datos,$s_ie);
         $this->output->set_content_type('application/json')
        ->set_output(json_encode( $res ));

  }
  public function per_del()
  {

    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];

    $res = $this->Modelo_Mantenimiento->per_del($s_ie);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }




}
 ?>
