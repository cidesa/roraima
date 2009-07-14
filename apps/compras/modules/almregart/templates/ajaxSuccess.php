<?php
/*
 * Created on 20/11/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'Javascript', 'Grid', 'I18N') ?>

<div id="periodos">
<?
echo grid_tag($objAlmUbi);
?>


<?php echo input_hidden_tag('fila', '') ?>
<?php echo input_hidden_tag('totalubi', '') ?>

<div align="center">
<?php echo link_to_function(image_tag('/images/salir.gif'), "salvarmontos()") ?>
</div>
</div>
<script language="JavaScript" type="text/javascript">
actualizarsaldos_c(); distribuirExistencia();
</script>
