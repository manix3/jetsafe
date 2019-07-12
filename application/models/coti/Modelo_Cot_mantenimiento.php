<?php /**
 *
 */
class Modelo_Cot_mantenimiento extends CI_Model
{


    /*----------------------------------------Estado de Cotizacion----------------------------------------*/

    public function est_Coti_listar($id)
    {
      $sess=$this->session->userdata('logged_in');
      $s_ni=$sess['nivel'];
      $s_ie=$sess['ie'];
      $s_id=$sess['id'];

      if ($id != null) {
        $this->db->where('ide_est_cot', $id);
      }
          $this->db->where('is_active', 1);
          $this->db->select('*');
          $this->db->from('ventas.ts_estado_cotizacion');
          $query = $this->db->get();
          if ($query) {
            return $query->result();
          } else {
            return false;
          }
    }

    public function est_Coti_ins($datos)
    {
      if ($this->db->insert('ventas.ts_estado_cotizacion', $datos)) {
        return true;
      }else {
        return false;
      }
    }

    public function est_Coti_upd($datos,$ide_e)
    {
      $this->db->where('ide_est_cot',$this->input->post('inp_text1'));
      $this->db->where('ide_empresa',$ide_e);
      if($this->db->update('ventas.ts_estado_cotizacion', $datos))  {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function est_Coti_del($datos,$ide_e)
    {

      $this->db->where('ide_est_cot',$this->input->post('ide'));
      $this->db->where('ide_empresa',$ide_e);
      if($this->db->update('ventas.ts_estado_cotizacion', $datos))  {
        return true;
      }
      else
      {
        return false;
      }
    }

    /*----------------------------------------Moneda----------------------------------------*/

    public function tip_Mon_listar($id)
    {
      $sess=$this->session->userdata('logged_in');
      $s_ni=$sess['nivel'];
      $s_ie=$sess['ie'];
      $s_id=$sess['id'];

      if ($id != null) {

        $this->db->where('ide_tip_mon', $id);
      }
          $this->db->where('ide_empresa', $s_ie);
          $this->db->where('is_active', 1);
          $this->db->select('*');
          $this->db->from('ventas.ts_tipo_moneda');
          $query = $this->db->get();  
          if ($query) {
            return $query->result();
          } else {
            return false;
          }
    }

    public function tip_Mon_ins($datos)
    {
      if ($this->db->insert('ventas.ts_tipo_moneda', $datos)) {
        return true;
      }else {
        return false;
      }
    }

    public function tip_Mon_upd($datos,$ide_e)
    {
      $this->db->where('ide_tip_mon',$this->input->post('inp_text1'));
      $this->db->where('ide_empresa',$ide_e);
      if($this->db->update('ventas.ts_tipo_moneda', $datos))  {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function tip_Mon_del($datos,$ide_e)
    {
      $this->db->where('ide_tip_mon',$this->input->post('ide'));
      $this->db->where('ide_empresa',$ide_e);
      if($this->db->update('ventas.ts_tipo_moneda', $datos))  {
        return true;
      }
      else
      {
        return false;
      }
    }



}
 ?>
