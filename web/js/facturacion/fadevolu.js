 function Cantidad(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var coldev=col;
   var coldes=col-1;
   var colprec=col+1;
   var coltot=col+2;

   var cantdev=name+"_"+fil+"_"+coldev;
   var despachada=name+"_"+fil+"_"+coldes;
   var precio=name+"_"+fil+"_"+colprec;
   var total=name+"_"+fil+"_"+coltot;

   //Obtener el valor de la cantidad a devolver
   var num1=toFloat(id);
   //Obtener el valor de la cantidad despachada
   var num2=toFloat(despachada);
   var num3=toFloat(precio);
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
     }else{
      var calculo=num1*num3;
         $(total).value=format(calculo.toFixed(2),'.',',','.');
         $(id).value=format(num1.toFixed(2),'.',',','.');
         sumardatosgrid();
         }
   }
  }

  function sumardatosgrid()
 {
  var total=0;
   var ww=obtener_filas_grid('a',1);
   var l=0;
   while (l<ww)
   {
      var montot="ax"+"_"+l+"_6";
      var nmontot=toFloat(montot);

      total= total + nmontot;

     l++;
   }
   $('fadevolu_mondev').value=format(total.toFixed(2),'.',',','.');
 }
