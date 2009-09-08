<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/24 22:31:08
?>
<?php echo form_tag('fordefcatpre/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefcatpre, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend>Categoria Programatica</legend>
<div class="form-row">
  <?php echo label_for('fordefcatpre[codcat]', __($labels['fordefcatpre{codcat}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefcatpre{codcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefcatpre{codcat}')): ?>
    <?php echo form_error('fordefcatpre{codcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefcatpre, 'getCodcat', array (
  'size' => 20,
  'control_name' => 'fordefcatpre[codcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fordefcatpre[nomcat]', __($labels['fordefcatpre{nomcat}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefcatpre{nomcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefcatpre{nomcat}')): ?>
    <?php echo form_error('fordefcatpre{nomcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefcatpre, 'getNomcat', array (
  'size' => 80,
  'control_name' => 'fordefcatpre[nomcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
<table width="75%" border="0">
	<tr>
		<td>
		<fieldset id="sf_fieldset_none" class=""><legend>Objetivo General</legend>
		<div class="form-row"><?php $value = object_textarea_tag($fordefcatpre, 'getDescat', array (
			'size' => '80x5',
			'control_name' => 'fordefcatpre[descat]',
			)); echo $value ? $value : '&nbsp;' ?>
		</div>
		</fieldset>
		</td>
		<td>
		<fieldset id="sf_fieldset_none" class=""><legend>Objetivos Especificos</legend>
		<div class="form-row"><?php $value = object_textarea_tag($fordefcatpre, 'getObjesp', array (
			'size' => '80x5',
			'control_name' => 'fordefcatpre[objesp]',
			)); echo $value ? $value : '&nbsp;' ?>
		</div>
		</fieldset>
		</td>
	</tr>
	<tr>
		<td>
		<fieldset id="sf_fieldset_none" class=""><legend>Mision</legend>
		<div class="form-row"><?php $value = object_textarea_tag($fordefcatpre, 'getMision', array (
			'size' => '80x5',
			'control_name' => 'fordefcatpre[mision]',
			)); echo $value ? $value : '&nbsp;' ?>
		</div>
		</fieldset>
		</td>
		<td>
		<fieldset id="sf_fieldset_none" class=""><legend>Vision</legend>
		<div class="form-row"><?php $value = object_textarea_tag($fordefcatpre, 'getVision', array (
			'size' => '80x5',
			'control_name' => 'fordefcatpre[vision]',
			)); echo $value ? $value : '&nbsp;' ?>
		</div>
		</fieldset>
		</td>
	</tr>
</table>
</div>

<div class="form-row">
<?php echo label_for('fordefcatpre[coduni]', __($labels['fordefcatpre{coduni}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefcatpre{coduni}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefcatpre{coduni}')): ?>
  <?php echo form_error('fordefcatpre{coduni}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?> 
  
  <?php $value = object_input_tag($fordefcatpre, 'getCoduni', array (
  'size' => 20,
  'control_name' => 'fordefcatpre[coduni]',
  )); echo $value ? $value : '&nbsp;' ?> 
&nbsp; 
<?php echo button_to('...','#')?> &nbsp; &nbsp; 
<?php echo input_tag('unidad',$unidad,'size=25,disabled=true') ?>
</div>

</div>

</fieldset>

<?php include_partial('edit_actions', array('fordefcatpre' => $fordefcatpre)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fordefcatpre->getId()): ?>
<?php echo button_to(__('delete'), 'fordefcatpre/delete?id='.$fordefcatpre->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
