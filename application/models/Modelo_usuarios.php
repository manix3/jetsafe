<?php /**
 *
 */
class Modelo_usuarios extends CI_Model
{
  public function list_usu($id)
  {
    $select = 'usuarioid,nombres,usuario,estado';

    if ($id != null) {
      $this->db->where('usuarioid',$id);
      $select = '*';
    }
           $this->db->select($select);
           $this->db->from('t_usuarios');
    $res = $this->db->get();

    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function ins($datos)
  {
    $id_tabla = $this->db->get_where('m_tabla', array('tablnombre' => 't_usuarios' ))->result()[0]->tablcorrelativo;
    $datos['usuarioid'] = (int) $id_tabla+1;
    $this->db->where('tablnombre','t_usuarios')->update('m_tabla',array('tablcorrelativo' => $datos['usuarioid']));

    if ($this->db->insert('t_usuarios',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function upd($datos,$id)
  {
    $this->db->where('usuarioid',$id);
    if ($this->db->update('t_usuarios',$datos)) {
      return true;
    } else {
      return false;
    }
  }


}
 ?>
