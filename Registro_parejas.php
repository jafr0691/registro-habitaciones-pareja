<?php
include "Conexion.php";
include "control-sesion.php";
include "datos-usuarios.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images\logo-haway2.jpg" />
  <title>Haway</title>
  <!-- SNIMATED TEXT CSS -->
  <link href="css\animated-text.css" rel="stylesheet">
  <!-- Chosen CSS -->
  <link href="css\chosen.min.css" rel="stylesheet">
  <!-- Chosen CSS -->
  <link href="css\login-register.css" rel="stylesheet">
  <!-- Swiper Slider CSS -->
  <link href="css\flexslider.css" rel="stylesheet">
  <!-- Pretty Photo CSS -->
  <link href="css\prettyPhoto.css" rel="stylesheet">
  <!-- Swiper Slider CSS -->
  <link href="css\swiper.css" rel="stylesheet">
  <!-- Custom Main StyleSheet CSS -->
  <link href="style.css" rel="stylesheet">
  <!-- Color CSS -->
  <link href="css\color-2.css" rel="stylesheet">
  <!-- Typography StyleSheet CSS -->
  <link href="css\typography-02.css" rel="stylesheet">
  <!-- Responsive CSS -->
  <link href="css\responsive.css" rel="stylesheet">

  <link href="css\color.css" rel="stylesheet">

  <link rel="stylesheet" href="css/pure-css-select-style.css">
<script type="text/javascript"  src="validaciones.js"></script>

<script type="text/javascript"  src="habilitar_input.js"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>



  </head>

<body>
  <!--gt Wrapper Start-->
  <div class="gt_wrapper">
    <!--Header Wrap Start-->
    <?php
    include "sistema_menu.php";
    ?>
    <!--Header Wrap End-->

    <!--Banner Wrap Start-->

    <div class="gt_sub_banner_bg default_width">
      <div class="container">
        <div class="gt_sub_banner_hdg  default_width">
          <h2>Modulo Registro de Parejas.</h2>

        </div>
      </div>
    </div>

    <div class="gt_breadcrumb_bg default_width" style="background:#212016">
      <div class="container">
        <div class="gt_breadcrumb_wrap default_width" style="background:#212016">
            <ul>

                <li><a href="">Registrar</a></li>
            </ul>
        </div>
      </div>
    </div>





    <!--Banner Wrap End-->
<div class="gt_wrapper">
    <!--Main Content Wrap Start-->
      <div class="gt_content_wrap">
      <!--Login & Register Page Wrap Start-->
      <section style="background:#ffffff">
        <div class="container">

          <!-- MENSAJE SUCCESS-->
          <?php
    if(isset($_GET['status']) And $_GET['status']==1 ){
    ?>
    <div class="alert alert-success" align="left" style="background:#76da8c;">
    <button class="close" data-dismiss="alert" align="left"><span class="fa fa-check">  </span></button>
    <font size="3" FACE="impact" COLOR=#FFFFFF >Se ha registrado exitosamente a la pareja.</font>
               </div>
    <?php } ?>

 <!-- MENSAJE WARNING-->
     <?php
    if(isset($_GET['status']) And $_GET['status']==2 ){
    ?>
    <div class="alert alert-success" align="left" style="background:#e81515;">
    <button class="close" data-dismiss="alert" align="left"><span class="fa fa-warning">  </span></button>
    <font size="3" FACE="impact" COLOR=#FFFFFF >Error: No se logro completar el registro de la pareja.</font>
               </div>
    <?php } ?>

    <!-- MENSAJE Information-->
    <?php
    if(isset($_GET['status']) And $_GET['status']==3 ){
      ?>
    <script type="text/javascript">


      alertify.alert('ADVERTENCIA','usuario moroso');

    </script>
    <?php }?>




         <div class="gt_lgin_tab_wrap wow slideInUp">
          <ul class="gt_login_link" data-tabs="tabs">
              <li class="active" align="right"><a data-toggle="tab" style="border-color:#1e1744" >Registrar&nbsp;</a></li>
              <li class="active" align="left"><a data-toggle="tab" style="border-color:#1e1744"> Parejas</a></li>
            </ul>
            <?php include "formulario_registro_parejas.php"; ?>

      </div>
      </div>
      </section>
      </div>
    </div>
  <!--gt Wrapper End-->
<?php include "footer.php"; ?>
  <!--Jquery Library-->

  <script src="js\jquery.js"></script>
  <!--Bootstrap core JavaScript-->
  <script src="js\bootstrap.min.js"></script>
  <!--Flex Slider JavaScript-->
  <script src="js\jquery.flexslider-min.js"></script>
  <!--Swiper Slider JavaScript-->
  <script src="js\swiper.jquery.min.js"></script>
  <!--Owl Carousel JavaScript-->
  <script src="js\owl.carousel.js"></script>
  <!--Chosen JavaScript-->
  <script src="js\chosen.jquery.min.js"></script>
  <!--Chosen JavaScript-->
  <script src="js\waypoints-min.js"></script>
  <!--Pretty Photo Javascript-->
  <script src="js\jquery.prettyPhoto.js"></script>
  <!-- ANIMATED TEXT JS-->
    <script src="js\animated-text.js"></script>
  <!--WOW JavaScript-->
  <script src="js\wow.min.js"></script>
  <!--Custom JavaScript-->
  <script src="js\custom.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./menu.js"></script>
  <!-- JavaScript -->


<!--
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
</body>

</html>




<script type="text/javascript">
  $(document).ready(function(){
    ejecuta();

});
function ejecuta(){
     $.ajax({
    type: 'POST',
    url: 'sumar_tiempo_servicio.php'
  })
  .done(function(x){

    valor=x.split(',');
    var i=0;

  while(i < valor.length){
    if (valor[i].indexOf('NO ENVIAR')>0) {
    }else{
      if((valor[i].trim().length>0) && (valor[i]!='NO ENVIAR')){
        alertify.notify(valor[i],'error',10, null);
      }
    }
    i++;
  }

// valor=x.split(',');
//     var i;
// for (i = 0; i < valor.length; i++) {
//   //alert(valor[i].indexOf('NO ENVIAR'));
//   if (valor[i].indexOf('NO ENVIAR')>0) {

//   }else{



//     if((valor[i].trim().length>0) && (valor[i]!='NO ENVIAR')){

//     alertify.alert('Atención', valor[i]);

//     }

//   }

// }

  })
  .fail(function(){
    alert('Hubo un error al cargar la lista de tipos de habitaciones')
  })

}
</script>


