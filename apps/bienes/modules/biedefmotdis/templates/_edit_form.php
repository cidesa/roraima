<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/02 20:16:02
?>
<?php echo form_tag('biedefmotdis/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bnmotdis, 'getId') ?>
<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend>Motivos</legend>
<div class="form-row">
  <?php echo label_for('bnmotdis[codmot]', __($labels['bnmotdis{codmot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnmotdis{codmot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnmotdis{codmot}')): ?>
    <?php echo form_error('bnmotdis{codmot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
    <?php $value = object_input_tag($bnmotdis, 'getCodmot', array (
  'size' => 4,
  'maxlength' => 4,
  'onBlur'  => $sf_user->getAttribute('corraut','','biedefmotdis')=='S' ? "javascript: valor=this.value; if($(this.id).value=='') $(this.id).value='####'; else { valor=valor.pad(4, '0',0);$(this.id).value=valor };$(this.id).disabled=false;" : "javascript: valor=this.value; valor=valor.pad(4, '0',0);$(this.id).value=valor ;$(this.id).disabled=false;",
  'readonly' => $bnmotdis->getId()!='' ? true : false ,
   'control_name' => 'bnmotdis[codmot]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bnmotdis[desmot]', __($labels['bnmotdis{desmot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnmotdis{desmot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnmotdis{desmot}')): ?>
    <?php echo form_error('bnmotdis{desmot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnmotdis, 'getDesmot', array (
  'size' => 80,
  'control_name' => 'bnmotdis[desmot]',
  'maxlength' => 250,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('bnmotdis' => $bnmotdis)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bnmotdis->getId()): ?>
<?php echo button_to(__('delete'), 'biedefmotdis/delete?id='.$bnmotdis->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
