function validarCodigo(id)
{
	 var aux = id.split("_");
   	 var name=aux[0];
   	 var fila=aux[1];
   	 var col=parseInt(aux[2]);
   	 
   	 var coladi = col + 3;
   	 
   	 var idnew = name+"_"+fila+"_"+coladi;
   	 
   	 var valor = $(idnew).value;
   	 
   	 var valor2 =  $('npconceptoscategoria_codcat').value;
   	 
   	 var codigo = valor2 +"-" +valor;
   	 
   	 new Ajax.Request('/nomina_dev.php/asignarconceptoscategoria/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json); chk(id,codigo) }, parameters:'ajax=2&cod='+codigo});
}

function chk(id,codigo)
{
	var caja = $('varcontrol').value;
	
	if (caja=='-1')	
	{   		
	    if ($(id).checked==true)
		{
		alert('el titulo presupuestario '+codigo+' no existe en presupuesto');		
		$(id).click();
		}
	}
	
}
