<?php /**
 *
 */
class Modelo_seguimientos_obras extends CI_Model
{
  public function list($id,$cod_obr=null,$tipo=null,$categoria=null,$banco=null)
  {
    if ($id != null) {
      $this->db->where('seguimiento_obra.ide_seg_obr',$id);
    }



    if($cod_obr != ''){
      $this->db->where('seguimiento_obra.ide_obra',$cod_obr);
    }

    if($tipo != ''){
      $this->db->where('seguimiento_obra.ide_tip_seg',$tipo);
    }

    if ($categoria != '') {
      $this->db->where('seguimiento_obra.categoria_seg_obr',$categoria);
    }

    if ($banco != '') {
      $this->db->where('seguimiento_obra.ide_banco',$banco);
    }



    $this->db->where('is_active_seg_obr',1);
    $this->db->join('categorias','seguimiento_obra.categoria_seg_obr = categorias.ide_categoria');
    $this->db->join('obras','seguimiento_obra.ide_obra = obras.ide_obra');
    $this->db->join('bancos','seguimiento_obra.ide_banco = bancos.ide_bancos');
    $this->db->from('seguimiento_obra');
    $this->db->select('*');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }

  public function ins($datos)
  {
    if ($this->db->insert('seguimiento_obra',$datos)) {
      return true;
    } else {
      return false;
    }
  }

  public function list_obras_combo()
  {
    $this->db->where('is_active_obr',1);
    $this->db->select('ide_obra,cod_obr');
    $this->db->from('obras');
    $res = $this->db->get();
    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }

  public function get_by_rank($fecha1,$fecha2)
  {

    if ($fecha2 === null) {
      $and = "= '$fecha1'";
    }else {
      $and = "BETWEEN '$fecha1' AND '$fecha2'";
    }

    $sql = "SELECT * FROM `seguimiento_obra` JOIN categorias ON seguimiento_obra.categoria_seg_obr = categorias.ide_categoria JOIN obras ON seguimiento_obra.ide_obra = obras.ide_obra JOIN bancos ON seguimiento_obra.ide_banco = bancos.ide_bancos WHERE is_active_seg_obr = 1 AND fecha_seg_obr $and";
    $res = $this->db->query($sql);

    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }

  public function ins_admin($datos)
  {
    $res = $this->db->insert_batch('seguimiento_obra',$datos);
    if ($res) {
      return true;
    } else {
      return false;
    }

  }
}
 ?>
