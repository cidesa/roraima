function cansol(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   
   var coltotal=col+6;   
   var colexis=col-1;
   var colblanco=col+14;
   var colart=col-4;
   var colprec=col+3;
   var colprec2=col+4;
   var coldistot=col+7;

   
   var total=name+"_"+fil+"_"+coltotal;
   var distot=name+"_"+fil+"_"+coldistot;
   var exist=name+"_"+fil+"_"+colexis;   
   var blanco=name+"_"+fil+"_"+colblanco;
   var codart=name+"_"+fil+"_"+colart;
   var cod=$(codart).value;
   var precio=name+"_"+fil+"_"+colprec;
   var precioe=name+"_"+fil+"_"+colprec2;

   var am=obtener_filas_grid('a',3);

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
	    //$(exist).value=$(distot).value;
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

               var calmontot=calcularMontTot();
               if (calmontot>0)
               {
                  var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);

				    var colart=obtener_filas_grid('a',3);
				    var fi=0;
					while (fi<colart)
					{				      
				      var totales="ax_"+fi+"_13";
				      var precios="ax_"+fi+"_10";
				      var precios2="ax_"+fi+"_11";
				      var cant="ax_"+fi+"_"+colum;

                    if ($(precios)){
				      if ($(precios).value!="") {var nprecio=toFloat(precios);}else {var nprecio=toFloat(precios2);}
				      var ncant=toFloat(cant);

				     var sumtot=nprecio*ncant;
                      $(totales).value=format(sumtot.toFixed(2),'.',',','.');
                      }
					 fi++;
					}
               }
               
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
  }
 }
}

