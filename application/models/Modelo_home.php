<?php /**
 *
 */
class Modelo_home extends CI_Model
{
  public function get_t_pedido($fecha)
  {
    $sql = "SELECT COUNT(pedidoid) as nro_pedido_por_dia FROM t_pedidos  WHERE envio_fecha LIKE '$fecha%' GROUP BY pedidoid";
    $res = $this->db->query($sql);
    if ($res) {
      $var = $res->result();
      if (isset($var[0]->nro_pedido_por_dia)) {
        $var = $var[0]->nro_pedido_por_dia;
      } else {
        $var = 0;
      }
      return $var;
    } else {
      return false;
    }
  }

  public function get_pedido_detalle($fecha)
  {
    $sql = "SELECT COUNT(productoid) as nro_producto_por_dia FROM t_pedidos_detalle WHERE fecha LIKE '$fecha%' GROUP BY productoid";
    $res = $this->db->query($sql);
    if ($res) {

        $var = $res->result();
        if (isset($var[0]->nro_producto_por_dia)) {
          $var = $var[0]->nro_producto_por_dia;
        } else {
          $var = 0;
        }
        return $var;
    } else {
      return false;
    }

  }
}
 ?>
