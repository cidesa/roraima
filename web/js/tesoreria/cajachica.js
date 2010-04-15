function totalizarMonto(e)
{
  if (e.keyCode==13 || e.keyCode==9)
  {
    var montotot=0;
    var montorec=0;
    var am=totalregistros('ax',1,25);
    var i=0;
    while (i<am)
    {
      var id1="ax"+"_"+i+"_4";
      var id2="ax"+"_"+i+"_5";
      var id3="ax"+"_"+i+"_6";

      var nid1=toFloat(id1);
      var nid2=toFloat(id2);

      if (validarnumero(id1))
	  {
        montotot= montotot + nid1;
	  }
	  else $(id1).value="0,00";

	  if (validarnumero(id2))
	  {
        montorec= montorec + nid2;
	  }
	  else $(id2).value="0,00";

	  var cal=nid1+nid2;
	  $(id3).value=format(cal.toFixed(2),'.',',','.');

     i++;
    }
    var cal2=montotot + montorec;
    $('tssalcaj_monsal').value=format(cal2.toFixed(2),'.',',','.');
  }
}


 function perderfocus(e,id,totcol)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   if (col!=totcol)
   {
    var colsig=col+1;
    var siguiente=name+"_"+fil+"_"+colsig;
   }
   else
   {
    var fila=fil+1;
   	var siguiente=name+"_"+fila+"_1";
   }

   if (e.keyCode==13 || e.keyCode==9)
   {
     if($(siguiente))
     {
      if (!$(siguiente).readOnly) $(siguiente).focus();
     }
   }
  }

 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('tssalcaj_refsal').value=valor;
   }
 }

 function enter1(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('opordpag_numord').value=valor;
   }
 }

  function articulo_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var articulo=$(id).value;

   var articulorepetido=false;
   var am=totalregistros('ax',1,25);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var articulo2=$(codigo).value;

    if (i!=fila)
    {
      if (articulo==articulo2)
      {
        articulorepetido=true;
        break;
      }
    }
   i++;
   }
   return articulorepetido;
 }


 function ajaxarticulos(e,id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var colmonto=col+3;
    var colpar=col+6;

    var descripcion=name+"_"+fil+"_"+coldes;
    var monto=name+"_"+fil+"_"+colmonto;
    var partida=name+"_"+fil+"_"+colpar;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        if (!articulo_repetido(id))
        {
          new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&monto='+monto+'&partida='+partida+'&cajtexcom='+id+'&codigo='+cod})
        }
        else
        {
          alert('Código del Artículo está Repetido');
          $(id).value="";
        }
      }
    }
 }

  function anular()
  {
   if ($('opordpag_numcom').value!="")
    {
     var referencia="RE"+$('opordpag_numcom').value.substr(2,6);
    }
    else
    {
     var referencia=$('opordpag_numord').value;
    }

    var numord=$('opordpag_numord').value;
    var fecemi=$('opordpag_fecemi').value;
    window.open(getUrlModulo()+'anular?numord='+numord+'&referencia='+referencia+'&fecemi='+fecemi,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }

 function ajaxcuentas(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var descripcion=name+"_"+fil+"_"+coldes;
   var cod=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
     if ($(id).value!="")
     {
        if (!cuenta_repetida(id))
        {
          new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
        }
        else
        {
          alert('La Cuenta Contable está Repetida');
          $(id).value="";
        }
      }
    }
 }

  function ajaxcuentas2(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var descripcion=name+"_"+fil+"_"+coldes;
   var cod=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
     if ($(id).value!="")
     {
      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
     }
    }
 }

 function cuenta_repetida(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var cuenta=$(id).value;

   var cuentarepetida=false;
   var am=totalregistros('ax',1,30);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var cuenta2=$(codigo).value;

    if (i!=fila)
    {
      if (cuenta==cuenta2)
      {
        cuentarepetida=true;
        break;
      }
    }
   i++;
   }
   return cuentarepetida;
 }

 function totalfil(fil)
 {
  var filas=parseInt(fil);
  var i=0;
  var total=0;
  while (i<filas)
  {
    var monto="ax_"+i+"_2";
    var nmonto=toFloat(monto);

    total =  total + nmonto;
    $(monto).value=format(nmonto.toFixed(2),'.',',','.');

  	i++;
  }
  $('opordpag_monord').value=format(total.toFixed(2),'.',',','.');
 }

 function ajaxcategoria(e,id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colpar=col+4;
     var parti=name+"_"+fil+"_"+colpar;
     var partida=$(parti).value;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&partida='+partida+'&cajtexcom='+id+'&codigo='+cod})
      }
    }
 }