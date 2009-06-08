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

	    new Ajax.Updater('divGrid', '/compras_dev.php/almregart/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json), actualizarsaldos_b(); distribuirExistencia(); }, parameters:'ajax=7&almacen='+almacen+'&fil='+fil+'&articulo='+articulo})
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
  var totalfilas=$('totalfilas').value;
  while (fil<totalfilas)
  {
    var codubi="cx"+"_"+fil+"_1";
    var desubi="cx"+"_"+fil+"_2";
    var monact="cx"+"_"+fil+"_3";
    var cadena=cadena + $(codubi).value+'_' + $(desubi).value+'_' + $(monact).value + '!';
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
   var totalfilas=$('totalfilas').value;
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
		  actualizarsaldos_b();
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
