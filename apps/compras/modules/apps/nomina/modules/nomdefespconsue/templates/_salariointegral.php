<?php
/*
 * Created on 22/05/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>

<?php echo grid_tag_V2($npasiconsue->getObj2()); ?>

<script language="JavaScript" type="text/javascript">
 function validargrid(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var descripcion=name+"_"+fila+"_"+coldes;

   if (concepto_repetido(id))
   {
	  alert('El concepto ya esta registrado con esta Nómina');
	  $(id).value="";
	  $(descripcion).value="";
	  $(id).focus();
	}
 }


 function concepto_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var colnom=col-2;

   var nom=name+"_"+fila+"_"+colnom;
   var nomina_concepto=$(nom).value+$(id).value;

   var conceptorepetido=false;
   if ($(nom).value!="" && $(id).value!=""){

   var am=totalregistros(name,1,50);
   var i=0;
   while (i<am)
   {
    var codigo=name+"_"+i+"_1";
    var concepto=name+"_"+i+"_3";

    var nomina_concepto2=$(codigo).value+$(concepto).value;

    if (i!=fila)
    {
      if (nomina_concepto==nomina_concepto2)
      {
        conceptorepetido=true;
        break;
      }
    }
   i++;
   }
   }
   return conceptorepetido;
 }


 function ajaxconcepto(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var colnom=col-2;
    var descripcion=name+"_"+fil+"_"+coldes;
    var nomina=name+"_"+fil+"_"+colnom;
    var nom=$(nomina).value;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
    if ($(id).value!='')
    {
      new Ajax.Request('/nomina_dev.php/nomdefespconsue/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validargrid(id); }, parameters:'ajax=3&cajtexmos='+descripcion+'&nomina='+nom+'&cajtexcom='+id+'&codigo='+cod})
    }
  }
 }
</script>
