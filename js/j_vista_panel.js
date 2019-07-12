$(function(){

alert('hola');

  function jalar_data() {

    var grillautx='';
    var nrox=0;
    var otablex = {};
    $.getJSON(Gruta+'Flota/flot_listar/', function(data) {
      $.each(data,function (i, item) {

          nrox++;
          grillautx=grillautx+`<tr >
          <td class="hidden-xs" > ${i+1} </td>
          <td class="hidden-xs" > ${item.flo_gls} </td>
          <td  > ${item.cli_nom} </td>
          <td class="hidden-xs" >   ${item.flo_fecha}</td>
          <td class="ver_registro " id="${item.ide_flo_otr}"><i class="fa fa-search"></i></td>
          <td class="edita_registro " id="${item.ide_flo_otr}"><i class="fa fa-pencil"></i></td></tr> `;

        })



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


  $('#datatable-table').on('click', '.ver_registro',function (e) {
    e.preventDefault();
    location.href = Gruta+'Flota/ver/'+this.id;

  })

  $('#datatable-table').on('click', '.edita_registro',function (e) {
    e.preventDefault();
    $('#ide').val(this.id);
    $('#myModalborrar').modal('show');
  })

  $('#frm_delete #btn_del').on('click',function (e){
    e.preventDefault();

    $.ajax({
      url:'<?= base_url()?>tcservicios/del_ot',
      type:'POST',
      data:$('#frm_delete').serialize(),
      success:function() {
        $('#datatable-table').dataTable().fnDestroy();
        jalar_data(0,0)
     $('#myModalborrar').modal('hide');
      },
    })
  })


    function pjaxPageLoad(){
      console.log('CARAJO');
        //$('.widget').widgster();
        //initMap();
    //    initCalendar();
      //  initRickshaw();
        //initAnimations();
         jalar_data();

    //console.log(jalar_data());
$("#form1").on('submit', function(e){
      e.preventDefault();
      var form = $(this);
      form.parsley().validate();
      if (form.parsley().isValid()){
        $.ajax({
               url:'eventos/new_eve',
               data:$(this).serialize(),
               type:'POST',
               success:function(data){
               console.log(data);
               $('#datatable-table').dataTable().fnDestroy();
               markerSource.clear();
               vectorSource.clear();
               limpiaForm('form1');
               jalar_data();
              //   $("#success").show().fadeOut(20000); //=== Show Success Message==
               },
               error:function(data){
                // $("#error").show().fadeOut(20000); //===Show Error Message====
               }
             });


        }
  });







    }

    pjaxPageLoad();
    SingApp.onPageLoad(pjaxPageLoad);


});
