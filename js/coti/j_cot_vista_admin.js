var drg;
var eve;
var glob;

$(function(){



/*WORKSPACE*/

$('body').on('click','.arrastrable', function () {
  console.log(this);
  var q = this.id;
  glob= q;
  $('#inp_text1').val(q);
  $.getJSON(Gruta+'coti/Cot_cotizacion/cot_listar/'+q,function(data) {
    var cli_list='';
    $.each(data,function (i,item) {
      cli_list+=`
              <tr><th>Nombre Cliente</th><td>${item.nombre_destino}</td></tr>
              <tr><th>Telefonos Cliente</th><td>${item.telefono_destino}  </td></tr>
              <tr><th>Email-Cliente</th><td>${item.email_destino} </td></tr>
              `;
        $('#s').text(item.sim_moneda+' '+item.subtotal);
        $('#i').text(item.sim_moneda+' '+item.igv);
        $('#t').text(item.sim_moneda+' '+item.total);
    })
    $('#grilla_datos_cliente').html(cli_list);
    var prod_list='';
    $.each(data[0].items,function (i,item) {
      prod_list+=`
              <tr>
                <th>${i+1}</th>
                <th>${item.nom_com_prod}</th>
                <th>${item.cot_cantidad}</th>
                <th>${item.precio_prod}</th>
                <th>${item.cot_precio}</th>
              </tr>
              `;
    })
    $('#grid_prod').html(prod_list);
  })



  $.getJSON(Gruta+'coti/Cot_cotizacion/seg_cot_list/'+q,function(data) {
        $('#esp_seguimiento').empty();
      if (data.length > 0) {
        $('#esp_seguimiento').html(`
          <div class="fondogris">
                <br>
                <h3 class="page-title">Seguimiento de la <span class="fw-semi-bold">Cotización</span></h3>
                <ul class="timeline" id="lineadetiempo">
                </ul>
             </div>   `);

      }else {
        $('#esp_seguimiento').html(`
          <div class="" style="border: solid 1px #c3c0c0;border-style:  dashed;   padding:  22%;">
             <center><h4>No tiene Seguimiento a esta coizacion</h4></center>
             <center>Puede generar una nueva en el Boton "Nuevo evento"</center>
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
              </section>
          </li>
          `;
    })
    $('#lineadetiempo').html(seg_list);
  })

  $('#nw_ev').css('display','none');
  $('#ef_1').css('display','block')
  $('#ef_2').css('display','none')
  $('#myModalver').modal('show');
})


$('#btn_nw_ev').click(function () {
  //Alert('xxx');
  $('#ef_1').css('display','none')
  $('#ef_2').css('display','block')
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
          $.getJSON(Gruta+'coti/Cot_cotizacion/seg_cot_list/'+glob,function(data) {
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
                    <span class="date">      ${item.seg_est}</span>
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
                </section>
            </li>
                      `;
            })
            $('#lineadetiempo').html(seg_list);
          })
          limp()
        }else{
          return false;
        }
    }
  })
})


/*WORKSPACE*/


  function jalar_data() {

    var lista='';
    var nombre_producto,moneda,subtotal='';
    var color = ['bg-warning','bg-success','bg-danger'];
    $.getJSON(Gruta+'coti/Cot_cotizacion/cot_listar', function(data) {
      $.each(data, function(k,item){
        if(item.items[0]) {
          nombre_producto=item.items[0].nom_prod;
moneda=item.sim_moneda;
subtotal=item.subtotal;
        } else {
          nombre_producto='';
          moneda='';
          subtotal='';
        }
        lista=`<li class="arrastrable" style="height:  60px;" id="${item.ide_cotizacion}">
          <span class="icon ${color[(item.ide_est_cot-1)]} "  style="width: 30px;height: 30px;margin:  12px 0px 0 10px;">

          </span>
          <div class="news-item-info">
              <h4 class="name no-margin mb-xs"><a href="#">${item.nombre_destino} </a></h4>
              <span>  ${nombre_producto} </span>


              <span>${moneda}${subtotal}</span>
            <time class="help-block">${item.fecha}</time>
          </div>
        </li>`;
  // <span>${item.det_est_cot} </span>
        $('#'+item.ide_est_cot).append(lista);
      }) // Fin Each



      $('.arrastrable').draggable({
        create: function() {
            console.log('se ha creado el elemento');
        },

        drag: function(e, ui) {


          $('#footer').fadeIn();
          this.style.boxShadow =  '3px 2px 3px 0px #e6e6e6';
          this.style.position = 'relative';
          drg = this;

        },

        stop:function () {
          this.style.boxShadow =  'none'
          //console.log(this);
          this.style.position = 'static';
          $('#footer').fadeOut();
        }
      });


      $('.suelta').droppable({
        drop: function(e,ui) {
          eve = e;
          var h = eve.target.children[0].id;
          if (h  == '') {
          del_cot(drg.id)
          $('#'+drg.id).remove();

          }else {
            changeState(h,drg.id);
            $('#'+h).append(drg);
            this.style.border = 'none';
          }

        },

        over:function (e) {
          eve = e;
          this.style.border = 'solid 1px #bdbdbd';
          this.style.borderStyle = 'dashed';
          var h = eve.target.children[0].id;
          if (h == '') {
            this.style.transform = 'scale(1.5)'
            drg.style.backgroundColor = "#f77171";
            drg.style.color = "#fff";
            drg.style.boxShadow = '';
          }
        },

        out:function () {
          this.style.border = 'none';
          this.style.transform = ''
          drg.style.backgroundColor = "#fff";
          drg.style.color = "#555555";
          drg.style.boxShadow =  '3px 2px 3px 0px #e6e6e6';

        }
      })

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
                destino = "tip_Mon_ins";
                break;
            case "edita":
                destino = "tip_Mon_upd";
                break;
            case "borra":
                destino = "tip_Mon_del";
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
    alert(idr);
  //  console.log('Id de registro '+idr);
  $('#myModalver #myModaleditaLabel').html('Datos Almacen');
    $('#accion').val('edita');
    var det_registro='';
    $.getJSON(Gruta+'coti/Cot_mantenimiento/tip_Mon_listar/'+idr, function(data) { // Inicio JSON
      $.each(data, function(k,item){
        det_registro+=`<tr><th>Id: </th> <td>${item.ide_tip_mon}</td></tr>
        <tr><th>Moneda</th><td>${item.detalle_tip_mon}</td></tr>
        <tr><th>Simbolo </th><td>${item.sim_moneda}</td></tr>`;
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

    $.getJSON(Gruta+'coti/Cot_mantenimiento/tip_Mon_listar/'+idr, function(data) { // Inicio JSON
      $.each(data, function(k,item){
        $('#inp_text1').val(item.ide_tip_mon);
        $('#inp_text2').val(item.detalle_tip_mon);
        $('#inp_text3').val(item.sim_moneda);
        });
      $('#myModaledita').modal('show')
    });
  });

    /*** Elimina Registro ****/
    $("#datatable-table").on('click','.bor_registro',function() {

      var idr = $(this).attr('idr');
      $('#myModaleditaLabel').html('Borrar Tipo Movimiento');
      $('#accion').val('borra');

      $.getJSON(Gruta+'coti/Cot_mantenimiento/tip_Mon_listar/'+idr, function(data) { // Inicio JSON
        $.each(data, function(k,item){
          $('#nom').val(item.detalle_tip_mon);
          $('#ide').val(item.ide_tip_mon);
          });
        $('#myModalborrar').modal('show')
      });
    });




});


  function changeState(h, id){
      var est;
        switch (h) {
          case '1':
              est =  1;
            break;
          case '2':
              est =  2;
            break;
          case '3':
              est =  3;
            break;
          default:
              est =  1;
        }

        $.ajax({
          url:Gruta+'coti/Cot_cotizacion/cot_act_est',
          data:{est: est, ide_cot: id},
          type:'post',
          success:function(data) {
              if (data) {
                return true;
              }else{
                return false;
              }
          }
        })
  }

  function del_cot(id) {
    $.ajax({
      url:Gruta+'coti/Cot_cotizacion/cot_del',
      data:{ide_cot: id},
      type:'post',
      success:function(data) {
          if (data == true) {
            return true;
          }else{
            return false;
          }
      }
    })
  }



function limp() {
  $('#inp_text2').val('');
  $('#inp_text3').val('');
  $('#inp_text4').val('');
  $('#inp_text5').val('');
}
