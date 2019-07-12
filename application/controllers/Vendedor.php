<?php
/**
 *
 */
class Vendedor extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if($data['sesion'] = $this->session->userdata('logged_in')){
      $this->load->view('includes/head');
      $this->load->view('includes/header', $data);
      $this->load->view('includes/menu');
      $this->load->view('vendedor');
      $this->load->view('includes/footer');

    }
  }
}

?>
