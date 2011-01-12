function actualizo_cod_presupuestario(e,id)
  {  if (e.keyCode==13 || e.keyCode==9)
  {
    if ($(id).value!="")
    {
      if (!(articulo_repetido(id)))
      {

        i=id.split('_');
        fil=i[1];
        var col_fila_unidad_art = "ax_"+fil+"_5";
         var col_fila_partida_art = "ax_"+fil+"_13";
        var col_fila_codigo_pre = "ax_"+fil+"_6";
        valor_cat_unidad=$(col_fila_unidad_art).value + '-' + $(col_fila_partida_art).value;
        valor_cat_unidad=valor_cat_unidad.replace('--','-');
        valor_cat_unidad=valor_cat_unidad.replace('--','-');
        valor_cat_unidad=valor_cat_unidad.replace('--','-');
        valor_cat_unidad=valor_cat_unidad.replace('--','-');
        valor_cat_unidad=valor_cat_unidad.replace('--','-');
        valor_cat_unidad=valor_cat_unidad.replace('--','-');
         $(col_fila_codigo_pre).value=valor_cat_unidad;
    }
    else
    {

      alert('El Articulo ya esta registrado en la Solicitud con esta Unidad');
      var aux = id.split("_");
      var name=aux[0];
      var fila=aux[1];
      var col=parseInt(aux[2]);
      var colart=col-3;
      var coldes=col-2;
      var coluni=col-1;
      var colpar=col+8;

      var art=name+"_"+fila+"_"+colart;
      var des=name+"_"+fila+"_"+coldes;
      var unidad=name+"_"+fila+"_"+coluni;
      var partida=name+"_"+fila+"_"+colpar;

      $(art).value="";
      $(des).value="";
      $(unidad).value="";
      $(partida).value="";
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

   var colart=col-3;

   var art=name+"_"+fila+"_"+colart;
   var articulo_unidad=$(art).value+$(id).value;

   var articulorepetido=false;
   var am=totalregistros('ax',2,150);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_2"
    var des="ax"+"_"+i+"_3";
    var unidad="ax"+"_"+i+"_4";
    var partida="ax"+"_"+i+"_13";
    var uni="ax"+"_"+i+"_5";

    var articulo_unidad2=$(codigo).value+$(uni).value;

    if (i!=fila)
    {
      if (articulo_unidad==articulo_unidad2)
      {
        articulorepetido=true;
        break;
      }
    }
   i++;
   }
   return articulorepetido;
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
  var coltotal=col+5;
  var coldes=col+3;
  var colrec=col+4;

  var costo=name+"_"+fil+"_"+colcosto;
  var des=name+"_"+fil+"_"+coldes;
  var recar=name+"_"+fil+"_"+colrec;
  var total=name+"_"+fil+"_"+coltotal;

  var num1=toFloat(id);
  var num2=toFloat(costo);
  var num3=toFloat(des);
  var num4=toFloat(recar);

   if (!validarnumero(id))
   {
    alert('Monto Inválido');
    $(id).value="0,00";
   }

   if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   costototal=((num1*num2)-num3 -num4);

   $(total).value=format(costototal.toFixed(2),'.',',','.');

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
   var colcosto=col;
   var coltotal=col+3;
   var coldes=col+1;
   var colrec=col+2;

   var cantidad=name+"_"+fil+"_"+colcantidad;
   var costo=name+"_"+fil+"_"+colcosto;
   var des=name+"_"+fil+"_"+coldes;
   var recar=name+"_"+fil+"_"+colrec;
   var total=name+"_"+fil+"_"+coltotal;

   var num1=toFloat(cantidad);
   var num2=toFloat(costo);
   var num3=toFloat(des);
   var num4=toFloat(recar);

   costototal=((num1*num2)-num3 -num4);

   $(total).value=format(costototal.toFixed(2),'.',',','.');
   }
}

function Totalmenosdescuento(e,id)
{
  if (e.keyCode==13)
  {
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var coldescuento=col;
  var colcosto=col-1;
  var coltotal=col+2;

  var descuento=name+"_"+fil+"_"+coldescuento;
  var total=name+"_"+fil+"_"+coltotal;
  var costo=name+"_"+fil+"_"+colcosto;

   var num1=toFloat(descuento);
   var num2=toFloat(total);
   var num3=toFloat(costo);

   if (!validarnumero(id))
   {
      alert('Monto Inválido');
      $(id).value="0,00";
   }

     if (num1 > num2)
     {
      alert('El Monto de Descuento no puede ser Mayor al Total');
      $(id).value="0,00";
      var num1=toFloat(id);
     }

    var totalfin=num2 - num1;

    $(total).value=format(totalfin.toFixed(2),'.',',','.');
    actualizarsaldos();
   }
 }

function Totalrecargo(e,id)
{
  if (e.keyCode==13)
  {
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var colmontrgo=col-2;
  var colrecargo=col;
  var coltiprgo=col-1;

  var monto=name+"_"+fil+"_"+colmontrgo;
  var tipo=name+"_"+fil+"_"+coltiprgo;
  var montrecargo=name+"_"+fil+"_"+colrecargo;

  if($(tipo).value=='P')
  {
    var num1=toFloat(monto);
    var num2=toFloat(montrecargo);

    totalrecargo=(num1*num2)/100;

   $(montrecargo).value=format(totalrecargo.toFixed(2),'.',',','.');
    }
   }
 }

 function totalmarcadas(id)
  {
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var colcant=col+6;
  var colcosto=col+8;
  var cantidad=name+"_"+fil+"_"+colcant;
  var costo=name+"_"+fil+"_"+colcosto;

  var montotot=toFloat('totmarcadas');
  var montcos=toFloat(costo);
  var canti=parseInt($(cantidad).value);

  calculo= canti*montcos;

	  if ($(id).checked==true)
	  {
	    acum=montotot + calculo;
	    $('totmarcadas').value=format(acum.toFixed(2),'.',',','.');
	  }
	  else
	  {
	    acum=montotot - calculo;
	    $('totmarcadas').value=format(acum.toFixed(2),'.',',','.');
	    desmarcarfila(id);
	  }
  }

  function totalmarcada()
  {
   var am=totalregistros('ax',2,150);
   var fil=0;
   var acum=0;
   while (fil<am)
   {
    var chk="ax"+"_"+fil+"_1";
    var cant="ax"+"_"+fil+"_7";
    var cost="ax"+"_"+fil+"_9";

    var canti=toFloat(cant);
    var montcos=toFloat(cost);
    var calculo= canti*montcos;

    if ($(chk).checked==true)
    {
      acum=acum + calculo;
    }
   fil++;
   }
   total=acum;//format(acum.toFixed(2),'.',',','.');

   return total;
  }

  function calcularecargos(e,id)
  {
    if (e.keyCode==13)
    {
      var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colmonto=col+4;
    var colmonreg=col+2;
    var coltipo=col+3;
    var monto=name+"_"+fil+"_"+colmonto;
    var montoreg=name+"_"+fil+"_"+colmonreg;
    var tipo=name+"_"+fil+"_"+coltipo;

    var montmar=totalmarcada();

    var montot=montmar;
    var monreg=toFloat(montoreg);

    if ($(tipo).value=='M')
    {
     $(monto).value= $(montoreg).value;
    }
    else if ($(tipo).value=='P')
    {
     cal= ((montot*monreg)/100);
     $(monto).value=format(cal.toFixed(2),'.',',','.');
    }else {$(monto).value="0,00";}

    actualizarsaldos_b();
    }
  }

  function gridrecargos(fil)
  {
    var monto="bx"+"_"+fil+"_5";
    var montoreg="bx"+"_"+fil+"_3";
    var tipo="bx"+"_"+fil+"_4";

  var montmar=totalmarcada();

   var montot=montmar;
   var monreg=toFloat(montoreg);

   if ($(tipo).value=='M')
   {
    $(monto).value= $(montoreg).value;
   }
   else if ($(tipo).value=='P')
   {
    cal= ((montot*monreg)/100);
    $(monto).value=format(cal.toFixed(2),'.',',','.');
   }else {$(monto).value="0,00";}

   actualizarsaldos_b();
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

  function distribuirecargos(fila,suma_resta)
  {
   var ax=totalregistros('bx',1,20);
   var j=0;
   while (j<ax)
   {
    gridrecargos(j);
    j++;
   }
   var fi=0;
   var codigo="bx"+"_"+fi+"_1"
   if ($(codigo).value!="")
   {
   var montmar=totalmarcada();

   var montot=montmar;

     if (montot>0)
     {
      var az=totalregistros('ax',2,150);
      var l=0;
      while (l<az)
      {
       var id1="ax"+"_"+l+"_1";
       var cos="ax"+"_"+l+"_9";
       var cant="ax"+"_"+l+"_7";
       var des="ax"+"_"+l+"_10";
       var recargo="ax"+"_"+l+"_11";
       var total="ax"+"_"+l+"_12";
       var recar="bx"+"_"+fila+"_5";

       var moncos=toFloat(cos);
       var moncant=toFloat(cant);
       var mondes=toFloat(des);
       var monrecar=toFloat(recar);
       var monrecargo=toFloat(recargo);
       var montotal=toFloat(total);

       if ($(id1).checked==true)
       {
         monuni=((((moncos*moncant)-mondes)/montot)*monrecar);
         if (suma_resta=='S')
         {
           calc=monrecargo+monuni;
           $(recargo).value=format(calc.toFixed(2),'.',',','.');

           calc2=montotal+monuni;
           $(total).value=format(calc2.toFixed(2),'.',',','.');
         }
         else if (suma_resta=='R')
         {
           calc=montotal-monrecargo;
           $(total).value=format(calc.toFixed(2),'.',',','.');

           $(recargo).value="0,00";
         }
       }

      l++;
      }
      //actualizarsaldos();
     }
   }
   else
   {
    var az=totalregistros('ax',2,150);
    var l=0;
      while (l<az)
      {
       var id1="ax"+"_"+l+"_1";
       var id1="ax"+"_"+l+"_2";
       var cos="ax"+"_"+l+"_9";
       var cant="ax"+"_"+l+"_8";
       var des="ax"+"_"+l+"_10";
       var recargo="ax"+"_"+l+"_11";
       var total="ax"+"_"+l+"_12";

       var moncos=toFloat(cos);
       var moncant=toFloat(cant);
       var mondes=toFloat(des);

       if ($(id2).value!="")
       {
         calc=((moncant*moncos)-mondes);
         $(total).value=format(calc.toFixed(2),'.',',','.');

         $(recargo).value="0,00";
       }
      l++;
     }
   }
 }

 function salvarecargos()
 {
   var formulario='sf_admin/almsolegr';
   new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&formulario='+formulario})

   var cc=totalregistros('bx',1,20);
   var t=0;
   while (t<cc)
   {
    distribuirecargos(t,'R');
   t++;
   }

   var m=0;
   while (m<cc)
   {
     distribuirecargos(m,'S');
     m++;
   }

   actualizarsaldos();
   $('recargos').hide();
  }

  /*function recalcularecargos(e)
  {
   if (e.keyCode==13)
   {
     var cc=totalregistros('bx',1,20);
     var t=0;
     while (t<cc)
     {
      distribuirecargos(t,'R');
      t++;
     }

     var m=0;
     while (m<cc)
     {
      distribuirecargos(m,'S');
      m++;
     }
     actualizarsaldos();
  }
 }*/

  function recalcularecargos(e,id)
  {
  if (e.keyCode==13 )
   {
        var i=id.split('_');
        var fil=i[1];
        var id1="ax"+"_"+fil+"_1";
        var cost="ax"+"_"+fil+"_9";
        var cant="ax"+"_"+fil+"_7";
        var dest="ax"+"_"+fil+"_10";
        var recargo="ax"+"_"+fil+"_11";
        var total="ax"+"_"+fil+"_12";
        var infrecargos="ax"+"_"+fil+"_17";

		var moncant=toFloat(cant);
		var moncos=toFloat(cost);
		var mondto=toFloat(dest);
        var monuni=moncos*moncant;

		var monrgotot=0;
		var cadena="";

        if ($(id1).checked==true)
        {
		  var haydist="ax"+"_"+fil+"_17";
		  if ($(haydist).value!="")
		  {
		   var distrib=$(haydist).value;
		   var aux2=distrib.split("!");
		   var z=0;
		   while (z<((aux2.length)-1))
		   {
		    var reg=aux2[z];
		    var aux3=reg.split("_");
		    var ccodrgo=aux3[0];
		    var cdesrgo=aux3[1];
		    var cmonrgotab=toFloat2(aux3[2]);
		    var ctiprgo=aux3[3];
		    var cmonrgo=toFloat2(aux3[4]);

			if (ctiprgo=='M')
			{
			  //cmonrgo=cmonrgotab;
			  cmonrgo=cmonrgotab
			}
			else if (ctiprgo=='P')
			{
			 cmonrgo= ((monuni*cmonrgotab)/100);
			}
			else
			{cmonrgo=0;}

            cmonrgotabfor=format(cmonrgotab.toFixed(2),'.',',','.');
            cmonrgofor=format(cmonrgo.toFixed(2),'.',',','.');
            cadena=cadena + ccodrgo+'_' + cdesrgo+'_' + cmonrgotabfor +'_'+ ctiprgo +'_' + cmonrgofor + '!';
            monrgotot=monrgotot+cmonrgo;
		    z++;
		    }//while
		    $(infrecargos).value=cadena;
		    $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
	        montottot=monuni-mondto+monrgotot;
		    $(total).value=format(montottot.toFixed(2),'.',',','.');

		  }//  if ($(haydist).value!="")
		 }//if ($(id1).checked==true)
		 actualizarsaldos();
  }
 }

  function ajaxdetalle(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var coluni=col+2;
   var colunres=col+3;
    var colcos=col+7;
    var colpar=col+11;
    var descripcion=name+"_"+fil+"_"+coldes;
    var unidad=name+"_"+fil+"_"+coluni;
    var costo=name+"_"+fil+"_"+colcos;
    var partida=name+"_"+fil+"_"+colpar;
    var unires=name+"_"+fil+"_"+colunres;
    var unidadres=$('casolart_unires').value;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
    new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&unidad='+unidad+'&costo='+costo+'&unires='+unires+'&valuni='+unidadres+'&partida='+partida+'&codigo='+cod})
    }
    }
 }

 /* function ajaxrecargo(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var colmonto=col+2;
    var coltipo=col+3;

    var descripcion=name+"_"+fil+"_"+coldes;
    var monto=name+"_"+fil+"_"+colmonto;
    var tipo=name+"_"+fil+"_"+coltipo;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), calcularecargos(e,id);}, parameters:'ajax=4&cajtexmos='+descripcion+'&cajtexcom='+id+'&monto='+monto+'&tipo='+tipo+'&codigo='+cod})
      }
    }
 }*/

  function ajaxrecargo(e,id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=2;
    var colmonto=3;
    var coltipo=4;
    var colmoncal=5;

    var descripcion=name+"_"+fil+"_"+coldes;
    var monto=name+"_"+fil+"_"+colmonto;
    var tipo=name+"_"+fil+"_"+coltipo;
    var moncal=name+"_"+fil+"_"+colmoncal;

    var cod=$(id).value;
    var monart=toFloat('totartsinrec');

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json);}, parameters:'ajax=9&cajtexmos='+descripcion+'&cajtexcom='+id+'&monto='+monto+'&tipo='+tipo+'&moncal='+moncal+'&monart='+monart+'&codigo='+cod})
      }
    }
  }

 function mostrargridrecargos(id)
 {
  	var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);


    var codart=name+"_"+fil+"_2";
    var coduni=name+"_"+fil+"_5";
    var chk="ax"+"_"+fil+"_1";
    if ($(chk).checked==true)
    {
	 if ($(codart).value!="")
	 {
	    if ($('casolart_reqart').value=='########') var reqart=''; else var reqart=$('casolart_reqart').value;
   	    var modifico=$('modifi').value;
	    var articulo=$(codart).value;
        var codunidad=$(coduni).value;

	    var cant="ax"+"_"+fil+"_7";
	    var cost="ax"+"_"+fil+"_9";

	    var canti=toFloat(cant);
	    var montcos=toFloat(cost);
	    var calculo= canti*montcos;
   	    $('totartsinrec').value=format(calculo.toFixed(2),'.',',','.');
        $('actualfila').value=fil;

	    new Ajax.Updater('grid_recargo', getUrlModulo()+'recargos', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json); distribuirRecargosenGrid(); $("recargos").show(); $("botonesmarcar").hide(); }, parameters:'articulo='+articulo+'&reqart='+reqart+'&codunidad='+codunidad+'&modifico='+modifico})
 	}
	else
	{
		alert_("Debe introducir el Art&iacute;culo antes de los cargar los Recargos..");
	}
   }
   else
   {
     alert("Debe marcar la primera casilla (Marque) antes de cargar los Recargos..");
   }
}

