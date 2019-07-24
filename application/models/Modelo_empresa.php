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


  public function get_data_for_mail($id)
  {
    $sql = "SELECT email,razon_social,codigo_afiliacion,nombre_comercial FROM `t_empresas` WHERE empresaid = $id";
    $res = $this->db->query($sql)->result();
    if ($res) {
      return $res[0];
    } else {
      return false;
    }
  }

  public function is_deletable($id)
  {
    $this->db->where('empresaid',$id);
    $this->db->from('t_pedidos');
    $res = $this->db->get();
    if ($res->num_rows() > 0) {
      return true;
    } else {
      return false;
    }

  }

}
 ?>
