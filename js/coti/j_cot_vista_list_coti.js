$(function(){



  function jalar_data() {

    var grillautx='';
    var nrox=0;
    var otablex = {};
    $.getJSON(Gruta+'coti/Cot_cotizacion/cot_listar', function(data) {

      $.each(data, function(k,item){
        nrox++;
        if(item.items[0]) { nombreproducto=item.items[0].nom_prod} else { nombreproducto=''};
      //console.log(item.items[0]);
        grillautx=grillautx+`<tr >
        <td  >${k+1} </td>
        <td  >${item.nombre_destino} </td>
        <td  >${nombreproducto} </td>
        <td  >${item.email_destino} </td>
        <td  >${item.det_est_cot} </td>
        <td  >${item.fecha} </td>
        <td  >${item.detalle_tip_mon} </td>
        <td  > ${item.sim_moneda} ${item.subtotal} </td>
        <td  > ${item.sim_moneda} ${item.total} </td>
         <td class="ver_registro" idr="${item.ide_cotizacion}"  width="10px"><i class="fa fa-search"></i> </td>
         <td class="edi_registro" idr="${item.ide_cotizacion}" width="10px"><i class="fa fa-pencil"></i> </td>
         <td class="bor_registro" idr="${item.ide_cotizacion}" width="10px"><i class="fa fa-trash-o"></i> </td>
         </tr> `;

      }) // Fin Each
      $('#grilladatos').html(grillautx );

      tabledatos = $('#datatable-table').DataTable({
          "order": [[ 4, "desc" ],[ 0, "desc" ]],
        "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 8,9,10] }
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
                destino = "est_Coti_ins";
                break;
            case "edita":
                destino = "est_Coti_upd";
                break;
            case "borra":
                destino = "cot_del";
                break;
        }


          $.ajax({
            url:`${Gruta}coti/Cot_cotizacion/${destino}`,
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
      $('#myModaleditaLabel').html('Borrar Cotizacion');
      $('#accion').val('borra');

      $.getJSON(Gruta+'coti/Cot_cotizacion/cot_listar/'+idr, function(data) { // Inicio JSON
        $.each(data, function(k,item){
          $('#nom').val(item.det_est_cot);
          $('#ide_cot').val(item.ide_cotizacion);
          });
        $('#myModalborrar').modal('show')
      });
    });




});
