<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/13 14:37:34
?>
<?php echo form_tag('fordefobjnvaeta/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefobjestnvaeta, 'getId') ?>

<?php use_helper('Javascript', 'Grid', 'PopUp', 'Linktoapp', 'SubmitClick') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools') ?>
<?php echo javascript_include_tag('observe') ?>


<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Objetivo Estrategico Nueva Etapa')?></legend>
<div class="form-row">
  <?php echo label_for('fordefobjestnvaeta[codobjnvaeta]', __($labels['fordefobjestnvaeta{codobjnvaeta}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefobjestnvaeta{codobjnvaeta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefobjestnvaeta{codobjnvaeta}')): ?>
    <?php echo form_error('fordefobjestnvaeta{codobjnvaeta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefobjestnvaeta, 'getCodobjnvaeta', array (
  'size' => 20,
  'readonly'  =>  $fordefobjestnvaeta->getId()!='' ? true : false ,
  'control_name' => 'fordefobjestnvaeta[codobjnvaeta]',
  'maxlength' => 3,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('fordefobjestnvaeta_codobjnvaeta').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fordefobjestnvaeta[desobjnvaeta]', __($labels['fordefobjestnvaeta{desobjnvaeta}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefobjestnvaeta{desobjnvaeta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefobjestnvaeta{desobjnvaeta}')): ?>
    <?php echo form_error('fordefobjestnvaeta{desobjnvaeta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefobjestnvaeta, 'getDesobjnvaeta', array (
  'size' => '80',
  'control_name' => 'fordefobjestnvaeta[desobjnvaeta]',
  'maxlength' => 250,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



</fieldset>

<?php include_partial('edit_actions', array('fordefobjestnvaeta' => $fordefobjestnvaeta)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fordefobjestnvaeta->getId()): ?>
<?php echo button_to(__('delete'), 'fordefobjnvaeta/delete?id='.$fordefobjestnvaeta->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
