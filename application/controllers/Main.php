<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	var $datos=array();
	
	public function __construct(){
		parent::__construct();		

		if(!$this->session->userdata("uid")){
			redirect("auth");
		}

		$this->datos["usuario_logueado"]=$this->session->userdata("usuario");

	
	}
	
	public function index()
	{
		redirect("main/principal");
	}
	
	public function principal(){
		

		$this->load->view('main/principal',$this->datos);
		
	} 
	public function cambiarpass(){
		
        if(!$this->session->userdata("uid")){
			redirect("auth");
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('passdenuevo', 'Confirmacion', 'required|matches[pass]');
		$this->load->model("usuarios_model");
		if ($this->form_validation->run() == FALSE){
            if($this->input->post()){
				$datos["OP"]="MAL";
			}
        }else{
			$this->usuarios_model->cambiarpass($this->session->userdata["uid"],set_value("pass")) ;     
        }
		$this->datos["usuario_logueado"]=$this->session->userdata["usuario"];
	$this->load->view('main/cambiarpass',$this->datos);
		
	} 


    public function inversiones($id_inv="")
    {
        if(!$this->session->userdata("uid")){
			redirect("auth");
		}
        $this->datos["usuario_logueado"]=$this->session->userdata("usuario");
        $this->datos["id_usuario"]=$this->session->userdata("uid");
        
        $this->load->model("montos_model");
        $this->load->model("inversiones_model");

        $this->load->library("form_validation");
		$this->form_validation->set_rules('monto', 'Monto', 'trim|required|numeric');

        if ($this->form_validation->run() == TRUE) {
            $this->montos_model->agregar(set_value("monto"),$id_inv, $this->datos["id_usuario"]);
            $this->inversiones_model->cambiarbalance($id_inv,$this->montos_model->calcular_acumulado($id_inv));
        }

		$this->datos["montos"]=$this->montos_model->listarporusuario($this->datos["id_usuario"]);
        $this->datos["inversiones"]=$this->inversiones_model->listar_de_usuario($this->datos["id_usuario"]);
		$this->load->view('main/inversiones',$this->datos);

    }

    public function nuevainversion()
    {
        if(!$this->session->userdata("uid")){
			redirect("auth");
		}
        $this->datos["usuario_logueado"]=$this->session->userdata("usuario");
        $this->datos["id_usuario"]=$this->session->userdata("uid");
        
        $this->load->model("montos_model");
        $this->load->model("inversiones_model");

        $this->load->library("form_validation");
		$this->form_validation->set_rules('monto', 'Monto', 'trim|required|numeric');
        $this->form_validation->set_rules('concepto', 'Monto', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $this->inversiones_model->agregar(set_value("monto"),$this->datos["id_usuario"],set_value("concepto"));

            $this->montos_model->agregar(set_value("monto"), $this->inversiones_model->traerultima($this->datos["id_usuario"])["id_inversion"], $this->datos["id_usuario"]); 
            redirect("main/inversiones"); 

        }

        $this->load->view('main/nuevainversion',$this->datos);


    }

    public function borrar($monto_id=""){
        $this->load->model("montos_model");
		$this->montos_model->borrar($monto_id);
		redirect("main/inversiones");
	}
}
