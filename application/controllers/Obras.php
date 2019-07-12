<?php /**
 *
 */
class Obras extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Modelo_obras');
  }

  public function index()
  {
    if ($this->session->userdata('logged_in')) {
      $data['sesion'] = $this->session->userdata('logged_in');

      $this->load->view('includes/head');
      $this->load->view('includes/header');
      $this->load->view('includes/menu',$data);
      $this->load->view('obras');
      $this->load->view('includes/footer');


    } else {
      redirect('login','refresh');
    }
  }

  public function list($id = null)
  {
    $res = $this->Modelo_obras->list($id);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ins()
  {
    $datos = array(
                  'cod_obr' => $this->input->post('inp_text2'),
                  'tit_obr' => $this->input->post('inp_text3'),
                  'des_obr' => $this->input->post('inp_text4'),
                  'ide_presu' => 1,
                  'caja_chica_obr' => $this->input->post('inp_text6'),
                  'usu_obr' => $this->session->userdata('logged_in')['id'],
                  'fecha_obr' => $this->input->post('inp_text7'),
                  'dir_obra' => $this->input->post('inp_text8'),
                  'ide_est_obr' => $this->input->post('inp_text9'),
                  'mon_tot_obr' => $this->input->post('inp_text10'),
                   );

    $res = $this->Modelo_obras->ins($datos);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function list_presupuesto()
  {
    $res=$this->Modelo_obras->list_presupuesto();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function count()
  {
    $res = $this->Modelo_obras->count();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ins_csv($bin)
  {

      $var = '';
      $data = array();
      $res = '';
      $ide = '';
       if($bin == 0){
         $dat = array(
           'est_pre' => $this->input->post('total'),
           'cod_obr' => $this->input->post('cod_obr'),
         );

         $ide = $this->Modelo_obras->ins_pres($dat);
       }

      $tipo = $_FILES['archivo']['type'];

      $tamanio = $_FILES['archivo']['size'];

      $archivotmp = $_FILES['archivo']['tmp_name'];

      //cargamos el archivo
      $lineas = file($archivotmp);

      //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
      $i=0;
      $total = 0;
      //Recorremos el bucle para leer línea por línea

      foreach ($lineas as $linea_num => $linea)
      {
        //abrimos bucle
        /*si es diferente a 0 significa que no se encuentra en la primera línea
        (con los títulos de las columnas) y por lo tanto puede leerla*/
        if($i != 0)
        {
          $datos = explode(",",$linea);
          $ix = count($datos);
          if ($ix > 5) {
            // code...
            if($bin == 1){

              $data[strtoupper($datos[0])][] = array(
                'categoria' => $datos[0] ,
                'codigo' => $datos[1],
                'nombre' => $datos[2],
                'unidad' => $datos[3],
                'cantidad' => $datos[4],
                'precio' => $datos[5],
                'parcial' => (float) $datos[6],

              );
              $var = 'vista previa';
            }else{
              $datos = explode(",",$linea);
              $data = array(
                'categoria' => $datos[0] ,
                'codigo' => $datos[1],
                'nombre' => $datos[2],
                'unidad' => $datos[3],
                'cantidad' => $datos[4],
                'precio' => $datos[5],
                'parcial' => $datos[6],
                'ide_obra' => $this->input->post('id'),
                'ide_pres' => $ide
              );
              $res = $this->Modelo_obras->ins_csv($data);
              $var = 'guardado';

            }
          }else{
            $var = 'no format';
            $res = false;

          }
        }

        $i++;

      }
    switch ($var) {
      case 'vista previa':
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($data));
        break;
      case 'guardado':
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
        break;
      case 'no format':
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
        break;

    }

  }

  public function verify($cod)
  {

    $res = $this->Modelo_obras->verify($cod);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }
}
 ?>
