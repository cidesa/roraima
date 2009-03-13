 function Cantidad(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colaju=col+1;
   var colsol=col-1;
   var colent=col;
   var colprecio=col+3;
   var coltotal=col+2;
   var colart=col-3;

   var cantaju=name+"_"+fil+"_"+colaju;
   var cantent=name+"_"+fil+"_"+colent;
   var precio=name+"_"+fil+"_"+colprecio;
   var total=name+"_"+fil+"_"+coltotal;
   var art=name+"_"+fil+"_"+colart;
   var cantsol=name+"_"+fil+"_"+colsol;

   if ($(art).value != ''){
	   //Obtener el valor de la cantidad a entregar
	   var num1=toFloat(id);
	   //Obtener el valor de la cantidad solicitada
	   var num2=toFloat(cantsol);
	   //Obtener el valor del precio
	   var num3=toFloat(precio);

	   if (!validarnumero(id))
	   {
	    alert_('Monto Inv&aacute;lido');
	    $(id).value="0,00";
	   }
	   else
	   {
	     var ajustada = parseFloat(num1) - parseFloat(num2);
	     $(cantaju).value=format(ajustada.toFixed(2),'.',',','.');
	     var costototal=parseFloat(ajustada)*parseFloat(num3);
	     $(total).value=format(costototal.toFixed(2),'.',',','.');
	     monto_total();
	   }

   }
  }

  function monto_total()
  {
    var acum=0;
    var fil=totalregistros('ax',1,30);
    var i=0;
    while (i<fil)
    {
     var id1="ax"+"_"+i+"_6";
     var valor = $(id1).value;
     valor = valor.replace(".","");
     valor = valor.replace(",",".");
     if (valor!="")
     {
       acum=acum + parseFloat(valor);
     }
     i++;
    }
    $('faajuste_monaju').value=format(acum.toFixed(2),'.',',','.');
  }
