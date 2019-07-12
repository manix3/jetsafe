<?php /**
 *
 */
class Metodo_pago extends CI_Controller
{

  function __construct()
  {
      parent::__construct();
      $this->load->model('Modelo_met_pago');
  }


  public function index()
  {
    if($data['sesion'] = $this->session->userdata('logged_in')){

      $this->load->view('includes/head');
      $this->load->view('includes/header', $data);
      $this->load->view('includes/menu');
      $this->load->view('metodo_pago');
      $this->load->view('includes/footer');

    }else {
      redirect('login','refresh');
    }
  }


  public function list_met_pag($id=null)
  {

    if($data['sesion'] = $this->session->userdata('logged_in')){

      $res = $this->Modelo_met_pago->list_met_pag($id);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));

    }else {
      $this->output->set_content_type('application/json')
      ->set_output(json_encode(false));
    }

  }



  public function upd_met_pago()
  {
    if($this->session->userdata('logged_in')){

      $datos = array(
      'titulo' => $this->input->post('inp_text2'),
      'observacion' => $this->input->post('observacion'),
      'notificacion' => $this->input->post('inp_text3'),
      'titulo_en' => $this->input->post('inp_text4'),
      'observacion_en' => $this->input->post('observacion_en'),
      'orden' => $this->input->post('inp_text5'),
      'estado' => $this->input->post('inp_text6'),
      'activo_turista' => $this->input->post('inp_text7'),

       );
      $res = $this->Modelo_met_pago->upd_met_pago($datos);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));

    }else {
      $this->output->set_content_type('application/json')
      ->set_output(json_encode(false));
    }
  }


}
 ?>
