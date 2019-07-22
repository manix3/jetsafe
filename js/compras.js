$(function() {
  jalar_data()

  $('#btnLog').click(function() {
    var log = ''
    $.getJSON(base_url+'compras/get_log/'+0,function(data) {
      $.each(data,function(i,item) {
      log += `
      <tr>
        <td>Transaccion id:${item.transaccionid}</td>
        <td>${item.titulo}</td>
        <td>${item.observacion != null ? item.observacion : ' '}</td>
        <td>${item.fecha}</td>
      </tr>
        `
      })
      $('#log').html(log)
    })
    $('#myModalog').modal('show')
  })

  $('#datatable-table').on('click','.ver_registro',function(e) {
    e.preventDefault()
      var idr = $(this).attr('idr')
    window.open(`${base_url}compras/ver/${idr}`,'_blank')

  })

  $('#estado').change(function() {
    if ($(this).val() != '') {
      if ($(this).val() == '1') {
        $('#denegar').hide()
        $('#aprobar').show()
      } else if($(this).val() == '2') {
        $('#aprobar').hide()
        $('#denegar').show()
      }
    }
  })

  $('#motivo').change(function() {
    if ($(this).val() != '') {
      if ($(this).val() == '05') {
        $('#descripcion').show()
      } else {
        $('#descripcion').hide()
      }
    }
  })

  $('#form_estado').submit(function(e) {
    e.preventDefault()
    $('#btnNuevo').attr('disabled',true)
    $.ajax({
      url: base_url+'compras/cambiar_estado',
      data: $(this).serialize(),
      type: 'POST',
      success:function(data) {
        $('#myModalver').modal('hide')
        $('#btnNuevo').removeAttr('disabled')
        jalar_data()
      }
    })
  })

  $('#datatable-table').on('click','.imp_registro',function(e) {
    var idr = $(this).attr('idr')
    var vou = $(this).attr('vou')
    var dom = $(this).attr('dom')

    window.open(`${dom}/upload/${idr}/${vou}`,'_blank')
  })


  $('#datatable-table').on('click','.edi_registro',function(e) {
    e.preventDefault()
      $("input").val('')
      var datos = ''
      var idr = $(this).attr('idr')
      $.getJSON(base_url+'compras/list_tran/'+idr,function(data) {
        $.each(data,function(i,item) {
        datos += `
        <tr><th>ID:</th><td>${item.transaccionid}</td></tr>
        <tr><th>NOMBRE EMPRESA:</th><td>${item.nombre_comercial}</td></tr>
        <tr><th>METODO DE PAGO:</th><td>${item.titulo}</td></tr>
        <tr><th>TIPO OPERACION:</th><td>${item.tipooperacion}</td></tr>
        <tr><th>NRO OPERACION:</th><td>${item.nrooperacion}</td></tr>
        <tr><th>MONEDA:</th><td>${item.moneda}</td></tr>
        <tr><th>TOTAL:</th><td>${parseFloat(item.total).toFixed(2)}</td></tr>
        <tr><th>BANCO:</th><td>${item.banco}</td></tr>
        <tr><th>ESTADO:</th><td>${item.titulo_estado}</td></tr>
        <tr><th>FECHA:</th><td>${item.fecha}</td></tr>
          `
          $('#fecha').val(item.fecha)
          $('#inp_text1').val(item.transaccionid)
          comboselect(null, base_url+'compras/comboselect_motivos', 'Seleccione motivo', 'item.id','item.titulo', 'form_estado','motivo')

        })
        $('#detalle_registro').html(datos)
      })
      $('#myModalver').modal('show')
  })

})

function jalar_data() {
  var table = ''
  $('#datatable-table').dataTable().fnDestroy()

  $.getJSON(base_url+`compras/list_tran`,function(data) {
    $.each(data,function(i,item) {
      if (item.metodopagoid != '1001') {
          var imp = `<td class="imp_registro" idr="${item.transaccionid}" vou="${item.voucher}" dom="${item.dominio}"><i class="fa fa-file"></i> <span style="display:none">${item.dominio}/upload/${item.transaccionid}/${item.voucher}</span> </td>`
      } else {
        var imp = '<td> </td>'
      }

      table += `
      <tr>
        <td>${item.transaccionid}</td>
        <td>${item.nombre_comercial != null ? item.nombre_comercial : ' '}</td>
        <td>${item.titulo != null ? item.titulo : ' '}</td>
        <td>${item.tipooperacion != null ? item.tipooperacion : ' '}</td>
        <td>${item.nrooperacion != null ? item.nrooperacion : ' '}</td>
        <td>${item.moneda != null ? item.moneda : ' '}</td>
        <td>${parseFloat(item.total).toFixed(2) != null ? parseFloat(item.total).toFixed(2) : ' '}</td>
        <td>${item.banco != null ? item.banco : ' '}</td>
        <td>${item.titulo_estado != null ? item.titulo_estado : ' '}</td>
        <td>${item.fecha != null ? item.fecha : ' '}</td>
        ${imp}
        <td class="ver_registro" idr="${item.transaccionid}"><i class="fa fa-search"></i> </td>
        <td class="edi_registro" idr="${item.transaccionid}"><i class="fa fa-pencil"></i> </td>

      </tr>
      `
    })
    $('#grillaDatos').html(table)
    $('#datatable-table').DataTable({
      order: [[0,'DESC']],
      "scrollX": true,
      responsive: true,
      oLanguage:{
        sSearch: 'Buscar:'
      },
      dom: 'Bfrtip',
      buttons: [
        'excel'
      ]
    })
  })
}
