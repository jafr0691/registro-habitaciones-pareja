  

  <div class="datagrid" align="Center" style="background:#bb860f;">
    
    
            <h2 align="center"><font FACE="impact" SIZE=6 COLOR=#EFEBEB>Lista de usuarios por confirma</font></h2>
    
      
    
      
          <table border="2" style="border-color:#e2d7d7">

          <thead class="datagrid table thead th color red">
           
            
      
                    <tr>
                    
                        <th scope="col" abbr="Deluxe"><font size="4">Nombres</font></th>
                        <th scope="col" abbr="Deluxe"><font size="4">Apellidos</font></th>
                        <th scope="col" abbr="Deluxe"><font size="4">Correo o Nombre de usuario</font></th>
                        <th scope="col" abbr="Deluxe"><font size="4">Cargo</font></th>
                        <th scope="col" abbr="Deluxe" colspan="2" align="center"><font size="4">Opción</font></th>
            
            
                    </tr>
                </thead>
         
                <tbody>
        
      <?php
          $consulta_usuario="SELECT * FROM empleado, perfil WHERE id_estado_empleado='2' and empleado.id_perfil=perfil.id_perfil";
          $res_consulta_usuario=mysqli_query($conexion,$consulta_usuario);
          $num_usuario= mysqli_num_rows($res_consulta_usuario);
          
          if($num_usuario==0){
          ?>
          <tr>
         <td align="center" colspan="6"><font size="5" FACE="impact" >No se encontrarón resultados</font></td>
         </tr>
        
          <?php 
          } while($res_usuarios_obtenidos=mysqli_fetch_assoc($res_consulta_usuario)){
         ?>
        
         
                    <tr>
         <td><font size="4" FACE="impact" ><?php echo $res_usuarios_obtenidos['nombre'];?></font></td>
         <td><font size="4" FACE="impact" ><?php echo $res_usuarios_obtenidos['apellido'];?></font></td>
         <td><font size="4" FACE="impact" ><?php echo $res_usuarios_obtenidos['correo'];?></font></td>
         <td><font size="4" FACE="impact" ><?php echo $res_usuarios_obtenidos['cargo'];?></font></td>

        <td><a title="Cancelar solicitud" href="script_borra_usuario.php?id_empleado= <?php echo $res_usuarios_obtenidos['id_empleado']; ?>" class="btn btn-danger"><i class="fa fa-times"></i></a>&nbsp;
               
         <a title="Aprobar usuario" href="script_confirma_usuario.php?id_empleado= <?php echo $res_usuarios_obtenidos['id_empleado']; ?>" class="btn btn-success"><i class="fa fa-check"></i></a>
        
         </td>
         
         </tr>

                    
          <?php }?>
        
                </tbody>
            </table>
</div>