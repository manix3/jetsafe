<?php /**
 *
 */
class Compras extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Modelo_compras');
  }

  public function index()
  {
    if ($this->session->userdata('logged_in')) {
      $this->load->view('includes/head');
      $this->load->view('includes/header');
      $this->load->view('includes/menu');
      $this->load->view('ver_compras');
      $this->load->view('includes/footer');
    } else {
      redirect('login','refresh');
    }
  }

  public function list_tran($id=null)
  {
    $res = $this->Modelo_compras->list_tran($id);
    if($res){
      foreach ($res as $k => $v) {
        $res[$k]->dominio = $this->Modelo_compras->get_url();

      }
    }
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function list_tramite($id)
  {
    $res['tramites'] = $this->Modelo_compras->list_tramite($id);

    $res['detalle'] = $this->Modelo_compras->list_detalle($id);
    if($res['detalle']){
      foreach ($res['detalle'] as $k => $v) {
        $res['detalle'][$k]->dominio = $this->Modelo_compras->get_url();

      }
    }
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function modal_tramites($id)
  {
    $res = $this->Modelo_compras->list_pedido($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function list_usuarios($id)
  {
    $res = $this->Modelo_compras->list_usuarios($id);
    if($res){
      foreach ($res as $k => $v) {
        $res[$k]->dominio = $this->Modelo_compras->get_url();

      }
    }
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ver($id)
  {
    if ($this->session->userdata('logged_in')) {
      $view['id'] = $id;

      $this->load->view('includes/head');
      $this->load->view('includes/header');
      $this->load->view('includes/menu');
      $this->load->view('ver_transaccion',$view);
      $this->load->view('includes/footer');
    } else {
      redirect('login','refresh');
    }
  }

  public function ver_usuarios($id)
  {
    if ($this->session->userdata('logged_in')) {
      $view['id'] = $id;

      $this->load->view('includes/head');
      $this->load->view('includes/header');
      $this->load->view('includes/menu');
      $this->load->view('ver_usuarios',$view);
      $this->load->view('includes/footer');
    } else {
      redirect('login','refresh');
    }
  }

  public function ver_transaccion_detalle($id)
  {
    if ($this->session->userdata('logged_in')) {
      $view['id'] = $id;

      $this->load->view('includes/head');
      $this->load->view('includes/header');
      $this->load->view('includes/menu');
      $this->load->view('ver_transaccion_detalle',$view);
      $this->load->view('includes/footer');
    } else {
      redirect('login','refresh');
    }
  }

  public function comboselect()
  {
    $res = $this->Modelo_compras->comboselect();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function comboselect_motivos()
  {
    $res = $this->Modelo_compras->comboselect_motivos();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function cambiar_estado()
  {
    $id = $this->input->post('inp_text1');
    $datos = array();
    $datos_log = array();
    $datos_negado = array();
    if ($this->input->post('estado') == '1') {
      $datos_aprobados = array(
        'fecha' => $this->input->post('inp_text2'),
        'nrooperacion' => $this->input->post('inp_text3'),
        'transaccionid' => $id,
        'fechatransaccion' => $this->input->post('fecha')
      );
      $datos_t_transacciones_estado = array(
        'estado' => $this->input->post('estado'),
        'transaccionid' => $id,
        'observacion' => $this->input->post('inp_text3'),
        'fecha' => $this->input->post('inp_text2')
        );

      //envio a t_transacciones
      $this->Modelo_compras->upd_t_transacciones($id,array('estado' => $this->input->post('estado')));
      //envio a t_transacciones_aprobados
      $this->Modelo_compras->ins_t_transacciones_aprobados($datos_aprobados);
      //envio a t_transacciones_estado
      $this->Modelo_compras->ins_t_transacciones_estado($datos_t_transacciones_estado);
      //upd de pedidos
      $id_pedidos = $this->Modelo_compras->get_id_pedidos($id);
      foreach ($id_pedidos as $k => $v) {
        $this->Modelo_compras->upd_pedidos_por_id($v->pedidoid,array('estado' => 4));
        $datos_log[] = array(
          'pedidoid' => $v->pedidoid,
          'estado' => $this->input->post('estado'),
          'observacion' => $this->input->post('inp_text3'),
          'fecha' => $this->input->post('inp_text2')
        );
      }

      //insertar log t_pedidos_estado
      $res = $this->Modelo_compras->ins_t_pedidos_estado($datos_log);

    }
    elseif($this->input->post('estado') == '2') {
      //datos t_transacciones_denegados
      $datos_negado = array(
        'transaccionid' => $id,
        'fechaabono' => $this->input->post('fecha_de_abono'),
        'nroorden' => $this->input->post('nro_orden'),
        'motivoid' => $this->input->post('motivo'),
        'motivodescripcion' => $this->input->post('descripcion'),
        'fecha' => date('Y-m-d H:i:s'),
      );

      //datos t_transacciones_estado
      $datos_estados = array(
        'transaccionid' => $id,
        'estado' => $this->input->post('estado'),
        'observacion' => $this->input->post('observacion'),
        'fecha' => $this->input->post('fecha_negada')
      );

      //envio a t_transacciones
      $this->Modelo_compras->upd_t_transacciones($id,array('estado' => $this->input->post('estado')));
      //envio a t_transacciones_negados
      $this->Modelo_compras->ins_t_transacciones_denegados($datos_negado);
      //envio a t_transacciones_estado
      $this->Modelo_compras->ins_t_transacciones_estado($datos_estados);
      //upd de pedidos
      $id_pedidos = $this->Modelo_compras->get_id_pedidos($id);
      foreach ($id_pedidos as $k => $v) {
        $this->Modelo_compras->upd_pedidos_por_id($v->pedidoid,array('estado' => 5));
        $datos_log[] = array(
          'pedidoid' => $v->pedidoid,
          'estado' => $this->input->post('estado'),
          'observacion' => $this->input->post('observacion_negada'),
          'fecha' => date('Y-m-d H:i:s')
        );
      }

      //insertar log t_pedidos_estado
      $res = $this->Modelo_compras->ins_t_pedidos_estado($datos_log);

    }


    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));


  }


  public function cambiar_estado_pedi()
  {
    $id = $this->input->post('inp_text1');

    $this->Modelo_compras->upd_t_pedidos($id,array('estado' => $this->input->post('estado')));

    $datos = array('fecha' => $this->input->post('fecha_negada'),
    'observacion' => $this->input->post('observacion_negada'),
    'pedidoid' => $id,
    'estado' => $this->input->post('estado'),
      );

    $res = $this->Modelo_compras->ins_log_t_pedido($datos);

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


  public function get_log($tipo,$id=null)
  {
    $res = array();
    if ($tipo == '0') {
      $res = $this->Modelo_compras->get_log_transaccion();
    } elseif ($tipo == '1') {
      $res = $this->Modelo_compras->get_log_pedidos($id);
    }

    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

}
 ?>
