jalar_data()

$("#btnNuevo").click(function () {
  $('input').val('')
  $("select").val('')
  $("#accion").val('nuevo')

  $("#myModaledita").modal('show')
  $("#title").html('Nuevo')
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

  $.post(base_url+ `productos/list_prod/${idr}`,function(data) {
    var detalle = '';
    var id_cat = '';
    $.each(data,function (i,item) {
      $("#inp_text1").val(item.productoid)
      $("#inp_text2").val(item.titulo)
      $("#inp_text3").val(item.titulo_en)
      $('#inp_text4').val(item.informacion_adicional)
      $('#inp_text5').val(item.precio)


      detalle += `
      <tr><th>Titulo:</th><td>${item.titulo}</td></tr>
      <tr><th>Titulo EN:</th><td>${item.titulo_en}</td></tr>
      <tr><th>Informacion adicional:</th><td>${item.informacion_adicional == '0' ? 'No' : 'Si'}</td></tr>
      <tr><th>Precio:</th><td>${item.precio}</td></tr>
      `;
    })

    $('#detalle_registro').html(detalle)

  })
}

  function jalar_data() {
    datatable = ''
    $.getJSON(base_url+'Productos/list_prod', function(data){
      $.each(data, function (i,item) {
        datatable += `
        <tr>
          <td>${item.titulo}</td>
          <td>${parseFloat(item.precio).toFixed(2)}</td>
          <td>${item.orden}</td>
          <td>${item.informacion_adicional == '1' ? 'Si' : 'No'}</td>
          <td>${item.estado == '1' ? 'Activo' : 'Inactivo'}</td>
          <td class="ver_registro" idr="${item.productoid}" ><i class="fa fa-search"></i> </td>
          <td class="edi_registro" idr="${item.productoid}"><i class="fa fa-pencil"></i> </td>
          <td class="bor_registro" idr="${item.productoid}"><i class="fa fa-trash-o"></i> </td>
        </tr>
                    `;

      })
      $("#grillaDatos").html(datatable);
      $('#datatable-table').DataTable({
        responsive: true,
        oLanguage:{
          sSearch: 'Buscar:'
        }
      })
    })
  }

function modalSentData() {
  let accion = $("#accion").val()
    switch (accion) {
      case 'nuevo':
      var destino = 'ins'

      break;
      case 'editar':
      var destino = 'upd'

      break;
      case 'borrar':
      var destino = 'del'

      break;

    }
    $.ajax({
      url:`${base_url}productos/${destino}`,
      data : $('#form1').serialize(),
      type: 'POST',
      success:function(data){
        $("#datatable-table").DataTable().destroy()
        jalar_data();
        $("#myModaledita").modal("hide");

      },
      error:function(data) {
        alert('Error!','Hubo un error en el proceso','error')
      }
    })
}
