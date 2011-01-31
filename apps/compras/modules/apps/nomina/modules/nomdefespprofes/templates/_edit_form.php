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
<?php echo form_tag('nomdefespprofes/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npprofesion, 'getId') ?>
<?php echo javascript_include_tag('tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Profesión') ?></legend>
<div class="form-row">
  <?php echo label_for('npprofesion[codprofes]', __($labels['npprofesion{codprofes}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npprofesion{codprofes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npprofesion{codprofes}')): ?>
    <?php echo form_error('npprofesion{codprofes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npprofesion, 'getCodprofes', array (
  'size' => 10,
  'control_name' => 'npprofesion[codprofes]',
  'maxlength' => 4,
  'readonly'  =>  $npprofesion->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);$('npprofesion_codprofes').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npprofesion[desprofes]', __($labels['npprofesion{desprofes}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npprofesion{desprofes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npprofesion{desprofes}')): ?>
    <?php echo form_error('npprofesion{desprofes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npprofesion, 'getDesprofes', array (
  'size' => 60,
  'maxlength' => 255,
  'control_name' => 'npprofesion[desprofes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

 <?  if ($npprofesion->getNivpro()=='P'){
  echo radiobutton_tag('npprofesion[nivpro]','P', true) .'&nbsp;&nbsp;'. "Profesional" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','T', false) .'&nbsp;&nbsp;'. "Técnico Superior Universitario" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','B', false) .'&nbsp;&nbsp;'. "Bachiller Técnico Medio" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','N', false) .'&nbsp;&nbsp;'. "Ninguno" .'&nbsp;&nbsp;&nbsp;&nbsp;';

}elseif ($npprofesion->getNivpro()=='T'){
  echo radiobutton_tag('npprofesion[nivpro]','P', false) .'&nbsp;&nbsp;'. "Profesional" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','T', true) .'&nbsp;&nbsp;'. "Técnico Superior Universitario" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','B', false) .'&nbsp;&nbsp;'. "Bachiller Técnico Medio" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','N', false) .'&nbsp;&nbsp;'. "Ninguno" .'&nbsp;&nbsp;&nbsp;&nbsp;';

}elseif ($npprofesion->getNivpro()=='B'){
  echo radiobutton_tag('npprofesion[nivpro]','P', false) .'&nbsp;&nbsp;'. "Profesional" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','T', false) .'&nbsp;&nbsp;'. "Técnico Superior Universitario" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','B', true) .'&nbsp;&nbsp;'. "Bachiller Técnico Medio" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','N', false) .'&nbsp;&nbsp;'. "Ninguno" .'&nbsp;&nbsp;&nbsp;&nbsp;';

}elseif($npprofesion->getNivpro()=='N'){
  echo radiobutton_tag('npprofesion[nivpro]','P', false) .'&nbsp;&nbsp;'. "Profesional" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','T', false) .'&nbsp;&nbsp;'. "Técnico Superior Universitario" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','B', false) .'&nbsp;&nbsp;'. "Bachiller Técnico Medio" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','N', true) .'&nbsp;&nbsp;'. "Ninguno" .'&nbsp;&nbsp;&nbsp;&nbsp;';
 }else{
  echo radiobutton_tag('npprofesion[nivpro]','P', false) .'&nbsp;&nbsp;'. "Profesional" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','T', false) .'&nbsp;&nbsp;'. "Técnico Superior Universitario" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','B', false) .'&nbsp;&nbsp;'. "Bachiller Técnico Medio" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npprofesion[nivpro]','N', false) .'&nbsp;&nbsp;'. "Ninguno" .'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('npprofesion' => $npprofesion)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npprofesion->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefespprofes/delete?id='.$npprofesion->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
