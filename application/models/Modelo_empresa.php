<?php /**
 *
 */
class Modelo_empresa extends CI_Model
{

  public function list_emp($id)
  {
      if ($id != null) {
        $this->db->where('empresaid',$id);
      }

    $res = $this->db->get('t_empresas');
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function get_smtp()
  {
    $sql = "SELECT * FROM `m_config` WHERE id IN (1016,1017,1018,1019,1015,1022)";
    $res = $this->db->query($sql);
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function ins($datos)
  {
      $id_tabla = $this->db->get_where('m_tabla', array('tablnombre' => 't_empresas' ))->result()[0]->tablcorrelativo;
      $datos['empresaid'] = (int) $id_tabla+1;
      $this->db->where('tablnombre','t_empresas')->update('m_tabla',array('tablcorrelativo' => $datos['empresaid']));
    if ($this->db->insert('t_empresas',$datos)) {
      return  true;
    } else {
      return  false;
    }
  }
  public function upd($id,$datos)
  {
        $this->db->where('empresaid',$id);
    if ($this->db->update('t_empresas',$datos)) {
      return  true;
    } else {
      return  false;
    }
  }

  public function del($id)
  {
    if ($this->is_deletable($id)) {
      return false;
    }
        $this->db->where('empresaid',$id);
    if ($this->db->delete('t_empresas')) {
      return  true;
    } else {
      return  false;
    }
  }


  private function is_deletable($id)
  {
    $res =  $this->db->get_where('t_pedidos', array('empresaid' => $id, ));
    if ($res->num_rows() > 0) {
      return true;
    } else {
      return false;
    }

  }

}
 ?>
