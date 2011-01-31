<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/03/17 11:44:17
?>
<?php echo form_tag('fordefequ/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>


<?php if ($sf_flash->has('notice1')): ?>
<div class="form-errors">
<h2><?php echo __($sf_flash->get('notice1')) ?></h2>
</div>
<?php endif; ?>

<?php echo object_input_hidden_tag($fordefequ, 'getId') ?>
<?php echo javascript_include_tag('tools') ?>


<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos') ?></legend>

<div class="form-row">
  <?php echo label_for('fordefequ[codequ]', __($labels['fordefequ{codequ}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefequ{codequ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefequ{codequ}')): ?>
    <?php echo form_error('fordefequ{codequ}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefequ, 'getCodequ', array (
  'size' => 20,
  'maxlength' => 2,
  'readonly' => true,
  'control_name' => 'fordefequ[codequ]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(2, '#',0);document.getElementById('fordefequ_codequ').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help">
<?php echo __('Haz Click Aqui para Obtener un Correlativo y Luego escribe la Descripción') ?></div>
    </div>

<br>

  <?php echo label_for('fordefequ[desequ]', __($labels['fordefequ{desequ}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefequ{desequ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefequ{desequ}')): ?>
    <?php echo form_error('fordefequ{desequ}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefequ, 'getDesequ', array (
  'size' => 50,
  'maxlength' => 50,
  'control_name' => 'fordefequ[desequ]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<?php echo label_for('fordefequ[desobj]', __($labels['fordefequ{desobj}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('fordefequ{desobj}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefequ{desobj}')): ?>
    <?php echo form_error('fordefequ{desobj}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($fordefequ, 'getDesobj', array (
  'size' => '80x3',
  'maxlength' => 1000,
  'control_name' => 'fordefequ[desobj]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fordefequ' => $fordefequ)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fordefequ->getId()): ?>
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
<?php endif; ?>
</li>
  </ul>

<script type="text/javascript">
  function eliminar()
  {
    var equ=$('fordefequ_codequ').value;
    var id=$('id').value;

    location.href='/formulacion_dev.php/fordefequ/eliminar?equ='+equ+'&id='+id;
  }
 </script>
