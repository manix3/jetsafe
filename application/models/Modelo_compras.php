<?php
/**
 *
 */
class Modelo_compras extends CI_Model
{
  public function list_tran($id)
  {
    if ($id != null) {
      $this->db->where('transaccionid',$id);
    }

    $this->db->from('t_transacciones');
    $this->db->select('t_transacciones.transaccionid,t_empresas.nombre_comercial,t_metodos_pago.titulo,t_transacciones.tipooperacion,t_transacciones.nrooperacion,t_transacciones.moneda,t_transacciones.total,t_transacciones.banco,t_transacciones.fecha,t_transacciones.voucher,t_estados_transaccion.titulo as titulo_estado,t_transacciones.metodopagoid');
    $this->db->join('t_empresas','t_empresas.empresaid = t_transacciones.empresaid');
    $this->db->join('t_metodos_pago','t_metodos_pago.metodopagoid = t_transacciones.metodopagoid');
    $this->db->join('t_estados_transaccion','t_estados_transaccion.id = t_transacciones.estado');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function list_detalle($id)
  {
    $sql = "SELECT e.titulo as titulo_estado,mp.titulo as titulo_metodo,p.*,
     tran.voucher, tran.transaccionid FROM t_pedidos_transacciones pt JOIN t_pedidos p
     ON p.pedidoid = pt.pedidoid JOIN t_metodos_pago mp ON mp.metodopagoid = p.metodopagoid
     JOIN t_estados_pedido e ON e.estadopedidoid = p.estado JOIN t_transacciones tran
     ON tran.transaccionid = pt.transaccionid LEFT JOIN m_idioma mi ON mi.idiomaid = p.idioma
     WHERE pt.transaccionid = $id";

    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }
  public function list_tramite($id)
  {
    $this->db->where('t_transacciones.transaccionid',$id);
    $this->db->from('t_transacciones');
    $this->db->select('t_empresas.codigo_afiliacion,t_empresas.ruc,t_empresas.razon_social,t_empresas.nombre_comercial,t_empresas.email,t_metodos_pago.titulo,t_transacciones.tipooperacion,t_transacciones.moneda,t_transacciones.banco,t_transacciones.nrooperacion,t_estados_transaccion.titulo as titulo_estado,t_transacciones.transaccionid');
    $this->db->join('t_empresas','t_transacciones.empresaid = t_empresas.empresaid');
    $this->db->join('t_metodos_pago','t_metodos_pago.metodopagoid = t_transacciones.metodopagoid');
    $this->db->join('t_estados_transaccion','t_estados_transaccion.id = t_transacciones.estado');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function list_usuarios($id)
  {
    $sql = "SELECT pd.*
            ,prod.titulo as prod_titulo,
            pdet.cantidad, pdet.subtotal, pdet.fecha,
            mtp.titulo as titulo_metodo_pago,
            tesp.titulo as titulo_estado,
            emp.nombre_comercial, emp.email as email_empr,
            pedi.*,pedi.email as pedido_email,pedi.observacion as observacion_pedi,
            pdet.pedidodetalleid,pdet.pedidoid
            FROM t_pedidos pedi
            JOIN t_pedidos_datos pd ON pd.pedidoid = pedi.pedidoid
            JOIN t_empresas emp ON pedi.empresaid = emp.empresaid
            JOIN t_pedidos_detalle pdet ON pdet.pedidoid = pd.pedidoid
            JOIN t_productos prod ON pdet.productoid = prod.productoid
            JOIN t_metodos_pago mtp ON mtp.metodopagoid = pedi.metodopagoid
            JOIN t_estados_pedido tesp ON tesp.estadopedidoid = pedi.estado WHERE pedi.pedidoid = $id";

    // $sql = "SELECT pd.*,pedido.email as pedido_email,pedido.observacion as observacion_pedi,pedido.*,prod.titulo as prod_titulo, pdet.cantidad, pdet.subtotal, pdet.fecha, mtp.titulo as titulo_metodo_pago, test.titulo as titulo_estado, emp.nombre_comercial, emp.email as email_empr,
    //   pedi.observacion,pedi.idioma,tra.metodopagoid,pedi.tarjeta_numero,pedi.tarjeta_nombre,pedi.tarjeta_fecha,pedi.tarjeta_cvv,pdet.pedidodetalleid,pdet.pedidoid,pd.archivo FROM `t_pedidos_datos` pd JOIN t_pedidos_transacciones
    //    pt ON pt.pedidoid = pd.pedidoid JOIN t_transacciones tra ON tra.transaccionid = pt.transaccionid JOIN t_empresas emp ON tra.empresaid = emp.empresaid JOIN t_pedidos_detalle pdet ON
    //    pdet.pedidoid = pd.pedidoid JOIN t_productos prod ON pdet.productoid = prod.productoid JOIN t_metodos_pago mtp ON mtp.metodopagoid = tra.metodopagoid JOIN t_estados_transaccion test ON
    //     test.id = tra.estado JOIN t_pedidos pedi on pedi.pedidoid = pt.pedidoid JOIN t_pedidos pedido ON pedido.pedidoid = pd.pedidoid WHERE pd.pedidoid = $id";
    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }

  public function comboselect()
  {
    $this->db->from('t_estados_transaccion');
    $this->db->select('*');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }

  public function get_id_pedidos($id)
  {
    $this->db->where('transaccionid',$id);
    $this->db->from('t_pedidos_transacciones');
    $this->db->select('pedidoid');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }

  public function upd_t_transacciones($id,$datos)
  {
    $this->db->where('transaccionid',$id);
    if ($this->db->update('t_transacciones',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function ins_t_transacciones_aprobados($datos)
  {
    if ($this->db->insert('t_transacciones_aprobados',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function ins_t_transacciones_estado($datos)
  {
    if ($this->db->insert('t_transacciones_estado',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function upd_pedidos_por_id($id,$datos)
  {
    $this->db->where('pedidoid',$id);
    if ($this->db->update('t_pedidos',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function ins_t_pedidos_estado($datos)
  {
    if ($this->db->insert_batch('t_pedidos_estado',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function comboselect_motivos()
  {
    $this->db->from('t_motivos_denegado');
    $this->db->select('*');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function get_url()
  {
    $this->db->where('id','1006');
    $this->db->from('m_config');
    $this->db->select('texto');
    $res = $this->db->get()->result();
    if ($res) {
      return $res[0]->texto;
    } else {
      return false;
    }

  }

  public function list_pedido($id)
  {
    $this->db->where('pe.pedidoid',$id);
    $this->db->from('t_pedidos as pe');
    $this->db->select('pe.*,t_empresas.*,t_metodos_pago.titulo as titulo_metodo_pago, pest.titulo as titulo_estado');
    $this->db->join('t_empresas','pe.empresaid = t_empresas.empresaid');
    $this->db->join('t_metodos_pago','t_metodos_pago.metodopagoid = pe.metodopagoid');
    $this->db->join('t_estados_pedido as pest','pest.estadopedidoid = pe.estado');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function ins_t_transacciones_denegados($datos)
  {
    if ($this->db->insert('t_transacciones_denegados',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function upd_t_pedidos($id,$datos)
  {
    $this->db->where('pedidoid',$id);
    if ($this->db->update('t_pedidos',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function ins_log_t_pedido($datos)
  {
    if ($this->db->insert('t_pedidos_estado',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function get_log_transaccion()
  {
    $this->db->select('*');
    $this->db->from('t_transacciones_estado');
    $this->db->join('t_estados_transaccion estr','estr.id = t_transacciones_estado.estado');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function get_log_pedidos($id)
  {
    $this->db->where('t_pedidos_transacciones.transaccionid',$id);
    $this->db->from('t_pedidos_transacciones');
    $this->db->select('*');
    $this->db->join('t_pedidos_estado','t_pedidos_estado.pedidoid = t_pedidos_transacciones.pedidoid');
    $this->db->join('t_estados_pedido','t_estados_pedido.estadopedidoid = t_pedidos_estado.estado');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }
}
 ?>
