<?php
include "Conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images\logo-haway2.jpg" />

  <title>Haway</title>
  <!-- User + Register CSS -->
  <link href="css\login-register.css" rel="stylesheet">
  <!-- Custom Main StyleSheet CSS -->
  <link href="style.css" rel="stylesheet">
  <!-- Color CSS -->
  <link href="css\color.css" rel="stylesheet">
  <!-- Responsive CSS -->
  <link href="css\responsive.css" rel="stylesheet">
  <!-- Select CSS -->
  <link rel="stylesheet" href="css/pure-css-select-style.css">

   <link rel="stylesheet" href="css/style_password.css">
   <link rel="stylesheet" href="css/style_email.css">
  <link rel="stylesheet" type="text/css" href="css/alertas.css">
    <link rel="stylesheet" type="text/css" href="css/mensajes.css">
<script type="text/javascript"  src="validaciones.js"></script>


  </head>

<body>
  <!--gt Wrapper Start-->  
  <div class="gt_wrapper">


    <!--Sub Banner Wrap Start -->
    <div class="gt_sub_banner_bg default_width">
      <div class="container">
        <div class="gt_sub_banner_hdg  default_width">
          <h2>Sistema de control de ingreso de parejas</h2>
        </div>
      </div>
    </div>
    <!--Sub Banner Wrap End -->
    <!--Breadcrumb Wrap End -->
    <div class="gt_breadcrumb_bg default_width"  style="background:#212016">
      <div class="container">
        <div class="gt_breadcrumb_wrap default_width"  style="background:#212016">
            <ul>
                <li><a href="#">Iniciar Sesión &#38; Registrar</a></li>
            </ul>
        </div>
      </div>
    </div>
    <!--Breadcrumb Wrap End -->

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
    <font size="3" FACE="impact" COLOR=#FFFFFF >Se ha registrado exitosamente.</font>
               </div>
    <?php } ?>

    <!-- MENSAJE WARNING-->
     <?php 
    if(isset($_GET['status']) And $_GET['status']==2 ){
    ?>      
    <div class="alert alert-success" align="left" style="background:#e81515;"> 
    <button class="close" data-dismiss="alert" align="left"><span class="fa fa-warning">  </span></button> 
    <font size="3" FACE="impact" COLOR=#FFFFFF >Error: No se logro completar el registro.</font>
               </div>
    <?php } ?>
<!-- MENSAJE Information-->
<?php 
    if(isset($_GET['status']) And $_GET['status']==3 ){
    ?>      
    <div class="alert alert-success" align="left" style="background:#0d9bd2;"> 
    <button class="close" data-dismiss="alert" align="left"><span class="fa fa-info">  </span></button> 
    <font size="3" FACE="impact" COLOR=#FFFFFF >Este registro ya se encuentra ingresado en la base de datos.</font>
               </div>
    <?php } ?>

    <!-- MENSAJE Information-->
