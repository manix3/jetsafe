<?php


class Modelo_categorias extends CI_Model  {


   public function list_categorias()
   {
     $this->db->where('is_active_cat', 1);
     $this->db->select('*');
     $this->db->from('categorias');

    $res = $this->db->get();

    if($res){
      return $res->result();
    }else{
      return false;
    }
   }

   public function get_cat($id)
   {
     $this->db->where('ide_categoria', $id);
     $this->db->select('*');
     $this->db->from('categorias');
     $res = $this->db->get();

     if($res){
       return $res->result();
     }else{
       return false;
     }
   }

   public function ins($data)
   {
     if($this->db->insert('categorias', $data)){
       return $this->db->last_query();
     }else{
       return $this->db->last_query();
     }
   }

   public function del($id, $datos)
   {

     $this->db->where('ide_categoria', $id);
    if($this->db->update('categorias', $datos)){

      return true;
    }else {
      return false;
    }
   }
   public function upd($id, $datos)
   {

     $this->db->where('ide_categoria', $id);
    if($this->db->update('categorias', $datos)){

      return true;
    }else {
      return false;
    }
   }
}

 ?>
