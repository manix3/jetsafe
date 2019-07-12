<?php /**
 *
 */
class Cot_cotizacion extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('coti/Modelo_Cot_cotizacion');

  }



  public function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');

      // $have_vis =   $this->Modelo_Cot_cotizacion->get_vis_cot();
      // if ($have_vis) {
      //   $this->load->view($have_vis[0]->ruta,$resultado);
      // } else {
      // }

      $this->load->view('coti/vista_semana_petrax',$resultado);
      
    }
    else
    {
      redirect('login', 'refresh');
    }
  }


  public function cot_busqueda()
  {
    if($this->session->userdata('logged_in'))
    {
        $resultado['sesion']=$this->session->userdata('logged_in');
        $this->load->view('coti/coti_vista_busqueda_petrax',$resultado);

    }
    else
    {
      redirect('login', 'refresh');
    }
  }


  public function cot_ver($id)
  {
    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $this->load->view('coti/coti_vista_det_cotizacion',$resultado);
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
    $res = $this->Modelo_Cot_cotizacion->seg_listar($id,$ide_vendedor,$fecha);
    $result = array();


   foreach ($res as $key => $v) {

          $res[$key]->segui = $this->Modelo_Cot_cotizacion->seg_cot_list_ultimo($v->ide_cotizacion);

         if(count($res[$key]->segui)>0){
               if ($fecha === substr($res[$key]->segui[0]->seg_pro_con_fecha,0,10)) {

                 $result[$i] = $res[$key];
                 $result[$i]->segui = $res[$key]->segui;
                 $result[$i]->items = $this->Modelo_Cot_cotizacion->seg_listar_prosp($v->ide_cliente);
                }

              if ($id) {
                $result[$i] = $res[$key];
                $result[$i]->segui = $res[$key]->segui;
                $result[$i]->items = $this->Modelo_Cot_cotizacion->seg_listar_prosp($v->ide_cliente);

              }

                 //print_r($result);
               } else {
                   $result[$i] = $res[$key];
                   $result[$i]->segui = $res[$key]->segui;
                   $result[$i]->items = $this->Modelo_Cot_cotizacion->seg_listar_prosp($v->ide_cliente);


               }
          $i++;
      }



    $this->output->set_content_type('application/json')
     ->set_output(json_encode( $result ));
  }



  public function seg_list_busqu($id=null)
  {
    $i=0;
    $ide_vendedor = $this->input->post('ide_vendedor') != '' ? $this->input->post('ide_vendedor') : null;
    $offset = $this->input->post('offset');
    $res = $this->Modelo_Cot_cotizacion->seg_list_busqu($id,$ide_vendedor,$offset);
    $result = array();


   foreach ($res as $key => $v) {

          $res[$key]->segui = $this->Modelo_Cot_cotizacion->seg_cot_list_ultimo($v->ide_cotizacion);
          $result[$i] = $res[$key];
          $result[$i]->segui = $res[$key]->segui;
          $result[$i]->items = $this->Modelo_Cot_cotizacion->seg_listar_prosp($v->ide_cliente);
          $i++;
      }



    $this->output->set_content_type('application/json')
     ->set_output(json_encode( $result ));
  }






  public function lis_coti_fact()
  {
    $res = $this->Modelo_Cot_cotizacion->lis_coti_fact();
    $this->output->set_content_type('application/json')
     ->set_output(json_encode( $res ));
  }

  public function cot_listar_pdf($id=null)
  {
    $i=0;
    $res = $this->Modelo_Cot_cotizacion->cot_listar($id);
    foreach ($res as $key) {

       $res[$i]->items = $this->Modelo_Cot_cotizacion->cot_listar_items($key->ide_cotizacion);
       $res[$i]->files = $this->Modelo_Cot_cotizacion->cot_listar_files($key->ide_cotizacion);
       $i++;
    }

    return $res;
  }

  public function get_company()
  {
    $res = $this->Modelo_Cot_cotizacion->get_company();
    $this->output->set_content_type('application/json')
     ->set_output(json_encode( $res ));
  }


  public function get_company_pdf()
  {
    $res = $this->Modelo_Cot_cotizacion->get_company();
    return $res;
  }


  public function cot_ins()
  {
    # code...
  }
  public function cot_upd()
  {
    # code...
  }
  public function cot_del()
  {
    $data = array(
      'is_active' => 0,
    );
    $res = $this->Modelo_Cot_cotizacion->cot_del($data);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }





