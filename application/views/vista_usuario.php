<!DOCTYPE html>
<html>
<head>
  <title>SMARTPYME</title>
    <link href="<?php echo base_url(); ?>css/ol/ol.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/ol/ol3-layerswitcher.css" rel="stylesheet">
          <link href="<?php echo base_url(); ?>css/ol/ol-popup.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/application.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/propio.css" rel="stylesheet">

        <!-- as of IE9 cannot parse css files with more that 4K classes separating in two files -->
    <!--[if IE 9]>
        <link href="css/application-ie9-part2.css" rel="stylesheet">
    <![endif]-->
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
         chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
         https://code.google.com/p/chromium/issues/detail?id=332189
         */
    </script>
</head>
<body>
  <!-- Menu Principal Izquierda !-->
        <?php $this->load->view('menu/menu_izq_public'); ?>
  <!-- Fin Principal Izquierda !-->

  <!-- Menu Principal Izquierda !-->
  <?php
  $datos['empresa']=$sesion['empresa'];
  $datos['nombre']=$sesion['nombre'];
  $datos['empresa']=$sesion['empresa'];
  $this->load->view('menu/menu_superior',$datos);
  ?>
  <!-- Fin Principal Izquierda !-->



<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">


        <div class="row"> <!-- Inicio tabla !-->
<h1 class="page-title ng-scope">Mi <span class="fw-semi-bold">Cuenta</span></h1>
            <div class="col-md-12">
              <section class="widget">
                <div class="widget-body">
                  <div class="widget-top-overflow text-white">
                    <div class="height-250 overflow-hidden">
                      <img class="img-responsive" src="<?= base_url() ?>demo/img/pictures/20.jpg">
                    </div>

                    <?php $res = $this->session->userdata('logged_in');?>
                    <?php if ($res['nivel'] < 2): ?>
                      <div class="btn-toolbar">
                        <a href="#" class="btn btn-outline btn-sm pull-right" id="edit_emp"></i>Editar Empresa</a>
                      </div>
                    <?php else: ?>
                      <div class="btn-toolbar">
                        <a href="#" class="btn btn-outline btn-sm pull-right" id="edit_user"></i>Editar</a>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 text-center">
                    <div class="post-user post-user-profile">
                      <span class="thumb-xlg"><img class="img-circle" src="<?= base_url() ?>demo/img/people/a5.jpg" alt="..." id="img_user"></span>
                      <h4 class="fw-normal" id="username"></h4>
                      <p id="empresa"></p>
                      <p id="ruc"></p>
                      <ul class="contacts">
                        <li><i class="fa fa-phone fa-fw mr-xs"></i><a href="#" id="phone">+375 29 555-55-55</a></li>
                        <li><i class="fa fa-envelope fa-fw mr-xs"></i><a href="#" id="mail">psmith@example.com</a></li>
                        <li><i class="fa fa-map-marker fa-fw mr-xs"></i><a href="#"  id="dir">Minsk, Belarus</a></li>
                      </ul>
                    </div>
                  </div>
               </div>
             </div>
            </section>
            </div>
          </div>
        </div> <!-- Fin tabla !-->


    </main>
</div>
<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>

<!-- common libraries. required for every page-->
<script src="<?php echo base_url(); ?>vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/modal.js"></script>
<script src="<?php echo base_url(); ?>vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/widgster/widgster.js"></script>
<script src="<?php echo base_url(); ?>vendor/pace.js/pace.js" data-pace-options='{ "target": ".content-wrap", "ghostTime": 1000 }'></script>
<script src="<?php echo base_url(); ?>vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>

<!-- common app js -->
<script src="<?php echo base_url(); ?>js/settings.js"></script>
<script src="<?php echo base_url(); ?>js/app.js"></script>
<script src="<?php echo base_url(); ?>js/propios.js"></script>
<!-- page specific libs -->
<script id="test" src="<?php echo base_url(); ?>vendor/underscore/underscore.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery.sparkline/index.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery.sparkline/index.js"></script>
<script src="<?php echo base_url(); ?>vendor/d3/d3.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/parsleyjs/dist/parsley.min.js"></script>

<script src="<?php echo base_url(); ?>js/ol/ol.js"></script>
<script src="<?php echo base_url(); ?>js/ol/ol-popup.js"></script>
<script src="<?php echo base_url(); ?>js/ol/ol3-layerswitcher.js"></script>



<script src="<?php echo base_url(); ?>vendor/datatables/media/js/jquery.dataTables.js"></script>
<!-- <script src="<?php echo base_url(); ?>https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<script src="<?php echo base_url(); ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>




<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/popover.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap_calendar/bootstrap_calendar/js/bootstrap_calendar.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery-animateNumber/jquery.animateNumber.min.js"></script>
<!--
<script src="<?php echo base_url(); ?>http://maps.google.com/maps/api/js?key=AIzaSyD3U7UcjNTdj-DTdJBfI2PlPNvrrVVN8h8&v=3.2"></script>
!-->
<!-- page specific js -->
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/tab.js"></script>
<!-- Formularios !-->
<script src="<?php echo base_url(); ?>vendor/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>




