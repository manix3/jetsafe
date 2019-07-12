$(function(){



  function jalar_data() {
    comboselect(null,Gruta+"Usuario/get_emp","Seleccione la Empresa","item.ide_empresa","item.emp_nombre","form_usu","inp_text7");
    comboselectmultiple(null,Gruta+"Usuario/get_mod","Seleccione Modulos","item.ide_mod","item.mod_nom","form_usu","inp_text8");
    var grillautx='';
    var nrox=0;
    var otablex = {};
    $.getJSON(Gruta+'public/Empresas/emp_list', function(data) {

      $.each(data, function(k,item){
        nrox++;
        grillautx=grillautx+`<tr >
        <td  >${item.ide_empresa} </td>
        <td  >${item.emp_nombre} </td>
        <td  >${item.emp_ruc} </td>
        <td  >${item.emp_telefono1} </td>
        <td  >${item.correo_empresa} </td>
         <td class="ver_registro" idr="${item.ide_empresa}" ><i class="fa fa-search"></i> </td>
         <td class="edi_registro" idr="${item.ide_empresa}"><i class="fa fa-pencil"></i> </td>
         <td class="bor_registro" idr="${item.ide_empresa}"><i class="fa fa-trash-o"></i> </td>
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

      $(".select2").each(function(){
          $(this).select2($(this).data());
      });

      $(".form1").on('submit', function(e){  // Cambio de id a clase
        e.preventDefault();
        e.stopImmediatePropagation();
        var form = $(this);

        form.parsley().validate();
        if (form.parsley().isValid()){
        var tipo_accion=$('#accion').val();

        switch(tipo_accion) {
            case "nuevo":
                destino = "emp_ins";
                break;
            case "edita":
                destino = "emp_upd";
                break;
            case "borra":
                destino = "emp_del";
                break;
        }


          $.ajax({
            url:`${Gruta}public/Empresas/${destino}`,
            data:$(this).serialize(),
            type:'POST',
            success:function(data){
              $('#datatable-table').dataTable().fnDestroy();
              limpiaForm('form1');
              jalar_data();
              $('#myModaledita').modal('hide');
              $('#myModalborrar').modal('hide');
            },
            error:function(data){
              alert('Error');
            }
          });

        }
      });

    }

    pjaxPageLoad();
    SingApp.onPageLoad(pjaxPageLoad);

    $("#btnNuevo").click(function() {
      limpiaForm('myModaledita');
      $('#myModaleditaLabel').html('Nueva Empresa');
      $('#accion').val('nuevo');
      $('#myModaledita').modal('show')
    })

    /*** Ver Registro ****/
    $("#datatable-table").on('click','.ver_registro',function() {

    var idr = $(this).attr('idr');
  //  console.log('Id de registro '+idr);
  $('#myModalver #myModaleditaLabel').html('Datos Almacen');
    $('#accion').val('edita');
    var det_registro='';
    $.getJSON(Gruta+'public/Empresas/emp_list/'+idr, function(data) { // Inicio JSON
      $.each(data, function(k,item){
        det_registro+=`
        <tr><th>ID </th> <td>${item.ide_empresa}</td></tr>
        <tr><th>Empresa </th> <td>${item.emp_nombre}</td></tr>
        <tr><th>Nom. Comercial</th><td>${item.nombre_comercial}</td></tr>
        <tr><th>RUC</th><td>${item.emp_ruc}</td></tr>
        <tr><th>COD</th><td>${item.emp_cod}</td></tr>
        <tr><th>Direccion</th><td>${item.emp_direccion}</td></tr>
        <tr><th>Telefono</th><td>${item.emp_telefono1}</td></tr>
        <tr><th>Correo</th><td>${item.correo_empresa}</td></tr>
        <tr><th>Firma </th><td>${item.firma}</td></tr>`;

      });
         $('#detalle_registro').html(det_registro);
        $('#myModalver').modal('show')
    });
    });



    /*** Edita Registro ****/
    $("#datatable-table").on('click','.edi_registro',function() {

    var idr = $(this).attr('idr');
    $('#myModaleditaLabel').html('Editar Empresa');
    $('#accion').val('edita');

    $.getJSON(Gruta+'public/Empresas/emp_list/'+idr, function(data) { // Inicio JSON

      $.each(data, function(k,item){
        $('#inp_text1').val(item.ide_empresa)
        $('#inp_text3').val(item.emp_nombre)
        $('#inp_text9').val(item.nombre_comercial)
        $('#inp_text10').val(item.emp_cod)
        $('#inp_text7').val(item.emp_ruc)
        $('#inp_text4').val(item.emp_telefono1)
        $('#inp_text5').val(item.correo_empresa)
        $('#inp_text6').val(item.emp_direccion)
        $('#inp_text8').val(item.firma)

        });

      $('#myModaledita').modal('show')
    });
  });

    /*** Elimina Registro ****/
    $("#datatable-table").on('click','.bor_registro',function() {

      var idr = $(this).attr('idr');
      $('#myModaleditaLabel').html('Borrar Empresa');
      $('#accion').val('borra');

      $.getJSON(Gruta+'public/Empresas/emp_list/'+idr, function(data) { // Inicio JSON
        $.each(data, function(k,item){
          $('#nom').val(item.emp_nombre);
          $('#ide').val(item.ide_empresa);
          });
        $('#myModalborrar').modal('show')
      });
    });




});
