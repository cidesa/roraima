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
<?php echo input_hidden_tag('elirs', '') ?>
<?php echo input_hidden_tag('msj', '') ?>
<?
  echo grid_tag($obj2);
?>
<br>
<?php echo label_for('',__('Total Factura') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totfac','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Exento') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totexen','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Bas Imp.') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totbas','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Impuesto') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totimp','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Iva Ret.') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totiva','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Bas Imp 1xMil') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totbasmil','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Monto 1xMil') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totmontmil','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Bas Imp ISLR') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totbasislr','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Monto ISLR') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totmontislr','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Bas Imp IRS') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totbasirs','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Monto IRS') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totmontirs','', 'size=15 class=grid_txtright readonly=true') ?>

<?php //echo input_hidden_tag('totfac', '') ?>
<?php //echo input_hidden_tag('totexen', '') ?>
<?php //echo input_hidden_tag('totbas', '') ?>
<?php //echo input_hidden_tag('totimp', '') ?>
<?php //echo input_hidden_tag('totiva', '') ?>
<?php //echo input_hidden_tag('totbasmil', '') ?>
<?php //echo input_hidden_tag('totbasislr', '') ?>
<?php //echo input_hidden_tag('totmontmil', '') ?>
<?php //echo input_hidden_tag('totmontislr', '') ?>
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
   	//actualizarsaldos_b();
        actualizarTotfac();
   	var am=totalregistros('ex',1,10);
    var cm=totalregistros('bx',2,150);
    if (cm==0)
    {
      $(totalfac).value=$('opordpag_monord').value;
    }
    else{
      var p=0;
      while(p<cm)
      {
      	var numfactu="bx_"+p+"_2";
      	$(numfactu).readOnly=true;
      	p++;
      }
    }
    var filas=parseInt($('numgridret').value);
   	var bm=totalregistros('dx',2,filas);
    if (($('id').value=="" && am==0 && cm==0) || ($('id').value!='' && bm==0))
    {
      var l=0;
      while(l<150)
      {
      	var basimp="bx_"+l+"_11";
		var moniva="bx_"+l+"_12";
      	var monret="bx_"+l+"_13";
      	var unomil="bx_"+l+"_14";
      	var basltf="bx_"+l+"_15";
      	var porltf="bx_"+l+"_16";
      	var monltf="bx_"+l+"_17";
      	var islr="bx_"+l+"_18";
      	var basislr="bx_"+l+"_19";
      	var monislr="bx_"+l+"_21";
      	var basirs="bx_"+l+"_25";
      	var monirs="bx_"+l+"_27";

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
      	$(basirs).readOnly=false;
      	$(monirs).readOnly=false;

      	l++;
      }
    }
}
</script>

