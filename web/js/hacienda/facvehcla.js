 function codigopadre(){

 var codigo=$('fcusoveh_coduso').value;

  new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codigo='+codigo});

 }