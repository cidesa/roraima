<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 09:22:08
?>
<?php echo form_tag('nomdefaportes/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($nptipaportes, 'getId') ?>
<?php echo javascript_include_tag('dFilter','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php __('Datos del Tipo de Retenciones y Aportes') ?></legend>
<div class="form-row">
  <?php echo label_for('nptipaportes[codtipapo]', __($labels['nptipaportes{codtipapo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nptipaportes{codtipapo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipaportes{codtipapo}')): ?>
    <?php echo form_error('nptipaportes{codtipapo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($nptipaportes, 'getCodtipapo', array (
  'size' => 20,
  'control_name' => 'nptipaportes[codtipapo]',
  'maxlength' => 4,
  'readonly'  =>  $nptipaportes->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('nptipaportes_codtipapo').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('nptipaportes[destipapo]', __($labels['nptipaportes{destipapo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nptipaportes{destipapo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipaportes{destipapo}')): ?>
    <?php echo form_error('nptipaportes{destipapo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptipaportes, 'getDestipapo', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'nptipaportes[destipapo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('nptipaportes[porret]', __($labels['nptipaportes{porret}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nptipaportes{porret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipaportes{porret}')): ?>
    <?php echo form_error('nptipaportes{porret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptipaportes, array('getPorret',true), array (
  'size' => 7,
  'maxlength' => 10,
  'control_name' => 'nptipaportes[porret]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('nptipaportes[porapo]', __($labels['nptipaportes{porapo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nptipaportes{porapo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipaportes{porapo}')): ?>
    <?php echo form_error('nptipaportes{porapo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptipaportes, array('getPorapo',true), array (
  'size' => 7,
  'maxlength' => 10,
  'control_name' => 'nptipaportes[porapo]',
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('nptipaportes' => $nptipaportes)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($nptipaportes->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefaportes/delete?id='.$nptipaportes->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
