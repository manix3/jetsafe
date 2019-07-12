jalar_data()

$("#btnNuevo").click(function () {
    $('input').val('')
  $("#accion").val('nuevo')
  $('#pass').show()

  $("#myModaledita").modal('show')
  $("#title").html('Nuevo')
})

$("#form1").on('submit',function(e) {
  e.preventDefault()
  e.stopImmediatePropagation()
  modal_sent_data()
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
      modal_sent_data()
    }
  })
})

function modalData(idr) {
  $('#pass').hide()
  $.post(base_url+ `Usuario/get_usu/${idr}`,function(data) {
    var detalle = '';
    $.each(data,function (i,item) {
      $("#inp_text1").val(item.ide_usu)
      $("#inp_text2").val(item.nom_usu)
      $("#inp_text4").val(item.ide_tip_usu)


      detalle += `
      <tr><th>Nombre:</th><td>${item.nom_usu}</td></tr>
      <tr><th>Direccion: </th><td>Este dato no existe</td></tr>
      <tr><th>Email: </th><td>Este dato no existe</td></tr>



      `;
    })

    $('#detalle_registro').html(detalle)

  })
}

  function jalar_data() {
    datatable = ''
    $.getJSON(base_url+'Usuario/list_usu', function(data){
      $.each(data, function (i,item) {
        datatable += `
        <tr>
          <td>${item.nom_usu}</td>
          <td></td>
          <td></td>
          <td></td>

          <td class="ver_registro" idr="${item.ide_usu}" ><i class="fa fa-search"></i> </td>
          <td class="edi_registro" idr="${item.ide_usu}"><i class="fa fa-pencil"></i> </td>
          <td class="bor_registro" idr="${item.ide_usu}"><i class="fa fa-trash-o"></i> </td>
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

function modal_Data(destino) {

}

function modal_sent_data() {
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
    url:`${base_url}Usuario/${destino}`,
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
