<?php
/*
 * Created on 26/09/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'Javascript', 'Grid', 'I18N', 'PopUp') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>
<?php if ($div=='Fac') {?>
<?php echo input_hidden_tag('eliva', '') ?>
<?php echo input_hidden_tag('elislr', '') ?>
<?php echo input_hidden_tag('eltimbre', '') ?>
<?php echo input_hidden_tag('msj', '') ?>
<?
  echo grid_tag($obj2);
?>
<?php echo input_hidden_tag('totfac', '') ?>
<?php echo input_hidden_tag('totexen', '') ?>
<?php echo input_hidden_tag('totbas', '') ?>
<?php echo input_hidden_tag('totimp', '') ?>
<?php echo input_hidden_tag('totiva', '') ?>
<?php echo input_hidden_tag('totbasmil', '') ?>
<?php echo input_hidden_tag('totbasislr', '') ?>
<?php echo input_hidden_tag('totmontmil', '') ?>
<?php echo input_hidden_tag('totmontislr', '') ?>
<? }?>
<script language="JavaScript" type="text/javascript">
if ($('msj').value!="")
{
 alert($('msj').value);
}
else
{
	$('divFac').show();
	$('botonfac').hide();
	var totalfac="bx"+"_0_9";
   	actualizarsaldos_b();
   	var am=totalregistros('ex',1,10);
    var cm=totalregistros('bx',2,30);
    if (cm==0)
    {
      $(totalfac).value=$('opordpag_monord').value;
    }
    var filas=parseInt($('numgridret').value);
   	var bm=totalregistros('dx',2,filas);
    if (($('id').value=="" && am==0 && cm==0) || ($('id').value!='' && bm==0))
    {
      var l=0;
      while(l<30)
      {
      	var basimp="bx_"+l+"_11";
      	var monret="bx_"+l+"_12";
      	var moniva="bx_"+l+"_13";
      	var unomil="bx_"+l+"_14";
      	var basltf="bx_"+l+"_15";
      	var porltf="bx_"+l+"_16";
      	var monltf="bx_"+l+"_17";
      	var islr="bx_"+l+"_18";
      	var basislr="bx_"+l+"_19";
      	var monislr="bx_"+l+"_21";

      	$(basimp).readOnly=false;
      	$(monret).readOnly=false;
      	$(moniva).readOnly=false;
      	$(unomil).disabled=true;
      	$(basltf).readOnly=false;
      	$(porltf).readOnly=false;
      	$(monltf).readOnly=false;
      	$(islr).disabled=true;
      	$(basislr).readOnly=false;
      	$(monislr).readOnly=false;

      	l++;
      }
    }
}
</script>

