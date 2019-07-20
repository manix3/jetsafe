$(function() {
  jalar_data(IDR)

  $('#datatable-table').on('click','.imp_registro',function(e) {
    var idr = $(this).attr('idr')
    var vou = $(this).attr('vou')
    var dom = $(this).attr('dom')
    var pd = $(this).attr('pd')
    window.open(`${dom}/upload/${idr}/${pd}/${vou}`,'_blank')
  })
})

function jalar_data(idr) {
  var tabla1 = '', tabla2 = '', tabla3 = ''
  $.getJSON(base_url+'compras/list_usuarios/'+idr,function(data) {
    $.each(data,function(i,item) {
      if (item.metodopagoid == '1001') {
        var tar = `<td class="tar_registro" idr="${item.pedidoid}"><i class="fa fa-file"></i> </td>`
      } else {
        var tar = '<td> </td>'
      }
      tabla1 += `
      <tr>
        <td>${item.prod_titulo}</td>
        <td>${item.cantidad}</td>
        <td>${item.subtotal}</td>
        <td>${item.fecha}</td>
        <td>${item.nombres}</td>
        <td>${item.apellido_paterno}</td>
        <td>${item.apellido_materno}</td>
        <td>${item.celular}</td>
        <td>${item.email}</td>
        <td>${item.nacionalidad}</td>
        <td>${item.departamento}</td>
        <td>${item.ciudad}</td>
        <td>${item.direccion}</td>
        <td>${item.tipo_documento_identidad}</td>
        <td>${item.documento_identidad}</td>
        <td>${item.fecha_nacimiento}</td>
        <td>${item.pais}</td>
        <td>${item.fecha_arribo}</td>
        <td>${item.fecha_salida}</td>
        <td>${item.residencia}</td>
        <td>${item.ocupacion}</td>
        <td>${item.cargo}</td>
        <td>${item.centro_laboral}</td>
        <td>${item.negocio_propio}</td>
        <td>${item.origen_fondos}</td>
        <td class="imp_registro" idr="${item.pedidoid}" pd="${item.pedidodetalleid}" vou="${item.archivo}" dom="${item.dominio}"><i class="fa fa-file"></i> </td>
        ${tar}
      </tr>
      `

      tabla2 += `
      <tr>
      <td>${item.titulo_metodo_pago}</td>
      <td>${item.nombre_comercial}</td>
      <td>${item.pedido_email}</td>
      <td>${item.titulo_estado}</td>
      <td>${item.cantidad}</td>
      <td>${item.observacion_pedi}</td>
      <td>${item.idioma}</td>

      </tr>
      `

      $('#datatable-table').on('click','.tar_registro',function(e) {
        e.preventDefault()
        tabla3 += `
        <tr>
        <td>${item.tarjeta_numero}</td>
        <td>${item.tarjeta_nombre}</td>
        <td>${item.tarjeta_fecha}</td>
        <td>${item.tarjeta_cvv}</td>
        <td>${item.total}</td>
        <td>${item.subtotal}</td>
        <td>${item.igv}</td>

        </tr>
        `
        $('#detalle_registro_tarjeta').html(tabla3)
        $('#myModalvertar').modal('show')
      })
    })
    $('#grillaDatos').html(tabla1)
    $('#detalle_tabla_transaccion').html(tabla2)
    $('#datatable-table').DataTable({
      "scrollX": true,
      responsive: true,
      oLanguage:{
        sSearch: 'Buscar'
      },
      dom: 'Bfrtip',
      buttons:[
       "excel"
      ]
    })
  })
}
