<?php
include "Conexion.php";
include "control-sesion.php";
include "datos-usuarios.php";
include "lib_fecha_texto.php";


 $fecha=isset($_GET['fecha_inicio'])?$_GET['fecha_inicio']:null;
 $fecha_f=isset($_GET['fecha_final'])?$_GET['fecha_final']:null;



$fecha_inicio = date('Y-m-d',strtotime($fecha));
$hora_inicio = date('H:i',strtotime($fecha));
$hora_final = date('H:i',strtotime($fecha_f));


$dia  = date('d',strtotime($fecha));
$mes=date('m',strtotime($fecha));
$ano=date('Y',strtotime($fecha));
$nmes=nombremes($mes);
header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=Reporte de Guardias ".$fecha_inicio." desde ".$hora_inicio." hasta ".$hora_final.".xls");
header("Pragma: no-cache");
header("Expires:0");
?>
<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<h1 align="center"><u>CONTROL DE INGRESO DE PAREJAS POR TURNO-GUARDIA</u></h1>
<h3 align="left">FECHA DEL TURNO: <u><?php echo saber_dia($fecha_inicio); ?> <?php echo $dia; ?> de <?php echo $nmes; ?> del <?php echo $ano; ?></u></h3>
<h3 align="left">HORARIO DEL TURNO DESDE: <u><?php echo $hora_inicio; ?></u> HASTA: <u><?php echo $hora_final; ?></u></h3>



<table>

<tr>
<td colspan="5">
   <table border="2">

          <thead class="datagrid table thead th color red">



                    <tr>
                        <th scope="col" abbr="Deluxe">Datos del Guardia</th>
                        <th scope="col" abbr="Deluxe">Movilización</th>
                        <th scope="col" abbr="Deluxe">Placa</th>
                        <th scope="col" abbr="Deluxe">Descripción</th>
                        <th scope="col" abbr="Deluxe">Numero de Habitación</th>
                        <th scope="col" abbr="Deluxe" colspan="2">fecha y hora de entrada</th>
                        <th scope="col" abbr="Deluxe" colspan="2">fecha y hora de Salida</th>
                        <th scope="col" abbr="Deluxe">Tiempo de estadía</th>
                        <th scope="col" abbr="Deluxe">Observación</th>



                    </tr>
                </thead>

                <tbody>

      <?php
        function formato_hora($hora)
          {
              list($h, $m, $s) = explode(':', $hora);
              $seg = ($h * 3600) + ($m * 60) + $s;
              return $seg/3600;
          }
          $consulta_reportes="SELECT * FROM empleado a, ingreso_parejas b ,movilizacion c, salida_parejas d, numero_habitacion e WHERE a.id_empleado=b.id_empleado and b.id_movilizacion = c.id_movilizacion and b.id_parejas= d.id_parejas and b.id_numero_habitacion=e.id_numero_habitacion and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' ORDER BY fecha_de_entrada ASC, hora_de_entrada ASC";
          $res_consulta_reportes=mysqli_query($conexion,$consulta_reportes);
          $num_reportes= mysqli_num_rows($res_consulta_reportes);

          if($num_reportes==0){
          ?>
          <tr>
         <td align="center" colspan="10">No se encontraron resultados o realizó una incorrecta búsqueda</td>
         </tr>

          <?php
          } while($res_reportes_obtenidos=mysqli_fetch_assoc($res_consulta_reportes)){
         ?>


                    <tr>
         <td><?php echo $res_reportes_obtenidos['nombre'];?> <?php echo $res_reportes_obtenidos['apellido'];?></td>
         <td><?php echo $res_reportes_obtenidos['movilizacion'];?></td>
         <td><?php echo $res_reportes_obtenidos['placa'];?></td>
         <td><?php echo $res_reportes_obtenidos['descripcion'];?></td>
         <td><?php echo $res_reportes_obtenidos['numero_habitacion'];?></td>
         <td><?php echo $res_reportes_obtenidos['fecha_de_entrada'];?></td>
         <td><?php echo $res_reportes_obtenidos['hora_de_entrada'];?></td>
         <td><?php echo $res_reportes_obtenidos['fecha_salida'];?></td>
         <td><?php echo $res_reportes_obtenidos['hora_salida'];?></td>

       <?php $consulta_suma="SELECT timestamp(fecha_de_entrada,hora_de_entrada),timestamp(fecha_salida,hora_salida),
             SEC_TO_TIME(TIMESTAMPDIFF(SECOND,timestamp(fecha_de_entrada,hora_de_entrada), timestamp(fecha_salida,hora_salida))) HORAS  FROM ingreso_parejas a, salida_parejas b WHERE a.id_parejas=b.id_parejas and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and fecha_de_entrada is not null and a.id_parejas=".$res_reportes_obtenidos['id_parejas'];
             $res_consulta_suma=mysqli_query($conexion,$consulta_suma);
             $suma_horas=mysqli_fetch_array($res_consulta_suma);
             $suma=$suma_horas['HORAS'];
if($res_reportes_obtenidos['id_tipo_servicio']==1 AND formato_hora($suma)>4){
  echo '<td style="background-color: #000; color: #fff;">'.$suma.'</td>';
}else if($res_reportes_obtenidos['id_tipo_servicio']==2 AND formato_hora($suma)>12){
  echo '<td style="background-color: #000; color: #fff;">'.$suma.'</td>';
}else if($res_reportes_obtenidos['id_tipo_servicio']==3 AND formato_hora($suma)>24){
  echo '<td style="background-color: #000; color: #fff;">'.$suma.'</td>';
}else{
  echo '<td>'.$suma.'</td>';
}
?>
        <td><?php echo $res_reportes_obtenidos['observaciones'];?></td>
           <?php }?>



         </tr>

                </tbody>
            </table>

