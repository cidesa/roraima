<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<div style='width:450px; color: #c11b17; font-size: 14px; font-weight: bold ' >
	<strong>
		<?php echo __('LAS SIGUIENTES NOMINAS SE ESTAN EJECUTANDO')?>
	</strong>
</div>

<BR>
 <div id="grid1">

		<? //echo grid_tag($obj); ?>
		<?php echo grid_tag_v2($npnomina->getObjcalculo()); ?>
</div>
