 function codigopadre(){

 var codigo=$('cideftit_codpre').value;

 if (codigo.length==2){
 	codigo=codigo+"-";
 }

  new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codigo='+codigo});

 }