<script>

// Globales
var Gusuario=<?PHP echo $sesion['id']; ?>;
var Gentidad=<?PHP echo $sesion['ie']; ?>;
var Gruta='<?php echo base_url(); ?>';
//alert(Gruta);
var Gjd=0;



function vermodal() {
    $('#myModalver').modal('show');
}



</script>
<script src="<?php echo base_url(); ?>js/j_vista_usuario.js"></script>

<!-- Modal para ver Registro !-->
<div class="modal fade" id="myModalver" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Datos detalle de movimiento</h3>

      </div>
      <div class="modal-body">


        <table class="table table-striped">

            <tbody id="detalle_registro">

            </tbody>
        </table>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
<!--Fin Modal para ver Registro !-->
<!--Inicio  Modal  Editar !-->
<div class="modal fade" id="myModaledita" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModaleditaLabel">Datos Estado Evento</h3>
      </div>
      <div class="modal-body">
        <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden">
        <input id="ide" name="ide" class="form-control" placeholder="" readonly="true" value='' type="hidden">

          <fieldset>

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Ususario</label>
              <div class="col-sm-7">
                <input id="inp_text3" name="inp_text3" class="form-control" placeholder=""  value='xxx' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Nombre</label>
              <div class="col-sm-7">
                <input id="inp_text1" name="inp_text1" class="form-control" placeholder=""  value='xxx' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Apellido</label>
              <div class="col-sm-7">
                <input id="inp_text2" name="inp_text2" class="form-control" placeholder="" required="required" value='sss' type="text">
              </div>
            </div>

          </fieldset>




      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </form>


  </div>
</div>





<div class="modal fade" id="myModaleditaEMP" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="form1" class="form-horizontal form-label-left " data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModaleditaLabel">Datos Estado Evento</h3>
      </div>
      <div class="modal-body">
        <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden">
        <input id="ide" name="ide" class="form-control" placeholder="" readonly="true" value='' type="hidden">
        <input id="idee" name="idee" class="form-control" placeholder="" readonly="true" value='' type="hidden">

        <fieldset>

              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">Nombre</label>
                <div class="col-sm-7">
                  <input id="inp_text1" name="inp_text1" class="form-control" placeholder=""  value='xxx' type="text">
                </div>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">Apellido</label>
                <div class="col-sm-7">
                  <input id="inp_text2" name="inp_text2" class="form-control" placeholder="" required="required" value='sss' type="text">
                </div>
              </div>
              <!-- <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">Contraseña</label>
                <div class="col-sm-7">
                <div class="input-group">
                  <input type="password" class="form-control" id="inp_text9" name="inp_text9"> <span class="input-group-btn"><button type="button" class="btn btn-default" id="mc"><i class="glyphicon glyphicon-eye-open"></i></button></span>
                </div>
                </div>
              </div> -->
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">Empresa</label>
                <div class="col-sm-7">
                  <input id="inp_text3" name="inp_text3" class="form-control" placeholder="" required="required" value='sss' type="text">
                </div>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">Ruc</label>
                <div class="col-sm-7">
                  <input id="inp_text7" name="inp_text7" class="form-control" placeholder="" required="required" value='sss' type="text">
                </div>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">Telefono</label>
                <div class="col-sm-7">
                  <input id="inp_text4" name="inp_text4" class="form-control" placeholder="" required="required" value='sss' type="text">
                </div>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">Correo</label>
                <div class="col-sm-7">
                  <input id="inp_text5" name="inp_text5" class="form-control" placeholder="" required="required" value='sss' type="mail">
                </div>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">Direccion</label>
                <div class="col-sm-7">
                  <input id="inp_text6" name="inp_text6" class="form-control" placeholder="" required="required" value='sss' type="text">
                </div>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">Firma</label>
                <div class="col-sm-7">
                  <textarea id="inp_text8" name="inp_text8" class="form-control" placeholder="" required="required" value='sss' type="text"></textarea>
                </div>
              </div>


              <div class="panel">
                <div class="col-md-12">
                    <div class="form-group" id="group_img">
                        <label>Imagen de la Empresa</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Buscar… <input type="file" id="imgInp" name="imgInp">
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                    <!--<img id='img-upload'  class="img-responsive" />-->
                    </div>
                </div>
              </div>


            </fieldset>



      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </form>


  </div>
</div>
<!--Fin Modal Editar !-->

<!--MODAL ELIMINAR-->

<div class="modal fade" id="myModalborrar" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="">Eliminar Usuario</h3>
      </div>
      <div class="modal-body">


        <p>¿Esta seguro de eliminar Usuario?</p>

        <input id="nom" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden">
        <input id="ide" name="ide" class="form-control" placeholder=""  value='' type="hidden">


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Si</button>
      </div>
    </div>
 </form>
  </div>
</div>
<!--MODAL ELIMINAR-->


</body>

</html>
