

  <div class="datagrid" align="Center" style="background:#bb860f;">


            <h2 align="center"><font FACE="impact" SIZE=6 COLOR=#EFEBEB>Listado de Clientes Malos</font></h2>




          <table>

          <thead class="datagrid table thead th color red">



                    <tr>
                        <th scope="col" abbr="Deluxe"><font size="4">Id</font></th>
                        <th scope="col" abbr="Deluxe"><font size="4">Placa</font></th>
                        <th scope="col" abbr="Deluxe"><font size="4">Opción</font></th>



                    </tr>
                </thead>

                <tbody>

      <?php

          $consulta_clientes_malos="SELECT * FROM clientes_relajosos ";
          $res_consulta_clientes_malos=mysqli_query($conexion,$consulta_clientes_malos);
          $num_usuario= mysqli_num_rows($res_consulta_clientes_malos);

          if($num_usuario==0){
          ?>
          <tr>
         <td align="center" colspan="6"><font size="5" FACE="impact" >No se encontrarón resultados</font></td>
         </tr>

          <?php
          } while($res_consulta_estado_clientes_malos=mysqli_fetch_assoc($res_consulta_clientes_malos)){
         ?>


                    <tr>

         <td><font size="4" FACE="impact" ><?php echo $res_consulta_estado_clientes_malos['id_clientes_relajosos'];?></font></td>
         <td><font size="4" FACE="impact" ><?php echo $res_consulta_estado_clientes_malos['cliente_relajoso'];?></font></td>

        <td>

         <a title="Borrar cliente malo" onclick="confirmar('<?php echo $res_consulta_estado_clientes_malos['id_clientes_relajosos']."','".$res_consulta_estado_clientes_malos['cliente_relajoso'];?>')"  class="btn btn-warning"><i class="fa fa-trash-o"></i></a>

         </td>

         </tr>


          <?php }?>

                </tbody>
            </table>

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


<script  type="text/javascript" >
function confirmar(valor,nombre){

alertify.confirm('Atención', '¿Estás seguro que deseas eliminar esta placa '+nombre+'?', function(){


 location.href="script_borra_cliente_malo.php?id_clientes_relajosos="+valor;
 }
                , function(){ /*alertify.error('Operación Cancelada')*/});
}

</script>