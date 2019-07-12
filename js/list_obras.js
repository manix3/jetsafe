jalar_data($("#filter4").val(), $("#filter2").val(), $("#filter1").val(), $("#filter3").val())
var fil_act = false
var textoinp_text2 = ''
var textoinp_text3 = ''
var textoinp_text4 = ''
//filtros
comboselect(null, base_url+'Categorias/list_categorias','Tipo de categoria', 'item.ide_categoria','item.nom_cat', 'filter-form','filter3')
comboselect(null, base_url+'Obras/list','Seleccione obra', 'item.ide_obra','item.cod_obr', 'filter-form','filter1')
comboselect(null, base_url+'Mantenimiento/list_bancos','Seleccione banco', 'item.ide_bancos','item.nom_ban', 'filter-form','filter4')


// if (TIP_USU == '1') {
  //Modal Admin
  comboselect(null, base_url+'Categorias/list_categorias','Tipo de categoria', 'item.ide_categoria','item.nom_cat', 'formAdmin','inp_text4_0').then(function(data) {
    textoinp_text3 = $('#formAdmin #inp_text4_0').html()
  })
  comboselect(null, base_url+'Obras/list','Seleccione obra', 'item.ide_obra','item.cod_obr', 'formAdmin','inp_text2_0').then(function(data) {
    textoinp_text2 = $('#formAdmin #inp_text2_0').html()
  })
  comboselect(null, base_url+'Mantenimiento/list_bancos','Seleccione banco', 'item.ide_bancos','item.nom_ban', 'formAdmin','inp_text8_0').then(function(data) {
    textoinp_text8 = $('#formAdmin #inp_text8_0').html()
  })

// } else {
  //Modal usuario
  comboselect(null, base_url+'Categorias/list_categorias','Tipo de categoria', 'item.ide_categoria','item.nom_cat', 'form1','inp_text4')
  comboselect(null, base_url+'Obras/list','Seleccione obra', 'item.ide_obra','item.cod_obr', 'form1','inp_text2')
  comboselect(null, base_url+'Mantenimiento/list_bancos','Seleccione banco', 'item.ide_bancos','item.nom_ban', 'form1','inp_text8')

// }




  $("#filter1").on('change', function () {

    if ($(this).val() != '') {
      jalar_data($("#filter4").val(), $("#filter2").val(), $("#filter1").val(), $("#filter3").val())
      fil_act = true
    } else {
      if (fil_act) {
        jalar_data($("#filter4").val(), $("#filter2").val(), $("#filter1").val(), $("#filter3").val())
      }
    }
  })

  $("#filter2").on('change', function () {
      if ($(this).val() != '') {
        jalar_data($("#filter4").val(), $("#filter2").val(), $("#filter1").val(), $("#filter3").val())
        fil_act = true
     } else {
       if (fil_act) {
         jalar_data($("#filter4").val(), $("#filter2").val(), $("#filter1").val(), $("#filter3").val())
       }
     }
  })
  $("#filter3").on('change', function () {

      if ($(this).val() != '') {

        jalar_data($("#filter4").val(), $("#filter2").val(), $("#filter1").val(), $("#filter3").val())
        fil_act = true
      } else {
        if (fil_act) {
          jalar_data($("#filter4").val(), $("#filter2").val(), $("#filter1").val(), $("#filter3").val())
        }
      }
  })
  $("#filter4").change( function () {
      if ($(this).val() != '') {
        jalar_data($("#filter4").val(), $("#filter2").val(), $("#filter1").val(), $("#filter3").val())
        fil_act = true
      } else {
        if (fil_act) {
          jalar_data($("#filter4").val(), $("#filter2").val(), $("#filter1").val(), $("#filter3").val())
        }
      }
  })

  $('#clear_inputs').click(function() {
  $('#filter1').val('')
  $('#filter2').val('')
  $('#filter3').val('')
  $('#filter4').val('')
  $('#clear_inputs').attr('disabled',true)
  jalar_data()
  })




$('#btnNuevaFila').click(function() {
  var tr = '' //formAdmin
  var idlasted = $('.tr_new').attr('id')
  var newide = parseFloat(idlasted)+1
  $('#contador').val(newide)
  var row = $('.tr_new')[0]
  var val_ant_2 = $(row).children()[0].childNodes[1].value
  var val_ant_3 = $(row).children()[2].childNodes[1].value
  var val_ant_8 = $(row).children()[6].childNodes[1].value

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
      <select class="form-control" name="inp_text8_${newide}" id="inp_text8_${newide}">
        ${textoinp_text8}
      </select>

    </td>
    <td>
      <input type="text" name="inp_text9_${newide}" id="inp_text9_${newide}" class="form-control" value="">
    </td>
    <td>
      <input type="number" name="inp_text10_${newide}" id="inp_text10_${newide}" class="form-control" value="">
    </td>
    <td>
      <input type="text" name="inp_text11_${newide}" id="inp_text11_${newide}" class="form-control" value="">
    </td>
    <td>

      <div class="panel">
        <i id="pls_img" style="text-align: center;" class="fa fa-file-o"></i>
        <div class="col-md-12" style="display:none">
          <div class="form-group" id="group_img">
            <div class="input-group">
              <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                  Buscar… <input type="file" id="imgInp_${newide}" name="imgInp_${newide}">
                </span>
              </span>
              <input type="text" class="form-control" readonly>
            </div>
            <!--<img id='img-upload'  class="img-responsive" />-->
          </div>
        </div>
      </div>
    </td>


    </tr>
         `

  $('#input_tr').prepend(tr);
  if ($('#iflast').is(':checked')) {
    $(`#inp_text2_${newide}`).val(val_ant_2)
    $(`#inp_text4_${newide}`).val(val_ant_3)
    $(`#inp_text8_${newide}`).val(val_ant_8)
  }
})

