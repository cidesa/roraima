<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/05 11:46:12
?>
<?php echo form_tag('oycdeftipsol/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($octipsol, 'getId') ?>
<?php use_helper('Javascript','Linktoapp','tabs','PopUp') ?>
<?php echo javascript_include_tag('ajax','tools','dFilter','observe') ?>


<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('octipsol[codsol]', __($labels['octipsol{codsol}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipsol{codsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipsol{codsol}')): ?>
    <?php echo form_error('octipsol{codsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipsol, 'getCodsol', array (
  'size' => 4,
  'readonly'  =>  $octipsol->getId()!='' ? true : false ,
  'maxlength' => 4,
  'control_name' => 'octipsol[codsol]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('octipsol_codsol').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('octipsol[dessol]', __($labels['octipsol{dessol}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipsol{dessol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipsol{dessol}')): ?>
    <?php echo form_error('octipsol{dessol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipsol, 'getDessol', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'octipsol[dessol]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('octipsol[tipsol]', __($labels['octipsol{tipsol}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('octipsol{tipsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipsol{tipsol}')): ?>
    <?php echo form_error('octipsol{tipsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php	if($octipsol->getTipsol()=='S')
	{
		$val = true;
	}
	else
	{
		$val = false;
	}
	?>
	<?php echo "Servicio ".radiobutton_tag('octipsol[tipsol]', 'S', $val) ?>
	&nbsp;
	<?php echo "Obra ".radiobutton_tag('octipsol[tipsol]', 'O', !$val) ?>
    </div>
<br>
  <?php echo label_for('octipsol[maxdia]', __($labels['octipsol{maxdia}']), 'class="required" Style="width:350px"') ?>
  <div class="content<?php if ($sf_request->hasError('octipsol{maxdia}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('octipsol{maxdia}')): ?>
    <?php echo form_error('octipsol{maxdia}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($octipsol, 'getMaxdia', array (
  'size' => 5,
  'maxlength' => 4,
  'control_name' => 'octipsol[maxdia]',
)); echo $value ? $value : '&nbsp;' ?>
<?php echo '&nbsp;&nbsp;'.'días'?>
    </div>


</fieldset>

<?php include_partial('edit_actions', array('octipsol' => $octipsol)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($octipsol->getId()): ?>
<?php echo button_to(__('delete'), 'oycdeftipsol/delete?id='.$octipsol->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
