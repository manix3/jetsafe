<?php /**
 *
 */
class Asistencia extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
      $this->load->model('academia/Modelo_asistencia');
  }


  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('academia/vista_asistencia',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }

  public function tom_asis_index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('academia/vista_asis_tom',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }


  public function ver_asis_index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('academia/vista_asis_ver',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }
  public function vista_asis_act_asis_index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('academia/vista_asis_act_asis',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }




public function grup_asis($id=null)
{

  $res = $this->Modelo_asistencia->grup_asis($id);
  $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}

public function est_asis($id=null)
{

  $res = $this->Modelo_asistencia->est_asis($id);
  $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}

public function tom_asis()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];


  $asis  = array(
    'ide_grupo' => $this->input->post('gru'),
    'ide_act' => $this->input->post('act'),
    'ide_empresa' =>$s_ie ,
   );

  $res = $this->Modelo_asistencia->tom_asis_ins($asis);


  if ($res) {
    $a =  $this->input->post('est');
    if (count($a) > 0) {
      $est = array();
      $i =0;
      foreach ($a as $key ) {
        $est[$i]['ide_estudiante'] = $key;
        $est[$i]['ide_asistencia'] = $res;
        $i++;
      }


      $respuesta = $this->Modelo_asistencia->tom_est_ins($est);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode( $respuesta ));
    }



  }else {
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( false ));
  }



}


public function asis_listar($id=null)
{
  $res = $this->Modelo_asistencia->asis_listar($id);
  $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}
public function asis_listar_est($id)
{
  $res = $this->Modelo_asistencia->asis_listar_est($id);
  $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}

public function asis_listar_alu($id)
{
  $res = $this->Modelo_asistencia->asis_listar_alu($id);
  $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}


public function asis_upd_alu_index($id)
{
  if($this->session->userdata('logged_in'))
  {
    $resultado['sesion']=$this->session->userdata('logged_in');
    $this->load->view('academia/vista_asis_edi',$resultado);
  }
  else
  {
    redirect('login', 'refresh');
  }
}


public function edi_asis()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];

  $asis = $this->input->post('asis');
  $o = $this->Modelo_asistencia->del_asi($asis);

  if ($o) {
    $a =  $this->input->post('est');
    if (count($a) > 0) {
      $est = array();
      $i =0;
      foreach ($a as $key ) {
        $est[$i]['ide_estudiante'] = $key;
        $est[$i]['ide_asistencia'] = $asis;
        $i++;
      }

      $respuesta = $this->Modelo_asistencia->tom_est_ins($est);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode( $respuesta ));
    }


  }else {
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( false ));
  }
}


public function asis_del()
{
  $datos = array(
    'is_active' =>0 ,
   );

   $respuesta = $this->Modelo_asistencia->asis_del($datos);
   $this->output->set_content_type('application/json')
   ->set_output(json_encode( $respuesta ));

}

}
 ?>
