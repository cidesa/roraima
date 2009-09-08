<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/27 13:12:48
?>
<?php echo form_tag('fordefsubsubobj/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefsubsubobj, 'getId') ?>
<?php echo javascript_include_tag('tools') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Sub Sub Objetivo')?></legend>
<div class="form-row">
  <?php echo label_for('fordefsubsubobj[codequ]', __($labels['fordefsubsubobj{codequ}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefsubsubobj{codequ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefsubsubobj{codequ}')): ?>
    <?php echo form_error('fordefsubsubobj{codequ}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  
  <?php echo select_tag('fordefsubsubobj[codequ]', options_for_select($equilibrio,$fordefsubsubobj->getCodequ(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divSubObjetivo',//Div a Actualizar
		'url'      => 'fordefsubsubobj/combo?par=1',//Variable para el control de la accion(1)
		'with' => "'equilibrio='+this.value"//Valor de la variale de la caja de texto
  ))));?>
  </div>

<br>

  <?php echo label_for('fordefsubsubobj[codsubobj]', __($labels['fordefsubsubobj{codsubobj}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefsubsubobj{codsubobj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefsubsubobj{codsubobj}')): ?>
    <?php echo form_error('fordefsubsubobj{codsubobj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <div id="divSubObjetivo">
<?php echo select_tag('fordefsubsubobj[codsubobj]', options_for_select($subobjetivo,$fordefsubsubobj->getCodsubobj(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divOtro',//Div a Actualizar
		'url'      => 'fordefsubsubobj/combo?par=2',//Variable para el control de la accion(1)
		'with' => "'equilibrio='+document.getElementById('fordefsubsubobj_codequ').value+'&subobjetivo='+this.value"//Valor de la variale de la caja de texto
  ))));?></div>
  </div>

<br>

  <?php echo label_for('fordefsubsubobj[codsubsubobj]', __($labels['fordefsubsubobj{codsubsubobj}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefsubsubobj{codsubsubobj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefsubsubobj{codsubsubobj}')): ?>
    <?php echo form_error('fordefsubsubobj{codsubsubobj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefsubsubobj, 'getCodsubsubobj', array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'fordefsubsubobj[codsubsubobj]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '#',0);document.getElementById('fordefsubsubobj_codsubsubobj').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help">
<?php echo __('Haz Click Aqui para Obtener un Correlativo y Luego escribe la Descripción') ?></div>
    </div>

<br>

  <?php echo label_for('fordefsubsubobj[dessubsubobj]', __($labels['fordefsubsubobj{dessubsubobj}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefsubsubobj{dessubsubobj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefsubsubobj{dessubsubobj}')): ?>
    <?php echo form_error('fordefsubsubobj{dessubsubobj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefsubsubobj, 'getDessubsubobj', array (
  'size' => 80,
  'control_name' => 'fordefsubsubobj[dessubsubobj]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('fordefsubsubobj' => $fordefsubsubobj)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fordefsubsubobj->getId()): ?>
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>      
<?php endif; ?>
</li>
  </ul>
<script type="text/javascript">
  function eliminar()
  {
    var equ=$('fordefsubsubobj_codequ').value;
    var subobj=$('fordefsubsubobj_codsubobj').value;
    var subsubobj=$('fordefsubsubobj_codsubsubobj').value;
    var id=$('id').value;
    

    location.href='/formulacion_dev.php/fordefsubsubobj/eliminar?equ='+equ+'&subobj='+subobj+'&subsubobj='+subsubobj+'&id='+id;
  }
 </script>