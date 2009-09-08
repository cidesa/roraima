<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/12 18:40:52
?>
<?php echo form_tag('pretiptit/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fortiptit, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipos de Créditos Presupuestarios')?></legend>
<div class="form-row">
  <?php echo label_for('fortiptit[codtip]', __($labels['fortiptit{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fortiptit{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fortiptit{codtip}')): ?>
    <?php echo form_error('fortiptit{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fortiptit, 'getCodtip', array (
  'size' => 4,
  'maxlength' => 4,
  'readonly'  =>  $fortiptit->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('fortiptit_codtip').value=valor;",
  'control_name' => 'fortiptit[codtip]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fortiptit[destip]', __($labels['fortiptit{destip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fortiptit{destip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fortiptit{destip}')): ?>
    <?php echo form_error('fortiptit{destip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fortiptit, 'getDestip', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'fortiptit[destip]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fortiptit' => $fortiptit)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fortiptit->getId()): ?>
<?php echo button_to(__('delete'), 'pretiptit/delete?id='.$fortiptit->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
