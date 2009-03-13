function Ver_opcionbuttons()
{
  var modo=$('fcmultas_modo').value;
  if (modo=='P')
  {
  	$('divperiodo').hide();
  	$('divpromedio').hide();
  }
  else if (modo=='M')
  {
  	$('divperiodo').hide();
  	$('divpromedio').hide();
  }
  else if (modo=='T')
  {
  	$('divperiodo').show();
  	$('divpromedio').show();
  }
}


