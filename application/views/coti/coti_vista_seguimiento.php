<!DOCTYPE html>
<html>
<head>
    <title>SMARTPYME INVENTARIO</title>
    <link href="css/ol/ol.css" rel="stylesheet">
        <link href="css/ol/ol3-layerswitcher.css" rel="stylesheet">
          <link href="css/ol/ol-popup.css" rel="stylesheet">
    <link href="css/application.min.css" rel="stylesheet">
    <link href="css/propio.css" rel="stylesheet">

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
<!--
  Main sidebar seen on the left. may be static or collapsing depending on selected state.

    * Collapsing - navigation automatically collapse when mouse leaves it and expand when enters.
    * Static - stays always open.
-->
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
        <?php // print_r($nro_servicios) ?>

        <?php
$tn_servicios=0;
$tn_serv_pend=0;
$tn_serv_prog=0;
$tn_serv_term=0;
//print_r($nro_servicios);
//echo "NRO ".count($nro_servicios);
if($nro_servicios) {
  //print_r($nro_servicios);
        foreach ($nro_servicios as $nro) {
          $tn_servicios=$tn_servicios+intval($nro->count);
        $total_servicios[$nro->esr_detalle]=$nro->count;
}
if(isset($total_servicios['PENDIENTE'])) {
$tn_serv_pend=$total_servicios['PENDIENTE'];};
if(isset($total_servicios['EN PROGRESO'])) {
$tn_serv_prog=$total_servicios['EN PROGRESO'];
}
if(isset($total_servicios['TERMINADO'])) {
$tn_serv_term=$total_servicios['TERMINADO'];
}
}
//print_r($total_servicios);
 ?>


                  <div class="col-md-3 col-sm-6" id="boton1">
                      <section class="widget bg-primary text-white">
                          <div class="widget-body clearfix">
                              <div class="row">
                                  <div class="col-xs-3" >
                                      <span class="widget-icon">
                                          <i class="glyphicon glyphicon-globe"></i>
                                      </span>
                                  </div>
                                  <div class="col-xs-9">
                                      <h5 class="no-margin">TOTAL DE COTIZACIONES </h5>
                                      <p class="h2 no-margin fw-normal"><?php echo $tn_servicios ?></p>
                                  </div>
                              </div>
                              <!--<div class="row">
                                  <div class="col-xs-6">
                                      <h5 class="no-margin">Registrations</h5>
                                      <p class="value4">+830</p>
                                  </div>
                                  <div class="col-xs-6">
                                      <h5 class="no-margin">Bounce Rate</h5>
                                      <p class="value4">4.5%</p>
                                  </div>
                              </div>-->
                          </div>
                      </section>
                  </div>
                  <div class="col-md-3 col-sm-6" id="boton2">
                      <section class="widget bg-info text-white">
                          <div class="widget-body clearfix">
                              <div class="row">
                                  <div class="col-xs-3">
                                      <span class="widget-icon" >
                                          <i class=" glyphicon glyphicon-user"></i>
                                      </span>
                                  </div>
                                  <div class="col-xs-9">
                                      <div class="live-tile carousel ha" data-mode="carousel" data-speed="750" data-delay="3000" data-height="57" style="height: 57px;">
                                          <div class="slide ha active" style="transition-property: transform; transition-duration: 750ms; transition-timing-function: ease; transform: translate(0%, 0%) translateZ(0px);">
                                              <h5 class="no-margin">COTIZACIONES PENDIENTES</h5>
                                              <p class="h2 no-margin fw-normal"><?php echo $tn_serv_pend?></p>
                                          </div>

                                      </div>
                                  </div>
                              </div>


                          </div>
                      </section>
                  </div>
                  <div class="col-md-3 col-sm-6" id="boton3">
                      <section class="widget bg-gray text-white">
                          <div class="widget-body clearfix">
                              <div class="live-tile carousel ha" data-mode="carousel" data-speed="750" data-delay="3000" data-height="57" style="height: 57px;">

                                  <div class="fade-back">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <span class="widget-icon">
                                                  <i class="glyphicon glyphicon-ok-sign"></i>
                                              </span>
                                          </div>
                                          <div class="col-xs-9">
                                              <h5 class="no-margin">COT. EN PROGRESO</h5>
                                              <p class="h2 no-margin fw-normal"><?php echo $tn_serv_prog ?></p>
                                          </div>
                                      </div>
                                      <!--<div class="row">
                                          <div class="col-xs-6">
                                              <h5 class="no-margin">Ultima Hora</h5>
                                              <p class="value4">7</p>
                                          </div>
                                          <div class="col-xs-6">
                                              <h5 class="no-margin">Ayer</h5>
                                              <p class="value4">145</p>
                                          </div>
                                      </div>-->
                                  </div>
                              </div>
                          </div>
                      </section>
                  </div>
                  <div class="col-md-3 col-sm-6" id="boton4">
                      <section class="widget bg-success text-white">
                          <div class="widget-body clearfix">
                              <div class="row">
                                  <div class="col-xs-3">
                                      <span class="widget-icon">
                                          <i class="glyphicon glyphicon-remove-circle"></i>
                                      </span>
                                  </div>
                                  <div class="col-xs-9">
                                      <h5 class="no-margin">COTIZACIONES TERMINADAS</h5>
                                      <p class="h2 no-margin fw-normal"><?php echo $tn_serv_term ?></p>
                                  </div>
                              </div>
                              <!--<div class="row">
                                  <div class="col-xs-6">
                                      <h5 class="no-margin">Ultimo Mes</h5>
                                      <p class="value4">141</p>
                                  </div>
                                  <div class="col-xs-6">
                                      <h5 class="no-margin">Ultima Semana</h5>
                                      <p class="value4">25</p>
                                  </div>
                              </div>-->
                          </div>
                      </section>
                  </div>
              </div>




          <div class="row"> <!-- Inicio tabla !-->
            <div class="col-md-12">
            <section class="widget">
                  <header>
                      <h4>MOVIMIENTOS DE <span class="fw-semi-bold">INVENTARIO</span></h4>
                      <div class="widget-controls">
                          <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                          <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                          <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                      </div>
                  </header>
                  <div class="widget-body">

                      <div class="mt">
                        <table id="datatable-table" class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Id</th>

                              <th>Servicio</th>
                              <th class="no-sort hidden-xs">Placa</th>
                              <th class="hidden-xs">Modelo</th>
                              <th class="hidden-xs"> Color</th>
                              <th class="no-sort">Nombre</th>
                              <th class="no-sort">Fecha Servicio</th>
                              <th class="no-sort">Estado</th>
                              <th class="no-sort"></th>
                              <th class="no-sort"></th>

                            </tr>
                          </thead>
                            <tbody id="grilladatos">

                            </tbody>
                        </table>
                      </div>
                  </div>
              </section>
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
var agregaEve=false;
$('#boton1').hover(function() {
     $(this).css('cursor','pointer');
 });

