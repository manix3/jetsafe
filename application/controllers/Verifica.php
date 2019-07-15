<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifica extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->helper( array('html','url','form') );
    $this->load->model('Modelo_usuario','',TRUE);
  }

  function index()
  {


    //This method will have the credentials validation
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
    if($this->form_validation->run() == FALSE)
    {

      $this->load->view('vista_login');

    }
    else
    {
      redirect('Home', 'refresh');

    }

  }

  function check_database($password)
  {

    $res = $this->Modelo_usuario->login($this->input->post('username'), $password);
    if($res)
    {
      $sess_array = array(
        'SES_NOMBRE' => $res[0]->nombres,
        'SES_EMAIL' => $res[0]->usuario,
        'SES_USERID' => $res[0]->usuarioid,
        'SES_TIPO' => $res[0]->admin,
      );
      $this->session->set_userdata('logged_in', $sess_array);
      return true;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Error - Datos no validos');
      return false;
    }
  }

  public function logout()
   {
     /*session_start(); */
     $this->session->unset_userdata('logged_in');
     session_destroy();
     redirect('login', 'refresh');
   }



   public function forgetTuto($id)
   {
     $res = $this->Modelo_usuario->forgetTuto($id);
     return $res;
   }

}
?>
