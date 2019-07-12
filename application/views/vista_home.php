<!DOCTYPE html>
<html>
<head>
    <title>SMART PYME - HACEMOS LA GESTION DE EMPRESAS FACIL</title>

    <link href="<?php echo base_url(); ?>css/application.min.css" rel="stylesheet">
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
<body style="background-color: #000;">

  <style media="screen">
    .daw{
      max-width: 247px;
      max-height: 136px;
    }

    .bg{
      filter: blur(10px);
      width: 100%;
      position: fixed;
      background-size: contain;
      background-repeat: no-repeat;
      background-color: #555;
      background-image: linear-gradient( rgba(0, 0, 0, 0.59),       rgba(0, 0, 0, 0.61)     ),url(https://i.pinimg.com/originals/34/e0/74/34e074ecd8500dfb0b69ae1c209fcef4.jpg);
      transition: background-image 2.5s linear;
      -webkit-transition: background-image 2.5s linear;

    }

    .head-widg{
      background: #242424;
      margin: 0;
      padding: 10px 0;
      color: #fff;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }

    .module:hover{
      transform: scale(1.01);
    }

    .help{
      display: none;
      transition-duration: 1s;
    }
    .module:hover .help{
      margin: -23px -11px;
      display: block;
      transition-duration: 1s;

    }



    @media (max-width: 768px){
      .bg{
        background-image: linear-gradient( rgba(0, 0, 0, 0.59),       rgba(0, 0, 0, 0.61)     ),url(https://i.pinimg.com/originals/08/10/4a/08104a533bb2fab8edc85019390f936e.jpg);

      }
    }

  </style>
<?php $id = $sesion['ie']; ?>


<div class="bg">
  <div class="" style="padding: 100% 100%;"></div>
</div>

<div class="container" style=" padding-bottom: 15em;">
    <main id="content" class="widget-login-container" role="main">

      <div class="row" id="grilladatos">
      </div>


    </main>

</div>




<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>

<!-- common libraries. required for every page-->
<script src="<?php echo base_url(); ?>vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="<?php echo base_url(); ?>vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/widgster/widgster.js"></script>

<!-- common app js -->
<script src="<?php echo base_url(); ?>js/settings.js"></script>
<!--<script src="<?php echo base_url(); ?>js/app.js"></script> !-->

<!-- page specific libs -->
<script src="<?php echo base_url(); ?>vendor/parsleyjs/dist/parsley.min.js"></script>

<!-- page specific js -->
<script>

$(function(){
    function pageLoad(){
      $.getJSON('listarmodulos', function(data) {
          var grillautx='';
          var nrox=0
          var logo_modulo='';
          var nombre_modulo='';

          var links= ['https://images.unsplash.com/photo-1520340356584-f9917d1eea6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80','https://i.kinja-img.com/gawker-media/image/upload/s--3W28tCNS--/c_scale,f_auto,fl_progressive,q_80,w_800/196qp27ygrapnjpg.jpg','https://wallpapercave.com/wp/wp3203645.jpg','https://images.unsplash.com/photo-1520340356584-f9917d1eea6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80','https://i.kinja-img.com/gawker-media/image/upload/s--3W28tCNS--/c_scale,f_auto,fl_progressive,q_80,w_800/196qp27ygrapnjpg.jpg','https://wallpapercave.com/wp/wp3203645.jpg','http://splashngoautowash.com/wp/wp-content/uploads/2017/04/slide_01.jpg'];
              $.each(data, function(k,item){
                nrox++;
                if(item.logo_usu_mod) {logo_modulo="uploads/modulos/"+item.logo_usu_mod} else {logo_modulo="img/"+item.imagen}
                if(item.nom_mod_emp) {nombre_modulo=item.nom_mod_emp} else {nombre_modulo=item.mod_nom}


                  new Image().src = links[k];

                grillautx=grillautx+`
                <div class="col-lg-4 col-sm-6 col-xs-12 ">
                    <div class="module" data-bg=${links[k]} >
                      <h4 class="widget-login-logo animated fadeInUp head-widg">
                          <i class="fa fa-circle text-gray"></i>
                              ${nombre_modulo}
                          <i class="fa fa-circle text-warning"></i>
                          <div class="pull-right help" style=""><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="${nombre_modulo}"></i></div>

                      </h4>
                      <section class="widget widget-login animated fadeInUp text-center" style="max-height: 291px;">
                          <header>
                          <!-- <a href="${item.mod_rut}">    <h3></h3> </a>-->

                          </header>
                          <div class="widget-body center-block">
                              <a href="${item.mod_rut}"><img src="${logo_modulo}" class="img-responsive center-block daw"/></a>
                          </div>
                      </section>
                    </div>
                </div>
                `;

              }) // Fin Each

              $('#grilladatos').html(grillautx );
            })
    }
    pageLoad();


    // $('#grilladatos').on('mouseover','.module', function () {
    //   console.log($(this));
    //   console.log($(this).attr('data-bg'));
    //
    //   $('.bg').css('backgroundImage',"linear-gradient(rgba(0, 0, 0, 0.59), rgba(0, 0, 0, 0.61)), url("+$(this).attr('data-bg')+")" )
    //
    // })
    //
    // $('#grilladatos').on('mouseleave','.module', function () {
    //   $('.bg').css('backgroundImage',"linear-gradient(rgba(0, 0, 0, 0.59), rgba(0, 0, 0, 0.61)), url(https://i.pinimg.com/originals/34/e0/74/34e074ecd8500dfb0b69ae1c209fcef4.jpg)" )
    // })


});
</script>

</body>

<footer class="page-footer" style="padding: 15px 10px;  position: absolute; bottom: 0; position: fixed; width: 100%; color:  #fff;    background-color: #555;">
  <center>
    Desarrollado con <i class="fa fa-heart"></i> por <a href="http://www.smartsol.pe" target="_blank"><strong>SmartSol</strong></a>
  </center>
</footer>


</html>
