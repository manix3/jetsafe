<?php /**
 *
 */
class Calendario extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('academia/Modelo_actividades');
      $this->load->model('academia/Modelo_mant_aca');
  }

  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('social/vista_calendario',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }


  public function list($id=null)
  {

    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('academia/vista_actividades_editar',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }

  public function act_listar($id=null)
  {
    $resultado = $this->Modelo_actividades->act_listar($id);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode( $resultado ));
  }


  public function act_listar_grup($id=null)
  {
    $resultado = $this->Modelo_actividades->act_listar_grup($id);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode( $resultado ));
  }


  public function act_ins()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];

    $y = $this->input->post('y');
    $m = $this->input->post('m');
    $d = $this->input->post('d');




    $fech = $y."-".($m + 1 )."-".$d;
    $fech = date("Y-m-d", strtotime($fech));

    $grup = $this->input->post('grup');

    if (is_array($grup)) {
      $grup['ide_empresa'] = $s_ie;
      $id_grup =  $this->Modelo_mant_aca->mant_grup_ins_act($grup);
    }else {
      $id_grup = $grup;
    }

    $datos = array(
      'act_nom' => $this->input->post('act_nom'),
      'act_fecha' => $fech,
      'act_hor_ini' => $this->input->post('act_hor_ini'),
      'act_hor_fin' => $this->input->post('act_hor_fin'),
      'act_gls' => $this->input->post('act_gls'),
      'url' => '',
      'ide_lugar' => $this->input->post('ide_lugar'),
      'act_tip' => $this->input->post('act_tip'),
      'act_pago' => $this->input->post('act_pago'),
      'ide_empresa' => $s_ie,
    );

    $res =  $this->Modelo_actividades->act_ins($datos);


    if ($res) {

      $data = array(
        'ide_grupo' =>$id_grup,
        'ide_act' => $res,
       );


      $this->Modelo_actividades->act_grup_ins($data);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));


    }else {
      $this->output->set_content_type('application/json')
      ->set_output(json_encode(false));
    }



  }
  public function act_upd()
  {

    $datos = array(
      'act_nom' => $this->input->post('inp_text2'),
      'act_hor_ini' => $this->input->post('inp_text5'),
      'act_hor_fin' => $this->input->post('inp_text6'),
      'act_gls' => $this->input->post('inp_text7'),
      'url' => '',
      'ide_lugar' => $this->input->post('inp_text3'),
    );

    $res =  $this->Modelo_actividades->act_upd($datos);
    $this->output->set_content_type('application/json')
     ->set_output(json_encode($res));
  }
  public function act_del()
  {

    $datos = array(
      'is_active' => 0,
    );

    $res =  $this->Modelo_actividades->act_del($datos);
    $this->output->set_content_type('application/json')
     ->set_output(json_encode($res));
  }



}
 ?>
