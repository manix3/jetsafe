$(function() {
  jalar_data(IDR)

  $('#datatable-table').on('click','.imp_registro',function(e) {
    var idr = $(this).attr('idr')
    var vou = $(this).attr('vou')
    var dom = $(this).attr('dom')
    var pd = $(this).attr('pd')
    window.open(`${dom}/upload/${idr}/${pd}/${vou}`,'_blank')
  })

  $('#datatable-table').on('click','.tar_registro',function(e) {
    var tabla3 = ''
    var idr = $(this).attr('idr')
    e.preventDefault()
    $.getJSON(base_url+'compras/get_tarjeta_id/'+idr,function(data) {
      $.each(data,function(i,item) {
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
      })
    })
    $('#myModalvertar').modal('show')
  })
})

function jalar_data(idr) {
  var tabla1 = '',tabla2 = ''
  $.getJSON(base_url+'compras/list_usuarios/'+idr,function(data) {
    $.each(data.pedido, function(i,item) {

      tabla2 += `
      <tr>
      <td>${item.titulo != null ? item.titulo : ' '}</td>
      <td>${item.nombre_comercial != null ? item.nombre_comercial : ' '}</td>
      <td>${item.email != null ? item.email : ' '}</td>
      <td>${item.titulo_estado != null ? item.titulo_estado : ' '}</td>
      <td>${item.cantidad != null ? item.cantidad : ' '}</td>
      <td>${item.observacion != null ? item.observacion : ' '}</td>
      <td>${item.idioma != null ? item.idioma : ' '}</td>

      </tr>
      `
    })
    $.each(data.datos,function(i,item) {
      tabla1 += `
      <tr>
        <td>${item.producto != null ? item.producto : ' '}</td>
        <td>${item.cantidad != null ? item.cantidad : ' '}</td>
        <td>${item.subtotal != null ? item.subtotal : ' '}</td>
        <td>${item.fecha != null ? item.fecha : ' '}</td>
        <td>${item.nombres != null ? item.nombres : ' '}</td>
        <td>${item.apellido_paterno != null ? item.apellido_paterno : ' '}</td>
        <td>${item.apellido_materno != null ? item.apellido_materno : ' '}</td>
        <td>${item.celular != null ? item.celular : ' '}</td>
        <td>${item.email != null ? item.email : ' '}</td>
        <td>${item.nacionalidad != null ? item.nacionalidad : ' '}</td>
        <td>${item.departamento != null ? item.departamento : ' '}</td>
        <td>${item.ciudad != null ? item.ciudad : ' '}</td>
        <td>${item.direccion != null ? item.direccion : ' '}</td>
        <td>${item.tipo_documento_identidad != null ? item.tipo_documento_identidad : ' '}</td>
        <td>${item.documento_identidad != null ? item.documento_identidad : ' '}</td>
        <td>${item.fecha_nacimiento != null ? item.fecha_nacimiento : ' '}</td>
        <td>${item.pais != null ? item.pais : ' '}</td>
        <td>${item.fecha_arribo != null ? item.fecha_arribo : ' '}</td>
        <td>${item.fecha_salida != null ? item.fecha_salida : ' '}</td>
        <td>${item.residencia != null ? item.residencia : ' '}</td>
        <td>${item.ocupacion != null ? item.ocupacion : ' '}</td>
        <td>${item.cargo != null ? item.cargo : ' '}</td>
        <td>${item.centro_laboral != null ? item.centro_laboral : ' '}</td>
        <td>${item.negocio_propio != null ? item.negocio_propio : ' '}</td>
        <td>${item.origen_fondos != null ? item.origen_fondos : ' '}</td>
        <td>${item.tarjeta_cvv != null ? item.tarjeta_cvv : 'No presenta'}</td>
        <td>${item.tarjeta_fecha != null ? item.tarjeta_fecha : 'No presenta'}</td>
        <td>${item.tarjeta_nombre != null ? item.tarjeta_nombre : 'No presenta'}</td>
        <td>${item.tarjeta_numero != null ? item.tarjeta_numero : 'No presenta'}</td>
        <td class="imp_registro" idr="${item.pedidoid}" pd="${item.pedidodetalleid}" vou="${item.archivo}" dom="${item.dominio}"><i class="fa fa-file"></i><span style="display:none">${item.dominio}/upload/${item.pedidoid}/${item.pedidodetalleid}/${item.archivo}</span> </td>

      </tr>
      `

      })

      $('#detalle_tabla_transaccion').html(tabla2)


      $('#grillaDatos').html(tabla1)
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
