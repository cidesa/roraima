// Registro de Obras
  function ajaxpartida(e,id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var coluni=col+2;
   var colcos=col+5;
   var descripcion=name+"_"+fil+"_"+coldes;
   var unidad=name+"_"+fil+"_"+coluni;
   var costo=name+"_"+fil+"_"+colcos;
   var cod=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
    if ($(id).value!="" && $('id').value=='')
    {
     new Ajax.Request('/obras_dev.php/oycdesobr/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&cajtexmos='+descripcion+'&cajtexcom='+id+'&unidad='+unidad+'&costo='+costo+'&codigo='+cod})
    }
   }
  }

 function Cantidad(e,id)
 {
  if (e.keyCode==13)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcosto=col+2;
   var coltotal=col+3;

   var costo=name+"_"+fil+"_"+colcosto;
   var total=name+"_"+fil+"_"+coltotal;

   var num1=toFloat(id);
   var num2=toFloat(costo);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }

   if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   costototal=(num2*num1);

   $(total).value=format(costototal.toFixed(2),'.',',','.');

   totalizargrid();

   }
  }

  function Total(e,id)
 {
  if (e.keyCode==13)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcantidad=col-2;
   var coltotal=col+1;

   var cantidad=name+"_"+fil+"_"+colcantidad;
   var total=name+"_"+fil+"_"+coltotal;

   var num1=toFloat(id);
   var num2=toFloat(cantidad);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }

   if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   costototal=(num1*num2);

   $(total).value=format(costototal.toFixed(2),'.',',','.');

   totalizargrid();

   }
 }

 function totalizargrid()
 {
   var acumulador=0;
   var totreg=totalregistros('ax',1,50);
   var l=0;
   while (l<totreg)
   {
    var montot="ax"+"_"+l+"_7";
    var num1=toFloat(montot);

     if (num1>0)
     {
       acumulador= acumulador + num1;
     }
   l++;
   }

   $('ocregobr_subtot').value=format(acumulador.toFixed(2),'.',',','.');
   var numiva=toFloat('ocregobr_ivaobr');
   if (numiva>0)
   {
     var totiva=((acumulador*numiva)/100);
     $('ocregobr_moniva').value=format(totiva.toFixed(2),'.',',','.');
     var numiva2=toFloat('ocregobr_moniva');
     var subtotal=toFloat('ocregobr_subtot');
     var calcular=  subtotal + numiva2;

     $('ocregobr_monobr').value=format(calcular.toFixed(2),'.',',','.');
   }
   else
   {
    alert('Debe Colocar el Monto de IVA aplicado al Contrato');
    $('ocregobr_ivaobr').focus();
   }
 }
//Registro de Contratistas

  function ajaxrecaudo(e,id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var descripcion=name+"_"+fil+"_"+coldes;
   var tiprec=$('caprovee_codtiprec').value;
   var cod=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
    if ($(id).value!="")
    {
     new Ajax.Request('/obras_dev.php/oycregpro/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&cajtexmos='+descripcion+'&cajtexcom='+id+'&tiporec='+tiprec+'&codigo='+cod})
    }
   }
  }

  function ajaxpersonal(e,id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var colprof=col+2;
   var colcar=col+3;
   var descripcion=name+"_"+fil+"_"+coldes;
   var profesion=name+"_"+fil+"_"+colprof;
   var cargo=name+"_"+fil+"_"+colcar;
   var cod=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
    if ($(id).value!="")
    {
     new Ajax.Request('/obras_dev.php/oycregpro/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&cajtexmos='+descripcion+'&cajtexcom='+id+'&profe='+profesion+'&cargo='+cargo+'&codigo='+cod})
    }
   }
  }
//Registro de Contrato
  function calcular_contratro()
  {
       var moncon=toFloat('ocregcon_moncon');
       var monext=toFloat('ocregcon_monext');
       var monmul=toFloat('ocregcon_monmul');
       var monmod=toFloat('ocregcon_monmod');

       var total=moncon+monext-monmul+monmod;

       $('ocregcon_monful').value=format(total.toFixed(2),'.',',','.');

  }
//Registro de Inspecciones
  function ajaxpartidains(e,id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var coluni=col+2;
   var colcon=col+3;
   var colcont=col+6;
   var descripcion=name+"_"+fil+"_"+coldes;
   var unidad=name+"_"+fil+"_"+coluni;
   var cancon=name+"_"+fil+"_"+colcon;
   var numcont=name+"_"+fil+"_"+colcont;
   var cod=$(id).value;
   var contrato=$('ocinscon_codcon').value;

   if (e.keyCode==13 || e.keyCode==9)
   {
    if ($(id).value!="" && $('id').value=="")
    {
     new Ajax.Request('/obras_dev.php/oycinscon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&cajtexmos='+descripcion+'&cajtexcom='+id+'&unidad='+unidad+'&cancon='+cancon+'&contrato='+contrato+'&numcont='+numcont+'&codigo='+cod})
    }
   }
  }

  function ejecutado(e,id)
  {

   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var colcon=col-1;
   var cancon=name+"_"+fil+"_"+colcon;

   if (e.keyCode==13 || e.keyCode==9)
   {
       var moncon=toFloat(cancon);
       var moneje=toFloat(id);
       if (moneje > moncon)
       {
         alert('La cantidad ejecuta no puede ser mayor a la contrada');
       }
   }
  }
//Registro de Obras

  function ajaxinsobr(e,id)
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
     new Ajax.Request('/obras_dev.php/oycdesobr/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
    }
   }
  }
