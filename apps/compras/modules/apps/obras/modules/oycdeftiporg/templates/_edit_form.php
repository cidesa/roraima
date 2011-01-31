<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/01 20:07:54
?>
<?php echo form_tag('oycdeftiporg/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($octiporg, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('octiporg[codtiporg]', __($labels['octiporg{codtiporg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octiporg{codtiporg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octiporg{codtiporg}')): ?>
    <?php echo form_error('octiporg{codtiporg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octiporg, 'getCodtiporg', array (
  'size' => 6,
  'maxlength' => 4,
  'control_name' => 'octiporg[codtiporg]',
  'readonly'  =>  $octiporg->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('octiporg_codtiporg').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
     </div>
<br>
  <?php echo label_for('octiporg[destiporg]', __($labels['octiporg{destiporg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octiporg{destiporg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octiporg{destiporg}')): ?>
    <?php echo form_error('octiporg{destiporg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octiporg, 'getDestiporg', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'octiporg[destiporg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('octiporg' => $octiporg)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($octiporg->getId()): ?>
<?php echo button_to(__('delete'), 'oycdeftiporg/delete?id='.$octiporg->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
