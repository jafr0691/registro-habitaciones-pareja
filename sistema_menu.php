<header class="gt_hdr2_wrap">
     
      <div class="gt_top2_wrap default_width">
        <div class="container">
          <div class="gt_top_element">
            <ul>
         
            </ul>
          </div>
          <div class="gt_hdr_2_ui_element">
            <ul>
              <li><i class="icon-lock"></i><a data-target="#gt-login" href="remote.html" data-toggle="modal" href="#"><?php echo  isset($nombres) ?$nombres:null ; ?> <?php
        echo  isset($apellidos) ?$apellidos:null ; ?></a></li>
      
            </ul>
          </div>
          <div class="gt_login_element">
        
          </div>
        </div>
      </div>
      <div class="gt_menu_bg default_width">
        <div class="container">
          <!--Logo Wrap Start-->
          <div class="gt_logo">
            <a href="#"><img src="images\logo-haway.jpg" alt=""></a>
          </div>
          <!--Logo Wrap End-->
         
          <!--Navigation Wrap Start-->
          <div id="menu" >
          <nav class=" gt_navigation2" >
            
            <ul style="font-size: 20px">
              <li class="opcion"><a  href="start_menu.php">Inicio</a></li>
              <!---Condicion para que solo este menu se presente para el administrador-->
               <?php if($id_perfil==1){ ?>
              <li class="opcion"><a href="#">Registrar</a>
              <ul>
                <li class="opcion"><a href="Registro_usuarios.php">Registrar usuarios</a></li>
                <li class="opcion"><a href="registrar_clientes_malos.php">Registrar Malos Clientes</a></li>
                </ul>
              </li>
              <li class="opcion" ><a href="#">Consultar</a>
                <ul>
                   <li><a href="usuarios_por_confirmar.php">Usuarios por confirmar</a></li>
                  <li><a href="usuarios_confirmados.php">Usuarios confirmados</a></li>
                  <li><a href="Clientes_malos.php">Malos Clientes</a></li>
                  </ul>
              </li>



             <li><a  href="#">Reportes</a>
              <ul>
                <li ><a href="reportes.php">Reportes ingreso Parejas</a></li>

              </ul>
             </li>
                <?php }  ?><!---fin de condicion-->
             
                 <!---Condicion para que solo este menu se presente para al supervisora-->  
                 <?php if($id_perfil==2){ ?>
                  <li class="opcion"><a  href="">Reportes</a>
              <ul>
                <li class="opcion"><a href="reportes.php">Reportes ingreso Parejas</a></li>

              </ul>
             </li>
                  <?php }  ?><!---fin de condicion-->
               

                <!---Condicion para que solo este menu se presente para el guardia-->
                <?php if($id_perfil==3){ ?>
                 <li class="opcion"><a href="#">Registrar</a>
              <ul>
                <li class="opcion"><a href="Registro_parejas.php">Registrar Parejas</a></li>
                <li class="opcion"><a href="parejas_ingresadas.php">Registrar Salidas</a></li>
                <li class="opcion"><a href="habitaciones_limpieza.php">Habitaciones en Limpieza</a></li>
                </ul>
              </li>
              <?php } ?><!---fin de condicion-->

              <li class="opcion"><a href="cambio_contrasena.php">Cambiar Contraseña</a></li>
     
              <li><a href="cerrar-sesion.php">Cerrar Sesion</a></li>
            </ul>
            
          </nav>
        </div>
          <!--Navigation Wrap End-->
        </div>
      </div>



    </header>
