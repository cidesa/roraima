/**
 * Librerías Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

 function Cantidad(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcant=col+3;
   var colprecio=col+4;
   var colprecioe=col+5;
   var coldescto=col+6;
   var colrgo=col+7;
   var coltotal=col+8;
   var colporcrgo=col+9;

   var cantto=name+"_"+fil+"_"+colcant;
   var precio=name+"_"+fil+"_"+colprecio;
   var precioe=name+"_"+fil+"_"+colprecioe;
   var recargo=name+"_"+fil+"_"+colrgo;
   var descto=name+"_"+fil+"_"+coldescto;
   var total=name+"_"+fil+"_"+coltotal;
   var porcrgo=name+"_"+fil+"_"+colporcrgo;

    var num4=toFloat(descto);
    var num5=toFloat(porcrgo);

    if ($(precio).value!="")
    {var num1=toFloat(precio);}
    else
    {var num1=toFloat(precioe);}
    var num2=toFloat(id);

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
    if (validarnumero(precio) || validarnumero(precioe))
    {
     var calrec=(num2*num1)*(num5/100);
     $(recargo).value=format(calrec.toFixed(2),'.',',','.');

     var costototal=(num2*num1) + calrec - num4;
     $(total).value=format(costototal.toFixed(2),'.',',','.');
     llenargridfechas();
     monto_total();
    }
   }
   }
  }


  function llenargridfechas()
  {
    var fil=totalregistros('ax',1,25);
    var i=0;
    while (i<fil)
    {

    var id1="ax"+"_"+i+"_1";
    var id2="ax"+"_"+i+"_2";
    var id3="ax"+"_"+i+"_3";
    if ($(id1)){
    if ($(id1).value!="")
    {
      var enc=false;
      var fil2=0;
      var am=totalregistros2('bx',1,25);
      while ((fil2<am) && (enc==false))
      {
         var id4="bx"+"_"+fil2+"_1";
         var id5="bx"+"_"+fil2+"_2";
         var id6="bx"+"_"+fil2+"_3";
         if ($(id4)){
         if ($(id4).value!="")
         {
          if ($(id4).value==$(id1).value)
          {
           if ($(id6).value!=$(id3).value)
           {
             $(id6).value=$(id3).value;
           }
           enc=true;
          }
         }
         }
         fil2++;
      }
      if (enc==false)
      {
        ap=am;
        var id4="bx"+"_"+ap+"_1";
        if ($(id4)){
        if ($(id4).value!="")
        {
         ap=ap+1;
        }
        }
        var id4="bx"+"_"+ap+"_1";
        var id5="bx"+"_"+ap+"_2";
        var id6="bx"+"_"+ap+"_3";
        $(id4).value=$(id1).value;
        $(id5).value=$(id2).value;
        $(id6).value=$(id3).value;
      }
    }
    }
  	i++;
  }
  }

  function monto_total()
  {
    var acum=0;
    var fil=totalregistros('ax',1,25);
    var i=0;
    while (i<fil)
    {
     var id1="ax"+"_"+i+"_11";
     if ($(id1)){
     if ($(id1).value!="" && validarnumero(id1))
     {
       tot=toFloat(id1);
       acum=acum + tot;
     }
     }
     i++;
    }
    $('fapedido_monped').value=format(acum.toFixed(2),'.',',','.');
  }

 function Precio(id)
 {

   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcant=col-4;
   var coldescto=col+2;
   var colrgo=col+3;
   var coltotal=col+4;
   var colporcrgo=col+5;

   var cant=name+"_"+fil+"_"+colcant;
   var recargo=name+"_"+fil+"_"+colrgo;
   var descto=name+"_"+fil+"_"+coldescto;
   var total=name+"_"+fil+"_"+coltotal;
   var porcrgo=name+"_"+fil+"_"+colporcrgo;

   var num1=toFloat(id);
   var num2=toFloat(cant);
    var num4=toFloat(descto);
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
      var calrec=(num2*num1)*(num5/100);
      $(recargo).value=format(calrec.toFixed(2),'.',',','.');

     var costototal=(num2*num1) + calrec - num4;
     $(total).value=format(costototal.toFixed(2),'.',',','.');
     monto_total();
    }
   }
  }

  function Preciocaja(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcant=col-5;
   var coldescto=col+1;
   var colrgo=col+2;
   var coltotal=col+3;
   var colporcrgo=col+4;

   var cant=name+"_"+fil+"_"+colcant;
   var recargo=name+"_"+fil+"_"+colrgo;
   var descto=name+"_"+fil+"_"+coldescto;
   var total=name+"_"+fil+"_"+coltotal;
   var porcrgo=name+"_"+fil+"_"+colporcrgo;

   var num1=toFloat(id);
   var num2=toFloat(cant);
   var num4=toFloat(descto);
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
      var calrec=(num2*num1)*(num5/100);
      $(recargo).value=format(calrec.toFixed(2),'.',',','.');

     var costototal=(num2*num1) + calrec - num4;
     $(total).value=format(costototal.toFixed(2),'.',',','.');
     monto_total();
    }
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
    var colpre=col+6;
    var colpree=col+7;
    var colporrgo=col+11;
    var descripcion=name+"_"+fil+"_"+coldes;
    var precio=name+"_"+fil+"_"+colpre;
    var precioe=name+"_"+fil+"_"+colpree;
    var porrgo=name+"_"+fil+"_"+colporrgo;

    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&porrgo='+porrgo+'&codigo='+cod})
        new Ajax.Updater(precio, getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&id='+$('id').value+'&precioe='+precioe+'&codigo='+cod});
      }
    }
 }

  function Cantidad2(id)
 {

   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcant=col+3;
   var colprecio=col+4;
   var coldescto=col+6;
   var colrgo=col+7;
   var coltotal=col+8;
   var colporcrgo=col+9;

   var cantto=name+"_"+fil+"_"+colcant;
   var precio=name+"_"+fil+"_"+colprecio;
   var recargo=name+"_"+fil+"_"+colrgo;
   var descto=name+"_"+fil+"_"+coldescto;
   var total=name+"_"+fil+"_"+coltotal;
   var porcrgo=name+"_"+fil+"_"+colporcrgo;

   var index=$(precio).selectedIndex;
   var num1=$(precio).options[index].text;
   var num2=toFloat(id);
   var num4=toFloat(descto);
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
    if (validarnumero(precio))
    {
      var calrec=(num2*num1)*(num5/100);
      $(recargo).value=format(calrec.toFixed(2),'.',',','.');

     var costototal=(num2*num1) + calrec - num4;
     $(total).value=format(costototal.toFixed(2),'.',',','.');
     llenargridfechas();
     monto_total();
    }
   }
  }

  function incluirCliente()
  {
    if (confirm("El Cliente no Existe. Desea incluirlo en este momento?"))
    {
      $('fafactur_nompro').disabled=false;
      $('fafactur_telpro').disabled=false;
      $('fafactur_dirpro').disabled=false;
      $('fafactur_tipper_J').disabled=false;
      $('fafactur_tipper_N').disabled=false;
      $('fafactur_codcli').value=$('fafactur_rifpro').value;
      $('fafactur_incluircliente').value='S';
      $('fafactur_monfac').value="0,00";
      $('fafactur_totrec').value="0,00";
      $('fafactur_totdesc').value="0,00";
      mostrarPromedio();

    }
    else
    {
      $('fafactur_nompro').disabled=true;
      $('fafactur_telpro').disabled=true;
      $('fafactur_dirpro').disabled=true;
      $('fafactur_tipper_J').disabled=true;
      $('fafactur_tipper_N').disabled=true;
     $('fafactur_incluircliente').value='N';
    }
  }

  function actualizargrids(valor)
  {
     $('fafactur_monfac').value="0,00";
     $('fafactur_totrec').value="0,00";
     $('fafactur_totdesc').value="0,00";
     colocarDescuento(valor);
     mostrarPromedio();
     descuentosm();
     actualizardescuento();
  }

  function actualizardescuento()
  {
     var colum=determinarReferenciaDoc($('fafactur_tipref').value);
     var mon_art=0;

     var colart=totalregistros2('ax',3,25);
     var fil=0;
	 while (fil<colart)
	 {
      var codart="ax_"+fil+"_3";
      var precio="ax_"+fil+"_10";
      var precioe="ax_"+fil+"_11";
      var morgo="ax_"+fil+"_12";
      var cant="ax_"+fil+"_"+colum;
     if ($(precio)){
      if ($(precio).value!="")
      {
        nprecio=toFloat(precio);
      }
      else
      {
       nprecio=toFloat(precioe);
      }

      ncant=toFloat(cant);
      nmorgo=toFloat(morgo);
      if ($(codart).value!="")
      {
          if ($('fafactur_esretencion').value=='N')
          {
          mon_art=mon_art + (nprecio*ncant);
          }
          else
          {
          mon_art=mon_art + nmorgo;
          }
      }
      }
	 fil++;
	}

	var tot_desc=0;
	var regrgo=totalregistros2('bx',1,10);
	var j=0;
	while (j<regrgo)
	{
      var coddes="bx_"+j+"_1";
      var tipdes="bx_"+j+"_7";
      var monto="bx_"+j+"_3";
      var montodesc="bx_"+j+"_6";
      if ($(coddes)){
      var num1=toFloat(montodesc);
      if ($(coddes).value!="")
      {
        if ($(tipdes).value=='P')
        {
          $(monto).value=format(mon_art.toFixed(2),'.',',','.');
          var descto=$(monto).value;
          var resul= ((toFloat2(descto)* num1)/100);
          $(monto).value=format(resul.toFixed(2),'.',',','.');
        }
        else
        {
          var sumtotdesc=tot_desc+ num1;
          var num2=toFloat('fafactur_tottotart');
          if (num2 > sumtotdesc)
          {
            if ($(monto).value==0)
            {
              $(monto).value=$(montodesc).value;
            }
          }
          else
          {
            $(monto).value="0,00";
            tot_desc= tot_desc - num1;
          }
        }
        var num3=toFloat(monto);
        tot_desc= tot_desc + num3;
      }
      }
     j++;
    }
   calcularTotalDescuento();
  }

  function determinarReferenciaDoc(tipo)
  {
    if (tipo=='V')
    {
      col=7;
    }

    if (tipo=='P')
    {
      col=8;
    }

    if (tipo=='D' || tipo=='VC')
    {
      col=9;
    }

    return col;
  }

  function marcarArtRep(fila,valor)
  {
    var facart=totalregistros2('ax',3,25);
    var fil=0;
    var fila1="ax_"+fila+"_3";
	while (fil<facart)
	{
      var fila2="ax_"+fil+"_3";
      var marcar="ax_"+fil+"_1";
      if ($(fila2)){
      if ($(fila1).value==$(fila2).value)
      {
        $(marcar).checked=valor;
      }
      }
	  fil++;
	}
  }

  function montoMarcados()
  {
    var monto_marcados=0;
    var colum=determinarReferenciaDoc($('fafactur_tipref').value);

    var colart=totalregistros2('ax',3,25);
    var fil=0;
	while (fil<colart)
	{
      var check="ax_"+fil+"_1";
      var precio="ax_"+fil+"_10";
      var precioe="ax_"+fil+"_11";
      var cant="ax_"+fil+"_"+colum;
      if ($(precio)){
      if ($(precio).value!="")
      {
        var nprecio=toFloat(precio);
      }
      else
      {
        var nprecio=toFloat(precioe);
      }
         ncant=toFloat(cant);
      if ($(check).checked==true)
      {
        if ($(cant).value!="")
        {
          monto_marcados=monto_marcados + (nprecio*ncant);
        }
      }
      }
	 fil++;
	}

	if (monto_marcados>0)
	{
	  var totaldesc=0;
/*	  coddesc="bx_0_1";
	  if ($(coddesc).value!="")
	  {*/
	    var regdesc=totalregistros2('bx',1,10);
	    if (regdesc>0){
		var i=0;
		while (i<regdesc)
		{
		  var mondesc="bx_"+i+"_3";
		  if ($(mondesc)){
		  var ndesc=toFloat(mondesc);

		  totaldesc= totaldesc + ndesc;
		  }
		 i++;
		}
	  }

	  if ($('fafactur_esretencion').value=='N')
	  {
	    monto_marcados= monto_marcados - totaldesc
	  }
	}
   return monto_marcados;
  }

  function actualizarRecargos()
  {
    var colum=determinarReferenciaDoc($('fafactur_tipref').value);
    var montoArt= montoMarcados();

    var regrgo=totalregistros2('cx',1,10);
    var regart=totalregistros2('ax',3,25);
	var j=0;
	while (j<regrgo)
	{
      var codrgo="cx_"+j+"_1";
      var tiprgo="cx_"+j+"_6";
      var monrgo="cx_"+j+"_4";
      var monrgo2="cx_"+j+"_7";
     if ($(codrgo)){
      if ($(codrgo).value!="")
      {
        monArt=0;
        var fil=0;
	    while (fil<regart)
	    {
         var codart="ax_"+fil+"_3";
         var cant="ax_"+fil+"_"+colum;
         var precio="ax_"+fil+"_10";
         var precioe="ax_"+fil+"_11";
         if ($(precio)){
	      if ($(precio).value!="")
	      {
	        var nprecio=toFloat(precio);
	      }
	      else
	      {
	        var nprecio=toFloat(precioe);
	      }
         var ncant=toFloat(cant);
	     new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&articulo='+codart+'&recargo='+codrgo})
	     if ($('fafactur_trajo').value=='S')
	     {
            if ($(cant).value!="")
            {
              montoArt= montoArt - (nprecio * ncant);
            }
	     }
	     }
	     fil++;
	    }
        var monrgoori=toFloat(monrgo2);
	    if ($(tiprgo).value=='P')
	    {
          $(monrgo).value=format(montoArt.toFixed(2),'.',',','.');
          var recarg= $(monrgo).value;
          var cal= ((montoArt * monrgoori)/100);
          $(monrgo).value=format(cal.toFixed(2),'.',',','.');
	    }
	    else
	    {
	     $(monrgo).value=$(monrgo).value;
	    }
      }
      }
	  j++;
	}

	calcularTotalRecargos();
  }

  function calcularTotalRecargos()
  {
    var mitot=0;
    var regrgo=totalregistros2('cx',1,10);
	var j=0;
	while (j<regrgo)
	{
     var monrgo="cx_"+j+"_4";
     if ($(monrgo)){
     var nmonto=toFloat(monrgo);
     if ($(monrgo).value!="")
     {
       mitot= mitot + nmonto;
     }
     }
	 j++;
	}
    $('fafactur_totrec').value=format(mitot.toFixed(2),'.',',','.');
  }

  function recalcularRecargos()
  {
      var regrgo=totalregistros2('cx',1,10);
/*    var monrgo="cx_0_4";
   if ($(monrgo)){*/
    if (regrgo>0)
    {
      var regart=totalregistros2('ax',3,25);
      var fil=0;
      while (fil<regart)
      {
        var montotrgo="ax_"+fil+"_12";
        var totart="ax_"+fil+"_13";
        if ($(montotrgo)){
        $(montotrgo).value="0,00";
        $(totart).value="0,00";
        }
        fil++;
      }

  	  var j=0;
	  while (j<regrgo)
	  {
        var codrgo="cx_"+j+"_1";
        if ($(codrgo)){
        if ($(codrgo).value!="")
        {
         grid_recargos_lost_focus(codrgo)
          distribuirRecargos(j,"S");
        }
        }
	   j++;
	  }
	  calcularTotalRecargos();
    //}
    }
  }

  function distribuirRecargos(fila,suma_resta)
  {
      var totregrgo=totalregistros2('cx',1,10);
/*    var codrgo="cx_0_1";
    var monuni=0;
    if ($(codrgo)){
    if ($(codrgo).value!="")*/
    if (totregrgo>0)
    {
      var monTot= montoMarcados();
      var monTot2= calcularMontTot();
      var colum=determinarReferenciaDoc($('fafactur_tipref').value);

      if (monTot>0 || monTot2>0)
      {
	     var regart=totalregistros2('ax',3,25);
	     var fil=0;
	     while (fil<regart)
	     {
	       var check="ax_"+fil+"_1";
	       var codart2="ax_"+fil+"_3";
	       var precio="ax_"+fil+"_10";
	       var precioe="ax_"+fil+"_11";
	       var cant="ax_"+fil+"_"+colum;
	       var montorgo="ax_"+fil+"_12";
	       var totrgo="ax_"+fil+"_13";
	       var codrgo="cx_"+fila+"_1";
	       var fijovar="cx_"+fila+"_3";
	       var monrecar="cx_"+fila+"_4";
          if ($(precio)){
	       if ($(precio).value!="")
	       {var nprecio= toFloat(precio);}
	       else {var nprecio= toFloat(precioe);}
           var ncant= toFloat(cant);

	       if ($(precio).value!="" || $(precioe).value!="0,00")
	       {
	         if ($(fijovar).value=="No")
	         {
	           if ($(check).checked==true)
	           {
	             if (monTot!=0)
	             {
                   if (($(precio).value!="" || $(precioe).value!="0,00") && $(cant).value!="" && $(monrecar).value!="")
                   {
                     var encontro=false;
                     var i=0;
       	             while (i<regart)
	                 {
	                  var codart="ax_"+i+"_3";
	                  var check2="ax_"+i+"_1";
	                  var precio2="ax_"+i+"_10";
	                  var precioe2="ax_"+i+"_11";
	                  var cant2="ax_"+i+"_"+colum;
                     if ($(precio2)){
	                  if ($(precio2).value!="")
	                  {var nprecio2= toFloat(precio2);}
	                  else {nprecio2= toFloat(precioe2);}
	                  var ncant2= toFloat(cant2);

	                  new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&articulo='+codart+'&recargo='+codrgo})
               	      if ($('fafactur_trajo').value=='S')
               	      {
               	        if ($(check2).checked==true && $(cant2).value!="" && $(precio2).value!="")
               	        {
               	          monTot= monTot - (nprecio2 * ncant2);
               	        }
               	        else
               	        {
               	          if ($(codart).value==$(codart2).value)
               	          {
               	            encontro=true;
               	          }
               	        }
               	      }
               	      }
	                  i++;
	                 }
	                 if (monTot!=0)
	                 {
	                   if ($('fafactur_mondesc').value!="")
	                   {
                        var totaldesc=0;
  	                   /* var  coddesc="bx_0_1";
	                    if ($(coddesc).value!="")
	                    {*/
	                      var regdesc=totalregistros2('bx',1,10);
	                      if (regdesc>0){
						  var z=0;
						  while (z<regdesc)
						  {
						    var mondesc="bx_"+z+"_3";
						    if ($(mondesc)){
						    var ndesc=toFloat(mondesc);

						    totaldesc= totaldesc + ndesc;
						    }
						   z++;
						  }
						}
						if ($('fafactur_esretencion').value=="N")
						{
						 var monsindesc=montosMarcadosSinDescuento();
						 var pordescto= (((nprecio*ncant)*totaldesc)/monsindesc);
						}
						else
						{
						  var monsindesc=montosMarcadosSinDescuento();
  						  var pordescto= (((nprecio*ncant)*totaldesc)/monsindesc);
						}

						if ($('fafactur_esretencion').value=="N")
						{
						 var nmonrec= toFloat(monrecar);
						 var monuni=((((nprecio*ncant)-pordescto)/monTot)* nmonrec);
						}
						else
						{
						  var nmonrec= toFloat(monrecar);
						  var monuni=(((nprecio*ncant)/monTot)* nmonrec);
						}
	                   }
	                 }

                   }
	             } else {monuni=0;}
	           }else {monuni=0;}
	         }
	         else
	         {
               if (($(precio).value!="" || $(precioe).value!="0,00") && $(cant).value!="" && $(monrecar).value!="")
               {
                 monTot=calcularMontTot();
                 var encontro=false;
                 var i=0;
      	         while (i<regart)
                 {
                  var codart="ax_"+i+"_3";
                  var precio2="ax_"+i+"_10";
                  var precioe2="ax_"+i+"_11";
                  var cant2="ax_"+i+"_"+colum;
                  if ($(precio2)){
                  if ($(precio2).value!="")
                  {var nprecio2= toFloat(precio2);}
                  else {nprecio2= toFloat(precioe2);}
                  var ncant2= toFloat(cant2);

                  new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&articulo='+codart+'&recargo='+codrgo})
           	      if ($('fafactur_trajo').value=='S')
           	      {
           	        if ($(cant2).value!="" && $(precio2).value!="")
           	        {
           	          monTot= monTot - (nprecio2 * ncant2);
           	        }
           	        else
           	        {
           	          if ($(codart).value==$(codart2).value)
           	          {
           	            encontro=true;
           	          }
           	        }
           	      }
           	      }
                  i++;
                 }

                 if (monTot>0)
                 {
                   var nmonrec= toFloat(monrecar);
                   var monuni= redondear((((nprecio * ncant)/monTot)* (nmonrec)),4);
                 }
                 else
                 {
                   monuni=0;
                 }
               }
	         }
	         if (!encontro)
	         {
	           if (suma_resta=='S')
	           {
	             var nmottotrgo= toFloat(totrgo);
	             var calculo= nmottotrgo + monuni;
	             $(montorgo).value=format(calculo.toFixed(2),'.',',','.');
	             var calculo2= (ncant* nprecio) + monuni;
	             $(totrgo).value=format(calculo2.toFixed(2),'.',',','.');
	           }
	           else if (suma_resta=='R')
	           {
	             $(montorgo).value="0,00";
  	             var nmottotrgo= toFloat(totrgo);
   	             var nmonrec= toFloat(montorgo);
   	             var calculo2= nmottotrgo - nmonrec;
	             $(totrgo).value=format(calculo2.toFixed(2),'.',',','.');
	           }
	         }
	       }
	       }
	       fil++;
	     }
      }
      montoTotal();
      mostrarPromedio();
    }
    else
    {
       var regart=totalregistros2('ax',3,25);
       var colum=determinarReferenciaDoc($('fafactur_tipref').value);
       var j=0;
	   while (j<regart)
	   {
         var precio="ax_"+fil+"_10";
         var precioe="ax_"+fil+"_11";
	     var cant="ax_"+fil+"_"+colum;
	     var montorgo="ax_"+fil+"_12";
	     var totrgo="ax_"+fil+"_13";

         if ($(precio)){
         if ($(precio).value!="")
         {var nprecio= toFloat(precio);}
         else {var nprecio= toFloat(precioe);}

         var ncant= toFloat(cant);

         $(montorgo).value="0,00";
         if ($(cant).value!="")
         {
           var calc=cant*precio;
           $(totrgo).value=format(calc.toFixed(2),'.',',','.');
         }
         }
        j++;
       }
    }
    //}
  }

  function calcularMontTot()
  {
    var colum=determinarReferenciaDoc($('fafactur_tipref').value);
    var calcularmonto=0;

     var regart=totalregistros2('ax',3,25);
     var fil=0;
     while (fil<regart)
     {
       var precio="ax_"+fil+"_10";
       var precioe="ax_"+fil+"_11";
       var cant="ax_"+fil+"_"+colum;

      if ($(precio)){
       if ($(precio).value!="")
       {var nprecio= toFloat(precio);}
       else {var nprecio= toFloat(precioe);}

       var ncant= toFloat(cant);

       if (($(precio).value!="" || $(precioe).value!="0,00") && $(cant).value!="")
       {
         calcularmonto= calcularmonto + ( nprecio * ncant);
       }
       }
       fil++;
     }

     if (calcularmonto>0)
     {
       var ndesc= toFloat('fafactur_totdesc');
       calcularmonto= calcularmonto - ndesc;
     }
    return calcularmonto;
  }

  function montosMarcadosSinDescuento()
  {
    var colum=determinarReferenciaDoc($('fafactur_tipref').value);
    var monmarsindesc=0;

    var regart=totalregistros2('ax',3,25);
     var fil=0;
     while (fil<regart)
     {
       var check="ax_"+fil+"_1";
       var precio="ax_"+fil+"_10";
       var precioe="ax_"+fil+"_11";
       var cant="ax_"+fil+"_"+colum;
      if ($(precio)){
       if ($(precio).value!="")
       {var nprecio= toFloat(precio);}
       else {var nprecio= toFloat(precioe);}

       var ncant= toFloat(cant);

       if ($(check).checked==true)
       {
           if ($(cant).value!="")
           {
             monmarsindesc= monmarsindesc + (nprecio*ncant);
           }
       }
       }
       fil++;
     }

    return monmarsindesc;
  }

  function montoTotal()
  {
    var montot=0;
    var regart=totalregistros2('ax',3,25);
    var colum=determinarReferenciaDoc($('fafactur_tipref').value);
    var fil=0;
    var totmonrec=0;
    var tottotal=0;

    while (fil<regart)
    {
      var precio="ax_"+fil+"_10";
      var precioe="ax_"+fil+"_11";
      var cant="ax_"+fil+"_"+colum;
      var montrec="ax_"+fil+"_12";
      var totart="ax_"+fil+"_13";

      if ($(precio)){

      if ($(totart).value!="" && (ValidarNumeroV2VE(totart)==true))
      {
       if (!ValidarNumeroV2VE(cant)) {$(cant).value="0,00";}
       if (!ValidarNumeroV2VE(precio)) {$(precio).value="0,00";}
       if (!ValidarNumeroV2VE(precioe)) {$(precioe).value="0,00";}
       if (!ValidarNumeroV2VE(montrec)) {$(montrec).value="0,00";}

       if ($(precio).value!="" && $(precio).value!="0,00")
       {var nprecio= toFloat(precio);}
       else {var nprecio= toFloat(precioe);}

       var ncant= toFloat(cant);
       var nmonrec= toFloat(montrec);
       var ntotart= toFloat(totart);
        montot= montot + ((nprecio * ncant) +  nmonrec);
        totmonrec= totmonrec+ nmonrec;
        tottotal=tottotal + ntotart;
      }
      }
     fil++;
    }

    var cuantos=marcados("D");

    if (montot>0)
    {
      var totaldesc=0;
      if (cuantos>0)
      {
       /* coddesc="bx_0_1";
		  if ($(coddesc).value!="")
		  {*/
		    var regdesc=totalregistros2('bx',1,10);
		  if (regdesc>0){
			var i=0;
			while (i<regdesc)
			{
			  var mondesc="bx_"+i+"_3";
			  if ($(mondesc)){
			  var ndesc=toFloat(mondesc);

			  totaldesc= totaldesc + ndesc;
			  }
			 i++;
			}
		  }
      }
      montot= montot - totaldesc;
    }else {montot=0;}

    $('fafactur_monfac').value=format(montot.toFixed(2),'.',',','.');
    var ntotmonrgo=toFloat('fafactur_totmonrgo');
    var ntottotart=toFloat('fafactur_tottotart');

    var cal= tottotal - totmonrec
    $('fafactur_monto').value=format(cal.toFixed(2),'.',',','.');
    $('fafactur_monrgo').value= format(totmonrec.toFixed(2),'.',',','.');
    $('fafactur_monres').value=format(montot.toFixed(2),'.',',','.');
    $('fafactur_totmonrgo').value= format(totmonrec.toFixed(2),'.',',','.');
    $('fafactur_tottotart').value=format(montot.toFixed(2),'.',',','.');
  }

  function marcados(tipo)
  {
    var marcado=0;
    if (tipo=='R')
    {
      var indice='1';
    } else {var indice='20';}

    var regart=totalregistros2('ax',3,25);
    var fil=0;
    while (fil<regart)
    {
      var campo="ax_"+fil+"_"+indice;
      if ($(campo)){
      if ($(campo).checked==true)
      {
       marcado= marcado + 1;
      }
      }
      fil++;
    }
    return marcado;
  }

  function mostrarPromedio()
  {
    $('fafactur_totcanpreart').value="0,00";
    $('fafactur_totprecio').value="0,00";
    $('fafactur_tottotart').value="0,00";
    $('fafactur_totmonrgo').value="0,00";

    var recar=0;
    var solic=0;
    var precios=0;
    var montota=0;

    var regart=totalregistros2('ax',3,25);
    var colum=determinarReferenciaDoc($('fafactur_tipref').value);
    var fil=0;
    while (fil<regart)
    {
      var precio="ax_"+fil+"_10";
      var precioe="ax_"+fil+"_11";
      var cant="ax_"+fil+"_"+colum;
      var montrec="ax_"+fil+"_12";
      var totart="ax_"+fil+"_13";

      if ($(cant)){
      if ($(cant).value!="" && (ValidarNumeroV2VE(cant)==true))
      {
        var ncant= toFloat(cant);
        if (ncant>0)
        {
         solic= solic + ncant;
        }
      }

      if (($(precio).value!="" || $(precio).value!="0,00") && (ValidarNumeroV2VE(precio)==true || ValidarNumeroV2VE(precioe)==true))
      {
        if ($(precio).value!="" && $(precio).value!="0,00") {var nprecio= toFloat(precio);} else {var nprecio= toFloat(precioe);}
        if (nprecio>0)
        {
         precios= precios + nprecio;
        }
      }

      if ($(montrec).value!="" && (ValidarNumeroV2VE(montrec)==true))
      {
        var nmontrec= toFloat(montrec);
        if (nmontrec>0)
        {
         recar= recar + nmontrec;
        }
      }

      if ($(totart).value!="" && (ValidarNumeroV2VE(totart)==true))
      {
        var ntotart= toFloat(totart);
        if (ntotart>0)
        {
         montota= montota + ntotart;
        }
      }
      }
      fil++;
    }

    $('fafactur_totcanpreart').value=format(solic.toFixed(2),'.',',','.');
    $('fafactur_totprecio').value=format(precios.toFixed(2),'.',',','.');
    $('fafactur_totmonrgo').value=format(recar.toFixed(2),'.',',','.');
    var montota2=montota;
    $('fafactur_tottotart').value=format(montota.toFixed(2),'.',',','.');

    var ntotaldesc= toFloat('fafactur_mondesc');
    var calcu= montota - ntotaldesc;
    $('fafactur_monfac').value=format(calcu.toFixed(2),'.',',','.');

    var variable1= toFloat('fafactur_totmonrgo');
    var variable2= toFloat('fafactur_tottotart');
    var calcul= variable2 - variable1;
    $('fafactur_monto').value=format(calcul.toFixed(2),'.',',','.');
    $('fafactur_monrgo').value=format(variable1.toFixed(2),'.',',','.');

    var nmoncanc= toFloat('fafactur_moncan');
    var calculo= montota - ntotaldesc - nmoncanc;
    $('fafactur_monres').value=format(calculo.toFixed(2),'.',',','.');
    if (nmoncanc>0)
    {
    $('fafactur_vuelto').value=format(calculo.toFixed(2),'.',',','.');
    }
    else
    {
     $('fafactur_vuelto').value="0,00";
    }

  }

 function recargo_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var recargo=$(id).value;

   var recargorepetido=false;
   var am=totalregistros2('cx',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="cx"+"_"+i+"_1";
   if ($(codigo))
   {
    var recargo2=$(codigo).value;

    if (i!=fila)
    {
      if (recargo==recargo2)
      {
        recargorepetido=true;
        break;
      }
    }
    }
   i++;
   }
   return recargorepetido;
 }


 function ajaxrecargos(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

    var colnom=col+1;
    var colrefij=col+2;
    var colmonto=col+3;
    var colcta=col+4;
    var coltipo=col+5;
    var colmonto2=col+6;

    var nombre=name+"_"+fil+"_"+colnom;
    var recfij=name+"_"+fil+"_"+colrefij;
    var monto=name+"_"+fil+"_"+colmonto;
    var cta=name+"_"+fil+"_"+colcta;
    var tipo=name+"_"+fil+"_"+coltipo;
    var monto2=name+"_"+fil+"_"+colmonto2;
    var cod=$(id).value;
    var montot=retornaMonto(cod);
    var montot1=retornaMonto2(cod);
    var valmonto=$(monto).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        if (!recargo_repetido(id))
        {
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&cajtexmos='+nombre+'&cajtexcom='+id+'&recfij='+recfij+'&monto='+monto+'&cta='+cta+'&tipo='+tipo+'&monto2='+monto2+'&montot='+montot+'&montot1='+montot1+'&valmonto='+valmonto+'&codigo='+cod})
        }
        else
        {
         alert('El Recargo ya fue asignado');
         $(id).value="";
        }
      }
    }
 }

 function retornaMonto(codrgo)
 {
    var monTot=calcularMontTot();
        var colum=determinarReferenciaDoc($('fafactur_tipref').value);
    if (monTot!=0)
    {
	    var regart=totalregistros2('ax',3,25);
	    var i=0;
	    while (i<regart)
	    {
	      var codart="ax_"+i+"_3";
	      var precio2="ax_"+i+"_10";
	      var precioe2="ax_"+i+"_11";
	      var cant2="ax_"+i+"_"+colum;
	      if ($(codart)){

	      if ($(precio2).value!="") {var nprecio2= toFloat(precio2);}else {nprecio2= toFloat(precioe2);}
	      var ncant2= toFloat(cant2);

	      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&articulo='+codart+'&recargo='+codrgo})
	      if ($('fafactur_trajo').value=='S')
	      {
	       if ($(cant2).value!="" && $(precio2).value!="")
	       {
	         monTot= monTot - (nprecio2 * ncant2);
	       }
	     }
	     }
	     i++;
	    }
	 }
    return monTot;
 }

 function retornaMonto2(codrgo)
 {
    var monTot=montoMarcados();
    var colum=determinarReferenciaDoc($('fafactur_tipref').value);
    var regart=totalregistros2('ax',3,25);
    var i=0;
    while (i<regart)
    {
      var check="ax_"+i+"_1";
      var codart="ax_"+i+"_3";
      var precio2="ax_"+i+"_10";
      var precioe2="ax_"+i+"_11";
      var cant2="ax_"+i+"_"+colum;

     if ($(codart)){
      if ($(precio2).value!="") {var nprecio2= toFloat(precio2);}else {nprecio2= toFloat(precioe2);}
      var ncant2= toFloat(cant2);

      if ($(check).checked==true)
      {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&articulo='+codart+'&recargo='+codrgo})
        if ($('fafactur_trajo').value=='S')
        {
         if ($(cant2).value!="" && $(precio2).value!="")
         {
           monTot= monTot - redondear((nprecio2 * ncant2),2);
          }
        }
      }
      }
       i++;
    }
    return monTot;
 }

 function CalculoMontoRgo(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var colrgo=col-3;
   var coltipo=col+2;
   var colnom=col-2;
   var colrefij=col-1;
   var colcta=col+1;
   var colmonto2=col+3;

   var codrgo=name+"_"+fil+"_"+colnom;
   var nombre=name+"_"+fil+"_"+colnom;
   var recfij=name+"_"+fil+"_"+colrefij;
   var cta=name+"_"+fil+"_"+colcta;
   var tipo=name+"_"+fil+"_"+coltipo;
   var monto2=name+"_"+fil+"_"+colmonto2;

   var nmonto= toFloat(id);
   var nmonfac= toFloat('fafactur_monfac');

   if ($(id).value!="")
   {
      if (!ValidarNumeroV2VE(id))
      {
        alert_('El Dato debe ser N&uacute;merico');
        $(id).value="0,00";
      }
      else if (nmonto<0)
      {
        alert('El Valor debe ser mayor que Cero');
        $(id).value="0,00";
      }
      else
      {
        $(id).value=$(id).value;
      }
   }
   calcularTotalRecargos();

   if ($(codrgo).value!="")
   {
     if ($(tipo).value=='P')
     {
       if (nmonto>nmonfac)
       {
         alert('El Recargo no puede ser aplicado debido a que sobrepasa el Monto Total de la Factura');
         $(codrgo).value="";
         $(nombre).value="";
         $(recfij).value="";
         $(id).value="0,00";
         $(cta).value="";
         $(tipo).value="";
         $(monto2).value="0,00";
       }
       else
       {
         $(id).value=$(id).value;
         calcularTotalRecargos();
         montoTotal();
       }
     }
   }
 }

 function aceptar2()
 {
   var loguse=$('fafactur_loguse').value;
   var clave=$('fafactur_password').value;
   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=8&login='+loguse+'&clave='+clave+'&codigocaja='+codcaj})
 }

 function aceptar1()
 {
   var codcaj=$('fafactur_codcaj').value;
   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&codigocaja='+codcaj})
 }

 function cerrar2()
 {
  location.href=getUrlModulo()+'cerrar';
 }

  function cambios()
 {
   if ($('fafactur_docrefiera').value!=$('fafactur_tipref').value)
   {
   	 $('descuent').hide();
   	 $('recarg').hide();
   	 $('fafactur_monfac').value="0,00";
   	 $('fafactur_totdesc').value="0,00";
     $('fafactur_mondesc').value="0,00";
   }

   if ($('fafactur_tipref').value=='P')
   {
   	 $('descuent').hide();
   	 $('recarg').hide();
   	 $('fafactur_combo').readonly=true;
   	 $$('.botoncat')[2].hide();
     $('pedid').show();
     $('despach').hide();
   }
   if ($('fafactur_tipref').value=='D' || $('fafactur_tipref').value=='VC')
   {
   	 $('despach').show();
   	 $('recarg').hide();
   	 $('pedid').hide();
   	 $('fafactur_combo').readonly=true;
   	 $$('.botoncat')[2].hide();
   }
   if ($('fafactur_tipref').value=='V')
   {
   	 $('fafactur_combo').readonly=false;
   	 $$('.botoncat')[2].show();
     $('pedid').hide();
     $('despach').hide();
   }

   $('fafactur_docrefiera').value=$('fafactur_tipref').value;
   var tipref=$('fafactur_tipref').value;
   new Ajax.Updater('articulos',getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=16&tipref='+tipref})
 }

 function descuentos()
 {
 	if ($('fafactur_apliclades').value=='S')
 	{
 		if ($('fafactur_password').value=='')
 		{
          if ($('fafactur_usuarios').value=='')
          {
          	$('ClaveDes').show();
          }
 		}
 		else
 		{
 		  $('datosDesc').show();
 		}
 	}
 	else
 	{
 	  $('datosDesc').show();
 	}
 }

 function recargos()
 {
   $('datosRecarg').show();
 }

 function ocultar(div)
 {
 	$(div).hide();
 	var colum=determinarReferenciaDoc($('fafactur_tipref').value);
 	if (div=='ClaveDes')
 	{
 	  $('fafactur_password').value="";
 	  $('fafactur_porcentajedescto').value="0";
 	}

 	if (div=='datosRecarg')
 	{
      if ($('recarg').visible() && $('id').value=='')
      {
        var fil=0;
        var facart=totalregistros2('ax',3,25);
	    while (fil<facart)
	    {
	     var recargo="ax_"+fil+"_12";
	     var check="ax_"+fil+"_1";
	     var totart="ax_"+fil+"_13";
	     var precio="ax_"+fil+"_10";
         var precioe="ax_"+fil+"_11";
	     var cant="ax_"+fil+"_"+colum;

       if ($(precio)){
	     if ($(precio).value!="") {var col9=toFloat(precio);}else {var col9=toFloat(precioe);}
         var colcant=toFloat(cant);

         var calculo= colcant * col9;

	     $(recargo).value='0,00';
	     $(totart).value=format(calculo.toFixed(2),'.',',','.');

	     if ($(check).checked==false)
	     {
           marcarArtRep(fil,false)
	     }
	     else
	     {
          $(check).ckecked=true;
          marcarArtRep(fil,true)
	     }
	     }
	   fil++;
	   }
	   actualizarRecargos();
	   recalcularRecargos();
	   montoTotal();
      }
 	}
 }

 function ajaxdescuentos(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

    var coldes=col+1;
    var colmonto=col+2;
    var colcta=col+3;
    var colcant=col+4;
    var coldescto=col+5;
    var coltipo=col+6;
    var coltiporet=col+7;

    var descripcion=name+"_"+fil+"_"+coldes;
    var montodesc=name+"_"+fil+"_"+colmonto;
    var cuenta=name+"_"+fil+"_"+colcta;
    var cantidad=name+"_"+fil+"_"+colcant;
    var descuento=name+"_"+fil+"_"+coldescto;
    var tipo=name+"_"+fil+"_"+coltipo;
    var tiporet=name+"_"+fil+"_"+coltiporet;
    var cod=$(id).value;

    var eldesc=montoDescuento(fil);
    var nmonfac= toFloat('fafactur_monfac');
	var ntotmonrgo= toFloat('fafactur_totmonrgo');
	var ntotdesc= toFloat('fafactur_totdesc');
	var porcentajedesc=toFloat('fafactur_porcentajedescto');
	var monto=toFloat('fafactur_monto');
	var aplicaclades=$('fafactur_apliclades').value;
	var valmontodesc= toFloat(montodesc);
	var valcant=toFloat(cantidad);
	var totaltotarti= toFloat('fafactur_tottotart');


    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        if (!descuento_repetido(id))
       {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&cajtexmos='+descripcion+'&cajtexcom='+id+'&montodesc='+montodesc+'&cuenta='+cuenta+'&cantidad='+cantidad+'&tipo='+tipo+'&tiporet='+tiporet+'&descuento='+descuento+'&eldescuento='+eldesc+'&monfac='+nmonfac+'&totalrgo='+ntotmonrgo+'&totaldesc='+ntotdesc+'&porcentajedesc='+porcentajedesc+'&monto14='+monto+'&aplicaclades='+aplicaclades+'&valmontodesc='+valmontodesc+'&valcant='+valcant+'&totaltotarti='+totaltotarti+'&codigo='+cod})
       }
       else
       {
         alert('El Descuento ya fue asignado');
         $(id).value="";
       }
      }
    }
 }

  function calcularTotalDescuento()
  {
    var miTot=0;

    var regart=totalregistros2('ax',3,25);
    var fil=0;
    while (fil<regart)
    {
      var montodescto="ax_"+fil+"_18";
      if ($(montodescto)){
      $(montodescto).value="0,00";
      }
      fil++;
    }

    var cuantos=marcados("D");
    /*var coddesc="bx_0_1";

    if ($(coddesc).value!="")
	{*/
	var regdesc=totalregistros2('bx',1,10);
    if (regdesc>0){
	  var i=0;
	  while (i<regdesc)
	  {
		var tipo="bx_"+i+"_7";
		var mondescto="bx_"+i+"_3";
		var descue="bx_"+i+"_6";
		if ($(tipo)){
		var nmondescto= toFloat(mondescto);
		var ndescue= toFloat(descue);
	    if (cuantos>0)
	    {
	      var j=0;
		  while (j<regart)
		  {
            var montodescto="ax_"+j+"_18";
		    var apldescto="ax_"+j+"_20";
		    var cant="ax_"+j+"_7";
		    var precio="ax_"+j+"_10";
		    var precioe="ax_"+j+"_11";
		    var montrgo="ax_"+j+"_12";
           if ($(cant)){
		    var ncant= toFloat(cant);
		    if ($(precio).value!="")
		    {
    	      var nprecio= toFloat(precio);
    	    }
    	    else
    	    {
     	      var nprecio= toFloat(precioe);
    	    }
    	    var nmontodesc= toFloat(montodescto);
            var nmontrgo= toFloat(montrgo);

		    if ($(apldescto).checked==true)
		    {
		      if ($(tipo).value=='M')
		      {
                var calculo= ncant*nprecio;
                if (calculo>0)
                {
                  var propor=Proporcion(j);
                  var cal=nmontodesc + ((nmondescto * propor)/100);
                  $(montodescto).value=format(cal.toFixed(2),'.',',','.');
                }
		      }
		      else
		      {
		         if ($('fafactur_esretencion').value=='N')
	             {
	               var cal=nmontodesc + ((ndescue/100)*(ncant*nprecio));
                   $(montodescto).value=format(cal.toFixed(2),'.',',','.');
	             }
	             else
	             {
	               var cal=nmontodesc + ((ndescue/100)*nmontrgo);
                   $(montodescto).value=format(cal.toFixed(2),'.',',','.');
	             }
		      }
		    }
		    }
		   j++;
		  }
	    }
	     miTot= miTot + nmondescto;
	     }
		i++;
	  }
    }

    if (cuantos>0)
    {
      $('fafactur_totdesc').value=format(miTot.toFixed(2),'.',',','.');
    }else {$('fafactur_totdesc').value="0,00";}



    $('fafactur_mondesc').value=$('fafactur_totdesc').value;
    var totadesc= toFloat('fafactur_mondesc');
    if ($('fafactur_tottotart').value!="")
    {
      var totaltotarti= toFloat('fafactur_tottotart');
      var montota= totaltotarti -totadesc;
      $('fafactur_monfac').value=format(montota.toFixed(2),'.',',','.');
    }
    ajustarDescuento();
  }

  function Proporcion(fila)
  {
    var montot=0;
    var regart=totalregistros2('ax',3,25);
    var fil=0;
    while (fil<regart)
    {
      var cant="ax_"+fil+"_7";
      var totart="ax_"+fil+"_13";
      var precio="ax_"+fil+"_10";
      var precioe="ax_"+fil+"_11";
      var apldsec="ax_"+fil+"_20";
      var cant2="ax_"+fila+"_7";
      var precio2="ax_"+fila+"_10";
      var precioe2="ax_"+fila+"_11";
     if ($(cant)){
      var ncant= toFloat(cant);
      if ($(precio).value!="") {var nprecio= toFloat(precio);}else {var nprecio= toFloat(precioe);}
      var ncant2= toFloat(cant2);
      if ($(precio2).value!="") {var nprecio2= toFloat(precio2);}else {var nprecio2= toFloat(precioe2);}

      if ($(totart).value!="" && (!ValidarNumeroV2VE(totart)))
      {
         if (!ValidarNumeroV2VE(cant))
         {
           $(cant).value="0,00";
         }
         if ($(apldsec).checked==true)
         {
           montot= montot + (ncant*nprecio);
         }
      }
      }
      fil++;
    }

    var proporcion= (((ncant2*nprecio2)*100)/montot);

    return proporcion;
  }

  function ajustarDescuento()
  {
    var acumulador=0;
    var diferencia=0
    var regart=totalregistros2('ax',3,25);
    var fil=0;
    while (fil<regart)
    {
      var apldsec="ax_"+fil+"_20";
      var mondesc="ax_"+fil+"_18";
      if ($(mondesc)){
      var nmondesc= toFloat(mondesc);

      if ($(apldsec).checked==true)
      {
        acumulador= acumulador + nmondesc;
      }
      }
      fil++;
    }

    var ndescuento= toFloat('fafactur_mondesc');
    var diferencia= redondear((ndescuento - (redondear(acumulador,2))),2);
    var ult=ultimoMarcado();
    var mondesc2="ax_"+ult+"_18";
    if (diferencia!=0 && ult!=-1)
    {
      var nmondesc2=toFloat(mondesc2);
      var mdesc2=nmondesc2 + diferencia;
      $(mondesc2).value=format(mdesc2.toFixed(2),'.',',','.');
    }
  }

  function ultimoMarcado()
  {
    var regart=totalregistros2('ax',3,25);
    var fil=0;
    var ultimo=-1;
    while (fil<regart)
    {
      var apldsec="ax_"+fil+"_20";
      if ($(apldsec)){
      if ($(apldsec).checked==true)
      {
        ultimo=fil;
      }
      }
      fil++;
    }
    return ultimo;
  }

  function descuento_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var descuento=$(id).value;

   var descuentorepetido=false;
   var am=totalregistros2('bx',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="bx"+"_"+i+"_1";
    if ($(codigo))
    {
    var descuento2=$(codigo).value;

    if (i!=fila)
    {
      if (descuento==descuento2)
      {
        descuentorepetido=true;
        break;
      }
    }
    }
   i++;
   }
   return descuentorepetido;
 }

 function montoDescuento(fila)
 {
   var eldescuento=0;
   var mondesc="bx_"+fila+"_3";
   var tipdesc="bx_"+fila+"_7";
   var tipret="bx_"+fila+"_8";

   var nmondesc= toFloat(mondesc);

   if ($(tipdesc).value=='P')
   {
     if ($('fafactur_totprecio').value!="")
     {
       if ($(tipret).value!='S')
       {
         var regart=totalregistros2('ax',3,25);
		 var fil=0;
		 while (fil<regart)
		 {
		   var apldsec="ax_"+fil+"_20";
		   var montodesc="ax_"+fil+"_18";
		   var montototrgo="ax_"+fil+"_12";
		   var montototart="ax_"+fil+"_13";
           if ($(montodesc)){
		   var nmontototart= toFloat(montototart);
		   var montototrgo= toFloat(montototrgo);

		     if ($(apldsec).checked==true)
		     {
		       var calculo= (((nmondesc * nmontototart) - montototrgo)/100);
               $(montodesc).value=format(calculo.toFixed(2),'.',',','.');
               eldescuento= eldescuento + calculo;
		     }
		     }
		    fil++;
		   }
		 var nmonfac= toFloat('fafactur_monfac');
		 var ntotmonrgo= toFloat('fafactur_totmonrgo');
		 var ntotdesc= toFloat('fafactur_totdesc');
		 var descto= nmonfac - ntotmonrgo + ntotdesc;
       }
       else
       {
         var regart=totalregistros2('ax',3,25);
		 var fil=0;
		 while (fil<regart)
		 {
		   var apldsec="ax_"+fil+"_20";
		   var montodesc="ax_"+fil+"_18";
		   var montototrgo="ax_"+fil+"_12";
		   var montototart="ax_"+fil+"_13";
           if ($(montodesc)){
		   var nmontototart= toFloat(montototart);
		   var montototrgo= toFloat(montototrgo);

		     if ($(apldsec).checked==true)
		     {
		       var calculo= ((nmondesc * montototrgo)/100);
               $(montodesc).value=format(calculo.toFixed(2),'.',',','.');
               eldescuento= eldescuento + calculo;
		     }
		     }
		    fil++;
		  }
       }
    }
  }
   return eldescuento;
 }

 function calcularMondesc(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcoddes=col-1;
   var coltipdesc=col+4;
   var colcant=col+2;
   var coldes=col-2;
   var colcuen=col+1;
   var coldesc=col+3;
   var coltipret=col+5;

   var coddes=name+"_"+fil+"_"+colcoddes;
   var tipdesc=name+"_"+fil+"_"+coltipdesc;
   var cant=name+"_"+fil+"_"+colcant;
   var descripcion=name+"_"+fil+"_"+coldes;
   var cuenta=name+"_"+fil+"_"+colcuen;
   var descue=name+"_"+fil+"_"+coldesc;
   var tiporet=name+"_"+fil+"_"+coltipret;

   var monto= toFloat(id);
   var nmonto= toFloat('fafactur_monto');
   var nporcdesc= toFloat('fafactur_porcentajedescto');
   var calculo= ((nmonto * nporcdesc)/100);

    if ($(id).value=="")
    {
      $(id).value="0,00";
    }

    if ($(coddes).value!="")
    {
      if ($(tipdesc).value=='M')
      {
        if ((monto > calculo) && $('fafactur_apliclades').value=='S')
        {
          alert('El Porcentaje del Descuento sobrepasa el l�mite permitido para el Usuario');
          $(id).value="0,00";
        }
      }
      var cuantos=marcados("D");

      if (cuantos==0) {cuantos=1;}
      if ($(tipdesc).value=='M')
      {
        var totfac=totalFactura();
        var totdesct=toFloat('fafactur_mondesc');
        if ((monto> totfac) || (totdesct>totfac))
        {
          alert('El Descuento no puede ser aplicado debido a que sobrepasa el Monto Total de la Factura');
          var ntotdesc= toFloat('fafactur_totdesc');
          var cal=ntotdesc - monto;

          $('fafactur_totdesc').value=format(cal.toFixed(2),'.',',','.');
          $(coddes).value="";
          $(descripcion).value="";
          $(tipdes).value="";
          $(cant).value="1";
          $(id).value="0,00";
          $(cuenta).value="";
          $(descue).value="";
          $(tiporet).value="";
        }
        else
        {
         $(id).value=$(id).value;
         calcularTotalDescuento();
         montoTotal();
         actualizarRecargos();
         recalcularRecargos();
         montoTotal();
        }
      }
    }
   }
  }

  function totalFactura()
  {
    var montot=0;

    var regart=totalregistros2('ax',3,25);
    var fil=0;
    while (fil<regart)
    {
      var precio="ax_"+fil+"_10";
      var precioe="ax_"+fil+"_11";
      var cant="ax_"+fil+"_9";
      var totart="ax_"+fil+"_13";
     if ($(totart)){
      if ($(totart).value!="" && (ValidarNumeroV2VE(totart)==true))
      {
       if (!ValidarNumeroV2VE(cant)) {$(cant).value="0,00";}

       if ($(precio).value!="") {var nprecio= toFloat(precio);}else {var nprecio= toFloat(precioe);}
       var ncant= toFloat(cant);
        montot= montot + (nprecio * cant);
      }
      }
     fil++;
    }

    var totfactura=montot;

    return totfactura;
  }

  function calcularmontopago(e,id)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

   var colgenmov=col+2;
   var genmov=name+"_"+fil+"_"+colgenmov;
    var num1= toFloat(id);

    calcularPago();

  if ($(id).value!="" && num1!=0)
  {
	   if (!validarnumero(id))
	   {
	    alert_('Monto Inv&aacute;lido');
	    $(id).value="0,00";
	   }
	   else if (num1<0)
	   {
	    alert('El Monto debe ser mayor que cero');
	    $(id).value="0,00";
	   }else{
	     if ($(genmov).value=='S')
	     {
	       $('divcodtip').show();
	       $('fafactur_filgenmov').value=fil;
	     }
	   }
   }
   else
   {
     if ($(genmov).value=='S')
     {
       $('divcodtip').show();
       $('fafactur_filgenmov').value=fil;
     }

    var nmoncan= toFloat('fafactur_moncan');
    var nmonfac= toFloat('fafactur_monfac');
    var cal2= nmonfac - nmoncan;
    $(id).value=format(cal2.toFixed(2),'.',',','.');
   }
    calcularPago();
  }
  }

  function calcularPago()
  {
    $('fafactur_moncan').value="0,00";
    $('fafactur_vuelto').value="0,00";
    $('fafactur_monres').value=$('fafactur_monfac').value;

    var regpag=totalregistros2('dx',1,10);
    var fil=0;
    while (fil<regpag)
    {
      var monto="dx_"+fil+"_6";
      if ($(monto))
      {
      var nmonto= toFloat(monto);
      var nmoncan= toFloat('fafactur_moncan');

      var calculo= nmoncan + nmonto;
      if ($(monto).value!="")
      {
        $('fafactur_moncan').value=format(calculo.toFixed(2),'.',',','.');
      }
      }
     fil++;
    }
    var nmoncan= toFloat('fafactur_moncan');
    var nmonres= toFloat('fafactur_monres');
    var cal2= nmonres - nmoncan;
    $('fafactur_monres').value=format(cal2.toFixed(2),'.',',','.');
    $('fafactur_moncan').value=format(nmoncan.toFixed(2),'.',',','.');
    if ($('fafactur_monfac').value!="0,00")
    {
      var nmonfac= toFloat('fafactur_monfac');
      var nmoncan= toFloat('fafactur_moncan');
      var cal3= nmoncan - nmonfac;
      if (nmoncan > nmonfac)
      {
       $('fafactur_vuelto').value=format(cal3.toFixed(2),'.',',','.');
      }
    }
  }


  function anular()
  {
    var referencia="RF"+$('fafactur_numcom').value.substr(2,6);
    var reffac=$('fafactur_reffac').value;
    var fecfac=$('fafactur_fecfac').value;

    window.open(getUrlModulo()+'anular?reffac='+reffac+'&referencia='+referencia+'&fecfac='+fecfac,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=400,resizable=yes,left=400,top=120');
  }

  function articulo_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var articulo=$(id).value;

   var articulorepetido=false;
   var am=totalregistros2('ax',3,25);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_3";
    if ($(codigo))
    {
    var articulo2=$(codigo).value;

    if (i!=fila)
    {
      if (articulo==articulo2)
      {
        articulorepetido=true;
        break;
      }
    }
    }
   i++;
   }
   return articulorepetido;
 }


 function ajaxarticulosfactura(e,id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var colpre=col+7;
    var colpre2=col+8;
    var colcta=col+14;
    var colblan2=col+19;
    var coluni= col + 2;
    var colcant= col + 11;
    var colexis= col+3;
    var colrgo=col+9;
    var colcantot= col+4;
    var coltoto=col+10;
    var colblan=col+18;

    var descripcion=name+"_"+fil+"_"+coldes;
    var precio=name+"_"+fil+"_"+colpre;
    var precio2=name+"_"+fil+"_"+colpre2;
    var ctaprove=name+"_"+fil+"_"+colcta;
    var blanco2=name+"_"+fil+"_"+colblan2;
    var unidad=name+"_"+fil+"_"+coluni;
    var cantidad=name+"_"+fil+"_"+colcant;
    var existencia=name+"_"+fil+"_"+colexis;
    var montrgo=name+"_"+fil+"_"+colrgo;
    var cantot=name+"_"+fil+"_"+colcantot;
    var total=name+"_"+fil+"_"+coltoto;
    var blanco=name+"_"+fil+"_"+colblan;

    var cod=$(id).value;

    var londefart=$('fafactur_lonart').value;
    var lonart=$(id).value.length;
    var canent=cantidadEntregarArt(fil,cod);
    var docrefiere=$('fafactur_tipref').value;
    var filagrid= fil;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
       if (londefart <= lonart)
       {
        //if (!articulo_repetido(id))
        //{
          new Ajax.Updater('lista',getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&cajtexmos='+descripcion+'&cajtexcom='+id+'&canent='+canent+'&docref='+docrefiere+'&ctaprove='+ctaprove+'&blanco2='+blanco2+'&unidad='+unidad+'&cantidad='+cantidad+'&existencia='+existencia+'&montrgo='+montrgo+'&cantot='+cantot+'&total='+total+'&filagrid='+filagrid+'&blanco='+blanco+'&precio='+precio+'&precio2='+precio2+'&codigo='+cod})
          if (docrefiere=='V')
          {
            new Ajax.Updater(precio, getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&id='+$('id').value+'&precio2='+precio2+'&codigo='+cod});

          }
        /*}
        else
        {
          alert('C�digo del Art�culo est� Repetido');
          $(id).value="";
        }*/
        }
      else
      {
        alert('El Articulo debe ser de Ultimo Nivel');
        $(id).value="";
      }
      }
    }
 }

 function cantidadEntregarArt(fil,codart)
 {
   var cant_entreg=0;
   var am=totalregistros2('ax',3,25);
   var i=0;
   while (i<am)
   {
    var codart1="ax"+"_"+i+"_3";
    var cansol="ax"+"_"+i+"_7";
    var canent="ax"+"_"+i+"_8";
    if ($(codart1)){
    var ncanent=toFloat(canent);

     if (i!=fil)
     {
       if ($(codart1).value==codart)
       {
         if ($(cansol).value!="")
         {
           cant_entreg= cant_entreg + ncanent;
         }
       }
     }
     }
    i++;
   }

   return cant_entreg;
 }

 function colocarengrid(valor,fila)
 {
   var ctaprove="ax_"+fila+"_17";
   var blanco2="ax_"+fila+"_22";

   var aux=valor.split("/");

   $(ctaprove).value=aux[0];
   $(blanco2).value=aux[2];
   $('listArt').hide();
   var am=totalregistros2('ax',3,25);
   if ($('id').value=='' && $('fafactur_tipref').value!='V')
   {
     if (fila< am)
     {
       revisarconsigancion(fila+1);
     }
   }
 }

 function revisarconsigancion(fil)
 {
   var l=fil;
 }

 function despachos_pedido()
 {
   if ($('fafactur_rifpro').value!="")
   {
     var cirif=$('fafactur_codcli').value;
     var tipref=$('fafactur_tipref').value;
     new Ajax.Updater('peddes',getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=13&tipref='+tipref+'&cedula='+cirif})
   }
   else
   {
     alert('Debe Introducir la C.I � R.I.F del Cliente');
   }
 }

 function ocul_ped_des()
 {
   $('fafactur_rgofijos').value='S';
   datosRecargos();
   var am=totalregistros('ex',2,20);
   if (am>0)
   {
	   var fil=0;
	   var filrow=0;
	   while (fil<am)
	   {
	    var chk="ex_"+fil+"_1";
	    var codref="ex_"+fil+"_2";
	    var desref="ex_"+fil+"_3";
	    var fecref="ex_"+fil+"_4";
	    if ($(chk)){
	    if ($(chk).checked==true)
	    {
	     var codigoref= $(codref).value;
	     $('fafactur_desfac').value=$('fafactur_desfac').value+$(desref).value+", ";
	     var bc=totalregistros2('ax',3,25);
	     var codart="ax_0_3";
	     if (bc>=1 &&  $(codart).value!="")
	     {
	       var filrow=bc+1;
	     }
	     else
	     {
	       if (bc==0)
	       {
	        var filrow=bc;
	       }
	     }
	     var codart2="ax_"+filrow+"_3";
	     if ($(codart2).value=="")
	     {
	       var colum=2;
	       gridarticulosfocus(filrow,colum,codigoref);
	       if ($('fafactur_tipref').value=='D' || $('fafactur_tipref').value=='VC')
	       {
             actualizardescuento();
	       }
	     }

	    }
	    }
	   fil++;
	   }
   }
   else
   {
     $('listaPedidosDespachos').hide();
   }
 }

  function referencia_repetida(codrefe,fila)
 {
   var referenciarepetida=false;
   var am=totalregistros2('ax',3,25);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_2";
    if ($(codigo))
    {
    var codrefe2=$(codigo).value;

    if (i!=fila)
    {
      if (codrefe==codrefe2)
      {
        referenciarepetida=true;
        break;
      }
    }
    }
   i++;
   }
   return referenciarepetida;
 }

 function gridarticulosfocus(filrow,colum,codigoref)
 {
   var codrefe="ax_"+filrow+"_2";
   if ($(codrefe).value!="")
   {
    $(codrefe).value=$(codrefe).value.pad(8, '0',0);
    var codigoref=$(codrefe).value;
   }
   var tipref=$('fafactur_tipref').value;
   if (!referencia_repetida(codigoref,filrow))
   {
     new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=14&codrefer='+codigoref+'&tipref='+tipref})
   }
   else
   {
    if (tipref=='P')
    {
      alert('El Pedido ya fue Seleccionado');
    }
    else
    {
      alert('El Despacho ya fue Seleccionado');
    }
    $('listaPedidosDespachos').hide();
    var aux=$('fafactur_desfac').value.split(',');
    $('fafactur_desfac').value="";
    var j=0;
    while (j<((aux.length)-2))
    {
     $('fafactur_desfac').value=$('fafactur_desfac').value+aux[j]+",";
     j++;
    }
   }
 }

 function colocarArticulos(arreglo)
 {
   var filastot=totalregistros('ax',3,25);
   var aux=arreglo.split('!');
   var i=0;
   while (i< (aux.length-1))
   {
     var aux2=aux[i].split('_');
//     var oculid="ax"+filastot+"id";
     var check="ax"+"_"+filastot+"_1";
     var codref="ax"+"_"+filastot+"_2";
     var codart="ax"+"_"+filastot+"_3";
     var desart="ax"+"_"+filastot+"_4";
     var unimed="ax"+"_"+filastot+"_5";
     var exiart="ax"+"_"+filastot+"_6";
     var cansol="ax"+"_"+filastot+"_7";
     var canent="ax"+"_"+filastot+"_8";
     var candes="ax"+"_"+filastot+"_9";
     var precio="ax"+"_"+filastot+"_10";
     var precio2="ax"+"_"+filastot+"_11";
     var monrgo="ax"+"_"+filastot+"_12";
     var total="ax"+"_"+filastot+"_13";
     var cant="ax"+"_"+filastot+"_14";
     var preant="ax"+"_"+filastot+"_15";
     var canentart="ax"+"_"+filastot+"_16";
     var ctapro="ax"+"_"+filastot+"_17";
     var mondes="ax"+"_"+filastot+"_18";
     var r="ax"+"_"+filastot+"_19";
     var d="ax"+"_"+filastot+"_20";
     var blanco1="ax"+"_"+filastot+"_21";
     var blanco2="ax"+"_"+filastot+"_22";

   //  $(oculid).value='9';
     $(check).value=aux2[0];
     $(codref).value=aux2[1];
     $(codart).value=aux2[2];
     $(desart).value=aux2[3];
     $(unimed).value=aux2[4];
     $(exiart).value=aux2[5];
     $(cansol).value=aux2[6];
     $(canent).value=aux2[7];
     $(candes).value=aux2[8];
     $(precio).value=aux2[9];
     $(precio2).value=aux2[10];
     $(monrgo).value=aux2[11];
     $(total).value=aux2[12];
     $(cant).value=aux2[13];
     $(preant).value=aux2[14];
     $(canentart).value=aux2[15];
     $(ctapro).value=aux2[16];
     $(mondes).value=aux2[17];
     $(r).value=aux2[18];
     $(d).value=aux2[19];
     $(blanco1).value=aux2[20];
     $(blanco2).value=aux2[21];
     filastot=filastot + 1;
     i++;
   }
 }

 function cansol(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colmrgo=col+5;
   var coltotal=col+6;
   var coldistot=col+7;
   var colexis=col-1;
   var colblanco=col+14;
   var colart=col-4;
   var colprec=col+3;
   var colprec2=col+4;


   var monrgo=name+"_"+fil+"_"+colmrgo;
   var total=name+"_"+fil+"_"+coltotal;
   var exist=name+"_"+fil+"_"+colexis;
   var distot=name+"_"+fil+"_"+coldistot;
   var blanco=name+"_"+fil+"_"+colblanco;
   var codart=name+"_"+fil+"_"+colart;
   var cod=$(codart).value;
   var precio=name+"_"+fil+"_"+colprec;
   var precioe=name+"_"+fil+"_"+colprec2;

   var am=totalregistros2('ax',3,25);

     if ($(precio).value!="") {var num4= toFloat(precio);}else {var num4= toFloat(precioe);}
     var num1=toFloat(id);
     var num3=toFloat(distot);
 if (am>0)
 {
   if ($(id).value!="")
   {
	   if (!validarnumero(id))
	   {
	    alert_('El Dato debe ser n&uacute;merico');
	    $(id).value="0,00";
	    $(monrgo).value="0,00";
	    $(total).value="0,00";
	    recargosm();

	   }
	   else if (num1<0)
	   {
	    alert('El valor debe ser mayor que cero');
	    $(id).value="0,00";
	    $(monrgo).value="0,00";
	    $(total).value="0,00";
	    recargosm();
	   }
	   else
	   {
	    $(exist).value=$(distot).value;
	    var num2=toFloat(exist);
        if ($(blanco).value=='S' || num1<=num2)
        {
          var canent=cantidadEntregarArt(fil,cod);
          if (num1<=(num3-canent))
          {
           if ($(id).value!="")
           {
             var cal=num3-num1-canent;
             $(exist).value=format(cal.toFixed(2),'.',',','.');
             distribuirexistencia(fil,cod);
             if ($(precio).value!="")
             {
               var producto= num4*num1;
               if (!validarnumero(monrgo))
               {
                 if ($('id').value=="")
                 {
                   $(monrgo).value="0,00";
                 }
                 var regrgo=totalregistros('cx',1,10);
			  	  var j=0;
				  while (j<regrgo)
				  {
			        distribuirRecargos(j,"R");
				   j++;
				  }
			  }

               var calmontot=calcularMontTot();
               if (calmontot>0)
               {
                  var colum=determinarReferenciaDoc($('fafactur_tipref').value);

				    var colart=totalregistros2('ax',3,25);
				    var fi=0;
					while (fi<colart)
					{
				      var monreg="ax_"+fi+"_12";
				      var totales="ax_"+fi+"_13";
				      var precios="ax_"+fi+"_10";
				      var precios2="ax_"+fi+"_11";
				      var cant="ax_"+fi+"_"+colum;

                    if ($(precios)){
				      if ($(precios).value!="" && $(precios).value!='0,00') {var nprecio=toFloat(precios);}else {var nprecio=toFloat(precios2);}
				      var ncant=toFloat(cant);

				     var sumtot=nprecio*ncant;
                      $(monreg).value="0,00";
                      $(totales).value=format(sumtot.toFixed(2),'.',',','.');
                      if(($(precios).value!='' && $(precios).value!='0,00') && $(precios2).readOnly==true)
                         {
                            var val= toFloat(precios);
                            $(precios2).value=format(val.toFixed(2),'.',',','.');
                         }
                      }
					 fi++;
					}
               }
               recalcularRecargos();
               var num5=toFloat(monrgo);
               var calculo=producto+num5;
               $(total).value=format(calculo.toFixed(2),'.',',','.');
             }
           }
          }
        }
        else
        {
         alert_('La Cantidad Solicitada excede de la existencia del Art&iacute;culo');
         $(id).value="0,00";
 	     $(total).value="0,00";
        }
	   }
    }
    else
    {
      $(id).value="0,00";
    }
	mostrarPromedio();
	descuentosm();
	actualizardescuento();
	actualizarRecargos();
  }
  mostrarPromedio();
 }
}

 function recargosm()
 {
   var ls=totalregistros2('cx',1,10);
   var l=0;
   while (l<ls)
   {
    var id="cx_"+l+"_1";
    if ($(id)){
    grid_recargos_lost_focus(id)
    }
    l++;
   }
 }

 function grid_recargos_lost_focus(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

    var colnom=col+1;
    var colrefij=col+2;
    var colmonto=col+3;
    var colcta=col+4;
    var coltipo=col+5;
    var colmonto2=col+6;

    var nombre=name+"_"+fil+"_"+colnom;
    var recfij=name+"_"+fil+"_"+colrefij;
    var monto=name+"_"+fil+"_"+colmonto;
    var cta=name+"_"+fil+"_"+colcta;
    var tipo=name+"_"+fil+"_"+coltipo;
    var monto2=name+"_"+fil+"_"+colmonto2;
    var cod=$(id).value;
    var montot=retornaMonto(cod);
    var montot1=retornaMonto2(cod);
    var valmonto=$(monto).value;

      if ($(id).value!="")
      {
        if (!recargo_repetido(id))
        {
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&cajtexmos='+nombre+'&cajtexcom='+id+'&recfij='+recfij+'&monto='+monto+'&cta='+cta+'&tipo='+tipo+'&monto2='+monto2+'&montot='+montot+'&montot1='+montot1+'&valmonto='+valmonto+'&codigo='+cod})
        }
        else
        {
         alert('El Recargo ya fue asignado');
         $(id).value="";
        }
      }
  }

   function descuentosm()
 {
   var ls=totalregistros2('bx',1,10);
   var l=0;
   while (l<ls)
   {
    var id="bx_"+l+"_1";
    if ($(id)){
    grid_descuento_lost_focus(id)
    }
    l++;
   }
 }

 function grid_descuento_lost_focus(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

    var coldes=col+1;
    var colmonto=col+2;
    var colcta=col+3;
    var colcant=col+4;
    var coldescto=col+5;
    var coltipo=col+6;
    var coltiporet=col+7;

    var descripcion=name+"_"+fil+"_"+coldes;
    var montodesc=name+"_"+fil+"_"+colmonto;
    var cuenta=name+"_"+fil+"_"+colcta;
    var cantidad=name+"_"+fil+"_"+colcant;
    var descuento=name+"_"+fil+"_"+coldescto;
    var tipo=name+"_"+fil+"_"+coltipo;
    var tiporet=name+"_"+fil+"_"+coltiporet;
    var cod=$(id).value;

    var eldesc=montoDescuento(fil);
    var nmonfac= toFloat('fafactur_monfac');
	var ntotmonrgo= toFloat('fafactur_totmonrgo');
	var ntotdesc= toFloat('fafactur_totdesc');
	var porcentajedesc=toFloat('fafactur_porcentajedescto');
	var monto=toFloat('fafactur_monto');
	var aplicaclades=$('fafactur_apliclades').value;
	var valmontodesc= toFloat(montodesc);
	var valcant=toFloat(cantidad);
	var totaltotarti= toFloat('fafactur_tottotart');

      if ($(id).value!="")
      {
        if (!descuento_repetido(id))
       {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&cajtexmos='+descripcion+'&cajtexcom='+id+'&montodesc='+montodesc+'&cuenta='+cuenta+'&cantidad='+cantidad+'&tipo='+tipo+'&tiporet='+tiporet+'&descuento='+descuento+'&eldescuento='+eldesc+'&monfac='+nmonfac+'&totalrgo='+ntotmonrgo+'&totaldesc='+ntotdesc+'&porcentajedesc='+porcentajedesc+'&monto14='+monto+'&aplicaclades='+aplicaclades+'&valmontodesc='+valmontodesc+'&valcant='+valcant+'&totaltotarti='+totaltotarti+'&codigo='+cod})
       }
       else
       {
         alert('El Descuento ya fue asignado');
         $(id).value="";
       }
      }
 }


 function distribuirexistencia(fila,dato)
 {
   var colart=totalregistros2('ax',3,25);
   var exis2="ax_"+fila+"_6";
    var fi=0;
	while (fi<colart)
	{
      var exis="ax_"+fi+"_6";
      var codart="ax_"+fi+"_3";
     if ($(codart)){
      if (fi!=fila)
      {
        if ($(codart).value==dato)
        {
         $(exis).value=$(exis2).value;
        }
      }
      }
	 fi++;
	}
 }

  function canentregar(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colmonrgo=col+4;
   var coltotal=col+5;
   var coldistot=col+6;
   var colcanpreart=col+8;
   var colcansol=col-1;
   var colblanco=col+13;
   var colart=col-5;
   var colprec=col+2;
   var colprec2=col+3;
   var colexis=col-2;


   var canpreart=name+"_"+fil+"_"+colcanpreart;
   var monrgo=name+"_"+fil+"_"+colmonrgo;
   var total=name+"_"+fil+"_"+coltotal;
   var cansol=name+"_"+fil+"_"+colcansol;
   var distot=name+"_"+fil+"_"+coldistot;
   var blanco=name+"_"+fil+"_"+colblanco;
   var codart=name+"_"+fil+"_"+colart;
   var exist=name+"_"+fil+"_"+colexis;
   var cod=$(codart).value;
   var precio=name+"_"+fil+"_"+colprec;
   var precio2=name+"_"+fil+"_"+colprec2;

   var am=totalregistros('ax',3,25);

   if ($(precio).value!="") {var num4=toFloat(precio);}else {var num4=toFloat(precio2);}
   var num1=toFloat(id);
   var num0=toFloat(cansol);
   var num3=toFloat(distot);
   var num6=toFloat(canpreart);

  if (am>0 && $(id).value!="")
  {
   if ($(id).value!="")
   {
	   if (!validarnumero(id))
	   {
	    alert_('El Dato debe ser n&uacute;merico');
	    $(id).value="0,00";
	    $(total).value="0,00";
	   }
	   else if (num1<0)
	   {
	    alert('El valor debe ser mayor que cero');
	    $(id).value="0,00";
	    $(total).value="0,00";
	   }
	   else
	   {
	     if ($(distot).value!="" && $(canpreart).value!="")
	     {
           if ($(blanco).value=='S' || num3>0)
           {
             if (num1<=num6)
             {
               var canent=cantidadEntregarArt(fil,cod);
               if ($(blanco).value=='S' || (num1<=(num3-canent)))
               {
                 if(num1<=num0)
                 {
                    var cal=num3-num1-canent;
                    $(exist).value=format(cal.toFixed(2),'.',',','.');
                    distribuirexistencia(fil,cod);
                 }
                 else
                 {
                   alert('La Cantidad a Entregar excede a la Cantidad Solicitada del Articulo');
                   $(id).value="0,00";
           	       $(total).value="0,00";
                 }
               }
               else
               {
                 alert_('La Cantidad Solicitada excede de la existencia del Art&iacute;culo');
                 $(id).value="0,00";
 	             $(total).value="0,00";
               }
             }
             else
             {
               alert('La Cantidad a Entregar excede a la Cantidad Solicitada del Articulo');
               if (num6<num1)
               {
                $(id).value=$(colcanpreart).value;
               }
               else
               {
                 $(id).value="0,00";
        	     $(monrgo).value="0,00";
           	     $(total).value="0,00";
               }
             }

             if ($(precio).value!="" || $(precio2).value!="")
             {
               var producto= num4*num1;
               if (!validarnumero(monrgo))
               {
                 if ($('id').value=="")
                 {
                   $(monrgo).value="0,00";
                 }
                 var regrgo=totalregistros('cx',1,10);
			  	  var j=0;
				  while (j<regrgo)
				  {
			        distribuirRecargos(j,"R");
				   j++;
				  }
			   }

               var calmontot=calcularMontTot();
               if (calmontot>0)
               {
                  var colum=determinarReferenciaDoc($('fafactur_tipref').value);

				    var colart=totalregistros2('ax',3,25);
				    var fi=0;
					while (fi<colart)
					{
				      var monreg="ax_"+fi+"_12";
				      var totales="ax_"+fi+"_13";
				      var precios="ax_"+fi+"_10";
				      var precios2="ax_"+fi+"_11";
				      var cant="ax_"+fi+"_"+colum;

                     if ($(precios)){
				      if ($(precios).value!="") {var nprecio=toFloat(precios);}else{var nprecio=toFloat(precios2);}
				      var ncant=toFloat(cant);

				      var sumtot=nprecio*ncant;
                      $(monreg).value="0,00";
                      $(totales).value=format(sumtot.toFixed(2),'.',',','.');
                      }
					 fi++;
					}
               }
               recalcularRecargos();
               var num5=toFloat(monrgo);
               var calculo=producto+num5;
               $(total).value=format(calculo.toFixed(2),'.',',','.');
             }
           }
           else
           {
             alert('No Hay Disponibilidad para el Art�culo'+cod);
             $(id).value="0,00";
           }
	     }
       }
    }
    else
    {
      $(id).value="0,00";
    }
	mostrarPromedio();
	descuentosm();
	actualizardescuento();
	actualizarRecargos();
  }
    mostrarPromedio();
 }
}

 function candespachar(e,id)
 {
   if (e.keyCode==13 || e.keyCode==9)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var colmonrgo=col+3;
    var coltotal=col+4;
    var coldistot=col+5;
    var colcanpreart=col+7;
    var colcansol=col-2;
    var colblanco=col+12;
    var colart=col-6;
    var colprec=col+2;
    var colprec2=col+3;
    var colexis=col-3;

    var canpreart=name+"_"+fil+"_"+colcanpreart;
    var monrgo=name+"_"+fil+"_"+colmonrgo;
    var total=name+"_"+fil+"_"+coltotal;
    var cansol=name+"_"+fil+"_"+colcansol;
    var distot=name+"_"+fil+"_"+coldistot;
    var blanco=name+"_"+fil+"_"+colblanco;
    var codart=name+"_"+fil+"_"+colart;
    var exist=name+"_"+fil+"_"+colexis;
    var cod=$(codart).value;
    var precio=name+"_"+fil+"_"+colprec;
    var precio2=name+"_"+fil+"_"+colprec2;

   if ($(precio).value!="") {var num4=toFloat(precio);}else {var num4=toFloat(precio2);}
   var num1=toFloat(id);
   var num0=toFloat(cansol);
   var num3=toFloat(distot);

    var am=totalregistros('ax',3,25);
    if (am>0 && $(id).value!="")
    {
      if ($(precio).value!="")
      {
         var producto= num4*num1;
         if (!validarnumero(monrgo))
         {
           if ($('id').value=="")
           {
             $(monrgo).value="0,00";
           }
           var regrgo=totalregistros('cx',1,10);
	  	   var j=0;
		   while (j<regrgo)
		   {
	         distribuirRecargos(j,"R");
		     j++;
		   }


          var calmontot=calcularMontTot();
          if (calmontot>0)
          {
            var colum=determinarReferenciaDoc($('fafactur_tipref').value);

		    var colart=totalregistros2('ax',3,25);
		    var fi=0;
			while (fi<colart)
			{
		      var monreg="ax_"+fi+"_12";
		      var totales="ax_"+fi+"_13";
		      var precios="ax_"+fi+"_10";
		      var precios2="ax_"+fi+"_11";
		      var cant="ax_"+fi+"_"+colum;

             if ($(precios)){
              if ($(precios).value!="") {nprecio=toFloat(precios);}else {var nprecio=toFloat(precios2);}
		      var ncant=toFloat(cant);

		     var sumtot=nprecio*ncant;
	         $(monreg).value="0,00";
	         $(totales).value=format(sumtot.toFixed(2),'.',',','.');
	         }
			 fi++;
			}
          }
          recalcularRecargos();
          }
          var num5=toFloat(monrgo);
          var calculo=producto+num5;
          $(total).value=format(calculo.toFixed(2),'.',',','.');
          montoTotal();
        }
        else
        {
         $(id).value="0,00";
        }
    }
      mostrarPromedio();
   }
 }

 function Precio2(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {

   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var coltot=col+2;
   var colrec=col+1;

   var colum=determinarReferenciaDoc($('fafactur_tipref').value);
   var canti=name+"_"+fil+"_"+colum;
   var monrgo=name+"_"+fil+"_"+colrec;
   var total=name+"_"+fil+"_"+coltot;

   var num1=toFloat(id);
   var num2=toFloat(canti);

 if ($(id).value!="")
 {
   if (!validarnumero(id))
   {
    alert_('El Dato debe ser n&uacute;merico');
    $(id).value="0,00";
   }
   else if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
    $(id).value="0,00";
   }
   else
   {
     //cambio moneda
     if ($(id).value!="")
     {
       var producto= num1*num2;
         if (!validarnumero(monrgo))
         {
           if ($('id').value=="")
           {
             $(monrgo).value="0,00";
           }
           var regrgo=totalregistros('cx',1,10);
	  	   var j=0;
		   while (j<regrgo)
		   {
	         distribuirRecargos(j,"R");
		     j++;
		   }

          var calmontot=calcularMontTot();
          if (calmontot>0)
          {
		    var colart=totalregistros2('ax',3,25);
		    var fi=0;
			while (fi<colart)
			{
		      var monreg="ax_"+fi+"_12";
		      var totales="ax_"+fi+"_13";
		      var precio="ax_"+fi+"_10";
		      var precio2="ax_"+fi+"_11";
		      var cant="ax_"+fi+"_"+colum;

             if ($(precio)){
		      if ($(precio).value!="" && $(precio).value!="0,00"){var nprecio=toFloat(precio);}else {var nprecio=toFloat(precio2);}
		      var ncant=toFloat(cant);

		     var sumtot=nprecio*ncant;
	         $(monreg).value="0,00";
	         $(totales).value=format(sumtot.toFixed(2),'.',',','.');
                 if(($(precio).value!='' && $(precio).value!='0,00') && $(precio2).readOnly==true)
                 {
                    var val= toFloat(precio);
                    $(precio2).value=format(val.toFixed(2),'.',',','.');
                 }
             }
			 fi++;
			}
          }
          recalcularRecargos();
         }
          var num5=toFloat(monrgo);
          var calculo=producto+num5;
          $(total).value=format(calculo.toFixed(2),'.',',','.');
          montoTotal();
     }
   }
     mostrarPromedio();
  }
  else
  {
    $(id).value="0,00";
  }
 }
}

  function montorecargo(e,id)
  {
    if (e.keyCode==13 || e.keyCode==9)
    {
	    var aux = id.split("_");
	    var name=aux[0];
	    var fil=aux[1];
	    var col=parseInt(aux[2]);

	    var coltotal=col+4;
	    var coldistot=col+5;
	    var colcanpreart=col+7;
	    var colcansol=col-2;
	    var colart=col-6;
            var colprecf=col-2;
	    var colprec=col-1;
	    var colprec2=col+1;
	    var colexis=col-3;
            var num4=0;

	    var total=name+"_"+fil+"_"+coltotal;
	    var codart=name+"_"+fil+"_"+colart;
	    var exist=name+"_"+fil+"_"+colexis;
	    var cod=$(codart).value;
            var preciof=name+"_"+fil+"_"+colprecf;
	    var precio=name+"_"+fil+"_"+colprec;
	    var precio2=name+"_"+fil+"_"+colprec2;

        var colum=determinarReferenciaDoc($('fafactur_tipref').value);
	    var canti=name+"_"+fil+"_"+colum;

        if ($(precio).value!="" && $(precio).value!="0,00") { num4=toFloat(precio);}else { num4=toFloat(preciof);}
        var num1=toFloat(id);
        var num0=toFloat(canti);

        if (($(precio).value!="" || $(precio2).value!="0,00") && $(canti).value!="")
        {
         //cambio de moneda
          var productot=num0*num4;
          var resta=num1+productot;
          $(precio2).value=format(resta.toFixed(2),'.',',','.');
          $(id).value=format(num1.toFixed(2),'.',',','.');
          montoTotal();
        }

    }
  }

  function datosRecargos()
  {
    new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=15&reffac='+$('fafactur_reffac').value+'&rgofijos='+$('fafactur_rgofijos').value})
  }

 function colocarRecargos(arreglo)
 {
   var filastot=totalregistros('cx',1,10);
   var aux=arreglo.split('!');
   var i=0;
   while (i< (aux.length-1))
   {
     var aux2=aux[i].split('_');
     var codrgo="cx"+"_"+filastot+"_1";
     var nomrgo="cx"+"_"+filastot+"_2";
     var recfij="cx"+"_"+filastot+"_3";
     var monrgo="cx"+"_"+filastot+"_4";
     var codcta="cx"+"_"+filastot+"_5";
     var tipo="cx"+"_"+filastot+"_6";
     var monrgo2="cx"+"_"+filastot+"_7";

     $(codrgo).value=aux2[0];
     $(nomrgo).value=aux2[1];
     $(recfij).value=aux2[2];
     $(monrgo).value=aux2[3];
     $(codcta).value=aux2[4];
     $(tipo).value=aux2[5];
     $(monrgo2).value=aux2[6];
     filastot=filastot + 1;
     i++;
   }
 }

  function colocarDescuento(arreglo)
 {
   var filastot=totalregistros('bx',1,10);
   var aux=arreglo.split('!');
   var i=0;
   while (i< (aux.length-1))
   {
     var aux2=aux[i].split('_');
     var coddesc="bx"+"_"+filastot+"_1";
     var desdesc="bx"+"_"+filastot+"_2";
     var mondesc="bx"+"_"+filastot+"_3";
     var codcta="bx"+"_"+filastot+"_4";
     var cantidad="bx"+"_"+filastot+"_5";
     var montdesc="bx"+"_"+filastot+"_6";
     var tipdesc="bx"+"_"+filastot+"_7";
     var tipret="bx"+"_"+filastot+"_8";

     $(coddesc).value=aux2[0];
     $(desdesc).value=aux2[1];
     $(mondesc).value=aux2[2];
     $(codcta).value=aux2[3];
     $(cantidad).value=aux2[4];
     $(montdesc).value=aux2[5];
     $(tipdesc).value=aux2[6];
     $(tipret).value=aux2[7];
     filastot=filastot + 1;
     i++;
   }
 }

  function Precio3(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colmrgo=col+2;
   var coltotal=col+3;
   var colprecioart=col+5;

   var monrgo=name+"_"+fil+"_"+colmrgo;
   var total=name+"_"+fil+"_"+coltotal;
   var precioart=name+"_"+fil+"_"+colprecioart;

   var num1=toFloat(id);
   var colum=determinarReferenciaDoc($('fafactur_tipref').value);
   var canti=name+"_"+fil+"_"+colum;
   var num2=toFloat(canti);

   if ($(id).value!="")
   {
     if (validarnumero(id))
     {
       if (num1>0)
       {
         //cambio de moneda
         if ($(id).value!="")
         {
           var producto=num1*num2;
           if (!validarnumero(monrgo))
           {
             if ($('id').value=="")
             {
               $(monrgo).value="0,00";
             }
             var regrgo=totalregistros('cx',1,10);
	  	     var j=0;
		     while (j<regrgo)
		     {
	           distribuirRecargos(j,"R");
		       j++;
		     }
		   }

            var calmontot=calcularMontTot();
            if (calmontot>0)
            {
		       var colart=totalregistros2('ax',3,25);
		       var fi=0;
			   while (fi<colart)
			   {
		         var monreg="ax_"+fi+"_12";
		         var totales="ax_"+fi+"_13";
		         var precio="ax_"+fi+"_10";
		         var precio2="ax_"+fi+"_11";
		         var cant="ax_"+fi+"_"+colum;
                 if ($(precio)){
		         if ($(precio).value!="" && $(precio).value!="0,00") {var nprecio=toFloat(precio);}else {var nprecio=toFloat(precio2);}
		         var ncant=toFloat(cant);

 		         var sumtot=nprecio*ncant;
	             $(monreg).value="0,00";
	             $(totales).value=format(sumtot.toFixed(2),'.',',','.');
                     if(($(precio).value!='' && $(precio).value!='0,00') && $(precio2).readOnly==true)
                     {
                        var val= toFloat(precio);
                        $(precio2).value=format(val.toFixed(2),'.',',','.');
                     }
	          }
			    fi++;
			   }
            }
            recalcularRecargos();
            var num5=toFloat(monrgo);
            var calculo=producto+num5;
            $(total).value=format(calculo.toFixed(2),'.',',','.');
          }
         }
         else
         {
           alert('El valor debe ser mayor que cero');
           if ($(precioart).value!="")
           {
             $(id).value=$(precioart).value;
             recalcular_montos(fil);
           }
           else
           {
             $(id).value="0,00";
           }
           if ($('fafactur_tipref').value=='V')
           {
             $(monrgo).value="0,00";
             $(total).value="0,00";
             recargosm();
           }
         }
       }
       else
       {
         alert_('El Dato debe ser n&uacute;merico');
         if ($(precioart).value!="")
         {
           $(id).value=$(precioart).value;
           recalcular_montos(fil);
         }
         else
         {
           $(id).value="0,00";
         }
         if ($('fafactur_tipref').value=='V')
         {
           $(monrgo).value="0,00";
           $(total).value="0,00";
         }
        recalcular_montos(fil);
       }
     }
     else
     {
       alert_('El Dato debe ser n&uacute;merico');
       $(id).value=$(precioart).value;
       recalcular_montos(fil);
     }
     mostrarPromedio();
     descuentosm();
     actualizardescuento();
     actualizarRecargos();
     mostrarPromedio();
 }

 function recalcular_montos(fila)
 {
   if ($('recarg').visible() && $('id').value=='')
   {
     var regrgo=totalregistros('cx',1,10);
 	 var j=0;
     while (j<regrgo)
     {
       distribuirRecargos(j,"R");
       j++;
     }
     var check="ax_"+fila+"_1"
     if ($(check).checked==false)
     {
       $(check).ckecked=false;
       marcarArtRep(fila,false)
     }
     else
     {
       $(check).ckecked=true;
       marcarArtRep(fila,true)
     }
     recalcularRecargos();
     montoTotal();
   }
 }

 function marcardesc(id)
 {
  	var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

	var coldesc=col+19;
	var mdesc=name+"_"+fil+"_"+coldesc;

    $(mdesc).checked=true;

 }

  function aceptartipmov()
  {
    if ($('fafactur_codtip').value!="")
    {
      $('divcodtip').hide();
      var l=parseInt($('fafactur_filgenmov').value);
      var filcodtip="dx_"+l+"_7"
      $(filcodtip).value=$('fafactur_codtip').value;
      $('fafactur_filgenmov').value="";
    }
    else
    {
      alert('Tipee el Tipo de Movimiento');
      $('fafactur_codtip').focus();
    }
  }

 function marcarTodo()
  {
   $('fafactur_marrec').checked=false;
   var infrecargos="ax"+"_0_12";
   var distrib=toFloat(infrecargos);
   var articulo="ax"+"_0_3";
   var valorarticulo=$(articulo).value;
   if (valorarticulo!="")
   {
    if (distrib>0)
    {
        var fil=0;
        var facart=totalregistros2('ax',3,25);
        while (fil<facart)
        {
	     var codart="ax_"+fil+"_3";
             var check="ax_"+fil+"_1";

             if ($(codart).value!="")
             {
               $(check).checked=true;
	     }
	   fil++;
	}
        actualizarRecargos();
        recalcularRecargos();
        montoTotal();

   }// if (distrib!="")
   else
   {
    alert_("No han sido aplicados Recargos al primer Art&iacute;culo del Detalle, C&oacute;digo: "+ valorarticulo+". Deben ser definidos estos Recargos para poder replicarlos al resto de los Art&iacute;culo del Detalle de la Factura ")
   }
  }
  }

  function desmarcarTodo()
  {
     $('fafactur_desrec').checked=false;
     var fil=1;
     var facart=totalregistros2('ax',3,25);
     var colum=determinarReferenciaDoc($('fafactur_tipref').value);
     while (fil<facart)
     {
      var codart="ax"+"_"+fil+"_3";
      if ($(codart).value!="")
      {
       var id="ax"+"_"+fil+"_1";
       var precio="ax_"+fil+"_10";
       var precioe="ax_"+fil+"_11";
       var cant="ax_"+fil+"_"+colum;
       var dest="ax"+"_"+fil+"_18";
       var recargo="ax_"+fil+"_12";
       var total="ax"+"_"+fil+"_13";

         if ($(precio)){
	     if ($(precio).value!="") {var col9=toFloat(precio);}else {var col9=toFloat(precioe);}
         }
         var colcant=toFloat(cant);

         var monuni= colcant * col9;
	 var mondto=toFloat(dest);

	 var monrgotot=0;

         $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
         montottot=monuni-mondto;
	 $(total).value=format(montottot.toFixed(2),'.',',','.');
	 $(id).checked=false;

      }//if ($(codart).value!="")
      else
      {
       fil=facart;
      }
      fil++;
    }//while (fil<facart)
    montoTotal();

  }

