<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/13 16:01:24
?>
<?php echo form_tag('fordefmun/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefmun, 'getId') ?>



<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Municipio')?></legend>
<div class="form-row">
  <?php echo label_for('fordefmun[codest]', __($labels['fordefmun{codest}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefmun{codest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefmun{codest}')): ?>
    <?php echo form_error('fordefmun{codest}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('fordefmun[codest]', objects_for_select(FordefestPeer::doSelect(new Criteria()),'getCodest','getDesest',$fordefmun->getCodest(),'include_custom=Seleccione')) ?>
     </div>

<br>


  <?php echo label_for('fordefmun[codmun]', __($labels['fordefmun{codmun}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefmun{codmun}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefmun{codmun}')): ?>
    <?php echo form_error('fordefmun{codmun}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefmun, 'getCodmun', array (
  'size' => 20,
  'control_name' => 'fordefmun[codmun]',
  'maxlength' => 4,
  'readonly'=>true,
  'onBlur'=> "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('fordefmun_codmun').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Haz Click Aqui para Obtener un Correlativo y Luego escribe la Descripción') ?></div>
    </div>

<br>
  <?php echo label_for('fordefmun[desmun]', __($labels['fordefmun{desmun}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefmun{desmun}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefmun{desmun}')): ?>
    <?php echo form_error('fordefmun{desmun}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefmun, 'getDesmun', array (
  'size' => 80,
  'maxlength'=>80,
  'control_name' => 'fordefmun[desmun]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</fieldset>

<?php include_partial('edit_actions', array('fordefmun' => $fordefmun)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fordefmun->getId()): ?>
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
<?php endif; ?>
</li>
  </ul>
<script type="text/javascript">
  function eliminar()
  {
    var estado=$('fordefmun_codest').value;
    var municipio=$('fordefmun_codmun').value;
    var id=$('id').value;


    location.href='/formulacion_dev.php/fordefmun/eliminar?estado='+estado+'&municipio='+municipio+'&id='+id;
  }
 </script>