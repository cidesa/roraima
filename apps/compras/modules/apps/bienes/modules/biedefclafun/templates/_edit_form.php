<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/02 18:03:56
?>
<?php echo form_tag('biedefclafun/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('tools','observe') ?>

<?php echo object_input_hidden_tag($bnclafun, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('bnclafun[codcla]', __($labels['bnclafun{codcla}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnclafun{codcla}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnclafun{codcla}')): ?>
    <?php echo form_error('bnclafun{codcla}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($bnclafun, 'getCodcla', array (
  'size' => 3,
  'maxlength' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('bnclafun_codcla').value=valor;document.getElementById('bnclafun_codcla').disabled=false;",
  'control_name' => 'bnclafun[codcla]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
<?php echo label_for('bnclafun[descla]', __($labels['bnclafun{descla}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnclafun{descla}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnclafun{descla}')): ?>
    <?php echo form_error('bnclafun{descla}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnclafun, 'getDescla', array (
  'size' => 80,
  'control_name' => 'bnclafun[descla]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('bnclafun' => $bnclafun)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bnclafun->getId()): ?>
<?php echo button_to(__('delete'), 'biedefclafun/delete?id='.$bnclafun->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
