
function CalculaRecargos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colmonrec=col+1;
    var monrec=name+"_"+fil+"_"+colmonrec;
    var mondoc=$('cobdocume_mondoc').value;
	toAjax(3,getUrlModulo()+'ajax',$(id).value,'ActualizarSaldosGrid("a",new Array("cobdocume_recdoc"));totalizar()','&monrec='+monrec+'&mondoc='+mondoc+'');
}

function totalizar()
{
  var monrec=toFloat('cobdocume_recdoc');
  var dscdoc=toFloat('cobdocume_dscdoc');
  var abodoc=toFloat('cobdocume_abodoc');
  var mondoc=toFloat('cobdocume_mondoc');

   var tototal= mondoc+monrec-dscdoc+abodoc;

   $('cobdocume_saldoc').value=format(tototal.toFixed(2),'.',',','.');

}

function CalculaDescuentos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colmondes=col+1;
    var mondes=name+"_"+fil+"_"+colmondes;
    var mondoc=$('cobdocume_mondoc').value;
    var monrec=$('cobdocume_recdoc').value;
	toAjax(4,getUrlModulo()+'ajax',$(id).value,'ActualizarSaldosGrid("b",new Array("cobdocume_dscdoc"));totalizar()','&mondes='+mondes+'&mondoc='+mondoc+'&monrec='+monrec+'');
}

function cargardatosfor()
{
  toAjaxUpdater('gridfor',2,getUrlModuloAjax(),'','ActualizarSaldosGrid("b",new Array("cobtransa_tottra"));','');
}

 function apagar(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colsaldoc=col-1;
   var colmarca=col+6;
   var saldoc=name+"_"+fil+"_"+colsaldoc;
   var marca=name+"_"+fil+"_"+colmarca;

   var montoant=0;
   montoant=toFloat(saldoc);
   var num1=toFloat(id);
   if ($(id).value!="-")
   {
      if (validarnumero(id))
	  {
        if (num1>montoant)
        {
          alert('El Monto a Pagar No Puede ser Mayor a la Diferencia del Monto del Documento Con el Monto Pagado');
          $(id).value=format(montoant.toFixed(2),'.',',','.');
          $(marca).value="O";
        }

        if (num1<montoant)
        {
          $(id).value=$(id).value;
          $(marca).value="O";
        }

        if ($(id).value=='0,00')
        {
          $(id).value=format(montoant.toFixed(2),'.',',','.');
          $(marca).value="O";
        }
	    sumar_datos_grid();
	  }
	  else
	  {
        alert_('El Dato debe ser n&uacute;merico');
	    $(id).value="0,00";
	    if($(marca).value=="O")
	    {
          $(marca).value="";
	    }
	    sumar_datos_grid();
	  }
   }
   else
   {
    $(id).value="0,00";
    if($(marca).value=="O")
    {
      $(marca).value="";
    }
    sumar_datos_grid();
   }
   $(id).value=$(id).value;
  }
  }

  function sumar_datos_grid()
  {
    var totmonpag=0;
    var totmonrec=0;
    var totmondes=0;
    var totmonnet=0;

    var i=0;
    var filas=parseInt($('cobtransa_filasdet').value);
    while (i<filas)
    {
      var col6="ax_"+i+"_6";
      var col8="ax_"+i+"_8";
      var col9="ax_"+i+"_9";

      var num1=toFloat(col6);
      var num2=toFloat(col8);
      var num3=toFloat(col9);


      if (num1!=0 || num2!=0 || num3!=0)
      {
        totmonpag= totmonpag + num1;
        totmonrec= totmonrec + num2;
        totmondes= totmondes + num3;
        totmonnet= totmonnet + (num1 + num2 - num3);
      }
     i++;
    }

    $('cobtransa_totmonpag').value=format(totmonpag.toFixed(2),'.',',','.');
    $('cobtransa_totmonrec').value=format(totmonrec.toFixed(2),'.',',','.');
    $('cobtransa_totmondes').value=format(totmondes.toFixed(2),'.',',','.');
    var cal= totmonpag + totmonrec - totmondes;
    $('cobtransa_tottra').value=format(cal.toFixed(2),'.',',','.');
  }

  function montopagar(e,id)
  {
    if (e.keyCode==13 || e.keyCode==9)
    {
	   var aux = id.split("_");
	   var name=aux[0];
	   var fil=aux[1];
	   var col=parseInt(aux[2]);

	   var colgenmov=col+5;
	   var genmov=name+"_"+fil+"_"+colgenmov;
	   var colgening=col+6;
	   var gening=name+"_"+fil+"_"+colgening;

	   var num1=toFloat(id);
	   var num2=toFloat('cobtransa_tottra');
	   var num3=toFloat('cobtransa_monpagado');


       if (validarnumero(id))
	   {
	     if (num1>num2)
	     {
	        alert('El Monto a Pagar No Puede ser Mayor al Monto Neto a Pagar');
	        $(id).value="0,00";
	     }
	     else
	     {
            if (num1==0)
            {
              var cal=num2 - num3;
              $(id).value=format(cal.toFixed(2),'.',',','.');
            }

            if (num3 <= num2)
            {
              $(id).value=$(id).value;
              if ($(genmov).value=='S')
              {
                $('divcodtip').show();
                $('cobtransa_filgenmov').value=fil;
              }
            }
            else
            {
              alert('El Monto a Pagado Sobrepasa el Neto a Pagar');
              $(id).value="0,00";
            }
	     }
	   }
	   else
	   {
	     alert('El Monto Del Pago tiene que ser Numerico');
         $(id).value="0,00";
	   }
	   if ($(gening).value=='S' && num1>0)
	   {
         $('cobtransa_hayingreso').value='S';
	   }else  $('cobtransa_hayingreso').value='N';

       sumar_pagos();
    }
  }

  function sumar_pagos()
  {
    var monpago=0;
    var i=0;
    var filas=parseInt($('cobtransa_filasfor').value);
    while (i<filas)
    {
      var col2="bx_"+i+"_2";
      var num1=toFloat(col2);

      if (num1>0)
      {
        monpago= monpago + num1;
      }
      i++;
    }

    $('cobtransa_monpagado').value=format(monpago.toFixed(2),'.',',','.');
  }

