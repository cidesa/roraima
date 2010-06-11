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

				    var colart=totalregistros2('ax',3,25);
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

 function calcularMontTot()
  {
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
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
		       var colart=totalregistros2('ax',3,25);
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
    var tottotal=0;

    while (fil<regart)
    {
      var precio="ax_"+fil+"_10";
      var precioe="ax_"+fil+"_11";
      var cant="ax_"+fil+"_"+colum;      
      var totart="ax_"+fil+"_13";
      var check="ax_"+fil+"_1";

      if ($(precio)){

      if ($(totart).value!="" && (ValidarNumeroV2VE(totart)==true))
      {
       if (!ValidarNumeroV2VE(cant)) {$(cant).value="0,00";}
       if (!ValidarNumeroV2VE(precio)) {$(precio).value="0,00";}
       if (!ValidarNumeroV2VE(precioe)) {$(precioe).value="0,00";}       

       if ($(precio).value!="")
       {var nprecio= toFloat(precio);}
       else {var nprecio= toFloat(precioe);}

       var ncant= toFloat(cant);       
       var ntotart= toFloat(totart);
       if($(check).checked==true)
       {
            montot= montot + ((nprecio * ncant));
            tottotal=tottotal + ntotart;
       }        
      }
      }
     fil++;
    }
    $('fafacturpro_monfac').value=number_format(tottotal,'2',',','.');

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

  function marcar()
  {
      alert('hola mundo');
  }
