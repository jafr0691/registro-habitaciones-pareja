$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'select_tipo_habitaciones.php'
  })
  .done(function(selectotipohab){
    $('#selecttipohabitaciones').html(selectotipohab)
  })
  .fail(function(){
    alert('Hubo un error al cargar la lista de tipos de habitaciones')
  })

  $('#selecttipohabitaciones').on('change', function(){
    var idnumerohabitaciones = $('#selecttipohabitaciones').val()
    $.ajax({
      type: 'POST',
      url: 'select_numero_habitaciones.php',
      data: {'idnumerohabitaciones': idnumerohabitaciones}
    })
    .done(function(selectotipohab){
      $('#selectnumerohabitaciones').html(selectotipohab)
    })
    .fail(function(){
      alert('Hubo un error al cargar la lista de numeros de habitaciones')
    })
  })
  




})