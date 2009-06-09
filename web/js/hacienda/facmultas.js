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

function Sumar_dias(id)
{
    var aux  = id.split("_");
    var name = aux[0];//ax
    var datos = 0;
    var fil  = parseInt(aux[1]);
    var filsig  = parseInt(aux[1])+1;
    var filant  = parseInt(aux[1])-1;
    var col  = parseInt(aux[2])+1;
    if (fil==0)
    {
		var dia = name+"_"+fil+"_"+2;
    }
    else
    {
		var dia = name+"_"+filant+"_"+2;
    }
    var dia_siguiente = name+"_"+fil+"_"+1;
    var dia=toFloat(dia);
    if (dia!="")
    {
	    dias = 1 + dia;
	    $(dia_siguiente).value = dias;
    }
}
