jalar_data($("#filter2").val(), $("#filter1").val())
var fil_act = false
var textoinp_text2 = ''
var textoinp_text3 = ''
var textoinp_text4 = ''
//filtros
// comboselect(null, base_url+'Categorias/list_categorias','Tipo de categoria', 'item.ide_categoria','item.nom_cat', 'filter-form','filter3')

comboselect(null, base_url+'Mantenimiento/list_bancos','Seleccione banco', 'item.ide_bancos','item.nom_ban', 'filter-form','filter2')


// if (TIP_USU == '1') {
  //Modal Admin
  comboselect(null, base_url+'Categorias/list_categorias','Tipo de categoria', 'item.ide_categoria','item.nom_cat', 'formAdmin','inp_text4_0').then(function(data) {
    textoinp_text3 = $('#formAdmin #inp_text3_0').html()
  })

  comboselect(null, base_url+'Mantenimiento/list_bancos','Seleccione banco', 'item.ide_bancos','item.nom_ban', 'formAdmin','inp_text2_0').then(function(data) {
    textoinp_text8 = $('#formAdmin #inp_text1_0').html()
  })

// } else {
  //Modal usuario
  comboselect(null, base_url+'Categorias/list_categorias','Tipo de categoria', 'item.ide_categoria','item.nom_cat', 'form1','inp_text4_0')

  comboselect(null, base_url+'Mantenimiento/list_bancos','Seleccione banco', 'item.ide_bancos','item.nom_ban', 'form1','inp_text2_0')

// }




  $("#filter1").on('change', function () {

    if ($(this).val() != '') {
      jalar_data($("#filter2").val(), $("#filter1").val())
      fil_act = true
    } else {
      if (fil_act) {
        jalar_data($("#filter2").val(), $("#filter1").val())
      }
    }
  })

  $("#filter2").on('change', function () {
      if ($(this).val() != '') {
        jalar_data($("#filter2").val(), $("#filter1").val())
        fil_act = true
     } else {
       if (fil_act) {
         jalar_data($("#filter2").val(), $("#filter1").val())
       }
     }
  })



  $('#clear_inputs').click(function() {
  $('#filter1').val('')
  $('#filter2').val('')
  $('#clear_inputs').attr('disabled',true)
  jalar_data()
  })




$('#btnNuevaFila').click(function() {
  var tr = '' //formAdmin
  var idlasted = $('.tr_new').attr('id')
  var newide = parseFloat(idlasted)+1
  $('#contador').val(newide)
  var row = $('.tr_new')[0]
  var val_ant_1 = $(row).children()[0].childNodes[1].value
  var val_ant_2 = $(row).children()[1].childNodes[1].value
  var val_ant_3 = $(row).children()[2].childNodes[1].value

    tr +=`
    <tr class='tr_new' id="${newide}">
    <td style="border-left: solid 1px #c1c1c1;">
      <select id="inp_text2_${newide}" name="inp_text2_${newide}" class="form-control" required value>
      ${textoinp_text2}
      </select>

    </td>
    <td>
      <select class="form-control" name="inp_text3_${newide}" id="inp_text3_${newide}">
        <option value="1">Ingreso</option>
        <option value="2">Gasto</option>
      </select>

    </td>
    <td>
      <select class="form-control" name="inp_text4_${newide}" id="inp_text4_${newide}">
      ${textoinp_text3}
      </select>

    </td>
    <td>
      <textarea class="form-control" name="inp_text5_${newide}" id="inp_text5_${newide}" rows="1" cols="40" value=""></textarea>

    </td>
    <td>
      <input type="number" class="form-control" name="inp_text6_${newide}" id="inp_text6_${newide}" value="">

    </td>
    <td>
      <input type="number" class="form-control" name="inp_text7_${newide}" id="inp_text7_${newide}" value="">

    </td>
    <td>
      <input type="text" class="form-control" name="inp_text8_${newide}" id="inp_text8_${newide}" value="">

    </td>

    </tr>
         `

  $('#input_tr').prepend(tr);
  if ($('#iflast').is(':checked')) {
    $(`#inp_text2_${newide}`).val(val_ant_1)
    $(`#inp_text3_${newide}`).val(val_ant_2)
    $(`#inp_text4_${newide}`).val(val_ant_3)
  }
})

$("#btnNuevo").click(function () {
  $('input').val('')
  $('#contador').val('0')
  $("select").val('')
  $("#accion").val('nuevo')

  if (TIP_USU == '1') {
    $('#myModaleditaAdmin').modal('show')
  } else {

    $("#myModaledita").modal('show')
  }
  $("#title").html('Nuevo')
})

$('#btnsendadmin').click(function(e) {
  e.preventDefault()
  $.ajax({
    url: base_url+'Seguimiento_bancos/ins_admin',
    data: $('#formAdmin').serialize(),
    type: 'POST',
    success:function(data) {
      $('#myModaleditaAdmin').modal('hide')
      jalar_data($("#filter2").val(), $("#filter1").val())
    }
  })
})


$("#form1").on('submit',function(e) {
  e.preventDefault()
  e.stopImmediatePropagation()
  modalSentData()
})


