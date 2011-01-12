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
<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;"."<a href=\"javascript: var w = window.open('/ciudadanos'+getEnv()+'.php/acirubros/create','','dependent=1,toolbar=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=ancho,height=alto')\">Nuevo Rubro</a>" ?>
</div>
