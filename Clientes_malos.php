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
  <link rel="stylesheet" type="text/css" href="css/tables.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    table th , td{
  text-align: center;
}
</style>
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
          <h2>Modulo Listado de Usuarios.</h2>
          
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
       <!-- MENSAJE WARNING-->
     <?php 
    if(isset($_GET['status']) And $_GET['status']==1 ){
    ?>      
    <div class="alert alert-success" align="left" style="background:#e81515;"> 
    <button class="close" data-dismiss="alert" align="left"><span class="fa fa-warning">  </span></button> 
    <font size="3" FACE="impact" COLOR=#FFFFFF >Se eliminó la placa <?php echo isset($_GET['cliente_relajoso']) ?$_GET['cliente_relajoso']:null; ?> de forma correcta.</font>
               </div>
    <?php } ?>

   
            <?php include "listado_clientes_malos.php"; ?>
      

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
</body>
</html>
