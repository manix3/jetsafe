<?php /**
 *
 */
class Modelo_seguimiento_bancos extends CI_Model
{
  public function list($id,$empresa=null,$banco=null)
  {
    if ($id != null) {
      $this->db->where('seguimiento_banco.ide_seg_banco',$id);
    }

    if($empresa != ''){
      $this->db->where('seguimiento_banco.ide_empresa',$empresa);
    }
    if ($banco != '') {
      $this->db->where('seguimiento_banco.ide_banco',$banco);
    }



    $this->db->where('is_active_seg_banco',1);
    $this->db->join('categorias','seguimiento_banco.categoria_seg_banco = categorias.ide_categoria');
    $this->db->join('bancos','seguimiento_banco.ide_banco = bancos.ide_bancos');
    $this->db->from('seguimiento_banco');
    $this->db->order_by('fech_seg_banco', 'desc');
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


  public function get_by_rank($fecha1,$fecha2)
  {

    if ($fecha2 === null) {
      $and = "= '$fecha1'";
    }else {
      $and = "BETWEEN '$fecha1' AND '$fecha2'";
    }

    $sql = "SELECT * FROM `seguimiento_banco` JOIN categorias ON seguimiento_banco.categoria_seg_banco = categorias.ide_categoria JOIN bancos ON seguimiento_banco.ide_banco = bancos.ide_bancos WHERE is_active_seg_banco = 1 AND fech_seg_banco $and";
    $res = $this->db->query($sql);

    if ($res) {
      return $res->result();
    } else {
      return false;
    }

  }

  public function ins_admin($datos)
  {
    $res = $this->db->insert_batch('seguimiento_banco',$datos);
    if ($res) {
      return true;
    } else {
      return false;
    }

  }
}
 ?>