function cantidadEntregarArt(fil,codart)
 {
   var cant_entreg=0;
   var am=obtener_filas_grid('a',3);
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

function distribuirexistencia(fila,dato)
 {
   var colart=obtener_filas_grid('a',3);
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

  function calcularMontTot()
  {
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    var calcularmonto=0;

     var regart=obtener_filas_grid('a',3);
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
       var ndesc= toFloat('fafacturpro_totdesc');
       calcularmonto= calcularmonto - ndesc;
     }
    return calcularmonto;
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

  function marcardesc(id)
 {
  	var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

	var coldesc=col+19;
	var mdesc=name+"_"+fil+"_"+coldesc;

    $(mdesc).checked=true;
    montoTotal();

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
    var siguiente=name+"_"+fila+"_2";
   }

   if (e.keyCode==13 || e.keyCode==9)
   {
    $(siguiente).focus();
   }
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
    var cantot=name+"_"+fil+"_"+colcantot;
    var total=name+"_"+fil+"_"+coltoto;
    var blanco=name+"_"+fil+"_"+colblan;

    var cod=$(id).value;

    var londefart=$('fafacturpro_lonart').value;
    var lonart=$(id).value.length;
    var canent=cantidadEntregarArt(fil,cod);
    var docrefiere=$('fafacturpro_tipref').value;
    var filagrid= fil;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
       if (londefart <= lonart)
       {
        if (!articulo_repetido(id))
        {
          new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&cajtexmos='+descripcion+'&cajtexcom='+id+'&canent='+canent+'&docref='+docrefiere+'&ctaprove='+ctaprove+'&blanco2='+blanco2+'&unidad='+unidad+'&cantidad='+cantidad+'&existencia='+existencia+'&cantot='+cantot+'&total='+total+'&filagrid='+filagrid+'&blanco='+blanco+'&precio='+precio+'&precio2='+precio2+'&codigo='+cod})
          //if (docrefiere=='V')
          //{
            //new Ajax.Updater(precio, getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&id='+$('id').value+'&desc='+descripcion+'&precio2='+precio2+'&codigo='+cod});

          //}
        }
        else
        {
          alert('C�digo del Art�culo est� Repetido');
          $(id).value="";
        }
      }
      else
      {
        alert('El Articulo debe ser de Ultimo Nivel');
        $(id).value="";
      }
      }
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
   var am=totalregistros2('ax',1,25);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";
    if ($(codigo)){
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

 function Precio3(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);
 
   var coltotal=col+3;
   var colprecioart=col+5;
   var colprenext=col+1;

   var total=name+"_"+fil+"_"+coltotal;
   var precioart=name+"_"+fil+"_"+colprecioart;
   var precionext=name+"_"+fil+"_"+colprenext;

   var num1=toFloat(id);
   var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
   var canti=name+"_"+fil+"_"+colum;   
   var num2=toFloat(canti);

   if ($(id).value!="")
   {
     $(precionext).value="";
     if (validarnumero(id))
     {
       if (num1>0)
       {
         //cambio de moneda
         if ($(id).value!="")
         {
           var producto=num1*num2;           

            var calmontot=calcularMontTot();
            if (calmontot>0)
            {
		       var colart=obtener_filas_grid('a',3);
		       var fi=0;
			   while (fi<colart)
			   {		         
		         var totales="ax_"+fi+"_13";
		         var precio="ax_"+fi+"_10";
		         var precio2="ax_"+fi+"_11";
		         var cant="ax_"+fi+"_"+colum;
                 if ($(precio)){
		         if ($(precio).value!="") {var nprecio=toFloat(precio);}else {var nprecio=toFloat(precio2);}
		         var ncant=toFloat(cant);

 		         var sumtot=nprecio*ncant;	             
	             $(totales).value=format(sumtot.toFixed(2),'.',',','.');
	             }
			    fi++;
			   }
            }            
            var calculo=producto;
            $(total).value=format(calculo.toFixed(2),'.',',','.');
            montoTotal();
          }
         }
         else
         {
           alert('El valor debe ser mayor que cero');
           if ($(precioart).value!="")
           {
             $(id).value=$(precioart).value;
             $(totales).value='0,00';             
           }
           else
           {
             $(id).value="0,00";
           }
           if ($('fafacturpro_tipref').value=='V')
           {             
             $(total).value="0,00";            
           }
         }
       }
       else
       {
         alert_('El Dato debe ser n&uacute;merico');
         if ($(precioart).value!="")
         {
           $(id).value=$(precioart).value;
           $(totales).value='0,00';
         }
         else
         {
           $(id).value="0,00";
         }
         if ($('fafacturpro_tipref').value=='V')
         {           
           $(total).value="0,00";
         }        
       }
     }
     else
     {
       alert_('El Dato debe ser n&uacute;merico');
       $(id).value=$(precioart).value;
       $(total).value="0,00";
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
   var colpreprev=col-1;

   var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
   var canti=name+"_"+fil+"_"+colum;   
   var total=name+"_"+fil+"_"+coltot;
   var precioprev=name+"_"+fil+"_"+colpreprev;

   var num1=toFloat(id);
   var num2=toFloat(canti);

 if ($(id).value!="")
 {
   if($(id).value!="0,00")
    $(precioprev).value="";

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
     if ($(id).value!="" && $(id).value!="0,00")
     {
          var producto= num1*num2;          
          var calculo=producto;
          $(total).value=format(calculo.toFixed(2),'.',',','.');
          montoTotal();
     }
   }     
  }
  else
  {
    $(id).value="0,00";
  }
 } 
}

  function montoTotal()
  {
    var montot=0;
    var regart=obtener_filas_grid('a',3);
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
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
        var regdesc=obtener_filas_grid('b',1);
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

    $('fafacturpro_monfac').value=format(montot.toFixed(2),'.',',','.');
    var ntotmonrgo=toFloat('fafacturpro_totmonrgo');
    var ntottotart=toFloat('fafacturpro_tottotart');

    var cal= tottotal - totmonrec
    $('fafacturpro_monto').value=format(cal.toFixed(2),'.',',','.');
    $('fafacturpro_monrgo').value= format(totmonrec.toFixed(2),'.',',','.');
    $('fafacturpro_totmonrgo').value= format(totmonrec.toFixed(2),'.',',','.');
    $('fafacturpro_tottotart').value=format(montot.toFixed(2),'.',',','.');
  }

 function recargos()
 {
   $('divgrid_fargoartpro').show();
   $('divtotrec').show();
 }

  function marcados(tipo)
  {
    var marcado=0;
    if (tipo=='R')
    {
      var indice='1';
    } else {var indice='20';}

    var regart=obtener_filas_grid('a',3);
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

  function marcar()
  {
      alert('hola mundo');
  }


 function ocultar(div,div2)
 {
 	$(div).hide();
        $(div2).hide();
 	var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
 	if (div=='divgrid_fargoartpro')
 	{
          if ($('recarg').visible() && $('id').value=='')
          {
            var fil=0;
            var facart=obtener_filas_grid('a',3);
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

 function descuentos()
 {
   $('divgrid_fadescartpro').show();
   $('divtotdesc').show();
 }

  function marcarArtRep(fila,valor)
  {
    var facart=obtener_filas_grid('a',3);
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
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);

    var colart=obtener_filas_grid('a',3);
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
        var regdesc=obtener_filas_grid('b',1);
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
      if ($('fafacturpro_esretencion').value=='N')
      {
        monto_marcados= monto_marcados - totaldesc
      }
    }
   return monto_marcados;
  }

  function actualizarRecargos()
  {
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    var montoArt= montoMarcados();

    var regrgo=obtener_filas_grid('c',1);
    var regart=obtener_filas_grid('a',3);
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
             new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&articulo='+codart+'&recargo='+codrgo})
             if ($('fafacturpro_trajo').value=='S')
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
    var regrgo=obtener_filas_grid('c',1);
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
    $('fafacturpro_totrec').value=format(mitot.toFixed(2),'.',',','.');
  }

  function recalcularRecargos()
  {
    var regrgo=obtener_filas_grid('c',1);
    if (regrgo>0)
    {
      var regart=obtener_filas_grid('a',3);
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
    }
  }



  function montosMarcadosSinDescuento()
  {
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    var monmarsindesc=0;

    var regart=obtener_filas_grid('a',3);
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

  function mostrarPromedio()
  {
    $('fafacturpro_tottotart').value="0,00";
    $('fafacturpro_totmonrgo').value="0,00";

    var recar=0;
    var solic=0;
    var precios=0;
    var montota=0;

    var regart=obtener_filas_grid('a',3);
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
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

    $('fafacturpro_totmonrgo').value=format(recar.toFixed(2),'.',',','.');
    var montota2=montota;
    $('fafacturpro_tottotart').value=format(montota.toFixed(2),'.',',','.');

    var ntotaldesc= toFloat('fafacturpro_mondesc');
    var calcu= montota - ntotaldesc;
    $('fafacturpro_monfac').value=format(calcu.toFixed(2),'.',',','.');

    var variable1= toFloat('fafacturpro_totmonrgo');
    var variable2= toFloat('fafacturpro_tottotart');
    var calcul= variable2 - variable1;
    $('fafacturpro_monto').value=format(calcul.toFixed(2),'.',',','.');
    $('fafacturpro_monrgo').value=format(variable1.toFixed(2),'.',',','.');
  }

  function distribuirRecargos(fila,suma_resta)
  {
      var totregrgo=obtener_filas_grid('c',1);
    if (totregrgo>0)
    {
      var monTot= montoMarcados();
      var monTot2= calcularMontTot();
      var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);

      if (monTot>0 || monTot2>0)
      {
	     var regart=obtener_filas_grid('a',3);
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

	                  new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&articulo='+codart+'&recargo='+codrgo})
                          if ($('fafacturpro_trajo').value=='S')
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
	                   if ($('fafacturpro_mondesc').value!="")
	                   {
                              var totaldesc=0;
	                      var regdesc=obtener_filas_grid('b',1);
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
                                if ($('fafacturpro_esretencion').value=="N")
                                {
                                 var monsindesc=montosMarcadosSinDescuento();
                                 var pordescto= (((nprecio*ncant)*totaldesc)/monsindesc);
                                }
                                else
                                {
                                  var monsindesc=montosMarcadosSinDescuento();
                                  var pordescto= (((nprecio*ncant)*totaldesc)/monsindesc);
                                }

                                if ($('fafacturpro_esretencion').value=="N")
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

                  new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&articulo='+codart+'&recargo='+codrgo})
           	      if ($('fafacturpro_trajo').value=='S')
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
       var regart=obtener_filas_grid('a',3);
       var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
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
   var nmonfac= toFloat('fafacturpro_monfac');

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
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=10&cajtexmos='+nombre+'&cajtexcom='+id+'&recfij='+recfij+'&monto='+monto+'&cta='+cta+'&tipo='+tipo+'&monto2='+monto2+'&montot='+montot+'&montot1='+montot1+'&valmonto='+valmonto+'&codigo='+cod})
        }
        else
        {
         alert('El Recargo ya fue asignado');
         $(id).value="";
        }
      }
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
   var am=obtener_filas_grid('c',1);
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

  function totalFactura()
  {
    var montot=0;
    var regart=obtener_filas_grid('a',3);
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

  function ultimoMarcado()
  {
    var regart=obtener_filas_grid('a',3);
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

  function ajustarDescuento()
  {
    var acumulador=0;
    var diferencia=0
    var regart=obtener_filas_grid('a',3);
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

    var ndescuento= toFloat('fafacturpro_mondesc');
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

  function calcularTotalDescuento()
  {
    var miTot=0;
    var regart=obtener_filas_grid('a',3);
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
    var regdesc=obtener_filas_grid('b',1);
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
		         if ($('fafacturpro_esretencion').value=='N')
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
      $('fafacturpro_totdesc').value=format(miTot.toFixed(2),'.',',','.');
    }else {$('fafacturpro_totdesc').value="0,00";}



    $('fafacturpro_mondesc').value=$('fafacturpro_totdesc').value;
    var totadesc= toFloat('fafacturpro_mondesc');
    if ($('fafacturpro_tottotart').value!="")
    {
      var totaltotarti= toFloat('fafacturpro_tottotart');
      var montota= totaltotarti -totadesc;
      $('fafacturpro_monfac').value=format(montota.toFixed(2),'.',',','.');
    }
    ajustarDescuento();
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
   var nmonto= toFloat('fafacturpro_monto');
   var nporcdesc= toFloat('fafacturpro_porcentajedescto');
   var calculo= ((nmonto * nporcdesc)/100);

    if ($(id).value=="")
    {
      $(id).value="0,00";
    }

    if ($(coddes).value!="")
    {
      if ($(tipdesc).value=='M')
      {
        //if ((monto > calculo) && $('fafactur_apliclades').value=='S')
        //{
          //alert('El Porcentaje del Descuento sobrepasa el lï¿½mite permitido para el Usuario');
          //$(id).value="0,00";
        //}
      }
      var cuantos=marcados("D");

      if (cuantos==0) {cuantos=1;}
      if ($(tipdesc).value=='M')
      {
        var totfac=totalFactura();
        var totdesct=toFloat('fafacturpro_mondesc');
        if ((monto> totfac) || (totdesct>totfac))
        {
          alert('El Descuento no puede ser aplicado debido a que sobrepasa el Monto Total de la Factura');
          var ntotdesc= toFloat('fafacturpro_totdesc');
          var cal=ntotdesc - monto;

          $('fafacturpro_totdesc').value=format(cal.toFixed(2),'.',',','.');
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

  function descuento_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var descuento=$(id).value;

   var descuentorepetido=false;
   var am=obtener_filas_grid('b',1);
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
    var nmonfac= toFloat('fafacturpro_monfac');
	var ntotmonrgo= toFloat('fafacturpro_totmonrgo');
	var ntotdesc= toFloat('fafacturpro_totdesc');
	var porcentajedesc=toFloat('fafacturpro_porcentajedescto');
	var monto=toFloat('fafacturpro_monto');
	var aplicaclades=''; //$('fafacturpro_apliclades').value;
	var valmontodesc= toFloat(montodesc);
	var valcant=toFloat(cantidad);
	var totaltotarti= toFloat('fafacturpro_tottotart');


    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        if (!descuento_repetido(id))
       {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&cajtexmos='+descripcion+'&cajtexcom='+id+'&montodesc='+montodesc+'&cuenta='+cuenta+'&cantidad='+cantidad+'&tipo='+tipo+'&tiporet='+tiporet+'&descuento='+descuento+'&eldescuento='+eldesc+'&monfac='+nmonfac+'&totalrgo='+ntotmonrgo+'&totaldesc='+ntotdesc+'&porcentajedesc='+porcentajedesc+'&monto14='+monto+'&aplicaclades='+aplicaclades+'&valmontodesc='+valmontodesc+'&valcant='+valcant+'&totaltotarti='+totaltotarti+'&codigo='+cod})
       }
       else
       {
         alert('El Descuento ya fue asignado');
         $(id).value="";
       }
      }
    }
 }



function rellenarcorr(id)
    {
        if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0)
    }

function aplicarBL(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

   if (fil==0) {
       reg=obtener_filas_grid('a',2);
        var j=1;
        while (j<reg)
        {
          var billindg="ax_"+j+"_27";
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

function validarEstatus(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var estreal=col+3;
    var idestreal=name+"_"+fil+"_"+estreal;

    if ($(idestreal).value=='P')
    {
      alert("Este estatus es solo de consulta, no se puede modificar");
      $(id).value=$(idestreal).value;
    }else {
        if ($(id).value=='P')
        {
          alert("Este estatus es solo de consulta, no se puede utilizar");
          $(id).value=$(idestreal).value;
        }
    }
}

 function retornaMonto(codrgo)
 {
    var monTot=calcularMontTot();
        var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    if (monTot!=0)
    {
	    var regart=obtener_filas_grid('a',3);
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

	      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&articulo='+codart+'&recargo='+codrgo})
	      if ($('fafacturpro_trajo').value=='S')
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
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    var regart=obtener_filas_grid('a',3);
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
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&articulo='+codart+'&recargo='+codrgo})
        if ($('fafacturpro_trajo').value=='S')
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
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=10&cajtexmos='+nombre+'&cajtexcom='+id+'&recfij='+recfij+'&monto='+monto+'&cta='+cta+'&tipo='+tipo+'&monto2='+monto2+'&montot='+montot+'&montot1='+montot1+'&valmonto='+valmonto+'&codigo='+cod})
        }
        else
        {
         alert('El Recargo ya fue asignado');
         $(id).value="";
        }
      }
  }