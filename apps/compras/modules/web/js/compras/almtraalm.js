function ajaxdetalle(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=2;
    var coluni=3;
    var coldis=4;
    var colcantra=5;
    var descripcion=name+"_"+fil+"_"+coldes;
    var unidad=name+"_"+fil+"_"+coluni;
    var disponibilidad=name+"_"+fil+"_"+coldis;
    var transferir=name+"_"+fil+"_"+colcantra;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
    	new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&unidad='+unidad+'&dispon='+disponibilidad+'&cantransf='+transferir+'&almori='+$('catraalm_almori').value+'&ubiori='+$('catraalm_codubiori').value+'&codigo='+cod})
      }
    }
 }

function validarcantidad(e,id)
{
if (e.keyCode==13 || e.keyCode==9)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var colcandis=4;
  var colcantra=5;


  var cantransf=name+"_"+fil+"_"+colcantra;
  var candispon=name+"_"+fil+"_"+colcandis;

  var numcantransf=toFloat(cantransf);
  var numcandispon=toFloat(candispon);


   if (numcantransf>numcandispon)
   {
       alert("La cantidad a Transferir  no puede ser mayor a la Cantidad Disponible :"+document.getElementById(candispon).value);
       document.getElementById(cantransf).value=document.getElementById(candispon).value;
    }
    else
      entermonto(e,id);
}
}

function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('catraalm_codtra').value=valor;

 }
