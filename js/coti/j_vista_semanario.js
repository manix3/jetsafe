$(function () {




  get_week();

  $('.arrow-buttons').click(function () {
    var id = $(this).children()[0].id
    if (date[id] != undefined) {
        get_week(date[id])
    }
  })


  $('#divTableRow').on('click','.div-flex',function() {
    $('.div-flex').removeClass('selected')
    $(this).addClass('selected')

    jalar_data($(this).attr('data-date'))

  })



})



function get_week(fech=null){

  if (fech != null) {
    fech = fech
  } else {
    fech = ''
  }

  $.getJSON(Gruta+'coti/cot_cotizacion/get_week/'+fech,function(data) {
      date= data;

      $('#monthWeek').text(data.mes.nombre)
      $('#numweek').text(data.n_semana)
      $.each(data.semana,function(i,item) {
          $('#dayWeek-'+i).text(item.dia)
          $('#dayWeekDiv-'+i).removeClass('toDay');
          $('#dayWeekDiv-'+i).addClass(item.hoy);

          $('#dayWeekDiv-'+i).attr('data-date', item.fullDate);
      })


  })


}
