<?php defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model
{
 
    
     function datos_user($rut){
          $this->db->select('*' );      
          $this->db->where('rut', $rut);
          $query = $this->db->get('persona');
          if($query->num_rows() > 0){
               return $query->row();
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
     function get_rut($user, $pwd){
          $sql = "select rut from usuario where username = '" . $user . "' and password = '" . $pwd . "'";
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
/*****  ******/
     function get_departamento (){
          $this->db->select('*' ); 
          $query = $this->db->get('departamento');
          if($query->num_rows() > 0){
               return $query->result();
          }else{
               return false;
          }
     }

      function get_funcionarios(){
          $this->db->select('
               a.rut as rut , 
               a.dv as dv,
               a.nombres as nombres , 
               a.apellido_paterno as apellido_paterno, 
               a.apellido_materno as apellido_materno,
               a.id_departamento  as id_departamento,
               a.cargo_funcion as cargo_funcion,
               a.email as email,
               a.estado as estado,
               a.telefono as telefono,
               a.sexo as sexo,
               a.tipo_persona as tipo_persona,
               a.foto  as foto,
               b.nombre as departamento,
               c.nombre as direccion' );     
          $this->db->join('departamento b', 'a.id_departamento= b.id', 'left');
          $this->db->join('direccion c', 'b.id_direccion = c.id', 'left');
          
          $query = $this->db->get('persona a');

          if($query->num_rows() > 0){
               return $query->result();
          }else{
               return false;
          }
     }

     public function agregarpersona(){
               $field = array(                 
               'rut'             =>$this->input->post('txt_rut'),
               'dv'              =>$this->input->post('txt_dv'),           
               'nombres'         =>$this->input->post('txt_nombres'),
               'apellido_paterno'=>$this->input->post('txt_ap'),
               'apellido_materno'=>$this->input->post('txt_am'),
               'id_departamento' =>$this->input->post('txt_departamento'),
               'cargo_funcion'   =>$this->input->post('txt_cargo'),
               'email'           =>$this->input->post('txt_email'),
               'estado'          =>$this->input->post('txt_estado'),
               'telefono'        =>$this->input->post('txt_telefono'),
               'sexo'            =>$this->input->post('txt_sexo'),
               'tipo_persona'    =>$this->input->post('txt_tipo')

               );
          $this->db->insert('persona', $field);
          if($this->db->affected_rows() > 0){
               return true;
          }else{
               return false;
          }
     }

     public function existepersona(){
          $rut = $this->input->post('txt_rut');
          
          $this->db->select('*' );      
          $this->db->where('rut', $rut);
          $query = $this->db->get('persona');
          if($query->num_rows() > 0){
               return true;
          }else{
               return false;
          }
     }
}