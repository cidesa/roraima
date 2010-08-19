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

     var articulo=name+"_"+fil+"_1";
     var colexist=name+"_"+fil+"_5";
     var cantsol=name+"_"+fil+"_6";
     var cantaju=name+"_"+fil+"_7";
     var precio=name+"_"+fil+"_8";
     var montaju=name+"_"+fil+"_9";
     var colpaju=name+"_"+fil+"_11";
     var colrped=name+"_"+fil+"_12";
     var colrdes=name+"_"+fil+"_13";
     var total=name+"_"+fil+"_19";
     var prereal=name+"_"+fil+"_16";
     var difpreaju=name+"_"+fil+"_17";
     var colrecc=name+"_"+fil+"_18";

     var solicitida=$(cantsol).value;
     var aajustar=$(id).value;
     var valorcol7=$(cantaju).value;
     var precioart=$(precio).value;
     var precioreal=$(prereal).value;
     var referencia=$('faajuste_codref').value;
     var tipref=$('faajuste_tipaju').value;
     var tipo=$('faajuste_tipo').value;
     var articuloaju=$(articulo).value;
     var canentart=cantidadEntregarArt(fil,articuloaju);

     if ($(articulo).value != ''){
	   if (!validarnumero(id))
	   {
	    alert_('Monto Inv&aacute;lido');
	    $(id).value="0,00";
	   }
	   else
	   {
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cantaju='+id+'&colpaju='+colpaju+'&colrped='+colrped+'&colrdes='+colrdes+'&colexist='+colexist+'&colum7='+cantaju+'&colrecc='+colrecc+'&montaju='+montaju+'&solicit='+solicitida+'&cantsol='+cantsol+'&referencia='+referencia+'&tipref='+tipref+'&articuloaju='+articuloaju+'&mtotal='+total+'&precioart='+precioart+'&precioreal='+precioreal+'&difpreaju='+difpreaju+'&tipo='+tipo+'&cantaju='+cantaju+'&valorcol7='+valorcol7+'&precio='+precio+'&canentart='+canentart+'&codigo='+aajustar})
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
     var id1="ax"+"_"+i+"_19";
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

 function ajaxlote(e,id)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var articulo=name+"_"+fil+"_1";
     var colexist=name+"_"+fil+"_5";
     var colsol=name+"_"+fil+"_6";
     var cantaju=name+"_"+fil+"_7";
     var fecha=name+"_"+fil+"_4";
     var canlote=name+"_"+fil+"_10";

     var numlote=$(id).value;
     var valor6=$(colsol).value;
     var valor7=$(cantaju).value;
     var codalm=$('faajuste_codalm').value;
     var articuloaju=$(articulo).value;

     if ($(id).value != ''){
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&articulo='+articuloaju+'&almacen='+codalm+'&col4='+fecha+'&col5='+colexist+'&col7='+cantaju+'&col10='+canlote+'&cajtexcom='+id+'&valor7='+valor7+'&valor6='+valor6+'&codigo='+numlote})
     }else {
       alert_('N&uacute;mero de Lote Inv&aacute;lido');
       $(id).value="";
     }
   }
  }
