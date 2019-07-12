<!DOCTYPE html>
<html>
<head>
    <title>SIAM - Sistema de Seguridad Ciudadana  </title>
    <link href="css/ol/ol.css" rel="stylesheet">
        <link href="css/ol/ol3-layerswitcher.css" rel="stylesheet">
          <link href="css/ol/ol-popup.css" rel="stylesheet">
    <link href="css/application.min.css" rel="stylesheet">
    <link href="css/propio.css" rel="stylesheet">

        <!-- as of IE9 cannot parse css files with more that 4K classes separating in two files -->
    <!--[if IE 9]>
        <link href="css/application-ie9-part2.css" rel="stylesheet">
    <![endif]-->
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
         chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
         https://code.google.com/p/chromium/issues/detail?id=332189
         */
    </script>
</head>
<body>
<!--
  Main sidebar seen on the left. may be static or collapsing depending on selected state.

    * Collapsing - navigation automatically collapse when mouse leaves it and expand when enters.
    * Static - stays always open.
-->
<!-- Menu Principal Izquierda !-->
      <?php $this->load->view('menu/menu_izquierda'); ?>
<!-- Fin Principal Izquierda !-->

<!-- Menu Principal Izquierda !-->
      <?php $this->load->view('menu/menu_superior'); ?>
<!-- Fin Principal Izquierda !-->


