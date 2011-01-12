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
<?php echo select_tag('atciudadano[atmunicipios_id]', options_for_select($atciudadano->getMunicipios(),$atciudadano->getAtmunicipiosId()),array(
  'onchange' => "toAjaxUpdater('divparroquias',2,getUrlModulo()+'ajax',this.value,'','')",
)); ?>
</div>
