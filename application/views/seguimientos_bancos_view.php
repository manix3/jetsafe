<style media="screen">
  .tablita td{
    border-right: solid 1px #c1c1c1;
    padding: 10px;
  }
  .tablita th{
    background-color: #7c7c7c;
    color: #fff;
    text-align: center;
    padding: 10px
  }
</style>

<div class="content-wrap">


<!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
<main id="content" class="content" role="main">


  <h1>Lista de <span class="fw-semi-bold">seguimientos de bancos</span></h1>

  <button type="button" class="btn btn-primary" id="btnNuevo" style="margin-bottom: 12px;">Nuevo seguimiento</button>
  <section class="widget">
    <div id="reportrange" align="right" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 0px solid #ccc; width: 50%">

     <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
     <span id="datofecha" name="datofecha"></span> <b class="caret"></b>
    </div>


        <table id="datatable-table" class="table table-striped table-hover">
          <thead>
              <tr>
                <th>Banco</th>
                <th>Empresa</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Monto</th>
                <th></th>
              </tr>
          </thead>
          <tbody id="grillaDatos">


          </tbody>
          <tfoot>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
          </tfoot>
        </table>

    </section>

    <div class="row">
  <div class="col-md-12">
    <section class="widget">
      <header>
        <div class="col-md-8">
          <h4>Seleccion el o los parametros de busqueda...</h4>
        </div>
        <div class="col-md-4">
          <button type="button" name="clear" class="btn btn-danger pull-right" id="clear_inputs"><i class="fa fa-eraser"></i></button>
        </div>
      </header>
      <div class="widget-body">

        <form id="filter-form">
          <div class="form-group">

            <table class="table">

              <thead>
                <th></th>
                <th>Por Empresa</th>
                <th>Por Banco</th>
                <th></th>
              </thead>
              <tbody>
                <td></td>
                <td>
                  <select class="form-control match-content" name="filter1" id="filter1">
                    <option ></option>
                    <option value="1">Youtube</option>
                    <option value="2">Google</option>
                  </select>
                </td>
                <td>
                  <select class="form-control match-content" name="filter2" id="filter2">

                  </select>
                </td>
                <td></td>
              </tbody>

            </table>
          </div>
        </form>


      </div>
    </section>
  </div>
</div>


      </div>


  </main>





</div>





<!--Inicio  Modal  Editar !-->
<div class="modal fade" id='myModaledita' tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog " style="width:80%">
    <form id="form1" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title" id="myModaleditaLabel"> <span id="title"></span> Seguimiento</h3>
        </div>
        <div class="modal-body">
          <fieldset>
            <fieldset>


              <div class="padre"  style="display:flex">

                <div class="button_nueva">
                  <button type="button" class="btn btn-primary" id="btnNuevaFila" style="margin-bottom: 12px;"><i class="fa fa-plus"></i> Nueva fila</button>

                </div>


                <div class="checkbox checkbox-primary" style="padding-left: 34px;">
                <input id="iflast" type="checkbox" checked="">
                 <label for="checkbox2">
                    Mantener ultimo
                 </label>
                </div>
              </div>



              <input id="contador" name="contador" class="form-control" placeholder="" readonly="true" value='' type="hidden">
              <input id="inp_text1" name="inp_text1" class="form-control" placeholder="" readonly="true" value='' type="hidden">
              <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='' type="hidden">

              <table class="tablita">
                <thead>
                  <th>Banco</th>
                  <th>Tipo</th>
                  <th>Categoria</th>
                  <th>Detalle</th>
                  <th>Monto</th>
                  <th>Empresa</th>

                </thead>
                <tbody id="input_tr">


                  <tr class='tr_new' id="0">


                  <td>
                    <select class="form-control" name="inp_text2_0" id="inp_text2_0" required>
                    </select>

                  </td>
                  <td>
                    <select class="form-control" name="inp_text3_0" id="inp_text3_0" required>
                      <option value="1">Ingreso</option>
                      <option value="2">Gasto</option>
                    </select>

                  </td>
                  <td>
                    <select class="form-control" name="inp_text4_0" id="inp_text4_0" required>

                    </select>

                  </td>
                  <td>
                    <textarea class="form-control" name="inp_text5_0" id="inp_text5_0" rows="1" cols="40" value=""></textarea>

                  </td>
                  <td>
                    <input type="number" class="form-control" name="inp_text6_0" id="inp_text6_0" value="" required>

                  </td>
                  <td>
                    <select class="form-control" id="inp_text7_0" name="inp_text7_0" required>
                      <option>Seleccione</option>
                      <option value="1">Youtube</option>
                      <option value="2">Google</option>
                    </select>

                  </td>


                  </tr>

                </tbody>
              </table>
            </div>

            </fieldset>
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

