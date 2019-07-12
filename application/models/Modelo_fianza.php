<?php


class Modelo_fianza extends CI_Model  {


   public function list_fianzas()
   {
     $this->db->where('is_active_fia', 1);
     $this->db->select('*');
     $this->db->from('fianza');
     $this->db->join('categorias', 'categorias.ide_categoria = fianza.ide_cat');
    $res = $this->db->get();

    if($res){
      return $res->result();
    }else{
      return $this->db->last_query();
    }
   }

   public function get_fia($id)
   {
     $this->db->where('ide_fianza', $id);
     $this->db->select('*');
     $this->db->from('fianza');
     $this->db->join('categorias', 'categorias.ide_categoria = fianza.ide_cat');
     $res = $this->db->get();

     if($res){
       return $res->result();
     }else{
       return false;
     }
   }

   public function ins($data)
   {
     if($this->db->insert('fianza', $data)){
       return true;
     }else{
       return false;
     }
   }

   public function del($id, $datos)
   {

     $this->db->where('ide_fianza', $id);
    if($this->db->update('fianza', $datos)){

      return true;
    }else {
      return false;
    }
   }
   public function upd($id, $datos)
   {

     $this->db->where('ide_fianza', $id);
    if($this->db->update('fianza', $datos)){

      return true;
    }else {
      return false;
    }
   }
}

 ?>
