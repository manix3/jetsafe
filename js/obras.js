jalar_data()

comboselect(null, base_url+'Obras/list_presupuesto','Tipo de presupuesto', 'item.ide_presu','item.cod_obr', 'form1','inp_text5')


$("#btnNuevo").click(function () {

  $('input').val('')
  $('textarea').val('')
  $("#accion").val('nuevo')
  var code = count()
  code.done((data) => {
   $("#inp_text2").val('ADSOBR0'+data.length)
  })
  $("#myModaledita").modal('show')
  $("#title").html('Nuevo')

})

function count() {
    return ($.getJSON(base_url+'Obras/list', function(data){

    })
)


}

$("#form1").on('submit',function(e) {
  e.preventDefault()
  e.stopImmediatePropagation()
  modal_sent_data()

})
$("#formcsv").on('submit',function(e) {
  e.preventDefault()
  e.stopImmediatePropagation()
  var bin = 0
  ingresar_cvs(bin)

})
$("#Vista_previa").click(function () {

  $("#oculto").css("display", "none");
  if($("#archivo").val() != ''){
    var bin = 1
    $("#submitForm").attr("disabled", false);
    ingresar_cvs(bin)
  }else{
    Swal.fire({
    title: '¿No has seleccionado ningun archivo?',
    text: "Es necesario un archivo en este campo",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK!'
    }).then((result) => {
      if (result.value) {
        $("#submitForm").attr("disabled", true);
      }
    })
  }})



$('#datatable-table').on('click','.ver_registro',function(e) {
  e.preventDefault()

  var idr = $(this).attr('idr')
  $('#title').html('Ver')
  modalData(idr)
  $('#myModalver').modal('show')
})


$('#datatable-table').on('click','.add_presu',function(e) {
  e.preventDefault()
  var idr = $(this).attr('idr')
  var cod = $(this).attr('id')
  var ix = verify(cod);
  ix.done((data) => {
    if( data == false){
      modalData(idr)
      $('#modalPresupuesto').modal('show')
      $("#oculto").css("display", "none");
      $("#submitForm").attr("disabled", true);
      $("#inp_text001").val('')
    }else{
      Swal.fire({
        title: 'Un momento!',
        text: "Esta obra ya posee un presupuesto asignado",
        type: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'De acuerdo!'
      })
    }

  })
})

function verify(cod) {
  return ($.getJSON(base_url+`Obras/verify/${cod}`, function(data){

  }))
}


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

function ingresar_cvs(bin) {
var materiales = ''
var mano_obra = ''
var equipos = ''
if($("#inp_text001").val() != ''){

  var formData = new FormData(document.getElementById("formcsv"));
  $.ajax({
                 url: base_url+ `Obras/ins_csv/${bin}`,
                 type: "post",
                 dataType: "html",
                 data: formData,
                 cache: false,
                 contentType: false,
 	               processData: false,
                 success:function (data) {

                   if(data == 'false'){
                     Swal.fire({
                     title: 'Error de formato!',
                     text: "El archivo tiene un error de formato, asegurese de utilizar la extension y el formato indicado por su administrador!!",
                   })

                 }else if (data == 'true'){
                   Swal.fire({
                   title: 'Exito!',
                   text: "Se han guardado los datos",
                   type: 'success',
                   showCancelButton: false,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Ok!'
                   }).then((result) => {
                     if (result.value) {
                       $("#modalPresupuesto").modal('hide')
                     }
                   })
             }else{


                  $("#oculto").css("display", "block");
                  // $("#oculto").show()
                   var datos = JSON.parse(data)

                   var total = 0
                   var total1 = 0
                   var total2 = 0
                   $.each(datos['MATERIALES'], function (i, item) {
                     total = total + item.parcial
                     materiales += `
                     <tr>
                     <td>${item.codigo}</td>
                     <td>${item.nombre}</td>
                     <td>${item.unidad}</td>
                     <td>${item.cantidad}</td>
                     <td>${item.precio}</td>
                     <td>${item.parcial}</td>

                     </tr>
                     `;
                   })
                   $.each(datos['EQUIPOS'], function (i, item) {
                     total1 = total1 + item.parcial
                     equipos += `
                     <tr>
                     <td>${item.codigo}</td>
                     <td>${item.nombre}</td>
                     <td>${item.unidad}</td>
                     <td>${item.cantidad}</td>
                     <td>${item.precio}</td>
                     <td>${item.parcial}</td>
                     </tr>
                     `;
                   })
                   $.each(datos['MANO DE OBRA'], function (i, item) {
                     total2 = total2 + item.parcial
                     mano_obra += `
                     <tr>
                     <td>${item.codigo}</td>
                     <td>${item.nombre}</td>
                     <td>${item.unidad}</td>
                     <td>${item.cantidad}</td>
                     <td>${item.precio}</td>
                     <td>${item.parcial}</td>
                     </tr>
                     `;
                   })

                   $("#total").val(totalTotales)
                   $("#vistaMateriales").html(materiales)
                   $("#total").html(total)
                   $("#vistaEquipos").html(equipos)
                   $("#total1").html(total1)
                   $("#vistaMano_obra").html(mano_obra)
                   $("#total2").html(total2)
                   var totalTotales = total + total1 + total2
                 }
                 }

               })
}else{
  Swal.fire({
  title: '¿No has seleccionado ningun archivo?',
  text: "Este campo debe contener un archivo",
})
}

}

