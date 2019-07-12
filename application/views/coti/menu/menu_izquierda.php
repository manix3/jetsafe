<?php $res = $this->session->userdata('logged_in');
//print_r($res);
?>

<nav id="sidebar" class="sidebar" role="navigation">
    <!-- need this .js class to initiate slimscroll -->
    <div class="js-sidebar-content">
        <header class="logo hidden-xs">
            <a href="<?php echo base_url(); ?>principal">CALLIO</a>
        </header>


        <!-- main notification links are placed inside of .sidebar-nav -->
        <!-- <ul class="sidebar-nav">
            <li class="active">
                <a class="collapsed" href="#sidebar-dashboard" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-desktop"></i>
                    </span>
                    Panel Inicio
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="sidebar-dashboard" class="collapse in">

                    <li class="active" ><a href="<?php echo base_url(); ?>principal">Inicio</a></li>
                </ul>
            </li>
        </ul> -->
        <ul class="sidebar-nav">

          <li class="" id="cotizar">
              <a href="<?= base_url(); ?>Cotizacion/cotizar">
                  <span class="icon">
                      <i class="glyphicon glyphicon-usd"></i>
                  </span>
                  <?php if ($res['ie'] <>  15) { ?>
                  Cotizaciones
                <?php } else { ?>
              Seguimientos
                  <?php } ?>
              </a>
          </li>
<?php if ($res['ie'] <> 15) { ?>
          <li class="" id="Factura">
              <a href="<?php echo base_url(); ?>Seguimientos">
                  <span class="icon">
                      <i class="fa fa-file-text-o"></i>
                  </span>
                  Seguimientos "No realizados"
              </a>
          </li>
          <li class="" id="Factura">
              <a href="<?php echo base_url(); ?>Factura">
                  <span class="icon">
                      <i class="fa fa-file-text-o"></i>
                  </span>
                  Facturas
              </a>
          </li>

          <li class="" id="cotizar">
              <a href="<?php echo base_url(); ?>Ventas">
                  <span class="icon">
                      <i class="glyphicon glyphicon-usd"></i>
                  </span>
                  Ventas
              </a>
          </li>
          <li class="" id="Administrar">
              <a href="<?php echo base_url(); ?>Cotizacion/Administrar">
                  <span class="icon">
                      <i class="fa fa-cogs"></i>
                  </span>
                  Administrar
              </a>
          </li>
<?php } ?>

      <?php if ($res['ie'] == 15) { ?>

        <li class="" id="busqueda">
                <a href="<?php echo base_url(); ?>Cotizacion/buscar">
                    <span class="icon">
                        <i class="fa fa-search"></i>
                    </span>
                    Busqueda
                </a>
        </li>

      <?php } ?>

      <li class="" id="clientes">
              <a href="<?php echo base_url(); ?>Cotizacion/clientes">
                  <span class="icon">
                      <i class="fa fa-users"></i>
                  </span>
                  Clientes
              </a>
      </li>
      <li class="" id="vendedores">
              <a href="<?php echo base_url(); ?>Cotizacion/vendedores">
                  <span class="icon">
                      <i class="fa fa-users"></i>
                  </span>
                  Vendedores
              </a>
      </li>
      <?php if ($res['ie'] <> 15) { ?>
      <li class="" id="Productos">
          <a href="<?php echo base_url(); ?>Cotizacion/Productos">
              <span class="icon">
                  <i class="glyphicon glyphicon-shopping-cart"></i>
              </span>
              Productos
          </a>
      </li>


          <li class="" id="coti_mantenimiento_moneda">
              <a class="collapsed" href="#sidebar-tables" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false">
                  <span class="icon">
                      <i class="fa fa-tachometer"></i>
                  </span>
                  Mantenimiento
                  <i class="toggle fa fa-angle-down"></i>
              </a>
              <ul id="sidebar-tables" class="collapse" aria-expanded="false" style="height: 0px;">
                  <!-- <li><a href="<?php echo base_url(); ?>coti_mantenimiento_estado">Estado de Cotizacion</a></li> -->
                  <li><a href="<?php echo base_url(); ?>Cotizacion/coti_mantenimiento_moneda">Tipo de Moneda</a></li>
              </ul>
          </li>
<?php } ?>
<?php if ($res['ie'] == 15) { ?>

           <li class="">
            <a class="collapsed" href="#sidebar-forms" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false">
              <span class="icon">
                <i class="glyphicon glyphicon-align-right"></i>
              </span>
              Reportes
              <i class="toggle fa fa-angle-down"></i>
            </a>
            <ul id="sidebar-forms" class="collapse" aria-expanded="false" style="height: 0px;">
              <li><a href="<?php echo base_url(); ?>Cotizacion/rep1">Contactos no atendidos</a></li>
              <li><a href="<?php echo base_url(); ?>Cotizacion/rep2">Reporte de Actividad </a></li>
            </ul>
          </li>
          <?php } ?>
          <div class="" id="footer">
                <div class="suelta" id="trash">
                    <span class="glyphicon glyphicon-trash"></span>
                </div>
          </div>
      </ul>

    </div>


</nav>
<script src="<?php echo base_url(); ?>vendor/jquery/dist/jquery.min.js"></script>


<script type="text/javascript">
  var uri = '<?= $this->uri->segment(2) ?>';
  $('#'+uri).addClass('active')
  if (uri == 'Nueva') $('#cotizar').addClass('active')

</script>