/*NUEVA COTIZACION*/

public function nueva_cotizacion()
{
  if($this->session->userdata('logged_in'))
  {
    $resultado['sesion']=$this->session->userdata('logged_in');
    $resultado['pre']=   $this->Modelo_Cot_cotizacion->get_prefijo();

    $have_vis =   $this->Modelo_Cot_cotizacion->get_vis_cot(5);

    if ($have_vis) {
      $this->load->view($have_vis[0]->ruta,$resultado);
    } else {
      $this->load->view('coti/coti_nueva_cotizacion',$resultado);
    }



  }
  else
  {
    redirect('login', 'refresh');
  }
}




public function editar_coti($ide_coti)
{
  if($this->session->userdata('logged_in'))
  {
    $resultado['sesion']=$this->session->userdata('logged_in');
    $resultado['coti']=$this->Modelo_Cot_cotizacion->cot_listar($ide_coti);
    $this->load->view('coti/coti_edita_cotizacion',$resultado);
  }
  else
  {
    redirect('login', 'refresh');
  }
}





public function nueva_cotizacion_ins()
{
  $nro_files=0;
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];


    if ($this->input->post('coti[fecha_venciento]') != '') {
      $ven = $this->input->post('coti[fecha_venciento]');
    } else {
      $ven = date('Y-m-d');
    }

  $cot = array(
    'ide_est_cot' => $this->input->post('coti[ide_est_cot]'),
    'ide_usu' => $s_id,
    'prefijo' => $this->input->post('coti[prefijo]'),
    'serie' => $this->input->post('coti[serie]'),
    'numero' => $this->input->post('coti[numero]'),
    'fecha' => $this->input->post('coti[fecha]') != '' ? $this->input->post('coti[fecha]') : date('Y-m-d') ,
    'fecha_vencimiento' => $ven,
    'gls_cotizacion' => $this->input->post('coti[gls_cotizacion]'),
    'ide_tip_mon' => $this->input->post('coti[ide_tip_mon]'),
    'subtotal' => $this->input->post('_subTotal'),
    'descuento' => $this->input->post('_descuento'),
    'igv' => $this->input->post('_igv'),
    'total' => $this->input->post('_total'),
    'ide_empresa' => $s_ie,
    'ide_periodo' => 1,
    'ide_trabajador' => 1,//$this->input->post(''),
    'cli_nombre' => $this->input->post('cliente[nombre_destino]'),
    'cli_direccion' => $this->input->post('cliente[cli_dir]'),
    'cli_ruc' => $this->input->post('cliente[cli_ruc]'),
  );
  ///print_r($cot);
  $id_cot = $this->Modelo_Cot_cotizacion->cot_ins($cot);
  if ($id_cot) {
    $prod = $this->input->post('productos');
    $cli= $this->input->post('cliente');
    $a = $this->input->post('files');
    $files =array();
    $clie['ide_cotizacion'] = $id_cot;
    $clie['ide_empresa'] = $s_ie;
    $clie['email_destino'] = $cli['email_destino'];
    $clie['nombre_destino'] = $cli['nombre_destino'];
    $clie['telefono_destino'] = $cli['telefono_destino'];


    for ($i=0; $i < count($prod) ; $i++) {
      $prod[$i]['ide_cotizacion'] = $id_cot;
    }

    if ($a) {
    for ($i=0; $i < count($a) ; $i++) {
      $nro_files++;
      $files[$i]['ide_cotizacion'] = $id_cot;
      $files[$i]['ide_archivo'] = $a[$i];
    }
    $res['files'] = $this->Modelo_Cot_cotizacion->list_files_ins($files);
  }


    $res['producto'] = $this->Modelo_Cot_cotizacion->list_prod_ins($prod);
    $res['cliente_destino'] = $this->Modelo_Cot_cotizacion->list_destino_ins($clie);
    $res['ide_cot'] = $id_cot;
    if($nro_files>0) {
    $res['files'] = $this->Modelo_Cot_cotizacion->list_files_ins($files);
    }

  }


  $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));


}



