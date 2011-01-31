<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/10/29 11:16:35
?>
<?php echo form_tag('biedefubi/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','Catalogo') ?>
<?php echo javascript_include_tag('dFilter','tools','observe','ajax') ?>

<?php echo object_input_hidden_tag($bnubibie, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('bnubibie[codubi]', __($labels['bnubibie{codubi}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('bnubibie{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnubibie{codubi}')): ?>
    <?php echo form_error('bnubibie{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnubibie, 'getCodubi', array (
        'control_name' => 'bnubibie[codubi]',
        'maxlength' => $lonubi,
        'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$forubi')",
        'size'=> 32,
        'readonly' => $bnubibie->getId()!='' ? true : false ,
        'onBlur'=> remote_function(array(
          'url'      => 'biedefubi/ajax',
          'condition' => "$('bnubibie_codubi').value != '' && $('id').value == ''",
          'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=2&cajtexcom=bnubibie_codubi&codigo='+this.value",
)),
     )); echo $value ? $value : '&nbsp;' ?>

</div>
<br>
  <?php echo label_for('bnubibie[desubi]', __($labels['bnubibie{desubi}']),'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('bnubibie{desubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnubibie{desubi}')): ?>
    <?php echo form_error('bnubibie{desubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnubibie, 'getDesubi', array (
  'size' => 80,
  'control_name' => 'bnubibie[desubi]',
  'maxlength' => 250,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnubibie[dirubi]', __($labels['bnubibie{dirubi}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('bnubibie{dirubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnubibie{dirubi}')): ?>
    <?php echo form_error('bnubibie{dirubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnubibie, 'getDirubi', array (
  'size' => 80,
  'control_name' => 'bnubibie[dirubi]',
  'maxlength' => 500,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnubibie[codubiadm]', __($labels['bnubibie{codubiadm}']), 'class="required" Style="width:200px"') ?>
  <?php echo Catalogo($bnubibie,1,array(
  'getprincipal' => 'getCodubiadm',
  'getsecundario' => 'getDesubiadm',
  'campoprincipal' => 'codubiadm',
  'camposecundario' => 'desubiadm',
  'campobase' => 'id_codubiadm',
  ), 'Bnubica_Almordcom', 'Bnubica', ''); ?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('bnubibie' => $bnubibie)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bnubibie->getId()): ?>
<?php echo button_to(__('delete'), 'biedefubi/delete?id='.$bnubibie->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

