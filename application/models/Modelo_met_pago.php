<?php /**
 *
 */
class Modelo_met_pago extends CI_Model
{

  public function list_met_pag($id)
  {

    $where = '';
    $select = "select titulo,orden,estado,metodopagoid,observacion,notificacion";

    if ($id != null) {
      $where = "WHERE metodopagoid = $id";
      $select = "select *";
    }

    $sql = "$select, case estado when 1 then 'Publicado' when 0 then 'Oculto' end as publicado	from t_metodos_pago $where order by orden";

    $res = $this->db->query($sql);
    if ($res) {
      return $res->result() ;
    } else {
      return false ;
    }

  }


  public function upd_met_pago($data)
  {
        $this->db->where('metodopagoid',$this->input->post('inp_text1'));
    if ($this->db->update('t_metodos_pago',$data)) {
      return true;
    } else {
      return false;
    }

  }




}
 ?>
