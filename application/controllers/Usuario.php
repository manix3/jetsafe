	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usuario extends CI_Controller {

		public function __construct(){
			parent::__construct();
	     $this->load->database('default');
			 $this->load->helper( array('html','url','form') );
			 $this->load->library(array('form_validation'));
			$this->load->model('Modelo_usuario');

		}
		public function index()
		{
			if($this->session->userdata('logged_in'))
			{
				$resultado['sesion']=$this->session->userdata('logged_in');
				$this->load->view('vista_usuario',$resultado);
			}
			else
			{
				redirect('login', 'refresh');
			}


		}
		public function list_usu()
	  {
	    $res = $this->Modelo_usuario->list_usu();

			$this->output->set_content_type('application/json')
	    ->set_output(json_encode($res));
	  }

		public function get_usu($id)
		{
			$res = $this->Modelo_usuario->get_usu($id);

			$this->output->set_content_type('application/json')
	    ->set_output(json_encode($res));
		}
		public function ins()
		{
			$data = array(
				'nom_usu' => $this->input->post('inp_text2'),
				'pss_usu' => $this->input->post('inp_text3'),
				'ide_tip_usu' => $this->input->post('inp_text4'),
			);
			$res = $this->Modelo_usuario->ins($data);

			$this->output->set_content_type('application/json')
	    ->set_output(json_encode($res));
		}

		public function del()
		{
			$datos = array('is_active_usu' => 0 );
			$id = $this->input->post('inp_text1');
			$res = $this->Modelo_usuario->del($id, $datos);

			$this->output->set_content_type('application/json')
	    ->set_output(json_encode($res));
		}
		public function upd()
		{
			$datos = array(
				'nom_usu' => $this->input->post('inp_text2'),
				'ide_tip_usu' => $this->input->post('inp_text4')
				);
			$id = $this->input->post('inp_text1');
			$res = $this->Modelo_usuario->del($id, $datos);

			$this->output->set_content_type('application/json')
	    ->set_output(json_encode($res));
		}

	}
