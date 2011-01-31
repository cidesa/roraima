<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/23 17:23:52
?>
<?php echo form_tag('oycdeftipact/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','compras/almordcom','ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($octipact, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Tipo de Acta')?> </legend>
<div class="form-row">
  <?php echo label_for('octipact[codtipact]', __($labels['octipact{codtipact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipact{codtipact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipact{codtipact}')): ?>
    <?php echo form_error('octipact{codtipact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipact, 'getCodtipact', array (
  'size' => 5,
  'maxlength' => 4,
  'control_name' => 'octipact[codtipact]',
  'readonly'  =>  $octipact->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('octipact_codtipact').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Máximo 4 caracteres') ?></div>    </div>
<br>
  <?php echo label_for('octipact[destipact]', __($labels['octipact{destipact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipact{destipact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipact{destipact}')): ?>
    <?php echo form_error('octipact{destipact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipact, 'getDestipact', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'octipact[destipact]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('octipact' => $octipact)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($octipact->getId()): ?>
<?php echo button_to(__('delete'), 'oycdeftipact/delete?id='.$octipact->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