public function nueva_cotizacion_ins_petrax()
{
  $nro_files=0;
  $sess=$this->session->userdata('logged_in');
  $s_ni=$sess['nivel'];
  $s_ie=$sess['ie'];
  $s_id=$sess['id'];


    if ($this->input->post('coti[fecha_venciento]') != '') {
      $ven = $this->input->post('coti[fecha_venciento]');
    } else {
      $ven = date('Y-m-d');
    }

  $cot = array(
    'ide_usu' => $s_id,
    'ide_tip_mon' => $this->input->post('coti[ide_tip_mon]'),
    'subtotal' => $this->input->post('_subTotal'),
    'descuento' => $this->input->post('_descuento'),
    'igv' => $this->input->post('_igv'),
    'total' => $this->input->post('_total'),
    'ide_empresa' => $s_ie,
    'cli_nombre' => $this->input->post('cliente[nombre_destino]'),
    'cli_direccion' => $this->input->post('cliente[cli_dir]'),
    'cli_ruc' => $this->input->post('cliente[cli_ruc]'),
    'ide_cli' => $this->input->post('cliente[cli_id]'),

    'con_nom' => $this->input->post('coti[0][inp_nom_con]'),
    'con_fun' => $this->input->post('coti[0][inp_fun_con]'),
    'con_tel1' => $this->input->post('coti[0][inp_tel_con1]'),
    'con_tel2' => $this->input->post('coti[0][inp_tel_con2]'),
    'con_email' => $this->input->post('coti[0][inp_ema_con]'),
    'ide_tip_mon' => 10,
    'ide_ori_cot' => $this->input->post('coti[0][ide_ori_cot]'),
    'ide_est_cot' => $this->input->post('coti[0][est_coti]'),
    'ide_vendedor' => $this->input->post('vendedor[0][ide_vendedor]'),
    'ide_tip_cot' => 2,
    'ide_periodo' => 1,
    'ide_trabajador' => 1,
  );


  $id_cot = $this->Modelo_Cot_cotizacion->cot_ins($cot);
  $this->output->set_content_type('application/json')
   ->set_output(json_encode( $id_cot ));


}







