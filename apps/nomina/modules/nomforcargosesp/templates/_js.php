<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script language="JavaScript" type="text/javascript">
$('divgrid1').hide();
function mostrar(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colemp=col-5;
    var colcar=col-3;
    var colcad=col+1;
    var codemp=name+"_"+fil+"_"+colemp;
    var codcar=name+"_"+fil+"_"+colcar;
    var codcad=name+"_"+fil+"_"+colcad;

    if ($(codemp).value!="" && $(codcar).value!="")
    {
        var categoria=$('npcatnomemp_codcat').value;
        var nomina=$('npcatnomemp_codnom').value;
        var empleado=$(codemp).value;
        var cargo=$(codcar).value;
        var cadenacon=$(codcad).value;

        new Ajax.Updater('divgrid1', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&categoria='+categoria+'&fil='+fil+'&nomina='+nomina+'&cadenacon='+cadenacon+'&empleado='+empleado+'&cargo='+cargo})
    }    
}

function salvarmontos()
{
  var fil=0;
  var cadena='';
  var acummon=0;
  var totalfilas=obtener_filas_grid('b',1);
  while (fil<totalfilas)
  {
    var codcon="bx"+"_"+fil+"_1";
    var nomcon="bx"+"_"+fil+"_2";
    var moncon="bx"+"_"+fil+"_3";
    var num1=toFloat(moncon);

    if ($(codcon).value!="" && num1>=0) {
       acummon=acummon+num1;
      var cadena=cadena + $(codcon).value+'_' + $(nomcon).value+'_' + $(moncon).value + '!';
    }
    fil++;
  }

  var filas=$('npcatnomemp_fila').value;
  var infcon="ax"+"_"+filas+"_7";
  var monfor="ax"+"_"+filas+"_5";

  $(infcon).value=cadena;
  $(monfor).value=format(acummon.toFixed(2),'.',',','.');
  $('divgrid1').hide();
}
</script>