 function cantidadaju(id)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     var aux = id.split("_");
	 var name=aux[0];
	 var fil=aux[1];
	 var col=parseInt(aux[2]);

	 var colart=col-3;
	 var colcansol=col-1;
     var colprecio=col+1;
     var coltotal=col+2;

     var articulo=name+"_"+fil+"_"+colart;
     var cantsol=name+"_"+fil+"_"+colcansol;
     var precio=name+"_"+fil+"_"+colprecio;
     var total=name+"_"+fil+"_"+coltotal;

     var solicitida=$(cantsol).value;
     var aajustar=$(id).value;
     var precioart=$(precio).value;
     var referencia=$('faajuste_refaju').value;
     var tipref=$('faajuste_tipaju').value;
     var articuloaju=$(articulo).value;
     var canentart=cantidadEntregarArt(fil,articuloaju);

     if ($(art).value != ''){
	   if (!validarnumero(id))
	   {
	    alert_('Monto Inv&aacute;lido');
	    $(id).value="0,00";
	   }
	   else
	   {
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cantaju='+id+'&solicit='+solicitida+'&cantsol='+cantsol+'&referencia='+referencia+'&tipref='+tipref+'&articuloaju='+articuloaju+'&mtotal='+total+'&precioart='+precioart+'&canentart='+canentart+'&codigo='+aajustar})
	   }
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

   function cantidadEntregarArt(fil,codart)
 {
   var cant_entreg=0;
   var am=totalregistros('ax',1,30);
   var i=0;
   while (i<am)
   {
    var codart="ax"+"_"+i+"_1";
    var canaju="ax"+"_"+i+"_7";
    var ncanaju=toFloat(canaju);

     if (i!=fil)
     {
       if ($(codart).value==codart)
       {
           cant_entreg= cant_entreg + ncanaju;
       }
     }
    i++;
   }

   return cant_entreg;
 }
