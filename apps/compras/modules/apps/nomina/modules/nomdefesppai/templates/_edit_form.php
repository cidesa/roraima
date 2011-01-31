<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 10:00:25
?>
<?php echo form_tag('nomdefesppai/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($nppais, 'getId') ?>
<?php echo javascript_include_tag('tools','dFilter','ajax') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Estado')?></legend>
<div class="form-row">
  <?php echo label_for('nppais[codpai]', __($labels['nppais{codpai}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppais{codpai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppais{codpai}')): ?>
    <?php echo form_error('nppais{codpai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($nppais, 'getCodpai', array (
  'size' => 20,
  'control_name' => 'nppais[codpai]',
  'maxlength' => 4,
  'readonly'  =>  $nppais->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('nppais_codpai').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('nppais[nompai]', __($labels['nppais{nompai}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nppais{nompai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nppais{nompai}')): ?>
    <?php echo form_error('nppais{nompai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php $value = object_input_tag($nppais, 'getNompai', array (
  'size' => 20,
  'maxlength' => 20,
  'control_name' => 'nppais[nompai]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('nppais' => $nppais)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($nppais->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefesppai/delete?id='.$nppais->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
