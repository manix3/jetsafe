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
    window.open(base_url+'compras/ver_usuarios/'+idr,'_blank')
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
      var datos = ''
      $.getJSON(base_url+'compras/get_log/'+0+'/'+idr,function(data) {
        $.each(data,function(i,item) {
        datos += `
        <tr>
          <td>Transaccion id:${item.transaccionid}</td>
          <td>${item.titulo}</td>
          <td>${item.observacion != null ? item.observacion : ' '}</td>
          <td>${item.fecha}</td>
        </tr>
          `
        })
        comboselect(null, base_url+'compras/comboselect_motivos', 'Seleccione motivo', 'item.id','item.titulo', 'form_estado','motivo')

        $('#detalle_registro').html(datos)
      })
      $('#myModalver').modal('show')
      // window.open(base_url+'compras/ver_transaccion_detalle/'+idr,'_blank')
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


    $('#form_estado #estado').change(function() {
      if ($(this).val() != '') {
        if ($(this).val() == '1') {
          $('#form_estado #denegar').hide()
          $('#form_estado #aprobar').show()
        } else if($(this).val() == '2') {
          $('#form_estado #aprobar').hide()
          $('#form_estado #denegar').show()
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


      $('#datatable-table-pedidos').on('click','.edi_registro',function(e) {
        e.preventDefault()
          $("input").val('')
          var datos = ''
          var idr = $(this).attr('idr')
          $('#form_estado_ #inp_text1').val(idr)
            $.getJSON(base_url+'compras/get_log/'+1+'/'+IDR,function(data) {
              $.each(data,function(i,item) {
              datos += `
              <tr>
                <td>Pedido id:${item.pedidoid}</td>
                <td>${item.titulo}</td>
                <td>${item.observacion}</td>
                <td>${item.fecha}</td>
              </tr>
                `
              })
            $('#detalle_registro_').html(datos)
          })
          $('#myModaleditapedido').modal('show')
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
          jalar_data($('#id_trans').html())
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
        <td>${item.codigo_afiliacion != null ? item.codigo_afiliacion : ' '}</td>
        <td>${item.ruc != null ? item.ruc : ' '}</td>
        <td>${item.razon_social != null ? item.razon_social : ' '}</td>
        <td>${item.nombre_comercial != null ? item.nombre_comercial : ' '}</td>
        <td>${item.email != null ? item.email : ' '}</td>
        </tr>
        `

        tabla_ += `
        <tr>
          <td>${item.titulo != null ? item.titulo : ' '}</td>
          <td>${item.tipooperacion != null ? item.tipooperacion : ' '}</td>
          <td>${item.moneda != null ? item.moneda : ' '}</td>
          <td>${item.banco != null ? item.banco : ' '}</td>
          <td>${item.nrooperacion != null ? item.nrooperacion : ' '}</td>
          <td>${item.titulo_estado != null ? item.titulo_estado : ' '}</td>
          <td class="edi_registro" idr="${item.transaccionid}"><i class="fa fa-search"></i> </td>

        </tr>
        `

      })


      $.each(data.detalle,function(e,etim) {
        if (etim.metodopagoid != '1001') {
          var imp = `<td class="imp_registro" idr="${etim.transaccionid}" vou="${etim.voucher}" dom="${etim.dominio}"><i class="fa fa-file"></i><span style="display:none">${etim.dominio}/upload/${etim.transaccionid}/${etim.voucher}</span></td>`
        } else {
          var imp = '<td> </td>'
        }

        if (etim.estado_transaccion == '2') {
          var editar = '<td> </td>'
        } else {
          var editar = `<td idr="${etim.pedidoid}" class="edi_registro"><i class="fa fa-pencil"></i></td>`
        }
        tabla_pen += `
        <tr>
          <td>${etim.pedidoid}</td>
          <td>${etim.titulo_metodo != null ? etim.titulo_metodo : ' '}</td>
          <td>${etim.email != null ? etim.email : ' '}</td>
          <td>${etim.cantidad != null ? etim.cantidad : ' '}</td>
          <td>${etim.total != null ? etim.total : ' '}</td>
          <td>${etim.titulo_estado != null ? etim.titulo_estado : ' '}</td>
          <td>${etim.subtotal != null ? etim.subtotal : ' '}</td>
          <td>${etim.igv != null ? etim.igv : ' '}</td>
          <td>${etim.idioma != null ? etim.idioma : ' '}</td>
          ${imp}
          ${editar}
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
