<?php date_default_timezone_set( 'America/lima' ) ?>
  <!-- CONTENIDO -->


  <div class="content-wrap">


      <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
      <main id="content" class="content" role="main">


        <div class="row" id="acces">


                </div>








            <h2 class="page-title mb-xlg mt-lg">Reporte de transacciones </h2>

            <div class="row">



              <div class="col-md-8">
                <section class="widget">
                  <header>
                      <h4>N° DE PEDIDOS POR <span class="fw-semi-bold">DIA</span></h4>
                  </header>
                  <div class="widget-body"  style="max-height: 350px ">
                    <canvas id="barLastDay" height="130" ></canvas>
                  </div>
                </section>
              </div>




            </div>

            <div class="row">


              <div class="col-md-8">
                <section class="widget">
                  <header>
                      <h4>TOTAL PRODUCTOS VENDIDOS EN LA<span class="fw-semi-bold"> SEMANA</span></h4>
                  </header>
                  <div class="widget-body">
                      <canvas id="lineWeek" height="130" ></canvas>
                  </div>
                </section>
              </div>




            </div>



      </main>

  </div>

  <!-- CONTENIDO -->








<!--MODAL ELIMINAR-->
<div class="modal fade" id="myModalborrar" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="frm_delete" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="">Eliminar Orden de Trabajo</h3>
      </div>
      <div class="modal-body">


        <p>¿Esta seguro de eliminar esta Orden de trabajo?</p>

        <!-- <input id="nom" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden"> -->
        <input id="ide" name="ide" class="form-control" placeholder=""  value='' type="hidden">


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" id="btn_del">Si</button>
      </div>
    </div>
 </form>
  </div>
</div>
<!--MODAL ELIMINAR-->







<!-- CAN'T TOUCH THIS -->

<?php $this->load->view('includes/scripts') ?>

<!-- CAN'T TOUCH THIS -->


<script>

  const base_url = '<?= base_url() ?>'


  function jalar_data() {
  } // Fin Funcion jalar_data


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>js/j_tc_vista_dashboard_reportes.js"></script>
