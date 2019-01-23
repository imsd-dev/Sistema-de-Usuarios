<?php defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model
{
    

     //get the username & password 
     function get_pass($usr, $pwd)     {
          $sql = "select password from persona where username = '" . $usr . "' and password = '" . $pwd . "'";
          $query = $this->db->query($sql);
          if($query->num_rows() > 0){
               return $query->row_array();
          }else{
               return false;
          } 
     }

     function datos_user($id)     {
          $this->db->select('*' );      
          $this->db->where('id', $id);
          $query = $this->db->get('persona');
          if($query->num_rows() > 0){
               return $query->row();
          }else{
               return false;
          }
     }
     function getrespon(){
          $dat= "Adquisiciones";
          $this->db->select('id ,nombre,apellido,cargo,departamento' );       
          $this->db->where('departamento', $dat);
          $query = $this->db->get('persona');
          if($query->num_rows() > 0){
               return $query->result();
          }else{
               return false;
          }
     }
     

     function get_usuario($usr, $pwd){
          
       
          $sql = "select * from usuario where username = '" . $usr . "' and password = '" . $pwd . "'";
          $query = $this->db->query($sql);
          if($query->num_rows() > 0){
               return $query->result();
          }else{
               return false;
          }
          
     }
     function get_rut($rut, $pwd){
          $sql = "select rut from usuario where username = '" . $rut . "' and password = '" . $pwd . "'";
          $query = $this->db->query($sql);
          if($query->num_rows() > 0){
               return $query->row_array();
          }else{
               return false;
          } 
     }


     function get_nivel($rut, $idS){
          $sql = "select nivel_acceso from permisosxusuarios where id_sistema = '" . $idS . "' and rut_usuario= '" . $rut . "'";
          $query = $this->db->query($sql);
          if($query->num_rows() > 0){
               return $query->row_array();
          }else{
               return false;
          }

     }

     function form_insert($data){
     // Inserting in Table(students) of Database(college)
     $this->db->insert('persona', $data);
     }

}