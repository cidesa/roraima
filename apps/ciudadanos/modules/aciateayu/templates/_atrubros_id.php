<?php
/*
 * Created on 12/02/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<div id="divrubros">
<?php echo select_tag('atayudas[atrubros_id]', options_for_select($atayudas->getRubros(),$atayudas->getAtrubrosId()),array(
'onchange' => "toAjaxUpdater('divrecaudos',1,getUrlModulo()+'ajax',this.value,'','')",
)); ?>
</div>
