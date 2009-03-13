 function Cantidad(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var coldev=col;
   var coldes=col-1;

   var cantdev=name+"_"+fil+"_"+coldev;
   var despachada=name+"_"+fil+"_"+coldes;

   //Obtener el valor de la cantidad a devolver
   var num1=toFloat(id);
   //Obtener el valor de la cantidad despachada
   var num2=toFloat(despachada);
   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }
   else if (num1<=0)
   {
    alert('El valor debe ser mayor que cero');
   }
   else
   {
     if (num1 > num2){
		alert('La Cantidad a Devolver no puede ser mayor a la Cantidad Despachada');
	    $(id).value="0,00";
     }
   }
  }
