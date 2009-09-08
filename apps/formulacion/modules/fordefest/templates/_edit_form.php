<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/13 10:37:24
?>
<?php echo form_tag('fordefest/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefest, 'getId') ?>
<?php use_helper('Javascript') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('Grid') ?>
<?php use_helper('Date') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>
<?php use_helper('SubmitClick') ?>
<?php use_helper('tabs') ?>
<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('fordefest[codest]', __($labels['fordefest{codest}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefest{codest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefest{codest}')): ?>
    <?php echo form_error('fordefest{codest}', array('class' => 'form-error-msg')) ?>
  <?php endif;
  ?>
  <?php $value = object_input_tag($fordefest, 'getCodest', array (
  'size' => 20,
  'control_name' => 'fordefest[codest]',
   'readonly' => true,
  'maxlength' => 4,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('fordefest_codest').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Haz Click Aqui para Obtener un Correlativo y Luego escribe la Descripción') ?></div>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fordefest[desest]', __($labels['fordefest{desest}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefest{desest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefest{desest}')): ?>
    <?php echo form_error('fordefest{desest}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefest, 'getDesest', array (
  'size' => 80,
  'maxlength' => 80,
  'control_name' => 'fordefest[desest]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fordefest' => $fordefest)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($fordefest->getId()): ?>
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
<?php endif; ?>
</li>
  </ul>
<script type="text/javascript">
  function eliminar()
  {
    var estado=$('fordefest_codest').value;
    var id=$('id').value;

    location.href='/formulacion_dev.php/fordefest/eliminar?estado='+estado+'&id='+id;
  }
 </script>
