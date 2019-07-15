<?php /**
 *
 */
class Modelo_productos extends CI_Model
{

  public function list_prod($id)
  {
      $select= 'productoid,titulo,precio,orden,informacion_adicional,estado';

    if ($id != null) {
      $this->db->where('productoid',$id);
      $select= '*';
    }
           $this->db->select($select);
           $this->db->from('t_productos');
    $res = $this->db->get();

    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }

  public function ins($datos)
  {
    $id_tabla = $this->db->get_where('m_tabla', array('tablnombre' => 't_productos' ))->result()[0]->tablcorrelativo;
    $datos['productoid'] = (int) $id_tabla+1;
    $this->db->where('tablnombre','t_productos')->update('m_tabla',array('tablcorrelativo' => $datos['productoid']));

    if ($this->db->insert('t_productos',$datos)) {
      return true;
    } else {
      return false;
    }

  }
  public function upd($id,$datos)
  {
        $this->db->where('productoid',$id);
    if ($this->db->update('t_productos',$datos)) {
      return true;
    } else {
      return false;
    }

  }

  public function del($id)
  {
    $this->db->where('productoid',$id);
    if ($this->db->delete('t_productos')) {
      return true;
    } else {
      return false;
    }
  }


}
 ?>
