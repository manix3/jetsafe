$(function() {
  jalar_data(IDR)
})

function jalar_data(idr) {
        var datos = ''
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
    <tr><th>VOUCHE:</th><td>${item.voucher}</td></tr>
      `
      // $('#fecha').val(item.fecha)
      // $('#inp_text1').val(item.transaccionid)
      // comboselect(null, base_url+'compras/comboselect', 'Seleccione estado', 'item.id','item.titulo', 'form_estado','estado')
      // comboselect(null, base_url+'compras/comboselect_motivos', 'Seleccione motivo', 'item.id','item.titulo', 'form_estado','motivo')

    })
    $('#detalle_tabla_').html(datos)
  })
}
