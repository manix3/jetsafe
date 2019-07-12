<?php

/**
 *
 */
class Mantenimiento extends CI_Controller
{

  public function __construct(){
    parent::__construct();
    $this->load->model('Modelo_usuario');
    $this->load->model('Modelo_bancos');
  }



  public function Usuarios()
  {
    if ($this->session->userdata('logged_in')) {
      if ($this->session->userdata('logged_in')['tipo'] <= 2) {
        $data['sesion'] = $this->session->userdata('logged_in');
        $this->load->view('includes/head');
        $this->load->view('includes/header',$data);
        $this->load->view('includes/menu');
        $this->load->view('Usuarios');
        $this->load->view('includes/footer');
      } else {
      redirect('clientes','refresh');
      }
    } else {
      redirect('login','refresh');
    }
  }
  public function Bancos()
  {
    if ($this->session->userdata('logged_in')) {
      if ($this->session->userdata('logged_in')['tipo'] <= 2) {
        $data['sesion'] = $this->session->userdata('logged_in');
        $this->load->view('includes/head');
        $this->load->view('includes/header',$data);
        $this->load->view('includes/menu');
        $this->load->view('bancos_view');
        $this->load->view('includes/footer');
      } else {
      redirect('clientes','refresh');
      }
    } else {
      redirect('login','refresh');
    }
  }
  public function Categorias()
  {
    if ($this->session->userdata('logged_in')) {
      if ($this->session->userdata('logged_in')['tipo'] <= 2) {
        $data['sesion'] = $this->session->userdata('logged_in');
        $this->load->view('includes/head');
        $this->load->view('includes/header',$data);
        $this->load->view('includes/menu');
        $this->load->view('categorias_view');
        $this->load->view('includes/footer');
      } else {
      redirect('clientes','refresh');
      }
    } else {
      redirect('login','refresh');
    }
  }
  public function Fianza()
  {
    if ($this->session->userdata('logged_in')) {
      if ($this->session->userdata('logged_in')['tipo'] <= 2) {
        $data['sesion'] = $this->session->userdata('logged_in');
        $this->load->view('includes/head');
        $this->load->view('includes/header',$data);
        $this->load->view('includes/menu');
        $this->load->view('fianza_view');
        $this->load->view('includes/footer');
      } else {
      redirect('clientes','refresh');
      }
    } else {
      redirect('login','refresh');
    }
  }
  public function Mano_de_obra()
  {
    if ($this->session->userdata('logged_in')) {
      if ($this->session->userdata('logged_in')['tipo'] <= 2) {
        $data['sesion'] = $this->session->userdata('logged_in');
        $this->load->view('includes/head');
        $this->load->view('includes/header',$data);
        $this->load->view('includes/menu');
        $this->load->view('obra_view');
        $this->load->view('includes/footer');
      } else {
      redirect('clientes','refresh');
      }
    } else {
      redirect('login','refresh');
    }
  }
  public function Materiales()
  {
    if ($this->session->userdata('logged_in')) {
      if ($this->session->userdata('logged_in')['tipo'] <= 2) {
        $data['sesion'] = $this->session->userdata('logged_in');
        $this->load->view('includes/head');
        $this->load->view('includes/header',$data);
        $this->load->view('includes/menu');
        $this->load->view('materiales_view');
        $this->load->view('includes/footer');
      } else {
      redirect('clientes','refresh');
      }
    } else {
      redirect('login','refresh');
    }
  }
  public function Profesionales()
  {
    if ($this->session->userdata('logged_in')) {
      if ($this->session->userdata('logged_in')['tipo'] <= 2) {
        $data['sesion'] = $this->session->userdata('logged_in');
        $this->load->view('includes/head');
        $this->load->view('includes/header',$data);
        $this->load->view('includes/menu');
        $this->load->view('profesionales_view');
        $this->load->view('includes/footer');
      } else {
      redirect('clientes','refresh');
      }
    } else {
      redirect('login','refresh');
    }
  }
  public function Unidades()
  {
    if ($this->session->userdata('logged_in')) {
      if ($this->session->userdata('logged_in')['tipo'] <= 2) {
        $data['sesion'] = $this->session->userdata('logged_in');
        $this->load->view('includes/head');
        $this->load->view('includes/header',$data);
        $this->load->view('includes/menu');
        $this->load->view('unidades_view');
        $this->load->view('includes/footer');
      } else {
      redirect('clientes','refresh');
      }
    } else {
      redirect('login','refresh');
    }
  }


  public function list_bancos()
  {
    $res = $this->Modelo_bancos->list_bancos();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
}


 ?>
