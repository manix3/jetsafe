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

          </tr>
      </thead>
      <tbody id="grillaDatos">


      </tbody>

    </table>
    </section>


    <h1><span class="fw-semi-bold">Transaccion</span></h1>
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

    <h1><span class="fw-semi-bold" id="tarjeta_h1">Tarjeta</span></h1>
    <section class="widget" id="tarjeta_section">

      <table id="datatable-table-tarjeta" class="table table-striped table-hover">
      <thead>
          <tr>
            <th>NUMERO</th>
            <th>NOMBRE</th>
            <th>FECHA</th>
            <th>CVV</th>
          </tr>
      </thead>
      <tbody id="detalle_tabla_tarjeta">


      </tbody>

    </table>
    </section>

  </main>
</div>


<?php $this->load->view('includes/scripts') ?>
<script type="text/javascript">
  const IDR = '<?php echo $id ?>'
</script>
<script src="<?= base_url() ?>js/ver_usuarios.js"></script>
