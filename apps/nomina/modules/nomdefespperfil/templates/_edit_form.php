<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/20 21:30:53
?>
<?php echo form_tag('nomdefespperfil/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npperfil, 'getId') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Perfil') ?></legend>
<div class="form-row">
  <?php echo label_for('npperfil[codperfil]', __($labels['npperfil{codperfil}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npperfil{codperfil}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npperfil{codperfil}')): ?>
    <?php echo form_error('npperfil{codperfil}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npperfil, 'getCodperfil', array (
  'size' => 20,
  'control_name' => 'npperfil[codperfil]',
  'maxlength' => 4,
  'readonly'  =>  $npperfil->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);$('npperfil_codperfil').value=valor",
 )); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npperfil[desperfil]', __($labels['npperfil{desperfil}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npperfil{desperfil}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npperfil{desperfil}')): ?>
    <?php echo form_error('npperfil{desperfil}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npperfil, 'getDesperfil', array (
  'size' => 80,
  'control_name' => 'npperfil[desperfil]',
  'maxlength' => 255,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('npperfil' => $npperfil)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npperfil->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefespperfil/delete?id='.$npperfil->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