function aplicarBL(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

   if (fil==0) {
       reg=totalregistros2('ax',3,25);
        var j=1;
        while (j<reg)
        {
          var billindg="ax_"+j+"_28";
          $(billindg).value=$(id).value;
         j++;
        }
   }
  }

  function calculardif(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var num=toFloat(id);

    if (num>0) {

    if (col==45 || col==46)
    {
        var ko=name+"_"+fil+"_45";
        var ke=name+"_"+fil+"_46";
        var dk=name+"_"+fil+"_47";
        var to=name+"_"+fil+"_51";
        var te=name+"_"+fil+"_52";
        var dt=name+"_"+fil+"_53";

        var num1=toFloat(ko);
        var num2=toFloat(ke);
        var resta= num1 - num2;
        if (col==45)
        {
            var cal=num1/1000;
            $(to).value=format(cal.toFixed(2),'.',',','.');
        }

        if (col==46)
        {
          var cal2=num2/1000;
            $(te).value=format(cal2.toFixed(2),'.',',','.');
        }

        var num5=toFloat(to);
        var num6=toFloat(te);
        var resta2= num5 - num6;

        $(dt).value=format(resta2.toFixed(2),'.',',','.'); //diferencia Toneladas
        $(dk).value=format(resta.toFixed(2),'.',',','.'); //diferencia kilogramos
    }

    if (col==48 || col==49)
    {
        var co=name+"_"+fil+"_48";
        var ce=name+"_"+fil+"_49";
        var dc=name+"_"+fil+"_50";

        var num3=toFloat(co);
        var num4=toFloat(ce);
        var resta1= num3 - num4;

        $(dc).value=format(resta1.toFixed(2),'.',',','.');
    }

    if (col==51 || col==52)
    {
        var to=name+"_"+fil+"_51";
        var te=name+"_"+fil+"_52";
        var dt=name+"_"+fil+"_53";
        var ko=name+"_"+fil+"_45";
        var ke=name+"_"+fil+"_46";
        var dk=name+"_"+fil+"_47";

        var num5=toFloat(to);
        var num6=toFloat(te);
        var resta2= num5 - num6;

        if (col==51)
        {
            var cal=num5*1000;
            $(ko).value=format(cal.toFixed(2),'.',',','.');
        }
        if (col==52)
        {
            var cal2=num6*1000;
            $(ke).value=format(cal2.toFixed(2),'.',',','.');
        }

        var num1=toFloat(ko);
        var num2=toFloat(ke);
        var resta= num1 - num2;

        $(dk).value=format(resta.toFixed(2),'.',',','.'); //diferencia kilogramos
        $(dt).value=format(resta2.toFixed(2),'.',',','.'); //diferencia Toneladas
    }
  }else {
      alert("El Valor introducido debe ser mayor a cero");
      $(id).value="0,00";
  }

}

function CargarRecDesc()
{
    var codigo=$('fafactur_proform').value;
    new Ajax.Updater('divgrid_fadescart', getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=24&codigo='+codigo});
    new Ajax.Updater('divgrid_fargoart', getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=25&codigo='+codigo});


}
