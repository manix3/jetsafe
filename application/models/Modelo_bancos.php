<?php


class Modelo_bancos extends CI_Model  {


   public function list_bank()
   {
     $this->db->where('is_active_ban', 1);
     $this->db->select('*');
     $this->db->from('bancos');

    $res = $this->db->get();

    if($res){
      return $res->result();
    }else{
      return false;
    }
   }

   public function get_bank($id)
   {
     $this->db->where('ide_bancos', $id);
     $this->db->select('*');
     $this->db->from('bancos');
     $res = $this->db->get();

     if($res){
       return $res->result();
     }else{
       return false;
     }
   }

   public function ins($data)
   {
     if($this->db->insert('bancos', $data)){
       return $this->db->last_query();
     }else{
       return false;
     }
   }

   public function del($id, $datos)
   {

     $this->db->where('ide_bancos', $id);
    if($this->db->update('bancos', $datos)){

      return true;
    }else {
      return false;
    }
   }
   public function upd($id, $datos)
   {

     $this->db->where('ide_bancos', $id);
    if($this->db->update('bancos', $datos)){

      return true;
    }else {
      return false;
    }
   }

   public function list_bancos()
   {
     $this->db->where('is_active_ban',1);
     $this->db->select('ide_bancos,nom_ban');
     $this->db->from('bancos');
     $res = $this->db->get();
     if ($res) {
       return $res->result();
     } else {
       return false;
     }

   }
}

 ?>
