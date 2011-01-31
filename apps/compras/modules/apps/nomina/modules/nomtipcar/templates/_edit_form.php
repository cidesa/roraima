<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/23 18:56:34
?>
<?php echo form_tag('nomtipcar/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($nptipcar, 'getId') ?>
<?php echo javascript_include_tag('tools') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('nptipcar[codtipcar]', __($labels['nptipcar{codtipcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nptipcar{codtipcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipcar{codtipcar}')): ?>
    <?php echo form_error('nptipcar{codtipcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptipcar, 'getCodtipcar', array (
  'size' => 5,
  'control_name' => 'nptipcar[codtipcar]',
  'maxlength' => '3,',
  'readonly' => $nuevo,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);$('nptipcar_codtipcar').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('nptipcar[destipcar]', __($labels['nptipcar{destipcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nptipcar{destipcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptipcar{destipcar}')): ?>
    <?php echo form_error('nptipcar{destipcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptipcar, 'getDestipcar', array (
  'size' => 80,
  'control_name' => 'nptipcar[destipcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('nptipcar' => $nptipcar)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($nptipcar->getId()): ?>
<?php echo button_to(__('delete'), 'nomtipcar/delete?id='.$nptipcar->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
