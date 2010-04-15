<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/13 08:52:56
?>
<?php echo form_tag('fordefsubsec/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fordefsubsec, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Subsector')?></legend>
<div class="form-row">
  <?php echo label_for('fordefsubsec[codsec]', __($labels['fordefsubsec{codsec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefsubsec{codsec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefsubsec{codsec}')): ?>
    <?php echo form_error('fordefsubsec{codsec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('fordefsubsec[codsec]', objects_for_select(FordefsecPeer::doSelect(new Criteria()),'getCodsec','getNomsec',$fordefsubsec->getCodsec(),'include_custom=Seleccione')) ?>
     </div>

<br>

  <?php echo label_for('fordefsubsec[codsubsec]', __($labels['fordefsubsec{codsubsec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefsubsec{codsubsec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefsubsec{codsubsec}')): ?>
    <?php echo form_error('fordefsubsec{codsubsec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefsubsec, 'getCodsubsec', array (
  'size' => 20,
  'maxlegth' => 4,
  'readonly' => true,
  'control_name' => 'fordefsubsec[codsubsec]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(4, '#',0);document.getElementById('fordefsubsec_codsubsec').value=valor;",  
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Haz Click Aqui para Obtener un Correlativo y Luego escribe la Descripción') ?></div>
    </div>

<br>

  <?php echo label_for('fordefsubsec[nomsubsec]', __($labels['fordefsubsec{nomsubsec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fordefsubsec{nomsubsec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fordefsubsec{nomsubsec}')): ?>
    <?php echo form_error('fordefsubsec{nomsubsec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fordefsubsec, 'getNomsubsec', array (
  'size' => 80,
  'control_name' => 'fordefsubsec[nomsubsec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('fordefsubsec' => $fordefsubsec)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($fordefsubsec->getId()): ?>
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
<?php endif; ?>
</li>
  </ul>
<script type="text/javascript">
  function eliminar()
  {
    var sector=$('fordefsubsec_codsec').value;
    var subsector=$('fordefsubsec_codsubsec').value;
    var id=$('id').value;
    

    location.href='/formulacion_dev.php/fordefsubsec/eliminar?sector='+sector+'&subsector='+subsector+'&id='+id;
  }
 </script>