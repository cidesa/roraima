
<fieldset class="" id="sf_fieldset_none">
<h2>Monto a Pagar</h2>
<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<th>

    <?php echo label_for('fcpagos[montodeuda]', __('Monto de la Deuda'), 'class="required" ') ?>

	<?php $value = object_input_tag($fcpagos, array('getMontodeuda',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[montodeuda]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp; + &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[montomora]', __('Monto de Mora'), 'class="required" ') ?>

	<?php $value = object_input_tag($fcpagos, array('getMontomora',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[montomora]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>

<th><center> &nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[montodscprntopago]', __('Desc.Pronto Pago'), 'class="required" ') ?>

<?php $value = object_input_tag($fcpagos, 'getMontodscprntopago', array (
  'size' => 10,
  'control_name' => 'fcpagos[montodscprntopago]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

</th>


<th><center> &nbsp;&nbsp;&nbsp;&nbsp; = &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[saldo1]', __('Saldo'), 'class="required" ') ?>
	<?php echo input_tag('saldo1', '', 'size=12 disabled=true') ?>
</th>

</tr>

</table>
</div>
</fieldset>


<fieldset class="" id="sf_fieldset_none">
<h2>Diferencia</h2>
<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<th>
    <?php echo label_for('fcpagos[montodeuda2]', __('Monto de la Deuda'), 'class="required" ') ?>

	<?php $value = object_input_tag($fcpagos, array('getMontodeuda2',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[montodeuda2]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[montoautliq]', __('Monto Auto-Liquidacion'), 'class="required" ') ?>

<?php $value = object_input_tag($fcpagos, 'getMontoautliq', array (
  'size' => 10,
  'control_name' => 'fcpagos[montoautliq]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

</th>

<th><center> &nbsp;&nbsp;&nbsp;&nbsp; = &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[saldo2]', __('Saldo'), 'class="required" ') ?>
	<?php echo input_tag('saldo2', '', 'size=12 disabled=true') ?>
</th>

</tr>

</table>
</div>
</fieldset>


<fieldset class="" id="sf_fieldset_none">
<h2>Pagado Contribuyente</h2>
<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>

<th>
    <?php echo label_for('fcpagos[saldo3]', __('Monto'), 'class="required" ') ?>
	<?php echo input_tag('saldo3', '', 'size=12 disabled=true') ?>
</th>

</tr>
</table>
</div>
</fieldset>


<fieldset class="" id="sf_fieldset_none">
<h2>Saldo</h2>
<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>

<th>
    <?php echo label_for('fcpagos[saldo4]', __('Saldo'), 'class="required" ') ?>
	<?php echo input_tag('saldo4', '', 'size=12 disabled=true') ?>
</th>

</tr>
</table>
</div>
</fieldset>