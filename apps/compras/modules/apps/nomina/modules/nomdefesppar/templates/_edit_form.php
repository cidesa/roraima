<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/13 16:52:28
?>
<?php echo form_tag('nomdefesppar/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($nptippar, 'getId') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipos de Parientes') ?></legend>
<div class="form-row">
  <?php echo label_for('nptippar[tippar]', __($labels['nptippar{tippar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nptippar{tippar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptippar{tippar}')): ?>
    <?php echo form_error('nptippar{tippar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptippar, 'getTippar', array (
  'size' => 10,
  'control_name' => 'nptippar[tippar]',
  'maxlength' => '3',
  'readonly'  =>  $nptippar->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);$('nptippar_tippar').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('nptippar[despar]', __($labels['nptippar{despar}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nptippar{despar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nptippar{despar}')): ?>
    <?php echo form_error('nptippar{tippar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nptippar, 'getDespar', array (
  'size' => 30,
  'maxlength' => '30',
  'control_name' => 'nptippar[despar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>


</div>
<div class="form-row" backgroundcolor="yellow">
    <p align=justify><strong><?php echo __('NOTA:'); ?></strong> <font color="#0000FF"> Los códigos "000" y "001" están reservados para diferenciar al Titular de los Familiares, Masculino y Femenino respectivamente.  Por lo tanto debe definir el código "000" como "TITULAR MASCULINO" y "001" como "TITULAR FEMENINO". Si utiliza estos códigos para definir otro tipo de parientes el Sistema NO realizará el calculo de Seguro HCM correctamente.
    </p>
    </div>

</fieldset>

<?php include_partial('edit_actions', array('nptippar' => $nptippar)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($nptippar->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefesppar/delete?id='.$nptippar->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>