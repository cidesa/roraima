function mostrar(id)
{
  	var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colart=1;
    var codart=name+"_"+fil+"_"+colart;
    var codalm=$('cainvfis_codalm').value;
    var fecinv=$('cainvfis_fecinv').value;
    var articulo=$(codart).value;

	if (codalm!="")
	{
	    var almacen=codalm;

	    new Ajax.Updater('gridubi', getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json), distribuirExistencia(); }, parameters:'ajax=4&articulo='+articulo+'&almacen='+almacen+'&fecinv='+fecinv+'&fil='+fil})
	}
	else
	{
		alert("Debe seleccionar el Almacen..");
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
    var monact2="cx"+"_"+fil+"_4";
    var totalm="cx"+"_"+fil+"_5";
    var cadena=cadena + $(codubi).value+'_' + $(desubi).value+'_' + $(monact).value+'_' + $(monact2).value + '_' + $(totalm).value + '!';
    fil++;
  }

  var filas=$('fila').value;
  var infubi="ax"+"_"+filas+"_8";
  var exiact="ax"+"_"+filas+"_3";
  var exiact2="ax"+"_"+filas+"_4";
  var totalalm2="ax"+"_"+filas+"_9";

  $(infubi).value=cadena;
  $(exiact).value=$('totalubi').value;
  $(exiact2).value=$('totalubi2').value;
  $(totalalm2).value=$('totalm2').value;
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
		      var cexiact=aux3[2];
		      var cexiact2=aux3[3];

		      var codubi="cx"+"_"+z+"_1";
		      var desubi="cx"+"_"+z+"_2";
		      var exiact="cx"+"_"+z+"_3";
		      var exiact2="cx"+"_"+z+"_4";

		      $(codubi).value=ccodubi;
		      $(desubi).value=cdesubi;
		      $(exiact).value=cexiact;
		      $(exiact2).value=cexiact2;
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