<?php 
    if(isset($_GET['status']) And $_GET['status']==4 ){
    ?>      
    <div class="alert alert-success" align="left" style="background:#0d9bd2;"> 
    <button class="close" data-dismiss="alert" align="left"><span class="fa fa-info">  </span></button> 
    <font size="3" FACE="impact" COLOR=#FFFFFF >Atención: Debe esperar que el administrador apruebe su registro.</font>
               </div>
    <?php } ?>

    <!-- MENSAJE WARNING-->
     <?php 
    if(isset($_GET['status']) And $_GET['status']==5 ){
    ?>      
    <div class="alert alert-success" align="left" style="background:#e81515;"> 
    <button class="close" data-dismiss="alert" align="left"><span class="fa fa-warning">  </span></button> 
    <font size="3" FACE="impact" COLOR=#FFFFFF >Error: No se encuentra registrado en la base de datos o ha escrito mal sus credenciales.</font>
               </div>
    <?php } ?>

    <!-- MENSAJE WARNING-->
     <?php 
    if(isset($_GET['status']) And $_GET['status']==6 ){
    ?>      
    <div class="alert alert-success" align="left" style="background:#e81515;"> 
    <button class="close" data-dismiss="alert" align="left"><span class="fa fa-warning">  </span></button> 
    <font size="3" FACE="impact" COLOR=#FFFFFF >Error de contraseña.</font>
               </div>
    <?php } ?>

          <div class="gt_lgin_tab_wrap wow slideInUp" >
            <ul class="gt_login_link" data-tabs="tabs" style="border-color:#1e1744">
              <li class="active" ><a data-toggle="tab" href="#register" style="border-color:#1e1744" >Iniciar Sesión</a></li>
              <li><a data-toggle="tab" href="#login" style="border-color:#1e1744">Registrarse</a></li>
            </ul>
            <div class="tab-content"  border="2">
              <!-- div del formulario de inicio de sesion--->
              <div class="tab-pane active" id="register"  >
              <!--formulario de inicio de sesion--->
              <form method="POST" role="form" action="script-valida-acceso.php" border="2" style="border-color:#1e1744" >
                <div class="gt_login_des_wrap default_width">
                  <div class="gt_login_field">
                    <input type="text" name="correo" placeholder="Nombre de usuario" style="font-size:20px" required>
                    <label><i class="fa fa-user"></i></label>
                  </div>
                  <div class="gt_login_field">
                    <input type="password" name="clave" placeholder="Tu contraseña" style="font-size:20px" required>
                    <label><i class="fa fa-lock"></i></label>
                  </div>
                  
                  <div class="gt_login_field">
                    <input type="submit" style="font-size:20px" value="Ingresar">
                  </div>
          
                </div>
               </form>
            <!--fin del formulario de inicio de sesion--->
              </div>
            <!--fin del div del formulario de inicio de sesion--->

               <!---div del formulario de registro de empleado--->
              <div class="tab-pane" id="login" border="2">
                 <!--formulario de registro de empleado--->
              <form method="POST" role="form" action="script-guarda-empleado.php" >
                <div class="gt_login_des_wrap default_width">
                  <div class="gt_login_field">
                    <input type="text" placeholder="Nombres" name="nombre" style="font-size:20px" onkeypress="return sololetras(event)" required>
                    <label><i class="fa fa-user"></i></label>
                  </div>
                  <div class="gt_login_field">
                    <input type="text" placeholder="Apellidos" name="apellido" style="font-size:20px"  onkeypress="return sololetras(event)" required>
                    <label><i class="fa fa-user"></i></label>
                  </div>
                  <div class="gt_login_field">
                    <input type="text" placeholder="Nombre de usuario" id="correo" name="correo" style="font-size:20px" onKeyUp="javascript:validateMail('correo')" required>
                    <label><i class="fa fa-user"></i></label>
                  </div>
             
                  <div class="gt_login_field">
                    <input type="password" placeholder="Contraseña" name="clave" style="font-size:20px" required>
                    <label><i class="icon-lock"></i></label>
                  </div>
                  <div class="gt_login_field pure-css-select-style theme-filled">
                    <select name="id_perfil"  style="font-size:15pt" required>
                    <option value="">Seleccione el cargo</option>
                    <?php include "select-perfil.php"; ?>
                     </select>
                   <label><i class="fa fa-user"></i></label>
                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="gt_login_field">
                    <input type="submit" style="font-size:20px" value="Registrar">
                  </div>
                </div>
              </form>
                 <!--fin del formulario de registro de empleado--->
              </div>
               <!--fin del div del formulario de registro de empleado--->
            </div>
          </div>
        </div>
      </section>
      <!--Login & Register Page Wrap End-->
    </div>
    <!--Main Content Wrap End-->

    <!--Footer Wrap Start-->
    <footer class="wow fadeInUp">
      <!--Footer List Wrap Start-->
      <div class="gt_footer1_bg default_width">
        <div class="container">

          <div class="gt_foo_contact_wrap">
            <div class="row">
                <div class="col-md-4 col-sm-6 wow zoomIn">
                    <div class="gt_foo_contact_des">
                        <i class="icon-pin"></i>
                          <div class="gt_foo_icon_des">
                            <h5>Kevin Cruz - Angel Rojano</h5>
                              <span>Información o consulta </span>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4 col-sm-6 wow zoomIn">
                    <div class="gt_foo_contact_des">
                        <i class="icon-tool"></i>
                          <div class="gt_foo_icon_des">
                            <h5>anke.20181212@gmail.com</h5>
                              <span>Información o consulta  </span>
                          </div>
                      </div>
                  </div>
                    <div class="col-md-4 col-sm-6 wow zoomIn">
                    <div class="gt_foo_contact_des">
                        <i class="icon-phone"></i>
                          <div class="gt_foo_icon_des">
                            <h5>0994463762</h5>
                            <h5>0979782780</h5>
                            <span>Lunes - Viernes 9am a 5pm </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--Footer Contact Wrap End-->
        </div>
      </div>
      <!--Footer List Wrap End-->

      <!--Copyright Wrap End-->
      <div class="gt_copyright_wrap">
        <div class="container">
            <div class="gt_copyright_des">  
                <p>Copyright © <a href="#">Haway </a> 2020. Todos los derechos reservados.</p>

              </div>
          </div>
      </div>
      <!--Copyright Wrap Start-->
    </footer>
    <!--Footer Wrap End-->

    <!--Back to Top Wrap Start-->
    <div class="back-to-top">
      <a href="#home"><i class="fa fa-angle-up"></i></a>
    </div>
    <!--Back to Top Wrap Start-->
    
  </div>
  <!--gt Wrapper End-->

  <!--Jquery Library-->
  <script src="js\jquery.js"></script>
  <!--Bootstrap core JavaScript-->
  <script src="js\bootstrap.min.js"></script>
  <!--WOW JavaScript-->
  <script src="js\wow.min.js"></script>
  <!--Custom JavaScript-->
  <script src="js\custom.js"></script>

</body>
</html>
