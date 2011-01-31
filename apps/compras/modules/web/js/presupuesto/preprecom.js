  function anular(){
	  if (confirm("Realmente desea Anular este Compromiso?")) {
	    var referencia=$('cpprecom_refprc').value;
	    var fecprc=$('cpprecom_fecprc').value;
	    var salcom=$('cpprecom_salcom').value;

    	new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&referencia='+referencia+'&fecprc='+fecprc+'&salcom='+salcom})
	   }
  }

  function abreAnular(referencia,fecprc) {
	window.open(getUrlModulo()+'anular?referencia='+referencia+'&fecprc='+fecprc,'...','menubar=no,toolbar=no,scrollbars=yes,width=680,height=550,resizable=yes,left=400,top=120');
  }

function rellenar() {
  if ($('cpprecom_refprc').value=='') {
    $('cpprecom_refprc').value='########';
  }else {
    $('cpprecom_refprc').value=$('cpprecom_refprc').value.pad(8,'0',0);
  }
}