  <?php
  $fecha=isset($_POST['fecha_inicio'])?$_POST['fecha_inicio']:null;
  $fecha_f=isset($_POST['fecha_final'])?$_POST['fecha_final']:null;
?>
<div style="position: relative; padding: 10px;  top:-69px; left: 540px;">
<button title="Descargar Reportes" type="submit" name="descarga" value="descarga" class="btn btn-success" align="right"> <a href="reporte_excel_entrada_clientes.php?fecha_inicio=<?php echo $fecha ?>&fecha_final=<?php echo $fecha_f ?>"><span class="fa fa-download"></span></a></button>

</div>

<div style="position: relative; padding: 10px;  top:-123px; left: 590px;">
<button title="Descargar Reportes 2" type="submit" name="descarga" value="descarga" class="btn btn-info" align="right"> <a href="reporte_excel_entrada_clientes_2.php?fecha_inicio=<?php echo $fecha ?>&fecha_final=<?php echo $fecha_f ?>"><span class="fa fa-download"></span></a></button>

</div>

<div style="position: relative; padding: 10px;  top:-177px; left: 640px;">
<button title="Descargar Reportes 3" type="submit" name="descarga" value="descarga" class="btn btn-warning" align="right"> <a href="reporte_excel_entrada_clientes_3.php?fecha_inicio=<?php echo $fecha ?>&fecha_final=<?php echo $fecha_f ?>"><span class="fa fa-download"></span></a></button>

</div>
  <div class="datagrid" align="Center" style="background:#bb860f;">
    
    
            <h2 align="center"> <font FACE="impact" SIZE=6 COLOR=#EFEBEB>Reportes </font></h2>
    
      
    
      
          <table border="2">

          <thead class="datagrid table thead th color red">
           
            
      
                    <tr>
                        <th scope="col" abbr="Deluxe"><font size="3">Datos del Guardia</font></th>
                        <th scope="col" abbr="Deluxe"><font size="3">Movilización</font></th>
                        <th scope="col" abbr="Deluxe"><font size="3">Placa</font></th>
                        <th scope="col" abbr="Deluxe"><font size="3">Descripción</font></th>
                         <th scope="col" abbr="Deluxe"><font size="3">Habitación</font></th>
                        <th scope="col" abbr="Deluxe" colspan="2"><font size="3">fecha y hora de entrada</font></th>
                        <th scope="col" abbr="Deluxe" colspan="2"><font size="3">fecha y hora de Salida</font></th>
                        
            
            
                    </tr>
                </thead>
         
                <tbody>
        
      <?php
          $consulta_reportes="SELECT * FROM empleado a, ingreso_parejas b ,movilizacion c, salida_parejas d, numero_habitacion e WHERE a.id_empleado=b.id_empleado and b.id_movilizacion = c.id_movilizacion and b.id_parejas= d.id_parejas and b.id_numero_habitacion=e.id_numero_habitacion and TIMESTAMP(fecha_de_entrada,hora_de_entrada) between  '$fecha' and '$fecha_f' ORDER BY fecha_de_entrada DESC ";
          $res_consulta_reportes=mysqli_query($conexion,$consulta_reportes);
          $num_reportes= mysqli_num_rows($res_consulta_reportes);
          
          if($num_reportes==0){
          ?>
          <tr>
             <td align="center" colspan="10"><font size="5" FACE="impact" >No se encontrarón resultados  o realizó una incorrecta búsqueda</font></td>

         </tr>
        
          <?php 
          } while($res_reportes_obtenidos=mysqli_fetch_assoc($res_consulta_reportes)){
         ?>
        
         
                    <tr>
         <td><font size="4" FACE="impact" ><?php echo $res_reportes_obtenidos['nombre'];?> <?php echo $res_reportes_obtenidos['apellido'];?></font></td>
  
         <td><font size="3" FACE="impact" ><?php echo $res_reportes_obtenidos['movilizacion'];?></font></td>
         <td><font size="3" FACE="impact" ><?php echo $res_reportes_obtenidos['placa'];?></font></td>
         <td><font size="3" FACE="impact" ><?php echo $res_reportes_obtenidos['descripcion'];?></font></td>
         <td><font size="3" FACE="impact" ><?php echo $res_reportes_obtenidos['numero_habitacion'];?></font></td>
         <td><font size="3" FACE="impact" ><?php echo $res_reportes_obtenidos['fecha_de_entrada'];?></font></td>
         <td><font size="3" FACE="impact" ><?php echo $res_reportes_obtenidos['hora_de_entrada'];?></font></td>
         <td><font size="3" FACE="impact" ><?php echo $res_reportes_obtenidos['fecha_salida'];?></font></td>
         <td><font size="3" FACE="impact" ><?php echo $res_reportes_obtenidos['hora_salida'];?></font></td>
  
  
         
         </tr>

                    
          <?php }?>
        
                </tbody>
            </table>
</div>