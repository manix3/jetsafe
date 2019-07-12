$(function() {

  getData()

  $("#btnNuevo").click(function(e) {
    e.preventDefault();
    $("#input").val('')
    $("#accion").val("nuevo");
    $("#myModaledita").modal("show");
  });

  $('#form1').on('submit',function (e) {
    e.preventDefault()
    modalShowUp()
  })
});

function modalData() {
  $.getJSON(base_url+'',function (data) {
    $.each(data,function (i,item) {
      $('').val()
      $('').val()
      $('').val()
      $('').val()
      $('').val()
      $('').val()
      $('').val()
      $('').val()
      $('').val()
      $('').val()
      $('').val()
    })
  })
}

function getData() {
  let datatable = ''

  $.getJSON(base_url+'', function(data) {
    $.each(data, function(i,item) {
      datatable += `
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="ver_registro" idr="${item.}" ><i class="fa fa-search"></i> </td>
        <td class="edi_registro" idr="${item.}"><i class="fa fa-pencil"></i> </td>
        <td class="bor_registro" idr="${item.}"><i class="fa fa-trash-o"></i> </td>
      </tr>
      `;
    })
    $('#grillaDatos').html(datatable);
    tabledatos = $('#datatable-table').DataTable({
      'oLanguage':{
        'sSearch': 'Buscar:'
      }
    })
  })
}

function modalShowUp() {
let accion = $('#accion').val()
  switch (accion) {
    case "nuevo":
      destino: "ven_nue"
      break;
    case "edita":
      destino: "ven_edi"
      break;
    case "borra":
      destino: "ven_bor"
      break;

  }
}
