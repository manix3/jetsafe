<?php /**
 *
 */
class Seguimientos_obras extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Modelo_seguimientos_obras');
  }

  public function list_obras()
  {
    if ($this->session->userdata('logged_in')) {
      $data['sesion'] = $this->session->userdata('logged_in');

      $this->load->view('includes/head');
      $this->load->view('includes/header');
      $this->load->view('includes/menu');
      $this->load->view('list_obras');
      $this->load->view('includes/footer');

    } else {
      redirect('login','refresh');
    }
  }

  public function list($id=null)
  {

    $cod_obr = $this->input->post('cod_obr');
    $tipo = $this->input->post('tipo');
    $categoria = $this->input->post('categoria');
    $banco = $this->input->post('banco');


    $res = $this->Modelo_seguimientos_obras->list($id,$cod_obr,$tipo,$categoria,$banco);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }

  public function ins()
  {

      $final_image='';
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
      $path = "./uploads/";

      if(isset($_FILES['imgInp']))
      {
       $img = $_FILES['imgInp']['name'];
       $tmp = $_FILES['imgInp']['tmp_name'];
       $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));



       if(in_array($ext, $valid_extensions))
       {
         $final_image = rand(1000,1000000).$img;
         $path = $path.$final_image;

        if(move_uploaded_file($tmp,$path))
        {
      //   echo "<img src='$path' />";
        }
       }
       else
       {
         $final_image = "notfound.png";
       }
     }else {
       $final_image = "notfound.png";
     }

    $datos = array(
                'ide_obra' => $this->input->post('inp_text2'),
                'ide_tip_seg' => $this->input->post('inp_text3'),
                'categoria_seg_obr' => $this->input->post('inp_text4'),
                'det_seg_obr' => $this->input->post('inp_text5'),
                'cant_seg_obr' => $this->input->post('inp_text6'),
                'mon_seg_obr' => $this->input->post('inp_text7'),
                'ide_banco' => $this->input->post('inp_text8'),
                'tip_doc' => $this->input->post('inp_text9'),
                'num_doc' => $this->input->post('inp_text10'),
                'empresa' => $this->input->post('inp_text11'),
                'img_seg_obr' => $final_image,
                'usu_seg_obr' => $this->session->userdata('logged_in')['id'],

                  );

      $res = $this->Modelo_seguimientos_obras->ins($datos);
      $this->output->set_content_type('application/json')
      ->set_output(json_encode($res));
  }

  public function ins_admin()
  {
    $datos = array();
    $contador = $this->input->post('contador');
    $final_image='';
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
    $path = "./uploads/";

    if(isset($_FILES['imgInp']))
    {
      $img = $_FILES['imgInp']['name'];
      $tmp = $_FILES['imgInp']['tmp_name'];
      $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));



      if(in_array($ext, $valid_extensions))
      {
        $final_image = rand(1000,1000000).$img;
        $path = $path.$final_image;

        if(move_uploaded_file($tmp,$path))
        {
          //   echo "<img src='$path' />";
        }
      }
      else
      {
        $final_image = "notfound.png";
      }
    }else {
      $final_image = "notfound.png";
    }


      for ($i=0; $i < $contador + 1; $i++) {

        $datos[] = array(
          'ide_obra' => $this->input->post('inp_text2_'.$i),
          'ide_tip_seg' => $this->input->post('inp_text3_'.$i),
          'categoria_seg_obr' => $this->input->post('inp_text4_'.$i),
          'det_seg_obr' => $this->input->post('inp_text5_'.$i),
          'cant_seg_obr' => $this->input->post('inp_text6_'.$i),
          'mon_seg_obr' => $this->input->post('inp_text7_'.$i),
          'ide_banco' => $this->input->post('inp_text8_'.$i),
          'tip_doc' => $this->input->post('inp_text9_'.$i),
          'num_doc' => $this->input->post('inp_text10_'.$i),
          'empresa' => $this->input->post('inp_text11_'.$i),
          'img_seg_obr' => $final_image,
          'usu_seg_obr' => $this->session->userdata('logged_in')['id'],

        );

    }
    // print_r($datos);
    $res = $this->Modelo_seguimientos_obras->ins_admin($datos);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));

  }

  public function list_obras_combo()
  {
    $res = $this->Modelo_seguimientos_obras->list_obras_combo();
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }


  public function get_by_rank()
  {
    $fecha = $this->input->post('fecha');
    $fe_ex = explode(" ",$fecha);

    $fech1= strtotime($fe_ex[0]);
    $fech2= strtotime($fe_ex[2]);

    $fecha1= date('Y-m-d',$fech1);
    $fecha2= date('Y-m-d',$fech2);

    if ($fecha1 === $fecha2) {
          $fecha2 = null;
    }
    // echo($fecha1.'-'.$fecha2);
    $res = $this->Modelo_seguimientos_obras->get_by_rank($fecha1,$fecha2);
    $this->output->set_content_type('application/json')
    ->set_output(json_encode($res));
  }



}
 ?>
