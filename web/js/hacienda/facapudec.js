function cargargrid()
{
	new Ajax.Updater('divGrid', '/hacienda_dev.php/facapudec/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+$('fcdeclar_numref').value+'&tipapu='+$('fcdeclar_tipapu').value+'&rifcon='+$('fcdeclar_rifcon').value});
	new Ajax.Updater('divGriddeuda', '/hacienda_dev.php/facapudec/grid', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&numref='+$('fcdeclar_numref').value});
}
