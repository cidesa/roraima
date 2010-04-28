  function mostrar(item,item2)
  {
    obj=$(item);
    obj.style.display="block";
    obj2=$(item2);
    obj2.style.display="none";
  }

  function mostrar2(item,item2)
  {
    obj=$(item);
    obj.style.display="block";
    obj2=$(item2);
    obj2.style.display="block";
  }

  function mostrar3(item)
  {
    obj=$(item);
    obj.style.display="block";
  }

  function sumardatosgrid()
 {
   actualizarsaldos();
   actualizarsaldos_e();
   var diferencia=0;
   var monto1=toFloat('totalmontorete');
   var monto2=toFloat('opordpag_monret');

   if (monto1> 0)
   {
      diferencia= monto1 - monto2;
   }

   var montos=toFloat('opordpag_monret');
   var cal=montos+diferencia;

   $('opordpag_monret').value=format(cal.toFixed(2),'.',',','.');
   var y=totalregistros('ax',2,50);
   if (($('opordpag_presiono').value=='S') && (verificarmarcas('ax',1)))
   {
     var y=verificarultimomarcado('ax',2,50,1);
     var otro="ax"+"_"+y+"_4";

     var monto3=toFloat(otro);
     var suma=monto3 + diferencia;

     $(otro).value=format(suma.toFixed(2),'.',',','.');
   }
   else
   {
     var y=y-1;
     var otro="ax"+"_"+y+"_4";

     var monto3=toFloat(otro);
     var suma=monto3 + diferencia;

     $(otro).value=format(suma.toFixed(2),'.',',','.');
   }
   var y=y;
   var otro="ax"+"_"+y+"_4";
   $(otro).value=$(otro).value;
   $('opordpag_monret').value=$('opordpag_monret').value;

   if ($('opordpag_afectapre').value==1)
   {
     var monto4=toFloat('opordpag_monord');
     var monto5=toFloat('opordpag_monret');
     var monto6=toFloat('opordpag_mondes');

     var calculos=(monto4 - ((monto5 +diferencia)+ monto6));
     $('opordpag_neto').value=format(calculos.toFixed(2),'.',',','.');
   }
 }

 function netos()
 {
   var monto4=toFloat('opordpag_monord');
   var monto5=toFloat('opordpag_monret');
   var monto6=toFloat('opordpag_mondes');

   var calculos=(monto4 - (monto5 + monto6));
   $('opordpag_neto').value=format(calculos.toFixed(2),'.',',','.');

 }

  function sumardatosgrid2(e)
  {
    if (e.keyCode==13)
   {
    actualizarsaldos();
    actualizarsaldos_e();
    var diferencia=0;
    var monto1=toFloat('totalmontorete');
     var monto2=toFloat('opordpag_monret');
    if (monto1 > 0)
    {
      diferencia= monto1 - monto2;
   }

    var montos=toFloat('opordpag_monret');

    var cal=montos+diferencia;
    $('opordpag_monret').value=format(cal.toFixed(2),'.',',','.');
    var y=totalregistros('ax',2,50);
    if (y!=0)
    {
    if (($('opordpag_presiono').value=='S') && (verificarmarcas('ax',1)))
    {
      var y=verificarultimomarcado('ax',2,50,1);
      var otro="ax"+"_"+y+"_4";

      var monto3=toFloat(otro);
      var suma=monto3 + diferencia;
      $(otro).value=format(suma.toFixed(2),'.',',','.');
    }
    else
    {
      var y=y-1;
      var otro="ax"+"_"+y+"_4";

      var monto3=toFloat(otro);
      var suma=monto3 + diferencia;

      $(otro).value=format(suma.toFixed(2),'.',',','.');
    }
    var y=y;
    var otro="ax"+"_"+y+"_4";
    $(otro).value=$(otro).value;
    }
    $('opordpag_monret').value=$('opordpag_monret').value;

    if ($('opordpag_afectapre').value==1)
    {
      var monto4=toFloat('opordpag_monord');
      var monto5=toFloat('opordpag_monret');
      var monto6=toFloat('opordpag_mondes');

      var calculos=(monto4 - ((monto5 +diferencia)+ monto6));
      $('opordpag_neto').value=format(calculos.toFixed(2),'.',',','.');
    }
    else
    {
     var montcau=toFloat('opordpag_monord');
     var montrete=toFloat('opordpag_monret');

     var calculo= montcau-montrete;

     $('opordpag_neto').value=format(calculo.toFixed(2),'.',',','.');
    }
   }
 }

  function salva(item)
  {
    var fil=0;
    var numfil=parseInt($('fila').value);
    while (fil<numfil)
    {
      var id1="cx"+"_"+fil+"_1";
      var id2="cx"+"_"+fil+"_5";
      var id6="cx"+"_"+fil+"_7";
      if ($(id2).value!="0,00")
      {
       var fil2=0;
       var cuentafil=0;
       while (fil2<50)
       {
        var ida="ax"+"_"+fil2+"_2";
        if ($(ida).value=="")
        {
         cuentafil=fil2;
         fil2=50;
        }
       fil2++;
       }

       var id3="ax"+"_"+cuentafil+"_2";
       var id4="ax"+"_"+cuentafil+"_3";
       var id5="ax"+"_"+cuentafil+"_6";
       var id7="ax"+"_"+cuentafil+"_1";

       $(id3).value=$(id1).value;
       $(id4).value=$(id2).value;
       $(id5).value=$(id6).value;

       if ($(id5).value=='S')
       {
         $(id7).disabled=true;
       }
     $('opordpag_referencias').value=$('opordpag_referencias').value+"_"+$('refere').value;
     }
      fil++;
    }
    $('referencia2').value=$('referencia2').value+"_"+$('refere').value
   sumardatosgrid();

   $('refere').value="";
   $('fecha').value="";
   $('descripcion').value="";
   $('tipo').value="";
   $('destipo').value="";
   $('ajaxs').value="";
   $('mensaje').value="";
   var fil=0;
   var numfil=parseInt($('fila').value);
   while (fil<numfil)
   {
     var caj1="cx"+"_"+fil+"_1";
     var caj2="cx"+"_"+fil+"_2";
     var caj3="cx"+"_"+fil+"_3";
     var caj4="cx"+"_"+fil+"_4";
     var caj5="cx"+"_"+fil+"_5";
     var caj6="cx"+"_"+fil+"_6";
     var caj7="cx"+"_"+fil+"_7";

     $(caj1).value="";
     $(caj2).value="0,00";
     $(caj3).value="0,00";
     $(caj4).value="0,00";
     $(caj5).value="0,00";
     $(caj6).value="0,00";
     $(caj7).value="";
    fil++;
   }
  }

  function calculo(e,id)
  {
   if (e.keyCode==13)
   {

    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colcomprc=col-3;
    var colcausa=col-1;
    var comprc=name+"_"+fil+"_"+colcomprc;
    var causa=name+"_"+fil+"_"+colcausa;

    var num3=toFloat(comprc);
    var num4=toFloat(causa);
    var num5=toFloat(id);
    var calculo= num3 - num4;

    if (num5>calculo)
    {
      alert('El Monto a causar no puede ser mayor al compromiso');
      $(id).value="0,00";
    }
    else
    {
	    var num1=toFloat('totalcau');
	    var num2=toFloat('opordpag_monord');
	    var calcu=num1+num2;
	    $('total').value=format(calcu.toFixed(2),'.',',','.');
    }
   }
  }

  function deshabilitariva(e,id)
  {
   if (e.keyCode==13)
   {
	 var aux = id.split("_");
	 var name=aux[0];
	 var fil=aux[1];
	 var col=parseInt(aux[2]);

     var coliva=col+4;
	 var colcheck=col-1;
	 var tieneiva=name+"_"+fil+"_"+coliva;
	 var check=name+"_"+fil+"_"+colcheck;

     if ($(tieneiva).value=='S')
     {
      $(check).disabled=true;
     }
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

  var montotot=toFloat('totmarcadas');
  var montocausar=toFloat(monto);

  if ($(id).checked==true)
  {
    acum=montotot + montocausar;
    $('totmarcadas').value=format(acum.toFixed(2),'.',',','.');
  }
  else
  {
    acum=montotot - montocausar;
    $('totmarcadas').value=format(acum.toFixed(2),'.',',','.');
  }
 }

  function modifico(e)
  {
   if (e.keyCode==13)
   { document.getElementById('modifico1').value=false; }
  }

  function modificar(e)
  {
   if (e.keyCode==13)
   { document.getElementById('modifico2').value=false;}
  }

  function verificarmarcas(letra,posicion)
  {
   var am=totalregistros('ax',2,50);
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

  function totalregistros(letra,posicion,filas)
  {
    var fil=0;
    var total=0;
    while (fil<filas)
    {
      var chk=letra+"_"+fil+"_"+posicion;
      if ($(chk).value!="")
      { total=total + 1; }
     fil++;
    }
    return total;
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
       var tot2=totalregistros('ax',2,50);
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

  function posicionenelgrid(codpre,referencia,aw)
  {
    var q=0;
    var enc=false;
    while ((q<aw) && (!enc)) // grid imputaciones
    {
      var id1="ax"+"_"+q+"_2";
      if ($('opordpag_referencias').value=='')
      { $('opordpag_referencias').value='_';}
      var referencias=$('opordpag_referencias').value;
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

  function posiciontiporetencion(codret,fila)
  {
    var ind=0;
    var enc=false;
    var total=totalregistros('ex',1,20);
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

  function calcularporcentajeretencion(fila)
  {
    var id1="ex"+"_"+fila+"_10";
    var id2="ex"+"_"+fila+"_11";
    var id3="ex"+"_"+fila+"_5";

    var col10=toFloat(id1);
    var col11=toFloat(id2);
    var col5=toFloat(id3);
    var totord=toFloat('opordpag_monord');

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

  function sumarbase(marcasinmarca)
  {
    if (marcasinmarca)
    {
     if (verificarmarcas('ax',1))
     {
      var monto4=toFloat('totmarcadas');

      var monbase=format(monto4.toFixed(2),'.',',','.');
      return monbase;
     }
    }
   else
   {
    var montbase=0;
    var ac=totalregistros('ax',2,50);
  var fil=0;
  while (fil<ac)
  {
   var id4="ax"+"_"+fil+"_2";
   var id3="ax"+"_"+fil+"_3";

   var montcau=toFloat(id3);

   var esrecargo=false;
   var parti=$('partidas').value;
   var aux2=parti.split("_");

   if ($('partidas').value!="")
   {
    var j=0;
    while ((j<(aux2.length)-1) && (!esrecargo))
    {
     var enc=false;
     if (($('afectarec').value=='R') || ($('afectarec').value=='S'))
     {var z=0;
      while ((z<((aux2.length)-1)) && (!enc))
      {
       if (($(id4).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==aux2[z+1])
       {
        esrecargo=true;
        enc=true;
       }
       z++;
      }
     }
     else if (($('afectarec').value=='P'))
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

  function calcularetencion(fil) //en VB se usaba dos parametros
  {
    var aux1="ex"+"_"+fil+"_4";
    var aux2="ex"+"_"+fil+"_5";
    var aux3="ex"+"_"+fil+"_10";
    var aux4="ex"+"_"+fil+"_11";
    var aux7="ex"+"_"+fil+"_1";
    var aux15="ex"+"_"+fil+"_7";
    var aux16="ex"+"_"+fil+"_8";
    var aux17="ex"+"_"+fil+"_6";
    var auxmil="ex"+"_"+fil+"_13";

    var base=toFloat(aux3);
    var monreten=toFloat(aux4);
    var porcen=toFloat(aux2);
    var porsus=toFloat(aux15);
    var basimp=toFloat(aux1);
    var unitri=toFloat(aux16);
    var factor=toFloat(aux17);

    if (porcen!=0)
    {
      if ($('modifico2').value=="true")
      {
        var cal=((porcen/100)*(basimp/100)*base);
        $(aux4).value=format(cal.toFixed(2),'.',',','.');
      }
      var totalfilas=totalregistros('ax',2,50);
      var i=0;
      while (i<totalfilas) //Grid Detalle
      {
       var aux8="ax"+"_"+i+"_2";
       var aux5="ax"+"_"+i+"_3";
       var aux6="ax"+"_"+i+"_4";
       //var aux7="ex"+"_"+fil+"_1";

       var tot=totalregistros('fx',1,300);

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

      if ($('opordpag_referencias').value=='')
      { $('opordpag_referencias').value='_';}
     var referencias=$('opordpag_referencias').value;
     var ref=referencias.split("_");
     var posenc=0;
       if (ref[1]=="")
       {  posenc=posicionretencion($(aux7).value,$(aux8).value,-1,"",tot);}
       else {posenc=posicionretencion($(aux7).value,$(aux8).value,-1,ref[i+1],tot);}
       if (posenc==0)
       {
         var filaret=totalregistros('fx',1,300);
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
      var totreg=totalregistros('ax',2,50);
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

     var aux4="ex"+"_"+fil+"_11";

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
    var totcau=toFloat('opordpag_monord');

    var porcbase=((base*100)/totcau);
    var sustraendo=((porsus/100)*unitri*factor);
    var retencion=((porsus/100)*(basimp/100)*base);

     if (retencion>sustraendo)
     {
       var cal4=retencion-sustraendo;
       $(aux4).value=format(cal4.toFixed(2),'.',',','.');
     }
     else { $(aux4).value=format(sustraendo.toFixed(2),'.',',','.');}
     var total=totalregistros('ax',2,50);
     var posenc=0;
     var i=0;
      while (i<total)
      {
        var aux8="ax"+"_"+i+"_2";
        var aux5="ax"+"_"+i+"_3";
        var aux6="ax"+"_"+i+"_4";

        var retenc=toFloat(aux6);
        var causado=toFloat(aux5);

        var tot=totalregistros('fx',1,300);

        var Montobase= ((causado*porcbase)/100);
        var retencion=((porsus/100)*(basimp/100)*Montobase);
        var sustraendo=(((porsus/100)*unitri*factor)/tot);
        var varia=retenc+(retencion-sustraendo);
        $(aux6).value=format(varia.toFixed(2),'.',',','.');

        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        var ref=referencias.split("_");
        if (ref[1]=="")
        { posenc=posicionretencion($(aux7).value,$(aux8).value,-1,"",tot);}
        else { posenc=posicionretencion($(aux7).value,$(aux8).value,-1,ref[i+1],tot);}
        if (posenc==0)
        {
         var filaret=totalregistros('fx',1,300);
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
     actualizarsaldos();
 }

 function calcularretenciones(e,id)
 {
  if (e.keyCode==13)
  {
      var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);
    var colbase=col+9;
    var colmonret=col+10;
    var colesta=col+8;
    var base=name+"_"+fil+"_"+colbase;
    var montoret=name+"_"+fil+"_"+colmonret;
    var esta=name+"_"+fil+"_"+colesta;

  if ($('opordpag_afectapre').value==1)
  {
    if ($(esta).value!="N")
    {
      var tota=totalregistros('ax',2,50);
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
        if (($('afectarec').value=='R') || ($('afectarec').value=='S'))
        {
         var j=0;
         while ((j<((auxi.length)-1)) && (!enc))
         {
          if (($(id2).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==auxi[j+1])
          {
            monbase=monbase + montcau;
            enc=true;
          }
          j++;
         }
        }
        else if (($('afectarec').value=='P'))
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
        if (($('afectarec').value=='R') || ($('afectarec').value=='S') || ($('afectarec').value=='P'))
        {
          var montbase=sumarbase(false);
          $(base).value=montbase;
        }
        else
        { $(base).value=$('opordpag_monord').value;}
      }
    }
  }else {$(base).value=$('opordpag_neto').value;}

   if (posiciontiporetencion($(id).value,fil)!=0)
   { alert('El Tipo de Retencion ya fue Registrado');}
   else
   { calcularetencion(fil); actualizarsaldos();}
  }
 }

 function distribuyeretenciones()
 {
   var tot2=totalregistros('fx',1,300);
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
    var xcien=toFloat('totmarcadas');
    cienxcien=xcien;
   }
   else
   {
    var montobas=sumarbase(false);
    var valor=String(montobas);
    var xcien=toFloat2(valor);

    cienxcien=xcien;
   }

  var ww=totalregistros('ex',1,20);
  var ab=totalregistros('ax',2,50);
  var fil=0;
  while (fil<ww)
  {
    var base="ex"+"_"+fil+"_10";
    var montoret="ex"+"_"+fil+"_11";
    var unomil="ex"+"_"+fil+"_13";
    var esta="ex"+"_"+fil+"_9";
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

      if (($('afectarec').value=='R') || ($('afectarec').value=='S'))
      {
        var j=0;
        while ((j<((auxi.length)-1)) && (!enc))
        {
         if (($(id2).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==auxi[j+1])
         {
           baseretiva=baseretiva + montcau;
           enc=true;
          }
        j++;
        }
      }
      else if (($('afectarec').value=='P'))
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
   if ($('opordpag_referencias').value=='')
   { $('opordpag_referencias').value='_';}
   var referencias=$('opordpag_referencias').value;
   var ref=referencias.split("_");
   var l=0;
   while (l<ab)
   {
      var id4="ax"+"_"+l+"_2";
      var id5="ax"+"_"+l+"_3";

      var total=totalregistros('fx',1,300);
      var causado=toFloat(id5);

      var enc=false;
      var estas=$(esta).value;
      var auxil=estas.split("_");
      var posenc=0;
      var x=0;
      while ((x<((auxil.length)-1)) && (!enc))
      {
       if ((($('afectarec').value=='R') && ($(id4).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length))==auxil[x+1])) || (($('afectarec').value=='P') && ($(id4).value==auxil[x+1])) || (($('afectarec').value=='S') && (($(id4).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==auxil[x+1])))
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
           var filaret=totalregistros('fx',1,300);
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
    if ($('opordpag_referencias').value=='')
    { $('opordpag_referencias').value='_';}
    var referencias=$('opordpag_referencias').value;
   var ref=referencias.split("_");
    if (!verificarmarcas('ax',1))
  {
    var fi=0;
    while (fi<ab)
    {
      var id4="ax"+"_"+fi+"_2";
      var id3="ax"+"_"+fi+"_3";
      var total=totalregistros('fx',1,300);

      var montcau=toFloat(id3);

      var esrecargo=false;
      var parti=$('partidas').value;
      var aux2=parti.split("_");
      var posenc=0;

      if ($('partidas').value!="")
      {
        var j=0;
        while ((j<((aux2.length)-1)) && (!esrecargo))
        {
          enc=false;
          if (($('afectarec').value=='R') || ($('afectarec').value=='S'))
          {
            var z=0;
            while ((z<((aux2.length)-1)) && (!enc))
            {
              if (($(id4).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==aux2[z+1])
              {
                esrecargo=true;
                enc=true;
              }
              z++;
            }
         }
         else if (($('afectarec').value=='P'))
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
         var filaret=totalregistros('fx',1,300);
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
    var montototal=toFloat('opordpag_monord');

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
    var total=totalregistros('fx',1,300);

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
         var filaret=totalregistros('fx',1,300);
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

 function verificarultimomarcado(letra,fila,posicion1,posicion2)
 {
   var total=totalregistros(letra,fila,posicion1);
   var ultimo=0;
   var fil=0;
   while (fil<total)
   {
     var chk=letra+"_"+fil+"_"+posicion2;
     if ($(chk).checked==true)
     { ultimo=fil;}
    fil++;
   }
   return ultimo;
  }

 function sumarretenciones()
 {
  var aw=totalregistros('ax',2,50);
  var ind=0;
  while (ind<aw)
  {
   var aux="ax"+"_"+ind+"_4";
   $(aux).value="0,00";
  ind++;
  }


  var zz=totalregistros('fx',1,300);
  var inc=0;
  var p=0;
  var fildondesta=0;
  while (p<zz)
  {
    var aux1="fx"+"_"+p+"_1";
    var aux2="fx"+"_"+p+"_4";
    var aux4="fx"+"_"+p+"_3";

    var monto=toFloat(aux4);

  if ($('opordpag_referencias').value=='')
  { $('opordpag_referencias').value='_';}
  var referencias=$('opordpag_referencias').value;
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

 function salvarretenciones()
 {
  var formulario='sf_admin/pagemiord';
  new Ajax.Request('/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=17&formulario='+formulario})

  $('opordpag_presiono').value='S';
  var tot1=totalregistros('fx',1,300);
  var fi=0;
   while (fi<tot1)
   {
     var caj1="fx"+"_"+fi+"_1";
     var caj2="fx"+"_"+fi+"_2";
     var caj3="fx"+"_"+fi+"_3";
     var caj4="fx"+"_"+fi+"_4";

     $(caj1).value="";
     $(caj2).value="";
     $(caj3).value="0,00";
     $(caj4).value="";
     fi++;
   }

  var axx=totalregistros('ex',1,20);
  var o=0;
  while (o<axx)
  {
    calcularetencion(o);
  o++;
  }
  distribuyeretenciones();
  sumarretenciones();
  if ($('opordpag_afectapre').value==0)
  {
   var montcau=toFloat('opordpag_monord');
   var montrete=toFloat('opordpag_monret');

   var calculo= montcau-montrete;

    $('opordpag_neto').value=format(calculo.toFixed(2),'.',',','.');
  }
  $('reten').hide();
 }

 function porcentajeISLRN(tipo,campo)
 {
   porcentajeislr=0;
   total=totalregistros('ex',1,20);
   j=0;
   while (j<total)
   {
     var islr="ex"+"_"+j+"_12";
     var unoxmil="ex"+"_"+j+"_13";
     var base="ex"+"_"+j+"_4";
     var porcen="ex"+"_"+j+"_5";

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
   var total=$('numgridret').value;
   var j=0;
   while (j<total)
   {
     var islr="dx"+"_"+j+"_10";
     var unoxmil="dx"+"_"+j+"_11";
     var base="dx"+"_"+j+"_4";
     var porcen="dx"+"_"+j+"_5";

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

 function porcentajeIRSN(tipo,campo)
 {
   porcentajeirs=0;
   total=totalregistros('ex',1,20);
   j=0;
   while (j<total)
   {
     var irs="ex"+"_"+j+"_15";
     var unoxmil="ex"+"_"+j+"_13";
     var base="ex"+"_"+j+"_4";
     var porcen="ex"+"_"+j+"_5";

     switch(tipo)
     {
       case "IRS":
       trajo=$(irs).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
     }
    if (trajo=="S")
    {
       if (campo=="BasImp")
       {
         porcentajeirs=$(base).value;
       }else { porcentajeirs=$(porcen).value;}
     break;
    }
    j++;
  }
  return porcentajeirs;
 }

  function porcentajeIRSC(tipo,campo)
 {
   var porcentajeirs=0;
   var total=$('numgridret').value;
   var j=0;
   while (j<total)
   {
     var irs="dx"+"_"+j+"_13";
     var unoxmil="dx"+"_"+j+"_11";
     var base="dx"+"_"+j+"_4";
     var porcen="dx"+"_"+j+"_5";

     switch(tipo)
     {
       case "IRS":
       trajo=$(irs).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
     }
    if (trajo=="S")
    {
       if (campo=="BasImp")
       {
         porcentajeirs=$(base).value;
       }else { porcentajeirs=$(porcen).value;}
     break;
    }
    j++;
  }
  return porcentajeirs;
 }

/* function encontrarIva()
 {
   encontrariva=0;
   total=totalregistros('ex',1,20);
   j=0;
   while (j<total)
   {
     var monto="ex"+"_"+j+"_14";
     if ($(monto).value!="")
     {
       encontrariva=$(monto).value;
       break;
     }
    j++;
   }
  return encontrariva;
 }

 function encontrarISLR(tipo)
 {
   encontrarislr=0;
   total=totalregistros('ex',1,20);
   j=0;
   while (j<total)
   {
     var mont="ex"+"_"+j+"_11";
     var islr="ex"+"_"+j+"_12";
     var unoxmil="ex"+"_"+j+"_13";

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
     encontrarislr=$(mont).value;
     break;
    }
    j++;
  }
  return encontrarislr;
  }

 function factura()
 {
   if ($('opordpag_numord').value!="")
   {
    if ($('id').value=="")
    {
       eliva=encontrarIva();
       $('eliva').value=eliva;
       elislr=encontrarISLR("ISLR");
       $('elislr').value=elislr;
       eltimbre=encontrarISLR("1*MIL");
       $('eltimbre').value=eltimbre;
    }
    else
    {

    }

    if ((eliva!=0) || (elislr!=0) || (eltimbre!=0))
    {
      $('verfac').show();
       n=0;
       while (n<10)
       {
         var alicuota="bx"+"_"+n+"_11";
         for(i=8;i<=21;i++)
         {
         var campo="bx"+"_"+n+"_"+i;
         if ((i!=11) && (i!=14) && (i!=15))
         {
          if ($(campo).value=="")
          {
            $(campo).value="0,00";
          }
         }

         if (($(alicuota).value="0,00") || ($(alicuota).value=""))
         {
          $(alicuota).value=eliva;
         }
        }
         n++;
       }
    }
    else { alert('No hay Retenciones que generen comprobante');}
   }
 }*/



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

     if (!numfac_repetido(id))
     {
       $(notdeb).disabled=true;
       $(notcre).disabled=true;
       $(tipotrans).value="01";
       $(facafect).disabled=true;
       new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=99&cajtexmos='+facafect+'&codigo='+id})
     }else{
      alert_('El N&uacute;mero de Factura esta Repetido');
      $(id).value="";
      $(id).focus();
     }
   }
 }

  function numfac_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var numfac=$(id).value;

   var numfacrepetido=false;
   var am=totalregistros('bx',2,150);
   var i=0;
   while (i<am)
   {
    var codigo="bx"+"_"+i+"_2";

    var numfac2=$(codigo).value;

    if (i!=fila)
    {
      if (numfac==numfac2)
      {
        numfacrepetido=true;
        break;
      }
    }
   i++;
   }
   return numfacrepetido;
 }

 function debitodeshabilitar(e,id)
  {
   if (e.keyCode==13)
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
   if (e.keyCode==13)
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

 function recalculaRetencion(fila,monto)
 {
    var codtip="dx"+"_"+fila+"_2";
    var porret="dx"+"_"+fila+"_5";
    var baseimp="dx"+"_"+fila+"_4";
    var porsus="dx"+"_"+fila+"_7";
    var unitri="dx"+"_"+fila+"_8";
    var factor="dx"+"_"+fila+"_6";

    var porcentaje=toFloat(porret);
    var base=toFloat(baseimp);
    var unidad=toFloat(unitri);
    var sus=toFloat(porsus);
   // var fact=toFloat('fac');
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

  return recalcularetencion;
 }

 function calcularBaseImponible(tipo)
 {
 var calcularbaseimponible=0;
  if ($('id').value=="")
  {
    total=totalregistros('ex',1,20);
    j=0;
    while (j<total)
    {
     var baseimp="ex"+"_"+j+"_10";
     var islr="ex"+"_"+j+"_12";
     var unoxmil="ex"+"_"+j+"_13";
     var irs="ex"+"_"+j+"_15";

     switch(tipo)
     {
       case "ISLR":
       trajo=$(islr).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;

       case "IRS":
       trajo=$(irs).value;
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
    var tota=$('numgridconsulta').value;
    while (fila<tota)
    {
      var id2="ax"+"_"+fila+"_2";
      var id3="ax"+"_"+fila+"_3";
      var id4="ax"+"_"+fila+"_4";

     var montcau=toFloat(id3);
     var montret=toFloat(id4);

     var enc=false;
     var sesta=$('esta').value;
     var auxi=sesta.split("_");
     if (montret > 0)
     {
        if (($('afectarec').value=='R') || ($('afectarec').value=='S'))
        {
         var j=0;
         while ((j<((auxi.length)-1)) && (!enc))
         {
          if (!(($(id2).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==auxi[j+1]))
          {
            calcularbaseimponible=calcularbaseimponible + montcau;
            enc=true;
          }
          j++;
         }
        }
        else if (($('afectarec').value=='P'))
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
    var total=$('numgridret').value;
    var j=0;
    while (j<total)
    {
     var islr="dx"+"_"+j+"_10";
     var unoxmil="dx"+"_"+j+"_11";
     var irs="dx"+"_"+j+"_13";

     switch(tipo)
     {
       case "ISLR":
       trajo=$(islr).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;

       case "IRS":
       trajo=$(irs).value;
       break;
     }
    if (trajo=="S")
    {
      montorecal=recalculaRetencion(j,calcularbaseimponible);
      var valor=String(montorecal);

      var montorecalculado=toFloat2(valor);
      if (tipo=="ISLR")
      {
        if (montorecalculado!=$('elislr').value)
        {
         calcularbaseimponible=redondear(((calcularbaseimponible*$('elislr').value)/montorecalculado),2);
        }
      }
      else if (tipo=="1*MIL")
      {
        if (montorecalculado!=$('eltimbre').value)
        {
         calcularbaseimponible=((calcularbaseimponible*$('eltimbre').value)/montorecalculado);
        }
      }else if (tipo=="IRS")
      {
        if (montorecalculado!=$('elirs').value)
        {
         calcularbaseimponible=redondear(((calcularbaseimponible*$('elirs').value)/montorecalculado),2);
        }
      }
     break;
    }
    j++;
   }

  }
   return calcularbaseimponible;
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

   var basemil=name+"_"+fil+"_15";
   var porcentmil=name+"_"+fil+"_16";
   var montomil=name+"_"+fil+"_17";
   var totalfac=name+"_"+fil+"_9";
   var impuesto=name+"_"+fil+"_12";

   var montotfac=toFloat(totalfac);
   var monimpuesto=toFloat(impuesto);

    var calcular=calcularBaseImponible('1*MIL');
    var valor=String(calcular);

    var calcularbi=toFloat2(valor);


		if ($('eltimbre').value == 0) {
			alert('No hay Retencion de Ley de Timbre Fiscal');
			$(id).checked = false;
		}
		else {
			if ($('id').value == "") {
				var baseimponible = porcentajeISLRN("1*MIL", "BasImp");
				var valor = String(baseimponible);
				var porislr = toFloat2(valor);

				var porcentaje = porcentajeISLRN("1*MIL", "PorRet");

                var baseiniunomil=toFloat(basemil);
                if (baseiniunomil>0)
                {
                 $(basemil).value = format(baseiniunomil.toFixed(2), '.', ',', '.');
                }else {
				var calculo = ((montotfac - monimpuesto) * porislr / 100);
				$(basemil).value = format(calculo.toFixed(2), '.', ',', '.');
				}
				$(basemil).disabled = false;

				$(porcentmil).value = format(porcentaje, '.', ',', '.');
				var cal2 = monto1XMILN();
			}
			else {
				var baseimponible2 = porcentajeISLRC("1*MIL", "BasImp");
				var valor = String(baseimponible2);
				var porislr2 = toFloat2(valor);
				var porcentaje2 = porcentajeISLRC("1*MIL", "PorRet");

                 var baseiniunomil=toFloat(basemil);
                if (baseiniunomil>0)
                {
                 $(basemil).value = format(baseiniunomil.toFixed(2), '.', ',', '.');
                }else {
				var calculo = ((montotfac - monimpuesto) * porislr2 / 100);
				$(basemil).value = format(calculo.toFixed(2), '.', ',', '.');
				}
				$(basemil).disabled = false;
				$(porcentmil).value = format(porcentaje2, '.', ',', '.');
				var cal2 = monto1XMILC();
			}
			var base = toFloat(basemil);
			var cal = ((base * ($('eltimbre').value)) / calcularbi);
			if (cal == cal2) {
				var calfin = cal;
			}
			else
				if (cal2 > cal) {
					var rest = cal2 - cal;
					var calfin = cal2 - rest;
				}
				else {
					var calfin = cal2;
				}

			$(montomil).value = format(calfin.toFixed(2), '.', ',', '.');
		}
 }

  function recalunoxmil(id)
  {
   var am=totalregistros('ex',2,10);
   var filas=parseInt($('numgridret').value);
   var bm=totalregistros('dx',12,filas);
   if (($('id').value=='' && am!=0) || ($('id').value!='' && bm!=0))
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

	   var montotfac=toFloat(totalfac);
	   var monimpuesto=toFloat(impuesto);
	   var montobasemil = toFloat(basemil);
	   if ($('id').value=="")
	   {
  	     var porcentaje = porcentajeISLRN("1*MIL", "PorRet");
	   }
	   else
	   {
	     var porcentaje = porcentajeISLRC("1*MIL", "PorRet");
	   }

       var valor=String(porcentaje);
       var num1=toFloat2(valor);

	   var num2=(montobasemil*(num1/100));

	   $(basemil).value = format(montobasemil.toFixed(2),'.',',','.');
	   $(porcentmil).value = format(num1.toFixed(2),'.',',','.');
	   $(montomil).value = format(num2.toFixed(2),'.',',','.');
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

   var baseislr=name+"_"+fil+"_19";
   var porcentislr=name+"_"+fil+"_20";
   var montoislr=name+"_"+fil+"_21";
   var totalfac=name+"_"+fil+"_9";
   var impuesto=name+"_"+fil+"_12";
   var codislr=name+"_"+fil+"_22";

  var montotfac=toFloat(totalfac);
   if (montotfac>0)
   {
    if ($(porcentislr).value!='')
    {
   var monimpuesto=toFloat(impuesto);

   var calcular=calcularBaseImponible('ISLR');
   var valor=String(calcular);
    var calcularbi=toFloat2(valor);

   if ($('elislr').value==0)
   {
     alert('No hay Retenci�n de I.S.L.R');
     $(id).checked=false;
   }
   else
   {
      if ($('id').value=="")
      {
        var baseimponible=porcentajeISLRN("ISLR","BasImp");
        var valor=String(baseimponible);
        var basip=toFloat2(valor);
        var porcentaje=porcentajeISLRN("ISLR","PorRet");
        var valor2=String(porcentaje);
        var porcentajes=toFloat2(valor2);

        var basiniislr=toFloat(baseislr);
         if (basiniislr>0)
         {
           $(baseislr).value=format(basiniislr.toFixed(2),'.',',','.');
         }else{
         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseislr).value=format(calculo.toFixed(2),'.',',','.');
         }
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
         var basiniislr=toFloat(baseislr);
         if (basiniislr>0)
         {
           $(baseislr).value=format(basiniislr.toFixed(2),'.',',','.');
         }else{
         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseislr).value=format(calculo.toFixed(2),'.',',','.');
         }
         $(baseislr).disabled=false;
         $(porcentislr).value=format(porcentajes.toFixed(2),'.',',','.');
      }
      var base=toFloat(baseislr);

      cal=((base*($('elislr').value))/calcularbi);
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

  function recalislr(id)
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

   var montobaseislr = toFloat(baseislr);
   var montoporcentislr = toFloat(porcentislr);
   var cal=montobaseislr*(montoporcentislr/100);

   $(id).value = format(montobaseislr.toFixed(2),'.',',','.');

   $(montoislr).value = format(cal.toFixed(2),'.',',','.');

  }

   function calculaRetiva(monto,codigo)
   {
     var calcularetiva=0;
     var ax=totalregistros('ex',1,20);
     var i=0;
     while (i<ax)
     {
      var codi="ex"+"_"+i+"_1";
      var basimp="ex"+"_"+i+"_4";
      var porret="ex"+"_"+i+"_5";
      var factor="ex"+"_"+i+"_6";
      var porsus="ex"+"_"+i+"_7";
      var cuantas="ex"+"_"+i+"_8";
      var esta="ex"+"_"+i+"_9";

      var base=toFloat(basimp);
      var porcenret=toFloat(porret);
      var monfactor=toFloat(factor);
      var porcensus=toFloat(porsus);
      var moncuantas=toFloat(cuantas);
      var monunitri=toFloat('unidad');

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
     var ax=$('numgridret').value;
     var i=0;
     while (i<ax)
     {
      var codi="dx"+"_"+i+"_2";
      var basimp="dx"+"_"+i+"_4";
      var porret="dx"+"_"+i+"_5";
      var factor="dx"+"_"+i+"_6";
      var porsus="dx"+"_"+i+"_7";
      var cuantas="dx"+"_"+i+"_8";
      var esta="dx"+"_"+i+"_9";

      var base=toFloat(basimp);
      var porcenret=toFloat(porret);
      var monfactor=toFloat(factor);
      var porcensus=toFloat(porsus);
      var moncuantas=toFloat(cuantas);
      var monunitri=toFloat('unidad');

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

function totalizar(e,id)
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
       alert('Monto Inv�lido');
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
	 if (col==11)
	 {
	 	$('opordpag_modbasimpiva').value='S';
	 }

    if (($(name+"_"+fil+"_6").value=="03") && ($(name+"_"+fil+"_"+colum).value > 0))
    {
      $(name+"_"+fil+"_"+colum).value=format(cal.toFixed(2),'.',',','.');
    }
    var am=totalregistros('ex',2,10);
    var filas=parseInt($('numgridret').value);
    var bm=totalregistros('dx',12,filas);
    if (($('id').value=='' && am!=0) || ($('id').value!='' && bm!=0))
    {
      if ($(alic).value!="")
      {
        var basiniiva=toFloat(name+"_"+fil+"_11");
        if ($('opordpag_modbasimpiva').value=='S')
        {
         $(name+"_"+fil+"_11").value=format(basiniiva.toFixed(2),'.',',','.');
        }
        else
        {
        var calculos=(((montotfac-monexento)/(100+alicuota))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');
        }

        var baseimpo=toFloat(name+"_"+fil+"_11");


        calc=((baseimpo*alicuota)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('id').value=="")
        {
          //num=((baseimpo*alicuota)/100);
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetiva(num,codigo[0]);
        }
        else
        {
         // num=((baseimpo*alicuota)/100);
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetivac(num,codigo[0]);
        }
      }
      else
      {
        var basiniiva=toFloat(name+"_"+fil+"_11");
        if ($('opordpag_modbasimpiva').value=='S')
        {
         $(name+"_"+fil+"_11").value=format(basiniiva.toFixed(2),'.',',','.');
        }
        else
        {
        var calculos=(((montotfac-monexento)/(100+0))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');
        }

        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*0)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('id').value=="")
        {
         $(retenido).value= "0,00";
        }
        else
        {
         $(retenido).value= "0,00";
        }
      }
   }else{

   }
  }
 }

 function validacau(id)
 {
   var tofac=toFloat('totfac');
    var totcau=toFloat('opordpag_monord');
   /* if (tofac>totcau)
    {
    alert('El Monto Total de la factura no puede ser Mayor al Monto Total a Causar');
    $(id).value='0,00';
   }*/

 }

   function mensajes()
  {
   if (($('ajaxs').value=='6') && ($('mensaje').value!=""))
   {
    alert($('mensaje').value);
   }
  }


  function ajax(e,id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);
    var coliva= col +4;
    var iva=name+"_"+fil+"_"+coliva;
    var cod=$(id).value;

    $('opordpag_neto').readOnly=true;


    if (e.keyCode==13 || e.keyCode==9)
   {
    new Ajax.Request('/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validar(e,id);}, parameters:'ajax=7&cajtexmos='+iva+'&codigo='+cod})
   }
  }

  function validar(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coliva= col +6;
   var iva=name+"_"+fil+"_"+coliva;

  if (codpresu_repetido(id))
  {
  alert('El C�digo Presupuestario se encuentra repetido');
  $(id).value="";
  }
  else
  {
   if ($('noexiste').value=='N' &&  $(id).value!="")
   {
      alert('El C�digo Presupuestario no Existe');
    $(id).value="";
    $(iva).value="";
   }
   else if ($('nonivel').value=='N' &&  $(id).value!="")
   {
      alert('El C�digo Presupuestario no es de �ltimo Nivel');
    $(id).value="";
    $(iva).value="";
   }
   else if ($('noasigna').value=='N' &&  $(id).value!="")
   {
      alert('El C�digo Presupuestario no tiene Asignaci�n Inicial');
    $(id).value="";
    $(iva).value="";
   }
   else
   {
   deshabilitariva(e,id);
   }
   }

 }



 function disponibilidad(e,id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colcod= col-1;
    var codigo=name+"_"+fil+"_"+colcod;
    var codpre=$(codigo).value;
    var afecta=$('opordpag_afectapre').value;
    var letra='N';
    var monto=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
    new Ajax.Request('/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), chequeardisponibilidad(e,id);}, parameters:'ajax=9&fila='+fil+'&monto='+monto+'&letra='+letra+'&codigo='+codpre+'&afecta='+afecta})
   }
  }

  function chequeardisponibilidad(e,id)
  {
    var aux = id.split("_");
     var name=aux[0];
     var fil=parseInt(aux[1]);
     var col=parseInt(aux[2]);

     var colcod= col-1;
     var codigo=name+"_"+fil+"_"+colcod;

   if ($('errormonto').value=='511' && $(id).value!="0,00")
   {
      alert('Monto Introducido debe ser menor al Monto Disponible que es:  '+$('montodisponible').value);
    $(id).value="0,00";
    sumardatosgrid2(e);
   }

   if ($('errormonto').value=='512' && $(id).value!="0,00")
   {
      alert('El Titulo Presupuestario no tiene Asignaci�n Inicial');
    $(id).value="0,00";
    sumardatosgrid2(e);

   }

  }

   function codpresu_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var codpre=$(id).value;

   var codprerepetido=false;
   var am=totalregistros('ax',2,50);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_2";

    var codpre2=$(codigo).value;

    if (i!=fila)
    {
      if (codpre==codpre2)
      {
        codprerepetido=true;
        break;
      }
    }
   i++;
   }
   return codprerepetido;
 }

function ajaxretenciones(e,id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);
   if ($(id).value!="")
   {
    var coldes= col+1;
    var colcon= col+2;
    var colbas= col+3;
    var colpor= col+4;
    var colfac= col+5;
    var colsus= col+6;
    var coluni= col+7;
    var colest= col+8;
    var colestislr= col+11;
    var colest1xmil= col+12;
    var colmont= col+13;
    var colestirs= col+14;

    var descripcion=name+"_"+fil+"_"+coldes;
    var contable=name+"_"+fil+"_"+colcon;
    var base=name+"_"+fil+"_"+colbas;
    var porretencion=name+"_"+fil+"_"+colpor;
    var factor=name+"_"+fil+"_"+colfac;
    var porsustra=name+"_"+fil+"_"+colsus;
    var unidad=name+"_"+fil+"_"+coluni;
    var esta=name+"_"+fil+"_"+colest;
    var estaislr=name+"_"+fil+"_"+colestislr;
    var estairs=name+"_"+fil+"_"+colestirs;
    var esta1xmil=name+"_"+fil+"_"+colest1xmil;
    var montoiva=name+"_"+fil+"_"+colmont;
    var cod=$(id).value;

     document.getElementById('modifico2').value=true;

     if (e.keyCode==13 || e.keyCode==9)
     {
      new Ajax.Request('/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validaretencion(e,id);}, parameters:'ajax=10&cajtexmos='+descripcion+'&contable='+contable+'&base='+base+'&porretencion='+porretencion+'&factor='+factor+'&porsustra='+porsustra+'&unidad='+unidad+'&esta='+esta+'&estaislr='+estaislr+'&estairs='+estairs+'&esta1xmil='+esta1xmil+'&montoiva='+montoiva+'&codigo='+cod})
     }
   }//if ($(id).value1="")
  }

  function validaretencion(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes= col +1;
   var descripcion=name+"_"+fil+"_"+coldes;

  if ($('existeretencion').value!='S' && $(id).value!="")
  {
    alert('El Codigo de la Retencion no Existe');
  $(id).value="";
  $(descripcion).value="";

  }
  else
  {
  if (codret_repetido(id))
    {
  alert('El Codigo de la Retencion se encuentra repetido');
  $(id).value="";
  $(descripcion).value="";
    }
    else
    {
     calcularretenciones(e,id);
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
   var am=totalregistros('ex',1,20);
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

  function cargar1()
  {
    if ($('tipnom').value!="")
    {
      if(confirm("Se Generara la Orden de Pago de Nomina  "+$('tipnom').value+" correspondiente a "+$('nomina').value))
      {
        var tipnom=$('tipnom').value;
        var gasto=$('gasto').value;
        var banco=$('banco').value;
        var nomespecial=$('nomespecial').value;
        var codnomesp=$('codnomesp').value;
        var fecha=$('fechanomina').value;
        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        new Ajax.Updater('divGrid', '/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&tipnom='+tipnom+'&fecha='+fecha+'&gasto='+gasto+'&divu=1&referencias='+referencias+'&nomespecial='+nomespecial+'&codnomesp='+codnomesp+'&banco='+banco});
        new Ajax.Updater('consulta', '/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&tipnom='+tipnom+'&fecha='+fecha+'&gasto='+gasto+'&divu=2&referencias='+referencias+'&nomespecial='+nomespecial+'&codnomesp='+codnomesp+'&banco='+banco});

      }
      else
      {
        $('opordpag_tipcau').value="";
        $('opordpag_nomext').value="";
      }
    }
    else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }
  }


   function cargar2()
  {
    if ($('codigoaporte').value!="" && $('fecnom').value!="")
    {
     var aux=$('fecnom').value;
     var aux2=aux.split("-");
     var formato=aux2[2]+"/"+aux2[1]+"/"+aux2[0];
      if(confirm("Se Generara la Orden de Pago para el Aporte  "+$('codigoaporte').value+" correspondiente a la fecha "+formato))
      {
        var codigoaporte=$('codigoaporte').value;
        var fecnom=$('fecnom').value;
        var gasto2=$('gasto2').value;
        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        new Ajax.Updater('divGrid', '/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&codigoaporte='+codigoaporte+'&fecnom='+fecnom+'&gasto2='+gasto2+'&referencias='+referencias});

      }
      else
      {
        $('opordpag_tipcau').value="";
        $('opordpag_nomext').value="";
      }
    }
    else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }
  }

  function cargar3()
  {
    if ($('codigoemp').value!="")
    {
      if(confirm("Se Generara la Orden de Pago para la Liquidacion de  "+$('empleado').value))
      {
        var codemp=$('codigoemp').value;
        var nomemp=$('empleado').value;
        var cedemp=$('cedula').value;
        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        new Ajax.Updater('divGrid', '/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=13&codemp='+codemp+'&nomemp='+nomemp+'&cedemp='+cedemp+'&divu=1&referencias='+referencias});
        new Ajax.Updater('consulta', '/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=13&codemp='+codemp+'&nomemp='+nomemp+'&cedemp='+cedemp+'&divu=2&referencias='+referencias});

      }
      else
      {
        $('opordpag_tipcau').value="";
        $('opordpag_nomext').value="";
      }
    }
    else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }
  }

  function cargar4()
  {
    if ($('lanomina').value!="")
    {
      if(confirm("Se Generara la Orden de Pago para el Fideicomiso de  "+$('elnombre').value))
      {
        var codnom=$('lanomina').value;
        var nomnom=$('elnombre').value;
        var fecha=$('lafecha').value;
        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        new Ajax.Updater('divGrid', '/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=14&codnom='+codnom+'&nomnom='+nomnom+'&fecha='+fecha+'&referencias='+referencias});

      }
      else
      {
        $('opordpag_tipcau').value="";
        $('opordpag_nomext').value="";
      }
    }
    else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }
  }

  function chequeadisponibilidad()
  {
    var afecta=$('opordpag_afectapre').value;
    new Ajax.Request('/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), errores();}, parameters:'ajax=15&afecta='+afecta})
  }

  function errores()
  {
   if ($('errormonto').value=='511')
   {
      alert('Monto Introducido para el Codigo Presupuestario '+$('codigopresupuestario').value+'debe ser menor al Monto Disponible que es:  '+$('montodisponible').value);
   }

   if ($('errormonto').value=='512')
   {
    alert('El Titulo Presupuestario no tiene Asignaci�n Inicial');
   }
  }

  function cambioBase(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    calcularetencion(fil);
  }

  function cargar5()
  {
    if ($('opordpag_referencias').value=='')
    { $('opordpag_referencias').value='_';}
    var referencias=$('opordpag_referencias').value;
    var contrato=$('tipcon').value;
    new Ajax.Updater('divGrid', '/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=20&contrato='+contrato+'&referencias='+referencias});
  }

  function cargar6()
  {
    if ($('refcomv').value!="")
    {
      if(confirm("Se Generara la Orden de Pago para la Valuaci�n de  "+$('refcomv').value)+" Correspondiente al Contrato "+$('tipcon').value)
      {
        var monval=$('monval').value;
        var refcom=$('refcomv').value;
        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        new Ajax.Updater('divGrid', '/tesoreria_dev.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=21&refcom='+refcom+'&monval='+monval+'&referencias='+referencias});

      }
      else
      {
        $('opordpag_tipcau').value="";
        $('opordpag_nomext').value="";
      }
    }
    else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }
  }


function monto1XMILN()
 {
   montounomil=0;
   total=totalregistros('fx',2,300);
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
   var total=$('numgridret').value;
   var j=0;
   while (j<total)
   {
     var monto1="dx"+"_"+j+"_12";
     var unoxmil="dx"+"_"+j+"_11";
     var num1=toFloat(monto1);

    if ($(unoxmil).value=="S")
    {
      montounomil = montounomil +num1;
    }
    j++;
  }
  return montounomil;
 }

 function colocarmonto(id)
 {
    var col=parseInt(aux[2]);
    var totalfac="bx_0_9";
    if (id=='x00')
    {
      $(totalfac).value=$('opordpag_monord').value;
    }
 }

 function totalizar2(id)
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
       alert('Monto Inv�lido');
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
	 if (col==11)
	 {
	 	$('opordpag_modbasimpiva').value='S';
	 }

    if (($(name+"_"+fil+"_6").value=="03") && ($(name+"_"+fil+"_"+colum).value > 0))
    {
      $(name+"_"+fil+"_"+colum).value=format(cal.toFixed(2),'.',',','.');
    }
    var am=totalregistros('ex',2,10);
    var filas=parseInt($('numgridret').value);
    var bm=totalregistros('dx',12,filas);
    if (($('id').value=='' && am!=0) || ($('id').value!='' && bm!=0))
    {
      if ($(alic).value!="")
      {
        var basiniiva=toFloat(name+"_"+fil+"_11");
        if ($('opordpag_modbasimpiva').value=='S')
        {
         $(name+"_"+fil+"_11").value=format(basiniiva.toFixed(2),'.',',','.');
        }
        else
        {
        var calculos=(((montotfac-monexento)/(100+alicuota))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');
        }

        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*alicuota)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('id').value=="")
        {
          //num=((baseimpo*alicuota)/100);
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetiva(num,codigo[0]);
        }
        else
        {
         // num=((baseimpo*alicuota)/100);
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetivac(num,codigo[0]);
        }
      }
      else
      {
        var basiniiva=toFloat(name+"_"+fil+"_11");
        if ($('opordpag_modbasimpiva').value=='S')
        {
         $(name+"_"+fil+"_11").value=format(basiniiva.toFixed(2),'.',',','.');
        }
        else
        {
        var calculos=(((montotfac-monexento)/(100+0))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');
        }

        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*0)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('id').value=="")
        {
         $(retenido).value= "0,00";
        }
        else
        {
         $(retenido).value= "0,00";
        }
      }
   }else{

   }
  }

  function irs(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col+1;
   var porcent=col+2;
   var monto=col+3;
   var total=col-16;
   var imp=col-11;
   var cod=col+4;

   var baseirs=name+"_"+fil+"_26";
   var porcentirs=name+"_"+fil+"_27";
   var montoirs=name+"_"+fil+"_28";
   var totalfac=name+"_"+fil+"_9";
   var impuesto=name+"_"+fil+"_12";
   var codirs=name+"_"+fil+"_29";

  var montotfac=toFloat(totalfac);
   if (montotfac>0)
   {
    if ($(porcentirs).value!='')
    {
   var monimpuesto=toFloat(impuesto);

   var calcular=calcularBaseImponible('IRS');
   var valor=String(calcular);
    var calcularbi=toFloat2(valor);

   if ($('elirs').value==0)
   {
     alert_('No hay Retenci&oacute;n de I.R.S');
     $(id).checked=false;
   }
   else
   {
      if ($('id').value=="")
      {
        var baseimponible=porcentajeIRSN("IRS","BasImp");
        var valor=String(baseimponible);
        var basip=toFloat2(valor);
        var porcentaje=porcentajeIRSN("IRS","PorRet");
        var valor2=String(porcentaje);
        var porcentajes=toFloat2(valor2);

        var basiniislr=toFloat(baseirs);
         if (basiniislr>0)
         {
           $(baseirs).value=format(basiniislr.toFixed(2),'.',',','.');
         }else{
         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseirs).value=format(calculo.toFixed(2),'.',',','.');
         }
         $(baseirs).disabled=false;
         $(porcentirs).value=format(porcentajes.toFixed(2),'.',',','.');
      }
      else
      {
        var baseimponible2=porcentajeIRSC("IRS","BasImp");
        var valor=String(baseimponible2);
        var basip=toFloat2(valor);

        var porcentaje2=porcentajeIRSC("IRS","PorRet");

        var valor2=String(porcentaje2);
        var porcentajes=toFloat2(valor2);
         var basiniislr=toFloat(baseirs);
         if (basiniislr>0)
         {
           $(baseirs).value=format(basiniislr.toFixed(2),'.',',','.');
         }else{
         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseirs).value=format(calculo.toFixed(2),'.',',','.');
         }
         $(baseirs).disabled=false;
         $(porcentirs).value=format(porcentajes.toFixed(2),'.',',','.');
      }
      var base=toFloat(baseirs);

      cal=((base*($('elirs').value))/calcularbi);
      $(montoirs).value=format(cal.toFixed(2),'.',',','.');
      index=$(porcentirs).selectedIndex;
      var cod=$(porcentirs).options[index].text;
      var codigo=cod.split("_");
      $(codirs).value=codigo[0];
      actualizarsaldos_b();
   }
   }
   else
   {
    alert('Debe Seleccionar el Porcentaje de IRS a aplicar');
     $(id).checked=false;
   }
   }
   else
   {
    alert('El Total de la Factura debe ser mayor que cero');
     $(id).checked=false;
   }
  }

  function recalirs(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col;
   var porcent=col+1;
   var monto=col+2;
   var total=col-17;
   var imp=col-14;
   var cod=col+4;

   var baseirs=name+"_"+fil+"_"+bas;
   var porcentirs=name+"_"+fil+"_"+porcent;
   var montoirs=name+"_"+fil+"_"+monto;
   var totalfac=name+"_"+fil+"_"+total;
   var impuesto=name+"_"+fil+"_"+imp;
   var codirs=name+"_"+fil+"_"+cod;

   var montobaseirs = toFloat(baseirs);
   var montoporcentirs = toFloat(porcentirs);
   var cal=montobaseirs*(montoporcentirs/100);

   $(id).value = format(montobaseirs.toFixed(2),'.',',','.');

   $(montoirs).value = format(cal.toFixed(2),'.',',','.');

   actualizarsaldos_b();
  }