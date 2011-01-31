<?php
	$bandera1="style=\"display:none;\"";
	$bandera2="";
	$bandera3="";
	if ($fcreginm->getId()!='')
	{
	?>


<div>
<table>
<tr>
    <th>
		<ul  class="sf_admin_actions" >
			<input type="button" name="Submit1" value="Traspasar Inmueble" class="sf_admin_action_save" onclick="$('negacion2').show();$('fcreginm_traspaso').value='S'" />
		</ul>
    </th>
</tr>
</table>


<div id="negacion2" <?php echo $bandera1; ?>>
<br>
<input type="hidden" disabled="disabled" value="N" id="fcreginm_traspaso" name="fcreginm[traspaso]"/>
<div id="divnumtras">
  <?php echo label_for('fcreginm[numtras]', __('Numero:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcreginm{numtras}')): ?> form-error<?php endif; ?>">
<?php if ($fcreginm->getNumtras()=='') { ?>
  <?php $value = object_input_tag($fcreginm, 'getNumtras', array (
  'size' => 10,
  'maxlength' => 10,
  'control_name' => 'fcreginm[numtras]',
  'onChange' => "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('fcreginm_numtras').value=valor;document.getElementById('fcreginm_numtras').disabled=false;",
  'onBlur'=> remote_function(array(
        'url'      => 'facpicsollic/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=5&numero='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
<?php } else  { ?>
 <?php $value = object_input_tag($fcreginm, 'getNumtras', array (
  'size' => 10,
  'readonly' => true,
  'maxlength' => 10,
  'control_name' => 'fcreginm[numtras]',
)); echo $value ? $value : '&nbsp;' ?>
<?php }?>
<div class="sf_admin_edit_help"><?php echo __('Solo Numeros') ?></div>

  </div>
</div>
<br>

<div id="divfectra">
  <?php echo label_for('fcreginm[fectra]', __('Fecha:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcreginm{fectra}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_date_tag($fcreginm, 'getFectra', array (
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcreginm[fectra]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

<div id="divfunrectra">
  <?php echo label_for('fcreginm[funrectra]', __('Funcionario:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcreginm{funrectra}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcreginm, 'getFunrectra', array (
  'size' => 40,
  'control_name' => 'fcreginm[funrectra]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Solo Letras') ?></div>
  </div>
</div>
<br>

<br>

<fieldset class="" id="sf_fieldset_7___documentos">
<h2 >Nuevo Contribuyente</h2>
<div id="documentos" class="form-row">

<div id="divrifconant">

  <?php echo label_for('fcreginm[rifconant]', __('C.I./R.I.F.'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcreginm{rifconant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcreginm{rifconant}')): ?>
    <?php echo form_error('fcreginm{rifconant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


<?php $value = get_partial('rifconant', array('type' => 'edit', 'fcreginm' => $fcreginm,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>


</div>
<br>

</fieldset>


<fieldset class="" id="sf_fieldset_7___documentos">
<h2 >Nuevo Representante</h2>
<div id="documentos" class="form-row">

<div id="divtomo">
  <?php echo label_for('fcreginm[rifrepant]', __('C.I./R.I.F:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcreginm{rifrepant}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcreginm, 'getRifrepant', array (
  'size' => 15,
  'control_name' => 'fcreginm[rifrepant]',
)); echo $value ? $value : '&nbsp;' ?>


  <?php $value = object_input_tag($fcreginm, 'getNomrepant', array (
  'size' => 40,
  'control_name' => 'fcreginm[nomrepant]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>

</fieldset>


<table>
<tr>
    <th>
		<ul  class="sf_admin_actions" >
			<input type="button" name="Submit1" value="Cancelar" class="sf_admin_action_cancel" onclick="$('negacion2').hide();$('fcreginm_traspaso').value='N';" />
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