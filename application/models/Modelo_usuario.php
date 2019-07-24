<?php if ( ! defined('BASEPATH')) exit('El acceso directo a este archivo no esta permitido.');

class Modelo_usuario extends CI_Model  {

  function login($username, $password)
   {
     // $username=strtoupper($username);

    $res = $this->db->select('*')
                     ->from('t_usuarios')
                     ->where(array('usuario' => $username , 'clave' => $this->hash($password),'estado' => 1))
                     ->get();

      if ($res) {
         if($res -> num_rows() == 1)
         {
           return $res->result();
         }
         else
         {
           return false;
         }

      } else {
        return false;
      }

   }


     function fil_usu($var1) {

     $sql="SELECT ide_ciu, ide_aut, pat_ciu, mat_ciu, nom_ciu, ema_ciu, nro_doc
     FROM sscc.usuario where nro_doc like '%$var1%' limit 1;

     ";

     $query = $this->db->query($sql);
     if ($query->num_rows() > 0){

         foreach($query->result() as $fila){
   $fila->rpta="sihaydatos";
          $data[] = $fila;
        }

        return $data;
      }
      else{
       $row["rpta"]="nohaydatos";
       $data[] = $row;
       return $data;
     //   return False;
      }

     }

   function lis_usu() {

   $sql="SELECT ide_trb,  nom_com, nro_doc,
           cidusuario, cod_eje, nom_eje
     FROM personal.vw_personal;"
   ;

   $query = $this->db->query($sql);
   if ($query->num_rows() > 0){

       foreach($query->result() as $fila){
       $fila->ide_trb=rtrim($fila->ide_trb);
       $fila->nom_com=rtrim($fila->nom_com );
       $fila->nro_doc=rtrim($fila->nro_doc);
       $fila->cidusuario=rtrim($fila->cidusuario);
       $fila->cod_eje=rtrim($fila->cod_eje);
       $fila->nom_eje=rtrim($fila->nom_eje);

         //$fila->=rtrim($fila->);
        $data[] = $fila;
      }

      return $data;
    }
    else{
      $row["detalle"]="No hay Registros";
      $data[] = $row;
      return json_encode($data);
      //  return False;
    }

   }

   function det_usu($var1) {

     $sql="SELECT ide_ciu, ide_aut, pat_ciu, mat_ciu, nom_ciu, ema_ciu, nro_doc
     FROM sscc.usuario where ide_ciu='$var1'";

     $query = $this->db->query($sql);
     if ($query->num_rows() > 0){

       foreach($query->result() as $fila){
         /*  $fila->des_eve=rtrim($fila->des_eve);
         $fila->nom_eje=rtrim($fila->nom_eje);
         $fila->des_est=rtrim($fila->des_est);
         $fila->pat_ciu=rtrim($fila->pat_ciu);
         $fila->mat_ciu=rtrim($fila->mat_ciu);
         $fila->nro_doc=rtrim($fila->nro_doc);
         */
         //$fila->=rtrim($fila->);
         $data[] = $fila;
       }

       return $data;
     }
     else{
       $row["detalle"]="No hay Registros";
       $data[] = $row;
       return json_encode($data);
       //  return False;
     }

   }

   public function list_usu()
   {
     $this->db->where('is_active_usu', 1);
     $this->db->select('*');
     $this->db->from('usuarios');

    $res = $this->db->get();

    if($res){
      return $res->result();
    }else{
      return false;
    }
   }

   public function get_usu($id)
   {
     $this->db->where('ide_usu', $id);
     $this->db->select('*');
     $this->db->from('usuarios');
     $res = $this->db->get();

     if($res){
       return $res->result();
     }else{
       return false;
     }
   }

   public function ins($data)
   {
     if($this->db->insert('usuarios', $data)){
       return true;
     }else{
       return false;
     }
   }

   public function del($id, $datos)
   {

     $this->db->where('ide_usu', $id);
    if($this->db->update('usuarios', $datos)){

      return true;
    }else {
      return false;
    }
   }
   public function upd($id, $datos)
   {

     $this->db->where('ide_usu', $id);
    if($this->db->update('usuarios', $datos)){

      return true;
    }else {
      return false;
    }
   }

   private function hash($pss)
   {
     return md5($pss);
   }

}
