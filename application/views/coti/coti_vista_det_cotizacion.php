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
      <?php $this->load->view('coti/menu/menu_izquierda'); ?>
<!-- Fin Principal Izquierda !-->

<!-- Menu Principal Izquierda !-->
<?php
$datos['nombre']=$sesion['nombre'];
$datos['empresa']=$sesion['empresa'];
$this->load->view('menu/menu_superior',$datos);
?>
<!-- Fin Principal Izquierda !-->


<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">

      <div class="row">
               <div class="col-md-11">
                   <section class="widget widget-invoice">
                       <header>
                           <div class="row">
                               <div class="col-sm-6 col-print-6">
                                   <img src="demo/img/logo/invoice-logo.png" alt="Logo" class="invoice-logo" id="img_emp"/>
                               </div>
                               <div class="col-sm-6 col-print-6">
                                   <h3 class="text-align-right">
                                       <span class="fw-semi-bold" id="cot_num"></span> / <small id="cot_fech"></small>
                                   </h3>
                                   <!-- <div class="text-muted fs-larger text-align-right">
                                       Some Invoice number description or whatever
                                   </div> -->
                               </div>
                           </div>
                       </header>
                       <div class="widget-body">
                           <div class="row mb-lg">
                               <section class="col-sm-6 col-print-6">
                                   <h4 class="text-muted no-margin">Informacion  de  la Compañia</h4>
                                   <h3 class="company-name" id="cot_company_name">

                                   </h3>
                                   <address>

                                      <span id="cot_dir"></span><br>
                                      <span id="cot_ruc"></span><br>
                                       <abbr title="Correo corporativo">Correo:</abbr> <a href="mailto:#" id="cot_mail_emp"></a><br>
                                       <abbr title="Telefono">Telefono:</abbr> <span id="cot_tel_emp"></span> <br>

                                   </address>
                               </section>
                               <section class="col-sm-6 col-print-6 text-align-right">
                                   <h4 class="text-muted no-margin">Informacion del Cliente</h4>
                                   <h3 class="client-name" id="cot_nom_cli">

                                   </h3>
                                   <address>

                                       <abbr title="Correo de cliente">Correo:</abbr> <a href="mailto:#" id="cot_email"></a><br>
                                       <abbr title="Telefono de cliente" >Telefono: </abbr> <span id="cot_telefono"></span><br>

                                       <p class="no-margin"><strong>Glosa:</strong></p>
                                       <p class="text-muted fs-mini" id="cot_gls"></p>
                                   </address>
                               </section>
                           </div>
                           <h1>Productos</h1>
                           <hr>
                           <table class="table table-striped">
                               <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Producto</th>
                                   <th class="hidden-xs">Nombre Comercial</th>
                                   <th>Cantidad</th>
                                   <th class="hidden-xs">Precio Lista</th>
                                   <th>Total</th>
                               </tr>
                               </thead>
                               <tbody id="coti_prod">

                               </tbody>

                           </table>
                           <hr>
                           <h4>Archivos</h4>
                           <hr>
                           <table class="table table-striped">
                               <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Archivo</th>
                               </tr>
                               </thead>
                               <tbody id="coti_files">

                               </tbody>

                           </table>
                           <div class="row">
                               <div class="col-sm-8 col-print-6">

                               </div>
                               <div class="col-sm-4 col-print-6">
                                   <div class="row text-align-right">
                                       <div class="col-xs-3"></div> <!-- instead of offset -->
                                       <div class="col-xs-3">
                                           <p>Subtotal</p>
                                           <p>IGV(18%)</p>
                                           <p class="no-margin"><strong>Total</strong></p>
                                       </div>
                                       <div class="col-xs-6">
                                           <p id="cot_sub"><spam class="cot_mone"></spam>  </p>
                                           <p id="cot_igv"><spam class="cot_mone"></spam>  </p>
                                           <p ><spam class="cot_mone"></spam> <strong id="cot_total"> </strong></p>
                                       </div>
                                   </div>
                               </div>
                           </div>

                           <div class="btn-toolbar mt-lg text-align-right hidden-print">
                               <button id="back" class="btn btn-primary">
                                <span class="glyphicon glyphicon-arrow-left"></span>
                               </button>
                               <button id="print" class="btn btn-inverse" >
                                   <span class="glyphicon glyphicon-file"></span>
                                   &nbsp;&nbsp;
                                   PDF
                               </button>
                               <button id="fact" class="btn btn-success" >
                                   <span class="glyphicon glyphicon-file"></span>
                                   &nbsp;&nbsp;
                                   Facturar
                               </button>
                               <button class="btn btn-danger">
                                   Enviar Correo
                                   &nbsp;
                                   <span class="circle bg-white">
                                       <i class="fa fa-arrow-right text-danger"></i>
                                   </span>
                               </button>
                               <p class="text-align-right  mb-xs">
                                  Powered by
                               </p>
                               <p class="text-align-right">
                                   <span class="fw-semi-bold">Smartsol</span>
                               </p>
                           </div>
                       </div>
                   </section>
               </div>
           </div>
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
var ide_cot='<?php echo $this->uri->segment(4) ?>';
//alert(Gruta);
var Gjd=0;



function vermodal() {
    $('#myModalver').modal('show');
}



</script>


<script src="<?php echo base_url(); ?>js/coti/j_cot_vista_det_coti.js"></script>




</body>

</html>
