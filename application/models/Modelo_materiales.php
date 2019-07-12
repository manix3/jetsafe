<?php


class Modelo_materiales extends CI_Model  {


   public function list_materiales()
   {
     $this->db->where('is_active_mat', 1);
     $this->db->select('*');
     $this->db->from('materiales');
     $this->db->join('categorias', 'categorias.ide_categoria = materiales.ide_cat');
     $this->db->join('tipo_unidades', 'tipo_unidades.ide_tip_uni = materiales.ide_tip_unidad');
    $res = $this->db->get();

    if($res){
      return $res->result();
    }else{
      return $this->db->last_query();
    }
   }

   public function get_mat($id)
   {
     $this->db->where('ide_material', $id);
     $this->db->select('*');
     $this->db->from('materiales');
     $this->db->join('categorias', 'categorias.ide_categoria = materiales.ide_cat');
     $this->db->join('tipo_unidades', 'tipo_unidades.ide_tip_uni = materiales.ide_tip_unidad');
     $res = $this->db->get();

     if($res){
       return $res->result();
     }else{
       return $this->db->last_query();
     }
   }

   public function ins($data)
   {
     if($this->db->insert('materiales', $data)){
       return true;
     }else{
       return false;
     }
   }

   public function del($id, $datos)
   {

     $this->db->where('ide_material', $id);
    if($this->db->update('materiales', $datos)){

      return true;
    }else {
      return false;
    }
   }
   public function upd($id, $datos)
   {

     $this->db->where('ide_material', $id);
    if($this->db->update('materiales', $datos)){

      return  true;
    }else {
      return false;
    }
   }
}

 ?>
