<?php /**
 *
 */
class Cot_reportes extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('coti/Modelo_cot_vendedor');
    $this->load->model('coti/Modelo_Cot_cotizacion');

  }


  public function index()
  {
    if($this->session->userdata('logged_in'))
    {

    }
    else
    {
      redirect('login', 'refresh');
    }
  }
  public function repor1()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('coti/coti_vista_reporte1',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }
  public function repor2()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('coti/coti_vista_reporte2',$resultado);
    }
    else
    {
      redirect('login', 'refresh');
    }
  }
  public function cot_listar($id=null)
  {
    $i=0;
    $res = $this->Modelo_Cot_cotizacion->cot_listar($id);
    foreach ($res as $key) {

       $res[$i]->items = $this->Modelo_Cot_cotizacion->cot_listar_items($key->ide_cotizacion);
       $res[$i]->files = $this->Modelo_Cot_cotizacion->cot_listar_files($key->ide_cotizacion);
       $i++;
    }

    $this->output->set_content_type('application/json')
     ->set_output(json_encode( $res ));
  }

  public function seg_listar($id=null)
  {
    $i=0;
    $ide_vendedor = $this->input->post('ide_vendedor') != '' ? $this->input->post('ide_vendedor') : null;
    $fecha = $this->input->post('fecha') != '' ? $this->input->post('fecha') : Date('Y-m-d');
    $res = $this->Modelo_Cot_cotizacion->seg_listar_no_atendidos($id,$ide_vendedor,$fecha);
  //  print_r($res);
    $result = array();
   foreach ($res as $key => $v) {
         $res[$key]->segui = $this->Modelo_Cot_cotizacion->seg_cot_list_ultimo($v->ide_cotizacion);
      //   echo count($res[$key]->segui);
         if(count($res[$key]->segui)>0){
/*
           echo "CARAJO ".count($res[$key]->segui);
    //       print_r($res[$key]->segui);
    echo $fecha;
    echo substr($res[$key]->segui[0]->seg_pro_con_fecha,0,10);
         if ($fecha === substr($res[$key]->segui[0]->seg_pro_con_fecha,0,10)) {
           $result[$i] = $res[$key];
           $result[$i]->segui = $res[$key]->segui;
           $result[$i]->items = $this->Modelo_Cot_cotizacion->seg_listar_prosp($v->ide_cliente);

         } */

  $result[$i] = $res[$key];
  $result[$i]->segui = $res[$key]->segui;
  $result[$i]->items = $this->Modelo_Cot_cotizacion->seg_listar_prosp($v->ide_cliente);



         //print_r($result);
       }
                  $i++;
      }

//print_r($result);

    $this->output->set_content_type('application/json')
     ->set_output(json_encode( $result ));
  }


  public function seg_listar_acti($id=null)
  {
    $i=0;
    $ide_vendedor = $this->input->post('ide_vendedor') != '' ? $this->input->post('ide_vendedor') : null;



    if ($this->input->post('fecha') != '') {

      $a = date('Y-m-d', strtotime(substr($this->input->post('fecha'),0,10)));
      $b = date('Y-m-d', strtotime(substr($this->input->post('fecha'),18,10)));

      if ($a===$b) {
        $fecha= $a;
        $fecha2= null;
      } else {
        $fecha = $a;
        $fecha2 = $b;
      }


    } else {
      $fecha = Date('Y-m-d');
      $fecha2 =  null;
    }



    $res = $this->Modelo_Cot_cotizacion->seg_listar_acti($id,$ide_vendedor,$fecha, $fecha2);


    $result = array();
   foreach ($res as $key => $v) {
         $res[$key]->segui = $this->Modelo_Cot_cotizacion->seg_cot_list_ultimo($v->ide_cotizacion);
      //   echo count($res[$key]->segui);
         if(count($res[$key]->segui)>0){
        /*
                   echo "CARAJO ".count($res[$key]->segui);
            //       print_r($res[$key]->segui);
            echo $fecha;
            echo substr($res[$key]->segui[0]->seg_pro_con_fecha,0,10);
         if ($fecha === substr($res[$key]->segui[0]->seg_pro_con_fecha,0,10)) {
           $result[$i] = $res[$key];
           $result[$i]->segui = $res[$key]->segui;
           $result[$i]->items = $this->Modelo_Cot_cotizacion->seg_listar_prosp($v->ide_cliente);

         } */

        $result[$i] = $res[$key];
        $result[$i]->segui = $res[$key]->segui;
        $result[$i]->items = $this->Modelo_Cot_cotizacion->seg_listar_prosp($v->ide_cliente);




       }
                  $i++;
      }


    $this->output->set_content_type('application/json')
     ->set_output(json_encode( $result ));
  }












  public function ven_list($id=null)
  {

    $res = $this->Modelo_cot_vendedor->ven_list($id);
    $this->output->set_content_type('aplication/json')
    ->set_output(json_encode($res));
  }

  public function ven_ins()
  {
    $sess = $this->session->userdata('logged_in');

    $data = array(
      'ide_empresa' => $sess['ie'] ,
      'ven_nom' => $this->input->post('ven_nom'),
      'ven_ape_pat' => $this->input->post('ven_ape_pat'),
      'ven_ape_mat' => $this->input->post('ven_ape_mat'),
      'ven_doc' => $this->input->post('ven_doc'),
      'ven_dir' => $this->input->post('ven_dir'),
      'ven_ruc' => $this->input->post('ven_ruc'),
      'ven_tel1' => $this->input->post('ven_tel1'),
      'ven_tel2' => $this->input->post('ven_tel2'),
      'ven_tel3' => $this->input->post('ven_tel3'),
      'ven_email' => $this->input->post('ven_email'),
      'ven_gls' => $this->input->post('ven_gls'),
      'ven_fecha_nac' => $this->input->post('ven_fecha_nac') != '' ? $this->input->post('ven_fecha_nac') : Date('Y-m-d'),
      'ven_facebook' => $this->input->post('ven_facebook'),
      'ven_twitter' => $this->input->post('ven_twitter'),
    );

    $res = $this->Modelo_cot_vendedor->ven_ins($data);
    $this->output->set_content_type('aplication/json')
    ->set_output(json_encode($res));
  }

  public function ven_upd()
  {

    $data = array(
      'ven_nom' => $this->input->post('ven_nom'),
      'ven_ape_pat' => $this->input->post('ven_ape_pat'),
      'ven_ape_mat' => $this->input->post('ven_ape_mat'),
      'ven_doc' => $this->input->post('ven_doc'),
      'ven_dir' => $this->input->post('ven_dir'),
      'ven_ruc' => $this->input->post('ven_ruc'),
      'ven_tel1' => $this->input->post('ven_tel1'),
      'ven_tel2' => $this->input->post('ven_tel2'),
      'ven_tel3' => $this->input->post('ven_tel3'),
      'ven_email' => $this->input->post('ven_email'),
      'ven_gls' => $this->input->post('ven_gls'),
      'ven_fecha_nac' => $this->input->post('ven_fecha_nac') != '' ? $this->input->post('ven_fecha_nac') : Date('Y-m-d'),
      'ven_facebook' => $this->input->post('ven_facebook'),
      'ven_twitter' => $this->input->post('ven_twitter'),
    );

    $res = $this->Modelo_cot_vendedor->ven_upd($data);
    $this->output->set_content_type('aplication/json')
    ->set_output(json_encode($res));
  }

  public function ven_del()
  {
    $data = array(
      'is_active' => 0,
     );
    $res = $this->Modelo_cot_vendedor->ven_del($data);
    $this->output->set_content_type('aplication/json')
    ->set_output(json_encode($res));
  }








}
 ?>
