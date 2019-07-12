<div class="content-wrap">


<!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
<main id="content" class="content" role="main">
  <h4>Lista de <span class="fw-semi-bold">Manager</span></h4>
  <button type="button" class="btn btn-primary" id="btnNuevo">Nuevo manager</button>

    <table id="datatable-table" class="table table-striped table-hover">
      <thead>
          <tr>
            <th>Nro</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Pedido</th>
            <th>Estado de pedido</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
      </thead>
      <tbody id="grillaDatos">


      </tbody>

    </table>
  </main>
<!--Inicio  Modal  Editar !-->
<div class="modal fade" id="myModaledita" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="form1" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
          <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title" id="myModaleditaLabel">Nuevo Cliente</h3>
        </div>
        <div class="modal-body">
          <fieldset>
            <div class="form-group">
            <label for="normal-field" class="col-sm-4 control-label">Id</label>
              <div class="col-sm-6">
                <input id="inp_text1" name="inp_text1" class="form-control" placeholder="" readonly="true" value='' type="text">
              </div>
            </div>
            <div class="form-group">
            <label for="normal-field" class="col-sm-4 control-label">Nombre</label>
              <div class="col-sm-6">
                <input id="inp_text2" name="inp_text2" class="form-control" required placeholder="" value='' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Apellido</label>
              <div class="col-sm-6">
                <input id="inp_text3" name="inp_text3" class="form-control" placeholder="" value='' type="text">
              </div>
            </div>
            <div class="form-group">
            <label for="normal-field" class="col-sm-4 control-label">Telefono</label>
              <div class="col-sm-6">
                <input id="inp_text4" name="inp_text4" class="form-control" required placeholder="" value='' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Documento</label>
              <div class="col-sm-6">
                <input id="inp_text5" name="inp_text4" class="form-control" placeholder="" value='' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Direccion</label>
              <div class="col-sm-6">
                <input id="inp_text6" name="inp_text6" class="form-control" placeholder="" value='' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Fecha de nacimiento</label>
              <div class="col-sm-6">
                <input id="inp_text7" name="inp_text7" class="form-control" placeholder="" value='' type="date">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Correo Electronico</label>
              <div class="col-sm-6">
                <input id="inp_text8" name="inp_text8" class="form-control" placeholder="" value='' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Telefono secundario</label>
              <div class="col-sm-6">
                <input id="inp_text9" name="inp_text9" class="form-control" placeholder="" value='' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Direccion Anterior</label>
              <div class="col-sm-6">
                <input id="inp_text10" name="inp_text10" class="form-control" placeholder="" value='' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Pedido</label>
              <div class="col-sm-6">
                <input id="inp_text11" name="inp_text11" class="form-control" placeholder="" value='' type="text">
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



</div>
<?php $this->load->view('includes/scripts') ?>

<script src="js/manager.js">

</script>
