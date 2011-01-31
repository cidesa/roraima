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
    <?php echo label_for('fcpagos[monpag]', __('Total a Pagar'), 'class="required" ') ?>

	<?php $value = object_input_tag($fcpagos, array('getMonpag',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[monpag]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[totalmonto1]', __('Total Monto'), 'class="required" ') ?>

<?php $value = object_input_tag($fcpagos, 'getTotalmon', array (
  'size' => 10,
  'control_name' => 'fcpagos[totalmon]',
)); echo $value ? $value : '&nbsp;' ?>

</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp; = &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[saldo]', __('Saldo'), 'class="required" ') ?>
	<?php echo input_tag('saldo', '', 'size=12 disabled=true') ?>
</th>

</tr>

</table>
</div>


<?
	echo grid_tag_v2($fcpagos->getGrid_formpag());
?>


<script language="JavaScript" type="text/javascript">
//alert('555');
        Event.observe(window, "load",
          function() {
            	Totales();
            	//ActualizarSaldosGrid("a",ArrTotales_a);
          }
        );

</script>