<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">

        <div class="row">
            <div class="col-md-8 contienemapa">
              <div class="input-group mt barrasuperior">
                  <input type="text" class="form-control" placeholder="Buscar Map">
                  <span class="input-group-btn">
                      <button type="submit" class="btn btn-default">
                          <i class="fa fa-search text-gray"></i>
                      </button>

                      <a  class="btn btn-default" id="BtnAddEvento" >
                          <i class="fa fa-search text-gray"></i> Add Evento
                      </a>
                      <a  class="btn btn-default" id="BtnZoom" >
                          <i class="fa fa-search text-gray"></i> Zoom
                      </a>
                  </span>
              </div>
                <!-- minimal widget consist of .widget class. note bg-transparent - it can be any background like bg-gray,
                bg-primary, bg-white -->
                <section class="widget bg-transparent contienemapa2">
                    <!-- .widget-body is a mostly semantic class. may be a sibling to .widget>header or .widget>footer -->
                    <div class="widget-body">
                        <div id="map" >


                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                              <div class="clearfix">
                                  <ul id="tabs1" class="nav nav-tabs pull-left"> <!-- remove pull-left to get a cool effect too -->
                                      <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Estadisticas</a></li>
                                      <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Registro</a></li>
                                      <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Seguimiento <b class="caret"></b></a>
                                          <ul class="dropdown-menu">
                                              <li class=""><a href="#tab3" tabindex="-1" data-toggle="tab" aria-expanded="false">@fat</a></li>
                                              <li class=""><a href="#tab4" tabindex="-1" data-toggle="tab" aria-expanded="false">@mdo</a></li>
                                          </ul>
                                      </li>
                                  </ul>
                              </div>
                              <div id="tabs1c" class="tab-content mb-lg">
                                  <div class="tab-pane clearfix active" id="tab1">
                                      <section class="widget bg-transparent">
                                          <header>
                                              <h4>
                                                Estadisticas
                                                  <span class="fw-semi-bold">ONLINE</span>
                                              </h4>
                                              <div class="widget-controls widget-controls-hover">
                                                  <a href="#"><i class="glyphicon glyphicon-cog"></i></a>
                                                  <a href="#"><i class="fa fa-refresh"></i></a>
                                                  <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                                              </div>
                                          </header>
                                          <div class="widget-body">
                                              <p>
                                                  <span class="circle bg-warning"><i class="fa fa-map-marker"></i></span>
                                                  350 Eventos Registrados, 345 Atendidos
                                              </p>
                                              <div class="row progress-stats">
                                                  <div class="col-sm-9">
                                                      <h5 class="name">Eventos de Emergencia</h5>
                                                      <p class="description deemphasize">Accidentes, Violencia, Hurto</p>
                                                      <div class="progress progress-sm js-progress-animate bg-white">
                                                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                               data-width="60%"
                                                               aria-valuemax="100" style="width: 0;">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-3 text-align-center">
                                                      <span class="status rounded rounded-lg bg-body-light">
                                                          <small><span id="percent-1">75</span>%</small>
                                                      </span>
                                                  </div>
                                              </div>
                                              <div class="row progress-stats">
                                                  <div class="col-sm-9">
                                                      <h5 class="name">Eventos de Transito</h5>
                                                      <p class="description deemphasize">Accidentes, choques, semaforos</p>
                                                      <div class="progress progress-sm js-progress-animate bg-white">
                                                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="39"
                                                               data-width="39%"
                                                               aria-valuemin="0" aria-valuemax="100" style="width: 0;">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-3 text-align-center">
                                                      <span class="status rounded rounded-lg bg-body-light">
                                                          <small><span  id="percent-2">84</span>%</small>
                                                      </span>
                                                  </div>
                                              </div>
                                              <div class="row progress-stats">
                                                  <div class="col-sm-9">
                                                      <h5 class="name">Eventos Seguridad Ciudadana</h5>
                                                      <p class="description deemphasize">Ruidos molestos, Ambulantes</p>
                                                      <div class="progress progress-sm js-progress-animate bg-white">
                                                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80"
                                                               data-width="80%"
                                                               aria-valuemin="0" aria-valuemax="100" style="width: 0;">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-3 text-align-center">
                                                      <span class="status rounded rounded-lg bg-body-light">
                                                          <small><span id="percent-3">92</span>%</small>
                                                      </span>
                                                  </div>
                                              </div>
                                              <h5 class="fw-semi-bold mt">Unidades Disponibles</h5>
                                              <p>Tracking: <strong>Active</strong></p>
                                              <p>
                                                  <span class="circle bg-warning"><i class="fa fa-cog"></i></span>
                                                  50 Vehiculos , 60 Motos
                                              </p>

                                          </div>
                                      </section>

                                          <!--  <div class="pull-right">
                                          <button class="btn btn-inverse">Cancel</button>
                                          <button class="btn btn-primary">Some button</button>
                                      </div> !-->
                                  </div>
                                  <div class="tab-pane" id="tab2">





                                                        <div class="widget-body">
                                                            <form id="form1" class="form-horizontal form-label-left" data-abide="ajax" enctype="multipart/form-data" method="post"
                                                                  data-parsley-validate="" >
                                                                <fieldset>
                                                                    <legend><strong>Datos de</strong> Evento</legend>
                                                                    <div class="form-group formsinmargen">
                                                                        <label for="datepicker2i" class="col-sm-4 control-label">
                                                                            Fecha y Hora
                                                                        </label>
                                                                                  <div class="col-sm-8">
                                                                        <div id="datetimepicker2" class="input-group">
                                                                            <input id="datepicker2i" name="datepicker2i" type="text" class="form-control" required="required" />
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>

                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="form-group formsinmargen">
                                                                        <label for="normal-field" class="col-sm-2 control-label">latitud</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" id="inp_lat" name="inp_lat" class="form-control" placeholder="">
                                                                        </div>
                                                                        <label for="hint-field" class="col-sm-2 control-label">
                                                                            Longitud
                                                                        </label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" id="inp_lon" name="inp_lon" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group formsinmargen">
                                                                        <label class="col-sm-4 control-label" for="tooltip-enabled">Evento</label>
                                                                        <div class="col-sm-8">
                                                                          <select data-placeholder="Which galaxy is closest to Milky Way?"
                                                                                  data-width="auto"
                                                                                  data-minimum-results-for-search="10"
                                                                                  tabindex="-1"
                                                                                  class="select2 form-control" id="sel_tip_eve" name="sel_tip_eve" required="required">
                                                                              <option value=""></option>
                                                                              <option value="Magellanic">Large Magellanic Cloud</option>
                                                                              <option value="Andromeda">Andromeda Galaxy</option>
                                                                              <option value="Sextans">Sextans A</option>
                                                                          </select>                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group formsinmargen">
                                                                        <label class="col-sm-4 control-label" for="tooltip-enabled">Entidad </label>
                                                                        <div class="col-sm-8">
                                                                          <select data-placeholder="Which galaxy is closest to Milky Way?"
                                                                                  data-width="auto"
                                                                                  data-minimum-results-for-search="10"
                                                                                  tabindex="-1"
                                                                                  class="select2 form-control" id="sel_ent_eve" name="sel_ent_eve" required="required">
                                                                              <option value=""></option>
                                                                              <option value="Magellanic">Large Magellanic Cloud</option>
                                                                              <option value="Andromeda">Andromeda Galaxy</option>
                                                                              <option value="Sextans">Sextans A</option>
                                                                          </select>                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group formsinmargen">
                                                                        <label for="hint-field" class="col-sm-4 control-label">
                                                                            Documento
                                                                            <!-- <span class="help-block">Dni/pasaporte/otro</span> -->
                                                                        </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" id="inp_dni" name="inp_dni" class="form-control" required="required">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group formsinmargen">
                                                                        <label for="hint-field" class="col-sm-4 control-label">
                                                                            Nombre
                                                                            <!-- <span class="help-block">Dni/pasaporte/otro</span> -->
                                                                        </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" id="inp_name" name="inp_name" class="form-control" required="required">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group formsinmargen">
                                                                        <label for="hint-field" class="col-sm-4 control-label">
                                                                            Apellidos
                                                                            <!-- <span class="help-block">Dni/pasaporte/otro</span> -->
                                                                        </label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" id="inp_apelpat" name="inp_apelpat" class="form-control" required="required">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" id="inp_apelmat" name="inp_apelmat" class="form-control" required="required">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group formsinmargen">
