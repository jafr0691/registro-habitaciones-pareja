

<script type="text/javascript">

 

function validateMail(correo)
{
  //Creamos un objeto 
 object=document.getElementById(correo);
  valueForm=object.value;
   
 
  // Patron para el correo
  var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  if(valueForm.search(patron)==0)
  {
    //Mail correcto
    object.style.color="#ffffff";
    return;
  } 

  
  //Mail incorrecto
  object.style.color="#f00";


  return true;
  
}






 




//-->
</script>
              


               <div class="tab-pane" id="login">
                 <!--formulario de registro de empleado--->
              <form method="POST" role="form" action="script-guarda-empleado2.php">
                <div class="gt_login_des_wrap default_width">
                  <div class="gt_login_field">
                    <input type="text" placeholder="Nombres" name="nombre" id ="nombres" style="font-size:20px" onkeypress="return sololetras(event)" required>
                    <label><i class="fa fa-user"></i></label>
                  </div>
                  <div class="gt_login_field">
                    <input type="text" placeholder="Apellidos" name="apellido" id ="apellido" style="font-size:20px" onkeypress="return sololetras(event)" required>
                    <label><i class="fa fa-user"></i></label>
                  </div>
                  <div class="gt_login_field">
                    <input type="text" placeholder="Nombre de usuario" id="correo" name="correo" style="font-size:20px" onKeyUp="javascript:validateMail('correo')" required>
                    <label><i class="fa fa-user"></i></label>
                    <span id="emailOK"></span>
                  </div>
             
                  <div class="gt_login_field">
                    <input type="password" placeholder="Contraseña" name="clave" style="font-size:20px" required>
                    <label><i class="icon-lock"></i></label>
                  </div>
                  <div class="gt_login_field pure-css-select-style theme-filled">
                    <select name="id_perfil" id="opciones" style="font-size:15pt" required="required">
                    <option value="">Seleccione el cargo</option>
                    <?php include "select-perfil-admin.php"; ?>
                     </select>
                   <label><i class="fa fa-user"></i></label>
                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="gt_login_field">
                    <button   id="enviar" style="font-size:20px">Registrar</button>
                  </div>
                </div>
              </form>
                 <!--fin del formulario de registro de empleado--->
              </div>

              