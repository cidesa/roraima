<?php
// auto-generated by sfPropelAdmin
// date: 2007/03/21 09:48:16
?>
<?php echo form_tag('nomdefespvar/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npdefvar, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('npdefvar[codvar]', __($labels['npdefvar{codvar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefvar{codvar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefvar{codvar}')): ?>
    <?php echo form_error('npdefvar{codvar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefvar, 'getCodvar', array (
  'size' => 20,
  'control_name' => 'npdefvar[codvar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npdefvar[desvar]', __($labels['npdefvar{desvar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefvar{desvar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefvar{desvar}')): ?>
    <?php echo form_error('npdefvar{desvar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefvar, 'getDesvar', array (
  'size' => 30,
  'control_name' => 'npdefvar[desvar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<fieldset id="sf_fieldset_none" class="">
<legend>Tipo de Nomina</legend>
<div class="form-row">
  <?php echo label_for('npdefvar[codnom]', __($labels['npdefvar{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefvar{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefvar{codnom}')): ?>
    <?php echo form_error('npdefvar{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefvar, 'getCodnom', array (
  'size' => 20,
  'control_name' => 'npdefvar[codnom]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo button_to('...','#')?>
&nbsp;&nbsp;&nbsp;
<?php echo $tipo ?>
    </div>
    &nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend>Valores para la Variable</legend>
<div class="form-row">
  <?php echo label_for('npdefvar[valor1]', __($labels['npdefvar{valor1}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefvar{valor1}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefvar{valor1}')): ?>
    <?php echo form_error('npdefvar{valor1}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefvar, 'getValor1', array (
  'size' => 7,
  'control_name' => 'npdefvar[valor1]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
&nbsp;
&nbsp;
<strong>Valor No. 4</strong>
<?php $value = object_input_tag($npdefvar, 'getValor4', array (
  'size' => 7,
  'control_name' => 'npdefvar[valor4]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npdefvar[valor2]', __($labels['npdefvar{valor2}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefvar{valor2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefvar{valor2}')): ?>
    <?php echo form_error('npdefvar{valor2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefvar, 'getValor2', array (
  'size' => 7,
  'control_name' => 'npdefvar[valor2]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
&nbsp;
&nbsp;
<strong>Valor No. 5</strong>
<?php $value = object_input_tag($npdefvar, 'getValor5', array (
  'size' => 7,
  'control_name' => 'npdefvar[valor5]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npdefvar[valor3]', __($labels['npdefvar{valor3}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefvar{valor3}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefvar{valor3}')): ?>
    <?php echo form_error('npdefvar{valor3}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefvar, 'getValor3', array (
  'size' => 7,
  'control_name' => 'npdefvar[valor3]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
</fieldset>
<?php include_partial('edit_actions', array('npdefvar' => $npdefvar)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npdefvar->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefespvar/delete?id='.$npdefvar->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
