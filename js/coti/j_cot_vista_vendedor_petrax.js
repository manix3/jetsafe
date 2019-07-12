$(function(){



  function jalar_data() {

    var grillautx='';
    var nrox=0;
    var otablex = {};
    $.getJSON(Gruta+'coti/cot_vendedor/ven_list', function(data) {

      $.each(data, function(k,item){
        nrox++;
        grillautx=grillautx+`<tr >
        <td  >${item.ide_vendedor} </td>
        <td  >${item.ven_nom} ${item.ven_ape_pat} ${item.ven_ape_mat}  </td>
        <td  >${item.ven_tel1} </td>
        <td  >${item.ven_email} </td>
         <td class="ver_registro" idr="${item.ide_vendedor}" ><i class="fa fa-search"></i> </td>
         <td class="edi_registro" idr="${item.ide_vendedor}"><i class="fa fa-pencil"></i> </td>
         <td class="bor_registro" idr="${item.ide_vendedor}"><i class="fa fa-trash-o"></i> </td>
         </tr> `;

      }) // Fin Each
      $('#grilladatos').html(grillautx );

      tabledatos = $('#datatable-table').DataTable({
        "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 2,3,4] }
        ],

        "oLanguage": {
          "sSearch": "Buscar: "
        }
      });


      $(".dataTables_length select").selectpicker({
        width: 'auto'
      });






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
                destino = "ven_ins";
                break;
            case "edita":
                destino = "ven_upd";
                break;
            case "borra":
                destino = "ven_del";
                break;
        }


          $.ajax({
            url:`${Gruta}coti/cot_vendedor/${destino}`,
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
      $('#myModaleditaLabel').html('Nuevo Vendedor');
      $('#accion').val('nuevo');
      $('#myModaledita').modal('show')
    })

    /*** Ver Registro ****/
    $("#datatable-table").on('click','.ver_registro',function() {

    var idr = $(this).attr('idr');
  //  console.log('Id de registro '+idr);
  $('#myModalver #myModaleditaLabel').html('Datos Vendedor');
    $('#accion').val('edita');
    var det_registro='';
    $.getJSON(Gruta+'coti/cot_vendedor/ven_list/'+idr, function(data) { // Inicio JSON
      $.each(data, function(k,item){
        det_registro+=`
        <tr><th>Nombre</th><td>${item.ven_nom}</td></tr>
        <tr><th>Apellido Paterno </th><td>${item.ven_ape_pat}</td></tr>
        <tr><th>Apellido Mateno </th><td>${item.ven_ape_mat}</td></tr>
        <tr><th>Telefono 1 </th><td>${item.ven_tel1}</td></tr>
        <tr><th>Email </th><td>${item.ven_email}</td></tr>

        `;
      });
         $('#detalle_registro').html(det_registro);
        $('#myModalver').modal('show')
    });
    });
    /*** Edita Registro ****/
    $("#datatable-table").on('click','.edi_registro',function() {

    var idr = $(this).attr('idr');
    $('#myModaleditaLabel').html('Editar Vendedor');
    $('#accion').val('edita');

    $.getJSON(Gruta+'coti/cot_vendedor/ven_list/'+idr, function(data) { // Inicio JSON
      $.each(data, function(k,item){
        $('#inp_text1').val(item.ide_vendedor);
        $('#ven_nom').val(item.ven_nom);
        $('#ven_ape_pat').val(item.ven_ape_pat);
        $('#ven_ape_mat').val(item.ven_ape_mat);
        $('#ven_doc').val(item.ven_doc);
        $('#ven_dir').val(item.ven_dir);
        $('#ven_ruc').val(item.ven_ruc);
        $('#ven_tel1').val(item.ven_tel1);
        $('#ven_tel2').val(item.ven_tel2);
        $('#ven_tel3').val(item.ven_tel3);
        $('#ven_email').val(item.ven_email);
        $('#ven_gls').val(item.ven_gls);
        $('#ven_fecha_nac').val(item.ven_fecha_nac);
        $('#ven_facebook').val(item.ven_facebook);
        $('#ven_twitter').val(item.ven_twitter);

        });
      $('#myModaledita').modal('show')
    });
  });

    /*** Elimina Registro ****/
    $("#datatable-table").on('click','.bor_registro',function() {

      var idr = $(this).attr('idr');
      $('#myModaleditaLabel').html('Borrar Vendedor');
      $('#accion').val('borra');

      $.getJSON(Gruta+'coti/cot_vendedor/ven_list/'+idr, function(data) { // Inicio JSON
        $.each(data, function(k,item){
          $('#nom').val(item.ven_nom);
          $('#ide').val(item.ide_vendedor);
          });
        $('#myModalborrar').modal('show')
      });
    });




});
