<?php
include "Conexion.php";
include "control-sesion.php";

include "datos-usuarios.php";



 $fecha=isset($_GET['fecha_inicio'])?$_GET['fecha_inicio']:null;
 $fecha_f=isset($_GET['fecha_final'])?$_GET['fecha_final']:null;

header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=Reporte de Guardias.xls");
header("Pragma: no-cache");
header("Expires:0");
?>

<h2 align="center">Reportes</h2>
    
      
    <?php  $consulta_empleado="SELECT distinct(id_empleado) id_empleado from ingreso_parejas "; 
           $res_consulta_empleado=mysqli_query($conexion,$consulta_empleado);
           $num_empleado= mysqli_num_rows($res_consulta_empleado);
           if($num_empleado>0){
             while($res_empleado_obtenidos=mysqli_fetch_assoc($res_consulta_empleado)){
    ?>
      
          <table>

          <thead class="datagrid table thead th color red">
           
            
      
                    <tr>
                        <th scope="col" abbr="Deluxe">Datos del Guardia</th>
                        <th scope="col" abbr="Deluxe">Movilización</th>
                        <th scope="col" abbr="Deluxe">Placa</th>
                        <th scope="col" abbr="Deluxe">Descripción</th>
                        <th scope="col" abbr="Deluxe" colspan="2">fecha y hora de entrada</th>
                        <th scope="col" abbr="Deluxe" colspan="2">fecha y hora de Salida</th>
                        
            
            
                    </tr>
                </thead>
         
                <tbody>
        
      <?php
          $consulta_reportes="SELECT * FROM empleado a, ingreso_parejas b ,movilizacion c, salida_parejas d WHERE a.id_empleado=b.id_empleado and b.id_movilizacion = c.id_movilizacion and b.id_parejas= d.id_parejas and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and b.id_empleado=".$res_empleado_obtenidos["id_empleado"]." ORDER BY fecha_de_entrada DESC";
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
         <td><?php echo $res_reportes_obtenidos['fecha_de_entrada'];?></td>
         <td><?php echo $res_reportes_obtenidos['hora_de_entrada'];?></td>
         <td><?php echo $res_reportes_obtenidos['fecha_salida'];?></td>
         <td><?php echo $res_reportes_obtenidos['hora_salida'];?></td>
  
  
         
         </tr>

                    
          <?php }?>
        
                </tbody>
            </table>
</div>





       



          <table border="3">

           <tr>
             <td>carro</td>
             <td>moto</td>
           </tr>

            <tr>

              <?php
                  $result = mysqli_query($conexion,"SELECT Count(id_movilizacion) as total FROM ingreso_parejas, salida_parejas WHERE  id_movilizacion='1' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");  
                  $row = mysqli_fetch_assoc($result) or die (mysqli_error($conexion));
                ?>
            
                <td><?php echo $row['total']; ?></td>
                 
                 <?php
                  $result2 = mysqli_query($conexion,"SELECT Count(id_movilizacion) as total2 FROM ingreso_parejas, salida_parejas WHERE  id_movilizacion='2' and ingreso_parejas.id_parejas = salida_parejas.id_parejas  and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' and ingreso_parejas.id_empleado=".$res_empleado_obtenidos["id_empleado"]."");  
                  $row2 = mysqli_fetch_assoc($result2) or die (mysqli_error($conexion));
                ?>
            

               <td><?php echo $row2['total2']; ?></td>
                 

            </tr>

          </table>

 <?php }} ?>
