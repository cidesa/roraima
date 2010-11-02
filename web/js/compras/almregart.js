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
    if ($('caregart_manartlot').value=='S')
    {
        var numlot="cx"+"_"+fil+"_4";
        var fecela="cx"+"_"+fil+"_5";
        var fecven="cx"+"_"+fil+"_6";
    }
    var num1=toFloat(monact);

    if ($(codubi).value!="" && num1>=0) {
         if ($('caregart_manartlot').value=='S')
           var cadena=cadena + $(codubi).value+'_' + $(desubi).value+'_' + $(monact).value +'_' + $(numlot).value +'_' + $(fecela).value +'_' + $(fecven).value + '!';
         else
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
   if ($('totalfilas').value!=0) //para chequear que el almacen tenga asociado ubicaciones
   {
       $('divGrid').show();
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
                      if ($('caregart_manartlot').value=='S')
                      {
                        var cnumlot=aux3[3];
                        var cfecela=aux3[4];
                        var cfecven=aux3[5];
                      }

		      var codubi="cx"+"_"+z+"_1";
		      var desubi="cx"+"_"+z+"_2";
		      var nomubi="cx"+"_"+z+"_3";
                      var numlot="cx"+"_"+z+"_4";
                      var fecela="cx"+"_"+z+"_5";
                      var fecven="cx"+"_"+z+"_6";

		      $(codubi).value=ccodubi;
		      $(desubi).value=cdesubi;
		      $(nomubi).value=cnomubi;
                      $(numlot).value=cnumlot;
                      $(fecela).value=cfecela;
                      $(fecven).value=cfecven;
		      z++;
		    }
		  }
		  actualizarsaldos_c();
  }
  else
  {
    $('divGrid').hide();
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

     if ($('caregart_manartlot').value=='S')
     {
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json),Verifica_ubinumlote_repetido(id)}, parameters:'ajax=3&cajtexmos='+cajtexmos+'&codalm='+codalm+'&cajtexcom='+id+'&codigo='+cod})

     }else {
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


 function Verifica_ubinumlote_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);


   var codubi=name+"_"+fila+"_1";
   var numlot=name+"_"+fila+"_3";

   var ubicacion=$(codubi).value;
   var lote=$(numlot).value;

   var repetido=false;
   var i=0;
   while (i<50)
   {
 	var filcodubi="cx"+"_"+i+"_1";
   	if ($(filcodubi).value!="")
   	{
            var filnumlot="cx"+"_"+i+"_3";

            var filubicacion=$(filcodubi).value;
            var fillote=$(filnumlot).value;

	    if (i!=fila)
	    {
	      if (ubicacion==filubicacion && lote==fillote)
	      {
	        repetido=true;
	        i=50;
	        break;
	      }
	     }
    i++;
    }// if ($(filcodubi).value!="")
    else
    {
     i=50;
    }
   }//while
   if (repetido)
   {
      alert_("Este N&uacute;mero de Lote ya ha sido asignado a la Ubicaci&oacute;n: "+ubicacion);
      var desubi=name+"_"+fila+"_2";
 	  var fecela=name+"_"+fila+"_4";
	  var fecven=name+"_"+fila+"_5";
      var monact=name+"_"+fila+"_6";

      $(codubi).value="";
      $(desubi).value="";
      $(numlot).value="";
      $(fecela).value="";
      $(fecven).value="";
      $(monact).value="0,00";
      $(codubi).focus();
   }//  if (repetido)

 }
