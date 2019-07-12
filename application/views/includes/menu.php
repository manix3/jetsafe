<?php $res = $this->session->userdata('logged_in');
//print_r($res);
?>

<nav id="sidebar" class="sidebar" role="navigation">
    <!-- need this .js class to initiate slimscroll -->
    <div class="js-sidebar-content">
        <header class="logo hidden-xs">
            <a href="<?php echo base_url(); ?>home">JetSafe</a>
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

          <li class="">
              <a class="collapsed" href="#sidebar_bancos" data-toggle="collapse" data-parent="#bancos_sidebar" aria-expanded="false">
                  <span class="icon">
                      <i class="fa fa-money"></i>
                  </span>
                  Gestion
                  <i class="toggle fa fa-angle-down"></i>
              </a>
              <ul id="sidebar_bancos" class="collapse" aria-expanded="false" style="height: 0px;">

                  <li><a href="<?php echo base_url(); ?>productos">Ver productos</a></li>
                  <li><a href="<?php echo base_url(); ?>Metodo_pago">Metodo de pago</a></li>
                  <li><a href="<?php echo base_url(); ?>empresa">Empresa</a></li>
              </ul>
          </li>



          <li class="" id="cate_menu">
              <a class="collapsed" href="#cat_sidebar-tables" data-toggle="collapse" data-parent="#cat_sidebar" aria-expanded="false">
                  <span class="icon">
                      <i class="fa fa-list-ul"></i>
                  </span>
                  Configuración
                  <i class="toggle fa fa-angle-down"></i>
              </a>
              <ul id="cat_sidebar-tables" class="collapse" aria-expanded="false" style="height: 0px;">

                  <li><a href="<?= base_url(); ?>mantenimiento/Categorias">Parámetros</a></li>
                  <li><a href="<?= base_url(); ?>mantenimiento/Categorias">Usuarios</a></li>

              </ul>
          </li>

          <li class="" id="coti_mantenimiento_moneda">
              <a class="collapsed" href="#sidebar-tables" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false">
                  <span class="icon">
                      <i class="fa fa-tachometer"></i>
                  </span>
                  Pedidos
                  <i class="toggle fa fa-angle-down"></i>
              </a>
              <ul id="sidebar-tables" class="collapse" aria-expanded="false" style="height: 0px;">

                  <li><a href="<?php echo base_url(); ?>mantenimiento/Usuarios">Ver Compras</a></li>

              </ul>
          </li>




      </ul>

    </div>


</nav>

<script src="<?php echo base_url(); ?>vendor/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
var uri = '<?= $this->uri->segment(1) ?>';
$('#'+uri).addClass('active')
if (uri == 'Nueva') $('#cotizar').addClass('active')

</script>
