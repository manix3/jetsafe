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
  modalData(idr,'ver_registro')
  $('#myModalver').modal('show')
})

$('#datatable-table').on('click','.edi_registro',function(e) {
  e.preventDefault()
  var idr = $(this).attr('idr')
  modalData(idr,'edi_registro')
  $('#accion').val('editar')
  $('#title').html('Editar')
  $('#myModaledita').modal('show')
})



$('#datatable-table').on('click','.bor_registro',function(e) {
  e.preventDefault()
  var idr = $(this).attr('idr')
  modalData(idr,'bor_registro')
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

function modalData(idr,type) {

  $.post(base_url+ `metodo_pago/list_met_pag/${idr}`,function(data) {

            var detalle = '';
            var id_cat = '';

            switch (type) {
              case 'ver_registro':
              $.each(data,function (i,item) {
                detalle += `
                <tr><th>Titulo:</th><td>${item.titulo}</td></tr>
                <tr><th>Orden:</th><td>${item.orden}</td></tr>
                <tr><th>Estado:</th><td>${item.publicado}</td></tr>
                <tr><th>Activo Turista:</th><td>${item.activo_turista != '1' ? 'Activo' : 'Inactivo'}</td></tr>
                <tr><th>Notificación:</th><td>${item.notificacion}</td></tr>
                <tr><th>Observacion:</th><td>${item.observacion}</td></tr>
                <tr><th>Titulo <strong>(EN)</strong>:</th><td>${item.titulo_en}</td></tr>
                <tr><th>Observacion <strong>(EN)</strong>:</th><td>${item.observacion_en}</td></tr>
                `;
              })
              $('#detalle_registro').html(detalle)

                break;
              case 'edi_registro':

              $.each(data,function (i,item) {
                $("#inp_text1").val(item.metodopagoid)
                $("#inp_text2").val(item.titulo)
                $("#inp_text3").val(item.notificacion)
                $("#inp_text4").val(item.titulo_en)
                $("#inp_text5").val(item.orden)


                $("#inp_text6 option[value='"+item.estado+"']").attr('selected')
                $("#inp_text7 option[value='"+item.activo_turista+"']").attr('selected')


                CKEDITOR.instances['observacion'].setData(item.observacion)
                CKEDITOR.instances['observacion_en'].setData(item.observacion_en)

              })

              case 'bor_registro':

                break;
              default:

            }

          })


}

  function jalar_data() {
    datatable = ''
    $.getJSON(base_url+'Metodo_pago/list_met_pag', function(data){
      $.each(data, function (i,item) {
        datatable += `
        <tr>
          <td>${item.titulo}</td>
          <td>${item.orden}</td>
          <td>${item.publicado}</td>
          <td class="ver_registro" idr="${item.metodopagoid}" ><i class="fa fa-search"></i> </td>
          <td class="edi_registro" idr="${item.metodopagoid}"><i class="fa fa-pencil"></i> </td>
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

function modalSentData() {
let accion = $("#accion").val()
  switch (accion) {
    case 'nuevo':
    var destino = 'ins'

    break;
    case 'editar':
    var destino = 'upd_met_pago'

    break;
    case 'borrar':
    var destino = 'del'

    break;

  }

  $('#observacion').val(CKEDITOR.instances['observacion'].getData())
  $('#observacion_en').val(CKEDITOR.instances['observacion_en'].getData())

  $.ajax({
    url:`${base_url}/Metodo_pago/${destino}`,
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
