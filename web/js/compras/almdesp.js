  function actualiza(id)
  {
    if (id!="")
    {
      $('trigger_cadphart_fecdph').hide();
     $$('.botoncat')[0].disabled=true;
  	 $$('.botoncat')[1].disabled=true;
   }
  }


 function verificar()
 {
 	if ($('verificaexisydisp').value=="N")
	{
		alert($('mensaje').value);
	}
 }

 function verexisteubicacion()
 {
 	if ($('existeubicacion').value=="N")
	{
		alert('La ubicacion : '+$('cadphart_codubi').value+', no existe para el almacen seleccionado...');
		$('cadphart_codubi').value="";
		$('cadphart_desubi').value="";
		$('cadphart_codubi').select();
		$('cadphart_codubi').focus();
	}
 }


function cantdespachada(e,id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var colcantdespocul=12;
  var colcantnodesp=4;
  var colcantdesp=3;
  var colcospro=10;
  var colcosto=5;
  var colcodart=1;

  var despocul=name+"_"+fil+"_"+colcantdespocul;
  var nodesp=name+"_"+fil+"_"+colcantnodesp;
  var desp=name+"_"+fil+"_"+colcantdesp;
  var cospro=name+"_"+fil+"_"+colcospro;
  var costo=name+"_"+fil+"_"+colcosto;
  var codart=name+"_"+fil+"_"+colcodart;
  var colcodalm=name+"_"+fil+"_13";
  var colcodubi=name+"_"+fil+"_15";

  var num1=toFloat(despocul);
  var num2=toFloat(desp);
  var num4=toFloat(cospro);

  if ($(colcodalm).value!="" && $(colcodubi).value!="" )
  {
   if (num2>num1)
   {
       alert("La cantidad a despachar no puede ser mayor a "+document.getElementById(despocul).value);
       document.getElementById(desp).value=document.getElementById(despocul).value;
       var num2=toFloat(desp);
    }
    resta=num1-num2;
    multiplica=num2*num4;

   //FORMAT(PUNTO,COMA,PUNTO)
   document.getElementById(nodesp).value=format(resta.toFixed(2),'.',',','.');
   document.getElementById(costo).value=format(multiplica.toFixed(2),'.',',','.');

   entermonto_b(e,id);


	   var codart=document.getElementById(codart).value;
	   var codalm=$(colcodalm).value;
	   var codubi=$(colcodubi).value;
	   var candes=num2;
	   new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json), verificar(); }, parameters:'ajax=5&candes='+candes+'&codalm='+codalm+'&codubi='+codubi+'&codart='+codart})
	}//if ($(colcodalm).value!="" || $(colcodubi).value!="" )
  else
  {
   if (num2>0){
    alert_("Debe indicar el C&oacute;digo del Almac&eacute;n, la Ubicaci&oacute;n por cada art&iacute;culo del detalle");
    document.getElementById(desp).value=document.getElementById(despocul).value;
    var num2=toFloat(desp);
   }//if (num2>0){
    resta=num1-num2;
    multiplica=num2*num4;

    //FORMAT(PUNTO,COMA,PUNTO)
    document.getElementById(nodesp).value=format(resta.toFixed(2),'.',',','.');
    document.getElementById(costo).value=format(multiplica.toFixed(2),'.',',','.');

    entermonto_b(e,id);

  }
}



  function ejecutaajax(e,id)
  {
    if (e.keyCode==13 || e.keyCode==9)
    {
        var aux = id.split("_");
	    var name=aux[0];
	    var fil=parseInt(aux[1]);
	    var col=parseInt(aux[2]);

	  	var coldes=col+1;
    	var descripcion=name+"_"+fil+"_"+coldes;

	    var colalm=col-2;
	    var codalm=name+"_"+fil+"_"+colalm;
	    var valcodalm=$(codalm).value;
	    var cod=$(id).value;

        if ($(id).value!="")
      	{
    		new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&cajtexmos='+descripcion+'&cajtexcom='+id+'&codalm='+valcodalm+'&codigo='+cod})
    	}
    }
  }

 function ajaxart(e,id)
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
        if (!art_repetido(id))
       {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
       }
       else
       {
         alert_('El Art&iacute;culo ya esta repetido con esa Unidad');
         $(id).value="";
         $(descripcion).value="";
       }
      }
    }
 }

function art_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var colunidad=col+2;
   var unidad=name+"_"+fila+"_"+colunidad;
   var artrepetido=false;

   if ($(unidad).value!=""){
   var articulo_unidad=$(id).value+"-"+$(unidad).value;
   var am=totalregistros2('ax',1,50);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";
    var unidad2="ax"+"_"+i+"_3";

    if ($(codigo) && $(unidad2))
    {
    var articulo_unidad2=$(codigo).value+"-"+$(unidad2).value;

    if (i!=fila)
    {
      if (articulo_unidad==articulo_unidad2)
      {
        artrepetido=true;
        break;
      }
    }
    }
   i++;
   }
   }else{ artrepetido=false; }

   return artrepetido;
 }

 function ajaxcat(e,id)
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
        if (!uni_repetido(id))
       {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
       }
       else
       {
         alert_('El Art&iacute;culo ya esta repetido con esa Unidad');
         $(id).value="";
         $(descripcion).value="";
       }
      }
    }
 }

function uni_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var colart=col-2;
   var arti=name+"_"+fila+"_"+colart;
   var unirepetido=false;

  if ($(arti).value!=""){
   var articulo_unidad=$(arti).value+"-"+$(id).value;
   var am=totalregistros2('ax',1,50);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";
    var unidad2="ax"+"_"+i+"_3";

    if ($(codigo) && $(unidad2))
    {
    var articulo_unidad2=$(codigo).value+"-"+$(unidad2).value;

    if (i!=fila)
    {
      if (articulo_unidad==articulo_unidad2)
      {
        unirepetido=true;
        break;
      }
    }
    }
   i++;
   }
   }
   else { unirepetido=false;  }

   return unirepetido;
 }