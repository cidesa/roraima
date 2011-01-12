<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?
	echo grid_tag_v2($casalalm->getObj());
?>
<script type="text/javascript">
  var id='<?php echo $casalalm->getId()?>';
  if (id=='')
  {
	var manesolcorr='<?php echo $casalalm->getMansolocor(); ?>';
     if (manesolcorr=='S')
     {
        $('casalalm_codsal').value='########';
     	$('casalalm_codsal').readOnly=true;
        $('casalalm_codpro').focus();
     }
  }

  var deshab='<?php echo  $casalalm->getBloqfec(); ?>';
  if (deshab=='S')
  {
  	$('trigger_casalalm_fecsal').hide();
  	$('casalalm_fecsal').readOnly=true;
  }
function canttotal(e,id)
{
    if (e.keyCode==13)
    {
        var aux = id.split("_");
        var name=aux[0];
        var fil=aux[1];
        var col=parseInt(aux[2]);


        var cantidad=name+"_"+fil+"_3";
        var costo=name+"_"+fil+"_4";
        var total=name+"_"+fil+"_5";

        var num1=toFloat(cantidad);
        var num2=toFloat(costo);

         costototal=num1*num2;

         document.getElementById(total).value=format(costototal.toFixed(2),'.',',','.');
    }
}

 function ejecutaajax(e,id)
 {
    if (e.keyCode==13 || e.keyCode==9)
    {
        var aux = id.split("_");
	    var name=aux[0];
	    var fil=parseInt(aux[1]);
	    var col=parseInt(aux[2]);

	  	var coldes=col+1;
    	var descripcion=name+"_"+fil+"_"+coldes;

	    var colalm=col-2;
	    var codalm=name+"_"+fil+"_"+colalm;
	    var valcodalm=$(codalm).value;
	    var cod=$(id).value;

        if ($(id).value!="")
      	{
    		new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&cajtexmos='+descripcion+'&cajtexcom='+id+'&codalm='+valcodalm+'&codigo='+cod})
    	}
    }
 }

 function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('casalalm_codsal').value=valor;
 }
</script>