<?php /**
 *
 */
class Cot_vendedor extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('coti/Modelo_cot_vendedor');
        $this->load->model('Modelo_get_vistas');
  }


  public function index($value='')
  {

    if($this->session->userdata('logged_in'))
    {
      $resultado['sesion']=$this->session->userdata('logged_in');
      $have_vis =   $this->Modelo_get_vistas->get_vis_public(2);
      if ($have_vis) {
        $this->load->view($have_vis[0]->ruta,$resultado);
      } else {
        $this->load->view('coti/coti_vista_vendedor',$resultado);
      }


    }
    else
    {
      redirect('login', 'refresh');
    }



  }


  public function ven_list($id=null)
  {

    $res = $this->Modelo_cot_vendedor->ven_list($id);
    $this->output->set_content_type('aplication/json')
    ->set_output(json_encode($res));
  }

  public function ven_ins()
  {
    $sess = $this->session->userdata('logged_in');

    $data = array(
      'ide_empresa' => $sess['ie'] ,
      'ven_nom' => $this->input->post('ven_nom'),
      'ven_ape_pat' => $this->input->post('ven_ape_pat'),
      'ven_ape_mat' => $this->input->post('ven_ape_mat'),
      'ven_doc' => $this->input->post('ven_doc'),
      'ven_dir' => $this->input->post('ven_dir'),
      'ven_ruc' => $this->input->post('ven_ruc'),
      'ven_tel1' => $this->input->post('ven_tel1'),
      'ven_tel2' => $this->input->post('ven_tel2'),
      'ven_tel3' => $this->input->post('ven_tel3'),
      'ven_email' => $this->input->post('ven_email'),
      'ven_gls' => $this->input->post('ven_gls'),
      'ven_fecha_nac' => $this->input->post('ven_fecha_nac') != '' ? $this->input->post('ven_fecha_nac') : Date('Y-m-d'),
      'ven_facebook' => $this->input->post('ven_facebook'),
      'ven_twitter' => $this->input->post('ven_twitter'),
    );

    $res = $this->Modelo_cot_vendedor->ven_ins($data);
    $this->output->set_content_type('aplication/json')
    ->set_output(json_encode($res));
  }

  public function ven_upd()
  {

    $data = array(
      'ven_nom' => $this->input->post('ven_nom'),
      'ven_ape_pat' => $this->input->post('ven_ape_pat'),
      'ven_ape_mat' => $this->input->post('ven_ape_mat'),
      'ven_doc' => $this->input->post('ven_doc'),
      'ven_dir' => $this->input->post('ven_dir'),
      'ven_ruc' => $this->input->post('ven_ruc'),
      'ven_tel1' => $this->input->post('ven_tel1'),
      'ven_tel2' => $this->input->post('ven_tel2'),
      'ven_tel3' => $this->input->post('ven_tel3'),
      'ven_email' => $this->input->post('ven_email'),
      'ven_gls' => $this->input->post('ven_gls'),
      'ven_fecha_nac' => $this->input->post('ven_fecha_nac') != '' ? $this->input->post('ven_fecha_nac') : Date('Y-m-d'),
      'ven_facebook' => $this->input->post('ven_facebook'),
      'ven_twitter' => $this->input->post('ven_twitter'),
    );

    $res = $this->Modelo_cot_vendedor->ven_upd($data);
    $this->output->set_content_type('aplication/json')
    ->set_output(json_encode($res));
  }

  public function ven_del()
  {
    $data = array(
      'is_active' => 0,
     );
    $res = $this->Modelo_cot_vendedor->ven_del($data);
    $this->output->set_content_type('aplication/json')
    ->set_output(json_encode($res));
  }








}
 ?>
