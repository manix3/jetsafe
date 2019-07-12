<div class="content-wrap">


<!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
<main id="content" class="content" role="main">


  <h1>Lista de <span class="fw-semi-bold">Clientes</span></h1>

  <button type="button" class="btn btn-primary" id="btnNuevo" style="margin-bottom: 12px;">Nuevo cliente</button>

    <section class="widget">

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
          <h3 class="modal-title" id="myModaleditaLabel">Nuevo Cliente</h3>
        </div>
        <div class="modal-body">
          <fieldset>

            <input id="inp_text1" name="inp_text1" class="form-control" placeholder="" readonly="true" value='' type="hidden">
            <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='' type="hidden">


            <div class="form-group formsinmargen">
              <label for="normal-field" class="col-sm-4 control-label">
                NOMBRE COMPLETO
                <span class="help-block">Nombre / Apellido</span>
              </label>
                <div class="col-sm-4">
                  <input id="inp_text2" name="inp_text2" class="form-control" required placeholder="Nombre" value='' type="text">
                </div>
                <div class="col-sm-4">
                  <input id="inp_text3" name="inp_text3" class="form-control" placeholder="Apellido" value='' type="text">
                </div>
            </div>

            <div class="form-group formsinmargen">
                <label for="normal-field" class="col-sm-4 control-label">
                  TELEFONO
                  <span class="help-block">Telefono / Telefono Secundario</span>

                </label>
                  <div class="col-sm-4">
                    <input id="inp_text4" name="inp_text4" class="form-control" required placeholder="" value='' type="number">
                  </div>
                  <div class="col-sm-4">
                    <input id="inp_text9" name="inp_text9" class="form-control" placeholder="" value='' type="number">
                  </div>
            </div>


            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Documento</label>
              <div class="col-sm-8">
                <input id="inp_text5" name="inp_text4" class="form-control" placeholder="" value='' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Direccion</label>
              <div class="col-sm-8">
                <input id="inp_text6" name="inp_text6" class="form-control" placeholder="" value='' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Fecha de nacimiento</label>
              <div class="col-sm-8">
                <input id="inp_text7" name="inp_text7" class="form-control" placeholder="" value='' type="date">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Correo Electronico</label>
              <div class="col-sm-8">
                <input id="inp_text8" name="inp_text8" class="form-control" placeholder="" value='' type="text">
              </div>
            </div>

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Direccion Anterior</label>
              <div class="col-sm-8">
                <input id="inp_text10" name="inp_text10" class="form-control" placeholder="" value='' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Pedido</label>
              <div class="col-sm-8">
                <select id="inp_text11" name="inp_text11" class="form-control" placeholder="" value='' type="text">

                  <!--


                    Agregar ComboSelect a este campo.... Utiliza una ruta reelativa pero coloca los datos correctos
                    ide_pedido , nom_tip_ped

                -->


                </select>
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



<?php $this->load->view('includes/scripts') ?>

<script src="js/agente.js"></script>
