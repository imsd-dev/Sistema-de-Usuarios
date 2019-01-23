<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->driver('session');
		$this->load->helper('url');
		$this->load->model('login_model');	
	}

	public function index()
     {
          //get the posted values
        $username = $this->input->post("txt_username");
        $password= $this->input->post("txt_password"); 

        //$password = md5($passw);

        //set validations
        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE)
        {
             
             $this->load->view('login_view');
        }
        else
        {
             
            if ($this->input->post('btn_login') == "Iniciar Sesion")
            {
                    
                $usr_result = $this->login_model->get_user($username, $password);
                $resu_id = $this->login_model->get_di($username, $password); 

                $id = $resu_id['id'];
                $sistema= 'SistemaUsuarios';
                $permiso= $this->login_model->get_nivel($id,$sistema);

	             
	            if ($usr_result){
		          	if ($permiso){		                 
		                $sessiondata = array(
		                     'username' => $username,
		                     'loginuser' => TRUE,
		                     'id_usuario'=> $id
		                );
		                $this->session->set_userdata('nivel',$permiso['nivel_acceso']);
		                $this->session->set_userdata('username',$sessiondata['username']);
		                $this->session->set_userdata('id_usuario',$sessiondata['id_usuario']);	
 						if ($permiso['nivel_acceso']== 4 ) {
 							redirect(base_url('index.php/') );
 						}else{
		                	redirect(base_url('index.php/') );
 						}
		            }else{
			               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Usted no  tiene permisos para ingresar a este sistema</div>');
			               
			                 redirect($this->uri->uri_string());
	             	  }
	             
		        }else{
		            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Nombre de usuario o contraseña invalidos</div>');
		            redirect($this->uri->uri_string());		                   
		        }
                   
            }
            else

            {  echo "<script>alert('Falló el ingreso');</script>";
                redirect(base_url() );
            }
        }
    }    

}