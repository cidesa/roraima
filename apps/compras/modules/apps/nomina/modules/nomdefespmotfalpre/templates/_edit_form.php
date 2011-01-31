<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 13:10:48
?>
<?php echo form_tag('nomdefespmotfalpre/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npmotfal, 'getId') ?>
<?php echo javascript_include_tag('tools') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('npmotfal[codmotfal]', __($labels['npmotfal{codmotfal}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npmotfal{codmotfal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npmotfal{codmotfal}')): ?>
    <?php echo form_error('npmotfal{codmotfal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npmotfal, 'getCodmotfal', array (
  'size' => 5,
  'control_name' => 'npmotfal[codmotfal]',
  'maxlength' => 4,
  'readonly'  =>  $npmotfal->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '0',0);$('npmotfal_codmotfal').value=valor",
 )); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('npmotfal[desmotfal]', __($labels['npmotfal{desmotfal}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npmotfal{desmotfal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npmotfal{desmotfal}')): ?>
    <?php echo form_error('npmotfal{desmotfal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npmotfal, 'getDesmotfal', array (
  'size' => 20,
  'maxlength' => 250,
  'control_name' => 'npmotfal[desmotfal]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<div align="center">
<fieldset id="sf_fieldset_none" class="">
<legend> <?php echo __('Causa') ?> </legend>
<div class="form-row">
<?  if ($npmotfal->getCausa()=='J'){
	echo radiobutton_tag('npmotfal[causa]','J', true) .'&nbsp;&nbsp;'. "Justificada"."&nbsp;&nbsp";
	echo radiobutton_tag('npmotfal[causa]','I', false) .'&nbsp;&nbsp;'. "Injustificada"."&nbsp;&nbsp";

}elseif ($npmotfal->getCausa()=='I'){
	echo radiobutton_tag('npmotfal[causa]','J', false) .'&nbsp;&nbsp;'. "Justificada"."&nbsp;&nbsp";
	echo radiobutton_tag('npmotfal[causa]','I', true) .'&nbsp;&nbsp;'. "Injustificada"."&nbsp;&nbsp";

}else{
	echo radiobutton_tag('npmotfal[causa]','J', false) .'&nbsp;&nbsp;'. "Justificada"."&nbsp;&nbsp";
	echo radiobutton_tag('npmotfal[causa]','I', false) .'&nbsp;&nbsp;'. "Injustificada"."&nbsp;&nbsp";

}
?></div></fieldset>
</div>

<br>
  <?php echo label_for('npmotfal[esremun]', __($labels['npmotfal{esremun}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npmotfal{esremun}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npmotfal{esremun}')): ?>
    <?php echo form_error('npmotfal{esremun}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($npmotfal, 'getEsremun', array (
  'control_name' => 'npmotfal[esremun]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('npmotfal' => $npmotfal)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npmotfal->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefespmotfalpre/delete?id='.$npmotfal->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
