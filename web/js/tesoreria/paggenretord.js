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

  function ajaxretencion(e,id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   if ($(id).value!="")
   {
     var coldes= col+1;
     var colesta= col+5;
     var colestaislr= col+6;
     var colestaunomil= col+7;
     var colporret= col +8;
     var colbasimp= col +9;
     var colfactor= col +10;
     var colporsus= col +11;
     var colunitri= col +12;

     var descripcion=name+"_"+fil+"_"+coldes;
     var esta=name+"_"+fil+"_"+colesta;
     var estaislr=name+"_"+fil+"_"+colestaislr;
     var estaunomil=name+"_"+fil+"_"+colestaunomil;
     var porret=name+"_"+fil+"_"+colporret;
     var basimp=name+"_"+fil+"_"+colbasimp;
     var factor= name+"_"+fil+"_"+colfactor;
     var porsus= name+"_"+fil+"_"+colporsus;
     var unitri= name+"_"+fil+"_"+colunitri;

     var cod=$(id).value;
     var codprovee=$('opordpag_codigoprovee').value;

     if (e.keyCode==13 || e.keyCode==9)
     {
       if ($(id).value)
       {
       if (codret_repetido(id))
	   {
	     alert('El Codigo de la Retencion se encuentra repetido');
   	     $(id).value="";
       }else
	   {
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validaretencion(e,id);}, parameters:'ajax=1&cajtexcom='+id+'&cajtexmos='+descripcion+'&codprovee='+codprovee+'&esta='+esta+'&estaislr='+estaislr+'&estaunomil='+estaunomil+'&porret='+porret+'&basimp='+basimp+'&factor='+factor+'&porsus='+porsus+'&unitri='+unitri+'&codigo='+cod})
       }
       }
     }
   }
  }

  function validaretencion(e,id)
  {
    if ($('opordpag_presiono').value=='N' && $(id).value!="")
    {
     calcularretenciones(e,id);

	var axx=obtener_filas_grid('e','1');
	var o=0;
	var retorna=false;
	while (o<axx)
	{
	  calcularetencion(o);
	  if (o==(parseInt(axx)-1))
	  {
	   retorna=true;
	  }
	  o++;
    }
    if (retorna)
    {
      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3'})
    }
	}
  }

 function codret_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var codret=$(id).value;

   var codretrepetido=false;
   var am=obtener_filas_grid('e','1');
   var i=0;
   while (i<am)
   {
    var codigo="ex"+"_"+i+"_1";

    var codret2=$(codigo).value;

    if (i!=fila)
    {
      if (codret==codret2)
      {
        codretrepetido=true;
        break;
      }
    }
   i++;
   }
   return codretrepetido;
 }

 function posicionretencion(codret,codpre,fila,referencia,tot)
  {
    var ind=0;
    var enc=false;
    while ((ind<tot) && (!enc)) // grid retenciones
    {
      var id1="fx"+"_"+ind+"_1";
      var id2="fx"+"_"+ind+"_2";
      var id4="fx"+"_"+ind+"_4";
      if (referencia!="")
      {
       var tot2=parseInt($('opordpag_filasord').value);
       if (ind<tot2)//grid imputaciones
       { i=ind;}
       else { i=1;}
       if (($(id1).value==codpre) && ($(id2).value==codret) && ($(id4).value==referencia) && (fila!=ind))
       { enc=true;}
      }
      else
      {
       if (($(id1).value==codpre) && ($(id2).value==codret) && (fila!=ind))
       { enc=true;}
      }
      ind++;
    }
    if (enc)
    { return ind; }
    else {return 0;}
  }

 function calcularretenciones(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colbase=col+2;
    var colmonret=col+3;
     var colesta=col+5;

    var base=name+"_"+fil+"_"+colbase;
    var montoret=name+"_"+fil+"_"+colmonret;
    var esta=name+"_"+fil+"_"+colesta;

  if ($('opordpag_afectapresup').value=='S')
  {
    if ($(esta).value!="N")
    {
      var tota=parseInt($('opordpag_filasord').value);
      var monbase=0;
      var fila=0;
      while (fila<tota)
      {
        var id2="ax"+"_"+fila+"_2";
        var id3="ax"+"_"+fila+"_3";

        var montcau=toFloat(id3);

        var enc=false;
        var sesta=$(esta).value;
        var auxi=sesta.split("_");
        if (($('opordpag_afectarecargo').value=='R') || ($('opordpag_afectarecargo').value=='S'))
        {
         var j=0;
         while ((j<((auxi.length)-1)) && (!enc))
         {
          if (($(id2).value.substring(parseInt($('opordpag_iniciopar').value),parseInt($('opordpag_formatopar').value.length)))==auxi[j+1])
          {
            monbase=monbase + montcau;
            enc=true;
          }
          j++;
         }
        }
        else if (($('opordpag_afectarecargo').value=='P'))
        {
         var j=0;
         while ((j<((auxi.length)-1)) && (!enc))
         {
          if ($(id2).value==auxi[j+1])
          {
           monbase=monbase + montcau;
           enc=true;
          }
          j++;
         }
        }
       fila++;
      }
     $(base).value=format(monbase.toFixed(2),'.',',','.');
    }
    else
    {
      if (verificarmarcas('ax',1))
      {
        var montbase=sumarbase(true);
        $(base).value=montbase;
      }
      else
      {
        if (($('opordpag_afectarecargo').value=='R') || ($('opordpag_afectarecargo').value=='S') || ($('opordpag_afectarecargo').value=='P'))
        {
          var montbase=sumarbase(false);
          $(base).value=montbase;
        }
        else
        { $(base).value=$('opordpag_totmoncau').value;}
      }
    }
  }else {$(base).value=$('opordpag_monord').value;}

   if (posiciontiporetencion($(id).value,fil)!=0)
   { alert_('El Tipo de Retenci&oacute;n ya fue Registrado');}
   else
   {
     calcularetencion(fil);
     ActualizarSaldosGrid("a",new Array("opordpag_totmoncau","opordpag_totmonret","opordpag_totmondes"));
   }
  }
 }

  function verificarmarcas(letra,posicion)
  {
   var am=parseInt($('opordpag_filasord').value);
   var fil=0;
   while (fil<am)
   {
    var chk=letra+"_"+fil+"_"+posicion;
    if ($(chk).checked==true)
    { return true;
        break;
    }
   fil++;
   }
  }

  function totalmarcadas(id)
  {
	  var aux = id.split("_");
	  var name=aux[0];
	  var fil=aux[1];
	  var col=parseInt(aux[2]);
	  var colmonto=col+2;
	  var monto=name+"_"+fil+"_"+colmonto;
	  var acum=0;

	  var montotot=toFloat('opordpag_totmarcadas');
	  var montocausar=toFloat(monto);

	  if ($(id).checked==true)
	  {
	    acum=montotot + montocausar;
	    $('opordpag_totmarcadas').value=format(acum.toFixed(2),'.',',','.');
	  }
	  else
	  {
	    acum=montotot - montocausar;
	    $('opordpag_totmarcadas').value=format(acum.toFixed(2),'.',',','.');
	  }
  }

  function sumarbase(marcasinmarca)
  {
    if (marcasinmarca)
    {
     if (verificarmarcas('ax',1))
     {
      var monto4=toFloat('opordpag_totmarcadas');

      var monbase=format(monto4.toFixed(2),'.',',','.');
      return monbase;
     }
    }
   else
   {
      var montbase=0;
      var ac=parseInt($('opordpag_filasord').value);
	  var fil=0;
	  while (fil<ac)
	  {
	   var id4="ax"+"_"+fil+"_2";
	   var id3="ax"+"_"+fil+"_3";

	   var montcau=toFloat(id3);

	   var esrecargo=false;
	   var parti=$('opordpag_partidas').value;
	   var aux2=parti.split("_");

	   if ($('opordpag_partidas').value!="")
	   {
	    var j=0;
	    while ((j<(aux2.length)-1) && (!esrecargo))
	    {
	     var enc=false;
	     if (($('opordpag_afectarecargo').value=='R') || ($('opordpag_afectarecargo').value=='S'))
	     {var z=0;
	      while ((z<((aux2.length)-1)) && (!enc))
	      {
	       if (($(id4).value.substring(parseInt($('opordpag_iniciopar').value),parseInt($('opordpag_formatopar').value.length)))==aux2[z+1])
	       {
	        esrecargo=true;
	        enc=true;
	       }
	       z++;
	      }
	     }
	     else if (($('opordpag_afectarecargo').value=='P'))
	     {
	      var z=0;
	      while ((z<((aux2.length)-1)) && (!enc))
	      {
	       if ($(id4).value==aux2[z+1])
	       {
	        esrecargo=true;
	        enc=true;
	       }
	       z++;
	      }
	     }
	      j++;
	     }
	    }

    if (!esrecargo)
    {
     montbase=montbase + montcau;
    }
   fil++;
   var monbase=format(montbase.toFixed(2),'.',',','.');
  }
  return monbase;
  }
 }

  function posiciontiporetencion(codret,fila)
  {
    var ind=0;
    var enc=false;
    var total=obtener_filas_grid('e','1');
    while ((ind<total) && (!enc)) //grid aplicaret
    {
      var id="ex"+"_"+ind+"_1";
      if (($(id).value==codret) && (fila!=ind))
      { enc=true;}
     ind++;
    }
   if (enc)
   {return ind;}
   else {return 0;}
  }

  function modificar(e)
  {
   if (e.keyCode==13 || e.keyCode==9)
   { $('opordpag_modmonret').value=false;}
  }

  function calcularporcentajeretencion(fila)
  {
    var id1="ex"+"_"+fila+"_3";
    var id2="ex"+"_"+fila+"_4";
    var datret=$('opordpag_datosret').value;
    var aux=datret.split("_");

    var col10=toFloat(id1);
    var col11=toFloat(id2);
    var col5=aux[4]
    var totord=toFloat('opordpag_totmoncau');

    var valorcalculo= (col10*(col5/100));
    var valorlegal= (totord*(col5/100));

    if (valorcalculo!=col11)
    {
      var cal=(col11/(col10*100));
      var porccalc=redondear(cal,8);
    }
    else
    {
     var cal=((col11/col10)*100);
     var porccalc=redondear(col5,8);
    }

    if (totord!=col10)
    {
      var cal=(col11/totord)*100;
      var porccalc=redondear(cal,8);
    }
    return porccalc;
  }

  function posicionenelgrid(codpre,referencia,aw)
  {
    var q=0;
    var enc=false;
    while ((q<aw) && (!enc)) // grid imputaciones
    {
      var id1="ax"+"_"+q+"_2";
      if ($('opordpag_referencias2').value=='')
      { $('opordpag_referencias2').value='_';}
      var referencias=$('opordpag_referencias2').value;
      var ref=referencias.split("_");
      if (referencia=="")
      {
       if ($(id1).value==codpre)
       {
        enc=true; }
      }
      else
      {
       if (($(id1).value==codpre) && (ref[q+1]==referencia))
       { enc=true;}
      }
      q++;
    }
    if (enc)
    { return q-1;}
    else {return 0;}
  }

 function sumardatosgrid()
 {
   var totcau=0;
   var totret=0;
   var totdes=0;
   var diferencia=0;
   var tottipret=0;
   var montoretencion=0;

   var ww=obtener_filas_grid('e',1);
   var aw=parseInt($('opordpag_filasord').value);
   var fil=0;
   while (fil<ww)
   {
    var tipret="ex"+"_"+fil+"_1";
    var montoret="ex"+"_"+fil+"_4";

    if ($(montoret).value!="")
    {
     montoretencion=toFloat(montoret);
    }
    var mongridret=0;
    var zz=totalregistros('fx',1,100);
	var p=0;
	while (p<zz)
	{
	  var aux1="fx"+"_"+p+"_2";
	  var aux2="fx"+"_"+p+"_3";
	  var num1=toFloat(aux2);
      if ($(aux1).value==$(tipret).value)
      {
        mongridret= mongridret + num1;
        ultimoret=p;
      }
	   p++;
	 }

     var diferetencion= montoretencion - mongridret;

     if (diferetencion!=0 && ultimoret>0)
     {
        var aux3="fx"+"_"+ultimoret+"_3";
        var aux4="fx"+"_"+ultimoret+"_1";
        var aux5="fx"+"_"+ultimoret+"_4";
        var num2=toFloat(aux3);
        var cal=num2 + diferetencion;
        $(aux3).value=format(cal.toFixed(2),'.',',','.');
        var codpreret=$(aux4).value;
        var referet=$(aux5).value;

        var fildondesta=posicionenelgrid(codpreret,referet,aw);
        var aux6="fx"+"_"+fildondesta+"_3";
        var num7=toFloat(aux6);
        var caldos=num7 + diferetencion;
        $(aux6).value=format(caldos.toFixed(2),'.',',','.');
     }

    fil++;
   }

   var l=0;
   while (l<aw)
   {
      var moncau="ax"+"_"+l+"_3";
      var monret="ax"+"_"+l+"_4";
      var mondes="ax"+"_"+l+"_5";
      var nmoncau=toFloat(moncau);
      var nmonret=toFloat(monret);
      var nmondes=toFloat(mondes);

      totcau= totcau + nmoncau;
      totret= totret + nmonret;
      totdes= totdes + nmondes;
     l++;
   }

   $('opordpag_totmoncau').value=format(totcau.toFixed(2),'.',',','.');
   $('opordpag_totmonret').value=format(totret.toFixed(2),'.',',','.');
   $('opordpag_totmondes').value=format(totdes.toFixed(2),'.',',','.');
   if ($('opordpag_afectapresup').value=='S')
   {
     var caltres= totcau - (totret +totdes);
     $('opordpag_monord').value=format(caltres.toFixed(2),'.',',','.');
   }

   $('opordpag_monret').value=format(totret.toFixed(2),'.',',','.');
 }

  function nrofacturadeshabilitar(e,id)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var debito=col+2;
     var credito=col+3;
     var tipo=col+4;
     var afectada=col+5;

     var notdeb=name+"_"+fil+"_"+debito;
     var notcre=name+"_"+fil+"_"+credito;
     var tipotrans=name+"_"+fil+"_"+tipo;
     var facafect=name+"_"+fil+"_"+afectada;

     $(notdeb).disabled=true;
     $(notcre).disabled=true;
     $(tipotrans).value="01";
     $(facafect).disabled=true;
   }
 }

  function debitodeshabilitar(e,id)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var factura=col-2;
     var credito=col+1;
     var tipo=col+2;

     var notcre=name+"_"+fil+"_"+credito;
     var tipotrans=name+"_"+fil+"_"+tipo;
     var nrofac=name+"_"+fil+"_"+factura;

     $(notcre).disabled=true;
     $(tipotrans).value="02";
     $(nrofac).disabled=true;
   }
 }

  function creditodeshabilitar(e,id)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var factura=col-3;
     var debito=col-1;
     var tipo=col+1;

     var notdeb=name+"_"+fil+"_"+debito;
     var tipotrans=name+"_"+fil+"_"+tipo;
     var nrofac=name+"_"+fil+"_"+factura;

     $(notdeb).disabled=true;
     $(tipotrans).value="03";
     $(nrofac).disabled=true;
   }
 }

 function calculototalfactura(id)
 {
     totalizar(id);
     validacau(id);
 }


  function totalizar(id)
  {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var colum=col-1;
     var colum2=col;

    var totalfac=name+"_"+fil+"_9";
    var exen=name+"_"+fil+"_10";
    var alic=name+"_"+fil+"_8";
    var retenido=name+"_"+fil+"_13";

    var montotfac=toFloat(totalfac);
    var monexento=toFloat(exen);
    var monto=toFloat(name+"_"+fil+"_"+colum);
    var monto2=toFloat(name+"_"+fil+"_"+colum2);
    var alicuota=toFloat(alic);
    cal=(monto*(-1));

     if (!validarnumero(id))
     {
       alert_('Monto Inv&aacute;lido');
       $(id).value="0,00";
     }

     if (col==10)
     {
       if (monto2 > monto)
       {
         alert('El Monto no puede ser Mayor al Total de la factura');
         $(name+"_"+fil+"_"+colum2).value="0,00";
       }
     }

    if (($(name+"_"+fil+"_6").value=="03") && ($(name+"_"+fil+"_"+colum).value > 0))
    {
      $(name+"_"+fil+"_"+colum).value=format(cal.toFixed(2),'.',',','.');
    }
    var am=obtener_filas_grid('e','1');
    var filas=parseInt($('opordpag_filasconsret').value);
    var bm=totalregistros('dx',2,filas);
    if ((am!=0) || (bm!=0))
    {
      if ($(alic).value!="")
      {
        var calculos=(((montotfac-monexento)/(100+alicuota))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');

        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*alicuota)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('opordpag_incmod').value=="I")
        {
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetiva(num,codigo[0]);
        }
        else
        {
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetivac(num,codigo[0]);
        }
      }
      else
      {
        var calculos=(((montotfac-monexento)/(100+0))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');

        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*0)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('opordpag_incmod').value=="I")
        {
         $(retenido).value= "0,00";
        }
        else
        {
         $(retenido).value= "0,00";
        }
      }
   }
 }

 function validacau(id)
 {
   var tofac=toFloat('opordpag_totfac');
    var totcau=toFloat('opordpag_totmoncau');
    if (tofac>totcau)
    {
     alert('El Monto Total de la factura no puede ser Mayor al Monto Total a Causar');
     $(id).value='0,00';
    }
 }

 function totalizarexento(e,id)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var colum=col-1;
     var colum2=col;

    var totalfac=name+"_"+fil+"_9";
    var exen=name+"_"+fil+"_10";
    var alic=name+"_"+fil+"_8";
    var retenido=name+"_"+fil+"_13";

    var montotfac=toFloat(totalfac);
    var monexento=toFloat(exen);
    var monto=toFloat(name+"_"+fil+"_"+colum);
    var monto2=toFloat(name+"_"+fil+"_"+colum2);
    var alicuota=toFloat(alic);
    cal=(monto*(-1));

     if (!validarnumero(id))
     {
       alert_('Monto Inv&aacute;lido');
       $(id).value="0,00";
     }

     if (col==10)
     {
       if (monto2 > monto)
       {
         alert('El Monto no puede ser Mayor al Total de la factura');
         $(name+"_"+fil+"_"+colum2).value="0,00";
       }
     }

    if (($(name+"_"+fil+"_6").value=="03") && ($(name+"_"+fil+"_"+colum).value > 0))
    {
      $(name+"_"+fil+"_"+colum).value=format(cal.toFixed(2),'.',',','.');
    }
    var am=obtener_filas_grid('e','1');
    var filas=parseInt($('opordpag_filasconsret').value);
    var bm=totalregistros('dx',2,filas);
    if ((am!=0) || (bm!=0))
    {
      if ($(alic).value!="")
      {
        var calculos=(((montotfac-monexento)/(100+alicuota))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');

        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*alicuota)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('opordpag_incmod').value=="I")
        {
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetiva(num,codigo[0]);
        }
        else
        {
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetivac(num,codigo[0]);
        }
      }
      else
      {
        var calculos=(((montotfac-monexento)/(100+0))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');

        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*0)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('opordpag_incmod').value=="I")
        {
         $(retenido).value= "0,00";
        }
        else
        {
         $(retenido).value= "0,00";
        }
      }
   }
   }
 }

 function unoxmil(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col+1;
   var porcent=col+2;
   var monto=col+3;
   var total=col-5;
   var imp=col-2;

   var basemil=name+"_"+fil+"_"+bas;
   var porcentmil=name+"_"+fil+"_"+porcent;
   var montomil=name+"_"+fil+"_"+monto;
   var totalfac=name+"_"+fil+"_"+total;
   var impuesto=name+"_"+fil+"_"+imp;

   var montotfac=toFloat(totalfac);
   var monimpuesto=toFloat(impuesto);

    var calcular=calcularBaseImponible('1*MIL');
    var valor=String(calcular);

    var calcularbi=toFloat2(valor);

   if ($('opordpag_eltimbre').value==0)
   {
     alert('No hay Retencion de Ley de Timbre Fiscal');
     $(id).checked=false;
   }
   else
   {
      if ($('opordpag_incmod').value=="I")
      {
        var baseimponible=porcentajeISLRN("1*MIL","BasImp");
        var valor= String(baseimponible);
        var porislr=toFloat2(valor);

        var porcentaje=porcentajeISLRN("1*MIL","PorRet");

         var calculo=((montotfac-monimpuesto)*porislr/100);
         $(basemil).value=format(calculo.toFixed(2),'.',',','.');
         $(basemil).disabled=false;

         $(porcentmil).value=format(porcentaje,'.',',','.');
         var cal2=monto1XMILN();
      }
      else
      {
         var baseimponible2=porcentajeISLRC("1*MIL","BasImp");
         var valor=String(baseimponible2);
         var porislr2=toFloat2(valor);
         var porcentaje2=porcentajeISLRC("1*MIL","PorRet");

         var calculo=((montotfac-monimpuesto)*porislr2/100);
         $(basemil).value=format(calculo.toFixed(2),'.',',','.');
         $(basemil).disabled=false;
         $(porcentmil).value=format(porcentaje2,'.',',','.');
         var cal2=monto1XMILC();
      }

      $(montomil).value=format(cal2.toFixed(2),'.',',','.');
   }
 }

 function calcularBaseImponible(tipo)
 {
  var calcularbaseimponible=0;

  if ($('opordpag_incmod').value=="I")
  {
    total=obtener_filas_grid('e','1');
    j=0;
    while (j<total)
    {
     var baseimp="ex"+"_"+j+"_3";
     var islr="ex"+"_"+j+"_7";
     var unoxmil="ex"+"_"+j+"_8";

     switch(tipo)
     {
       case "ISLR":
       trajo=$(islr).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
     }
	  if (trajo=="S")
	  {
	    calcularbaseimponible=$(baseimp).value;
	   break;
	  }
    j++;
   }
  }
  else
  {
    var fila=0;
    var tota=parseInt($('opordpag_filasord').value);
    while (fila<tota)
    {
      var id2="ax"+"_"+fila+"_2";
      var id3="ax"+"_"+fila+"_3";
      var id4="ax"+"_"+fila+"_4";

     var montcau=toFloat(id3);
     var montret=toFloat(id4);

     var enc=false;
     var sesta=$('opordpag_partidas').value;
     var auxi=sesta.split("_");
     if (montret > 0)
     {
        if (($('opordpag_afectarecargo').value=='R') || ($('opordpag_afectarecargo').value=='S'))
        {
         var j=0;
         while ((j<((auxi.length)-1)) && (!enc))
         {
          if (!(($(id2).value.substring(parseInt($('opordpag_iniciopar').value),parseInt($('opordopag_formatopar').value.length)))==auxi[j+1]))
          {
            calcularbaseimponible=calcularbaseimponible + montcau;
            enc=true;
          }
          j++;
         }
        }
        else if (($('opordpag_afectarecargo').value=='P'))
        {
         var j=0;
         while ((j<((auxi.length)-1)) && (!enc))
         {
          if (!($(id2).value==auxi[j+1]))
          {
           calcularbaseimponible=calcularbaseimponible + montcau;
           enc=true;
          }
          j++;
         }
        }
      }
       fila++;
    }
    var total=parseInt($('opordpag_filasconsret').value);
    var j=0;
    while (j<total)
    {
     var islr="dx"+"_"+j+"_6";
     var unoxmil="dx"+"_"+j+"_7";

     switch(tipo)
     {
       case "ISLR":
       trajo=$(islr).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
     }
    if (trajo=="S")
    {
      montorecal=recalculaRetencion(j,calcularbaseimponible);
      var valor=String(montorecal);

      var montorecalculado=toFloat2(valor);
      if (tipo=="ISLR")
      {
        if (montorecalculado!=$('opordpag_elislr').value)
        {
         calcularbaseimponible=redondear(((calcularbaseimponible*$('opordpag_elislr').value)/montorecalculado),2);
        }
      }
      else if (tipo=="1*MIL")
      {
        if (montorecalculado!=$('opordpag_eltimbre').value)
        {
         calcularbaseimponible=((calcularbaseimponible*$('opordpag_eltimbre').value)/montorecalculado);
        }
      }
     break;
    }
    j++;
   }

  }
   return calcularbaseimponible;
 }

 function recalculaRetencion(fila,monto)
 {
    var codtip="dx"+"_"+fila+"_2";
    var porret="dx"+"_"+fila+"_8";
    var baseimp="dx"+"_"+fila+"_9";
    var porsus="dx"+"_"+fila+"_10";
    var unitri="dx"+"_"+fila+"_12";
    var factor="dx"+"_"+fila+"_11";

    var porcentaje=toFloat(porret);
    var base=toFloat(baseimp);
    var unidad=toFloat(unitri);
    var sus=toFloat(porsus);
    var fact=toFloat(factor);

    if (porcentaje!=0)
    {
      cals=((porcentaje/100)*(base/100)*monto);
      recalcularetencion=format(cals.toFixed(2),'.',',','.');
    }
    else
    {
      sust=((sus/100)*unidad*fact);
      reten=((sus/100)*(base/100)*monto);
      if (reten > sust)
      {
        calc=reten - sust;
        recalcularetencion=format(calc.toFixed(2),'.',',','.');
      }
      else
      {
        recalcularetencion=format(sust.toFixed(2),'.',',','.');
      }
    }

   recalcularetencion;
 }

 function porcentajeISLRN(tipo,campo)
 {
   porcentajeislr=0;
   total=obtener_filas_grid('e','1');
   j=0;
   while (j<total)
   {
     var islr="ex"+"_"+j+"_7";
     var unoxmil="ex"+"_"+j+"_8";
     var base="ex"+"_"+j+"_10";
     var porcen="ex"+"_"+j+"_9";

     switch(tipo)
     {
       case "ISLR":
       trajo=$(islr).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
     }
    if (trajo=="S")
    {
       if (campo=="BasImp")
       {
         porcentajeislr=$(base).value;
       }else { porcentajeislr=$(porcen).value;}
     break;
    }
    j++;
  }
  return porcentajeislr;
 }

  function porcentajeISLRC(tipo,campo)
 {
   var porcentajeislr=0;
   var total=parseInt($('opordpag_filasconsret').value);
   var j=0;
   while (j<total)
   {
     var islr="dx"+"_"+j+"_6";
     var unoxmil="dx"+"_"+j+"_7";
     var base="dx"+"_"+j+"_9";
     var porcen="dx"+"_"+j+"_8";

     switch(tipo)
     {
       case "ISLR":
       trajo=$(islr).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
     }
    if (trajo=="S")
    {
       if (campo=="BasImp")
       {
         porcentajeislr=$(base).value;
       }else { porcentajeislr=$(porcen).value;}
     break;
    }
    j++;
  }
  return porcentajeislr;
 }

 function monto1XMILN()
 {
   montounomil=0;
   total=totalregistros('fx',2,100);
   j=0;
   while (j<total)
   {
     var monto1="fx"+"_"+j+"_3";
     var unoxmil="fx"+"_"+j+"_5";
     var num1=toFloat(monto1);

    if ($(unoxmil).value=="S")
    {
      montounomil= montounomil + num1;
    }
    j++;
  }
  return montounomil;
 }

  function monto1XMILC()
 {
   var montounomil=0;
   var total=parseInt($('opordpag_filasconsret').value);
   var j=0;
   while (j<total)
   {
     var monto1="dx"+"_"+j+"_4";
     var unoxmil="dx"+"_"+j+"_7";
     var num1=toFloat(monto1);

    if ($(unoxmil).value=="S")
    {
      montounomil = montounomil +num1;
    }
    j++;
  }
  return montounomil;
 }

   function recalunoxmil(e,id)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col;
   var porcent=col+1;
   var monto=col+2;
   var total=col-5;
   var imp=col-2;

   var basemil=name+"_"+fil+"_"+bas;
   var porcentmil=name+"_"+fil+"_"+porcent;
   var montomil=name+"_"+fil+"_"+monto;
   var totalfac=name+"_"+fil+"_"+total;
   var impuesto=name+"_"+fil+"_"+imp;

   toFloatVE(basemil);

   var montotfac=toFloat(totalfac);
   var monimpuesto=toFloat(impuesto);
   var montobasemil = FloatVEtoFloat($(basemil).value);
   var montoporcentmil = FloatVEtoFloat($(porcentmil).value);

   $(montomil).value = FloattoFloatVE(montobasemil*(montoporcentmil/100));
   }
  }


  function islr(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col+1;
   var porcent=col+2;
   var monto=col+3;
   var total=col-9;
   var imp=col-6;
   var cod=col+4;

   var baseislr=name+"_"+fil+"_"+bas;
   var porcentislr=name+"_"+fil+"_"+porcent;
   var montoislr=name+"_"+fil+"_"+monto;
   var totalfac=name+"_"+fil+"_"+total;
   var impuesto=name+"_"+fil+"_"+imp;
   var codislr=name+"_"+fil+"_"+cod;

  var montotfac=toFloat(totalfac);
   if (montotfac>0)
   {
    if ($(porcentislr).value!='')
    {
   var monimpuesto=toFloat(impuesto);

   var calcular=calcularBaseImponible('ISLR');
   var valor=String(calcular);
    var calcularbi=toFloat2(valor);

   if ($('opordpag_elislr').value==0)
   {
     alert_('No hay Retenci&oacute;n de I.S.L.R');
     $(id).checked=false;
   }
   else
   {
      if ($('opordpag_incmod').value=="I")
      {
        var baseimponible=porcentajeISLRN("ISLR","BasImp");
        var valor=String(baseimponible);
        var basip=toFloat2(valor);
        var porcentaje=porcentajeISLRN("ISLR","PorRet");
        var valor2=String(porcentaje);
        var porcentajes=toFloat2(valor2);

         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseislr).value=format(calculo.toFixed(2),'.',',','.');
         $(baseislr).disabled=false;
         $(porcentislr).value=format(porcentajes.toFixed(2),'.',',','.');
      }
      else
      {
        var baseimponible2=porcentajeISLRC("ISLR","BasImp");
        var valor=String(baseimponible2);
        var basip=toFloat2(valor);

        var porcentaje2=porcentajeISLRC("ISLR","PorRet");

        var valor2=String(porcentaje2);
        var porcentajes=toFloat2(valor2);

         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseislr).value=format(calculo.toFixed(2),'.',',','.');
         $(baseislr).disabled=false;
         $(porcentislr).value=format(porcentajes.toFixed(2),'.',',','.');
      }
      var base=toFloat(baseislr);

      cal=((base*($('opordpag_elislr').value))/calcularbi);
      $(montoislr).value=format(cal.toFixed(2),'.',',','.');
      index=$(porcentislr).selectedIndex;
      var cod=$(porcentislr).options[index].text;
      var codigo=cod.split("_");
      $(codislr).value=codigo[0];
   }
   }
   else
   {
    alert('Debe Seleccionar el Porcentaje de ISLR a aplicar');
     $(id).checked=false;
   }
   }
   else
   {
    alert('El Total de la Factura debe ser mayor que cero');
     $(id).checked=false;
   }
  }

  function recalislr(e,id)
  {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col;
   var porcent=col+1;
   var monto=col+2;
   var total=col-9;
   var imp=col-6;
   var cod=col+4;

   var baseislr=name+"_"+fil+"_"+bas;
   var porcentislr=name+"_"+fil+"_"+porcent;
   var montoislr=name+"_"+fil+"_"+monto;
   var totalfac=name+"_"+fil+"_"+total;
   var impuesto=name+"_"+fil+"_"+imp;
   var codislr=name+"_"+fil+"_"+cod;

   toFloatVE(baseislr);

   var montobaseislr = FloatVEtoFloat($(baseislr).value);
   var montoporcentislr = FloatVEtoFloat($(porcentislr).value);

   $(montoislr).value = FloattoFloatVE(montobaseislr*(montoporcentislr/100));
   }
  }

   function calculaRetiva(monto,codigo)
   {
     var calcularetiva=0;
     var ax=obtener_filas_grid('e','1');
     var i=0;
     while (i<ax)
     {
      var codi="ex"+"_"+i+"_1";
      var basimp="ex"+"_"+i+"_10";
      var porret="ex"+"_"+i+"_9";
      var factor="ex"+"_"+i+"_11";
      var porsus="ex"+"_"+i+"_12";
      var cuantas="ex"+"_"+i+"_13";
      var esta="ex"+"_"+i+"_6";

      var base=toFloat(basimp);
      var porcenret=toFloat(porret);
      var monfactor=toFloat(factor);
      var porcensus=toFloat(porsus);
      var moncuantas=toFloat(cuantas);
      var monunitri=toFloat('opordpag_unidad');

    if ($(codi).value==codigo)
    {
      if ($(esta).value!="N")
      {
       if ($(porret).value!=0)
       {
         cal=((porcenret/100)*((base/100)*monto));
         calcularetiva=format(cal.toFixed(2),'.',',','.');
       }
       else
       {
         sust=((porcensus/100)*(monunitri*moncuantas)*monfactor);
         reten=((porcensus/100)*(base/100)*monto);
         if (reten > sust)
         {
           calcu=reten-sust;
           calcularetiva=format(calcu.toFixed(2),'.',',','.');
         }
         else
         {
           calcularetiva=format(sust.toFixed(2),'.',',','.');
         }
       }
       break;
      }
    }
     i++;
    }

    return calcularetiva;
  }

  function calculaRetivac(monto,codigo)
   {
     var calcularetiva=0;
     var ax=parseInt($('opordpag_filasconsret').value);
     var i=0;
     while (i<ax)
     {
      var codi="dx"+"_"+i+"_2";
      var basimp="dx"+"_"+i+"_9";
      var porret="dx"+"_"+i+"_8";
      var factor="dx"+"_"+i+"_11";
      var porsus="dx"+"_"+i+"_10";
      var cuantas="dx"+"_"+i+"_12";
      var esta="dx"+"_"+i+"_5";

      var base=toFloat(basimp);
      var porcenret=toFloat(porret);
      var monfactor=toFloat(factor);
      var porcensus=toFloat(porsus);
      var moncuantas=toFloat(cuantas);
      var monunitri=toFloat('opordpag_unidad');

    if ($(codi).value==codigo)
    {
      if ($(esta).value!="N")
      {
       if ($(porret).value!=0)
       {
         cal=((porcenret/100)*((base/100)*monto));
         calcularetiva=format(cal.toFixed(2),'.',',','.');
       }
       else
       {
         sust=((porcensus/100)*(monunitri*moncuantas)*monfactor);
         reten=((porcensus/100)*(base/100)*monto);
         if (reten > sust)
         {
           calcu=reten-sust;
           calcularetiva=format(calcu.toFixed(2),'.',',','.');
         }
         else
         {
           calcularetiva=format(sust.toFixed(2),'.',',','.');
         }
       }
       break;
      }
    }
     i++;
    }

    return calcularetiva;
  }

  function consultarComp()
  {
    window.open('/tesoreria_dev.php/confincomgen/edit/id/'+$("opordpag_idrefer").value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

  function desahabilitariva()
  {
    var l=0;
    var total=parseInt($('opordpag_filasord').value);
    while (l<total)
    {
      var id2="ax"+"_"+l+"_1";
      var id3="ax"+"_"+l+"_7";
      if ($(id3).value=='S')
      {
       $(id2).disabled=true;
      }

     l++;
    }
  }


  function calcularetencion(fil)
  {
    var aux1="ex"+"_"+fil+"_10";
    var aux2="ex"+"_"+fil+"_9";
    var aux3="ex"+"_"+fil+"_3";
    var aux4="ex"+"_"+fil+"_4";
    var aux7="ex"+"_"+fil+"_1";
    var aux15="ex"+"_"+fil+"_12";
    var aux16="ex"+"_"+fil+"_13";
    var aux17="ex"+"_"+fil+"_11";
    var auxmil="ex"+"_"+fil+"_8";

    var base=toFloat(aux3);
    var monreten=toFloat(aux4);
    var porcen=toFloat(aux2);
    var porsus=toFloat(aux15);
    var basimp=toFloat(aux1);
    var unitri=toFloat(aux16);
    var factor=toFloat(aux17);

    if (porcen!=0)
    {
      if ($('opordpag_modmonret').value=="true")
      {
        var cal=((porcen/100)*(basimp/100)*base);
        $(aux4).value=format(cal.toFixed(2),'.',',','.');
      }
      var totalfilas=parseInt($('opordpag_filasord').value);
      var i=0;
      while (i<totalfilas) //Grid Detalle
      {
       var aux8="ax"+"_"+i+"_2";
       var aux5="ax"+"_"+i+"_3";
       var aux6="ax"+"_"+i+"_4";
       //var aux7="ex"+"_"+fil+"_1";

       var tot=totalregistros('fx',1,100);

      var retenc=toFloat(aux6);
      var causado=toFloat(aux5);


     var Montobase= ((causado*basimp)/100);
     var porcent=calcularporcentajeretencion(fil); //se pasaban 3 parametros y se utiliza uno soloen VB
     var cal2=((porcent/100)*(basimp/100)*Montobase);
     var retencion=redondear(cal2,8);
     var sustraendo=0;
     var suma=retenc+retencion;
     var calculo=redondear(suma,8);
     $(aux6).value=format(calculo.toFixed(2),'.',',','.');

      if ($('opordpag_referencias2').value=='')
      { $('opordpag_referencias2').value='_';}
     var referencias=$('opordpag_referencias2').value;
     var ref=referencias.split("_");
     var posenc=0;
       if (ref[1]=="")
       {  posenc=posicionretencion($(aux7).value,$(aux8).value,-1,"",tot);}
       else {posenc=posicionretencion($(aux7).value,$(aux8).value,-1,ref[i+1],tot);}
       if (posenc==0)
       {
         var filaret=totalregistros('fx',1,100);
         posenc=filaret;
       }
       var aux9="fx"+"_"+posenc+"_1";
       var aux10="fx"+"_"+posenc+"_2";
       var aux11="fx"+"_"+posenc+"_3";
       var aux12="fx"+"_"+posenc+"_4";
       var aux13="fx"+"_"+posenc+"_5";

       $(aux9).value=$(aux8).value;
       $(aux10).value=$(aux7).value;
       $(aux13).value=$(auxmil).value;
       var resta=retencion-sustraendo;
       var calculo1=redondear(resta,8);
       $(aux11).value=format(calculo1.toFixed(2),'.',',','.');
       if (ref[1]!="")
       {$(aux12).value=ref[i+1];}
      i++;
      }

      var monto=0;
      var otromonto=0;
      var marcas=0;
      var totreg=parseInt($('opordpag_filasord').value);
      var l=0;
      while (l<totreg)
      {
       var chk="ax"+"_"+l+"_1";
       if ($(chk).checked==true)
       {marcas=marcas  + 1;}
      l++;
     }
     var desde=(((((fil+1)-1)*marcas)-1)+1);
     var hasta=((fil+1)*marcas);
     while (desde<hasta)
     {
      var aux13="fx"+"_"+desde+"_3";

      var montorete=toFloat(aux13);

      var monto=montorete + monto;
       desde++;
     }

     var aux4="ex"+"_"+fil+"_4";

     var monreten=toFloat(aux4);

     if ((desde)>1)
     {
      var aux14="fx"+"_"+desde+"_3";
      var montorete2=toFloat(aux14);

      otromonto=monreten - monto;
      var cal3=montorete2+otromonto;
      $(aux14).value=format(cal3.toFixed(2),'.',',','.');
     }
   }
   else
   {
    var totcau=toFloat('opordpag_totmoncau');

    var porcbase=((base*100)/totcau);
    var sustraendo=((porsus/100)*unitri*factor);
    var retencion=((porsus/100)*(basimp/100)*base);

     if (retencion>sustraendo)
     {
       var cal4=retencion-sustraendo;
       $(aux4).value=format(cal4.toFixed(2),'.',',','.');
     }
     else { $(aux4).value=format(sustraendo.toFixed(2),'.',',','.');}
     var total=parseInt($('opordpag_filasord').value);
     var posenc=0;
     var i=0;
      while (i<total)
      {
        var aux8="ax"+"_"+i+"_2";
        var aux5="ax"+"_"+i+"_3";
        var aux6="ax"+"_"+i+"_4";

        var retenc=toFloat(aux6);
        var causado=toFloat(aux5);

        var tot=totalregistros('fx',1,100);

        var Montobase= ((causado*porcbase)/100);
        var retencion=((porsus/100)*(basimp/100)*Montobase);
        var sustraendo=(((porsus/100)*unitri*factor)/tot);
        var varia=retenc+(retencion-sustraendo);
        $(aux6).value=format(varia.toFixed(2),'.',',','.');

        if ($('opordpag_referencias2').value=='')
        { $('opordpag_referencias2').value='_';}
        var referencias=$('opordpag_referencias2').value;
        var ref=referencias.split("_");
        if (ref[1]=="")
        { posenc=posicionretencion($(aux7).value,$(aux8).value,-1,"",tot);}
        else { posenc=posicionretencion($(aux7).value,$(aux8).value,-1,ref[i+1],tot);}
        if (posenc==0)
        {
         var filaret=totalregistros('fx',1,100);
         posenc=filaret;
        }
        var aux9="fx"+"_"+posenc+"_1";
        var aux10="fx"+"_"+posenc+"_2";
        var aux11="fx"+"_"+posenc+"_3";
        var aux12="fx"+"_"+posenc+"_4";
        var aux13="fx"+"_"+posenc+"_5";
        $(aux9).value=$(aux8).value;
        $(aux10).value=$(aux7).value;
        $(aux13).value=$(auxmil).value;
        if (retencion>sustraendo)
        {
          var calculo1=(retencion-sustraendo);
          $(aux11).value=format(calculo1.toFixed(2),'.',',','.');
        }else {$(aux11).value=format(sustraendo.toFixed(2),'.',',','.');}

      i++;
      }
   }
   ActualizarSaldosGrid("a",new Array("opordpag_totmoncau","opordpag_totmonret","opordpag_totmondes"));
 }

  function distribuyeretenciones()
 {
   var tot2=totalregistros('fx',1,100);
   var g=0;
   while (g<tot2)
   {
     caj1="fx"+"_"+g+"_1";
     caj2="fx"+"_"+g+"_2";
     caj3="fx"+"_"+g+"_3";
     caj4="fx"+"_"+g+"_4";
     caj5="fx"+"_"+g+"_5";

     $(caj1).value="";
     $(caj2).value="";
     $(caj3).value="0,00";
     $(caj4).value="";
     $(caj5).value="";
     g++;
   }
   var cienxcien=0;
   if (verificarmarcas('ax',1))
   {
    var xcien=toFloat('opordpag_totmarcadas');
    cienxcien=xcien;
   }
   else
   {
    var montobas=sumarbase(false);
    var valor=String(montobas);
    var xcien=toFloat2(valor);

    cienxcien=xcien;
   }

  var ww=obtener_filas_grid('e','1');
  var ab=parseInt($('opordpag_filasord').value);
  var fil=0;
  while (fil<ww)
  {
    var base="ex"+"_"+fil+"_3";
    var montoret="ex"+"_"+fil+"_4";
    var unomil="ex"+"_"+fil+"_8";
    var esta="ex"+"_"+fil+"_6";
    var tipret="ex"+"_"+fil+"_1";

    var montorete=toFloat(montoret);

    if ($(esta).value!="N")
   {
    var baseretiva=0;
    var fila=0;
    while (fila<ab)
    {
      var id2="ax"+"_"+fila+"_2";
      var id3="ax"+"_"+fila+"_3";

      var montcau=toFloat(id3);

      var enc=false;
      var estan=$(esta).value;
      var auxi=estan.split("_");

      if (($('opordpag_afectarecargo').value=='R') || ($('opordpag_afectarecargo').value=='S'))
      {
        var j=0;
        while ((j<((auxi.length)-1)) && (!enc))
        {
         if (($(id2).value.substring(parseInt($('opordpag_iniciopar').value),parseInt($('opordpag_formatopar').value.length)))==auxi[j+1])
         {
           baseretiva=baseretiva + montcau;
           enc=true;
          }
        j++;
        }
      }
      else if (($('opordpag_afectarecargo').value=='P'))
      {
        var j=0;
        while ((j<((auxi.length)-1)) && (!enc))
        {
        if ($(id2).value==auxi[j+1])
        {
          baseretiva=baseretiva + montcau;
          enc=true;
        }
        j++;
       }
      }
     fila++;
   }
   if ($('opordpag_referencias2').value=='')
   { $('opordpag_referencias2').value='_';}
   var referencias=$('opordpag_referencias2').value;
   var ref=referencias.split("_");
   var l=0;
   while (l<ab)
   {
      var id4="ax"+"_"+l+"_2";
      var id5="ax"+"_"+l+"_3";

      var total=totalregistros('fx',1,100);
      var causado=toFloat(id5);

      var enc=false;
      var estas=$(esta).value;
      var auxil=estas.split("_");
      var posenc=0;
      var x=0;
      while ((x<((auxil.length)-1)) && (!enc))
      {
       if ((($('opordpag_afectarecargo').value=='R') && ($(id4).value.substring(parseInt($('opordpag_iniciopar').value),parseInt($('opordpag_formatopar').value.length))==auxil[x+1])) || (($('opordpag_afectarecargo').value=='P') && ($(id4).value==auxil[x+1])) || (($('opordpag_afectarecargo').value=='S') && (($(id4).value.substring(parseInt($('opordpag_iniciopar').value),parseInt($('opordpag_formatopar').value.length)))==auxil[x+1])))
       {
        var por=((causado*100)/baseretiva);
        var porcentaje=redondear(por,8);
        if ($('opordpag_documento').value!='N')
        {
          posenc=posicionretencion($(tipret).value,$(id4).value,-1,ref[l+1],total);
        }
        else
        {
          posenc=posicionretencion($(tipret).value,$(id4).value,-1,"",total);
        }

        if (posenc==0)
          {
           var filaret=totalregistros('fx',1,100);
           posenc=filaret;
          }

          var aux9="fx"+"_"+posenc+"_1";
          var aux10="fx"+"_"+posenc+"_2";
          var aux11="fx"+"_"+posenc+"_3";
          var aux12="fx"+"_"+posenc+"_4";
          var aux13="fx"+"_"+posenc+"_5";

          $(aux9).value=$(id4).value;
          $(aux10).value=$(tipret).value;
          $(aux13).value=$(unomil).value;
          var multi=0;
          if ($(montoret).value!="")
          {
            multi=redondear(((montorete*porcentaje)/100),8);
            $(aux11).value=format(multi.toFixed(2),'.',',','.');
          }
          else
          {
            multi=((0*porcentaje)/100);
            $(aux11).value=format(multi.toFixed(2),'.',',','.');
          }

         if (ref[1]!="")
         {
          $(aux12).value=ref[l+1];
         }
       enc=true;
      }
     x++;
     }
     l++;
    }
   }
   else
   {
    if ($('opordpag_referencias2').value=='')
    { $('opordpag_referencias2').value='_';}
    var referencias=$('opordpag_referencias2').value;
   var ref=referencias.split("_");
    if (!verificarmarcas('ax',1))
  {
    var fi=0;
    while (fi<ab)
    {
      var id4="ax"+"_"+fi+"_2";
      var id3="ax"+"_"+fi+"_3";
      var total=totalregistros('fx',1,100);

      var montcau=toFloat(id3);

      var esrecargo=false;
      var parti=$('opordpag_partidas').value;
      var aux2=parti.split("_");
      var posenc=0;

      if ($('opordpag_partidas').value!="")
      {
        var j=0;
        while ((j<((aux2.length)-1)) && (!esrecargo))
        {
          enc=false;
          if (($('opordpag_afectarecargo').value=='R') || ($('opordpag_afectarecargo').value=='S'))
          {
            var z=0;
            while ((z<((aux2.length)-1)) && (!enc))
            {
              if (($(id4).value.substring(parseInt($('opordpag_iniciopar').value),parseInt($('opordpag_formatopar').value.length)))==aux2[z+1])
              {
                esrecargo=true;
                enc=true;
              }
              z++;
            }
         }
         else if (($('opordpag_afectarecargo').value=='P'))
         {
           var z=0;
           while ((z<((aux2.length)-1)) && (!enc))
           {
             if ($(id4).value==aux2[z+1])
             {
               esrecargo=true;
               enc=true;
             }
             z++;
           }
         }
          j++;
         }
       }

      if (!esrecargo)
      {
        if (cienxcien>0)
        {
          var porcentaje=redondear(((montcau*100)/cienxcien),8);
        }
        else{ var porcentaje=0;}

        var monto=0;
        var resta=0;
        if ($('opordpag_documento').value!='N')
      {
        posenc=posicionretencion($(tipret).value,$(id4).value,-1,ref[fi+1],total);
      }
      else
      {
       posenc=posicionretencion($(tipret).value,$(id4).value,-1,"",total);
      }

      if (posenc==0)
        {
         var filaret=totalregistros('fx',1,100);
         posenc=filaret;
        }

        var aux9="fx"+"_"+posenc+"_1";
        var aux10="fx"+"_"+posenc+"_2";
        var aux11="fx"+"_"+posenc+"_3";
        var aux12="fx"+"_"+posenc+"_4";
        var aux13="fx"+"_"+posenc+"_5";

        $(aux9).value=$(id4).value;
        $(aux10).value=$(tipret).value;
        $(aux13).value=$(unomil).value;
        var multi=0;
        if ($(montoret).value!="")
        {
          multi=redondear(((montorete*porcentaje)/100),8);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');
        }
        else
        {
          multi=((0*porcentaje)/100);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');
        }

       if (ref[1]!="")
       { $(aux12).value=ref[fi+1]; }
      }
     fi++;
    }
  }
  else
  {
    var montototal=toFloat('opordpag_totmoncau');

   if ((montototal> 0) && $(tipret).value!="" && $(montoret).value!="")
     { var porcentaje=redondear(((montorete*100)/cienxcien),8);}
     else{ var porcentaje=0;}
     var monto=0;
     var resta=0;
     var fi=0;
     while (fi<ab)
   {
    var id1="ax"+"_"+fi+"_1";
    var id4="ax"+"_"+fi+"_2";
    var id3="ax"+"_"+fi+"_3";
    var total=totalregistros('fx',1,100);

    var montcau=toFloat(id3);

    var posenc=0;
      if ($(id1).checked==true)
      {
        if ($('opordpag_documento').value!='N')
      { posenc=posicionretencion($(tipret).value,$(id4).value,-1,ref[fi+1],total);}
      else
      { posenc=posicionretencion($(tipret).value,$(id4).value,-1,"",total);}

      if (posenc==0)
        {
         var filaret=totalregistros('fx',1,100);
         posenc=filaret;
        }
        var aux9="fx"+"_"+posenc+"_1";
        var aux10="fx"+"_"+posenc+"_2";
        var aux11="fx"+"_"+posenc+"_3";
        var aux12="fx"+"_"+posenc+"_4";
        var aux13="fx"+"_"+posenc+"_5";

        $(aux9).value=$(id4).value;
        $(aux10).value=$(tipret).value;
        $(aux13).value=$(unomil).value;
        var multi=0;
        if ($(montoret).value!="")
        {
          multi=redondear(((montcau*porcentaje)/100),8);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');
          monto= multi + monto;
          if (ref[1]!="")
          { $(aux12).value=ref[fi+1];}
        }
        else
        {
          multi=((0*porcentaje)/100);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');

        }
       }
       fi++;
   }

   var resta=montorete - monto;
   var aux11="fx"+"_"+posenc+"_3";
   var montoretec=toFloat(aux11);


  var cal2= montoretec +resta;
   $(aux11).value=format(cal2.toFixed(2),'.',',','.');
  }
   }
  fil++;
  }
 }

 function sumarretenciones()
 {
  var aw=parseInt($('opordpag_filasord').value);
  var ind=0;
  while (ind<aw)
  {
   var aux="ax"+"_"+ind+"_4";
   $(aux).value="0,00";
  ind++;
  }


  var zz=totalregistros('fx',1,100);
  var inc=0;
  var p=0;
  var fildondesta=0;
  while (p<zz)
  {
    var aux1="fx"+"_"+p+"_1";
    var aux2="fx"+"_"+p+"_4";
    var aux4="fx"+"_"+p+"_3";

    var monto=toFloat(aux4);

  if ($('opordpag_referencias2').value=='')
  { $('opordpag_referencias2').value='_';}
  var referencias=$('opordpag_referencias2').value;
  var ref=referencias.split("_");
    if (ref[1]!="")
    {
      if (p<=aw)
      { i=p; }
      else
      {
        i=inc;
        inc=inc+1;
        if (inc>aw)
        {
         inc=0;
        }
      }
    fildondesta=posicionenelgrid($(aux1).value,$(aux2).value,aw);
   }
   else {fildondesta=posicionenelgrid($(aux1).value,"",aw);}
   if (fildondesta!=-1)
   {
     var aux3="ax"+"_"+fildondesta+"_4";
     var retencion=toFloat(aux3);

   var calculo=retencion + monto;
     $(aux3).value=format(calculo.toFixed(2),'.',',','.');
   }
   p++;
  }
  sumardatosgrid();
 }