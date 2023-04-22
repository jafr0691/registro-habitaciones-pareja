
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
    <div class="gt_banner default_width">
      <div class="swiper-container">
         <ul class="swiper-wrapper">
            <li class="swiper-slide index_static" style="background-attachment:fixed; background-size:cover; background-position:bottom;background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url(extra-images/logo-haway2.jpg);">
                <div class="gt_banner_text gt_slide_2">
                  <h3> </h3>
                  <h2 class="cd-headline clip is-full-width">
                    <span class="cd-words-wrapper">
                        <b class="is-visible" style="color:white;">Bienvenido <?php echo  isset($nombres) ?$nombres:null ; ?> <?php
        echo  isset($apellidos) ?$apellidos:null ; ?></b>

                    </span>
                  </h2>


                </div>
            </li>
         </ul>
       </div>
    </div>
    <!--Banner Wrap End-->

    <!--Main Content Wrap Start-->
    <div class="gt_content_wrap">






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

</body>
</html>
