<?php /**
 *
 */
class Modelo_parametros extends CI_Model
{
  public function list_param($id)
  {
    $select = 'id,titulo,texto';
    if ($id != null) {
      $this->db->where('id',$id);
      $select = '*';
    }

    $this->db->from('m_config');
    $this->db->select($select);
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function upd($datos,$id)
  {
    $this->db->where('id',$id);
    if ($this->db->update('m_config',$datos)) {
      return true;
    } else {
      return false;
    }
  }
}
 ?>
