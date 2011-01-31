  function anular(){
	  if (confirm("Realmente desea Anular este Compromiso?")) {
	    var referencia=$('cpcausad_refcau').value;
	    var feccau=$('cpcausad_feccau').value;
	    var totpag=$('cpcausad_totpag').value;
    	new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&referencia='+referencia+'&feccau='+feccau+'&totpag='+totpag})
	   }
  }

  function abreAnular(referencia,feccau) {
	window.open(getUrlModulo()+'anular?referencia='+referencia+'&feccau='+feccau,'...','menubar=no,toolbar=no,scrollbars=yes,width=680,height=550,resizable=yes,left=400,top=120');
  }

function rellenar() {
  if ($('cpcausad_refcau').value=='') {
    $('cpcausad_refcau').value='########';
  }else {
    $('cpcausad_refcau').value=$('cpcausad_refcau').value.pad(8,'0',0);
  }
}