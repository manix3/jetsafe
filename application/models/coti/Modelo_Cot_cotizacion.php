<?php /**
 *
 */
class Modelo_Cot_cotizacion extends CI_Model
{

  public function cot_listar($id)
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];

    if ($id != null) {
    $this->db->where('tp_cotizacion.ide_cotizacion',$id);
    }
     $this->db->where('tp_cotizacion.ide_empresa',$s_ie);
     $this->db->where('tp_cotizacion.is_active',1);
     $this->db->select('*');
     $this->db->from('ventas.tp_cotizacion');
     $this->db->join('ventas.ts_estado_cotizacion','tp_cotizacion.ide_est_cot = ts_estado_cotizacion.ide_est_cot');
     $this->db->join('ventas.ts_tipo_moneda','tp_cotizacion.ide_tip_mon = ts_tipo_moneda.ide_tip_mon');
     $this->db->join('ventas.tp_destino_cotizacion','tp_cotizacion.ide_cotizacion = tp_destino_cotizacion.ide_cotizacion');
     $res = $this->db->get();

     if ($res) {
       return  $res->result();
     }else {
       return false;
     }
  }

    public function seg_listar($id, $ide_vendedor, $fecha)
    {
      $sess=$this->session->userdata('logged_in');
      $s_ni=$sess['nivel'];
      $s_ie=$sess['ie'];
      $s_id=$sess['id'];
      $condicion1=' ';
      $condicion2=' ';
      $condicion3=' ';

          if ($id != null) {
              $condicion1=" and tp_cotizacion.ide_cotizacion=$id ";
          }


          if ($ide_vendedor != null) {
              $condicion2 = "and tp_cotizacion.ide_vendedor=$ide_vendedor";
          }

          if ($fecha != null) {
              $condicion3 = "and tp_cotizacion.ide_vendedor=$ide_vendedor";
          }

        $sql="SELECT
        tp_cotizacion.ide_cotizacion,
        tp_cotizacion.con_fun,
        tp_cotizacion.con_nom,
        tp_cotizacion.con_tel1,
        tp_cotizacion.con_tel2,
        tp_cotizacion.con_email,
        tp_cotizacion.ide_ori_cot,
        tp_cotizacion.ide_tip_cot,
        tp_cotizacion.ide_vendedor,
        tp_clientes.ide_empresa,
        tp_clientes.ide_cliente,
        tp_clientes.cli_ape_pat,
        tp_clientes.cli_ape_mat,
        tp_clientes.cli_nom,
        coalesce(  tp_clientes.cli_nom,'')||' '||coalesce(tp_clientes.cli_ape_pat,'')||' '||coalesce(tp_clientes.cli_ape_mat,'') as nombrecompleto,
        tp_clientes.cli_doc,
        tp_clientes.cli_dir,
        tp_clientes.cli_ruc,
        tp_clientes.cli_tel1,
        tp_clientes.cli_tel2,
        tp_clientes.cli_tel3,
        tp_clientes.cli_email,
        tp_clientes.cli_gls,
        ts_ori_cot.detalle_ori_cot,
        tp_vendedor.ide_empresa,
        tp_vendedor.ven_nom,
        tp_vendedor.ven_ape_pat,
        tp_vendedor.ven_ape_mat,
        tp_vendedor.ven_doc,
        ts_prioridad_seg.detalle_prioridad
      FROM
        ventas.tp_cotizacion,
        public.tp_clientes,
        ventas.ts_ori_cot,
        ventas.tp_vendedor,
        ventas.ts_prioridad_seg
      WHERE
      ts_prioridad_seg.ide_prioridad=tp_cotizacion.ide_prioridad AND
      tp_cotizacion.ide_tip_cot=2 AND
        tp_cotizacion.ide_ori_cot = ts_ori_cot.ide_ori_cot AND
        tp_cotizacion.ide_vendedor = tp_vendedor.ide_vendedor AND
        tp_clientes.ide_cliente = tp_cotizacion.ide_cli AND tp_cotizacion.ide_empresa=$s_ie $condicion1 $condicion2 limit 500";
        //echo $sql;
        $res = $this->db->query($sql);

       if ($res) {
         return  $res->result();
       }else {
         return false;
       }
    }

    public function seg_list_busqu($id, $ide_vendedor, $offset)
    {
      $sess=$this->session->userdata('logged_in');
      $s_ni=$sess['nivel'];
      $s_ie=$sess['ie'];
      $s_id=$sess['id'];
      $condicion1=' ';
      $condicion2=' ';
      $condicion3=' ';

          if ($id != null) {
              $condicion1=" and tp_cotizacion.ide_cotizacion=$id ";
          }


          if ($ide_vendedor != null) {
              $condicion2 = "and tp_cotizacion.ide_vendedor=$ide_vendedor";
          }

        $sql="SELECT
        tp_cotizacion.ide_cotizacion,
        tp_cotizacion.con_fun,
        tp_cotizacion.con_nom,
        tp_cotizacion.con_tel1,
        tp_cotizacion.con_tel2,
        tp_cotizacion.con_email,
        tp_cotizacion.ide_ori_cot,
        tp_cotizacion.ide_tip_cot,
        tp_cotizacion.ide_vendedor,
        tp_clientes.ide_empresa,
        tp_clientes.ide_cliente,
        tp_clientes.cli_ape_pat,
        tp_clientes.cli_ape_mat,
        tp_clientes.cli_nom,
        coalesce(  tp_clientes.cli_nom,'')||' '||coalesce(tp_clientes.cli_ape_pat,'')||' '||coalesce(tp_clientes.cli_ape_mat,'') as nombrecompleto,
        tp_clientes.cli_doc,
        tp_clientes.cli_dir,
        tp_clientes.cli_ruc,
        tp_clientes.cli_tel1,
        tp_clientes.cli_tel2,
        tp_clientes.cli_tel3,
        tp_clientes.cli_email,
        tp_clientes.cli_gls,
        ts_ori_cot.detalle_ori_cot,
        tp_vendedor.ide_empresa,
        tp_vendedor.ven_nom,
        tp_vendedor.ven_ape_pat,
        tp_vendedor.ven_ape_mat,
        tp_vendedor.ven_doc,
        ts_prioridad_seg.detalle_prioridad
      FROM
        ventas.tp_cotizacion,
        public.tp_clientes,
        ventas.ts_ori_cot,
        ventas.tp_vendedor,
        ventas.ts_prioridad_seg
      WHERE
      ts_prioridad_seg.ide_prioridad=tp_cotizacion.ide_prioridad AND
      tp_cotizacion.ide_tip_cot=2 AND
        tp_cotizacion.ide_ori_cot = ts_ori_cot.ide_ori_cot AND
        tp_cotizacion.ide_vendedor = tp_vendedor.ide_vendedor AND
        tp_clientes.ide_cliente = tp_cotizacion.ide_cli AND tp_cotizacion.ide_empresa=$s_ie $condicion1 $condicion2   ";
                //echo $sql;
        $res = $this->db->query($sql);

       if ($res) {
         return  $res->result();
       }else {
         return false;
       }
    }


    public function seg_listar_no_atendidos($id, $ide_vendedor, $fecha)
    {
        $hoy = date("Y-m-d");

      $sess=$this->session->userdata('logged_in');
      $s_ni=$sess['nivel'];
      $s_ie=$sess['ie'];
      $s_id=$sess['id'];
      $condicion1=' ';
      $condicion2=' ';
      $condicion3=' ';

          if ($id != null) {
              $condicion1=" and tp_cotizacion.ide_cotizacion=$id ";
          }


          if ($ide_vendedor != null) {
              $condicion2 = "and tp_cotizacion.ide_vendedor=$ide_vendedor";
          }

          if ($fecha != null) {
              $condicion3 = "and tp_cotizacion.ide_vendedor=$ide_vendedor";
          }


        $sql="SELECT
        tp_cotizacion.ide_cotizacion,
        tp_cotizacion.con_fun,
        tp_cotizacion.con_nom,
        tp_cotizacion.con_tel1,
        tp_cotizacion.con_tel2,
        tp_cotizacion.con_email,
        tp_cotizacion.ide_ori_cot,
        tp_cotizacion.ide_tip_cot,
        tp_cotizacion.ide_vendedor,
        tp_clientes.ide_empresa,
        tp_clientes.ide_cliente,
        tp_clientes.cli_ape_pat,
        tp_clientes.cli_ape_mat,
        tp_clientes.cli_nom,
        coalesce(  tp_clientes.cli_nom,'')||' '||coalesce(tp_clientes.cli_ape_pat,'')||' '||coalesce(tp_clientes.cli_ape_mat,'') as nombrecompleto,
        tp_clientes.cli_doc,
        tp_clientes.cli_dir,
        tp_clientes.cli_ruc,
        tp_clientes.cli_tel1,
        tp_clientes.cli_tel2,
        tp_clientes.cli_tel3,
        tp_clientes.cli_email,
        tp_clientes.cli_gls,
        ts_ori_cot.detalle_ori_cot,
        tp_vendedor.ide_empresa,
        tp_vendedor.ven_nom,
        tp_vendedor.ven_ape_pat,
        tp_vendedor.ven_ape_mat,
        tp_vendedor.ven_doc,
        ts_prioridad_seg.detalle_prioridad,
        vis_seg_por_atender.max,
        vis_seg_por_atender.ide_cotizacion,
        vis_seg_por_atender.ide_cli,
        vis_seg_por_atender.seg_est2
      FROM
        ventas.tp_cotizacion,
        public.tp_clientes,
        ventas.ts_ori_cot,
        ventas.tp_vendedor,
        ventas.ts_prioridad_seg,
        ventas.vis_seg_por_atender
      WHERE
      vis_seg_por_atender.max<'$hoy' AND
      vis_seg_por_atender.ide_cotizacion = tp_cotizacion.ide_cotizacion  AND
      ts_prioridad_seg.ide_prioridad=tp_cotizacion.ide_prioridad AND
      tp_cotizacion.ide_tip_cot=2 AND
        tp_cotizacion.ide_ori_cot = ts_ori_cot.ide_ori_cot AND
        tp_cotizacion.ide_vendedor = tp_vendedor.ide_vendedor AND
        tp_clientes.ide_cliente = tp_cotizacion.ide_cli AND tp_cotizacion.ide_empresa=$s_ie $condicion1 $condicion2;";
        //echo $sql;
        $res = $this->db->query($sql);

       if ($res) {
         return  $res->result();
       }else {
         return false;
       }
    }


    public function seg_listar_acti($id, $ide_vendedor, $fecha1, $fecha2=null)
    {
      $hoy = date("Y-m-d");

      $sess=$this->session->userdata('logged_in');
      $s_ni=$sess['nivel'];
      $s_ie=$sess['ie'];
      $s_id=$sess['id'];
      $condicion1=' ';
      $condicion2=' ';
      $condicion3=' ';

          if ($id != null) {
              $condicion1=" and tp_cotizacion.ide_cotizacion=$id ";
          }


          if ($ide_vendedor != null) {
              $condicion2 = "and tp_cotizacion.ide_vendedor=$ide_vendedor";
          }

          if ($fecha1 != null) {
              $condicion3 = "and  tp_cotizacion_seguimiento.seg_fecha='$fecha1'";
          }

          if ($fecha2 != null) {
              $condicion3 = "and  tp_cotizacion_seguimiento.seg_fecha BETWEEN '$fecha1' AND '$fecha2'";
          }


        $sql="SELECT
        tp_cotizacion.ide_cotizacion,
        tp_cotizacion.con_fun,
        tp_cotizacion.con_nom,
        tp_cotizacion.con_tel1,
        tp_cotizacion.con_tel2,
        tp_cotizacion.con_email,
        tp_cotizacion.ide_ori_cot,
        tp_cotizacion.ide_tip_cot,
        tp_cotizacion.ide_vendedor,
        tp_clientes.ide_empresa,
        tp_clientes.ide_cliente,
        tp_clientes.cli_ape_pat,
        tp_clientes.cli_ape_mat,
        tp_clientes.cli_nom,
        coalesce(  tp_clientes.cli_nom,'')||' '||coalesce(tp_clientes.cli_ape_pat,'')||' '||coalesce(tp_clientes.cli_ape_mat,'') as nombrecompleto,
        tp_clientes.cli_doc,
        tp_clientes.cli_dir,
        tp_clientes.cli_ruc,
        tp_clientes.cli_tel1,
        tp_clientes.cli_tel2,
        tp_clientes.cli_tel3,
        tp_clientes.cli_email,
        tp_clientes.cli_gls,
        ts_ori_cot.detalle_ori_cot,
        tp_vendedor.ide_empresa,
        tp_vendedor.ven_nom,
        tp_vendedor.ven_ape_pat,
        tp_vendedor.ven_ape_mat,
        tp_vendedor.ven_doc,
        ts_prioridad_seg.detalle_prioridad,
        tp_cotizacion_seguimiento.seg_titulo,
        tp_cotizacion_seguimiento.seg_detalle,
        tp_cotizacion_seguimiento.seg_est,
         tp_cotizacion_seguimiento.seg_fecha,
         tp_cotizacion_seguimiento.seg_pro_con_fecha

      FROM
        ventas.tp_cotizacion,
        public.tp_clientes,
        ventas.ts_ori_cot,
        ventas.tp_vendedor,
        ventas.ts_prioridad_seg,
        ventas.tp_cotizacion_seguimiento
      WHERE
        tp_cotizacion_seguimiento.ide_cotizacion=tp_cotizacion.ide_cotizacion AND

        ts_prioridad_seg.ide_prioridad=tp_cotizacion.ide_prioridad AND
        tp_cotizacion.ide_tip_cot=2 AND
        tp_cotizacion.ide_ori_cot = ts_ori_cot.ide_ori_cot AND
        tp_cotizacion.ide_vendedor = tp_vendedor.ide_vendedor AND
        tp_clientes.ide_cliente = tp_cotizacion.ide_cli AND tp_cotizacion.ide_empresa=$s_ie $condicion1 $condicion2 $condicion3;";
        //echo $sql;
        $res = $this->db->query($sql);

       if ($res) {
         return  $res->result();
       }else {
         return false;
       }
    }



  public function seg_listar_prosp($id)
  {

    $sql="SELECT  avg(total) as promedio,sum(total) as suma,count(total) as nromeses  FROM ventas.tp_pros_venta where ide_cli=$id;";
      $res = $this->db->query($sql);
    if ($res) {
      return  $res->result();
    }else {
      return [];
    }
  }

  public function lis_coti_fact()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];


    $sql = "select  tp_cotizacion.ide_cotizacion , tp_destino_cotizacion.nombre_destino || ' ( ' || ts_tipo_moneda.sim_moneda ||' '|| tp_cotizacion.total || ')'  as coti from ventas.tp_cotizacion INNER JOIN ventas.tp_destino_cotizacion ON (tp_cotizacion.ide_cotizacion = tp_destino_cotizacion.ide_cotizacion) INNER JOIN  ventas.ts_tipo_moneda ON (tp_cotizacion.ide_tip_mon = ts_tipo_moneda.ide_tip_mon) WHERE tp_cotizacion.ide_empresa = $s_ie AND tp_cotizacion.is_active = 1 ";
    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }

  public function get_prefijo()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];

    $sql = "select ide_cotizacion, prefijo, serie, numero from ventas.tp_cotizacion where ide_empresa= $s_ie order by ide_cotizacion DESC limit 1";
    $res = $this->db->query($sql);
    if ($res->num_rows() == 1) {
      return  $res->result();
    } else {
      return false;
    }

  }

  public function cot_listar_items($id)
  {
    $this->db->where('tp_cotizacion_items.ide_cotizacion',$id);
    $this->db->select('*');
    $this->db->from('ventas.tp_cotizacion_items');
    $this->db->join('public.tp_productos','tp_cotizacion_items.ide_producto = tp_productos.ide_producto');
    $res = $this->db->get();
    if ($res) {
      return  $res->result();
    }else {
      return [];
    }
  }

  public function cot_listar_files($id)
  {
    $this->db->where('tp_archivos_cotizacion.ide_cotizacion',$id);
    $this->db->select('*');
    $this->db->from('ventas.tp_archivos_cotizacion');
    $this->db->join('public.tp_productos_files','tp_archivos_cotizacion.ide_archivo = tp_productos_files.ide_prod_files');
    $res = $this->db->get();
    if ($res) {
      return  $res->result();
    }else {
      return [];
    }
  }

  public function get_company()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];

    $res = $this->db->get_where('public.tp_empresa',array('ide_empresa' => $s_ie));
    if ($res) {
      return  $res->result();
    }else {
      return false;
    }
  }





  public function cot_ins($datos)
  {
    $res = $this->db->insert('ventas.tp_cotizacion',$datos);
    if ($res) {
      return $this->db->insert_id();
    }else {
      return false;
    }
  }


  public function cot_upd_fac($datos)
  {
           $this->db->where('ide_cotizacion', $this->input->post('ide_cotizacion'));
    $res = $this->db->update('ventas.tp_cotizacion',$datos);
    if ($res) {
      return true;
    }else {
      return false;
    }
  }

  public function list_prod_ins($prod)
  {
    $res = $this->db->insert_batch('ventas.tp_cotizacion_items',$prod);
    if ($res) {
      return $this->db->insert_id();
    }else {
      return false;
    }
  }


  public function list_prod_upd($prod)
  {
    $this->db->where('ide_cotizacion', $this->input->post('ide_cotizacion'));
    $this->db->delete('ventas.tp_cotizacion_items');

    $res = $this->db->insert_batch('ventas.tp_cotizacion_items',$prod);
    if ($res) {
      return $this->db->insert_id();
    }else {
      return false;
    }
  }

  public function list_files_ins($files)
  {
    $res = $this->db->insert_batch('ventas.tp_archivos_cotizacion',$files);
    if ($res) {
      return $this->db->insert_id();
    }else {
      return false;
    }
  }

  public function list_files_upd($files)
  {
    $this->db->where('ide_cotizacion', $this->input->post('ide_cotizacion'));
    $this->db->delete('ventas.tp_archivos_cotizacion');

    $res = $this->db->insert_batch('ventas.tp_archivos_cotizacion',$files);
    if ($res) {
      return $this->db->insert_id();
    }else {
      return false;
    }
  }


  public function list_destino_ins($cli)
  {
    $res = $this->db->insert('ventas.tp_destino_cotizacion',$cli);
    if ($res) {
      return $this->db->insert_id();
    }else {
      return false;
    }
  }

  public function cot_seg_upd($datos)
  {
    $this->db->where('tp_cotizacion.ide_cotizacion',$this->input->post('inp_text1'));
    if ($this->db->update('ventas.tp_cotizacion',$datos)) {
      return true;
    }else {
      return false;
    }
  }

  public function cot_upd($datos)
  {
    $this->db->where('tp_cotizacion.ide_cotizacion',$this->input->post('ide_cot'));
    if ($this->db->update('ventas.tp_cotizacion',$datos)) {
      return true;
    }else {
      return false;
    }
  }


  public function cot_del($datos)
  {
    $this->db->where('tp_cotizacion.ide_cotizacion',$this->input->post('ide_cot'));
    if ($this->db->update('ventas.tp_cotizacion',$datos)) {

      return true;
    }else {

      return false;
    }
  }


  public function seg_cot_list($id)
  {
    $res = $this->db->get_where('ventas.tp_cotizacion_seguimiento',array('ide_cotizacion' => $id ));
    if ($res) {
      return $res->result();
    }else {
      return false;
    }
  }

  public function seg_cot_list_ptrx($id)
  {
    // $res = $this->db->get_where('ventas.tp_cotizacion_seguimiento',array('ide_cotizacion' => $id ));

    $res = $this->db->select('*')->from('ventas.tp_cotizacion_seguimiento')->where(array('ide_cotizacion' => $id ))->join('ventas.ts_seg_tip_contacto',' tp_cotizacion_seguimiento.ide_seg_tip_con = ts_seg_tip_contacto.ide_seg_tip_con')->get();
    if ($res) {
      return $res->result();
    }else {
      return false;
    }
  }


  public function seg_cot_list_ultimo($id)
  {
    $sql = "select * from ventas.tp_cotizacion_seguimiento where ide_cotizacion=$id order by  ide_seg_cot DESC limit 1";
    $res = $this->db->query($sql);

    if ($res) {
      return $res->result();
    }else {
      return [];
    }
  }
  public function seg_upd_con($datos,$idecoti)
  {
           $this->db->where('ide_cotizacion',$idecoti);
    $res = $this->db->update('ventas.tp_cotizacion',$datos);
    if ($res) {
      return true;
    }else {
      return false;
    }
  }


  public function seg_cot_ins($datos)
  {
    $sqlx="update ventas.tp_cotizacion_seguimiento set seg_est2=1,ide_prioridad=".$this->input->post('inp_text13')." where ide_cotizacion=".$this->input->post('inp_text1');

          $resx = $this->db->query($sqlx);

          $sqlxx="update ventas.tp_cotizacion set ide_prioridad=".$this->input->post('inp_text13')." where ide_cotizacion=".$this->input->post('inp_text1');

                $resxx = $this->db->query($sqlxx);

    $res = $this->db->insert('ventas.tp_cotizacion_seguimiento',$datos);
    if ($res) {
      return true;
    }else {
      return false;
    }
  }


  public function get_vis_cot($id=null)
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];

    if ($id != null) {
      $this->db->where('ide_seccion', $id);
    }

    $res = $this->db->get_where('ventas.tp_form_pers',array('is_active' => 1, 'ide_empresa' => $s_ie ));

    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }


  public function get_ori_estado($id)
   {
     if ($id != null) {
       $this->db->where('ide_ori_cot', $id);
     }
     $res = $this->db->get('ventas.ts_ori_cot');
     if ($res) {
       return $res->result();
     } else {
       return false;
     }
   }

  public function tip_cont($id)
   {
     if ($id != null) {
       $this->db->where('ide_seg_tip_con', $id);
     }
     $res = $this->db->get('ventas.ts_seg_tip_contacto');
     if ($res) {
       return $res->result();
     } else {
       return false;
     }
   }

  public function get_prior($id)
   {
     if ($id != null) {
       $this->db->where('ide_prioridad', $id);
     }
     $res = $this->db->get('ventas.ts_prioridad_seg');
     if ($res) {
       return $res->result();
     } else {
       return false;
     }
   }
   public function cot_seg_del()
      {

        $this->db->where('ide_cotizacion', $this->input->post('ide_cot'));
        $this->db->delete('ventas.tp_cotizacion');


        $this->db->where('ide_cotizacion', $this->input->post('ide_cot'));
        if ($this->db->delete('ventas.tp_cotizacion_seguimiento')) {
          return true;
        } else {
          return false;
        }
      }





}
 ?>