//Registro del Contrato

  function cargarpartidas()
  {
    if(confirm_("Se asignaran todas las partidas a este contrato"))
    {
      var obra=$('ocregcon_codobr').value;
      new Ajax.Updater('partida', '/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos=ocregcon_nompro&cajtexcom=ocregcon_codpro&obra='+obra});

      totales_partidas();

    }
  }

  function ajaxretencion(e,id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var colporret=col+2;
   var colbasimp=col+3;
   var colunitri=col+4;
   var colfactor=col+5;
   var colporsus=col+6;
   var colstamon=col+7;

   var descripcion=name+"_"+fil+"_"+coldes;
   var porret=name+"_"+fil+"_"+colporret;
   var baseimp=name+"_"+fil+"_"+colbasimp;
   var unidadtri=name+"_"+fil+"_"+colunitri;
   var factor=name+"_"+fil+"_"+colfactor;
   var porcensus=name+"_"+fil+"_"+colporsus;
   var estatus=name+"_"+fil+"_"+colstamon;
   var cod=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
    if ($(id).value!="")
    {
     new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), lostfocus_col3(id);}, parameters:'ajax=5&cajtexmos='+descripcion+'&cajtexcom='+id+'&porret='+porret+'&baseimp='+baseimp+'&unidadtri='+unidadtri+'&factor='+factor+'&porsus='+porcensus+'&estatus='+estatus+'&codigo='+cod})
    }
   }
  }

  function ajaxingresidentes(e,id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var descripcion=name+"_"+fil+"_"+coldes;
   var codpro=$('ocregcon_codpro').value;
   var cod=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
    if ($(id).value!="")
    {
     new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&cajtexmos='+descripcion+'&cajtexcom='+id+'&codpro='+codpro+'&codigo='+cod})
    }
   }
  }

  function cantidadofer(e,id)
 {
  if (e.keyCode==13)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcosto=col+1;
   var coltotal=col+2;

   var costo=name+"_"+fil+"_"+colcosto;
   var total=name+"_"+fil+"_"+coltotal;

   var num1=toFloat(id);
   var num2=toFloat(costo);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }

   if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   costototal=(num2*num1);

   $(total).value=format(costototal.toFixed(2),'.',',','.');

   }
  }

  function preciofer(e,id)
 {
  if (e.keyCode==13)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcantidad=col-1;
   var coltotal=col+1;

   var cantidad=name+"_"+fil+"_"+colcantidad;
   var total=name+"_"+fil+"_"+coltotal;

   var num1=toFloat(id);
   var num2=toFloat(cantidad);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }

   if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   costototal=(num1*num2);

   $(total).value=format(costototal.toFixed(2),'.',',','.');

   }
 }

  function totales_partidas()
  {
    if ($('ocregcon_tieejecon').value!='')
    {
      var totacon=toFloat('ocregcon_totales');
      var num2=toFloat('ocregcon_poriva');
      $('ocregcon_subtot').value=format(totacon.toFixed(2),'.',',','.');
      var cal=((totacon*num2)/100);
      $('ocregcon_moniva').value=format(cal.toFixed(2),'.',',','.');
      var num3=toFloat('ocregcon_moniva');

      var calculo=totacon + num3;
      $('ocregcon_totcon').value=format(calculo.toFixed(2),'.',',','.');
      $('ocregcon_moncon').value=format(calculo.toFixed(2),'.',',','.');

      var contrato=$('ocregcon_codcon').value;
      var montotot=$('ocregcon_totales').value;

      new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&contrato='+contrato+'&montotal='+montotot})
      calcular_contratro();
    }
  }

  function calcular_total_dias()
  {
   if (!validarnumero('ocregcon_tieejecon'))
   {
    alert_('Monto Inv&aacute;lido');
    $('ocregcon_tieejecon').value="0,00";
   }
   else
   {
     if ($('ocregcon_fecini').value.substring(0,1)!='')
     {
       if ($('ocregcon_tieejecon').value!='')
       {
         var cmbplatie=$('ocregcon_platie').value;
         var tieeje=$('ocregcon_tieejecon').value;
         var fecini=$('ocregcon_fecini').value;
         new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&cmbplatie='+cmbplatie+'&tieeje='+tieeje+'&fecini='+fecini})
       }
       else
       {
        alert_('Debe Introducir el Tiempo de Ejecuci&oacute;n del Contrato');
       }
     }
     totales_partidas();
   }
  }

  function lostfocus_licitacion()
  {
	 var fec=$('ocregcon_feclic').value;
	 var fecha=fec.split("/");
 	 var fecval=fecha[1]+"/"+fecha[0]+"/"+fecha[2];
 	 var signo='<';

	 var fec1=$('ocregcon_feccon').value;

     if ($('ocregcon_feclic').value!='')
     {
	   if (!(isDate(fecval)))
	   {
	     alert_('La Fecha de la Licitaci&oacute;n es Inv&aacute;lida');
	     $('ocregcon_feclic').value='';
         $('ocregcon_feclic').focus();
	   }
	   else
	   {
         if ($('ocregcon_feccon').value!='')
         {
	       var msjes='La Fecha de la Licitacion es Invalida debe ser menor a la Fecha de Contratacion';
	       new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecha1='+fec+'&signo='+signo+'&msj='+msjes+'&blanco=ocregcon_feclic&fecha2='+fec1})
         }
	   }
     }
  }

  function lostfocus_buenapro()
  {
	 var fec=$('ocregcon_feclic').value;

	 var fec1=$('ocregcon_fecbuepro').value;
	 var fecha1=fec1.split("/");
 	 var fecval=fecha1[1]+"/"+fecha1[0]+"/"+fecha1[2];

	 var fec2=$('ocregcon_feccon').value;

     if ($('ocregcon_fecbuepro').value!='')
     {
	   if (!(isDate(fecval)))
	   {
	     alert_('La Fecha Otorg. Buena Pro es Inv&aacute;lida');
	     $('ocregcon_fecbuepro').value='';
	     $('ocregcon_fecbuepro').focus();
	   }
	   else if ($('ocregcon_feclic').value!='')
       {
	       var signo='>';
	       var msjes='La Fecha de Otorg. Buena Pro Invalida debe ser mayor a la Fecha de Licitacion';
	       new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecha1='+fec1+'&signo='+signo+'&msj='+msjes+'&blanco=ocregcon_fecbuepro&fecha2='+fec})
       }
       else  if ($('ocregcon_feccon').value!='')
       {
         var signo='<';
	     var msjes='La Fecha de Otorg. Buena Pro Invalida debe ser menor a la Fecha de Contratacion';
	     new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecha1='+fec1+'&signo='+signo+'&msj='+msjes+'&blanco=ocregcon_fecbuepro&fecha2='+fec2})
       }
	 }
  }

  function lostfocus_contratacion()
  {
	 var fec=$('ocregcon_feclic').value;
	 var fec1=$('ocregcon_fecbuepro').value;


	 var fec2=$('ocregcon_feccon').value;
	 var fecha2=fec2.split("/");
	 var fecval=fecha2[1]+"/"+fecha2[0]+"/"+fecha2[2];

     if ($('ocregcon_feccon').value!='')
     {
	   if (!(isDate(fecval)))
	   {
	     alert_('La Fecha de Contrataci&oacute;n es Inv&aacute;lida');
	     $('ocregcon_feccon').value='';
	     $('ocregcon_feccon').focus();
	   }
	   else if ($('ocregcon_feclic').value!='')
       {
	       var signo='>';
	       var msjes='La Fecha de Contratacion Invalida debe ser mayor a la Fecha de Licitacion';
	       new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecha1='+fec2+'&signo='+signo+'&msj='+msjes+'&blanco=ocregcon_feccon&fecha2='+fec})
       }
       else  if ($('ocregcon_fecbuepro').value!='')
       {
           var signo='>';
	       var msjes='La Fecha de Contratacion Invalida debe ser mayor a la Fecha de Otorg. Buena Pro';
	       new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecha1='+fec2+'&signo='+signo+'&msj='+msjes+'&blanco=ocregcon_feccon&fecha2='+fec1})
       }
       else
       {
         if ($('ocregcon_fecini').value!='')
        {
         if ($('ocregcon_plaini').value!='')
         {
           var fecindex=$('ocregcon_feccon').value;
           var plaini=$('ocregcon_plaini').value;
           new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=8&fecindex='+fecindex+'&plaini='+plaini})

           if ($('ocregcon_tieejecon').value!='' && $('ocregcon_tieejecon').value!=0)
           {
             calcular_total_dias();
           }
           else
           {
             alert_('Debe introducir un tiempo de ejecuci&oacute;n del contrato distinto de cero');
             $('ocregcon_feccon').value='';
      	     $('ocregcon_feccon').focus();
           }
         }
         else
         {
           alert_('El Plazo de Inicio debe ser fijado en el M&oacute;dulo de Definici&oacute;n de Instituci&oacute;n');
           $('ocregcon_feccon').value='';
    	   $('ocregcon_feccon').focus();
         }
       }
       else
       {
         if ($('ocregcon_plaini').value!='')
         {

           var fecindex=$('ocregcon_feccon').value;
           var plaini=$('ocregcon_plaini').value;
           new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=8&fecindex='+fecindex+'&plaini='+plaini})

           if ($('ocregcon_tieejecon').value!='' && $('ocregcon_tieejecon').value!=0)
           {
             calcular_total_dias();
           }
           else
           {
             alert_('Debe introducir un tiempo de ejecuci&oacute;n del contrato distinto de cero');
             $('ocregcon_feccon').value='';
       	     $('ocregcon_feccon').focus();
           }
         }
         else
         {
           alert_('El Plazo de Inicio debe ser fijado en el M&oacute;dulo de Definici&oacute;n de Instituci&oacute;n');
           $('ocregcon_feccon').value='';
	       $('ocregcon_feccon').focus();
         }
       }
      }
	 }
  }

  function lostfocus_fecinicio()
  {
	 var fec=$('ocregcon_feclic').value;
	 var fec1=$('ocregcon_fecbuepro').value;

	 var fec2=$('ocregcon_fecini').value;
	 var fecha2=fec2.split("/");
 	 var fecval=fecha2[1]+"/"+fecha2[0]+"/"+fecha2[2];

	 var fec3=$('ocregcon_feccon').value;

     if ($('ocregcon_fecini').value!='')
     {
	   if (!(isDate(fecval)))
	   {
	     alert_('La Fecha de Inicio es Inv&aacute;lida');
	     $('ocregcon_fecini').value='';
	   }
	   else if ($('ocregcon_feclic').value!='')
       {
           var signo='>';
	       var msjes='La Fecha de Inicio debe ser mayor a la Fecha de Licitacion';
	       new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecha1='+fec2+'&signo='+signo+'&msj='+msjes+'&blanco=ocregobr_fecini&fecha2='+fec})

       }
       else  if ($('ocregcon_fecbuepro').value!='')
       {
           var signo='<';
	       var msjes='La Fecha de Inicio debe ser menor a la Fecha de Otorg. Buena Pro';
	       new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecha1='+fec2+'&signo='+signo+'&msj='+msjes+'&blanco=ocregobr_fecini&fecha2='+fec1})
       }
       else  if ($('ocregcon_feccon').value!='')
       {
           var signo='<';
	       var msjes='La Fecha de Inicio debe ser menor a la Fecha de Contratacion';
	       new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), otra();}, parameters:'ajax=12&fecha1='+fec2+'&signo='+signo+'&msj='+msjes+'&blanco=ocregobr_fecini&fecha2='+fec3})
       }
	 }
  }

  function otra()
  {
    if ($('javascript').value=='')
    {
      if ($('ocregcon_tieejecon').value!='' && $('ocregcon_tieejecon').value!=0)
      {
        calcular_total_dias();
      }
      else
      {
        alert_('Debe introducir un tiempo de ejecuci&oacute;n del contrato distinto de cero');
        $('ocregcon_fecini').value='';
       $('ocregcon_fecini').focus();
      }
    }
  }

  function lostfocus_fecfinal()
  {
	 var fec=$('ocregcon_feclic').value;
	 var fec1=$('ocregcon_fecbuepro').value;
	 var fec2=$('ocregcon_fecini').value;
	 var fec3=$('ocregcon_feccon').value;

	 var fec4=$('ocregcon_fecfin').value;
	 var fecha4=fec4.split("/");
 	 var fecval=fecha4[1]+"/"+fecha4[0]+"/"+fecha4[2];

     if ($('ocregcon_fecfin').value!='')
     {
	   if (!(isDate(fecval)))
	   {
	     alert_('La Fecha de Terminaci&oacute;n es Inv&aacute;lida');
	     $('ocregcon_fecfin').value='';
	     $('ocregcon_fecfin').focus();
	   }
	   else if ($('ocregcon_feclic').value!='')
       {
	       var signo='>';
	       var msjes='La Fecha de Terminacion Invalida debe ser mayor a la Fecha de Licitacion';
	       new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecha1='+fec4+'&signo='+signo+'&msj='+msjes+'&blanco=ocregcon_fecfin&fecha2='+fec})
       }
       else  if ($('ocregcon_fecbuepro').value!='')
       {
	       var signo='>';
	       var msjes='La Fecha de Terminacion Invalida debe ser mayor a la Fecha de Otorg. Buena Pro';
	       new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecha1='+fec4+'&signo='+signo+'&msj='+msjes+'&blanco=ocregcon_fecfin&fecha2='+fec1})
       }
       else  if ($('ocregcon_feccon').value!='')
       {
 	       var signo='>';
	       var msjes='La Fecha de Terminacion Invalida debe ser mayor a la Fecha de Contratacion';
	       new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecha1='+fec4+'&signo='+signo+'&msj='+msjes+'&blanco=ocregcon_fecfin&fecha2='+fec3})
       }
       else  if ($('ocregcon_fecini').value!='')
       {
         var signo='>';
	     var msjes='La Fecha de Terminacion Invalida debe ser mayor a la Fecha de Inicio';
	     new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecha1='+fec4+'&signo='+signo+'&msj='+msjes+'&blanco=ocregcon_fecfin&fecha2='+fec2})
       }
	 }
  }

  function retencion_repetido(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var retencion=$(id).value;

   var retencionrepetido=false;
   var am=totalregistros('cx',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="cx"+"_"+i+"_1";

    var retencion2=$(codigo).value;

    if (i!=fila)
    {
      if (retencion==retencion2)
      {
        retencionrepetido=true;
        break;
      }
    }
   i++;
   }
   return retencionrepetido;
 }

 function validargrid(e,id)
 {
	if (retencion_repetido(id))
	{
		alert_('La Deducci&oacute;n esta repetida');
	}
	else
	{
      ajaxretencion(e,id);
	}
 }

  function lostfocus_col3(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var colpor=col+2;
    var colstamon=col+7;
    var colbaseimp=col+3;
    var colmonto=col+8;
    var colunitri=col+4;
    var colfactor=col+5;
    var colporsus=col+6;

    var porcen=name+"_"+fil+"_"+colpor;
    var sinoneto=name+"_"+fil+"_"+colstamon;
    var baseimponible=name+"_"+fil+"_"+colbaseimp;
    var monto=name+"_"+fil+"_"+colmonto;
    var unitri=name+"_"+fil+"_"+colunitri;
    var factor=name+"_"+fil+"_"+colfactor;
    var porsus=name+"_"+fil+"_"+colporsus;

    if ($(porcen).value!='')
    {
      if (!validarnumero(porcen))
      {
        alert_('Monto Inv&aacute;lido');
        $(porcen).value="0,00";
      }
      else
      {
        if (!verificar_porcentaje(colpor))
        {
          alert('La suma de la columna debe ser menor al 100%');
          $(porcen).value="0,00";
        }
        else
        {
          $(porcen).value= $(porcen).value;
          if ($('ocregcon_moncon').value!='' && $('ocregcon_moncon').value!='0,00')
          {

            if ($(sinoneto).value=='N')
            {
              var num1=toFloat('ocregcon_subtot');
              var num2=toFloat(baseimponible);
              resul= num1*(num2/100);
              $(monto).value=format(resul.toFixed(2),'.',',','.');

              var filacol=toFloat(porcen);
              if (filacol>0)
              {
                var col4=toFloat(monto);
                var resul2= (col4*filacol)/100;
                $(monto).value=format(resul2.toFixed(2),'.',',','.');
                if (!verificar_fianzas())
                {
		          alert('La suma de las fianzas no pueder ser mayor al monto del Contrato');
		          $(porcen).value="0,00";
		          $(monto).value="0,00";
		        }
              }
              else
              {
                 var uni=toFloat(unitri);
                 var fac=toFloat(factor);
                 var sus=toFloat(porsus);
                 var resultot= uni + fac + sus;
                 var mon=toFloat(monto);
                 var porcent=toFloat(porcen);
                 if (mon > resultot)
                 {
                   var valor4= ((mon*porcent)/100) - resultot;
                   $(monto).value=format(valor4.toFixed(2),'.',',','.');
                   if (!verificar_fianzas())
                   {
		             alert('La suma de las fianzas no pueder ser mayor al monto del Contrato');
		             $(porcen).value="0,00";
		             $(monto).value="0,00";
		           }
                 }
                 else
                 {
                    var valor4= ((mon*porcent)/100);
                   $(monto).value=format(valor4.toFixed(2),'.',',','.');
                   if (!verificar_fianzas())
                   {
		             alert('La suma de las fianzas no pueder ser mayor al monto del Contrato');
		             $(porcen).value="0,00";
		             $(monto).value="0,00";
		           }
                 }
              }
            }
            else
            {
              var num1=toFloat('ocregcon_totcon');
              var num2=toFloat(baseimponible);
              resul= num1*(num2/100);
              $(monto).value=format(resul.toFixed(2),'.',',','.');
              var filacol=toFloat(porcen);
              if (filacol>0)
              {
                var col4=toFloat(monto);
                var resul2= (col4*filacol)/100;
                $(monto).value=format(resul2.toFixed(2),'.',',','.');
                if (!verificar_fianzas())
                {
		          alert('La suma de las fianzas no pueder ser mayor al monto del Contrato');
		          $(porcen).value="0,00";
		          $(monto).value="0,00";
		        }
              }
              else
              {
                 var uni=toFloat(unitri);
                 var fac=toFloat(factor);
                 var sus=toFloat(porsus);
                 var resultot= uni + fac + sus;
                 var mon=toFloat(monto);
                 var porcent=toFloat(porcen);
                 if (mon > resultot)
                 {
                   var valor4= ((mon*porcent)/100) - resultot;
                   $(monto).value=format(valor4.toFixed(2),'.',',','.');
                   if (!verificar_fianzas())
                   {
		             alert('La suma de las fianzas no pueder ser mayor al monto del Contrato');
		             $(porcen).value="0,00";
		             $(monto).value="0,00";
		           }
                 }
                 else
                 {
                    var valor4= ((mon*porcent)/100);
                   $(monto).value=format(valor4.toFixed(2),'.',',','.');
                   if (!verificar_fianzas())
                   {
		             alert('La suma de las fianzas no pueder ser mayor al monto del Contrato');
		             $(porcen).value="0,00";
                     $(monto).value="0,00";
		           }
                 }
              }
            }
          }
          else
          {
            alert('No existe registro del monto del Contrato');
            $(porcen).value="0,00";
            $(monto).value="0,00";
          }
        }
      }
    }
  }

  function verificar_porcentaje(col)
  {
	var totpor=0;
    var am=totalregistros('cx',1,10);
	var i=0;
	while (i<am)
	{
	  var codigo="cx"+"_"+i+"_"+col;
	  var num1=toFloat(codigo);
	  totpor= totpor + num1;
	  i++;
	}
    if (totpor>100)
    { return false; }
    else { return true;}
  }

  function verificar_fianzas()
  {
    var montofianza=0;
    var am=totalregistros('cx',1,10);
	var i=0;
	while (i<am)
	{
	  var codigo="cx"+"_"+i+"_1";
	  var porc="cx"+"_"+i+"_3";
	  var num1=toFloat(porc);
	  if ($(codigo).value!="")
	  {
	    montofianza= montofianza + num1;
	  }
	  i++;
	}
    var subtot=toFloat('ocregcon_subtot');
    if (montofianza>subtot)
    { return false; }
    else { return true;}
  }

  function totales_oferta()
  {
    if ($('ocregcon_tieejecon').value!='')
    {
      var num1=toFloat('ocregcon_gasree');
      var num2=toFloat('ocregcon_totofer');
      var cal=(num1+num2);
      $('ocregcon_subtot').value=format(cal.toFixed(2),'.',',','.');

      var num3=toFloat('ocregcon_subtot');
      var num4=toFloat('ocregcon_poriva');
      var calculo=((num3+num4)/100);
      $('ocregcon_moniva').value=format(calculo.toFixed(2),'.',',','.');

      var num5=toFloat('ocregcon_moniva');
      var cal2=num4+num5;
      $('ocregcon_moncon').value=format(cal2.toFixed(2),'.',',','.');
      $('ocregcon_totcon').value=format(cal2.toFixed(2),'.',',','.');

      var contrato=$('ocregcon_codcon').value;
      var montotot=$('ocregcon_subtot').value;

      new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&contrato='+contrato+'&montotal='+montotot})
      calcular_contratro();
    }
  }

  function ajaxnivelpro(e,id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coltipo=col-2;
   var colexp=col+1;
   var colvalh=col+5;

   var tipopro=name+"_"+fil+"_"+coltipo;
   var experiencia=name+"_"+fil+"_"+colexp;
   var horas=name+"_"+fil+"_"+colvalh;

   var cod=$(id).value;
   var codtipo=$(tipopro).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
    if ($(id).value!="")
    {
     new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=10&cajtexmos='+experiencia+'&cajtexcom='+id+'&valhor='+horas+'&tipopro='+codtipo+'&codigo='+cod})
    }
   }
  }

  function focus5y6(e,id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colvalh=col+2;
    var coltot=col+3;

    var horas=name+"_"+fil+"_"+colvalh;
    var total=name+"_"+fil+"_"+coltot;

    if (!validarnumero(id))
    {
      alert('Dato Inv&aacute;lido');
      $(id).value="0,00";
    }
    else
    {
      if (col==6)
      {
       if ($(id).value!='')
       {
         $(id).value=$(id).value;
         var num1=toFloat(id);
         var num2=toFloat(horas);
         var calculo=num1*num2;
         $(total).value=format(calculo.toFixed(2),'.',',','.');
         actualizarsaldos_d();
         totales_oferta();
       }
      }
    }
  }

  function personal_repetido(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var personal=$(id).value;

   var personalrepetido=false;
   var am=totalregistros('ax',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var personal2=$(codigo).value;

    if (i!=fila)
    {
      if (personal==personal2)
      {
        personalrepetido=true;
        break;
      }
    }
   i++;
   }
   return personalrepetido;
 }

 function validargridIng(e,id)
 {
	if (personal_repetido(id))
	{
		alert_('El Personal esta repetido');
	}
	else
	{
       ajaxingresidentes(e,id)
	}
 }


 function cantidadcon(e,id)
 {
  if (e.keyCode==13)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colpar=col-3;
   var colcosto=col+2;
   var coltotal=col+3;

   var costo=name+"_"+fil+"_"+colcosto;
   var total=name+"_"+fil+"_"+coltotal;
   var parti=name+"_"+fil+"_"+colpar;

   var num1=toFloat(id);
   var num2=toFloat(costo);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }

   if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   var obr=$('ocregcon_codobr').value;
   var cont=$('ocregcon_codcon').value;
   verificar_contratado(obr,parti);
   var cant_contra=toFloat('ocregcon_contratado');
   var costototal=(num2*num1);
   if (cant_contra>=0)
   {
      var codpre=$('ocregcon_codpre').value;
      if (chequeadisponi(codpre,costototal))
      {
      $(total).value=format(costototal.toFixed(2),'.',',','.');
      }
      else
      {
         alert($('ocregcon_disponible').value);
         $(id).value='0,00';
      }
   }
   else
   {
     verificar_contratado_partida(cont,parti);
     var cant_contra_par=toFloat('ocregcon_contrapar');
     if (cant_contra_par<0)
     {
      alert('Excede la cantidad Presupuestada para esta Partida');
     }
     else
     {
      $(total).value=format(costototal.toFixed(2),'.',',','.');
     }
   }
   totalizargridcon();
   }
  }

   function totalizargridcon()
 {
   var acumulador=0;
   var totreg=totalregistros('ax',1,50);
   var l=0;
   while (l<totreg)
   {
    var montot="ax"+"_"+l+"_7";
    var num1=toFloat(montot);

     if (num1>0)
     {
       acumulador= acumulador + num1;
     }
   l++;
   }


   var numiva=toFloat('ocregcon_poriva');
   if (numiva>0)
   {
     var totiva=((acumulador*numiva)/100);
     $('ocregcon_moniva').value=format(totiva.toFixed(2),'.',',','.');
     var sumoniva=toFloat('ocregcon_moniva');
     var resta=acumulador -sumoniva;
     $('ocregcon_subtot').value=format(resta.toFixed(2),'.',',','.');

     var numiva2=toFloat('ocregcon_poriva');
     var subtotal=toFloat('ocregcon_subtot');

     var calcular=  subtotal + sumoniva;

     $('ocregcon_totcon').value=format(calcular.toFixed(2),'.',',','.');
   }
   else
   {
    alert('Debe Colocar el Monto de IVA aplicado al Contrato');
    $('ocregcon_poriva').focus();
   }
   actualizarsaldos();
   totales_partidas();
 }

   function totalcon(e,id)
 {
  if (e.keyCode==13)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcantidad=col-2;
   var coltotal=col+1;

   var cantidad=name+"_"+fil+"_"+colcantidad;
   var total=name+"_"+fil+"_"+coltotal;

   var num1=toFloat(id);
   var num2=toFloat(cantidad);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }

   if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   costototal=(num1*num2);

   $(total).value=format(costototal.toFixed(2),'.',',','.');

   totalizargridcon();

   }
 }

  function verificar_contratado(obra,partida)
  {
     new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=13&obra='+obra+'&partida='+partida})
  }

  function chequeadisponi(codpre,costototal)
  {
    var ayo=$('ocregcon_feccon').value;
    var ayo2=ayo.split('/')
    var ano=ayo2[2];

    new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=14&codpre='+codpre+'&num=1&monto='+costototal+'&anno='+ano})
    if ($('ocregcon_disponible').value=="")
    {
     return true;
    }
    else
    {
     return false;
    }
  }

    function verificar_contratado_partida(cont,partida)
  {
     new Ajax.Request('/obras_dev.php/oycdescon/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=15&contrato='+cont+'&partida='+partida})
  }

