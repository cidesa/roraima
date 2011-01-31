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
<?php echo select_tag('inprofes[inmunicipio_id]', options_for_select($inprofes->getMunicipio(),$inprofes->getInmunicipioId()),array(
  'onchange' => "toAjaxUpdater('divparroquia',2,getUrlModulo()+'ajax',this.value,'','')",
)); ?>
</div>