<input type="hidden" id="inp_ide_ciu" name="inp_ide_ciu" class="form-control" >
                                                                        <div class="col-sm-12">
                                                                            <textarea rows="4" class="form-control" name="gls_evento" id="gls_evento" required="required"></textarea>
                                                                          </div>
                                                                    </div>



                                                                </fieldset>
                                                                <div class="form-actions">
                                                                    <div class="row">
                                                                        <div class=" col-sm-12">
                                                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                                            <button type="button" class="btn btn-inverse">Cancelar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>



















                                  </div>
                                  <div class="tab-pane" id="tab3">
                                      <p> If you will think too much it will sink in the swamp of never implemented plans and
                                          ideas or will just go away or will be implemented by someone else.</p>
                                      <p><strong>5 months of doing everything to achieve nothing.</strong></p>
                                      <p>You'll automatically skip - because you know - it's just non-informative stub. But what if there some text like this one?</p>
                                  </div>
                                  <div class="tab-pane" id="tab4">
                                      <blockquote class="blockquote-sm mb-xs">
                                          Plan it? Make it!
                                      </blockquote>
                                      <p>The same thing is for startups and ideas. If you have an idea right away after it appears
                                          in your mind you should go and make a first step to implement it.</p>
                                  </div>
                              </div>







            </div>
        </div>
        <div class="row"> <!-- Inicio tabla !-->
          <div class="col-md-12">
          <section class="widget">
                <header>
                    <h4>Eventos <span class="fw-semi-bold">Registrados</span></h4>
                    <div class="widget-controls">
                        <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                        <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </header>
                <div class="widget-body">

                    <div class="mt">
                        <table id="datatable-table" class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th class="no-sort">lat</th>
                              <th class="no-sort">lon</th>
                              <th>Evento</th>
                              <th class="no-sort hidden-xs">Estado</th>
                              <th class="hidden-xs">Entidad</th>
                              <th class="hidden-xs">Fecha</th>
                              <th class="no-sort">Ciudadano</th>
                              <th class="no-sort"></th>
                              <th class="no-sort"></th>

                            </tr>
                          </thead>
                            <tbody id="grilladatos">

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
          </div>
        </div> <!-- Fin tabla !-->
        <div class="row">

            <div class="col-md-4">
                <section class="widget">
                    <!-- .widget>header is generally a place for widget title and widget controls. see .widget in _base.scss -->
                    <header>
                        <h5>
                            USERBASE GROWTH
                        </h5>
                        <div class="widget-controls">
                            <a href="#"><i class="glyphicon glyphicon-cog"></i></a>
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">
                        <div class="stats-row">
                            <div class="stat-item">
                                <h6 class="name">Overall Growth</h6>
                                <p class="value">76.38%</p>
                            </div>
                            <div class="stat-item">
                                <h6 class="name">Montly</h6>
                                <p class="value">10.38%</p>
                            </div>
                            <div class="stat-item">
                                <h6 class="name">24h</h6>
                                <p class="value">3.38%</p>
                            </div>
                        </div>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                            </div>
                        </div>
                        <p>
                            <small><span class="circle bg-warning"><i class="glyphicon glyphicon-chevron-up"></i></span></small>
                            <span class="fw-semi-bold">17% higher</span>
                            than last month</p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="widget">
                    <header>
                        <h5>
                            TRAFFIC VALUES
                        </h5>
                        <div class="widget-controls">
                            <a href="#"><i class="glyphicon glyphicon-cog"></i></a>
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">
                        <div class="stats-row">
                            <div class="stat-item">
                                <h6 class="name">Overall Values</h6>
                                <p class="value">17 567 318</p>
                            </div>
                            <div class="stat-item">
                                <h6 class="name">Montly</h6>
                                <p class="value">55 120</p>
                            </div>
                            <div class="stat-item">
                                <h6 class="name">24h</h6>
                                <p class="value">9 695</p>
                            </div>
                        </div>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                            </div>
                        </div>
                        <p>
                            <small><span class="circle bg-warning"><i class="fa fa-chevron-down"></i></span></small>
                            <span class="fw-semi-bold">8% lower</span>
                            than last month
                        </p>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="widget">
                    <header>
                        <h5>
                            RANDOM VALUES
                        </h5>
                        <div class="widget-controls">
                            <a href="#"><i class="glyphicon glyphicon-cog"></i></a>
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">
                        <div class="stats-row">
                            <div class="stat-item">
                                <h6 class="name">Overcome T.</h6>
                                <p class="value">104.85%</p>
                            </div>
                            <div class="stat-item">
                                <h6 class="name">Takeoff Angle</h6>
                                <p class="value">14.29&deg;</p>
                            </div>
                            <div class="stat-item">
                                <h6 class="name">World Pop.</h6>
                                <p class="value">7,211M</p>
                            </div>
                        </div>
                        <div class="progress progress-xs">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                            </div>
                        </div>
                        <p>
                            <small><span class="circle bg-warning"><i class="fa fa-plus"></i></span></small>
                            <span class="fw-semi-bold">8 734 higher</span>
                            than last month
                        </p>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <section class="widget">
                    <header>
                        <h5><span class="label label-danger">New</span> Messages</h5>
                        <div class="widget-controls">
                            <a href="#"><i class="fa fa-refresh"></i></a>
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body no-padding">
                        <div class="list-group list-group-lg">
                            <a class="list-group-item" href="#">
                                <span class="thumb-sm pull-left mr">
                                    <img class="img-circle" src="demo/img/people/a2.jpg" alt="...">
                                    <i class="status status-bottom bg-success"></i>
                                </span>
                                <h5 class="no-margin">Chris Gray</h5>
                                <p class="help-block text-ellipsis no-margin">Hey! What's up? So many times since we</p>
                            </a>
                            <a class="list-group-item" href="#">
                                <span class="thumb-sm pull-left mr">
                                    <img class="img-circle" src="demo/img/people/a4.jpg" alt="...">
                                    <i class="status status-bottom bg-success"></i>
                                </span>
                                <h5 class="no-margin">Jamey Brownlow</h5>
                                <p class="help-block text-ellipsis no-margin">Good news coming tonight. Seems they agreed to proceed</p>
                            </a>
                            <a class="list-group-item" href="#">
                                <span class="thumb-sm pull-left mr">
                                    <img class="img-circle" src="demo/img/people/a1.jpg" alt="...">
                                    <i class="status status-bottom bg-warning"></i>
                                </span>
                                <h5 class="no-margin">Livia Walsh</h5>
                                <p class="help-block text-ellipsis no-margin">Check my latest email plz!</p>
                            </a>
                            <a class="list-group-item" href="#">
                                <span class="thumb-sm pull-left mr">
                                    <img class="img-circle" src="demo/img/people/a5.jpg" alt="...">
                                    <i class="status status-bottom bg-danger"></i>
                                </span>
                                <h5 class="no-margin">Jaron Fitzroy</h5>
                                <p class="help-block text-ellipsis no-margin">What about summer break?</p>
                            </a>
                        </div>
                    </div>
                    <footer class="bg-body-light mt">
                        <input type="search" class="form-control input-sm" placeholder="Search">
                    </footer>
                </section>
            </div>
            <div class="col-md-4">
                <section class="widget">
                    <header>
                        <h5>
                            Market <span class="fw-semi-bold">Stats</span>
                        </h5>
                        <div class="widget-controls">
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">
                        <h3>$720 Earned</h3>
                        <p class="fs-mini text-muted mb mt-sm">
                            Target <span class="fw-semi-bold">$820</span> day earnings
                            is <span class="fw-semi-bold">96%</span> reached.
                        </p>
                    </div>
                    <div class="widget-table-overflow">
                        <table class="table table-striped table-sm">
                            <thead class="no-bd">
                            <tr>
                                <th>
                                    <div class="checkbox">
                                        <input id="checkbox210" type="checkbox" data-check-all="">
                                        <label for="checkbox210"></label>
                                    </div>
                                </th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <input id="checkbox212" type="checkbox">
                                        <label for="checkbox212"></label>
                                    </div>
                                </td>
                                <td>HP Core i7</td>
                                <td class="text-align-right fw-semi-bold">$346.1</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <input id="checkbox214" type="checkbox">
                                        <label for="checkbox214"></label>
                                    </div>
                                </td>
                                <td>Air Pro</td>
                                <td class="text-align-right fw-semi-bold">$533.1</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="widget-body mt-xlg">
                        <div id="rickshaw" class="chart-overflow-bottom"></div>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="widget">
                    <header>
                        <h5>Calendar</h5>
                        <div class="widget-controls">
                            <a href="#"><i class="glyphicon glyphicon-cog"></i></a>
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body no-padding">
                        <div id="events-calendar" class="bg-primary-light"></div>
                        <div class="list-group fs-mini">
                            <a href="#" class="list-group-item text-ellipsis">
                                <span class="badge bg-warning">6:45</span>
                                Weed out the flower bed
                            </a>
                            <a href="#" class="list-group-item text-ellipsis">
                                <span class="badge bg-success">9:41</span>
                                Stop world water pollution
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>
<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>