public function imp_reg($id,$pr=null)
{
    $res = $this->cot_listar_pdf($id);
    $res2 = $this->get_company_pdf();


   //print_r($res);


    $this->load->library('pdf');
    // agregar una pagina
    $this->pdf->AddPage();
    $this->pdf->Image(base_url().'img/empresas/'.$res2[0]->img,20,20,50);
    $this->pdf->Header("COTIZACION");

    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();

    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */


    $this->pdf->SetTitle("Detalle de Cotizacion");
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(200,200,200);

    // Se define el formato de fuente: Arial, negritas, tamaño 9
    $this->pdf->SetFont('Arial', 'B', 9);
    /*
     * TITULOS DE COLUMNAS
     *
     * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
     */


     $this->pdf->SetFont('Arial', 'B', 13);
     $this->pdf->Cell(0,7,'Fecha: '.$res[0]->fecha.'','',1,'R');
     $this->pdf->Ln(7);


     $this->pdf->SetFont('Arial', 'B', 10);
     $this->pdf->Cell(90,7,'Informacion del Cliente','',0,'L');
     $this->pdf->Cell(90,7,'Informacion de la Empresa','',0,'R');
     $this->pdf->Ln(7);

     $datos = ['Nombre:','Telefono:','Email:'];
     $datos1 = [utf8_decode($res[0]->nombre_destino),$res[0]->telefono_destino,$res[0]->email_destino];

     $datos2 = ['Nombre:','Ruc:','Correo:'];
     $datos3 = [$res2[0]->emp_nombre,$res2[0]->emp_ruc,$res2[0]->correo_empresa];


     for ($i=0; $i < 3; $i++) {
      //$this->pdf->SetFont('Arial', 'B', 9);
      //$this->pdf->Cell(30,7,$datos[$i],'',0,'L','0');
      $this->pdf->SetFont('Arial', '', 9);
      $this->pdf->Cell(60,5,$datos1[$i],'',0,'L');
      //$this->pdf->SetFont('Arial', 'B', 9);
      $this->pdf->Cell(60,5,'',0,'L','0');
      $this->pdf->SetFont('Arial', '', 9);
      $this->pdf->Cell(60,5,$datos3[$i],'',0,'R');
      $this->pdf->Ln(5);
     }

    $this->pdf->Ln(10);
    $this->pdf->SetFont('Arial', 'B', 13);
    $this->pdf->Cell(180,7,'Productos','TBLR',0,'C','1');
    $this->pdf->Ln(7);

    $this->pdf->SetFont('Arial', 'B', 9);
    //$this->pdf->SetTextColor(255, 255, 255);

    $this->pdf->Cell(5,7,'#','BLR',0,'C',1);
    $this->pdf->Cell(50,7,'Producto','BLR',0,'L',1);
    $this->pdf->Cell(60,7,'Descripcion','BLR',0,'L',1);
    $this->pdf->Cell(21,7,'Cantidad','BLR',0,'C',1);
    $this->pdf->Cell(22,7,'Pr. Lista','BLR',0,'C',1);
    $this->pdf->Cell(22,7,'Total','BLR',1,'C',1);


    $this->pdf->SetFont('Arial', 'B', 9);
      $i= 0;
      foreach ($res[0]->items as $serv) {
        $this->pdf->Cell(5,7,$i+1,'BLR',0,'C');
        $this->pdf->Cell(50,7,utf8_decode($serv->nom_com_prod),'BLR',0,'L');
        $this->pdf->Cell(60,7,utf8_decode($serv->nom_prod),'BLR',0,'L');
        $this->pdf->Cell(21,7,$serv->cot_cantidad,'BLR',0,'C');
        $this->pdf->Cell(22,7,$res[0]->sim_moneda.' '.number_format($serv->precio_prod, 2),'BLR',0,'C');
        $this->pdf->Cell(22,7,$res[0]->sim_moneda.' '.number_format($serv->cot_precio, 2),'BLR',1,'C');
        $i++;
      }
      $this->pdf->Cell(180,0,'','TB',1,'L');


      $this->pdf->Cell(0,7,'Subtotal: '.$res[0]->sim_moneda.' '.number_format($res[0]->subtotal,2).'       ','TLR',1,'R',1);
      $this->pdf->Cell(0,7,'Igv(18%): '.$res[0]->sim_moneda.' '.number_format($res[0]->igv,2).'       ','LR',1,'R',1);
      $this->pdf->Cell(0,7,'Total:    '.$res[0]->sim_moneda.' '.number_format($res[0]->total,2).'       ','LR',1,'R',1);

      $this->pdf->Cell(180,0,'','TB',1,'L');
$this->pdf->Cell(180,7,utf8_decode($res[0]->gls_cotizacion),'',0,'L');

    //
    // if ($pr) {
    //   $this->pdf->Ln(10);
    //   $this->pdf->SetFont('Arial', 'B', 13);
    //   $this->pdf->Cell(180,7,'Facturado','TBLR',0,'C');
    //   $this->pdf->Ln(7);
    //
    //   $fac= ['Precio Lista','Precio Final'];
    //   $fac1= [$res->servicio[0]->otr_precio_lista,$res->servicio[0]->otr_precio_final];
    //
    //
    //   for ($i=0; $i < 2; $i++) {
    //    $this->pdf->SetFont('Arial', 'B', 9);
    //    $this->pdf->Cell(30,7,trim($fac[$i]),'TBLR',0,'C','1');
    //    $this->pdf->SetFont('Arial', '', 9);
    //    $this->pdf->Cell(150,7,trim($fac1[$i]),'TBR',0,'C');
    //    $this->pdf->Ln(7);
    //   }
    //
    // }


   $this->pdf->Output("Detalle de Cotizacion.pdf", 'I');
}



public function cot_seg_upd()
{
  $data = array(
    'ide_vendedor' => $this->input->post('vendedor'),
  );
  $res = $this->Modelo_Cot_cotizacion->cot_seg_upd($data);
  $this->output->set_content_type('application/json')
 ->set_output(json_encode( $res ));
}

public function cot_act_est()
{
  $data = array(
    'ide_est_cot' => $this->input->post('est'),
  );
  $res = $this->Modelo_Cot_cotizacion->cot_upd($data);
  $this->output->set_content_type('application/json')
 ->set_output(json_encode( $res ));
}




public function seg_cot_list($id)
{
  $res = $this->Modelo_Cot_cotizacion->seg_cot_list($id);
  $this->output->set_content_type('application/json')
 ->set_output(json_encode( $res ));
}

