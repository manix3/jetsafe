$(function(){



  function jalar_data() {
    var mod = [];
    comboselect(null,Gruta+"Usuario/get_emp","Seleccione la Empresa","item.ide_empresa","item.emp_nombre","form_usu","inp_text7");
    comboselectmultiple(mod,Gruta+"Usuario/get_mod","Seleccione Modulos","item.ide_mod","item.mod_nom","form_usu","inp_text8");
    var grillautx='';
    var nrox=0;
    var otablex = {};
    $.getJSON(Gruta+'Usuario/usu_list', function(data) {

      $.each(data, function(k,item){
        nrox++;
        grillautx=grillautx+`<tr >
        <td  >${item.usuario} </td>
        <td  >${item.usu_nom} </td>
        <td  >${item.usu_ape} </td>
        <td  >${item.emp_nombre} </td>
         <td class="ver_registro" idr="${item.ide_usu}" ><i class="fa fa-search"></i> </td>
         <td class="edi_registro" idr="${item.ide_usu}"><i class="fa fa-pencil"></i> </td>
         <td class="bor_registro" idr="${item.ide_usu}"><i class="fa fa-trash-o"></i> </td>
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
                destino = "usu_ins";
                break;
            case "edita":
                destino = "usu_upd";
                break;
            case "borra":
                destino = "usu_del";
                break;
        }


          $.ajax({
            url:`${Gruta}Usuario/${destino}`,
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
      $('#myModaleditaLabel').html('Nuevo Almacen');
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
    $.getJSON(Gruta+'Usuario/usu_list/'+idr, function(data) { // Inicio JSON
      $.each(data, function(k,item){
        var niv
        if (item.usu_niv === '0') {niv = 'SU'};
        if (item.usu_niv === '1') {niv = 'Administrador'};
        if (item.usu_niv === '2') {niv = 'Usuario'};

        det_registro+=`
        <tr><th>Ususario: </th> <td>${item.usuario}</td></tr>
        <tr><th>Nombre y Apellidos</th><td>${item.usu_nom}  ${item.usu_ape}</td></tr>
        <tr><th>Nivel</th><td>${niv}</td></tr>
        <tr><th>ID Empresa</th><td>${item.ide_empresa}</td></tr>
        <tr><th>Empresa </th><td>${item.emp_nombre}</td></tr>`;

      });
         $('#detalle_registro').html(det_registro);
        $('#myModalver').modal('show')
    });
    });



    /*** Edita Registro ****/
    $("#datatable-table").on('click','.edi_registro',function() {

    var idr = $(this).attr('idr');
    $('#myModaleditaLabel').html('Editar Tipo Vehiculo');
    $('#accion').val('edita');

    $.getJSON(Gruta+'Usuario/usu_list/'+idr, function(data) { // Inicio JSON
      var mod = [];
      $.each(data, function(k,item){
        $('#inp_text1').val(item.ide_usu);
        $('#inp_text2').val(item.usuario);
        $('#inp_text3').val(item.usu_nom);
        $('#inp_text4').val(item.usu_ape);
        $('#inp_text5').val(item.pass);
        $('#inp_text6 option[value="'+item.usu_niv+'"]').attr("selected", true);


        comboselect(item.ide_empresa,Gruta+"Usuario/get_emp","Seleccione la Empresa","item.ide_empresa","item.emp_nombre","form_usu","inp_text7");
        $.each(item.modulos,function (o,otem) {
          mod.push(otem.ide_mod);
        })
        });
        comboselectmultiple(mod,Gruta+"Usuario/get_mod","Seleccione Modulos","item.ide_mod","item.mod_nom","form_usu","inp_text8");
      $('#myModaledita').modal('show')
    });
  });

    /*** Elimina Registro ****/
    $("#datatable-table").on('click','.bor_registro',function() {

      var idr = $(this).attr('idr');
      $('#myModaleditaLabel').html('Borrar Tipo Movimiento');
      $('#accion').val('borra');

      $.getJSON(Gruta+'Usuario/usu_list/'+idr, function(data) { // Inicio JSON
        $.each(data, function(k,item){
          $('#nom').val(item.usu_nom);
          $('#ide').val(item.ide_usu);
          });
        $('#myModalborrar').modal('show')
      });
    });




});
