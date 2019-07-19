<?php /**
 *
 */
class Home extends CI_Controller
{

  function __construct()
  {
      parent::__construct();
      $this->load->model('Modelo_home');
  }

  public function index()
  {

    if ($this->session->userdata('logged_in')) {

        $data['sesion'] = $this->session->userdata('logged_in');
        $this->load->view('includes/head');
        $this->load->view('includes/header',$data);
        $this->load->view('includes/menu');
        $this->load->view('plantilla');
        $this->load->view('includes/footer');

    } else {
      redirect('login','refresh');
    }

  }

  public function pedidos()
  {
    $f=date("Y-m-d");
    $flastseven = array();
    $res = array();
    for( $i = 0; $i < 7; $i++ ){
    $flastseven[$i] = date("Y-m-d", strtotime("$f   -$i day"));
    $res['t_pedido'][$i]['fecha'] = $flastseven[$i];
    $res['t_pedido'][$i]['nro_pedido_por_dia'] = $this->Modelo_home->get_t_pedido($flastseven[$i]);

    $res['t_pedido_detalle'][$i]['fecha'] = $flastseven[$i];
    $res['t_pedido_detalle'][$i]['nro_producto_por_dia'] = $this->Modelo_home->get_pedido_detalle($flastseven[$i]);
    }

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }



}
 ?>
