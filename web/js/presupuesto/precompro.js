function anular() {

	if (confirm("Realmente desea Anular este Compromiso?")) {
		var refcom=$('cpcompro_refcom').value;
	    var feccom=$('cpcompro_feccom').value;
    	var salcau=$('cpcompro_salcau').value;

    	new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&refcom='+refcom+'&feccom='+feccom+'&salcau='+salcau})
	}
}

function abrirAnular(refcom,feccom) {
	window.open(getUrlModulo()+'anular?refcom='+refcom+'&feccom='+feccom,'...','menubar=no,toolbar=no,scrollbars=yes,width=750,height=250,resizable=yes,left=400,top=120');
}

function rellenar() {
  if ($('cpcompro_refcom').value=='') {
    $('cpcompro_refcom').value='########';
  }else {
    $('cpcompro_refcom').value=$('cpcompro_refcom').value.pad(8,'0',0);
  }
}