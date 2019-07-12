<div class="content-wrap">


<!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
<main id="content" class="content" role="main">


  <h1>Lista de <span class="fw-semi-bold"> de obras</span></h1>

  <button type="button" class="btn btn-primary" id="btnNuevo" style="margin-bottom: 12px;">Nuevo Obra</button>

    <section class="widget">

        <table id="datatable-table" class="table table-striped table-hover">
          <thead>
              <tr>
                <th>Titulo de obra</th>
                <th>Codigo</th>
                <th>Caja Chica</th>
                <th>Efectivo</th>
                <th>Monto total de obra</th>
                <th>Fecha obra</th>
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
  <div class="modal-dialog ">
    <form id="form1" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title" id="myModaleditaLabel"> <span id="title"></span> Obra</h3>
        </div>
        <div class="modal-body">
          <fieldset>

            <input id="inp_text1" name="inp_text1" class="form-control" placeholder="" readonly="true" value='' type="hidden">
            <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='' type="hidden">
            <input id="code" name="code" class="form-control" placeholder="" readonly="true" value='' type="hidden">

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Codigo de obra

              </label>
              <div class="col-sm-8">
                <input type="text" name="inp_text2" id="inp_text2" class="form-control" value="" readonly>
              </div>

            </div>

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Tilulo de obra

              </label>
                <div class="col-sm-8">
                  <input type="text" name="inp_text3" id="inp_text3" class="form-control" value="">
                </div>

            </div>

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Descripcion de obra

              </label>
                <div class="col-sm-8">
                  <textarea name="inp_text4" id="inp_text4" class="form-control" rows="4" cols="30"></textarea>
                </div>

            </div>
<!--
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Presupuesto

              </label>
                <div class="col-sm-8">
                  <select class="form-control" name="inp_text5" id="inp_text5">

                  </select>
                </div>

            </div> -->

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Caja chica de obra

              </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="inp_text6" id="inp_text6" value="">
                </div>

            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Monto total de obra

              </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="inp_text10" id="inp_text10" value="">
                </div>

            </div>

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Fecha de obra

              </label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" name="inp_text7" id="inp_text7" value="">
                </div>

            </div>

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Direccion de obra

              </label>
                <div class="col-sm-8">
                  <input type="text" name="inp_text8" id="inp_text8" class="form-control" value="">
                </div>

            </div>

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Estado de obra

              </label>
                <div class="col-sm-8">
                  <select class="form-control" name="inp_text9" id="inp_text9">
                    <option value="1">Planeacion</option>
                    <option value="2">Ejecusion</option>
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
        <h3 class="modal-title" id="myModalLabel">Datos de la obra</h3>

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
<div class="modal fade" id="modalPresupuesto" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <form id="formcsv" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
      <div class="modal-content">
        <div class="modal-header">
          <input id="id" name="id" class="form-control" value='' type="hidden">
          <input id="total" name="total" class="form-control" value='' type="hidden">
          <input id="cod_obr" name="cod_obr" class="form-control" value='' type="hidden">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title" id="myModaleditaLabel"> <span id="title"></span>Presupuesto</h3>
        </div>
        <div class="modal-body">
          <fieldset>

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">
                Subir archivo .csv

              </label>
              <div class="col-sm-8">

                <input type="file" name="archivo" id="inp_text001" class="form-control" required>
              </div>

            </div>
            <div id="oculto" style="display:none">
              <h3>Vista previa antes de guardar los datos</h3>
              <details >
                <summary >
                  MATERIALES
                </summary>
                <table class="table table-striped">
                  <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Unidad</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Parcial</th>

                  </thead>
                  <tbody id="vistaMateriales" >
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Total S/</th>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td id="total"></td>
                    </tr>
                  </tfoot>
                </table>
                </details>
                  <details >
                <summary >
                  MANO DE OBRA
                </summary>
                <table class="table table-striped">
                  <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Unidad</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Parcial</th>
                  </thead>
                  <tbody id="vistaMano_obra" >
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Total S/</th>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td id="total1"></td>
                    </tr>
                  </tfoot>
                </table>
                </details>
                  <details >
                <summary >
                  EQUIPOS
                </summary>
                <table class="table table-striped">
                  <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Unidad</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Parcial</th>
                  </thead>
                  <tbody id="vistaEquipos" >
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Total S/</th>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td id="total2"></td>
                    </tr>
                  </tfoot>
                </table>
                </details>
            </div>

            </div>


            <div class="modal-footer">
              <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="Vista_previa" type="button" class="btn btn-warning">Vista previa</button>
              <button id="submitForm" type="submit" class="btn btn-primary">Añadir Presupuesto</button>
            </div>
            </div>

          </fieldset>
        </div>
      </div>
    </form>
  </div>
</div>



<?php $this->load->view('includes/scripts') ?>

<script src="<?php echo base_url(); ?>js/obras.js"></script>
