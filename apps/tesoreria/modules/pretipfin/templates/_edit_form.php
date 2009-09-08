<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 18:34:15
?>
<?php echo form_tag('pretipfin/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fortipfin, 'getId') ?>

<?php echo javascript_include_tag('tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('fortipfin[codfin]', __($labels['fortipfin{codfin}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fortipfin{codfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fortipfin{codfin}')): ?>
    <?php echo form_error('fortipfin{codfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fortipfin, 'getCodfin', array (
  'size' => 20,
  'maxlength'=>4,
  'readonly'  =>  $fortipfin->getId()!='' ? true : false ,
  'control_name' => 'fortipfin[codfin]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);document.getElementById('fortipfin_codfin').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fortipfin[nomext]', __($labels['fortipfin{nomext}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fortipfin{nomext}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fortipfin{nomext}')): ?>
    <?php echo form_error('fortipfin{nomext}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fortipfin, 'getNomext', array (
  'size' => 80,
  'maxlength'=>80,
  'control_name' => 'fortipfin[nomext]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('fortipfin[nomabr]', __($labels['fortipfin{nomabr}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fortipfin{nomabr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fortipfin{nomabr}')): ?>
    <?php echo form_error('fortipfin{nomabr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fortipfin, 'getNomabr', array (
  'size' => 20,
  'maxlength' => 10,
  'control_name' => 'fortipfin[nomabr]',
  'onBlur' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('fortipfin_nomabr').value=cadena"
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fortipfin' => $fortipfin)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($fortipfin->getId()): ?>
<?php echo button_to(__('delete'), 'pretipfin/delete?id='.$fortipfin->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
