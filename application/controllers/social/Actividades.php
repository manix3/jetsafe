<?php /**
 *
 */
class Actividades extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('social/Modelo_estudiante');
    $this->load->model('social/Modelo_actividades');

  }

  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('social/vista_actividades',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }

  public function est_nuevo_index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('social/vista_nuevo_est',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }



  public function acti_listar($id=null)
  {
    $resultado = $this->Modelo_actividades->acti_listar($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }



    public function act_ins()
    {

      $sess=$this->session->userdata('logged_in');
      $s_ni=$sess['nivel'];
      $s_ie=$sess['ie'];
      $s_id=$sess['id'];


      // TODO: preguntar que es ide_per

        $datos = array(
          'tip_eve' => $this->input->post('tip_eve'),
          'ide_per' => 1,
          'fec_eve_ini' => $this->input->post('fec_eve_ini'),
          'fec_eve_fin' => $this->input->post('fec_eve_fin'),
          'ide_est_eve' => 1,
          'gls_eve' => $this->input->post('gls_eve'),
          'ide_empresa' => $s_ni,
          'nom_eve' => $this->input->post('nom_eve'),
         );

        $resultado = $this->Modelo_actividades->act_ins($datos);
        $this->output->set_content_type('application/json')
        ->set_output(json_encode( $resultado ));
    }



    public function act_upd()
    {


      $res = $this->Modelo_actividades->acti_listar($this->input->post('inp_text1'));


        $datos = array(
          'tip_eve' => $this->input->post('tip_eve') != '' ? $this->input->post('tip_eve') : $res[0]->tip_eve ,
          'fec_eve_ini' => $this->input->post('fec_eve_ini') != '' ? $this->input->post('fec_eve_ini') : $res[0]->fec_eve_ini ,
          'fec_eve_fin' => $this->input->post('fec_eve_fin') != '' ? $this->input->post('fec_eve_fin') : $res[0]->fec_eve_fin ,
          'gls_eve' => $this->input->post('gls_eve') != '' ? $this->input->post('gls_eve') : $res[0]->gls_eve ,
          'nom_eve' => $this->input->post('nom_eve') != '' ? $this->input->post('nom_eve') : $res[0]->nom_eve ,
         );

        $resultado = $this->Modelo_actividades->act_upd($datos);
        $this->output->set_content_type('application/json')
        ->set_output(json_encode( $resultado ));
    }


    public function act_del()
    {
        $resultado = $this->Modelo_actividades->act_del();
        $this->output->set_content_type('application/json')
        ->set_output(json_encode( $resultado ));
    }


  public function int_no_eve($id=null)
  {
    $resultado = $this->Modelo_actividades->int_no_eve($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }

  public function int_si_eve($id=null)
  {
    $resultado = $this->Modelo_actividades->int_si_eve($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }

  public function addintegrante()
  {
    $resultado = $this->Modelo_actividades->addintegrante();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }

  public function removeintegrante()
  {
    $resultado = $this->Modelo_actividades->removeintegrante();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }













  public function estu_listar_dos($id=null)
  {
    $resultado = $this->Modelo_estudiante->estu_listar_dos($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }
  public function estu_listar_pago($id=null)
  {
    $resultado = $this->Modelo_estudiante->estu_listar_pago($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }
  public function estu_ins()
  {

    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];
    $apo_ide = 3;



    $estudiante = array(
      'nom_int' => $this->input->post('inp_text2'),
      'ape_int' => $this->input->post('inp_text3'),
      'tel_int' => $this->input->post('inp_text5'),
      'ide_sed' => $this->input->post('inp_text18'),
      'ide_con' => $this->input->post('inp_sel_estado'),
      'fna_int' => $this->input->post('inp_text16'),
      'gls_int' => $this->input->post('gls_int'),
      'ide_empresa' => 1,
      'is_active' => 1,

     );


     $res = $this->Modelo_estudiante->estu_ins($estudiante);
if($res) {
     return true;
   }else {
     return false;
   }




  }


  public function est_ins_wt_grup()
  {

        $sess=$this->session->userdata('logged_in');
        $s_ni=$sess['nivel'];
        $s_ie=$sess['ie'];
        $s_id=$sess['id'];



        if ($this->input->post('inp_text8') != null) {

          $apo = array(
            'apo_nom' => $this->input->post('inp_text8'),
            'apo_ape_pat' => $this->input->post('inp_text9'),
            'apo_ape_mat' => $this->input->post('inp_text10'),
            'apo_tel1' => $this->input->post('inp_text11'),
            'apo_tel2' => $this->input->post('inp_text12'),
            'apo_direccion' => $this->input->post('inp_text13'),
            'apo_dni' => $this->input->post('inp_text14'),
            'apo_email' => $this->input->post('inp_text15'),
            'ide_empresa'  =>$s_ie,
          );

           $apo_ide = $this->Modelo_estudiante->apop_ins($apo);

        }else {
          $apo_ide='0';
        }

        $estudiante = array(
          'est_nom' => $this->input->post('inp_text2'),
          'est_ape_pat' => $this->input->post('inp_text3'),
          'est_ape_mat' => $this->input->post('inp_text4'),
          'est_tel1' => $this->input->post('inp_text5'),
          'est_dir' => $this->input->post('inp_text6'),
          'est_tel2' => $this->input->post('inp_text7'),
          'est_ano_nac' => $this->input->post('inp_text17'),
          'est_fec_nac' => $this->input->post('inp_text16'),
          'ide_apoderado' =>$apo_ide,
          'ide_empresa'  =>$s_ie,
         );


         $res = $this->Modelo_estudiante->estu_ins($estudiante);

         if ($res) {

          $data = array(
            'ide_estudiante' => $res ,
            'ide_grupo' => $this->input->post('ide_gru_add_est'),
          );
          $res = $this->Modelo_estudiante->estu_grup_ins($data);
          $this->output->set_content_type('application/json')
          ->set_output(json_encode( $res ));
        }else {
          $this->output->set_content_type('application/json')
          ->set_output(json_encode( false ));
        }


  }


  public function est_ins_in_grup()
  {
    $ide_grupo = $this->input->post('ide_gru');
    $est = $this->input->post('est');
    $est_gp = array();
    foreach ($est as $e => $_i) {
      $est_gp[$e]['ide_grupo']=$ide_grupo;
      $est_gp[$e]['ide_estudiante']=$_i;
    }

    $res = $this->Modelo_estudiante->estu_grup_ins_mas($est_gp);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }



  public function estu_upd()
  {
//    echo "hola";
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];






    $estudiante = array(
      'nom_int' => $this->input->post('inp_text2'),
      'ape_int' => $this->input->post('inp_text3'),
      'tel_int' => $this->input->post('inp_text5'),
      'ide_sed' => $this->input->post('inp_text18'),
      'ide_con' => $this->input->post('inp_sel_estado'),
      'fna_int' => $this->input->post('inp_text16'),
      'gls_int' => $this->input->post('gls_int'),


  /*    'est_ape_mat' => $this->input->post('inp_text4'),
      'est_tel1' => $this->input->post('inp_text5'),
      'est_dir' => $this->input->post('inp_text6'),
      'est_tel2' => $this->input->post('inp_text7'),
      'est_ano_nac' => $this->input->post('inp_text17'),
      'est_fec_nac' => $this->input->post('inp_text16'),*/
//      'est_img' => $final_image,
     );



     $res = $this->Modelo_estudiante->estu_upd($estudiante);

     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }
  public function estu_del()
  {
    $datos = array(
      'is_active' => 0,
     );
     $res = $this->Modelo_estudiante->estu_del($datos);
     $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));
  }
}
 ?>