function modalData(idr) {

  $.post(base_url+ `Obras/list/${idr}`,function(data) {
    var detalle = '';
    $.each(data,function (i,item) {
      $("#inp_text1").val(item.ide_obra)
      $("#inp_text2").val(item.cod_obr)
      $('#inp_text3').val(item.tit_obr)
      $('#inp_text4').val(item.des_obr)
      $('#inp_text6').val(item.caja_chica_obr)
      $('#inp_text7').val(item.fecha_obr)
      $('#inp_text8').val(item.dir_obra)
      $('#inp_text9').val(item.ide_est_obr)
      $('#id').val(item.ide_obra)
      $('#cod_obr').val(item.cod_obr)



      comboselect(item.ide_presu, base_url+'Obras/list_presupuesto','Tipo de presupuesto', 'item.ide_presu','item.cod_obr', 'form1','inp_text5')


      detalle += `
      <tr><th>Nombre:</th><td>${item.cod_obr}</td></tr>
      <tr><th>Titulo:</th><td>${item.tit_obr}</td></tr>
      <tr><th>Descripcion:</th><td>${item.des_obr}</td></tr>
      <tr><th>Caja chica:</th><td>${item.caja_chica_obr}</td></tr>
      <tr><th>Monto total:</th><td>${item.mon_tot_obr}</td></tr>
      <tr><th>Fecha de obra:</th><td>${item.fecha_obr}</td></tr>
      <tr><th>Direccion de obra:</th><td>${item.dir_obra}</td></tr>
      <tr><th>Estado de obra:</th><td>${item.ide_est_obr == '1' ? 'Planeacion' : 'Ejecusion'}</td></tr>

      `;
    })

    $('#detalle_registro').html(detalle)

  })
}

  function jalar_data() {
    datatable = ''
    $('#datatable-table').dataTable().fnDestroy()
    $.getJSON(base_url+'Obras/list', function(data){
      $.each(data, function (i,item) {
        datatable += `
        <tr>
          <td>${item.tit_obr}</td>
          <td>${item.cod_obr}</td>
          <td>${item.caja_chica_obr}</td>
          <td>${item.mon_tot_obr}</td>
          <td>${item.mon_tot_obr}</td>
          <td>${item.fecha_obr}</td>
          <td>${item.ide_est_obr == '1' ? 'Planeacion' : 'Ejecusion' }</td>
          <td class="ver_registro" idr="${item.ide_obra}" ><i class="fa fa-search"></i> </td>
          <td class="add_presu" id='${item.cod_obr}' idr="${item.ide_obra}" ><i class="fa fa-plus"></i> </td>
        </tr>
                    `;
                    // <td class="edi_registro" idr="${item.ide_obra}"><i class="fa fa-pencil"></i> </td>
                    // <td class="bor_registro" idr="${item.ide_obra}"><i class="fa fa-trash-o"></i> </td>

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
    url:`${base_url}Obras/${destino}`,
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
