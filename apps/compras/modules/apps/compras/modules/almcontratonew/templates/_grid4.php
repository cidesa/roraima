<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?
	echo grid_tag_v2($caordcon->getObj4());
?>
<script type="text/javascript" language="Javascript">
function validarDisponibilidad(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   if (!validarnumero(id))
   {
     alert_('Monto Inv&aacute;lido');
     $(id).value="0,00";
   }else {
       var idcod=name+"_"+fil+"_1";
       var idcan=name+"_"+fil+"_3";
       var idmon=name+"_"+fil+"_4";
       var idtot=name+"_"+fil+"_5";

       var num1=toFloat(idcan);
       var num2=toFloat(idmon);

       var cal=num1*num2;
       $(idtot).value=format(cal.toFixed(2),'.',',','.');
       //ActualizarSaldosGrid("a",new Array("caordcon_moncon"));
       ActualizarSaldosGrid("a",ArrTotales_a);


       var montotal=$('caordcon_moncon').value;
       var codpre=$(idcod).value;
       var fecha=$('caordcon_feccon').value;

       new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&montotal='+montotal+'&codpre='+codpre+'&fecha='+fecha+'&idtot='+idtot+'&codigo='+id})

   }
}

function validarcodpresupuestariorepetido(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   if (codpre_repetido(id))
   {
      alert_('El C&oacute;digo Presupuestario esta repetido');
      $(id).value="";
      $(id).focus();
   }

}

 function codpre_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var compara=$(id).value;

   var codprerepetido=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var compara2=$(codigo).value;

    if (i!=fila)
    {
      if (compara==compara2)
      {
        codprerepetido=true;
        break;
      }
    }
   i++;
   }
   return codprerepetido;
 }

  function anular()
  {    
    var referencia=$('caordcon_numcon').value;
    var numcon=$('caordcon_numcon').value;
    var feccon=$('caordcon_feccon').value;

    window.open(getUrlModulo()+'anular?numcon='+numcon+'&referencia='+referencia+'&feccon='+feccon,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
    
  }
</script>