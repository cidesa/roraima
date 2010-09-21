function cargargrid()
{
	new Ajax.Updater('divGrid', '/hacienda_dev.php/facespdec/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+$('fcdeclar_numref').value+'&tipesp='+$('fcdeclar_tipesp').value+'&rifcon='+$('fcdeclar_rifcon').value});
	new Ajax.Updater('divGriddeuda', '/hacienda_dev.php/facespdec/grid', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&numref='+$('fcdeclar_numref').value});
}