<!-- common libraries. required for every page-->
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="vendor/widgster/widgster.js"></script>
<script src="vendor/pace.js/pace.js" data-pace-options='{ "target": ".content-wrap", "ghostTime": 1000 }'></script>
<script src="vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>
<script src="vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>

<!-- common app js -->
<script src="js/settings.js"></script>
<script src="js/app.js"></script>
<script src="js/propios.js"></script>
<!-- page specific libs -->
<script id="test" src="vendor/underscore/underscore.js"></script>
<script src="vendor/jquery.sparkline/index.js"></script>
<script src="vendor/jquery.sparkline/index.js"></script>
<script src="vendor/d3/d3.min.js"></script>
<script src="vendor/rickshaw/rickshaw.min.js"></script>
<script src="vendor/parsleyjs/dist/parsley.min.js"></script>

<script src="js/ol/ol.js"></script>
<script src="js/ol/ol-popup.js"></script>
<script src="js/ol/ol3-layerswitcher.js"></script>



<script src="vendor/datatables/media/js/jquery.dataTables.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>




<script src="vendor/bootstrap-sass/assets/javascripts/bootstrap/popover.js"></script>
<script src="vendor/bootstrap_calendar/bootstrap_calendar/js/bootstrap_calendar.min.js"></script>
<script src="vendor/jquery-animateNumber/jquery.animateNumber.min.js"></script>
<!--
<script src="http://maps.google.com/maps/api/js?key=AIzaSyD3U7UcjNTdj-DTdJBfI2PlPNvrrVVN8h8&v=3.2"></script>
!-->
<!-- page specific js -->
<script src="vendor/bootstrap-sass/assets/javascripts/bootstrap/tab.js"></script>
<!-- Formularios !-->
<script src="vendor/moment/min/moment.min.js"></script>
<script src="vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>




