<?php


class Modelo_mano_de_obra extends CI_Model  {


   public function list_man_de_obra()
   {
     $this->db->where('is_active_man', 1);
     $this->db->select('*');
     $this->db->from('mano_obra');
     $this->db->join('categorias', 'categorias.ide_categoria = mano_obra.ide_cat');
    $res = $this->db->get();

    if($res){
      return $res->result();
    }else{
      return false;
    }
   }

   public function get_fia($id)
   {
     $this->db->where('ide_man', $id);
     $this->db->select('*');
     $this->db->from('mano_obra');
     $this->db->join('categorias', 'categorias.ide_categoria = mano_obra.ide_cat');
     $res = $this->db->get();

     if($res){
       return $res->result();
     }else{
       return false;
     }
   }

   public function ins($data)
   {
     if($this->db->insert('mano_obra', $data)){
       return true;
     }else{
       return false;
     }
   }

   public function del($id, $datos)
   {

     $this->db->where('ide_man', $id);
    if($this->db->update('mano_obra', $datos)){

      return true;
    }else {
      return false;
    }
   }
   public function upd($id, $datos)
   {

     $this->db->where('ide_man', $id);
    if($this->db->update('mano_obra', $datos)){

      return true;
    }else {
      return false;
    }
   }
}

 ?>
