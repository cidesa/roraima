  function CalculoConstruccion(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var cant  = name+"_"+fil+"_"+4;
   var valor = name+"_"+fil+"_"+5;
   var total = name+"_"+fil+"_"+6;

   var num1=toFloat(cant);
   var num2=toFloat(valor);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }

   if ($F(id)<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   costototal=(num2*num1);

   //$(total).value=format(costototal.toFixed(2),'.',',','.');
   $(total).value=FloattoFloatVE(costototal);

//   totalizargrid();

  }

  function CalculoTerreno(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var dimen  = name+"_"+fil+"_"+4;
   var valor = name+"_"+fil+"_"+5;
   var total = name+"_"+fil+"_"+6;

   var num1=toFloat(dimen);
   var num2=toFloat(valor);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }

   if ($F(id)<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   costototal=(num2*num1);

   //$(total).value=format(costototal.toFixed(2),'.',',','.');
   $(total).value=FloattoFloatVE(costototal);

//   totalizargrid();

  }