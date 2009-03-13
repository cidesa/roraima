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
 	if ($('existeubicacion').value=="N")8.000,00
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

	 function enter(valor)
	 {
	     if (valor!='')
	     { valor=valor.pad(8, '0',0);}
	     else
	     {valor=valor.pad(8, '#',0);}
	     $('cadphart_dphart').value=valor;
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
