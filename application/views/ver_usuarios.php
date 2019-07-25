<div class="content-wrap">

  <main id="content" class="content" role="main">

    <label style="font-size:16px">Id pedido</label>


  <span id="id_pedi" style="font-size: 25px;font-weight: bold;"></span>
  <button type="button" class="pull-right btn btn-primary" id="btnLog" style="margin-bottom: 12px;">Ver log</button>



    <h1><span class="fw-semi-bold">Pedidos</span></h1>
  <section class="widget">

    <table id="datatable-table-transaccion" class="table table-striped table-hover">
    <thead>
        <tr>
          <th>METODO PAGO</th>
          <th>EMPRESA</th>
          <th>EMAIL</th>
          <th>ESTADO</th>
          <th>CANTIDAD</th>
          <th>OBSERVACION</th>
          <th>IDIOMA</th>
          <th>EDITAR</th>
        </tr>
    </thead>
    <tbody id="detalle_tabla_transaccion">


    </tbody>

  </table>
  </section>




      <h1><span class="fw-semi-bold">Usuarios</span></h1>

    <section class="widget">

      <table id="datatable-table" class="table table-striped table-hover">
      <thead id="tabla_head">
          <tr>
            <th>PRODUCTO</th>
            <th>CANTIDAD</th>
            <th>SUB TOTAL</th>
            <th>FECHA</th>
            <th>NOMBRES</th>
            <th>APELLIDO PATERNO</th>
            <th>APELLIDO MATERNO</th>
            <th>CELULAR</th>
            <th>EMAIL</th>
            <th>NACIONALIDAD</th>
            <th>DEPARTAMENTO</th>
            <th>CIUDAD</th>
            <th>DIRECCION</th>
            <th>TIPO DOCUMENTO</th>
            <th>DOCUMENTO IDENTIDAD</th>
            <th>FECHA DE NACIMIENTO</th>
            <th>PAIS</th>
            <th>FECHA ARRIBO</th>
            <th>FECHA SALIDA</th>
            <th>RESIDENCIA</th>
            <th>OCUPACION</th>
            <th>CARGO</th>
            <th>CENTRO LABORAL</th>
            <th>NEGOCIO PROPIO</th>
            <th>ORIGEN FONDOS</th>
            <th>CVV</th>
            <th>FECHA</th>
            <th>NOMBRE</th>
            <th>NUMERO</th>
            <th>ARCHIVOS</th>
          </tr>
      </thead>
      <tbody id="grillaDatos">


      </tbody>

    </table>
    </section>




  </main>
</div>

<!-- editar estado pedido -->

<div class="modal fade" id="myModaleditapedido" tabindex="-1" role="dialog" aria-label$('#myModaledita').modal('show');ledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Datos de pedido</h3>

      </div>

      <fieldset>

        <form class="form_estado_" id="form_estado_" action="" method="post">
          <input type="hidden" name="inp_text1" id="inp_text1" value="">


          <div class="form-group">
            <label for="normal-field" class="col-sm-4 control-label">
              Estado
            </label>
            <div class="col-sm-8">
              <select  name="estado"  class="form-control" id="estado">
                <option value="">Selecciones Estado</option>
                <option value="6">Cargado/Loaded</option>
                <option value="7">Entregado/Delivered</option>
              </select>
            </div>
          </div>
          <div class="padre">
            <div class="denegar" id="denegar">

              <div class="form-group">
                <label for="normal-field" class="col-sm-4 control-label">
                  Observacion
                </label>
                <div class="col-sm-8">
                  <input type="text" name="observacion_negada" placeholder="Observacion" class="form-control" id="observacion_negada" value="">
                </div>
              </div>
            </div>
          <button type="submit" class="btn btn-primary" id="btnNuevo" style="margin-bottom: 12px;margin-left:11px">Cambiar estado</button>
          </div>


      </form>
      </fieldset>



      <div class="modal-body">
        <table class="table table-striped">
          <thead>
            <th>Id dato</th>
            <th>Estado</th>
            <th>Observacion</th>
            <th>Fecha</th>

          </thead>
            <tbody id="detalle_registro_">

            </tbody>
        </table>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>

<!-- editar estado pedido -->


<div class="modal fade" id="myModalvertar" tabindex="-1" role="dialog" aria-label$('#myModaledita').modal('show');ledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Datos de tarjeta</h3>

      </div>
      <div class="modal-body">


        <table class="table table-striped">
              <thead>
                <th>Nro</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Cvv</th>
                <th>Total</th>
                <th>Subtotal</th>
                <th>IGV</th>
              </thead>
            <tbody id="detalle_registro_tarjeta">

            </tbody>
        </table>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>




<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

<?php $this->load->view('includes/modalog') ?>

<?php $this->load->view('includes/scripts') ?>
<script type="text/javascript">
  const IDR = '<?php echo $id ?>'
</script>
<script src="<?= base_url() ?>js/ver_usuarios.js"></script>
