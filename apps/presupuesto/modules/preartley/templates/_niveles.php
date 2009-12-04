<?php $cpdefapr = $params[0];?>
<? if ($cpdefapr) {?>
	<? if ($cpartley->getStacon()=='S') $var=true; else $var=false; ?>
	<?php echo checkbox_tag('cpartley[stacon]', 'S', $var) ?>
	<?php echo __('Nivel I ('); echo $cpdefapr->getStacon(); echo (')'); ?>

	<? if ($cpartley->getStagob()=='S') $var=true; else $var=false; ?>
	<?php echo checkbox_tag('cpartley[stagob]', 'S', $var) ?>
	<?php echo __('Nivel II ('); echo $cpdefapr->getStagob(); echo (')'); ?>

	<? if ($cpartley->getStapre()=='S') $var=true; else $var=false; ?>
	<?php echo checkbox_tag('cpartley[stapre]', 'S', $var) ?>
	<?php echo __('Nivel III ('); echo $cpdefapr->getStapre(); echo (')'); ?>

	<? if ($cpdefapr->getStaniv4()!='') {?>
		<? if ($cpartley->getStaniv4()=='S') $var=true; else $var=false; ?>
		<?php echo checkbox_tag('cpartley[staniv4]', 'S', $var) ?>
		<?php echo __('Nivel IV ('); echo $cpdefapr->getStaniv4(); echo (')'); ?>

		<? if ($cpartley->getStaniv5()=='S') $var=true; else $var=false; ?>
		<?php echo checkbox_tag('cpartley[staniv5]', 'S', $var) ?>
		<?php echo __('Nivel V ('); echo $cpdefapr->getStaniv5(); echo (')'); ?>

		<? if ($cpartley->getStaniv6()=='S') $var=true; else $var=false; ?>
		<?php echo checkbox_tag('cpartley[staniv6]', 'S', $var) ?>
		<?php echo __('Nivel VI ('); echo $cpdefapr->getStaniv6(); echo (')'); ?>
	<? } ?>
<? } else {?>
	<div class="form-error">
		<h3 align="center">NO SE HA DEFINIDO NINGUN NIVEL DE APROBACION</h3>
	</div>
<? } ?>

