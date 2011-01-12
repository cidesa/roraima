function cargargrid()
{
	new Ajax.Updater('divGrid', '/hacienda.php/facvehdec/grid', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+$('fcdeclar_plaveh').value});
//	new Ajax.Updater('divGridDeuda', '/hacienda.php/facvehdec/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&tipnom='+tipnom+'&fecha='+fecha+'&gasto='+gasto+'&divu=2&referencias='+referencias+'&nomespecial='+nomespecial+'&codnomesp='+codnomesp+'&banco='+banco});
}