$("#btnNuevo").click(function () {
  $('input').val('')
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
    url: base_url+'seguimientos_obras/ins_admin',
    data: $('#formAdmin').serialize(),
    type: 'POST',
    success:function(data) {
      $('#myModaleditaAdmin').modal('hide')
      jalar_data($("#filter4").val(), $("#filter2").val(), $("#filter1").val(), $("#filter3").val())
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

    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#group_img').append('<img id="img-upload"  class="img-responsive" style="width: 40%; margin: 3% 0 0 5%; height:  40%;"/>')
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {

        console.log(this);
        readURL(this);
    });

function modalData(idr) {

  $.post(base_url+ `Obras/list/${idr}`,function(data) {
    var detalle = '';
    var id_cat = '';
    $.each(data,function (i,item) {
      $("#inp_text1").val(item.ide_seg_obr)
      $("#inp_text3").val(item.ide_tip_seg)
      $('#inp_text5').val(item.det_seg_obr)
      $('#inp_text6').val(item.cant_seg_obr)
      $('#inp_text7').val(item.mon_seg_obr)

      $('#img-upload').attr('src', base_url + "/uploads/" + item.img_seg_obr);


      comboselect(item.categoria_seg_obr, base_url+'Categorias/list_categorias','Tipo de categoria', 'item.ide_categoria','item.nom_cat', 'form1','inp_text3')
      comboselect(item.ide_obra, base_url+'Obras/list_obras_combo','Seleccione obra', 'item.ide_obra','item.cod_obr', 'form1','inp_text2')
      comboselect(item.ide_banco, base_url+'Mantenimiento/list_bancos','Seleccione banco', 'item.ide_bancos','item.nom_ban', 'form1','inp_text8')


      detalle += `
      <tr><th>Codigo de obra:</th><td>${item.cod_obr}</td></tr>
      <tr><th>Tipo de seguimiento:</th><td>${item.ide_tip_seg == '1' ? 'Ingreso' : 'Gasto'}</td></tr>
      <tr><th>Categoria:</th><td>${item.nom_cat}</td></tr>
      <tr><th>Detalle seguimiento:</th><td>${item.det_seg_obr}</td></tr>
      <tr><th>Cantidad para seguimiento:</th><td>${item.cant_seg_obr}</td></tr>
      <tr><th>Monto para seguimiento:</th><td>${item.mon_seg_obr}</td></tr>
      <tr><th>Banco:</th><td>${item.nom_ban}</td></tr>
      <tr><th>Imagen</th><td><img src="${base_url}/uploads/${item.img_seg_obr}" style="margin-left: 20%;width: 150px;height: 150px;"></td></tr>


      `;
    })

    $('#detalle_registro').html(detalle)

  })
}
  $("#filter4").val(), $("#filter2").val(), $("#filter1").val(), $("#filter3").val()

  function jalar_data(banco=null, tipo = null , cod_obr=null,categoria=null) {
    datatable = ''
    $('#datatable-table').dataTable().fnDestroy()
    $.post(base_url+'seguimientos_obras/list',{cod_obr:cod_obr, tipo: tipo, categoria:categoria, banco:banco},function(data){
      $.each(data, function (i,item) {
        datatable += `
        <tr>
          <td>${item.cod_obr}</td>
          <td>${item.ide_tip_seg == '1' ? 'Ingreso' : 'Gasto'}</td>
          <td>${item.det_seg_obr}</td>
          <td>${item.nom_cat}</td>
          <td>${item.cant_seg_obr}</td>
          <td>${item.mon_seg_obr}</td>
          <td>${item.ingreso_gasto_efectivo}</td>
          <td>${item.gasto_efectivo}</td>
          <td>${item.saldo_banco_seg_obr}</td>
          <td class="ver_registro" idr="${item.ide_seg_obr}" ><i class="fa fa-search"></i> </td>
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
        // "dom": 'Bfrtip',
        // "buttons": [
        //     'excel', "csv"
        //   ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
        // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                parseFloat(i.replace(/[A-Z]*\//g,"")) :
                    typeof i === 'number' ?
                        i : 0;
            };

          var ingreso = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return parseFloat(intVal(a) + intVal(b)) ;
                }, 0 );

          var gasto = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return parseFloat(intVal(a) + intVal(b)) ;
                }, 0 );
          var saldo = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return parseFloat(intVal(a) + intVal(b)) ;
                }, 0 );

            $( api.column( 6 ).footer() ).html(`S/ ${parseFloat(ingreso).toFixed(2)}`);
            $( api.column( 7 ).footer() ).html(`S/ ${parseFloat(gasto).toFixed(2)}`);
            $( api.column( 8 ).footer() ).html(`S/ ${parseFloat(saldo).toFixed(2)}`);

        }
      })
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
        url: `${base_url}seguimientos_obras/${destino}`,
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
