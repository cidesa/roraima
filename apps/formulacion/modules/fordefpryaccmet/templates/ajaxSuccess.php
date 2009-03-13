<?php
/*
 * Created on 20/11/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'Javascript', 'Grid', 'I18N') ?>
<div id="divGrid">
<div id="periodos">
<?
echo grid_tag($obj2);
?>

<br>
<?php echo input_hidden_tag('fila', '') ?>
<table>
 <tr>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('',__('Total') , 'class="required"') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo input_tag('total','0,00', 'size=15 class=grid_txtright readonly=true') ?>
</th>
 </tr>
</table>

<div align="center">
<?php echo link_to_function(image_tag('/images/salir.gif'), "salvarcantidades()") ?>
</div></div></div>