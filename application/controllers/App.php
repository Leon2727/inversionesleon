<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	protected $datos=array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model("montos_model");
	}

	public function index()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('monto', 'Monto', 'trim|required|numeric');

		if ($this->form_validation->run() == TRUE) {
			$this->montos_model->agregar(set_value("monto"));
			redirect("app");
		}

		$this->datos["aculmulado"]=$this->montos_model->calcular_acumulado();
		$this->datos["montos"]=$this->montos_model->listar();
		$this->load->view('interfaz',$this->datos);
	}


}
