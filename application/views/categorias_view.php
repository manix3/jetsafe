<div class="content-wrap">


<!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
<main id="content" class="content" role="main">


  <h1>Lista de <span class="fw-semi-bold">Categorias</span></h1>

  <button type="button" class="btn btn-primary" id="btnNuevo" style="margin-bottom: 12px;">Nueva categoria</button>

    <section class="widget">

        <table id="datatable-table" class="table table-striped table-hover">
          <thead>
              <tr>
                <th>Nombre de categoria</th>
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
          <h3 class="modal-title" id="myModaleditaLabel"> <span id="title"></span> Categoria</h3>
        </div>
        <div class="modal-body">
          <fieldset>

            <input id="inp_text1" name="inp_text1" class="form-control" placeholder="" readonly="true" value='' type="hidden">
            <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='' type="hidden">


            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Nombre de la categoria

              </label>
                <div class="col-sm-8">
                  <input id="inp_text2" name="inp_text2" class="form-control" required placeholder="Nombre de la categoria" value='' type="text">
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
        <h3 class="modal-title" id="myModalLabel">Datos del banco</h3>

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

<script src="<?php echo base_url(); ?>js/categorias.js"></script>
