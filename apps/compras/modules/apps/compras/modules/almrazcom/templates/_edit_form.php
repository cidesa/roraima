<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/16 17:44:13
?>
<?php echo form_tag('almrazcom/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php use_helper('SubmitClick') ?>
<?php echo object_input_hidden_tag($carazcom, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('carazcom[codrazcom]', __($labels['carazcom{codrazcom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carazcom{codrazcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carazcom{codrazcom}')): ?>
    <?php echo form_error('carazcom{codrazcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carazcom, 'getCodrazcom', array (
  'size' => 5,
  'maxlength' => 4,
  'readonly'  =>  $carazcom->getId()!='' ? true : false ,
  'control_name' => 'carazcom[codrazcom]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('carazcom_codrazcom').value=valor;document.getElementById('carazcom_codrazcom').disabled=false;",
  )); echo $value ? $value : '&nbsp;' ?>
  </div>

<br>

  <?php echo label_for('carazcom[desrazcom]', __($labels['carazcom{desrazcom}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('carazcom{desrazcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carazcom{desrazcom}')): ?>
    <?php echo form_error('carazcom{desrazcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carazcom, 'getDesrazcom', array (
  'size' => 80,
  'maxlength' => 255,
  'control_name' => 'carazcom[desrazcom]',
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('carazcom' => $carazcom)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($carazcom->getId()): ?>
<?php echo button_to(__('delete'), 'almrazcom/delete?id='.$carazcom->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