<script>
var agregaEve=false;



var markerSource = new ol.source.Vector();

  var markerLayer = new ol.layer.Vector({
     projection: 'EPSG:4326',
               title: 'Eventos ',
    source: markerSource

  });


  var vectorSource = new ol.source.Vector();   // Definimos la capa del Evento
      var vectorLayer = new ol.layer.Vector({
        projection: 'EPSG:4326',
                  title: 'Nuevo Evento',
       source: vectorSource
      });







      var iconStyle = new ol.style.Style({
          image: new ol.style.Icon({
              //anchor: [0.1, 46],
              anchorXUnits: 'fraction',
              anchorYUnits: 'pixels',
              opacity: 0.50,
              src: 'img/sos.png'
          }),
          name:'evento_temporal',
          text: new ol.style.Text({
              font: '12px Calibri,sans-serif',
              fill: new ol.style.Fill({ color: '#000' }),
              stroke: new ol.style.Stroke({
                  color: '#fff', width: 2
              }),
              text: 'Evento Agregado'
          })
      });














      var map = new ol.Map({
          target: 'map',
          layers:  [


             new ol.layer.Group({
                      'title': 'Base maps',

                      layers: [

              new ol.layer.Tile({
                  source: new ol.source.OSM(),
                                          title: 'basexxx',
                              type: 'base',
                              visible: true,
              })

              ,
                                      new ol.layer.Tile({
                              title: 'Water color',
                              type: 'base',
                              visible: false,
                              source: new ol.source.Stamen({
                                  layer: 'watercolor'
                              })
                          }),
          ]
          }),
                        new ol.layer.Group({
                      title: 'Overlays',
                      layers: [
             markerLayer,vectorLayer
                      ]
                  })

      ]
          ,
        target: 'map',
        renderer: 'canvas',
        controls: ol.control.defaults({
          attributionOptions:  ({
            collapsible: true
          })
        }),
          view: new ol.View({
              center: ol.proj.transform([-77.1610,-12.0429], 'EPSG:4326', 'EPSG:3857'),
              zoom: 12
          })
      });
