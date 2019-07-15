<div class="content-wrap">


<!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
<main id="content" class="content" role="main">


  <h1>Lista de <span class="fw-semi-bold">Metodos de pago</span></h1>



    <section class="widget">

        <table id="datatable-table" class="table table-striped table-hover">
          <thead>
              <tr>

                <th>Titulo</th>
                <th>Notificación</th>
                <th>Observacion</th>
                <th>Orden</th>
                <th>Estado</th>
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
  <div class="modal-dialog modal-lg" style="width: 90%;">
    <form id="form1" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title" id="myModaleditaLabel"> <span id="title"></span> Metodo de pago</h3>
        </div>
        <div class="modal-body">
          <fieldset>

            <input id="inp_text1" name="inp_text1" class="form-control" placeholder="" readonly="true" value='' type="hidden">
            <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='' type="hidden">


            <div class="col-md-6" style="padding-right:50px;">
              <div class="form-group">
                <label for="normal-field" class="col-sm-10 control-label">
                  Titulo:
                </label>
                <input id="inp_text2" name="inp_text2" class="form-control" required placeholder="Nombre de la categoria" value='' type="text">
              </div>
              <div class='form-group'>
                <label for="normal-field" class="col-sm-12 control-label">Descripcion:</label>
                <textarea class='ckeditor' rows='5' id='observacion' name='observacion' required='required'></textarea>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-10 control-label">
                  Notificación:
                </label>
                <input id="inp_text3" name="inp_text3" class="form-control" required placeholder="Nombre de la categoria" value='' type="text">
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-10 control-label">
                  Estado:
                </label>
                <select id="inp_text6" name="inp_text6" class="form-control" required  value='' type="text">
                  <option value="1">Publicado</option>
                  <option value="0">Oculto</option>
                </select>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label for="normal-field" class="col-sm-10 control-label">
                  Titulo ingles:
                </label>
                <input id="inp_text4" name="inp_text4" class="form-control" required placeholder="Nombre de la categoria" value='' type="text">


              </div>
              <div class='form-group'>
                <label for="normal-field" class="col-sm-12 control-label">Descripcion inglés:</label>
                <textarea class='ckeditor' rows='5' id='observacion_en' name='observacion_en' required='required'></textarea>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-10 control-label">
                  Orden:
                </label>
                <input id="inp_text5" name="inp_text5" class="form-control" required placeholder="Orden" value='' type="number">


              </div>

              <div class="form-group">
                <label for="normal-field" class="col-sm-10 control-label">
                  Activo Turista:
                </label>
                <select id="inp_text7" name="inp_text7" class="form-control" required  value='' type="text">
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
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
        <h3 class="modal-title" id="myModalLabel">Datos de Metodo de pago</h3>

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
<script src="<?= base_url() ?>js/ckeditor.js"></script>



<script src="<?php echo base_url(); ?>js/metodo_pago.js"></script>
