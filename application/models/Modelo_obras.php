<?php /**
 *
 */
class Modelo_obras extends CI_Model
{
  public function list($id)
  {
    if ($id != null) {
    $this->db->where('ide_obra',$id);
    }
    $this->db->where('is_active_obr',1);
    $this->db->select('*');
    // $this->db->join('presupuesto','obras.ide_presu = presupuesto.ide_presu');
    $this->db->from('obras');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }
  }

  public function ins($datos)
  {
    if ($this->db->insert('obras',$datos)) {
      return true;
    } else {
      return false;
    }

  }

  public function list_presupuesto()
  {
    $this->db->where('is_active_pre',1);
    $this->db->select('*');
    $this->db->from('presupuesto');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }

  public function ins_pres($dat)
  {
    $this->db->insert('presupuesto', $dat);

    return $this->db->insert_id();
  }

  public function ins_csv($data)
  {

    if($this->db->insert('detalle_presupuesto', $data))
    {
      return true;
    }else{
      return false;
    }
  }

  public function verify($cod)
  {
    $this->db->where('cod_obr', $cod);
    $this->db->select('*');
    $this->db->from('presupuesto');

    $res = $this->db->get();
    if($res){
      return $res->result();
    }else{
      return false;
    }
  }
}
 ?>
