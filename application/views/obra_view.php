<div class="content-wrap">


<!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
<main id="content" class="content" role="main">


  <h1>Lista de <span class="fw-semi-bold">manos de obras</span></h1>

  <button type="button" class="btn btn-primary" id="btnNuevo" style="margin-bottom: 12px;">Nueva mano de obra</button>

    <section class="widget">

        <table id="datatable-table" class="table table-striped table-hover">
          <thead>
              <tr>
                <th>Nombre</th>
                <th>Categoria</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
          </thead>
          <tbody id="grillaDatos">


          </tbody>

        </table>

    </section>

  </main>





</div>





<!--Inicio  Modal  Editar !-->
<div class="modal fade" id="myModaledita" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="form1" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title" id="myModaleditaLabel"> <span id="title"></span> mano de obra</h3>
        </div>
        <div class="modal-body">
          <fieldset>

            <input id="inp_text1" name="inp_text1" class="form-control" placeholder="" readonly="true" value='' type="hidden">
            <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='' type="hidden">


            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Nombre de la mano de obra

              </label>
                <div class="col-sm-8">
                  <input id="inp_text2" name="inp_text2" class="form-control" required placeholder="Mano de obra" value='' type="text">
                </div>

            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Categoria

              </label>
                <div class="col-sm-8">
                  <select id="inp_text3" name="inp_text3" class="form-control" required value='' >
                  </select>
                </div>

            </div>

            </div>

          </fieldset>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!--Fin Modal Editar !-->
<div class="modal fade" id="myModalver" tabindex="-1" role="dialog" aria-label$('#myModaledita').modal('show');ledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Datos de la mano de obra</h3>

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




<?php $this->load->view('includes/scripts') ?>

<script src="<?php echo base_url(); ?>js/mano_de_obra.js"></script>
