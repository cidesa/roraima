<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/05 16:08:33
?>
<?php echo form_tag('oycdeftipval/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($octipval, 'getId') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('octipval[codtipval]', __($labels['octipval{codtipval}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipval{codtipval}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipval{codtipval}')): ?>
    <?php echo form_error('octipval{codtipval}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipval, 'getCodtipval', array (
  'size' => 2,
  'maxlength' => 2,
  'control_name' => 'octipval[codtipval]',
  'readonly'  =>  $octipval->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(2, '0',0);document.getElementById('octipval_codtipval').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('octipval[destipval]', __($labels['octipval{destipval}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipval{destipval}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipval{destipval}')): ?>
    <?php echo form_error('octipval{destipval}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipval, 'getDestipval', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'octipval[destipval]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('octipval[nomabr]', __($labels['octipval{nomabr}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('octipval{nomabr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipval{nomabr}')): ?>
    <?php echo form_error('octipval{nomabr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipval, 'getNomabr', array (
  'size' => 10,
  'maxlength' => 10,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('octipval_nomabr').value=cadena",
  'control_name' => 'octipval[nomabr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('octipval' => $octipval)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($octipval->getId()): ?>
<?php echo button_to(__('delete'), 'oycdeftipval/delete?id='.$octipval->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
