
              <style type="text/css">
               .mayuscula {
        text-transform: uppercase;
                    }

             </style>    


                <div class="tab-pane" id="login">
                 <!--formulario de registro de empleado--->
              <form method="POST" role="form" action="script-guarda-ingreso-parejas.php">
                <div class="gt_login_des_wrap default_width">
                  
                   
                
                  <div class="gt_login_field pure-css-select-style theme-filled">
                    <select name="selecttipohabitaciones" id="selecttipohabitaciones" style="font-size:15pt" required>
          
                     </select>
                   <label><i class="fa fa-building"></i></label>

                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                  <div class="gt_login_field pure-css-select-style theme-filled">
                    <select name="selectnumerohabitaciones"  id="selectnumerohabitaciones" style="font-size:15pt" required>
                   
                     </select>
                   <label><i class="fa fa-building"></i></label>
                  </div><br/><br/><br/><br/>



                    <div class="gt_login_field pure-css-select-style theme-filled">
                    <select name="tipo_servicio" id="tipo_servicio" style="font-size:15pt" required>
                    
                     </select> 
                   <label><i class="fa fa-building"></i></label>
                  </div><br/><br/><br/>

                  <div class="gt_login_field pure-css-select-style theme-filled">
                    <select name="movilizacion"  id="movilizacion" style="font-size:15pt" required>
                    <option value="">Tipo de movilización</option>
                    <?php include "select-movilizacion.php"; ?>
                     </select> 
                   <label><i class="fa fa-car"></i></label>
                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 
                  <div class="gt_login_field"  >
                    <input type="text" placeholder="Placa" name="placa" id="placa" class="mayuscula" style="display: none;font-size:20pt">
                    <label><i class="fa fa-building"></i></label>
                  </div>
                  <div class="gt_login_field">
                    <input type="text" placeholder="Descripción" name="descripcion" id="descripcion" style="display: none;font-size:18pt">
                    <label><i class="fa fa-car"></i></label>
                  </div>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
                 
               

                  <div class="gt_login_field">
                    <input type="submit" style="font-size:20px" value="Registrar">
                  </div>
                </div>

               
              </form>
                 <!--fin del formulario de registro de empleado--->
              </div>




              
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
               </script>
               <script type="text/javascript" src="get_habitaciones.js"></script>

          

<script type="text/javascript">
  $('#movilizacion').on('change',function(){
   if($('#movilizacion').val()=='1'||$('#movilizacion').val()=='2'||$('#movilizacion').val()=='5'){
      $('#placa').show();
      $('#descripcion').show();
   }else{
    $('#placa').hide();
    $('#descripcion').hide();
   }
  });



$(document).ready(function(){
  $('#selecttipohabitaciones').on('change',function(){
 if($('#selecttipohabitaciones').val()=='1'||$('#selecttipohabitaciones').val()=='3'){

  $("#tipo_servicio").load('select-tipo-servicio.php');
          
}else{
$("#tipo_servicio").load('select-tipo-servicio2.php');
}

          });

});


</script>