$("#boton1").on('click',function() {
   $('#datatable-table').dataTable().fnDestroy();
jalar_data(0,0)
})

$('#boton2').hover(function() {
     $(this).css('cursor','pointer');
 });

$("#boton2").on('click',function() {
   $('#datatable-table').dataTable().fnDestroy();
jalar_data(0,1)
})
$('#boton3').hover(function() {
     $(this).css('cursor','pointer');
 });
$("#boton3").on('click',function() {
   $('#datatable-table').dataTable().fnDestroy();
jalar_data(0,2)
})
$('#boton4').hover(function() {
     $(this).css('cursor','pointer');
 });
$("#boton4").on('click',function() {
   $('#datatable-table').dataTable().fnDestroy();
jalar_data(0,3)
})

function jalar_data(vie,vte) {

  var grillautx='';
  var nrox=0;
  var otablex = {};
  $.getJSON(`<?php echo base_url(); ?>index.php/tcservicios/lis_ser/${vie}/${vte}`  , function(data) {

    $.each(data, function(k,item){
      nrox++;

      grillautx=grillautx+`<tr >
      <td  >  ${item.ide_otr} </td>
      <td  > ${item.ser_nom} </td>
      <td  > ${item.veh_placa} </td>
      <td  >   ${item.tmv_detalle}</td>
      <td  >  ${item.veh_color} </td>
      <td  > ${item.cli_nom} ${item.cli_ape_pat}  </td>
      <td  > ${item.otr_fecha} </td>
      <td  > ${item.esr_detalle} </td>

      <td class="ver_registro" idr="'+item.ide_eve+'"><a href="tcservicios/seguir/${item.ide_otr}"><i class="fa fa-search"></i></a> </td>
      <td class="edita_registro" idr="'+item.ide_eve+'"><a href="tcservicios/editar/${item.ide_otr}"><i class="fa fa-pencil"></i></a> </td></tr> `;

    }) // Fin Each
    $('#grilladatos').html(grillautx );
    $('#datatable-table').DataTable({
      "order": [[ 0, "desc" ]],
      "aoColumnDefs": [
        { 'bSortable': false, 'aTargets': [8,9] }
      ]

    });

  }) // Fin Json


} // Fin Funcion jalar_data


function jalar_dataxx(vie,vte) {

  var grillautx='';
  var nrox=0;
  var otablex = {};
  $.getJSON(`<?php echo base_url(); ?>index.php/eventos/lis_eve/${vie}/${vte}`, function(data) {

    $.each(data, function(k,item){
      nrox++;

      grillautx=grillautx+'<tr > \
      <td class="zoome" lat="'+item.lat_eve+'" lon="'+item.lon_eve+'" >  '+ item.ide_eve+'  </td> \
      <td  >'+ item.des_eve+' </td> \
      <td  >'+ item.des_est+' </td> \
      <td  >'+ item.nom_eje+' </td> \
      <td  >'+ item.fch_eve+' '+item.hra_eve+' </td> \
      <td  >'+ item.nom_ciu+' '+item.pat_ciu+' </td> \
      <td  >'+ item.nro_doc+' </td> \
      <td class="ver_registro" idr="'+item.ide_eve+'"><a href="eventos/ver/'+item.ide_eve+'"><i class="fa fa-search"></i></a> </td>\
      <td class="edita_registro" idr="'+item.ide_eve+'"><a href="eventos/editar/'+item.ide_eve+'"><i class="fa fa-pencil"></i></a> </td></tr> ';

    }) // Fin Each
    $('#grilladatos').html(grillautx );
    $('#datatable-table').DataTable({

    });

  }) // Fin Json


} // Fin Funcion jalar_data




</script>
<script src="<?php echo base_url(); ?>js/minv/j_min_vista_seguimiento.js"></script>


<d



</body>

</html>