<!-- inicio modal editar admin -->
<div class="modal fade" id='myModaleditaAdmin' tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog " style="width:80%">
    <form id="formAdmin" class="form-horizontal form-label-left" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title" id="myModaleditaLabel"> <span id="title"></span> Seguimiento</h3>
        </div>
        <div class="modal-body">
          <fieldset>


            <div class="padre"  style="display:flex">

              <div class="button_nueva">
                <button type="button" class="btn btn-primary" id="btnNuevaFila" style="margin-bottom: 12px;"><i class="fa fa-plus"></i> Nueva fila</button>

              </div>


              <div class="checkbox checkbox-primary" style="padding-left: 34px;">
              <input id="iflast" type="checkbox" checked="">
               <label for="checkbox2">
                  Mantener ultimo
               </label>
              </div>
            </div>



            <input id="contador" name="contador" class="form-control" placeholder="" readonly="true" value='' type="hidden">
            <input id="inp_text1" name="inp_text1" class="form-control" placeholder="" readonly="true" value='' type="hidden">
            <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='' type="hidden">

            <table class="tablita">
              <thead>
                <th>Banco</th>
                <th>Tipo</th>
                <th>Categoria</th>
                <th>Detalle</th>
                <th>Monto</th>
                <th>Empresa</th>

              </thead>
              <tbody id="input_tr">


                <tr class='tr_new' id="0">


                <td>
                  <select class="form-control" name="inp_text2_0" id="inp_text2_0" required>
                  </select>

                </td>
                <td>
                  <select class="form-control" name="inp_text3_0" id="inp_text3_0" required>
                    <option value="1">Ingreso</option>
                    <option value="2">Gasto</option>
                  </select>

                </td>
                <td>
                  <select class="form-control" name="inp_text4_0" id="inp_text4_0" required>

                  </select>

                </td>
                <td>
                  <textarea class="form-control" name="inp_text5_0" id="inp_text5_0" rows="1" cols="40" value=""></textarea>

                </td>
                <td>
                  <input type="number" class="form-control" name="inp_text6_0" id="inp_text6_0" value="" required>

                </td>
                <td>
                  <select class="form-control" id="inp_text7_0" name="inp_text7_0" required>
                    <option>Seleccione</option>
                    <option value="1">Youtube</option>
                    <option value="2">Google</option>
                  </select>

                </td>


                </tr>

              </tbody>
            </table>
          </div>

          </fieldset>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btnsendadmin">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- fin modal admin -->

<div class="modal fade" id="myModalver" tabindex="-1" role="dialog" aria-label$('#myModaledita').modal('show');ledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Datos del seguimiento</h3>

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


<?php $this->load->view('includes/scripts') ?>

<script src="<?php echo base_url(); ?>vendor/bootstrap_calendar/bootstrap_calendar/js/bootstrap_calendar.min.js"></script>
<script src="<?php echo base_url(); ?>js/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>js/seguimiento_bancos.js"></script>


<script type="text/javascript">
var datos,fecha;
const TIP_USU = '<?php echo $this->session->userdata('logged_in')['tipo'] ?>'

$(function() {

  var start = moment().subtract(1, 'days');
  var end = moment();

  function cb(start, end) {
    $('#reportrange span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
  }

  $('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    locale: {
      format: 'DD-MM-YYYY'
    },
    ranges: {
      'Hoy': [moment(), moment()],
      'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
      'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
      'Este mes': [moment().startOf('month'), moment().endOf('month')],
      'Ultimo mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
  }, cb);

  cb(start, end);

});

$('#reportrange').on('apply.daterangepicker', function(ev, picker) {

  rangofecha=$('#datofecha').text();




    /*WORKSPACE*/
    /*
        HACER UN AJAX AL CONTROLADOR ENVIANDO LA VARIABLE rangofecha al controlador del reporte

    */
        $.ajax({
        url:base_url+'Seguimiento_bancos/get_by_rank',
        type:'POST',
        data: {fecha:rangofecha},
        success:function (data) {
          var datatable = ''
          $('#datatable-table').dataTable().fnDestroy();
          $.each(data, function (i,item) {
            datatable += `
            <tr>
              <td>${item.nom_ban}</td>
              <td>Nombre de la empresa</td>
              <td>${item.fech_seg_banco}</td>
              <td>${item.ide_tip_seg == '1' ? 'Ingreso' : 'Gasto'}</td>
              <td>${item.mont_seg_banco}</td>
              <td class="ver_registro" idr="${item.ide_seg_banco}" ><i class="fa fa-search"></i> </td>
            </tr>
                        `;
                        // <td class="edi_registro" idr="${item.ide_seg_obr}"><i class="fa fa-pencil"></i> </td>
                        // <td class="bor_registro" idr="${item.ide_seg_obr}"><i class="fa fa-trash-o"></i> </td>

          })
          $("#grillaDatos").html(datatable);
          $('#datatable-table').DataTable({
            responsive: true,
            oLanguage:{
              sSearch: 'Buscar:'
            },
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;
            // converting to interger to find total
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                    parseFloat(i.replace(/[A-Z]*\//g,"")) :
                        typeof i === 'number' ?
                            i : 0;
                };

              var monto = api
                    .column( 4 )
                    .data()
                    .reduce( function (a, b) {
                        return parseFloat(intVal(a) + intVal(b)) ;
                    }, 0 );

                $( api.column( 4 ).footer() ).html(`S/ ${parseFloat(monto).toFixed(2)}`);
            }
          })


        }
      })


    /*WORKSPACE*/

});
</script>
