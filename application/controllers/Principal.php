<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database('default');
		/*-- Funciones asistentes [P. 49] --*/
		$this->load->helper( array('html','url','form') );
		//$this->check_isvalidated();
		//	$this->check_isvalidated();
		$this->load->library(array('form_validation'));
		//$this->load->model('Modelo_man_tip_eve');

	}
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$resultado['sesion']=$this->session->userdata('logged_in');
			//$resultado['iconos'] = $this->Modelo_man_tip_eve->listar('null');
			$this->load->view('vista_home',$resultado);
		}
		else
		{
			redirect('login', 'refresh');
		}
	}
}