<br><br><br><br>
</td>
 </tr>

<tr align="left">
<td>






<!--tabla estado de servicio-->
 <?php  $consulta_empleado="SELECT distinct(id_empleado) id_empleado from ingreso_parejas  where TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f'";
           $res_consulta_empleado=mysqli_query($conexion,$consulta_empleado);
           $num_empleado= mysqli_num_rows($res_consulta_empleado);
           if($num_empleado>0){
             while($res_empleado_obtenidos=mysqli_fetch_assoc($res_consulta_empleado)){
    ?>


<br><br><br><table border="2" style="align-self:center" >

<tr>
  <td>  </td>
  <td>SENCILLAS</td>
  <td>VEHICULARES</td>
  <td>SUITES</td>
  <td>TOTAL</td>
</tr>
<tr>
  <td>MOMENTO</td>
  <!--momento sencillas-->
  <?php
  $res1 = mysqli_query($conexion,"SELECT Count(id_tipo_servicio) as tota1 FROM ingreso_parejas, salida_parejas WHERE  id_tipo_servicio='1' and id_tipo_habitacion='3' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
    $rw1 = mysqli_fetch_assoc($res1) or die (mysqli_error($conexion));
                ?>
  <td><?php echo $rw1['tota1']; ?></td>

  <!--momento vehiculares-->
  <?php
  $res2 = mysqli_query($conexion,"SELECT Count(id_tipo_servicio) as tota2 FROM ingreso_parejas, salida_parejas WHERE  id_tipo_servicio='1' and id_tipo_habitacion='2' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
    $rw2 = mysqli_fetch_assoc($res2) or die (mysqli_error($conexion));
                ?>
  <td><?php echo $rw2['tota2']; ?></td>
  <!--momento suites-->
  <?php
  $res3 = mysqli_query($conexion,"SELECT Count(id_tipo_servicio) as tota3 FROM ingreso_parejas, salida_parejas WHERE  id_tipo_servicio='1' and id_tipo_habitacion='1' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
    $rw3 = mysqli_fetch_assoc($res3) or die (mysqli_error($conexion));
                ?>
  <td><?php echo $rw3['tota3']; ?></td>

<!-- total momento-->
    <?php
  $m1=$rw1['tota1'];
  $m2=$rw2['tota2'];
  $m3=$rw3['tota3'];


  $rtm=$m1+$m2+$m3;
?>
  <td><?php echo $rtm; ?></td>
</tr>
<tr>
  <td>DORMIDA</td>
  <!--dormida sencillas-->
  <?php
  $res4 = mysqli_query($conexion,"SELECT Count(id_tipo_servicio) as tota4 FROM ingreso_parejas, salida_parejas WHERE  id_tipo_servicio='2' and id_tipo_habitacion='3' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
    $rw4 = mysqli_fetch_assoc($res4) or die (mysqli_error($conexion));
                ?>
  <td><?php echo $rw4['tota4']; ?></td>
    <!--dormida vehiculares-->
  <?php
  $res5 = mysqli_query($conexion,"SELECT Count(id_tipo_servicio) as tota5 FROM ingreso_parejas, salida_parejas WHERE  id_tipo_servicio='2' and id_tipo_habitacion='2' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
    $rw5 = mysqli_fetch_assoc($res5) or die (mysqli_error($conexion));
                ?>
  <td><?php echo $rw5['tota5']; ?></td>
    <!--dormida Suites-->
  <?php
  $res6 = mysqli_query($conexion,"SELECT Count(id_tipo_servicio) as tota6 FROM ingreso_parejas, salida_parejas WHERE  id_tipo_servicio='2' and id_tipo_habitacion='1' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
    $rw6 = mysqli_fetch_assoc($res6) or die (mysqli_error($conexion));
                ?>
  <td><?php echo $rw6['tota6']; ?></td>



  <!-- total dormida-->
    <?php
  $d1=$rw4['tota4'];
  $d2=$rw5['tota5'];
  $d3=$rw6['tota6'];


  $rtd=$d1+$d2+$d3;
?>
  <td><?php echo $rtd; ?></td>
</tr>
<tr>
  <td>ESTADIA</td>
    <!--estadia sencillas-->
  <?php
  $res7 = mysqli_query($conexion,"SELECT Count(id_tipo_servicio) as tota7 FROM ingreso_parejas, salida_parejas WHERE  id_tipo_servicio='3' and id_tipo_habitacion='3' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
    $rw7 = mysqli_fetch_assoc($res7) or die (mysqli_error($conexion));
                ?>
  <td><?php echo $rw7['tota7']; ?></td>

    <!--estadia vehiculares-->
  <?php
  $res8 = mysqli_query($conexion,"SELECT Count(id_tipo_servicio) as tota8 FROM ingreso_parejas, salida_parejas WHERE  id_tipo_servicio='3' and id_tipo_habitacion='2' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
    $rw8 = mysqli_fetch_assoc($res8) or die (mysqli_error($conexion));
                ?>
  <td><?php echo $rw8['tota8']; ?></td>
  <!--estadia Suites-->
  <?php
  $res9 = mysqli_query($conexion,"SELECT Count(id_tipo_servicio) as tota9 FROM ingreso_parejas, salida_parejas WHERE  id_tipo_servicio='3' and id_tipo_habitacion='1' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
    $rw9 = mysqli_fetch_assoc($res9) or die (mysqli_error($conexion));
                ?>
  <td><?php echo $rw9['tota9']; ?></td>
  <!-- total estadia-->
    <?php
  $e1=$rw7['tota7'];
  $e2=$rw8['tota8'];
  $e3=$rw9['tota9'];


  $rte=$e1+$e2+$e3;
?>
  <td><?php echo $rte; ?></td>
</tr>
<tr>
  <td>TOTAL</td>
  <!-- total sencillas-->
  <?php
  $rws1=$rw1['tota1'];
  $rws4=$rw4['tota4'];
  $rws7=$rw7['tota7'];


  $totals=$rws1+$rws4+$rws7;

  ?>
  <td><?php echo $totals; ?></td>
   <!-- total vehiculares-->
  <?php
  $rws2=$rw2['tota2'];
  $rws5=$rw5['tota5'];
  $rws8=$rw8['tota8'];


  $totalv=$rws2+$rws5+$rws8;

  ?>
  <td><?php echo $totalv; ?></td>
   <!-- total Suites-->
  <?php
  $rws3=$rw3['tota3'];
  $rws6=$rw6['tota6'];
  $rws9=$rw9['tota9'];


  $totalsw=$rws3+$rws6+$rws9;

  ?>
  <td><?php echo $totalsw; ?></td>
  <?php
  $ttservicios=$totals+$totalv+$totalsw;
  ?>
  <td><?php echo $ttservicios; ?></td>
</tr>

</table>

<br><br>
<?php }} ?>
</td>

<td></td>



<td>


      <?php  $consulta_empleado="SELECT distinct(id_empleado) id_empleado from ingreso_parejas  where TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f'";
           $res_consulta_empleado=mysqli_query($conexion,$consulta_empleado);
           $num_empleado= mysqli_num_rows($res_consulta_empleado);
           if($num_empleado>0){
             while($res_empleado_obtenidos=mysqli_fetch_assoc($res_consulta_empleado)){
    ?>




          <br><br><table  style="float:right">

               <tr>
              <td  style="border-width: 1px;border: solid; border-color: #000000;" >Taxi</td>
              <?php
                  $result3 = mysqli_query($conexion,"SELECT Count(id_movilizacion) as total3 FROM ingreso_parejas, salida_parejas WHERE  id_movilizacion='5' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
                  $row3 = mysqli_fetch_assoc($result3) or die (mysqli_error($conexion));
                ?>

                <td style="border-width: 1px;border: solid; border-color: #000000;"><?php echo $row3['total3']; ?></td></tr>



            <tr>
            <td style="border-width: 1px;border: solid; border-color: #000000;">Carro</td>
              <?php
                  $result = mysqli_query($conexion,"SELECT Count(id_movilizacion) as total FROM ingreso_parejas, salida_parejas WHERE  id_movilizacion='1' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
                  $row = mysqli_fetch_assoc($result) or die (mysqli_error($conexion));
                ?>

                <td style="border-width: 1px;border: solid; border-color: #000000;"><?php echo $row['total']; ?></td></tr>
                 <tr>
                  <td style="border-width: 1px;border: solid; border-color: #000000;">Moto</td>
                 <?php
                  $result2 = mysqli_query($conexion,"SELECT Count(id_movilizacion) as total2 FROM ingreso_parejas, salida_parejas WHERE  id_movilizacion='2' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
                  $row2 = mysqli_fetch_assoc($result2) or die (mysqli_error($conexion));
                ?>


               <td style="border-width: 1px;border: solid; border-color: #000000;"><?php echo $row2['total2']; ?></td></tr>

                 <tr>
                  <td style="border-width: 1px;border: solid; border-color: #000000;">A pie</td>
                 <?php
                  $result4 = mysqli_query($conexion,"SELECT Count(id_movilizacion) as total4 FROM ingreso_parejas, salida_parejas WHERE  id_movilizacion='3' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
                  $row4 = mysqli_fetch_assoc($result4) or die (mysqli_error($conexion));
                ?>


               <td style="border-width: 1px;border: solid; border-color: #000000;"><?php echo $row4['total4']; ?></td></tr>

               <tr>
                  <td style="border-width: 1px;border: solid; border-color: #000000;">Bicicleta</td>
                 <?php
                  $result5 = mysqli_query($conexion,"SELECT Count(id_movilizacion) as total5 FROM ingreso_parejas, salida_parejas WHERE  id_movilizacion='4' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");
                  $row5 = mysqli_fetch_assoc($result5) or die (mysqli_error($conexion));
                ?>


               <td style="border-width: 1px;border: solid; border-color: #000000;"><?php echo $row5['total5']; ?></td></tr>

               <tr>
                  <td style="border-width: 1px;border: solid; border-color: #000000;">Total</td>

            <?php
             $tx=$row3['total3'];
             $tc=$row['total'];
             $tm=$row2['total2'];
             $tb=$row5['total5'];
             $tp=$row4['total4'];


             $totalmo=$tx+$tc+$tm+$tb+$tp;

             ?>

               <td style="border-width: 1px;border: solid; border-color: #000000;"><?php echo $totalmo; ?></td></tr>

            <tr>
              <td >  </td>
            </tr>

            <tr>


                  <?php
                  $datos_empleados ="SELECT * From empleado WHERE id_empleado= ".$res_empleado_obtenidos["id_empleado"]."" ;
                   $res_consulta_datos_empleados=mysqli_query($conexion,$datos_empleados);
                   $fila_nro_datos_empleados=mysqli_fetch_array($res_consulta_datos_empleados);
                   $nombresss=$fila_nro_datos_empleados['nombre'];
                   $apellidoss=$fila_nro_datos_empleados['apellido'];
                ?>

              <td colspan="6">Guardia <?php echo $nombresss; ?> <?php echo $apellidoss;  ?></td>

            </tr>
          </table>



<?php }} ?>
</td>
</tr>


</table>