/*


      var  olview = new ol.View({
              center: ol.proj.transform([-76.99,-12.0429], 'EPSG:4326', 'EPSG:3857'),
              zoom: 11
          }),
          map = new ol.Map({
              target: document.getElementById('map'),
              view: olview,

          layers:  [
             new ol.layer.Group({
                      'title': 'Base maps',
                      layers: [
              new ol.layer.Tile({
                  source: new ol.source.OSM(),
                              title: 'base',
                              type: 'base',
                              visible: true,
              })
          ]
          }),
          new ol.layer.Group({
        title: 'Overlays',
        layers: [
      markerLayer,vectorLayer
        ]
      })

      ],
      controls: ol.control.defaults({
      attributionOptions:  ({
      collapsible: true
      })
      })
          });
*/


          var layerSwitcher = new ol.control.LayerSwitcher({
          tipLabel: 'Legenda' // Optional label for button
          });

          map.addControl(layerSwitcher);

          /*var popup = new ol.Overlay.Popup;
          popup.setOffset([0, -1]);
          map.addOverlay(popup); */


          var popup = new ol.Overlay.Popup();
          map.addOverlay(popup);


              map.on('click', function (evt) {
//alert('hola');
//popup.show();


             if(agregaEve) {

              var feature = new ol.Feature(
              new ol.geom.Point(evt.coordinate)
              );
              var coord = feature.getGeometry().getCoordinates();
              coord = ol.proj.transform(coord, 'EPSG:3857', 'EPSG:4326');
              $("#inp_lat").val(coord[1]);
              $("#inp_lon").val(coord[0]);
              _activaTab("tab2");
              //test();
              comboselect(null,"ejecutora/ent_eve","Selecciona Entidad Evento","item.ide_eje","item.nom_eje","form1","sel_ent_eve");
              comboselect(null,"eventos/tip_eve","Selecciona Tipo Eve","item.ide_t_e","item.des_eve","form1","sel_tip_eve");

              feature.setStyle(iconStyle);
              vectorSource.addFeature(feature);
              //    ol.Observable.unByKey(key)

              agregaEve=false;
            }
/*
              var stateFeaturex = map.forEachFeatureAtPixel(evt.pixel, function (featurex, layer) {
                  // $(element).popover('destroy');
                            return featurex;
                        }, null, function (layer) {
                          console.log(layer);
                          console.log(markerLayer);
                            return layer === markerLayer;
                        });
*/
/*
var terrible= map.forEachFeatureAtPixel(evt.pixel,function(ft, layer){
  console.log(ft);
  return ft;
});
*/

              var f = map.forEachFeatureAtPixel(
                    evt.pixel,
                    function(ft, layer){
                //      alert('ssss');
              console.log(ft);              return ft;

              },null,function(layer){console.log('hola');}
                );

              if (f) {
                    console.log(f.getGeometryName());
              nomx=f.get('name');
              if(nomx) {
              var geometry = f.getGeometry();
              var coord = geometry.getCoordinates();
              var coo = ol.proj.transform(coord, 'EPSG:3857', 'EPSG:4326');
              coorz=[-77.1610,-12.0429];
              var lo=parseFloat(coord[0]);
              var la=parseFloat(coord[1]);
              var coorz =[lo,la]

              //ol.proj.transform([-76.99,-12.0429], 'EPSG:4326', 'EPSG:3857'),
              idevento=f.get('idevento');
              name=f.get('name');
              tipoevento=f.get('tipoevento');
              hora=f.get('hora');
              fecha=f.get('fecha');

              // console.log('coord ' + evtz.coordinate +' coordx '+coorz);
              var coord1 = ol.coordinate.toStringHDMS(coo, 2);
              //var coord2 = ol.coordinate.toStringHDMS(evtz.coordinate, 2);


              popup.show(coord,'<div class="pop"><h4>' + name +'</h4><p class="info" > Fechax: '+fecha+'<br>'+ coord1 +  '<br> </p></div>');
              }
              }

              })







                        function _activaTab(tab){
                            $('.nav-tabs a[href="#' + tab + '"]').tab('show');
                        }
                        function _AgregaEventoxx() {

                        key=map.on('click', function(evt){
                            var feature = new ol.Feature(
                                new ol.geom.Point(evt.coordinate)
                            );
                        var coord = feature.getGeometry().getCoordinates();
                        coord = ol.proj.transform(coord, 'EPSG:3857', 'EPSG:4326');
                        $("#inp_lat").val(coord[1]);
                        $("#inp_lon").val(coord[0]);
                        _activaTab("tab2");
                        //test();
                            comboselect(null,"ejecutora/ent_rsp","Selecciona Entidad Rsp","item.ide_eje","item.nom_eje","form1","sel_ent_eve");
                            comboselect(null,"eventos/tip_eve","Selecciona Tipo Eve","item.ide_t_e","item.des_eve","form1","sel_tip_eve");

                            feature.setStyle(iconStyle);
                            vectorSource.addFeature(feature);
                                ol.Observable.unByKey(key)
                          });
                        //    console.log(key);

                        }



                        function _AgregaEvento2() {


                        agregaEve=true;


                        }


                        $( "#BtnAddEvento" ).click(function() {
                        _AgregaEvento2()
                        });

                        $( "#BtnZoom" ).click(function() {
                        jalar_data();
                        });







