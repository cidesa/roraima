////
 function importante()
 {
   f=document.sf_admin_edit_form;
   f.action="/nomina_dev.php/nomnomcienomesp/realizarcierre";
   f.submit();
 }

 function cerrar()
 {
  if ($('valida').value=='N')
  {
    $('importante').show();
    $('mensajes').hide();
  }
  else if ($('valida').value=='S')
  {
   alert('Ya la Nómina fue cerrada con esa fecha');
  }
 }