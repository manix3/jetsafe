<?php /**
 *
 */
class Donaciones extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
      $this->load->model('social/Modelo_donaciones');
  }

  public function index()
  {
      if($this->session->userdata('logged_in'))
      {
        $resultado['sesion']=$this->session->userdata('logged_in');
        $this->load->view('social/vista_donaciones',$resultado);
      }
      else
      {
        redirect('login', 'refresh');
      }
    }


    public function don_list($id=null)
    {
      $res = $this->Modelo_donaciones->don_list($id);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));
    }


    public function don_ins()
    {
      $sess=$this->session->userdata('logged_in');
      $s_ni=$sess['nivel'];
      $s_ie=$sess['ie'];
      $s_id=$sess['id'];

        $datos = array(
        // 'ide_per' => $this->input->post('ide_per'),
        'ide_int' => $this->input->post('ide_int'),
        'ide_tip_don' => $this->input->post('ide_tip_don'),
        'fil_don' => $this->input->post('fil_don'),
        'val_ref_don' => $this->input->post('val_ref_don'),
        'val_rea_don' => $this->input->post('val_rea_don'),
        'fec_don' => $this->input->post('fec_don'),
        'gls_don' => $this->input->post('gls_don'),
        'ide_est_don' => $this->input->post('ide_est_don'),
        'ide_empresa' => $s_ie,
        'ide_eve' => $this->input->post('ide_eve'),
        );
      $res = $this->Modelo_donaciones->don_ins($datos);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));

    }
    public function don_upd()
    {
        $datos = array(

        'ide_per' => $this->input->post('ide_per'),
        'ide_int' => $this->input->post('ide_int'),
        'ide_tip_don' => $this->input->post('ide_tip_don'),
        'fil_don' => $this->input->post('fil_don'),
        'val_ref_don' => $this->input->post('val_ref_don'),
        'val_rea_don' => $this->input->post('val_rea_don'),
        'fec_don' => $this->input->post('fec_don'),
        'gls_don' => $this->input->post('gls_don'),
        'ide_est_don' => $this->input->post('ide_est_don'),
        'ide_eve' => $this->input->post('ide_eve'),
        );
      $res = $this->Modelo_donaciones->don_upd($datos);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));

    }


    public function don_del()
    {
      $res = $this->Modelo_donaciones->don_del();
      $this->output->set_content_type('application/json')
      ->set_output(json_encode( $res ));

    }

  }  ?>
