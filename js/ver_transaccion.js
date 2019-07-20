$(function() {
  jalar_data(IDR)

  $('#btnLog').click(function() {
    var log = ''
    $.getJSON(base_url+'compras/get_log/'+1+'/'+IDR,function(data) {
      $.each(data,function(i,item) {
      log += `
      <tr>
        <td>Pedido id:${item.pedidoid}</td>
        <td>${item.titulo}</td>
        <td>${item.observacion}</td>
        <td>${item.fecha}</td>
      </tr>
        `
      })
      $('#log').html(log)
    })
    $('#myModalog').modal('show')
  })

  $('#datatable-table-pedidos').on('click','.ver_registro',function(e) {
    e.preventDefault()
    var idr = $(this).attr('idr')
    location.href = base_url+'compras/ver_usuarios/'+idr
  })

  $('#datatable-table-pedidos').on('click','.imp_registro',function(e) {
    var idr = $(this).attr('idr')
    var vou = $(this).attr('vou')
    var dom = $(this).attr('dom')

    window.open(`${dom}/upload/${idr}/${vou}`,'_blank')
  })

  $('#datatable-table-pedido').on('click','.edi_registro',function(e) {
    e.preventDefault()
      var idr = $(this).attr('idr')
      window.open(base_url+'compras/ver_transaccion_detalle/'+idr,'_blank')
  })

  $('#form_estado_').submit(function(e) {
    e.preventDefault()
    $('#btnNuevo').attr('disabled',true)
    $.ajax({
      url: base_url+'compras/cambiar_estado_pedi',
      data: $(this).serialize(),
      type: 'POST',
      success:function(data) {
        $('#myModaleditapedido').modal('hide')
        $('#btnNuevo').removeAttr('disabled')
        jalar_data($('#id_trans').html())
      }
    })
  })


    // $('#estado').change(function() {
    //   if ($(this).val() != '') {
    //     if ($(this).val() == '1') {
    //       $('#denegar').hide()
    //       $('#aprobar').show()
    //     } else if($(this).val() == '2') {
    //       $('#aprobar').hide()
    //       $('#denegar').show()
    //     }
    //   }
    // })
    //
    // $('#motivo').change(function() {
    //   if ($(this).val() != '') {
    //     if ($(this).val() == '05') {
    //       $('#descripcion').show()
    //     } else {
    //       $('#descripcion').hide()
    //     }
    //   }
    // })


      $('#datatable-table-pedidos').on('click','.edi_registro',function(e) {
        e.preventDefault()
          $("input").val('')
          var datos = ''
          var idr = $(this).attr('idr')

          $.getJSON(base_url+'compras/modal_tramites/'+idr,function(data) {
            $.each(data,function(i,item) {
            datos += `
            <tr><th>ID:</th><td>${item.pedidoid}</td></tr>
            <tr><th>METODO DE PAGO:</th><td>${item.titulo_metodo_pago}</td></tr>
            <tr><th>EMAIL:</th><td>${item.email}</td></tr>
            <tr><th>CANTIDAD:</th><td>${item.cantidad}</td></tr>
            <tr><th>TOTAL:</th><td>${parseFloat(item.total).toFixed(2)}</td></tr>
            <tr><th>ESTADO:</th><td>${item.titulo_estado}</td></tr>
            <tr><th>SUBTOTAL:</th><td>${item.subtotal}</td></tr>
            <tr><th>IGV:</th><td>${item.igv}</td></tr>
              `
              $('#form_estado_ #inp_text1').val(item.pedidoid)

            })
            $('#detalle_registro_').html(datos)
          })
          $('#myModaleditapedido').modal('show')
      })


    $('#form_estado').submit(function(e) {
      e.preventDefault()
      $('#btnNuevo').attr('disabled',true)
      $.ajax({
        url: base_url+'compras/cambiar_estado_pedi',
        data: $(this).serialize(),
        type: 'POST',
        success:function(data) {
          $('#myModalver').modal('hide')
          $('#btnNuevo').removeAttr('disabled')
          jalar_data()
        }
      })
    })
})

function jalar_data(idr) {
    $('#datatable-table-pedidos').dataTable().fnDestroy()
    var tabla_empresa = '', tabla_ = '', tabla_pen = ''
    $.getJSON(base_url+`compras/list_tramite/${idr}`,function(data) {
      $.each(data.tramites,function(i,item) {
        $('#id_trans').html(item.transaccionid)
        tabla_empresa += `
        <tr>
        <td>${item.codigo_afiliacion}</td>
        <td>${item.ruc}</td>
        <td>${item.razon_social}</td>
        <td>${item.nombre_comercial}</td>
        <td>${item.email}</td>
        </tr>
        `

        tabla_ += `
        <tr>
          <td>${item.titulo}</td>
          <td>${item.tipooperacion}</td>
          <td>${item.moneda}</td>
          <td>${item.banco}</td>
          <td>${item.nrooperacion}</td>
          <td>${item.titulo_estado}</td>
          <td class="edi_registro" idr="${item.transaccionid}"><i class="fa fa-search"></i> </td>

        </tr>
        `

      })


      $.each(data.detalle,function(e,etim) {
        if (etim.metodopagoid != '1001') {
          var imp = `<td class="imp_registro" idr="${etim.transaccionid}" vou="${etim.voucher}" dom="${etim.dominio}"><i class="fa fa-file"></i> </td>`
        } else {
          var imp = '<td> </td>'
        }

        tabla_pen += `
        <tr>
          <td>${etim.pedidoid}</td>
          <td>${etim.titulo_metodo}</td>
          <td>${etim.email}</td>
          <td>${etim.cantidad}</td>
          <td>${etim.total}</td>
          <td>${etim.titulo_estado}</td>
          <td>${etim.subtotal}</td>
          <td>${etim.igv}</td>
          <td>${etim.idioma}</td>
          ${imp}
          <td idr="${etim.pedidoid}" class="edi_registro"><i class="fa fa-pencil"></i></td>
          <td idr="${etim.pedidoid}" class="ver_registro"><i class="fa fa-search"></i></td>
        </tr>
        `
      })
      $('#detalle_empresa').html(tabla_empresa)
      $('#detalle_tabla_').html(tabla_)
      $('#detalle_tabla_pedido').html(tabla_pen)
      $('#datatable-table-pedidos').DataTable({
        responsive: true,
        "scrollX":true,
        oLanguage:{
          sSearch: 'Buscar:'
        },
        dom: 'Bfrtip',
        buttons:[
         "excel"
        ]
      })
    })
}
