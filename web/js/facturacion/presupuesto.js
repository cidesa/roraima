 function Cantidad(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcant=col;
   var colprecio=col+1;
   var colrgo=col+2;
   var coldescto=col+3;
   var coltotal=col+4;
   var colporcrgo=col+6;

   var cantto=name+"_"+fil+"_"+colcant;
   var precio=name+"_"+fil+"_"+colprecio;
   var recargo=name+"_"+fil+"_"+colrgo;
   var descto=name+"_"+fil+"_"+coldescto;
   var total=name+"_"+fil+"_"+coltotal;
   var porcrgo=name+"_"+fil+"_"+colporcrgo;

   var index=$(precio).selectedIndex;
   //Obtener el valor del precio
   var num1=$(precio).options[index].text;
   //Obtener el valor de la cantidad
   num1 = num1.replace(".","");
   num1 = num1.replace(",",".");

   var num2=toFloat(id);

   //Obtener el valor del descuento
   var num4=toFloat(descto);
   //Obtener el valor del porcentaje de recargo
   var num5=toFloat(porcrgo);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
    $(recargo).value="0,00";
    $(descto).value="0,00";
    $(total).value="0,00";
   }
   else if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   else
   {
    $(cantto).value=format(num2.toFixed(2),'.',',','.');
    $(descto).value=format(num4.toFixed(2),'.',',','.');
    if ((validarnumero(precio))&&(num1 > 0))
    {

     $(recargo).value = (num2*num1)*(num5/100);
     //Obtener el valor del recargo
     var num3=$(recargo).value;
     $(recargo).value=format(parseFloat($(recargo).value).toFixed(2),'.',',','.');
     var costototal=((parseFloat(num2)*parseFloat(num1))+parseFloat(num3))-parseFloat(num4);
     if (costototal < 0)
     	costototal = 0;
     $(total).value=format(costototal.toFixed(2),'.',',','.');
     monto_recargo()
     monto_descto();
     monto_total();
    }
   }
  }

 function Descuento(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcant=col-3;
   var colprecio=col-2;
   var colrgo=col-1;
   var coldescto=col;
   var coltotal=col+1;
   var colporcrgo=col+3;


   var cantto=name+"_"+fil+"_"+colcant;
   var precio=name+"_"+fil+"_"+colprecio;
   var recargo=name+"_"+fil+"_"+colrgo;
   var descto=name+"_"+fil+"_"+coldescto;
   var total=name+"_"+fil+"_"+coltotal;
   var porcrgo=name+"_"+fil+"_"+colporcrgo;

   var index=$(precio).selectedIndex;
   //Obtener el valor del precio
   var num1=$(precio).options[index].text;
   num1 = num1.replace(".","");
   num1 = num1.replace(",",".");

   //Obtener el valor de la cantidad
   var num2=toFloat(cantto);

   //Obtener el valor del descuento
   var num4=toFloat(id);
   //Obtener el valor del porcentaje de recargo
   var num5=toFloat(porcrgo);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }
   else if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   else
   {
    $(cantto).value=format(num2.toFixed(2),'.',',','.');
    $(descto).value=format(num4.toFixed(2),'.',',','.');
    if ((validarnumero(precio))&&(num1 > 0))
    {
     $(recargo).value = (num2*num1)*(num5/100);
     //Obtener el valor del recargo
     var num3=$(recargo).value;
     $(recargo).value=format(parseFloat($(recargo).value).toFixed(2),'.',',','.');

     var costototal=((parseFloat(num2)*parseFloat(num1))+parseFloat(num3))-parseFloat(num4);
     if (costototal < 0)
     	costototal = 0;
     $(total).value=format(costototal.toFixed(2),'.',',','.');
     monto_recargo()
     monto_descto();
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
     var id1="ax"+"_"+i+"_7";
     if ($(id1).value!="" && validarnumero(id1))
     {
       tot=toFloat(id1);
       acum=acum + tot;
     }
     i++;
    }
    $('fapresup_monpre').value=format(acum.toFixed(2),'.',',','.');
  }

  function monto_descto()
  {
    var acum=0;
    var fil=totalregistros('ax',1,30);
    var i=0;
    while (i<fil)
    {
     var id1="ax"+"_"+i+"_6";
     if ($(id1).value!="" && validarnumero(id1))
     {
       tot=toFloat(id1);
       acum=acum + tot;
     }
     i++;
    }
    $('fapresup_mondesc').value=format(acum.toFixed(2),'.',',','.');
  }

  function monto_recargo()
  {
    var acum=0;
    var fil=totalregistros('ax',1,30);
    var i=0;
    while (i<fil)
    {
     var id1="ax"+"_"+i+"_5";
     if ($(id1).value!="" && validarnumero(id1))
     {
       tot=toFloat(id1);
       acum=acum + tot;
     }
     i++;
    }
    $('fapresup_monrgo').value=format(acum.toFixed(2),'.',',','.');
  }

 function Precio(id)
 {

   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcant=col-1;
   var coltotal=col+3;
   var coldescto=col+2;
   var colrgo=col+1;
   var colporcrgo=col+5;
   var colpresel=col+6;

   var cant=name+"_"+fil+"_"+colcant;
   var total=name+"_"+fil+"_"+coltotal;
   var descto=name+"_"+fil+"_"+coldescto;
   var recargo=name+"_"+fil+"_"+colrgo;
   var porcrgo=name+"_"+fil+"_"+colporcrgo;
   var presel=name+"_"+fil+"_"+colpresel;


   var index=$(id).selectedIndex;
   //Obtener el valor del precio
   var num1=$(id).options[index].text;
   num1 = num1.replace(".","");
   num1 = num1.replace(",",".");

   //Obtener el valor de la cantidad
   var num2=toFloat(cant);
   //Obtener el valor del descuento
   var num4=toFloat(descto);
   //Obtener el valor del porcentaje de recargo
   var num5=toFloat(porcrgo);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }
   else if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   else
   {
    if (validarnumero(id))
    {
     $(presel).value = num1;
     $(recargo).value = (num2*num1)*(num5/100);
     //Obtener el valor del recargo
     var num3=$(recargo).value;
     $(recargo).value=format(parseFloat($(recargo).value).toFixed(2),'.',',','.');

     var costototal=((parseFloat(num2)*parseFloat(num1))+parseFloat(num3))-parseFloat(num4);
     if (costototal < 0)
     	costototal = 0;
     $(total).value=format(costototal.toFixed(2),'.',',','.');
     monto_recargo()
     monto_descto();
     monto_total();
    }
   }
  }


 function ajaxarticulos(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var colpre=col+3;
    var colporcrgo=col+8;
    var descripcion=name+"_"+fil+"_"+coldes;
    var precio=name+"_"+fil+"_"+colpre;
    var porcrecargo=name+"_"+fil+"_"+colporcrgo;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
        new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&cajtexmos='+porcrecargo+'&cajtexcom='+id+'&codigo='+cod})
        new Ajax.Updater(precio, getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&id='+$('id').value+'&codigo='+cod});
      }
    }
 }

 function cargaprecio()
 {
    var colart = '';
    var colpre = '';
    //var colpresel = '';
    var colrgo = '';
    var cod = '';
    var precio = '';
    var nrofilas = 0;
    if (($('nrofilas').value != '')&&($('nrofilas').value != 'NaN'))
    	nrofilas = parseInt($('nrofilas').value);
    for (fil=0 ;fil<= nrofilas;fil++){
		colart = "ax_"+fil+"_1";
		colpre = "ax_"+fil+"_4";
		//colpresel = "ax_"+fil+"_10";
		colrgo = "ax_"+fil+"_9";
		if ($(colart).value != ''){
			cod = $(colart).value;
			//precio = $(colpresel).value;
	        new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&cajtexmos='+colrgo+'&codigo='+cod})
	        new Ajax.Updater(colpre, getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&id='+precio+'&codigo='+cod});
		}
    }
 }
