<div class="content-wrap">

  <main id="content" class="content" role="main">


<h1><span class="fw-semi-bold">Transaccion</span></h1>
<section class="widget">

<table id="datatable-table-pedido" class="table table-striped table-hover">

<tbody id="detalle_tabla_">


</tbody>

</table>
</section>

  </main>
</div>

<?php $this->load->view('includes/scripts') ?>
<script type="text/javascript">
  const IDR = '<?php echo $id ?>'
</script>
<script src="<?= base_url() ?>js/ver_transaccion_detalle.js"></script>
