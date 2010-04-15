 function Cantidad(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcant=col;
   var colprecio=col+5;
   var coltotal=col+8;
   var colsol=col-1;
   var colart=col-3;
   var colcodalm=col-5;

   var cantto=name+"_"+fil+"_"+colcant;
   var precio=name+"_"+fil+"_"+colprecio;
   var total=name+"_"+fil+"_"+coltotal;
   var solicitada=name+"_"+fil+"_"+colsol;
   var articulo=name+"_"+fil+"_"+colart;
   var alm=name+"_"+fil+"_"+colcodalm;


   //Obtener el valor del precio
   var num1=toFloat(precio);
   //Obtener el valor de la cantidad
   var num2=toFloat(id);
   //Obtener el valor de la cantidad solicitada
   var num3=toFloat(solicitada);
   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
    $(total).value="0,00";
   }
   else if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   else
   {
     if (($(articulo).value != '')&&($(alm).value == '')){
	 	alert_('Debe seleccionar el almac&eacute;n');
	    $(id).value="0,00";
	    $(total).value="0,00";
	    return false;
	 }

     if (num2 > num3){
		alert('La Cantidad a Entregar no puede ser mayor a la Cantidad Solicitada');
	    $(id).value="0,00";
	    $(total).value="0,00";
     }
     else{

	    $(cantto).value=format(num2.toFixed(2),'.',',','.');
	    if ((validarnumero(precio))&&(num1 > 0))
	    {

	     var costototal=parseFloat(num2)*parseFloat(num1);
	     if (costototal < 0)
	     	costototal = 0;
	     $(total).value=format(costototal.toFixed(2),'.',',','.');
	     monto_total();
	     validaAlmacen(cantto, articulo, solicitada);


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
     var id1="ax"+"_"+i+"_14";
     if ($(id1).value!="" && validarnumero(id1))
     {
       tot=toFloat(id1);
       acum=acum + tot;
     }
     i++;
    }
    $('fanotent_monnot').value=format(acum.toFixed(2),'.',',','.');
  }

  function validaAlmacen(id, codart, solicitada){
   var index=$('fanotent_tipref').selectedIndex;
   var tipref=$('fanotent_tipref').options[index].value;
   new Ajax.Updater(id, getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&codalm='+$('fanotent_codalm').value+'&codart='+$(codart).value+'&canent='+$(id).value+'&tipref='+tipref+'&codref='+$('fanotent_codref').value+'&cansol='+$(solicitada).value});
  }
