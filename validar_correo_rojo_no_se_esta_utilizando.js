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

</script>