var a;
$(function(){

$('#back').click(function () {
  location.href= Gruta+"Cotizacion/cotizar"
})


$('#print').click(function () {
  fpdf();
})

$('#fact').click(function () {
  $.post(Gruta+"factu/Facturar/fact_cot/"+ide_cot,function (data) {
    if (data.nombre) {
      window.open(Gruta+'f_files/'+data.nombre);
    }
  })
})


  function jalar_data() {

    var grillautx='';
    var nrox=0;
    var otablex = {};
    $.getJSON(Gruta+'coti/Cot_cotizacion/get_company', function(data) {
      $.each(data, function(k,item){
        $('#cot_company_name').text(item.emp_nombre)
        $('#cot_dir').text(item.emp_direccion)
        $('#cot_ruc').text(item.emp_ruc)
        $('#cot_mail_emp').text(item.correo_empresa)
        $('#cot_tel_emp').text(item.emp_telefono1)
        $('#img_emp').attr('src',Gruta+'img/empresas/'+item.img)
      })

    });

    $.getJSON(Gruta+'coti/Cot_cotizacion/cot_listar/'+ide_cot, function(data) {

      $.each(data, function(k,item){
        $('#cot_fech').text(item.fecha)
        $('#cot_num').text(item.serie+' #'+item.numero)
        $('#cot_sub').append(parseFloat(item.subtotal).toFixed(2))
        $('#cot_igv').append(parseFloat(item.igv).toFixed(2))
        $('#cot_total').append(parseFloat(item.total).toFixed(2))
        $('#cot_nom_cli').text(item.nombre_destino)
        $('#cot_email').text(item.email_destino)
        $('#cot_telefono').text(item.telefono_destino)
        $('#cot_gls').text(item.gls_cotizacion)

        $('.cot_mone').text(item.sim_moneda)

      }) // Fin Each

        if (data[0].items.length > 0) {
        $.each(data[0].items, function(k,item){
          grillautx+=`
           <tr>
                 <td>${k+1}</td>
                 <td>${item.nom_com_prod}</td>
                 <td class="hidden-xs">${item.nom_prod}</td>
                 <td>${item.cot_cantidad}</td>
                 <td class="hidden-xs">${item.precio_prod}</td>
                 <td>${item.cot_precio}</td>
             </tr>`;

        })
        $('#coti_prod').html(grillautx);
      }
    var files= '';
        if (data[0].files.length > 0) {
        $.each(data[0].files, function(k,item){
          files+=`
           <tr>
                 <td>${k+1}</td>
                 <td>${item.gls_prod_files}</td>
             </tr>`;

        })
        $('#coti_files').html(files);
      }else {
        files+=`
         <tr>
               <td> </td>
               <td>No Tiene Archivos Adjuntos</td>
           </tr>`;

          $('#coti_files').html(files);
      }





    }) // Fin Json


  } // Fin Funcion jalar_data


    function pjaxPageLoad(){

      jalar_data();



      $(".form1").on('submit', function(e){  // Cambio de id a clase
        e.preventDefault();
        e.stopImmediatePropagation();
        var form = $(this);

        form.parsley().validate();
        if (form.parsley().isValid()){
        var tipo_accion=$('#accion').val();

        switch(tipo_accion) {
            case "nuevo":
                destino = "est_Coti_ins";
                break;
            case "edita":
                destino = "est_Coti_upd";
                break;
            case "borra":
                destino = "est_Coti_del";
                break;
        }


          $.ajax({
            url:`${Gruta}coti/Cot_mantenimiento/${destino}`,
            data:$(this).serialize(),
            type:'POST',
            success:function(data){

              $('#datatable-table').dataTable().fnDestroy();
              limpiaForm('form1');
              jalar_data();
              $('#myModaledita').modal('hide');
              $('#myModalborrar').modal('hide');
              //   $("#success").show().fadeOut(20000); //=== Show Success Message==
            },
            error:function(data){
              alert('Error');
              // $("#error").show().fadeOut(20000); //===Show Error Message====
            }
          });

        }
      });

    }

    pjaxPageLoad();
    SingApp.onPageLoad(pjaxPageLoad);

    $("#btnNuevo").click(function() {
      limpiaForm('myModaledita');
      $('#myModaleditaLabel').html('Nuevo Almacen');
      $('#accion').val('nuevo');
      $('#myModaledita').modal('show')
    })





    /*** Ver Registro ****/
    $("#datatable-table").on('click','.ver_registro',function() {
    var idr = $(this).attr('idr');
    location.href = Gruta+'coti/Cot_cotizacion/cot_ver/'+idr

    });












    /*** Edita Registro ****/
    $("#datatable-table").on('click','.edi_registro',function() {

    var idr = $(this).attr('idr');
    $('#myModaleditaLabel').html('Editar Estado');
    $('#accion').val('edita');

    $.getJSON(Gruta+'coti/Cot_cotizacion/cot_listar/'+idr, function(data) { // Inicio JSON
      $.each(data, function(k,item){
        $('#inp_text1').val(item.ide_cotizacion);
        $('#inp_text2').val(item.det_est_cot);
        });
      $('#myModaledita').modal('show')
    });
  });

    /*** Elimina Registro ****/
    $("#datatable-table").on('click','.bor_registro',function() {

      var idr = $(this).attr('idr');
      $('#myModaleditaLabel').html('Borrar Tipo Movimiento');
      $('#accion').val('borra');

      $.getJSON(Gruta+'coti/Cot_cotizacion/cot_listar/'+idr, function(data) { // Inicio JSON
        $.each(data, function(k,item){
          $('#nom').val(item.det_est_cot);
          $('#ide').val(item.ide_cotizacion);
          });
        $('#myModalborrar').modal('show')
      });
    });




});


function fpdf() {

  	var a = document.createElement("a");
		a.target = "_blank";
		a.href = Gruta+"coti/Cot_cotizacion/imp_reg/"+ide_cot;
		a.click();

}
