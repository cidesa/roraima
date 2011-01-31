<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/03/17 17:12:07
?>
<?php echo form_tag('fordefsubobj/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('tools') ?>

<?php echo object_input_hidden_tag($fordefsubobj, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos')?></legend>
<div class="form-row"><?php echo label_for('fordefsubobj[codequ]', __($labels['fordefsubobj{codequ}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('fordefsubobj{codequ}')): ?> form-error<?php endif; ?>">
	<?php if ($sf_request->hasError('fordefsubobj{codequ}')): ?> <?php echo form_error('fordefsubobj{codequ}', array('class' => 'form-error-msg')) ?>
	<?php endif; ?> <?php echo select_tag('fordefsubobj[codequ]', objects_for_select(FordefequPeer::doSelect(new Criteria()),'getCodequ','getDesequ',$fordefsubobj->getCodequ(),'include_custom=Seleccione')) ?>
	</div>

<br>

<?php echo label_for('fordefsubobj[codsubobj]', __($labels['fordefsubobj{codsubobj}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('fordefsubobj{codsubobj}')): ?> form-error<?php endif; ?>">
	<?php if ($sf_request->hasError('fordefsubobj{codsubobj}')): ?> <?php echo form_error('fordefsubobj{codsubobj}', array('class' => 'form-error-msg')) ?>
	<?php endif; ?> 
	
	
	<?php $value = object_input_tag($fordefsubobj, 'getCodsubobj', array (
	'size' => 5,
	'maxlegth' => 4,
	'readonly' => true,
	'control_name' => 'fordefsubobj[codsubobj]',
	 'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '#',0);document.getElementById('fordefsubobj_codsubobj').value=valor;",
	)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Haz Click Aqui para Obtener un Correlativo y Luego escribe la Descripción') ?></div>
</div>

<br>

  <?php echo label_for('fordefsubobj[dessubobj]', __($labels['fordefsubobj{dessubobj}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefsubobj{dessubobj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefsubobj{dessubobj}')): ?>
    <?php echo form_error('fordefsubobj{dessubobj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefsubobj, 'getDessubobj', array (
  'size' => 80,
  'control_name' => 'fordefsubobj[dessubobj]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 1000 caracteres') ?></div>
</div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('fordefsubobj' => $fordefsubobj)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fordefsubobj->getId()): ?>
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
<?php endif; ?>  
</li>
  </ul>
<script type="text/javascript">
  function eliminar()
  {
    var equ=$('fordefsubobj_codequ').value;
    var subobj=$('fordefsubobj_codsubobj').value;
    var id=$('id').value;
    

    location.href='/formulacion_dev.php/fordefsubobj/eliminar?equ='+equ+'&subobj='+subobj+'&id='+id;
  }
 </script>