function agregarMarcador(idevento,latitud,longitud,fecha,hora,tipoevento,desevento)
{

var newMarkers = new ol.Feature({
 geometry: new ol.geom.Point(ol.proj.transform([parseFloat(longitud),parseFloat(latitud)], 'EPSG:4326', 'EPSG:3857')),
  idevento:idevento,
  name: desevento,
  tipoevento: tipoevento,
  hora: hora,
  fecha: fecha,
  style: new ol.style.Style({
    //   label : "${name}",
    label:'xxx',
    image: new ol.style.Circle({
      radius: 20,
      fill: new ol.style.Fill({
        color: '#363b30'
      }),
      stroke: new ol.style.Stroke({
        color: 'black'
      }),


    })
  }),
    });

tipoicono="ve_es";

tipou='<?php echo base_url(); ?>img/sos.png';

var iconStylex = new ol.style.Style({
  image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
    anchor: [0.5, 0.5],
    anchorXUnits: 'fraction',
    anchorYUnits: 'pixels',
    name:'zzzz',
    opacity: 1,
   // src: '<?php echo base_url(); ?>img/ve_es_'+giro+vel+'.png',
   src:tipou

  }))

});


newMarkers.setStyle(iconStylex);
markerSource.addFeature(newMarkers);

    }

    function zoomEven(lat,lon) {
      //alert(lat+' '+lon);
      var latmax=lat+0.012;
      var latmin=lat-0.012;
      var lonmax=lon+0.012;
      var lonmin=lon-0.012;
      var extent =[parseFloat(lonmin),parseFloat(latmin),parseFloat(lonmax),parseFloat(latmax)];
      extent = ol.extent.applyTransform(extent, ol.proj.getTransform("EPSG:4326", "EPSG:3857"));
//      var extent = source.getExtent();
      map.getView().fit(extent, map.getSize());
      // ol.proj.transform([-77.1610,-12.0429], 'EPSG:4326', 'EPSG:3857')
      //map.getView().fitExtent(extent, map.getSize());
//      map.getView().setZoom(map.getView().getZoom()+1);
        }


