function actualizarfecha(id)
{
  var fecha=$(id).value;
  var idmovlib=$('nromovlib').value;
  var cadenaact=$('cadfecban').value;
  var aux2=cadenaact.split("!");

  var z=0;
  var cadena="";
  var encontro=false;
  while (z<((aux2.length)-1))
    {
      var reg=aux2[z];
      var aux3=reg.split("_");
      var cid=aux3[0];
      var cfecha=aux3[1];
      if (cid==idmovlib)
	  {
	    cfecha=fecha;
	    encontro=true;
	  }
      cadena=cadena + cid+'_' + cfecha + '!'
      z++;
    }
   if (!encontro)
     var cadena=cadenaact + idmovlib+'_' + fecha + '!';
  $('cadfecban').value=cadena;
}