//Adjudicacion de Obras
  function validaradj()
  {
    if ($('ocadjobr_codprogan').value=='')
    {
     alert('La Obra no puede ser Aprobada sin haberle adjudicado la Empresa Ganadora');
     $('ocadjobr_status').checked=false;
    }
  }

//Valuaciones
  function totalizar()
  {
    var num1=toFloat('ocregval_subtot');
    var num2=toFloat('ocregval_moniva');

    var calculo= num1 +num2;

    $('ocregval_totiva').value=format(calculo.toFixed(2),'.',',','.');
  }


  function calcularprecio(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcanfin=col-1;
   var coltotal=col+1;

   var canfin=name+"_"+fil+"_"+colcanfin;
   var camtotal=name+"_"+fil+"_"+coltotal;

   var num1=toFloat(id);
   var ncanfin=toFloat(canfin);
   var nmoncon=toFloat('ocregval_moncon');
   var ntotiva=toFloat('ocregval_totiva');

   if ($(id).value!="")
   {
       if (!validarnumero(id))
	   {
	    alert_('Dato Inv&aacute;lido');
	    $(id).value="0,00";
	    $(camtotal).value="0,00";
	   }
	   else
	   {
         if (num1>0)
         {
           $(id).value=format(num1.toFixed(2),'.',',','.');
           caltotal= ncanfin * num1;
           $(camtotal).value=format(caltotal.toFixed(2),'.',',','.');
           total_partidas();
           if (nmoncon >= ntotiva)
           {
            if ($('id').value!="")
            {
              var totreg=parseInt($('ocregval_filasret').value);
                  var l=0;
				  while (l<totreg)
				  {
                   var codigo="bx"+"_"+l+"_1";
                   var stamon="bx"+"_"+l+"_8";
                   var porcentaje="bx"+"_"+l+"_3";
                   var baseimp="bx"+"_"+l+"_4";
                   var monto="bx"+"_"+l+"_9";
                   var nbase=toFloat(baseimp);
                   var nporcen=toFloat(porcentaje);
                   if ($(codigo).value!="" && $(monto).value!="0,00")
                   {
                    //lost_focus de la columna 3
                    if ($(porcentaje).value!="")
                    {
                       if (!validarnumero(porcentaje))
					   {
					    alert_('Dato Inv&aacute;lido');
					    $(porcentaje).value="0,00";
					   }
					   else
					   {
                         if (!verificar_porret())
                         {
                           alert('La Suma de la Columna debe ser menor que 100%');
                           $(porcentaje).value="0,00";
                         }
                         else
                         {
                           ntotsiniva=toFloat('ocregval_totsiniva');
                           if ($('ocregval_totsiniva').value!="")
                           {
                             if ($('ocregval_totsiniva').value!="0,00")
                             {
                               if ($(stamon).value=='N')
                               {
                                 var nmonper=toFloat('ocregval_monper');
                                  var cal1= ((nmonper*nbase)/100);
                                  var cal2= ((cal1*nporcen)/100);
                                  $(monto).value=format(cal2.toFixed(2),'.',',','.');
                               }
                               else
                               {
                                 if ($('valret').value!=$('ocregval_codtipval').value)
                                 {
                                   var ntotiva=toFloat('ocregval_totiva');
                                   var cal1= ((ntotiva*nbase)/100);
                                   var cal2= ((cal1*nporcen)/100);
                                   $(monto).value=format(cal2.toFixed(2),'.',',','.');
                                   $('ocregval_monfia').value=$(monto).value;
                                 }
                               }

                               if (!verificar_fianzas())
                               {
                                 alert('La suma de las fianzas no puede ser mayor al monto del contrato');
                                 $(porcentaje).value="0,00";
                                 $(monto).value="0,00";
                               }
                             }
                           }
                           else
                           {
                             alert('No existe registro del monto del contrato');
                             $(monto).value="0,00";
                           }
                         }
					   }
                    }
                    // Fin lost_focus 3
                     calcular_total_deducciones();
                   }
				   l++;
				  }
            }
            calcular_variaciones();
           }
         }
         else{
          alert_('El Dato de ser mayor que cero');
          $(id).value="0,00";
          $(camtotal).value="0,00";
         }
	   }
	   total_partidas();
   }
  }
 }

 function cantidadFinal(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcancon=col-2;
   var colcanval=col-1;
   var colcost=col+1;
   var coltotal=col+2;

   var cantcon=name+"_"+fil+"_"+colcancon;
   var cantval=name+"_"+fil+"_"+colcanval;
   var camcosto=name+"_"+fil+"_"+colcost;
   var camtotal=name+"_"+fil+"_"+coltotal;

   var num1=toFloat(id);
   var ncantcon=toFloat(cantcon);
   var ncantval=toFloat(cantval);
   var ncamcosto=toFloat(camcosto);

  if ($('valpar').value==$('ocregval_codtipval').value || $('valfinal').value==$('ocregval_codtipval').value)
  {
   if ($(id).value!="")
   {
       if (!validarnumero(id))
	   {
	    alert_('Dato Inv&aacute;lido');
	    $(id).value="0,00";
	    $(camtotal).value="0,00";
	   }
	   else
	   {
         if (num1>=0)
         {
            if (ncantcon>0)
            {
              var multiplica=num1*ncamcosto;
              $(camtotal).value=format(multiplica.toFixed(2),'.',',','.');
              total_partidas();
              var nmoncon=toFloat('ocregval_moncon');
              var ntotiva=toFloat('ocregval_totiva');
              if (nmoncon>=ntotiva)
              {
                if ($('valfinal').value!=$('ocregval_codtipval').value && nmoncon==ntotiva)
                {
                  alert_('No debe valuar la Totalidad del Contrato en una Valuaci&oacute;n Parcial');
                  $(id).value="0,00";
            	  $(camtotal).value="0,00";
            	  $(id).focus();
                }
                else
                {
                  var totreg=parseInt($('ocregval_filasret').value);
                  var l=0;
				  while (l<totreg)
				  {
                   var codigo="bx"+"_"+l+"_1";
                   var stamon="bx"+"_"+l+"_8";
                   var porcentaje="bx"+"_"+l+"_3";
                   var baseimp="bx"+"_"+l+"_4";
                   var monto="bx"+"_"+l+"_9";
                   var nbase=toFloat(baseimp);
                   var nporcen=toFloat(porcentaje);
                   if ($(codigo).value!="" && $(monto).value!="0,00")
                   {
                    //lost_focus de la columna 3
                    if ($(porcentaje).value!="")
                    {
                       if (!validarnumero(porcentaje))
					   {
					    alert_('Dato Inv&aacute;lido');
					    $(porcentaje).value="0,00";
					   }
					   else
					   {
                         if (!verificar_porret())
                         {
                           alert('La Suma de la Columna debe ser menor que 100%');
                           $(porcentaje).value="0,00";
                         }
                         else
                         {
                           ntotsiniva=toFloat('ocregval_totsiniva');
                           if ($('ocregval_totsiniva').value!="")
                           {
                             if ($('ocregval_totsiniva').value!="0,00")
                             {
                               if ($(stamon).value=='N')
                               {
                                 var nmonper=toFloat('ocregval_monper');
                                  var cal1= ((nmonper*nbase)/100);
                                  var cal2= ((cal1*nporcen)/100);
                                  $(monto).value=format(cal2.toFixed(2),'.',',','.');
                               }
                               else
                               {
                                 if ($('valret').value!=$('ocregval_codtipval').value)
                                 {
                                   var ntotiva=toFloat('ocregval_totiva');
                                   var cal1= ((ntotiva*nbase)/100);
                                   var cal2= ((cal1*nporcen)/100);
                                   $(monto).value=format(cal2.toFixed(2),'.',',','.');
                                   $('ocregval_monfia').value=$(monto).value;
                                 }
                               }

                               if (!verificar_fianzas())
                               {
                                 alert('La suma de las fianzas no puede ser mayor al monto del contrato');
                                 $(porcentaje).value="0,00";
                                 $(monto).value="0,00";
                               }
                             }
                           }
                           else
                           {
                             alert('No existe registro del monto del contrato');
                             $(monto).value="0,00";
                           }
                         }
					   }
                    }
                    // Fin lost_focus 3
                     calcular_total_deducciones();
                   }
				   l++;
				  }
                 calcular_variaciones();
                }

              }
              else
              {
                alert('El Monto Valuado excede el Monto Original del Contrato');
                $(id).value="0,00";
         	    $(camtotal).value="0,00";
                $(id).focus();
              }
            }
         }
         else{
          alert_('El Dato de ser mayor o igual a cero');
          $(id).value="0,00";
          $(camtotal).value="0,00";
          $(id).focus();
         }
	   }
	 }
   }
  }
 }

 function verificar_porret()
 {
   var tot_porcen=0;

   var totreg=parseInt($('ocregval_filasret').value);
   var l=0;
   while (l<totreg)
   {
     var monto="bx"+"_"+l+"_3";

     var nmonto=toFloat(monto);
     tot_porcen= tot_porcen + nmonto;
    l++;
   }

   if (tot_porcen>100)
   {
     porcentaje_ret=false;
   }
   else
   {
       porcentaje_ret=true;
   }

   return porcentaje_ret;
 }

 function verificar_fianzas()
 {
   var monto_fianza=0;
   var verifica_fianza=true;

   var totreg=parseInt($('ocregval_filasret').value);
   var l=0;
   while (l<totreg)
   {
     var codigo="bx"+"_"+l+"_1";
     var monto="bx"+"_"+l+"_3";

     var nmonto=toFloat(monto);
     if ($(codigo).value!="")
     {
       monto_fianza= monto_fianza + nmonto;
     }
    l++;
   }

   ntotsiniva=toFloat('ocregval_totsiniva');

   if (monto_fianza>ntotsiniva)
   {
     verifica_fianza=false;
   }

   return verifica_fianza;
 }

 function calcular_total_deducciones()
 {
   var montotdeduc=0;
   var monacumdeduc=0;
   var totreg=parseInt($('ocregval_filasret').value);
   var l=0;
  while (l<totreg)
  {
    var codigo="bx"+"_"+l+"_1";
    var stamon="bx"+"_"+l+"_8";
    var porcentaje="bx"+"_"+l+"_3";
    var baseimp="bx"+"_"+l+"_4";
    var monto="bx"+"_"+l+"_9";
    var nbase=toFloat(baseimp);
    var nporcen=toFloat(porcentaje);
     //lost_focus de la columna 3
     if ($(porcentaje).value!="")
     {
        if (!validarnumero(porcentaje))
	   {
	    alert_('Dato Inv&aacute;lido');
	    $(porcentaje).value="0,00";
	   }
	   else
	   {
          if (!verificar_porret())
          {
            alert('La Suma de la Columna debe ser menor que 100%');
            $(porcentaje).value="0,00";
          }
          else
          {
            ntotsiniva=toFloat('ocregval_totsiniva');
            if ($('ocregval_totsiniva').value!="")
            {
              if ($('ocregval_totsiniva').value!="0,00")
              {
                if ($(stamon).value=='N')
                {
                  var nmonper=toFloat('ocregval_monper');
                   var cal1= ((nmonper*nbase)/100);
                   var cal2= ((cal1*nporcen)/100);
                   $(monto).value=format(cal2.toFixed(2),'.',',','.');
                }
                else
                {
                  if ($('valret').value!=$('ocregval_codtipval').value)
                  {
                    var ntotiva=toFloat('ocregval_totiva');
                    var cal1= ((ntotiva*nbase)/100);
                    var cal2= ((cal1*nporcen)/100);
                    $(monto).value=format(cal2.toFixed(2),'.',',','.');
                    $('ocregval_monfia').value=$(monto).value;
                  }
                }

                if (!verificar_fianzas())
                {
                  alert('La suma de las fianzas no puede ser mayor al monto del contrato');
                  $(porcentaje).value="0,00";
                  $(monto).value="0,00";
                }
              }
             }
             else
             {
               alert('No existe registro del monto del contrato');
               $(monto).value="0,00";
             }
           }
         }
        }
        nmontos=toFloat(monto);
        // Fin lost_focus 3
        if ($(stamon).value=='N')
        {
          montotdeduc= montotdeduc + nmontos;
        }

        monacumdeduc= monacumdeduc + nmontos;

   l++;
  }

  $('ocregval_totded').value=format(montotdeduc.toFixed(2),'.',',','.');
  $('ocregval_salliq').value=format(monacumdeduc.toFixed(2),'.',',','.');
 }


 function calcular_variaciones()
 {
   $('ocregval_monaumtot').value=0;
   $('ocregval_mondistot').value=0;
   $('ocregval_monexttotal').value=0;
   var monaumtot=0;
   var mondistot=0;
   var monexttotal=0;

    var totpar=parseInt($('ocregval_filaspar').value);
    var i=0;
    while (i<totpar)
    {
      var mondism=0;
      var monaum=0;
      var monext=0;
      var mondisprec=0;
      var monaumprec=0;

     var codpar="ax"+"_"+i+"_1";
     var canfinal="ax"+"_"+i+"_6";
     var cancosto="ax"+"_"+i+"_7";
     var stotal="ax"+"_"+i+"_8";

     var ncanfinal=toFloat(canfinal);
     var nstotal=toFloat(stotal);
     var ncancosto=toFloat(cancosto);

     new Ajax.Request('/obras_dev.php/oycval/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), total_partidas();}, parameters:'ajax=10&partida='+$(codpar).value+'&canfinal='+$(canfinal).value+'&total='+$(stotal).value+'&poriva='+$('ocregval_poriva').value+'&costo='+$(cancosto).value+'&monaumtot='+$('ocregval_monaumtot').value+'&mondistot='+$('ocregval_mondistot').value+'&monexttotal='+$('ocregval_monexttotal').value+'&obra='+$('ocregval_codobr').value})

     i++;
    }
  }

  function total_partidas()
  {
    var montototalpartidas=0;
    var porcen_acumulado=0;
    var montototalacumpartidas=0;
    var suma_columnas=0;
    var iva_acum=0;
    var nporiva=toFloat('ocregval_poriva');
    var nmoncon=toFloat('ocregval_moncon');

    var totpar=parseInt($('ocregval_filaspar').value);
    var i=0;
    while (i<totpar)
    {
      var canval="ax"+"_"+i+"_5";
      var canfin="ax"+"_"+i+"_6";
      var costo="ax"+"_"+i+"_7";
      var stotal="ax"+"_"+i+"_8";

      var ncanval=toFloat(canval);
      var ncanfin=toFloat(canfin);
      var nstotal=toFloat(stotal);
      var ncosto=toFloat(costo);

      //falta pero no se utiliza este codigo en ninguna parte

      if ($(stotal).value!="")
      {
        if ($('valant').value!=$('ocregval_codtipval').value && $('valret').value!=$('ocregval_codtipval').value && $('id').value=="")
        {
          suma_columnas= ncanval + ncanfin;
          montototalacumpartidas= montototalacumpartidas + (suma_columnas * ncosto);
        }
        else
        {
          suma_columnas=0;
          montototalacumpartidas=0;
        }
        montototalpartidas= montototalpartidas + nstotal;
      }
     i++;
    }

    switch ($('ocregval_codtipval').value)
    {
      case ($('valpar').value):
       var caliva=((montototalacumpartidas*nporiva)/100);
       iva_acum= format(caliva.toFixed(2),'.',',','.');
       montototalacumpartidas= montototalacumpartidas + caliva;
       if (nmoncon >= montototalacumpartidas)
       {
         if (nmoncon == montototalacumpartidas)
         {
           alert_('No debe valuarse la totalidad del contrato en una Valuaci&oacute;n Parcial');
           break;
         }
         calcular_total_valuacion(montototalpartidas);
         calcular_amortizacion();
         calcular_total_contrato();
         calcular_total_deducciones();
         calcular_monto_pagar();
         total_val_presentadas();
       }
       else
       {
         alert('No debe excederse el Monto del Contrato');
       }
       break;
      case ($('valfinal').value):
       var caliva=((montototalpartidas*nporiva)/100);
       iva_acum= format(caliva.toFixed(2),'.',',','.');
       montototalacumpartidas= montototalpartidas + caliva;
       if (nmoncon >= montototalacumpartidas)
       {
         calcular_total_valuacion(montototalpartidas);
         calcular_amortizacion();
         calcular_total_contrato();
         calcular_total_deducciones();
         calcular_monto_pagar();
         total_val_presentadas();
       }
       else
       {
         alert('No debe excederse el Monto del Contrato');
       }
       break;
       default:
         calcular_total_valuacion(montototalpartidas);
         calcular_amortizacion();
         calcular_total_contrato();
         calcular_total_deducciones();
         calcular_monto_pagar();
         total_val_presentadas();
        break;
    }
  }

  function calcular_total_valuacion(montototalpartidas)
  {
    var nporant=toFloat('ocregval_porant');
    var nporiva=toFloat('ocregval_poriva');
    var ngasree=toFloat('ocregval_gasree');
    switch ($('ocregval_codtipval').value)
    {
      case ($('valant').value):
      case ($('valret').value):
        var porcen_ant=((montototalpartidas*nporant)/100);
        var calmon=porcen_ant + ngasree;
        $('ocregval_subtot').value=format(calmon.toFixed(2),'.',',','.');
        var nsubtot=toFloat('ocregval_subtot');
        var calculoiva= (nsubtot*nporiva)/100;
        $('ocregval_moniva').value=format(calculoiva.toFixed(2),'.',',','.');
        var nmoniva=toFloat('ocregval_moniva');
        var calculototiva= nsubtot + nmoniva;
        $('ocregval_totiva').value=format(calculototiva.toFixed(2),'.',',','.');
        $('ocregval_totsiniva').value=$('ocregval_subtot').value;
       break;
      case ($('valpar').value):
      case ($('valfinal').value):
      case ($('valrec').value):
        var calmon=montototalpartidas + ngasree;
        $('ocregval_subtot').value=format(calmon.toFixed(2),'.',',','.');
        var nsubtot=toFloat('ocregval_subtot');
        var calculoiva= (nsubtot*nporiva)/100;
        $('ocregval_moniva').value=format(calculoiva.toFixed(2),'.',',','.');
        var nmoniva=toFloat('ocregval_moniva');
        var calculototiva= nsubtot + nmoniva;
        $('ocregval_totiva').value=format(calculototiva.toFixed(2),'.',',','.');
        $('ocregval_totsiniva').value=$('ocregval_subtot').value;
       break;
    }
  }

  function calcular_total_contrato()
  {
    var nmoncon=toFloat('ocregval_moncon');
    var naumobr=toFloat('ocregval_aumobr');
    var ndisobr=toFloat('ocregval_disobr');
    var nobrext=toFloat('ocregval_obrext');

    var montotcon= nmoncon + naumobr - ndisobr + nobrext;

    $('ocregval_monful').value=format(montotcon.toFixed(2),'.',',','.');
    $('ocregval_montotcon').value=format(montotcon.toFixed(2),'.',',','.');
  }

  function calcular_monto_pagar()
  {
    var monto_previo=0;
    var ntotsiniva=toFloat('ocregval_totsiniva');
    var namortant=toFloat('ocregval_amortant');
    var nmonfia=toFloat('ocregval_monfia');
    var ntotded=toFloat('ocregval_totded');
    var nvalpag=toFloat('ocregval_valpag');

    var subtotalret= ntotsiniva - namortant - nmonfia;
    $('ocregval_monper').value=format(subtotalret.toFixed(2),'.',',','.');
    var nmonper=toFloat('ocregval_monper');
    switch ($('ocregval_codtipval').value)
    {
      case ($('valfinal').value):
        monto_previo= nmonper - ntotded;
        var montotpagar= nmonper - nvalpag;
        $('ocregval_monpag').value=format(montotpagar.toFixed(2),'.',',','.');
       break;
      default:
        var montotpagar= nmonper - ntotded;
        $('ocregval_monpag').value=format(montotpagar.toFixed(2),'.',',','.');
       break;
    }
  }

  function calcular_amortizacion()
  {
    new Ajax.Request('/obras_dev.php/oycval/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&codcon='+$('ocregval_codcon').value+'&tipval='+$('ocregval_codtipval').value+'&valant='+$('valant').value+'&porant='+$('ocregval_porant').value+'&idval='+$('id').value+'&totiva='+$('ocregval_totiva').value})
  }

  function total_val_presentadas()
  {
    new Ajax.Request('/obras_dev.php/oycval/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&codcon='+$('ocregval_codcon').value+'&monper='+$('ocregval_monper').value+'&valpag='+$('ocregval_valpag').value+'&poriva='+$('ocregval_poriva').value+'&tipval='+$('ocregval_codtipval').value+'&monful='+$('ocregval_monful').value+'&idval='+$('id').value+'&montotcon='+$('ocregval_montotcon').value})
  }
