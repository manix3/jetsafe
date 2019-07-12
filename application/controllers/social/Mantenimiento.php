<?php /**
 *
 */
class Mantenimiento extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('social/Modelo_mant_aca');

  }

  public function index()
  {
    echo "todo bien";
  }
  /*----- Tipo de Servicio social ok------*/
    public function mant_tiposervicio_listar($id=null)
    {
      $resultado = $this->Modelo_mant_aca->mant_tiposervicio_listar($id);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode( $resultado ));
    }


/*----- Condicion Integrante social ok------*/
  public function mant_condint_listar($id=null)
  {
    $resultado = $this->Modelo_mant_aca->mant_condint_listar($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }

  /*------------sedes social ok---------------*/
    public function mant_sedes_index()
    {
      if($this->session->userdata('logged_in'))
      {
        $resultado['sesion']=$this->session->userdata('logged_in');
        $this->load->view('academia/vista_mant_lug',$resultado);
      }
      else
      {
        redirect('login', 'refresh');
      }
    }
    public function mant_sedes_listar($id=null)
    {
      $resultado = $this->Modelo_mant_aca->mant_sedes_listar($id);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode( $resultado ));
    }
    public function mant_sedes_ins()
    {
      $sess=$this->session->userdata('logged_in');
      $s_ni=$sess['nivel'];
      $s_ie=$sess['ie'];
      $s_id=$sess['id'];
      $datos = array(
        'lug_nom' => $this->input->post('inp_text2'),
        'ide_empresa'  =>$s_ie,
        'is_active'  =>1,
       );
       $res = $this->Modelo_mant_aca->mant_lugares_ins($datos);
       $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));
    }
    public function mant_sedes_upd()
    {
      $sess=$this->session->userdata('logged_in');
      $s_ni=$sess['nivel'];
      $s_ie=$sess['ie'];
      $s_id=$sess['id'];
      $datos = array(
        'lug_nom' => $this->input->post('inp_text2'),
       );
       $res = $this->Modelo_mant_aca->mant_lugares_upd($datos);
       $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));
    }
    public function mant_sedes_del()
    {
      $sess=$this->session->userdata('logged_in');
      $s_ni=$sess['nivel'];
      $s_ie=$sess['ie'];
      $s_id=$sess['id'];


      $datos = array(
        'is_active' => 0,
       );
       $res = $this->Modelo_mant_aca->mant_sedes_del($datos,$s_ie);
       $this->output->set_content_type('application/json')
        ->set_output(json_encode( $res ));
    }



/*------------Lugares---------------*/
  public function mant_lugares_index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('academia/vista_mant_lug',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }
  public function mant_lugares_listar($id=null)
  {
    $resultado = $this->Modelo_mant_aca->mant_lugares_listar($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }
  public function mant_lugares_ins()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];
    $datos = array(
      'lug_nom' => $this->input->post('inp_text2'),
      'ide_empresa'  =>$s_ie,
      'is_active'  =>1,
     );
     $res = $this->Modelo_mant_aca->mant_lugares_ins($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }
  public function mant_lugares_upd()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];
    $datos = array(
      'lug_nom' => $this->input->post('inp_text2'),
     );
     $res = $this->Modelo_mant_aca->mant_lugares_upd($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }
  public function mant_lugares_del()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];


    $datos = array(
      'is_active' => 0,
     );
     $res = $this->Modelo_mant_aca->mant_lugares_del($datos,$s_ie);
     $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));
  }





