<?php /**
 *
 */
class Cot_mantenimiento extends CI_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('coti/Modelo_Cot_mantenimiento');
  }



  /*----------------------------------------Estado de Cotizacion----------------------------------------*/


  public function vista_est_coti()
  {
    if($this->session->userdata('logged_in'))
		{
			$resultado['sesion']=$this->session->userdata('logged_in');
			$this->load->view('coti/coti_vista_est_coti',$resultado);
		}
		else
		{
			redirect('login', 'refresh');
		}
  }

  public function est_Coti_listar($id=null)
  {
    $resultado = $this->Modelo_Cot_mantenimiento->est_Coti_listar($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }

    public function est_Coti_ins()
    {

    			$sess=$this->session->userdata('logged_in');
    			$s_ni=$sess['nivel'];
    			$s_ie=$sess['ie'];
    			$s_id=$sess['id'];
    			$datos = array(
    				'det_est_cot' => $this->input->post('inp_text2'),
           );
    			 $res = $this->Modelo_Cot_mantenimiento->est_Coti_ins($datos);
    			 $this->output->set_content_type('application/json')
     			->set_output(json_encode( $res ));
      }

  public function est_Coti_upd()
  {
    			$sess=$this->session->userdata('logged_in');
    			$s_ni=$sess['nivel'];
    			$s_ie=$sess['ie'];
    			$s_id=$sess['id'];

    			$datos = array(
    				'det_est_cot' => $this->input->post('inp_text2'),
    			 );

    			 $res = $this->Modelo_Cot_mantenimiento->est_Coti_upd($datos,$s_ie);
    			 $this->output->set_content_type('application/json')
     			->set_output(json_encode( $res ));
  }

  public function est_Coti_del()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];


    $datos = array(
      'is_active' => 0,
     );
     $res = $this->Modelo_Cot_mantenimiento->est_Coti_del($datos,$s_ie);
     $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));
  }

  /*----------------------------------------Moneda----------------------------------------*/



    public function vista_tip_moneda()
    {
      if($this->session->userdata('logged_in'))
  		{
  			$resultado['sesion']=$this->session->userdata('logged_in');
  			$this->load->view('coti/coti_vista_tip_moneda',$resultado);
  		}
  		else
  		{
  			redirect('login', 'refresh');
  		}
    }

  public function tip_Mon_listar($id= null)
  {
    $resultado = $this->Modelo_Cot_mantenimiento->tip_Mon_listar($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode( $resultado ));
  }

  public function tip_Mon_ins()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];
    $datos = array(
      'detalle_tip_mon' => $this->input->post('inp_text2'),
      'sim_moneda' => $this->input->post('inp_text3'),
      'ide_empresa'  =>$s_ie,
     );
     $res = $this->Modelo_Cot_mantenimiento->tip_Mon_ins($datos);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }

  public function tip_Mon_upd()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];

    $datos = array(
      'detalle_tip_mon' => $this->input->post('inp_text2'),
      'sim_moneda' => $this->input->post('inp_text3'),
     );

     $res = $this->Modelo_Cot_mantenimiento->tip_Mon_upd($datos,$s_ie);
     $this->output->set_content_type('application/json')
    ->set_output(json_encode( $res ));
  }

  public function tip_Mon_del()
  {
    $sess=$this->session->userdata('logged_in');
    $s_ni=$sess['nivel'];
    $s_ie=$sess['ie'];
    $s_id=$sess['id'];


    $datos = array(
      'is_active' => 0,
     );
     $res = $this->Modelo_Cot_mantenimiento->tip_Mon_del($datos,$s_ie);
     $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));
  }


}
 ?>
