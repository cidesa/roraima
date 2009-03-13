<?php
/*
 * Created on 12/02/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<div id="divmunicipios">
<?php echo select_tag('atparroquias[atmunicipios_id]', options_for_select(Ciudadanos::getMunicipios($sf_request->getParameter('atparroquias[estados]','')),$atparroquias->getAtmunicipiosId()),array(
)); ?>
</div>
