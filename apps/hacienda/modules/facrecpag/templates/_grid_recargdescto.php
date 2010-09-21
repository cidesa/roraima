<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _grid.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>

<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<th>
  <?php echo label_for('fcpagos[pagcon]', __('Pagado Constribuyente'), 'class="required" ') ?>
  <?php echo input_tag('fcpagos_pagcon', '', 'size=10 disabled=false onChange=Totales()') ?>
</th>
<th><strong>&nbsp;&nbsp;&nbsp;<?php echo '+' ?>&nbsp;&nbsp;&nbsp;</strong></th>
<th>
	<?php echo label_for('fcpagos[monrec]', __('Recargos'), 'class="required"') ?>
	<?php echo input_tag('fcpagos_recargo', '', 'size=10 disabled=true') ?>
</th>
<th><strong>&nbsp;&nbsp;&nbsp;<?php echo '-' ?>&nbsp;&nbsp;&nbsp;</strong</th>
<th>
	<?php echo label_for('fcpagos[pagdes]', __('Descuentos'), 'class="required"') ?>
	<?php echo input_tag('fcpagos_descuento', '', 'size=10 disabled=true') ?>
</th>
<th><strong>&nbsp;&nbsp;&nbsp;<?php echo '=' ?>&nbsp;&nbsp;&nbsp;</strong</th>
<th>
	<?php echo label_for('fcpagos[totpag]', __('Total a Pagar'), 'class="required"') ?>
	<?php echo input_tag('Totalpag', '', 'size=10 disabled=true') ?>
</th>
</tr>
</table>


</div>

<?
	echo grid_tag_v2($fcpagos->getGrid_recargdescto());
?>
