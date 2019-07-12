function getDate() {
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();

  if(dd<10) {
      dd = '0'+dd
  }

  if(mm<10) {
      mm = '0'+mm
  }

  todayx = yyyy + '/' + mm + '/' + dd;
  today = dd + '/' + mm + '/' + yyyy;
  console.log(today);
  //alert(today);
  $('#inp_text4').val(today);
  //document.getElementById("inp_text4").value = today;
}

var oTable
$(function(){


    /*WORKSPACE*/

//alert('joder2');

    $('#btn_nw_ev').click(function () {
    //  alert('joder');
//      getDate();


      var now = new Date();

var day = ("0" + now.getDate()).slice(-2);
var month = ("0" + (now.getMonth() + 1)).slice(-2);
var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
$('#inp_text4').val(today);

      $('#ef_1').css('display','none')
      $('#ef_2').css('display','block')
      $('#inp_text10').datetimepicker();


      comboselect(null,Gruta+'coti/cot_cotizacion/tip_cont','Seleccione Tipo de Contacto ','item.ide_seg_tip_con','item.detalle_seg_tip_con','form_nw_eve','inp_text11')
      comboselect(null,Gruta+'coti/cot_cotizacion/tip_cont','Seleccione Tipo de Contacto ','item.ide_seg_tip_con','item.detalle_seg_tip_con','form_nw_eve','inp_text12')
      comboselect(null,Gruta+'coti/cot_cotizacion/get_prior','Seleccione Prioridad','item.ide_prioridad','item.detalle_prioridad','form_nw_eve','inp_text13');

      $('#nw_ev').fadeIn();
    })


    $('#clse').click(function() {
      $('#nw_ev').fadeOut();
      $('#ef_1').css('display','block')
      $('#ef_2').css('display','none')
    })


    $('#form_nw_eve').on('submit', function(e) {
      e.preventDefault();
      var o = $(this).serialize();
      $.ajax({
        url:Gruta+'coti/Cot_cotizacion/seg_cot_ins',
        data:o,
        type:'post',
        success:function(data) {
            if (data) {
              $.getJSON(Gruta+'coti/Cot_cotizacion/seg_cot_list_ptrx/'+glob,function(data) {
          //      alert('ACTUALIZO');
                var seg_list='';
                $.each(data,function (i,item) {
                  if (i%2 == 0) {
                    var lr = 'on-left';
                  }else {
                    var lr = '';
                  }
                  seg_list+=`
                  <li class="${lr}">
                    <time class="event-time">
                            <span class="date">Ultimo Contacto</span>
                        <span class="time"><span class="fw-semi-bold">${item.seg_fecha}</span></span>
                    </time>
                    <span class="event-icon event-icon-primary">
                        <i class="glyphicon glyphicon-comment"></i>
                    </span>
                    <section class="event">
                        <h4 class="event-heading"> <strong>${item.detalle_seg_tip_con}</strong></h4>
                        <p class="fs-mini">
                            ${item.seg_detalle}
                        </p>
                        <span> <strong> Proximo Contacto: </strong></span><br>
                        <span>${item.seg_pro_con_fecha}</span>

                    </section>
                      </li>
                          `;
                })
                $('#esp_seguimiento').html(`
                  <div class="fondogris">
                        <br>
                        <h3 class="page-title">Seguimiento de  <span class="fw-semi-bold">Venta</span></h3>
                        <ul class="timeline" id="lineadetiempo">
                        </ul>
                     </div>   `);

                $('#lineadetiempo').html(seg_list);

              })
//alert($('#vendors').val());
                jalar_data(null, $('#vendors').val())
              limp()
            }else{
              return false;
            }
        }
      })
    })



    $('#GrillaProsc').on( 'click', 'tbody tr', function () {
         oTable.row( this ).edit();
     } );




    /*WORKSPACE*/









    function pjaxPageLoad(){

    //  jalar_data();  // PARA QUE LLAMAS OTRA VEZ SI YA LO HACES EN VENDEDOR
      comboselect(null,Gruta+'coti/cot_vendedor/ven_list','Asignar vendedor ','item.ide_vendedor','item.ven_nom','filtrar','vendors')



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
                destino = "cot_seg_upd";
                break;
            case "borra":
                destino = "cot_seg_del";
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



    $('#vendors').change(function () {
      if ($(this).val() != '') {
          ses_vendedor = $(this).val()
          console.log('primero');
          jalar_data(null, $(this).val())
      }else{
        console.log('segundo');
        ses_vendedor =  undefined;
        jalar_data()
      }
    })





    /*** Ver Registro ****/
    $("#datatable-table").on('click','.ver_registro',function() {

    var idr = $(this).attr('idr');

    var q = idr;
    glob= q;
    $('#inp_text1').val(q);
    $.getJSON(Gruta+'coti/Cot_reportes/seg_listar/'+q,function(data) {
      var cli_list='';
      $.each(data,function (i,item) {
        cli_list+=`
                <tr><th style="text-align: right;">Cliente</th><td></td></tr>
                <tr><th>Nombre Cliente</th><td>${item.nombrecompleto}</td></tr>
                <tr><th>Telefonos Cliente</th><td>${item.con_tel1} ${item.con_tel2} </td></tr>
                <tr><th>Email-Cliente</th><td>${item.con_email} </td></tr>
<tr><th>GLS Cliente</th><td><strong>${item.cli_gls}</strong> </td></tr>
                <tr><th style="text-align: right;">Vendedor</th><td></td></tr>
                <tr><th>Nombre Vendedor</th><td>${item.ven_nom} ${item.ven_ape_pat}</td></tr>

                <tr><th style="text-align: right;">Contacto</th><td></td></tr>
                <tr><th>Nombre Contacto / Cargo </th><td>${item.con_nom} / ${item.con_fun}</td></tr>
                <tr><th>Telefono Contacto</th><td>${item.con_tel1} </td></tr>
                <tr><th>Primer Contacto</th><td>${item.detalle_ori_cot} </td></tr>






                `;
                   $('#inp_nom_con').val(item.con_nom);
                   $('#inp_fun_con').val(item.con_fun);
                   $('#inp_tel_con1').val(item.con_tel1);
                   $('#inp_ema_con').val(item.con_email);
          // $('#s').text(item.sim_moneda+' '+item.subtotal);
          // $('#i').text(item.sim_moneda+' '+item.igv);
          // $('#t').text(item.sim_moneda+' '+item.total);
      })
      $('#grilla_datos_cliente').html(cli_list);
      var prod_list='';
      $.each(data[0].items,function (i,item) {
        prod_list+=`
                <tr>
                  <th>${item.nromeses}</th>
                  <th>${item.promedio == null ? item.promedio : 0}</th>
                  <th>${item.suma == null ? item.promedio :  0}</th>
                </tr>
                `;



      })




      $('#itemsGrillaProsc').html(prod_list);
       oTable = $('#GrillaProsc').dataTable();







    })



    $.getJSON(Gruta+'coti/Cot_cotizacion/seg_cot_list_ptrx/'+q,function(data) {
          $('#esp_seguimiento').empty();
        if (data.length > 0) {
          $('#esp_seguimiento').html(`
            <div class="fondogris">
                  <br>
                  <h3 class="page-title">Seguimiento de  <span class="fw-semi-bold">Venta</span></h3>
                  <ul class="timeline" id="lineadetiempo">
                  </ul>
               </div>   `);

        }else {
          $('#esp_seguimiento').html(`
            <div class="" style="border: solid 1px #c3c0c0;border-style:  dashed;   padding:  22%;">
               <center><h4>No tiene Seguimiento </h4></center>
               <center>Puede generar un evento en el Boton "Nuevo evento"</center>
             </div>
            </div>`);
        }

      var seg_list='';
      $.each(data,function (i,item) {
        if (i%2 == 0) {
          var lr = 'on-left';
        }else {
          var lr = '';
        }
        seg_list+=`
        <li class="${lr}">
          <time class="event-time">
                  <span class="date">Ultimo Contacto</span>
              <span class="time"><span class="fw-semi-bold">${item.seg_fecha}</span></span>
          </time>
          <span class="event-icon event-icon-primary">
              <i class="glyphicon glyphicon-comment"></i>
          </span>
          <section class="event">
              <h4 class="event-heading"> <strong>${item.detalle_seg_tip_con}</strong></h4>
              <p class="fs-mini">
                  ${item.seg_detalle}
              </p>
              <span> <strong> Proximo Contacto: </strong></span><br>
              <span>${item.seg_pro_con_fecha}</span>

          </section>
            </li>
            `;
            /*seg_list_old=`
            <li class="${lr}">
              <time class="event-time">
                  <span class="date">${item.seg_est}</span>
                  <span class="time"><span class="fw-semi-bold">${item.seg_fecha}</span></span>
              </time>
              <span class="event-icon event-icon-primary">
                  <i class="glyphicon glyphicon-comment"></i>
              </span>
              <section class="event">
                  <h4 class="event-heading"> <strong>${item.seg_titulo}</strong></h4>
                  <p class="fs-mini">
                      ${item.seg_detalle}
                  </p>
                  <span> <strong> Ultimo </strong></span>
                  <span>${item.detalle_seg_tip_con}</span>

              </section>
                </li>
                `; */
      })
  //    alert('aqui si');
      $('#lineadetiempo').html(seg_list);
    })

    $('#nw_ev').css('display','none');
    $('#ef_1').css('display','block')
    $('#ef_2').css('display','none')
    $('#myModalver').modal('show');






    });

/*** Fin ver registro ****/










    /*** Edita Registro ****/
    $("#datatable-table").on('click','.edi_registro',function() {

    var idr = $(this).attr('idr');
    $('#myModaleditaLabel').html('Editar Seguimiento');
    $('#accion').val('edita');

    $.getJSON(Gruta+'coti/Cot_reportes/seg_listar/'+idr, function(data) { // Inicio JSON
      $.each(data, function(k,item){
    //    alert(item.ide_cotizacion);
        $('#for_edi_seg #inp_text1').val(item.ide_cotizacion);
//        $('#inp_text2').val(item.det_est_cot);

        comboselect(item.ide_vendedor,Gruta+'coti/cot_vendedor/ven_list','Filtrar por vendedor ','item.ide_vendedor','item.ven_nom','for_edi_seg','vendedor')



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


function limp() {
  $('#inp_text2').val('');
  $('#inp_text3').val('');
///  $('#inp_text4').val('');
  $('#inp_text5').val('');

  $('#inp_text10').val('');
  $('#inp_text11').val('');
  $('#inp_text13').val('');
  $('#inp_text14').val(0);
  $('#nw_ev').fadeOut();
  $('#ef_1').css('display','block')
  $('#ef_2').css('display','none')


}





  function jalar_data(fech=null, ide_vendedor = null ) {
  //  alert('xxx');
    $('#loader2').removeClass('d-none');
    $('#datatable-table').addClass('d-none');
    var grillautx='';
    var nrox=0;
    var otablex = {};
    var nombreproducto,promedio=""

    if (ses_vendedor != undefined) {

          ide_vendedor = ses_vendedor;
    }
$('#datatable-table').dataTable().fnDestroy();
  //  $('#datatable-table').dataTable().fnDestroy();
console.log('tu mama');
    $.post(Gruta+'coti/Cot_reportes/seg_listar',{ide_vendedor:ide_vendedor, fecha: fech },function(data) {

      $.each(data, function(k,item){
        nrox++;
    var prox_cont =hoy;
    ult_cont='';

        if(item.segui[0]){
        if(item.items[0].promedio){promedio=item.items[0].promedio} else {promedio=0};
        if(item.segui[0].seg_fecha) {ult_cont= item.segui[0].seg_fecha} else {ult_cont=''};
        if(item.segui[0].seg_pro_con_fecha) {prox_cont=item.segui[0].seg_pro_con_fecha} else {prox_cont= hoy}


          };


        grillautx=grillautx+`<tr >

        <td  >${k+1}  </td>
        <td  > ${item.ven_nom} ${item.ven_ape_pat} </td>
        <td  >${item.nombrecompleto} </td>
          <td  >${item.cli_gls} </td>
        <td  >${item.con_nom} </td>
        <td  >${item.con_fun} </td>
        <td  >${item.con_tel1} </td>
        <td  >${item.con_email} </td>
        <td  >${ult_cont} </td>
        <td  > ${prox_cont} </td>

        <td  >${item.detalle_prioridad}  </td>

         <td class="ver_registro" idr="${item.ide_cotizacion}"  width="10px"><i class="fa fa-search"></i> </td>
         <td class="edi_registro" idr="${item.ide_cotizacion}" width="10px"><i class="fa fa-pencil"></i> </td>
         <td class="bor_registro" idr="${item.ide_cotizacion}" width="10px"><i class="fa fa-trash-o"></i> </td>
         </tr> `;

      }) // Fin Each
      $('#grilladatos').html(grillautx );
/*
      tabledatos = $('#datatable-table').DataTable({
        "dom": 'Bfrtip',
        "buttons": [
             'excel', "csv"
        ]
      });
*/
/*      $('#datatable-table').dataTable({
            "order": [[ 1, "desc" ]]
        } );

*/
$('#loader2').addClass('d-none');
$('#datatable-table').removeClass('d-none');

      tabledatos = $('#datatable-table').DataTable({
          "order": [[ 10, "desc" ],[ 9, "desc" ]],
        "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 11,12,13] }
        ],
        "oLanguage": {
          "sSearch": "Buscar: "
        },
        "dom": 'Bfrtip',
        "buttons": [
             'excel', "csv"
        ]
      });


    }) // Fin Json


  } // Fin Funcion jalar_data
