

  <div class="datagrid" align="Center" style="background:#bb860f;">
    
    
            <h2 align="center"><font FACE="impact" SIZE=6 COLOR=#EFEBEB>Listado de parejas ingresadas</font></h2>
    
      
    
      
          <table border="2" style="border-color:#e2d7d7">

          <thead >
           
            
      
                    <tr>
                        <th scope="col" abbr="Deluxe"><font size="4">Tipo de Habitación</font></th>
                        <th scope="col" abbr="Deluxe"><font size="4">Numero de Habitación</font></th>
                        <th scope="col" abbr="Deluxe"><font size="4">Tipo de servicio</font></th>
                        <th scope="col" abbr="Deluxe"><font size="4">Fecha de Entrada</font></th>
                        <th scope="col" abbr="Deluxe"><font size="4">Hora de Entrada</font></th>
                        <th scope="col" abbr="Deluxe" align="center"><font size="4">Ingresar salida</font></th>
            
            
                    </tr>
                </thead>
         
                <tbody>
        
      <?php

          $consulta_ingreso_parejas="SELECT * FROM ingreso_parejas, tipo_habitacion, numero_habitacion, tipo_servicio WHERE tipo_habitacion.id_tipo_habitacion=ingreso_parejas.id_tipo_habitacion and numero_habitacion.id_numero_habitacion=ingreso_parejas.id_numero_habitacion and   id_estado_cliente='1' and tipo_servicio.id_tipo_servicio=ingreso_parejas.id_tipo_servicio ";
          $res_consulta_ingreso_parejas=mysqli_query($conexion,$consulta_ingreso_parejas);
          $num_usuario= mysqli_num_rows($res_consulta_ingreso_parejas);
    
          if($num_usuario==0){
          ?>
          <tr>
          <td align="center" colspan="8"><font size="5" FACE="impact" >No se encontrarón resultados</font></td>
         </tr>
        
          <?php 
          } while($res_consulta_parejas_ingresas_obtenidos=mysqli_fetch_assoc($res_consulta_ingreso_parejas)){
         ?>
        
         
                    <tr>

         
         <td style="background:#bb860f"><font size="5" FACE="impact" ><?php echo $res_consulta_parejas_ingresas_obtenidos['tipo'];?></font></td>
         <td style="background:#bb860f"><font size="5" FACE="impact" ><?php echo $res_consulta_parejas_ingresas_obtenidos['numero_habitacion'];?></font></td>
         <td style="background:#bb860f"><font size="5" FACE="impact" ><?php echo $res_consulta_parejas_ingresas_obtenidos['servicio'];?></font></td>
         <td style="background:#bb860f"><font size="5" FACE="impact" ><?php echo $res_consulta_parejas_ingresas_obtenidos['fecha_de_entrada'];?></font></td>
         <td style="background:#bb860f"><font size="5" FACE="impact" ><?php echo $res_consulta_parejas_ingresas_obtenidos['hora_de_entrada'];?></font></td>
  
        <td style="background:#bb860f">
               
         <a title="Registrar Salida" onclick="confirmar(<?php echo $res_consulta_parejas_ingresas_obtenidos['id_parejas'];?>,<?php echo $res_consulta_parejas_ingresas_obtenidos['numero_habitacion'];?>);" class="btn btn-success"><i class="fa fa-check"></i></a>
        
         </td>
         
         </tr>

                    
          <?php }?>
        
                </tbody>
            </table>

            <?php
$consulta_ingreso_parejas="SELECT * FROM ingreso_parejas, tipo_habitacion, numero_habitacion, tipo_servicio WHERE tipo_habitacion.id_tipo_habitacion=ingreso_parejas.id_tipo_habitacion and numero_habitacion.id_numero_habitacion=ingreso_parejas.id_numero_habitacion and   id_estado_cliente='1' and tipo_servicio.id_tipo_servicio=ingreso_parejas.id_tipo_servicio ";
          $res_consulta_ingreso_parejas=mysqli_query($conexion,$consulta_ingreso_parejas);
          
          $num_habi=mysqli_fetch_array($res_consulta_ingreso_parejas);
          $nro_habitac=$num_habi['numero_habitacion'];
?>
</div>


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
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

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





<script type="text/javascript">
function confirmar(valor, valor2){

alertify.prompt('¿Estás seguro que deseas registrar la salida de la pareja de la habitación '+valor2+'?','Observaciones' ,'', function(evt, value){ 
   

 location.href="script-guarda-salida-parejas.php?id_parejas="+valor+"&observaciones="+value;
 }

                , function(){/* alertify.error('Operación Cancelada')*/});
}

</script>