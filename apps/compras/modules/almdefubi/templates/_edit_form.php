<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/01 12:47:10
?>
<?php echo form_tag('almdefubi/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','Grid') ?>
<?php echo object_input_hidden_tag($cadefubi, 'getId') ?>
<?php echo javascript_include_tag('dFilter','observe') ?>
<?php echo javascript_include_tag('tools') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('cadefubi[codubi]', __($labels['cadefubi{codubi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefubi{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefubi{codubi}')): ?>
    <?php echo form_error('cadefubi{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($cadefubi, 'getCodubi', array (
  'size' => 20,
  'maxlength' => $longubi,
  'control_name' => 'cadefubi[codubi]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraubicacion')",
  'readonly'  =>  $cadefubi->getId()!='' ? true : false ,
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('cadefubi[nomubi]', __($labels['cadefubi{nomubi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cadefubi{nomubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cadefubi{nomubi}')): ?>
    <?php echo form_error('cadefubi{nomubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cadefubi, 'getNomubi', array (
  'size' => 80,
  'control_name' => 'cadefubi[nomubi]',
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>
<br>

<div id="divGrid">
<?php echo grid_tag($obj);?>
</div>
<?php include_partial('edit_actions', array('cadefubi' => $cadefubi)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($cadefubi->getId()): ?>
<?php echo button_to(__('delete'), 'almdefubi/delete?id='.$cadefubi->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