/*------------Pagos---------------*/
public function mant_tip_pago_index()
{
  if($this->session->userdata('logged_in'))
  {
    $resultado['sesion']=$this->session->userdata('logged_in');
    $this->load->view('academia/vista_mant_tip_pago',$resultado);
  }
  else
  {
    redirect('login', 'refresh');
  }
}
public function mant_tip_pago_listar($id=null)
{
  $resultado = $this->Modelo_mant_aca->mant_tip_pago_listar($id);
  $this->output->set_content_type('application/json')
  ->set_output(json_encode( $resultado ));
}
public function mant_tip_pago_ins()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'detalle_tip_pago' =>$this->input->post('inp_text2'),
    'ide_empresa'  =>$s_ie,
    'is_active'  =>1,
   );
   $res = $this->Modelo_mant_aca->mant_tip_pago_ins($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}
public function mant_tip_pago_upd()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'detalle_tip_pago' => $this->input->post('inp_text2'),
   );
   $res = $this->Modelo_mant_aca->mant_tip_pago_upd($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}
public function mant_tip_pago_del()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];


  $datos = array(
    'is_active' => 0,
   );
   $res = $this->Modelo_mant_aca->mant_tip_pago_del($datos,$s_ie);
   $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
}


/*forma*/
public function mant_for_pago_index()
{
  if($this->session->userdata('logged_in'))
  {
    $resultado['sesion']=$this->session->userdata('logged_in');
    $this->load->view('academia/vista_mant_for_pago',$resultado);
  }
  else
  {
    redirect('login', 'refresh');
  }
}
public function mant_for_pago_listar($id=null)
{
  $resultado = $this->Modelo_mant_aca->mant_for_pago_listar($id);
  $this->output->set_content_type('application/json')
  ->set_output(json_encode( $resultado ));
}
public function mant_for_pago_ins()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'detalle_for_pago' => $this->input->post('inp_text2'),
    'ide_empresa'  =>$s_ie,
    'is_active'  =>1,
   );
   $res = $this->Modelo_mant_aca->mant_for_pago_ins($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}
public function mant_for_pago_upd()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'detalle_for_pago' => $this->input->post('inp_text2'),
   );
   $res = $this->Modelo_mant_aca->mant_for_pago_upd($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}
public function mant_for_pago_del()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];


  $datos = array(
    'is_active' => 0,
   );
   $res = $this->Modelo_mant_aca->mant_for_pago_del($datos,$s_ie);
   $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
}




/*estado*/
public function mant_est_pago_index()
{
  if($this->session->userdata('logged_in'))
  {
    $resultado['sesion']=$this->session->userdata('logged_in');
    $this->load->view('academia/vista_mant_est_pago',$resultado);
  }
  else
  {
    redirect('login', 'refresh');
  }
}
public function mant_est_pago_listar($id=null)
{
  $resultado = $this->Modelo_mant_aca->mant_est_pago_listar($id);
  $this->output->set_content_type('application/json')
  ->set_output(json_encode( $resultado ));
}
public function mant_est_pago_ins()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'detalle_est_pago' => $this->input->post('inp_text2'),
    'ide_empresa'  =>$s_ie,
    'is_active'  =>1,
   );
   $res = $this->Modelo_mant_aca->mant_est_pago_ins($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}
public function mant_est_pago_upd()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'detalle_est_pago' => $this->input->post('inp_text2'),
   );
   $res = $this->Modelo_mant_aca->mant_est_pago_upd($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}
public function mant_est_pago_del()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];


  $datos = array(
    'is_active' => 0,
   );
   $res = $this->Modelo_mant_aca->mant_est_pago_del($datos,$s_ie);
   $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
}




/*------------Evaluaciones---------------*/
public function mant_tip_eva_index()
{
  if($this->session->userdata('logged_in'))
  {
    $resultado['sesion']=$this->session->userdata('logged_in');
    $this->load->view('academia/vista_mant_tip_eva',$resultado);
  }
  else
  {
    redirect('login', 'refresh');
  }
}
public function mant_tip_eva_listar($id=null)
{
  $resultado = $this->Modelo_mant_aca->mant_tip_eva_listar($id);
  $this->output->set_content_type('application/json')
  ->set_output(json_encode( $resultado ));
}
public function mant_tip_eva_ins()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'detalle_evaluacion' => $this->input->post('inp_text2'),
    'ide_empresa'  =>$s_ie,
    'is_active'  =>1,
   );
   $res = $this->Modelo_mant_aca->mant_tip_eva_ins($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}