function jalar_data() {



//  alert('hola');
var grillautx='';
var nrox=0;
var otablex = {};
$.getJSON('<?php echo base_url(); ?>index.php/eventos/lis_eve', function(data) {

  $.each(data, function(k,item){
nrox++;
//console.log(nrox);

grillautx=grillautx+'<tr > \
<td  ><a href="javascript:zoomEven('+item.lat_eve+','+item.lon_eve+')">  <i class="fa fa-search-plus text-gray"></i></a>'+ item.ide_eve+' <a href="#"> <i class="fa fa-info text-gray"></i></a></td> \
<td  >'+item.lat_eve+' </td> \
<td  >'+item.lon_eve+' </td> \
<td  >'+ item.des_eve+' </td> \
<td  >'+ item.des_est+' </td> \
<td  >'+ item.nom_eje+' </td> \
<td  >'+ item.fch_eve+' '+item.hra_eve+' </td> \
<td  >'+ item.nom_ciu+' '+item.pat_ciu+' </td> <td>ver</td><td>seg</td></tr> ';


agregarMarcador(item.ide_eve,item.lat_eve,item.lon_eve,item.fch_eve,item.hra_eve,item.ide_t_e,item.des_eve);

}) // Fin Each
$('#grilladatos').html(grillautx );

   otablex = $('#datatable-table').DataTable({
  "columnDefs": [
    { "visible": false, "targets": 1 },
    { "visible": false, "targets": 2  }

  ]
});

     console.log(otablex);

  $(".dataTables_length select").selectpicker({
      width: 'auto'
  });
//  console.log('yooo');
   //console.log(otablex[0]);

   $('#datatable-table tbody').on( 'click', 'tr', function () {
       $(this).toggleClass('selected');

  // alert(orlando);

       //console.log(table.fnGetData());

       var pos = otablex.row(this).index();
       var row = otablex.row(pos).data();
       var poscell = otablex.cell(pos,1).index();
console.log('================');
       console.log(poscell);
       console.log(row[1]);
       console.log(row[2]);
          var lo=parseFloat(row[2]);
         var la=parseFloat(row[1]);
         var coorz =[lo,la];
console.log(coorz);
       coorz=ol.proj.transform(coorz, 'EPSG:4326', 'EPSG:3857');

       var coo = ol.proj.transform(coorz, 'EPSG:3857', 'EPSG:4326');


       name=row[5];
    //   idevento=f.get('idevento');
    //   tipoevento=f.get('tipoevento');
    //   hora=f.get('hora');
    //   fecha=f.get('fecha');

       var coord1 = ol.coordinate.toStringHDMS(coo, 2);


       popup.show(coorz,'<div class="pop"><h4>' + name +'</h4><p class="info" > Fechax: <br>'+ coord1 +  '<br> </p></div>');
       //popup.show(coorz,'<div class="pop"></div>');
    /*
           if ( $(this).hasClass('selected') ) {
               $(this).removeClass('selected');
           }
           else {
               table.$('tr.selected').removeClass('selected');
               $(this).addClass('selected');
           } */
       } );

//console.log(otable);
/*$('#datatable-table tbody').on('click', 'tr', function () {
      // var data = table.row( this ).data();
       console.log( table.row( this ).data() );
       //alert( 'You clicked on '+data[0]+'\'s row' );
   } );
   */

/*
$("#datatable-table").dataTable({
         "sDom": "<'row'<'col-md-6 hidden-xs'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
         "oLanguage": {
             "sLengthMenu": "_MENU_",
             "sInfo": "Showing <strong>_START_ to _END_</strong> of _TOTAL_ entries"
         },
         "oClasses": {
           "sFilter": "pull-right",
           "sFilterInput": "form-control input-rounded ml-sm"
         },
         "aoColumns": unsortableColumns
     });
*/



/*$('#tabladatos').dataTable({
      "order": [[ 0, "desc" ]]
  } );*/
//console.log(otablex);

}) // Fin Json


} // Fin Funcion jalar_data




</script>
<script src="js/index.js"></script>

</body>
</html>
