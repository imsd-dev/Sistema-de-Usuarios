<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->driver('session');
		$this->load->helper('url');
		$this->load->model('login_model');	
	}
	public function logout(){
      $this->session->sess_destroy();
      redirect(base_url('usuarios/index') );
    }
	public function index(){
        //get the posted values
        $username = $this->input->post("txt_username");
        $password= $this->input->post("txt_password"); 

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
                    
                $get_usuario = $this->login_model->get_usuario($username, $password);
                $get_rut = $this->login_model->get_rut($username, $password); 

                $rut = $get_rut['rut'];
                $sistema= 'SistemaUsuarios';
                $permiso= $this->login_model->get_nivel($rut,$sistema);

	             
	            if ($get_usuario){
		          	if ($permiso){		                 
		                $sessiondata = array(
		                     'username' => $username,
		                     'loginuser' => TRUE,
		                     'rut_usuario'=> $rut
		                );
		                $this->session->set_userdata('nivel',$permiso['nivel_acceso']);
		                $this->session->set_userdata('username',$sessiondata['username']);
		                $this->session->set_userdata('rut_usuario',$sessiondata['rut_usuario']);	
		                
 					
 						redirect(base_url('usuarios/administracion') );
 						
 						

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

    public function administracion(){
    	$unermane = $this->session->userdata('username');
		$nivel= $this->session->userdata('nivel');		 
		$rut = $this->session->userdata('rut_usuario'); 

		if (is_null($unermane)) {		

		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Debe inciar sesion antes</div>');
			redirect(base_url('usuarios/index') );

		}else{
			$this->load->view('administracion');
		}

    }
}