public function seg_cot_list_ptrx($id)
{
  $res = $this->Modelo_Cot_cotizacion->seg_cot_list_ptrx($id);
  $this->output->set_content_type('application/json')
 ->set_output(json_encode( $res ));
}


public function seg_cot_ins()
{

  if ($this->input->post('inp_text10')  != '') {
    $data = array(
      'ide_cotizacion' => $this->input->post('inp_text1'),
      'seg_titulo' => $this->input->post('inp_text2'),
      'seg_est' => $this->input->post('inp_text3'),
      'seg_fecha' => $this->input->post('inp_text4'),
      'seg_detalle' => $this->input->post('inp_text5'),

      'seg_pro_con_fecha' => Date('Y-m-d H:m:s', strtotime($this->input->post('inp_text10'))),
      'ide_seg_tip_con' => $this->input->post('inp_text11'),
      'ide_prox_seg_tip_con' => $this->input->post('inp_text12'),
      'ide_prioridad' => $this->input->post('inp_text13'),
      'seg_rec_min' => $this->input->post('inp_text14'),
     );



  } else {
    $data = array(
      'ide_cotizacion' => $this->input->post('inp_text1'),
      'seg_titulo' => $this->input->post('inp_text2'),
      'seg_est' => $this->input->post('inp_text3'),
      'seg_fecha' => $this->input->post('inp_text4'),
      'seg_detalle' => $this->input->post('inp_text5'),
     );
  }
  $data1 = array(
    'con_nom' => $this->input->post('inp_nom_con'),
    'con_fun' => $this->input->post('inp_fun_con'),
    'con_tel1' => $this->input->post('inp_tel_con1'),
    'con_email' => $this->input->post('inp_ema_con'),
    );

$res2 = $this->Modelo_Cot_cotizacion->seg_upd_con($data1,$this->input->post('inp_text1'));

   $res = $this->Modelo_Cot_cotizacion->seg_cot_ins($data);
   $this->output->set_content_type('application/json')
  ->set_output(json_encode( $res ));

}


public function cot_seg_del()
{
  $res = $this->Modelo_Cot_cotizacion->cot_seg_del();
  $this->output->set_content_type('application/json')
 ->set_output(json_encode( $res ));
}


public function get_week($fecha=null)
{

  $res  = array();

  $meses = array(
    '01' => 'Enero',
    '02' => 'Febrero',
    '03' => 'Marzo',
    '04' => 'Abril',
    '05' => 'Mayo',
    '06' => 'Junio',
    '07' => 'Julio',
    '08' => 'Agosto',
    '09' => 'Septiembre',
    '10' => 'Octubre',
    '11' => 'Noviembre',
    '12' => 'Diciembre',
   );

   $date = $fecha != null ? $fecha : Date('y-m-d') ;

   $date2 = strtotime($date);
   $fec = new DateTime($date);

   $res['mes'] =  array(
     'n_mes' => $fec->format('m'),
     'nombre' => $meses[$fec->format('m')],
   );

   $res['n_semana'] =  $fec->format('W');


  $inicio0 = strtotime('sunday this week -1 week', $date2);
  $inicio=date('Y-m-d', $inicio0);
  $hoy =  Date('Y-m-d');

  for($i=1;$i<=7;$i++){

      $res['semana'][$i] = array(
        'dia' => date("d", strtotime("$inicio +$i day")),
        'mes' => date("m", strtotime("$inicio +$i day")),
        'year' => date("Y", strtotime("$inicio +$i day")),
        'fullDate' => date("Y-m-d", strtotime("$inicio +$i day")),
        'hoy' => $hoy === date("Y-m-d", strtotime("$inicio +$i day")) ? 'toDay' : '',
       );
  }


    $res['next'] = date("Y-m-d", strtotime("$inicio +8 day"));
    $res['prev'] = date("Y-m-d", strtotime("$inicio"));


    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
}

public function get_ori_estado($ide = null)
  {
    $res = $this->Modelo_Cot_cotizacion->get_ori_estado($ide);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }



  public function tip_cont($ide = null)
  {
    $res = $this->Modelo_Cot_cotizacion->tip_cont($ide);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }


  public function get_prior($ide = null)
  {
    $res = $this->Modelo_Cot_cotizacion->get_prior($ide);
    $this->output->set_content_type('application/json')
   ->set_output(json_encode( $res ));
  }





}


 ?>
