 function cargarasignacion(){

 var monto=$('ciasiini_monasi').value;

 new Ajax.Updater('gridasignacion', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&monto='+monto});


 }