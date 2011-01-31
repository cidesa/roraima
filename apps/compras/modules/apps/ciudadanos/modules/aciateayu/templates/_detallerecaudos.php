<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>

<div id='divrecaudos'>
<?php /*echo H::PrintR($atayudas->getObjrecaudos());*/ echo grid_tag_v2($atayudas->getObjrecaudos()); ?>
</div>