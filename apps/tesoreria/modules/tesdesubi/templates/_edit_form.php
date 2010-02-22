<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 17:11:15
?>
<?php echo form_tag('tesdesubi/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bnubica, 'getId') ?>
<?php echo javascript_include_tag('tools', 'observe', 'dFilter') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Ubicación')?></legend>
<div class="form-row">
  <?php echo label_for('bnubica[codubi]', __($labels['bnubica{codubi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnubica{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnubica{codubi}')): ?>
    <?php echo form_error('bnubica{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnubica, 'getCodubi', array (
  'size' => 15,
  'maxlength' => $lonubi,
  'control_name' => 'bnubica[codubi]',
  'readonly'  =>  $bnubica->getId()!='' ? true : false ,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('bnubica[desubi]', __($labels['bnubica{desubi}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnubica{desubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnubica{desubi}')): ?>
    <?php echo form_error('bnubica{desubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php $value = object_input_tag($bnubica, 'getDesubi', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'bnubica[desubi]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('bnubica' => $bnubica)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($bnubica->getId()): ?>
<?php echo button_to(__('delete'), 'tesdesubi/delete?id='.$bnubica->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
