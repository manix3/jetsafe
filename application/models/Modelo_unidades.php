<?php


class Modelo_unidades extends CI_Model  {


   public function list_tip_uni()
   {
     $this->db->where('is_active_tip_uni', 1);
     $this->db->select('*');
     $this->db->from('tipo_unidades');
    $res = $this->db->get();

    if($res){
      return $res->result();
    }else{
      return false;
    }
   }

   public function get_tip_uni($id)
   {
     $this->db->where('ide_tip_uni', $id);
     $this->db->select('*');
     $this->db->from('tipo_unidades');

     $res = $this->db->get();

     if($res){
       return $res->result();
     }else{
       return false;
     }
   }

   public function ins($data)
   {
     if($this->db->insert('tipo_unidades', $data)){
       return true;
     }else{
       return $this->db->last_query();
     }
   }

   public function del($id, $datos)
   {

     $this->db->where('ide_tip_uni', $id);
    if($this->db->update('tipo_unidades', $datos)){

      return true;
    }else {
      return false;
    }
   }
   public function upd($id, $datos)
   {

     $this->db->where('ide_tip_uni', $id);
    if($this->db->update('tipo_unidades', $datos)){

      return true;
    }else {
      return false;
    }
   }
}

 ?>
