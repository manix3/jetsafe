<?php /**
 *
 */
class Modelo_productos extends CI_Model
{

  public function list_prod($id)
  {
      $select= 'productoid,titulo,precio';

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
    if ($this->db->insert('t_productos',$datos)) {
      return true;
    } else {
      return false;
    }

  }
  public function upd($datos)
  {
        $this->db->where('productoid',$this->input->post('inp_text1'));
    if ($this->db->update('t_productos',$datos)) {
      return true;
    } else {
      return false;
    }

  }




}
 ?>
