function Ver_opcionbuttons()
{
  var modo=$('fcmultas_modo').value;
  if (modo=='E')
  {
  	$('divmonpro').hide();
  }
  else if (modo=='D')
  {
  	$('divmonpro').hide();
  }
  else if (modo=='I')
  {
  	$('divmonpro').show();
  }
}