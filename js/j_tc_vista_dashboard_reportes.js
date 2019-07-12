var donutLastDay;
var barLastDay;
var lineWeek;
var lineWeekPercent;
var donutWeek;

$(function () {
  get_repo_dash()


})



function get_repo_dash() {

  $.post(`${base_url}js/dataReport.json`,  function (data) {
      last_day_donut(data.last_day_donut);
      last_day_bar(data.last_day_bar)
      lineWeek(data.last_week_line)
      lineWeekPercent(data.last_week_line_ing)
      week_donut(data.week_donut)
  })

}



async function last_day_donut(obj) {

  return new Promise(resolve => {

    donutLastDay = new Chart($('#donutLastDay'), {
        type: 'doughnut',
        data: {
          datasets: [{
                  data: [obj[0].count,obj[1].count,obj[2].count,obj[3].count],
                  backgroundColor:['#f2be35','#357ef2','#35f295','#f2353b']
              }],
              labels: ['PENDIENTES','EN PROCESO','TEMINADO','ANULADO']

        },

    });

    resolve(donutLastDay);

  })
}


async function last_day_bar(obj) {

  return new Promise( resolve => {
    var data = new Array();
    var labels = new Array();

    $.each(obj,function(i,item) {
      data.push(item.count);
      labels.push(item.ser_nom);
    })

    barLastDay = new Chart($('#barLastDay'), {
        type: 'bar',
        data: {
            datasets: [{
                    label: '# Servicios por Tipo',
                    data: data,
                    backgroundColor: '#25ffff52',
                    borderColor	: '#5bf7f7',
                    hoverBackgroundColor: '#25ffff52'
                }],
            labels: labels

          }


    });

    resolve(barLastDay);

  })

}


async function lineWeek(obj) {

  return new Promise( resolve => {
    var data = new Array();
    var labels = new Array();

    $.each(obj,function(i,item) {
      data.push(item.count);
      labels.push(item.fecha);
    })

    lineWeek = new Chart($('#lineWeek'), {
        type: 'line',
        data: {
            datasets: [{
                    label: '# Servicios por dia',
                    data: data,
                    fill: false,
                    borderColor	: '#5bf7f7',

                }],
            labels: labels

          }


    });

    resolve(lineWeek);

  })

}

async function lineWeekPercent(obj) {

  return new Promise( resolve => {
    var data = new Array();
    var labels = new Array();

    $.each(obj,function(i,item) {
      data.push(item.count);
      labels.push(item.fecha);
    })

    lineWeekPercent = new Chart($('#lineWeekPercent'), {
        type: 'line',
        data: {
            datasets: [{
                    label: '% de ingresos en la semana',
                    data: data,
                    fill: false,
                    borderColor	: '#4cf736',

                }],
            labels: labels

          },
      options: {
        elements: {
            line: {
                tension: 0, // disables bezier curves
            }
        }
      }


    });

    resolve(lineWeekPercent);

  })

}

async function week_donut(obj) {

  return new Promise(resolve => {

    var data = new Array();
    var labels = new Array();
    var color = new Array();

    $.each(obj,function(i,item) {
      data.push(item.count);
      labels.push(item.ser_nom);
      color.push("#"+((1<<24)*Math.random()|0).toString(16));
    })


    donutWeek = new Chart($('#donutWeek'), {
        type: 'doughnut',
        data: {
          datasets: [{
                  data: data,
                  backgroundColor:color
              }],
              labels: labels

        },

    });

    resolve(donutWeek);

  })
}
