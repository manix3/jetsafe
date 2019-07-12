<?php /**
 *

 */
class Modelo_cot_vendedor extends CI_Model
{

    public function ven_list($id)
    {
      if ($id !=  null) {
        $this->db->where('ide_vendedor',$id);
      }

      $this->db->where(array('is_active' => 1 ,'ide_empresa' => $this->session->userdata('logged_in')['ie'] , ));
      $res = $this->db->get('ventas.tp_vendedor');

      if ($res) {
        return $res->result();
      } else {
        return false;
      }

    }

    public function ven_ins($data)
    {
      if ($this->db->insert('ventas.tp_vendedor',$data)) {
        return true;
      } else {
        return false;
      }

    }

    public function ven_upd($data)
    {
          $this->db->where('ide_vendedor',$this->input->post('inp_text1'));
      if ($this->db->update('ventas.tp_vendedor',$data)) {
        return true;
      } else {
        return false;
      }

    }


    public function ven_del($data)
    {
            $this->db->where('ide_vendedor',$this->input->post('ide'));
        if ($this->db->update('ventas.tp_vendedor',$data)) {
          return true;
        } else {
          return false;
        }
    }





}
 ?>
