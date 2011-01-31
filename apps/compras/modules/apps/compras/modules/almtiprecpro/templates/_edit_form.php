<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/11 15:33:56
?>
<?php echo form_tag('almtiprecpro/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('tools') ?>
<?php echo object_input_hidden_tag($catiprec, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Grupo de Recaudos')  ?></legend>
<div class="form-row">
  <?php echo label_for('catiprec[codtiprec]', __($labels['catiprec{codtiprec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catiprec{codtiprec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catiprec{codtiprec}')): ?>
    <?php echo form_error('catiprec{codtiprec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catiprec, 'getCodtiprec', array (
  'size' => 20,
  'maxlength' => 4,
  'readonly'  =>  $catiprec->getId()!='' ? true : false ,
  'control_name' => 'catiprec[codtiprec]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('catiprec_codtiprec').value=valor;",
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){ $('catiprec_destiprec').focus();}",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
<br>
  <?php echo label_for('catiprec[destiprec]', __($labels['catiprec{destiprec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catiprec{destiprec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catiprec{destiprec}')): ?>
    <?php echo form_error('catiprec{destiprec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($catiprec, 'getDestiprec', array (
  'size' => '80x5',
  'maxlength' => 100,
  'control_name' => 'catiprec[destiprec]',
  'onKeyUp'=>"javascript:cadena=this.value;cadena=cadena.toUpperCase();this.value=cadena;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<div id="id"  style="display:none"><?php echo input_tag('uno', '') ?></div>

<?php include_partial('edit_actions', array('catiprec' => $catiprec)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($catiprec->getId()): ?>
<?php echo button_to(__('delete'), 'almtiprecpro/delete?id='.$catiprec->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>