<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/05 12:10:02
?>
<?php echo form_tag('oycdeftipste/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($octipste, 'getId') ?>
<?php use_helper('Javascript') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter','Linktoapp') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php use_helper('PopUp') ?>


<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('octipste[codste]', __($labels['octipste{codste}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipste{codste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipste{codste}')): ?>
    <?php echo form_error('octipste{codste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipste, 'getCodste', array (
  'size' => 4,
  'maxlength' => 4,
  'control_name' => 'octipste[codste]',
  'readonly'  =>  $octipste->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('octipste_codste').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('octipste[desste]', __($labels['octipste{desste}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipste{desste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipste{desste}')): ?>
    <?php echo form_error('octipste{desste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipste, 'getDesste', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'octipste[desste]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('octipste[tipste]', __($labels['octipste{tipste}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipste{tipste}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipste{tipste}')): ?>
    <?php echo form_error('octipste{tipste}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php	if($octipste->getTipste()=='P')
	{
		$val = true;
	}
	else
	{
		$val = false;
	}
	?>
	<?php echo "Personal ".radiobutton_tag('octipste[tipste]', 'P', $val) ?>
	&nbsp;
	<?php echo "Jurídico ".radiobutton_tag('octipste[tipste]', 'J', !$val) ?>
    </div>

</div>

</fieldset>

<?php include_partial('edit_actions', array('octipste' => $octipste)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($octipste->getId()): ?>
<?php echo button_to(__('delete'), 'oycdeftipste/delete?id='.$octipste->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
