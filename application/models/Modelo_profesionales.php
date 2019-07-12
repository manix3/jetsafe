<?php


class Modelo_profesionales extends CI_Model  {


   public function list_profesionales()
   {
     $this->db->where('is_active_prof', 1);
     $this->db->select('*');
     $this->db->from('profesionales');
    $res = $this->db->get();

    if($res){
      return $res->result();
    }else{
      return $this->db->last_query();
    }
   }

   public function get_profesional($id)
   {
     $this->db->where('ide_profecional', $id);
     $this->db->select('*');
     $this->db->from('profesionales');
     $this->db->join('categorias', 'categorias.ide_categoria = profesionales.ide_cat');

     $res = $this->db->get();

     if($res){
       return $res->result();
     }else{
       return false;
     }
   }

   public function ins($data)
   {
     if($this->db->insert('profesionales', $data)){
       return true;
     }else{
       return false;
     }
   }

   public function del($id, $datos)
   {

     $this->db->where('ide_profecional', $id);
    if($this->db->update('profesionales', $datos)){

      return true;
    }else {
      return false;
    }
   }
   public function upd($id, $datos)
   {

     $this->db->where('ide_profecional', $id);
    if($this->db->update('profesionales', $datos)){

      return true;
    }else {
      return false;
    }
   }
}

 ?>
