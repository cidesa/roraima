<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/18 11:54:35
?>
<?php echo form_tag('fordeforgpub/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo object_input_hidden_tag($fordeforgpub, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Organismo') ?></legend>
<div class="form-row">
  <?php echo label_for('fordeforgpub[codorg]', __($labels['fordeforgpub{codorg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordeforgpub{codorg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordeforgpub{codorg}')): ?>
    <?php echo form_error('fordeforgpub{codorg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordeforgpub, 'getCodorg', array (
  'size' => 4,
  'maxlength' => 4,
  'readonly'  =>  $fordeforgpub->getId()!='' ? true : false ,
  'control_name' => 'fordeforgpub[codorg]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('fordeforgpub_codorg').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fordeforgpub[nomorg]', __($labels['fordeforgpub{nomorg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordeforgpub{nomorg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordeforgpub{nomorg}')): ?>
    <?php echo form_error('fordeforgpub{nomorg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordeforgpub, 'getNomorg', array (
  'size' => 80,
  'control_name' => 'fordeforgpub[nomorg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fordeforgpub[ubiorg]', __($labels['fordeforgpub{ubiorg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordeforgpub{ubiorg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordeforgpub{ubiorg}')): ?>
    <?php echo form_error('fordeforgpub{ubiorg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordeforgpub, 'getUbiorg', array (
  'size' => 80,
  'control_name' => 'fordeforgpub[ubiorg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fordeforgpub[tiporg]', __($labels['fordeforgpub{tiporg}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordeforgpub{tiporg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordeforgpub{tiporg}')): ?>
    <?php echo form_error('fordeforgpub{tiporg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordeforgpub, 'getTiporg', array (
  'size' => 80,
  'control_name' => 'fordeforgpub[tiporg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fordeforgpub[preanu]', __($labels['fordeforgpub{preanu}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordeforgpub{preanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordeforgpub{preanu}')): ?>
    <?php echo form_error('fordeforgpub{preanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordeforgpub, 'getPreanu', array (
  'size' => 15,
  'control_name' => 'fordeforgpub[preanu]',
  'onKeyPress' => "javascript:return entermontootro(event, this.id,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('fordeforgpub[capsoc]', __($labels['fordeforgpub{capsoc}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordeforgpub{capsoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordeforgpub{capsoc}')): ?>
    <?php echo form_error('fordeforgpub{capsoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordeforgpub, 'getCapsoc', array (
  'size' => 15,
  'control_name' => 'fordeforgpub[capsoc]',
  'onKeyPress' => "javascript:return entermontootro(event, this.id,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fordeforgpub' => $fordeforgpub)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($fordeforgpub->getId()): ?>
<?php echo button_to(__('delete'), 'fordeforgpub/delete?id='.$fordeforgpub->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
