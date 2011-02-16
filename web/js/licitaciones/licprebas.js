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
    alert('Monto Inv�lido');
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
    var catunires="popup_a_"+fil+"_"+colunres;
    var unidadres=$('liprebas_unires').value;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
    new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&unidad='+unidad+'&costo='+costo+'&unires='+unires+'&valuni='+unidadres+'&partida='+partida+'&catunires='+catunires+'&codigo='+cod})
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
       

	   var moncant=toFloat(cant);
	   var moncos=toFloat(cost);
	   var mondto=toFloat(dest);
       var monuni=moncos*moncant;

	   var monrgotot=0;
	   var cadena="";

	
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
       

	   var moncant=toFloat(cant);
	   var moncos=toFloat(cost);
	   var mondto=toFloat(dest);
       var monuni=moncos*moncant;

	   var monrgotot=0;
	   var cadena="";

	    
        montottot=monuni-mondto;
	    $(total).value=format(montottot.toFixed(2),'.',',','.');
	    actualizarsaldos();
      }//if ($(codart).value!="")

  }

