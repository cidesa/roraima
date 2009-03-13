function costocacotiza(e,id)
{
 if (e.keyCode==13)
 {
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var cant=name+"_"+fil+"_"+'3';
  var costo=name+"_"+fil+"_"+'4';
  var dscto=name+"_"+fil+"_"+'5';
  var total=name+"_"+fil+"_"+'6';

  //Obtener el valor de la cantidad
   var num1=toFloat(cant);
  //Obtener el valor del costo
   var num2=toFloat(costo);
  //Obtener el valor del Descuento
   var num3=toFloat(dscto);

   var  montotal=(num1*num2)-num3;

   $(total).value=format(montotal.toFixed(2),'.',',','.');

   actualizarsaldos();

   var num4=toFloat('cacotiza_monrec');
   var num5=toFloat('totales');

   var montot=num5+num4;

	$('cacotiza_moncot').value=format(montot.toFixed(2),'.',',','.');

	}

}