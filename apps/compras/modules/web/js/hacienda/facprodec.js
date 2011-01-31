function cargargrid()
{
//	new Ajax.Updater('divGrid', '/hacienda_dev.php/facprodec/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+$('fcdeclar_numref').value+'&rifcon='+$('fcdeclar_rifcon').value+'&tippro='+$('fcdeclar_tippro').value});
	new Ajax.Updater('divGridDeuda', '/hacienda_dev.php/facprodec/grid', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codigo='+$('fcdeclar_numref').value+'&rifcon='+$('fcdeclar_rifcon').value+'&tippro='+$('fcdeclar_tippro').value+'&fecdec='+$('fcdeclar_fecdec').value});
}

