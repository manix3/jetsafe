<div class="content-wrap">

  <main id="content" class="content" role="main">


      <h1><span class="fw-semi-bold">Usuarios</span></h1>

    <section class="widget">

      <table id="datatable-table" class="table table-striped table-hover">
      <thead>
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
            <th>ARCHIVOS</th>
            <th>TARJETA</th>
          </tr>
      </thead>
      <tbody id="grillaDatos">


      </tbody>

    </table>
    </section>


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
        </tr>
    </thead>
    <tbody id="detalle_tabla_transaccion">


    </tbody>

  </table>
  </section>

  </main>
</div>

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


<?php $this->load->view('includes/scripts') ?>
<script type="text/javascript">
  const IDR = '<?php echo $id ?>'
</script>
<script src="<?= base_url() ?>js/ver_usuarios.js"></script>