$('#datatable-table').on('click','.ver_registro',function(e) {
  e.preventDefault()

  var idr = $(this).attr('idr')
  $('#title').html('Ver')
  modalData(idr)
  $('#myModalver').modal('show')
})

$('#datatable-table').on('click','.edi_registro',function(e) {
  e.preventDefault()
  var idr = $(this).attr('idr')
  modalData(idr)
  $('#accion').val('editar')
  $('#title').html('Editar')
  $('#myModaledita').modal('show')
})

$('#datatable-table').on('click','.bor_registro',function(e) {
  e.preventDefault()
  var idr = $(this).attr('idr')
  modalData(idr)
  $('#accion').val('borrar')
  Swal.fire({
  title: 'Estas seguro?',
  text: "No podras obtener este dato de nuevo",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, borrar!'
  }).then((result) => {
    if (result.value) {
      modalSentData()
    }
  })
})



function modalData(idr) {

  $.post(base_url+ `Seguimiento_bancos/list/${idr}`,function(data) {
    var detalle = '';
    var id_cat = '';
    $.each(data,function (i,item) {
      $("#inp_text1").val(item.ide_seg_obr)
      $("#inp_text3").val(item.ide_tip_seg)
      $('#inp_text5').val(item.det_seg_obr)
      $('#inp_text6').val(item.cant_seg_obr)
      $('#inp_text7').val(item.mon_seg_obr)



      comboselect(item.categoria_seg_obr, base_url+'Categorias/list_categorias','Tipo de categoria', 'item.ide_categoria','item.nom_cat', 'form1','inp_text2_0')
      comboselect(item.ide_banco, base_url+'Mantenimiento/list_bancos','Seleccione banco', 'item.ide_bancos','item.nom_ban', 'form1','inp_text1_0')


      detalle += `
      <tr><th>Banco:</th><td>${item.nom_ban}</td></tr>
      <tr><th>Tipo de seguimiento:</th><td>${item.ide_tip_seg == '1' ? 'Ingreso' : 'Gasto'}</td></tr>
      <tr><th>Categoria:</th><td>${item.nom_cat}</td></tr>
      <tr><th>Detalle seguimiento:</th><td>${item.det_seg_banco}</td></tr>
      <tr><th>Monto del seguimiento:</th><td>S/${parseFloat(item.mont_seg_banco).toFixed(2)}</td></tr>
      <tr><th>Empresa:</th><td>Nombre de empresa</td></tr>
      `;
    })

    $('#detalle_registro').html(detalle)

  })
}
$("#filter2").val(), $("#filter1").val()

  function jalar_data(banco=null, empresa=null) {
    datatable = ''
     $('#datatable-table').dataTable().fnDestroy()
    $.post(base_url+'seguimiento_bancos/list',{  empresa:empresa, banco:banco},function(data){
      $.each(data, function (i,item) {
        datatable += `
        <tr>
          <td>${item.nom_ban}</td>
          <td>Nombre de la empresa</td>
          <td>${item.fech_seg_banco}</td>
          <td>${item.ide_tip_seg == '1' ? 'Ingreso' : 'Gasto'}</td>
          <td>S/${parseFloat(item.mont_seg_banco).toFixed(2)}</td>
          <td class="ver_registro" idr="${item.ide_seg_banco}" ><i class="fa fa-search"></i> </td>
        </tr>
                    `;
                    // <td class="edi_registro" idr="${item.ide_seg_obr}"><i class="fa fa-pencil"></i> </td>
                    // <td class="bor_registro" idr="${item.ide_seg_obr}"><i class="fa fa-trash-o"></i> </td>

      })
      $("#grillaDatos").html(datatable);
      $('#datatable-table').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
                    'copy',
                    'excel',
                    'csv',
                ],
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
        // "dom": 'Bfrtip',
        // "buttons": [
        //     'excel', "csv"
        //   ],

      $('#clear_inputs').removeAttr('disabled')

    })
  }


function modalSentData() {
    var form = $('#form1')
    var accion = $('#accion').val()
    $('#btnGuardar').attr('disabled', true)
    switch (accion) {
        case 'nuevo':
            var destino = 'ins'
            break;
        case 'edita':
            var destino = 'upd'
            break;
        case 'borrar':
            var destino = 'del'
            break;
    }
    var formxx = $('#form1');
    console.log(form);
    console.log(formxx);
    var formdata = false;

    if (window.FormData) {
        console.log('XXXXX');
        formdata = new FormData(formxx[0]);
    }

    console.log(formdata);
    console.log(formxx.serialize());

    $.ajax({
        url: `${base_url}Seguimiento_bancos/${destino}`,
        data: formdata ? formdata : formxx.serialize(),
        contentType: false,
        processData: false,
        type: 'POST',
        success: function() {
            jalar_data()
            $('#myModaledita').modal('hide')
            $('#btnGuardar').removeAttr('disabled')
        },
        error: function() {
            alert('Ha ocurrido un errors')
            $('#btnGuardar').removeAttr('disabled')
        }
    })
}
