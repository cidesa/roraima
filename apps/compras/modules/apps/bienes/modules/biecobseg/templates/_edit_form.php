<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/02 16:29:22
?>
<?php echo form_tag('biecobseg/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bncobseg, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<?php echo javascript_include_tag('tools','observe') ?>


<div class="form-row">
  <?php echo label_for('bncobseg[codcob]', __($labels['bncobseg{codcob}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bncobseg{codcob}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bncobseg{codcob}')): ?>
    <?php echo form_error('bncobseg{codcob}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($bncobseg, 'getCodcob', array (
  'size' => 4,
  'maxlength' => 4,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('bncobseg_codcob').value=valor;document.getElementById('bncobseg_codcob').disabled=false;",
  'control_name' => 'bncobseg[codcob]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bncobseg[descob]', __($labels['bncobseg{descob}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bncobseg{descob}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bncobseg{descob}')): ?>
    <?php echo form_error('bncobseg{descob}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bncobseg, 'getDescob', array (
  'size' => 80,
  'control_name' => 'bncobseg[descob]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('bncobseg' => $bncobseg)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bncobseg->getId()): ?>
<?php echo button_to(__('delete'), 'biecobseg/delete?id='.$bncobseg->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