function recargos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldoc=col-1;
    var colmonrec=col+1;
    var colcodcta=col+2;
    var colmonori=col+3;
    var monrec=name+"_"+fil+"_"+colmonrec;
    var codcta=name+"_"+fil+"_"+colcodcta;
    var monori=name+"_"+fil+"_"+colmonori;
    var doc=name+"_"+fil+"_"+coldoc;
    valmonori=toFloat(monori);
    valdoc=$(doc).value;

    if ($(id).value!="")
    {
	 toAjax(3,getUrlModuloAjax(),$(id).value,'','&monrec='+monrec+'&monori='+valmonori+'&doc='+valdoc+'&codcta='+codcta+'');
	}
}

 function sumar_recargos(documento)
 {
   var mon_recargo=0;
   var recargo_fila=0;

   var am=obtener_filas_grid('c',2);
   var l=0;
   while (l<am)
   {
    var coldoc="cx_"+l+"_1";
    var colmonrec="cx_"+l+"_3";
    if ($(colmonrec))
    {
    if ($(colmonrec).value!="")
    {
      var num1=toFloat(colmonrec);
      if ($(colmonrec).value!='0,00' && $(coldoc).value==documento)
      {
        mon_recargo= mon_recargo + num1;
      }
    }
    }
    l++;
   }
   if (am==0)
   {
     $('cx_0_1').value=documento;
   }

    var recargo_fila= recargo_fila + mon_recargo;

    return  recargo_fila;
 }

  function montorecarg(e,id)
  {
    if (e.keyCode==13 || e.keyCode==9)
    {
	   var aux = id.split("_");
	   var name=aux[0];
	   var fil=aux[1];
	   var col=parseInt(aux[2]);

	   var coldoc=col-2;
	   var colmonori=col+2;
	   var monori=name+"_"+fil+"_"+colmonori;
	   var doc=name+"_"+fil+"_"+coldoc;
	   var num1=toFloat(id);
	   var num2=toFloat(monori);

       if (validarnumero(id))
	   {
         if (num1>num2)
         {
           alert('El Monto Del Recargo No Puede ser Mayor al Monto del Documento');
           $(id).value="0,00";
         }

         if (num1<num2)
         {
          sumar_recargos($(doc).value);
         }
	   }
	   else
	   {
         alert('El Monto Del Recargo tiene que ser Numerico');
         $(id).value="0,00";
	   }
	}
  }

  function descuentos(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldoc=col-1;
    var colmondes=col+1;
    var colcodcon=col+2;
    var colmonori=col+3;
    var mondes=name+"_"+fil+"_"+colmondes;
    var codcon=name+"_"+fil+"_"+colcodcon;
    var monori=name+"_"+fil+"_"+colmonori;
    var doc=name+"_"+fil+"_"+coldoc;
    valmonori=toFloat(monori);
    valdoc=$(doc).value;

    if ($(id).value!="")
    {
	  toAjax(4,getUrlModuloAjax(),$(id).value,'','&mondes='+mondes+'&monori='+valmonori+'&doc='+valdoc+'&codcon='+codcon+'');
	}
  }

 function sumar_descuentos(documento)
 {
   var mon_descuento=0;
   var descuento_fila=0;

   var am=obtener_filas_grid('d',2);
   var l=0;
   while (l<am)
   {
    var coldoc="dx_"+l+"_1";
    var colmondes="dx_"+l+"_3";

    if ($(colmondes))
    {
    if ($(colmondes).value!="")
    {
      var num1=toFloat(colmondes);
      if ($(colmondes).value!='0,00' && $(coldoc).value==documento)
      {
        mon_descuento= mon_descuento + num1;
      }
    }
    }
    l++;
   }
   if (am==0)
   {
     $('dx_0_1').value=documento;
   }

    descuento_fila= descuento_fila + mon_descuento;

    return descuento_fila;
 }

  function montodescuentos(e,id)
  {
    if (e.keyCode==13 || e.keyCode==9)
    {
	   var aux = id.split("_");
	   var name=aux[0];
	   var fil=aux[1];
	   var col=parseInt(aux[2]);

	   var coldoc=col-2;
	   var colmonori=col+2;
	   var monori=name+"_"+fil+"_"+colmonori;
	   var doc=name+"_"+fil+"_"+coldoc;
	   var num1=toFloat(id);
	   var num2=toFloat(monori);

       if (validarnumero(id))
	   {
         if (num1>num2)
         {
           alert('El Monto Del Descuento No Puede ser Mayor al Monto del Documento');
           $(id).value="0,00";
         }

         if (num1<num2)
         {
          sumar_descuentos($(doc).value);
         }
	   }
	   else
	   {
         alert('El Monto Del Descuento tiene que ser Numerico');
         $(id).value="0,00";
	   }
	}
  }

  function mostrar1(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var coldoc=col-7;
    var colmontotfor=col-4;
    var colmonpagad=col-1;
    var doc=name+"_"+fil+"_"+coldoc;
    var montotfor=name+"_"+fil+"_"+colmontotfor;
    var monpagado=name+"_"+fil+"_"+colmonpagad;

    var num1=toFloat(montotfor);
    var num2=toFloat(monpagado);
    var monori=num1 - num2;

    var montoori=format(monori.toFixed(2),'.',',','.');
    var documento=$(doc).value;
    var rec_vie=$(id).value;

    $('cobtransa_docfil').value=documento;
    $('cobtransa_orifil').value=montoori;
    $('cobtransa_recvie').value=rec_vie;
    $('cobtransa_fildet').value=fil;

    insertar_fila(documento,monori,'R');

    $('divgrid_descuentos').hide();
    $('sf_fieldset_none').show();
    $('divgrid_recargos').show();

  }


  function mostrar2(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var coldoc=col-8;
    var colmontotfor=col-5;
    var colmonpagad=col-2;
    var doc=name+"_"+fil+"_"+coldoc;
    var montotfor=name+"_"+fil+"_"+colmontotfor;
    var monpagado=name+"_"+fil+"_"+colmonpagad;

    var num1=toFloat(montotfor);
    var num2=toFloat(monpagado);
    var monori=num1 - num2;

    var montoori=format(monori.toFixed(2),'.',',','.');
    var documento=$(doc).value;
    var des_vie=$(id).value;

    $('cobtransa_docfil').value=documento;
    $('cobtransa_orifil').value=montoori;
    $('cobtransa_desvie').value=des_vie;
    $('cobtransa_fildet').value=fil;

    insertar_fila(documento,monori,'D');
    $('divgrid_recargos').hide();
    $('sf_fieldset_none').show();
    $('divgrid_descuentos').show();

  }

  function insertar_fila(doc,monto,div)
  {
    if (div=='R')
    {
      var fr=(obtener_filas_grid('c',1)-1);
      var filact=fr;
      var fildoc='cx_'+filact+'_1';
      var filmonori='cx_'+filact+'_5';

      $(fildoc).value=doc;
      $(filmonori).value=monto;
    }
    else
    {
      var fd=(obtener_filas_grid('d',1)-1);
      var filact=fd;
      var fildoc='dx_'+filact+'_1';
      var filmonori='dx_'+filact+'_5';

      $(fildoc).value=doc;
      $(filmonori).value=monto;
    }
  }

  function actualiza()
  {
    var recfil=sumar_recargos($('cobtransa_docfil').value);
    var descfil=sumar_descuentos($('cobtransa_docfil').value);

    $('sf_fieldset_none').hide();

    if (recfil>=0)
    {
      var fila=parseInt($('cobtransa_fildet').value);
      var idfil="ax_"+fila+"_8";

      $(idfil).value=format(recfil.toFixed(2),'.',',','.');
    }

    if (descfil>=0)
    {
      var fila=parseInt($('cobtransa_fildet').value);
      var idfil="ax_"+fila+"_9";

      $(idfil).value=format(descfil.toFixed(2),'.',',','.');
    }

    sumar_datos_grid();

    limpiar();
  }

  function cancelar()
  {
    limpiar();
  }

  function limpiar()
  {
    $('cobtransa_docfil').value="";
    $('cobtransa_orifil').value="";
    $('cobtransa_recvie').value="";
    $('cobtransa_desvie').value="";
    $('cobtransa_fildet').value="";
  }

  function actualizar_filas()
  {
    var i=0;
    var filas=parseInt($('cobtransa_filasfor').value);
    while (i<filas)
    {
      var monto="bx_"+i+"_2";
      var numero="bx_"+i+"_3";
      var banco="bx_"+i+"_5";
      var gening="bx_"+i+"_8";
      var genmov="bx_"+i+"_7";

      var num1=toFloat('cobtransa_monpagado');
      //en caso de que se la columna 2
      if ($('cobtransa_hayingreso').value=='N')
      {
        $(monto).readOnly=false;
        if ($(gening).value=='S' && num1>0)
        {
          $(monto).readOnly=true;
        }

      }
      else
      {
        if ($(gening).value=='S' && num1>0)
        {
          $(monto).readOnly=false;
        }
        else
        {
          $(monto).readOnly=true;
        }
      }

      //en caso de que se la columna 3
       //$(numero).readOnly=true;
//       if ($(genmov).value=='S')
//       {
  //      $(numero).readOnly=false;
    //   }

       //en caso de que se la columna 4
      //  $(banco).disabled=true;
      //  if ($(genmov).value=='S')
       //{
        //$(banco).disabled=false;
       //}
     i++;
    }
  }


  function anular()
  {
    var referencia="RC"+$('cobtransa_numcom').value.substr(2,6);
    var numtra=$('cobtransa_numtra').value;
    var fectra=$('cobtransa_fectra').value;

    window.open(getUrlModulo()+'anular?numtra='+numtra+'&referencia='+referencia+'&fectra='+fectra,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }

  function aceptartip()
  {
    if ($('cobtransa_codtip').value!="")
    {
      $('divcodtip').hide();
      var l=parseInt($('cobtransa_filgenmov').value);
      var filcodtip="bx_"+l+"_9"
      $(filcodtip).value=$('cobtransa_codtip').value;
      $('cobtransa_filgenmov').value="";
    }
    else
    {
      alert('Tipee el Tipo de Movimiento');
      $('cobtransa_codtip').focus();
    }
  }

  function colocadoc(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var colmonto=col+4;
    var monto=name+"_"+fil+"_"+colmonto;

    $(id).value=$('cobtransa_docfil').value;
    $(monto).value=$('cobtransa_orifil').value;
  }
