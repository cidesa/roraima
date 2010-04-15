<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/13 16:10:19
?>
<?php echo form_tag('fordeftipcnx/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordeftipcnx, 'getId') ?>

<?php use_helper('Javascript', 'Grid', 'PopUp', 'Linktoapp', 'SubmitClick') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools') ?>
<?php echo javascript_include_tag('observe') ?>



<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Tipo de Contribución Conexión')?></legend>
<div class="form-row">
  <?php echo label_for('fordeftipcnx[codtipcnx]', __($labels['fordeftipcnx{codtipcnx}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordeftipcnx{codtipcnx}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordeftipcnx{codtipcnx}')): ?>
    <?php echo form_error('fordeftipcnx{codtipcnx}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordeftipcnx, 'getCodtipcnx', array (
  'size' => 3,
  'control_name' => 'fordeftipcnx[codtipcnx]',
  'maxlength' => 3,
  'readonly'  =>  $fordeftipcnx->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('fordeftipcnx_codtipcnx').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fordeftipcnx[destipcnx]', __($labels['fordeftipcnx{destipcnx}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordeftipcnx{destipcnx}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordeftipcnx{destipcnx}')): ?>
    <?php echo form_error('fordeftipcnx{destipcnx}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordeftipcnx, 'getDestipcnx', array (
  'size' => '80',
  'control_name' => 'fordeftipcnx[destipcnx]',
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fordeftipcnx' => $fordeftipcnx)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($fordeftipcnx->getId()): ?>
<?php echo button_to(__('delete'), 'fordeftipcnx/delete?id='.$fordeftipcnx->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
