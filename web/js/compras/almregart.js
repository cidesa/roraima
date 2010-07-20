function mostrar(id)
{
  	var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colalm=1;
    var codalm=name+"_"+fil+"_"+colalm;

	if ($(codalm).value!="")
	{
	    var articulo=$('caregart_codart').value;
	    var almacen=$(codalm).value;

	    new Ajax.Updater('divGrid', getUrlModulo()+'/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&almacen='+almacen+'&fil='+fil+'&articulo='+articulo})
	}
	else
	{
		alert("En esta fila no existe almacen definido..");
	}
}

function salvarmontos()
{
  var fil=0;
  var cadena='';
  var totalfilas=totalregistros('cx',1,10);//$('totalfilas').value;
  while (fil<totalfilas)
  {
    var codubi="cx"+"_"+fil+"_1";
    var desubi="cx"+"_"+fil+"_2";
    var monact="cx"+"_"+fil+"_3";
    var num1=toFloat(monact);

    if ($(codubi).value!="" && num1>0) {
    var cadena=cadena + $(codubi).value+'_' + $(desubi).value+'_' + $(monact).value + '!';
    }
    fil++;
  }

  var filas=$('fila').value;
  var infubi="ax"+"_"+filas+"_8";
  var exiact="ax"+"_"+filas+"_6";

  $(infubi).value=cadena;
  $(exiact).value=$('totalubi').value;
  $('periodos').hide();
  actualizarsaldos();
}


function distribuirExistencia()
{
   var totalfilas=totalregistros('cx',1,10);//$('totalfilas').value;
   if (totalfilas>0)
   {
		 var j=$('fila').value;
		 var haydist="ax"+"_"+j+"_8";
		 if ($(haydist).value!="")
		  {
		    var distrib=$(haydist).value;
		  	var aux2=distrib.split("!");

		  	var z=0;
		    while (z<((aux2.length)-1))
		    {
		      var reg=aux2[z];
		      var aux3=reg.split("_");
		      var ccodubi=aux3[0];
		      var cdesubi=aux3[1];
		      var cnomubi=aux3[2];

		      var codubi="cx"+"_"+z+"_1";
		      var desubi="cx"+"_"+z+"_2";
		      var nomubi="cx"+"_"+z+"_3";

		      $(codubi).value=ccodubi;
		      $(desubi).value=cdesubi;
		      $(nomubi).value=cnomubi;
		      z++;
		    }
		  }
		  actualizarsaldos_c();
  }
  else
  {
  		alert("Este almacen no tiene ubicaciones asociadas...");
  }
}

 function deshabil()
 {
    disableAllObjetos(a=new Array('caregart_codart','caregart_desart','caregart_tipo_S','caregart_tipo_A'),true);
    $$('.botoncat')[0].disabled=true;
    $$('.botoncat')[1].disabled=true;
    $$('.botoncat')[2].disabled=true;
    $('trigger_caregart_fecult').hide();
 }

  function habilitartodo()
 {
    disableAllObjetos(a=new Array('caregart_exitot'),false);
    $$('.botoncat')[0].disabled=false;
    $$('.botoncat')[1].disabled=false;
    $$('.botoncat')[2].disabled=false;
    $('trigger_caregart_fecult').show();
 }

 function deshart()
 {
 	if ($('deshab').value=="" || $('deshab').value=="N")
 	{
 		habilitartodo();
 	}
 	else
 	{
 	    deshabil();
 	}
 }

 function consultaid()
 {
 	if ($('id').value!='' && $('caregart_codart').value!='')
 	{
 		$('caregart_codart').readOnly=true;
 	}
 }


 function verificamontos(e, id)
{
  	var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var colact=parseInt(aux[2]);


     var coleximin=name+"_"+fil+"_3";
     var coleximax=name+"_"+fil+"_4";
     var colptoreo=name+"_"+fil+"_5";

	 var numeximin=toFloat(coleximin);
	 var numeximax=toFloat(coleximax);
	 var numptoreo=toFloat(colptoreo);

     if (colact==4)//Existencia Maxima
     {
       if (numeximax<numeximin)
         {
           alert('La existencia maxima debe ser mayor a la existencia minima');
           $(coleximax).value="0,00";
           $(colptoreo).value="0,00";
           $(coleximax).focus();
           $(coleximax).select();
           return false;
         }
     }
     else // pto de reorden
     {
       if (numptoreo<numeximin || numptoreo>numeximax)
       {
           alert('El punto de reorden debe estar entre la existencia maxima y la mimima');
           $(colptoreo).value="0,00"
           $(colptoreo).focus();
           $(colptoreo).select();
           return false;
       }
     }

    entermonto(e,id)

}

function ajax(e,id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    filaalm=$('fila').value;
    var idcodalm="ax_"+filaalm+"_1";
    var cajtexmos=name+"_"+fil+"_"+coldes;
    var codalm=$(idcodalm).value;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
    if ($(id).value!='')
    {
     if (!ubicacion_repetida(id))
     {
       new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+cajtexmos+'&codalm='+codalm+'&cajtexcom='+id+'&codigo='+cod})
     }else {
       alert_('La Ubicaci&oacute;n esta Repetida');
       $(id).value="";
       $(id).focus();
     }
    }
  }
 }

 function ubicacion_repetida(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var ubicacion=$(id).value;

   var ubicacionrepetido=false;
   var am=totalregistros('cx',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="cx"+"_"+i+"_1";

    var ubicacion2=$(codigo).value;

    if (i!=fila)
    {
      if (ubicacion==ubicacion2)
      {
        ubicacionrepetido=true;
        break;
      }
    }
   i++;
   }
   return ubicacionrepetido;
 }
