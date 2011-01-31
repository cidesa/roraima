<?php
/*
 * Created on 12/02/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<div id="divmunicipio">
<?php echo select_tag('inparroquia[inmunicipio_id]', options_for_select($inparroquia->getMunicipio(),$inparroquia->getInmunicipioId()),array(
)); ?>
</div>