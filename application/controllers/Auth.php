<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		redirect("auth/login");
	}
	
	public function login(){

		if($this->session->userdata("uid")){
			redirect("main"); 
			
		}
		$datos=array();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
            if($this->input->post()){
				$datos["OP"]="MAL";
			}
        }else{
			$this->load->model("usuarios_model");
			
			//recuperar del form
			$usuario=set_value("usuario"); //metodo form_validation (preferido)
			$password=$this->input->post("password"); //metodo input

			if($usuario_id=$this->usuarios_model->verificar($usuario,$password)){
				$u=$this->usuarios_model->obtener($usuario_id);

				$this->session->set_userdata("uid",$u["usuario_id"]);
				$this->session->set_userdata("usuario",$u["usuario"]);

				redirect("main/principal"); 
			}else{
				//usuario incorrecto
				$datos["OP"]="INCORRECTO";
			}
                       
        }
		$this->load->view('acceso/login',$datos);
		
	}

	public function salir(){
		$this->session->sess_destroy();
		redirect("auth");
	}
	public function cambiarpass(){

		redirect("main/cambiarpass"); 
		$pass1=set_value("pass");
		$pass2=set_value("passdenuevo");
		if($pass1 === $pass2){
			$this->usuarios_model->cambiarpass($this->session->get_current_user["uid"] ,$pass1);
			echo "contraseña actualizada";
		}
		else{
			
			echo "Ambas contraseñas deben coincidir";
		}
		redirect("main/cambiarpass"); 
	}
	public function principal()
	{
		redirect("main/principal");
	}
    public function password_check($str)
    {
       if (preg_match('#[0-9]#', $str) and preg_match('#[a-zA-Z]#', $str)) {
         return TRUE;
       }
       return FALSE;
    }

    public function usuarionuevo()
    {
        $datos=array();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('nombre','Nombre','trim|required|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]','callback_password_check');
		$this->form_validation->set_rules('confirmacion', 'Confirmacion', 'required|matches[password]');

        
		if ($this->form_validation->run() == FALSE){
            if($this->input->post()){
				$datos["OP"]="MAL";
			}
        }else{
			$this->load->model("usuarios_model");
			
			//recuperar del form
			$usuario=set_value("nombre"); //metodo form_validation (preferido)
			$password=set_value("password");
			$email=set_value("email");


			if($this->usuarios_model->verif_nombre($usuario)==false and $this->usuarios_model->verif_email($email)==false){
				$this->usuarios_model->agregar($usuario,$email,$password);
				redirect("auth/login"); 
			}else{
				$datos["OP"]="REPETIDO";
			}
                       
        }
		$this->load->view('acceso/crearnuevousuario',$datos);
		
    }


}