function salvarmontorecargos()
{
  var cadena='';
  var fil=0;
  while (fil<50)
    {
      var codrgo="bx"+"_"+fil+"_1";
      if ($(codrgo).value!="")
      {
	    var desrgo="bx"+"_"+fil+"_2";
    	var monrgoc="bx"+"_"+fil+"_3";
    	var tiprgo="bx"+"_"+fil+"_4";
    	var monrgo="bx"+"_"+fil+"_5";
	    var cadena=cadena + $(codrgo).value+'_' + $(desrgo).value+'_' + $(monrgoc).value +'_'+ $(tiprgo).value+'_' + $(monrgo).value + '!';
      }
      else
      {
      fil=50;}
      fil++;
    }


  var mifila=$('actualfila').value;
  var infrecargos="ax"+"_"+mifila+"_17";
  var cant="ax"+"_"+mifila+"_7";
  var cost="ax"+"_"+mifila+"_9";
  var descto="ax"+"_"+mifila+"_10";
  var recargo="ax"+"_"+mifila+"_11";
  var total="ax"+"_"+mifila+"_12";

  $(infrecargos).value=cadena;
  $(recargo).value=$('totrecar').value;

  var recfil=toFloat('totrecar');
  var canti=toFloat(cant);
  var moncos=toFloat(cost);
  var mondto=toFloat(descto);
  var monnet= canti*moncos;

  montottot=monnet-mondto+recfil;
  $(total).value=format(montottot.toFixed(2),'.',',','.');

  $('recargos').hide();
  $("botonesmarcar").show()
  actualizarsaldos();
}


 function distribuirRecargosenGrid()
 {
		 var j=$('actualfila').value;
		 var haydist="ax"+"_"+j+"_17";
		 if ($(haydist).value!="")
		  {
		    var distrib=$(haydist).value;
		  	var aux2=distrib.split("!");

		  	var z=0;
		    while (z<((aux2.length)-1))
		    {
		     var reg=aux2[z];
		     var aux3=reg.split("_");
		     var ccodrgo=aux3[0];
		     var cdesrgo=aux3[1];
		     var cmonrgoc=aux3[2];
		     var ctiprgo=aux3[3];
		     var cmonrgo=aux3[4];


	         var codrgo="bx"+"_"+z+"_1";
	         var desrgo="bx"+"_"+z+"_2";
	    	 var monrgoc="bx"+"_"+z+"_3";
	    	 var tiprgo="bx"+"_"+z+"_4";
	    	 var monrgo="bx"+"_"+z+"_5";


		     $(codrgo).value=ccodrgo;
		     $(desrgo).value=cdesrgo;
		     $(monrgoc).value=cmonrgoc;
   		     $(tiprgo).value=ctiprgo;
		     $(monrgo).value=cmonrgo;
		     //si el tipo de recargo es puntual "M" y el valor es cero (0), entonces se debe habilitar la cajita de texto del monto para que el usuario
		     //pueda modificar el monto del recargo
		     var monto_monrgo=toFloat2(aux3[2]);
		     if (ctiprgo=="M" && monto_monrgo==0)
		     {
		     	$(monrgo).readOnly=false;
		     }
		     z++;
		    }
		  }
 }

 function marcarTodo()
  {
   var infrecargos="ax"+"_0_17";
   var distrib=$(infrecargos).value;
   var articulo="ax"+"_0_2";
   var valorarticulo=$(articulo).value;
   if (valorarticulo!="")
   {
    if (distrib!="")
    {
     var fil=1;
     while (fil<150)
     {
      var codart="ax"+"_"+fil+"_2";
      if ($(codart).value!="")
      {
       var id="ax"+"_"+fil+"_1";
       var cost="ax"+"_"+fil+"_9";
       var cant="ax"+"_"+fil+"_7";
       var dest="ax"+"_"+fil+"_10";
       var recargo="ax"+"_"+fil+"_11";
       var total="ax"+"_"+fil+"_12";
       var haydistribucion="ax"+"_"+fil+"_17";

	   var moncant=toFloat(cant);
	   var moncos=toFloat(cost);
	   var mondto=toFloat(dest);
       var monuni=moncos*moncant;

	   var monrgotot=0;
	   var cadena="";


	   var z=0;
	   var aux2=distrib.split("!");
	   while (z<((aux2.length)-1))
	   {
	    var reg=aux2[z];
	    var aux3=reg.split("_");
	    var ccodrgo=aux3[0];
	    var cdesrgo=aux3[1];
	    var cmonrgotab=toFloat2(aux3[2]);
	    var ctiprgo=aux3[3];
	    var cmonrgo=toFloat2(aux3[4]);

		if (ctiprgo=='M')
		{
		  cmonrgo=cmonrgotab;
		 //   cmonrgo=cmonrgo;
		}
		else if (ctiprgo=='P')
		{
		 cmonrgo= ((monuni*cmonrgotab)/100);
		}
		else
		{cmonrgo=0;}

        cmonrgotabfor=format(cmonrgotab.toFixed(2),'.',',','.');
        cmonrgofor=format(cmonrgo.toFixed(2),'.',',','.');
        cadena=cadena + ccodrgo+'_' + cdesrgo+'_' + cmonrgotabfor +'_'+ ctiprgo +'_' + cmonrgofor + '!';
        monrgotot=monrgotot+cmonrgo;
	    z++;
	    }//while

	    $(haydistribucion).value=cadena;
	    $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
        montottot=monuni-mondto+monrgotot;
	    $(total).value=format(montottot.toFixed(2),'.',',','.');
	    $(id).checked=true;
      }//if ($(codart).value!="")
      else
      {
       fil=150;
      }
      fil++;
    }//while (fil<150)
    actualizarsaldos();
   }// if (distrib!="")
   else
   {
    alert_("No han sido aplicados Recargos al primer Art&iacute;culo del Detalle, C&oacute;digo: "+ valorarticulo+". Deben ser definidos estos Recargos para poder replicarlos al resto de los Art&iacute;culo del Detalle de la Solicitud ")
   }
  }
  }

  function desmarcarTodo()
  {
     var fil=1;
     while (fil<150)
     {
      var codart="ax"+"_"+fil+"_2";
      if ($(codart).value!="")
      {
       var id="ax"+"_"+fil+"_1";
       var cost="ax"+"_"+fil+"_9";
       var cant="ax"+"_"+fil+"_7";
       var dest="ax"+"_"+fil+"_10";
       var recargo="ax"+"_"+fil+"_11";
       var total="ax"+"_"+fil+"_12";
       var haydistribucion="ax"+"_"+fil+"_17";

	   var moncant=toFloat(cant);
	   var moncos=toFloat(cost);
	   var mondto=toFloat(dest);
       var monuni=moncos*moncant;

	   var monrgotot=0;
	   var cadena="";

	    $(haydistribucion).value=cadena;
	    $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
        montottot=monuni-mondto;
	    $(total).value=format(montottot.toFixed(2),'.',',','.');
	    $(id).checked=false;
      }//if ($(codart).value!="")
      else
      {
       fil=150;
      }
      fil++;
    }//while (fil<150)
    actualizarsaldos();

  }

  function desmarcarfila(id)
  {
      var aux = id.split("_");
      var name=aux[0];
      var fil=parseInt(aux[1]);


      var codart="ax"+"_"+fil+"_2";
      if ($(codart).value!="")
      {
       var cost="ax"+"_"+fil+"_9";
       var cant="ax"+"_"+fil+"_7";
       var dest="ax"+"_"+fil+"_10";
       var recargo="ax"+"_"+fil+"_11";
       var total="ax"+"_"+fil+"_12";
       var haydistribucion="ax"+"_"+fil+"_17";

	   var moncant=toFloat(cant);
	   var moncos=toFloat(cost);
	   var mondto=toFloat(dest);
       var monuni=moncos*moncant;

	   var monrgotot=0;
	   var cadena="";

	    $(haydistribucion).value=cadena;
	    $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
        montottot=monuni-mondto;
	    $(total).value=format(montottot.toFixed(2),'.',',','.');
	    actualizarsaldos();
      }//if ($(codart).value!="")

  }
