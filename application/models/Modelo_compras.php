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
     tran.voucher, tran.transaccionid,tran.estado as estado_transaccion FROM t_pedidos_transacciones pt JOIN t_pedidos p
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

  public function list_pedidos($id)
  {
    $sql = "SELECT *,(SELECT titulo FROM t_estados_pedido WHERE estadopedidoid = t1.estado) AS titulo_estado FROM t_pedidos t1, t_empresas t2, t_metodos_pago t3 WHERE t1.empresaid = t2.empresaid AND t1.metodopagoid = t3.metodopagoid AND t1.pedidoid = $id";

    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }

  public function pedido_datos($id)
  {
    $sql ="SELECT *,(SELECT titulo FROM t_productos WHERE productoid = t1.productoid) AS producto FROM t_pedidos t0, t_pedidos_detalle t1, t_pedidos_datos t2 WHERE t0.pedidoid = t1.pedidoid AND t0.pedidoid = t2.pedidoid AND t1.pedidodetalleid = t2.pedidodetalleid AND t1.pedidoid = $id";
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

  public function get_log_transaccion($id)
  {
    if ($id != null) {
      $this->db->where('transaccionid',$id);
    }
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
