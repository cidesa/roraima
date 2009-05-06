<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>

<?php echo "<a href=\"javascript: var w = window.open('/ciudadanos'+getEnv()+'.php/acidonaciones/create','','dependent=1,toolbar=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=ancho,height=alto')\">Nuevo Articulo a donar</a>" ?>

<?php echo grid_tag_v2($atayudas->getObjitems()); ?>