public function mant_tip_eva_upd()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'detalle_evaluacion' => $this->input->post('inp_text2'),
   );
   $res = $this->Modelo_mant_aca->mant_tip_eva_upd($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}
public function mant_tip_eva_del()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];


  $datos = array(
    'is_active' => 0,
   );
   $res = $this->Modelo_mant_aca->mant_tip_eva_del($datos,$s_ie);
   $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
}




public function mant_cali_index()
{
  if($this->session->userdata('logged_in'))
  {
    $resultado['sesion']=$this->session->userdata('logged_in');
    $this->load->view('academia/vista_mant_cali',$resultado);
  }
  else
  {
    redirect('login', 'refresh');
  }
}
public function mant_cali_listar($id=null)
{
  $resultado = $this->Modelo_mant_aca->mant_cali_listar($id);
  $this->output->set_content_type('application/json')
  ->set_output(json_encode( $resultado ));
}
public function mant_cali_ins()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'detalle_calificacion' => $this->input->post('inp_text2'),
    'ide_empresa'  =>$s_ie,
    'is_active'  =>1,
   );
   $res = $this->Modelo_mant_aca->mant_cali_ins($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}
public function mant_cali_upd()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'detalle_calificacion' => $this->input->post('inp_text2'),
   );
   $res = $this->Modelo_mant_aca->mant_cali_upd($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}
public function mant_cali_del()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];


  $datos = array(
    'is_active' => 0,
   );
   $res = $this->Modelo_mant_aca->mant_cali_del($datos,$s_ie);
   $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
}




/*Categoria*/


public function mant_cat_index()
{
  if($this->session->userdata('logged_in'))
  {
    $resultado['sesion']=$this->session->userdata('logged_in');
    $this->load->view('academia/vista_mant_cat',$resultado);
  }
  else
  {
    redirect('login', 'refresh');
  }
}
public function mant_cat_listar($id=null)
{
  $resultado = $this->Modelo_mant_aca->mant_cat_listar($id);
  $this->output->set_content_type('application/json')
  ->set_output(json_encode( $resultado ));
}

public function mant_cat_ins()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'cat_nom' => $this->input->post('inp_text2'),
    'cat_year' => $this->input->post('inp_text3'),
    'ide_empresa'  =>$s_ie,
    'is_active'  =>1,
   );
   $res = $this->Modelo_mant_aca->mant_cat_ins($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}

public function mant_cat_upd()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];
  $datos = array(
    'cat_nom' => $this->input->post('inp_text2'),
    'cat_year' => $this->input->post('inp_text3'),
   );
   $res = $this->Modelo_mant_aca->mant_cat_upd($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));
}

public function mant_cat_del()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];


  $datos = array(
    'is_active' => 0,
   );
   $res = $this->Modelo_mant_aca->mant_cat_del($datos,$s_ie);
   $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
}



/*Grupos*/

public function mant_grup_index()
{
  if($this->session->userdata('logged_in'))
  {
    $resultado['sesion']=$this->session->userdata('logged_in');
    $this->load->view('academia/vista_mant_gru',$resultado);
  }
  else
  {
    redirect('login', 'refresh');
  }
}


public function mant_grup_listar($id=null)
{
  $i = 0;
  $resultado = $this->Modelo_mant_aca->mant_grup_listar($id);

  if ($resultado) {
    foreach ($resultado as $key ) {

      $resultado[$i]->periodo = $this->Modelo_mant_aca->mant_grup_listar_per($key->ide_grupo);
      $i++;
    }
  }else {
    $resultado = 'No hay Registros';
  }

   $this->output->set_content_type('application/json')
   ->set_output(json_encode( $resultado ));
}
public function mant_grup_listaralumnos($id=null)
{
  $resultado = $this->Modelo_mant_aca->listar_alumnosxgrupo($id);


   $this->output->set_content_type('application/json')
   ->set_output(json_encode( $resultado ));
}

