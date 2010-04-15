<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/22 12:46:01
?>
<?php echo form_tag('nomdeftipgas/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($nptipgas, 'getId') ?>
<?php echo javascript_include_tag('tools') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Tipo de Gasto') ?></legend>
<div class="form-row">
  <?php echo label_for('nptipgas[codtipgas]', __($labels['nptipgas{codtipgas}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nptipgas{codtipgas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipgas{codtipgas}')): ?>
    <?php echo form_error('nptipgas{codtipgas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptipgas, 'getCodtipgas', array (
  'size' => 5,
  'maxlength' => 4,
  'control_name' => 'nptipgas[codtipgas]',
  'readonly'  =>  $nptipgas->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);$('nptipgas_codtipgas').value=valor",
 )); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('nptipgas[destipgas]', __($labels['nptipgas{destipgas}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nptipgas{destipgas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipgas{destipgas}')): ?>
    <?php echo form_error('nptipgas{destipgas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptipgas, 'getDestipgas', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'nptipgas[destipgas]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('nptipgas' => $nptipgas)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($nptipgas->getId()): ?>
<?php echo button_to(__('delete'), 'nomdeftipgas/delete?id='.$nptipgas->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
