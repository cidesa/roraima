<?php
$bandera1 = "style=\"display:none;\"";
$bandera2 = "style=\"display:none;\"";
if ($fcregveh->getId() != '') {
?>
<div>
<table>
<tr>
    <th>
		<ul  class="sf_admin_actions" >
			<input type="button" name="Submit1" value="Traspasar Vehiculo" class="sf_admin_action_save" onclick="$('negacion2').show();$('fcregveh_traspaso').value='S'" />
		</ul>
    </th>
    <th>
		<ul  class="sf_admin_actions" >
			<input type="button" name="Submit1" value="Desincorporar Vehiculo" class="sf_admin_action_delete" onclick="$('desincorporar').show();$('fcregveh_desincorporar').value='S'" />
		</ul>
    </th>
</tr>
</table>


<div id="negacion2" <?php echo $bandera1; ?>>
<br>

<!--input type="hidden" value="N" id="fcregveh_desincorporar" name="fcregveh[desincorporar]"/-->

<div id="divnumtras">
  <?php echo label_for('fcregveh[numtras]', __('Numero:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{numtras}')): ?> form-error<?php endif; ?>">

<?php if ($fcregveh->getNumtras()=='') { ?>
  <?php

	$value = object_input_tag($fcregveh, 'getNumtras', array (
		'size' => 10,
		'maxlength' => 10,
		'control_name' => 'fcregveh[numtras]',
		'onChange' => "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('fcregveh_numtras').value=valor;document.getElementById('fcregveh_numtras').disabled=false;"
		)
	);
	echo $value ? $value : '&nbsp;'
?>
<?php } else  { ?>
 <?php
 $value = object_input_tag($fcregveh, 'getNumtras', array (
		'size' => 10,
		'readonly' => true,
		'maxlength' => 10,
		'control_name' => 'fcregveh[numtras]',

	));
	echo $value ? $value : '&nbsp;'
?>
<?php }?>
<div class="sf_admin_edit_help"><?php echo __('Solo Numeros') ?></div>

  </div>
</div>
<br>

<div id="divfectra">
  <?php echo label_for('fcregveh[fectra]', __('Fecha:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{fectra}')): ?> form-error<?php endif; ?>">
  <?php
 $value = object_input_date_tag($fcregveh, 'getFectra', array (
		'rich' => true,
		'size' => 10,
		'maxlength' => 10,

		'calendar_button_img' => '/sf/sf_admin/images/date.png',
		'control_name' => 'fcregveh[fectra]',
		'date_format' => 'dd/MM/yyyy',
		'onkeyup' => "javascript: mascara(this,'/',patron,true)",
	), date('Y-m-d'));
	echo $value ? $value : '&nbsp;'
?>
  </div>
</div>
<br>

<div id="divfunrectra">
  <?php echo label_for('fcregveh[funrectra]', __('Funcionario:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{funrectra}')): ?> form-error<?php endif; ?>">
  <?php
 $value = object_input_tag($fcregveh, 'getFunrectra', array (
		'size' => 40,
		'readOnly'=> true,
		'control_name' => 'fcregveh[funrectra]',

	));
	echo $value ? $value : '&nbsp;'
?>
<div class="sf_admin_edit_help"><?php echo __('Solo Letras') ?></div>
  </div>
</div>
<br>

<br>

<fieldset class="" id="sf_fieldset_7___documentos">
<h2 >Nuevo Contribuyente</h2>
<div id="documentos" class="form-row">

<div id="divrifconant">

  <?php echo label_for('fcregveh[rifconant]', __('C.I./R.I.F.'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{rifconant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcregveh{rifconant}')): ?>
    <?php echo form_error('fcregveh{rifconant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


<?php $value = get_partial('rifconant', array('type' => 'edit', 'fcregveh' => $fcregveh,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>


</div>
<br>

</fieldset>


<fieldset class="" id="sf_fieldset_7___documentos">
<h2 >Nuevo Representante</h2>
<div id="documentos" class="form-row">

<div id="divtomo">
  <?php echo label_for('fcregveh[rifrepant]', __('C.I./R.I.F:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{rifrepant}')): ?> form-error<?php endif; ?>">
  <?php
 $value = object_input_tag($fcregveh, 'getRifrepant', array (
		'size' => 15,
		'control_name' => 'fcregveh[rifrepant]',

	));
	echo $value ? $value : '&nbsp;'
?>


  <?php
 $value = object_input_tag($fcregveh, 'getNomrepant', array (
		'size' => 40,
		'control_name' => 'fcregveh[nomrepant]',

	));
	echo $value ? $value : '&nbsp;'
?>
</div>
<br>

</fieldset>


<table>
<tr>
    <th>
		<ul  class="sf_admin_actions" >
			<input type="button" name="Submit1" value="Cancelar" class="sf_admin_action_cancel" onclick="$('negacion2').hide();$('fcregveh_traspaso').value='N';" />
		</ul>
    </th>
    <th>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
</tr>
</table>

</div>



<div id="desincorporar" <?php echo $bandera2; ?>>
<br>

<div id="divnumdes">
  <?php echo label_for('fcregveh[numdes]', __('Numero:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{numdes}')): ?> form-error<?php endif; ?>">

<?php if ($fcregveh->getNumdes()=='') { ?>
  <?php
 $value = object_input_tag($fcregveh, 'getNumdes', array (
		'size' => 10,
		'maxlength' => 10,
		'control_name' => 'fcregveh[numdes]',
		'onChange' => "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('fcregveh_numdes').value=valor;document.getElementById('fcregveh_numdes').disabled=false;",

	));
	echo $value ? $value : '&nbsp;'
?>
<?php } else  { ?>
 <?php
 $value = object_input_tag($fcregveh, 'getNumdes', array (
		'size' => 10,
		'readonly' => true,
		'maxlength' => 10,
		'control_name' => 'fcregveh[numdes]',

	));
	echo $value ? $value : '&nbsp;'
?>
<?php }?>
<div class="sf_admin_edit_help"><?php echo __('Solo Numeros') ?></div>

  </div>
</div>
<br>

<div id="divfundes">
  <?php echo label_for('fcregveh[fundes]', __('Funcionario:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{fundes}')): ?> form-error<?php endif; ?>">
  <?php
 $value = object_input_tag($fcregveh, 'getFundes', array (
		'size' => 40,
		'readonly' => true,
		'control_name' => 'fcregveh[fundes]',
	));
	echo $value ? $value : '&nbsp;'
?>

  </div>
</div>
<br>

<div id="divmotdes">
  <?php echo label_for('fcregveh[motdes]', __('Motivo:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{motdes}')): ?> form-error<?php endif; ?>">
  <?php
 $value = object_input_tag($fcregveh, 'getMotdes', array (
		'size' => 60,
		'control_name' => 'fcregveh[motdes]',

	));
	echo $value ? $value : '&nbsp;'
?>

  </div>
</div>
<br>

<table>
<tr>
    <th>
		<ul  class="sf_admin_actions" >
			<input type="button" name="Submit1" value="Cancelar" class="sf_admin_action_cancel" onclick="$('desincorporar').hide();$('fcregveh_desincorporar').value='N';" />
		</ul>
    </th>
    <th>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
</tr>
</table>

</div>

</div>
<?php }  ?>