public function mant_grup_ins()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];

  $periodo = $this->input->post('inp_text5');
  $datos = array(
    'gru_nom' => $this->input->post('inp_text2'),
    'ide_prof' => $this->input->post('inp_text3'),
    'ide_categoria' => $this->input->post('inp_text4'),
    'ide_empresa'  =>$s_ie,
    'is_active'  =>1,
   );
   $res = $this->Modelo_mant_aca->mant_grup_ins($datos);

   if ($res) {
     $data = array();

     for ($i=0; $i <count($periodo) ; $i++) {
        $data[$i]['ide_grupo'] = $res;
        $data[$i]['ide_periodo_pago'] = $periodo[$i];
        $data[$i]['ide_empresa'] = $s_ie;
        $data[$i]['is_active'] = 1;
     }


    $res2 = $this->Modelo_mant_aca->mant_grup_per_ins($data);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res2 ));
   }else {

     $this->output->set_content_type('application/json')
     ->set_output(json_encode( false ));
   }
}

public function mant_grup_upd()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];


  $datos = array(
    'gru_nom' => $this->input->post('inp_text2'),
    'ide_prof' => $this->input->post('inp_text3'),
    'ide_categoria' => $this->input->post('inp_text4'),
   );

   $periodo = $this->input->post('inp_text5');
   $this->Modelo_mant_aca->upd_grup_per_del($this->input->post('inp_text1'));

   $data = array();
   for ($i=0; $i <count($periodo) ; $i++) {
      $data[$i]['ide_grupo'] = $this->input->post('inp_text1');
      $data[$i]['ide_periodo_pago'] = $periodo[$i];
      $data[$i]['ide_empresa'] = $s_ie;
      $data[$i]['is_active'] = 1;
   }
  $res2 = $this->Modelo_mant_aca->mant_grup_per_ins($data);


   $res = $this->Modelo_mant_aca->mant_grup_upd($datos);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));



}

public function mant_grup_del()
{
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];


  $datos = array(
    'is_active' => 0,
   );
   $res = $this->Modelo_mant_aca->mant_grup_del($datos,$s_ie);
   $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
}


/*PERIODOS DE PAGO*/

  public function mat_per_pag_index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('academia/vista_mant_per_pag',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }
  public function mat_per_pag_listar($id=null)
  {
    $resultado = $this->Modelo_mant_aca->mat_per_pag_listar($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }
  public function mat_per_pag_ins()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];
    $datos = array(
      'detalle_per_pago' => $this->input->post('inp_text2'),
      'fech_inicio'  =>$this->input->post('inp_text3'),
      'fech_final'  =>$this->input->post('inp_text4'),
      'fech_tope'  =>$this->input->post('inp_text5'),
      'ide_empresa'  =>$s_ie,
      'is_active'  =>1,
     );
     $res = $this->Modelo_mant_aca->mat_per_pag_ins($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }
  public function mat_per_pag_upd()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];
    $datos = array(
      'detalle_per_pago' => $this->input->post('inp_text2'),
      'fech_inicio'  =>$this->input->post('inp_text3'),
      'fech_final'  =>$this->input->post('inp_text4'),
      'fech_tope'  =>$this->input->post('inp_text5'),
     );
     $res = $this->Modelo_mant_aca->mat_per_pag_upd($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }
  public function mat_per_pag_del()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];


    $datos = array(
      'is_active' => 0,
     );
     $res = $this->Modelo_mant_aca->mat_per_pag_del($datos);
     $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));
  }


  public function act_grup()
  {
      $this->Modelo_mant_aca->act_grup();

  }


}
 ?>
