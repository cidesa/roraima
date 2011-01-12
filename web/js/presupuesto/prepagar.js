function anular() {

	if (confirm("Realmente desea Anular este Compromiso?")) {
		var refpag=$('cppagos_refpag').value;
	    var fecpag=$('cppagos_fecpag').value;
    	//var salcau=$('cpcompro_salcau').value;

    	new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&refpag='+refpag+'&fecpag='+fecpag}) //+'&salcau='+salcau
	}
}

function abrirAnular(refpag,fecpag) {
	window.open(getUrlModulo()+'anular?refpag='+refpag+'&fecpag='+fecpag,'...','menubar=no,toolbar=no,scrollbars=yes,width=750,height=250,resizable=yes,left=400,top=120');
}

function rellenar() {
  if ($('cppagos_refpag').value=='') {
    $('cppagos_refpag').value='########';
  }else {
    $('cppagos_refpag').value=$('cppagos_refpag').value.pad(8,'0',0);
  }
}