<div class="content-wrap">


<!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
<main id="content" class="content" role="main">

  <button type="button" class="pull-right btn btn-primary" id="btnLog" style="margin-bottom: 12px;">Ver log</button>
  <h1>Lista de <span class="fw-semi-bold">Transaccion</span></h1>



    <section class="widget">

        <table id="datatable-table" class="table table-striped table-hover">
          <thead>
              <tr>
                <th>ID</th>
                <th>Empresa</th>
                <th>Metodo de pago</th>
                <th>Tipo op</th>
                <th>Nro op</th>
                <th>Moneda</th>
                <th>Total</th>
                <th>Banco</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Comprobante</th>
                <th>Ver</th>
                <th>Editar</th>
              </tr>
          </thead>
          <tbody id="grillaDatos">


          </tbody>

        </table>

    </section>

  </main>





</div>


<div class="modal fade" id="myModalver" tabindex="-1" role="dialog" aria-label$('#myModaledita').modal('show');ledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Datos de Transaccion</h3>

      </div>

      <fieldset>

        <form class="form_estado" id="form_estado" action="" method="post">
          <input type="hidden" name="inp_text1" id="inp_text1" value="">
          <input type="hidden" name="fecha" id="fecha" value="">

          <div class="form-group">
            <label for="normal-field" class="col-sm-4 control-label">
              Nro operacion
            </label>
            <div class="col-sm-8">
              <select  name="estado"  class="form-control" id="estado">
                <option value="">Selecciones Estado</option>
                <option value="1">Aprobado/Approved</option>
                <option value="2">Denegado/Denied</option>
              </select>
            </div>
          </div>
          <div class="padre">
            <div class="aprobar" style="display:none" id="aprobar">
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">
                  Fecha

                </label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" name="inp_text2" id="inp_text2" value="">
                </div>

              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">
                  Nro operacion
                </label>
                <div class="col-sm-8">
                  <input type="text" name="inp_text3" placeholder="Nro de operacion" class="form-control" id="inp_text3" value="">
                </div>
              </div>

            </div>
            <div class="denegar" style="display:none" id="denegar">
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">
                  Motivos
                </label>
                <div class="col-sm-8">
                  <select name="motivo" class="form-control" id="motivo">

                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">
                  Nro de orden
                </label>
                <div class="col-sm-8">
                  <input type="text" name="nro_orden" placeholder="Nro de orden" class="form-control" id="nro_orden" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">
                  Codigo de autorizacion
                </label>
                <div class="col-sm-8">
                  <input type="text" placeholder="Codigo" name="codigo_autorizacion" class="form-control" id="codigo_autorizacion" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">
                  Fecha de abono
                </label>
                <div class="col-sm-8">
                  <input type="date" name="fecha_de_abono" class="form-control" id="fecha_de_abono" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">
                  Observacion
                </label>
                <div class="col-sm-8">
                  <input type="text" name="observacion_negada" placeholder="Observacion" class="form-control" id="observacion_negada" value="">
                </div>
              </div>
              <div id="descripcion" style="display:none" class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">
                  Descripcion
                </label>
                <div class="col-sm-8">
                  <input type="text" name="descripcion" class="form-control" id="descripcion" value="">
                </div>
              </div>
            </div>
          <button type="submit" class="btn btn-primary" id="btnNuevo" style="margin-bottom: 12px;margin-left:11px">Cambiar estado</button>
          </div>


      </form>
      </fieldset>



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

<?php echo $this->load->view('includes/modalog'); ?>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>


<?php $this->load->view('includes/scripts') ?>
<script src="<?php echo base_url(); ?>js/propios.js" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>js/compras.js"></script>
