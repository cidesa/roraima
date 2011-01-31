<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/08 14:14:21
?>
<?php echo form_tag('npcomocp/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>
<?php echo object_input_hidden_tag($npcomocp, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">


<div class="form-row">
  <?php echo label_for('npcomocp[codtipcar]', __($labels['npcomocp{codtipcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcomocp{codtipcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcomocp{codtipcar}')): ?>
    <?php echo form_error('npcomocp{codtipcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npcomocp, 'getCodtipcar', array (
  'size' => 20,
  'control_name' => 'npcomocp[codtipcar]',
  'maxlength' => 10,
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'url'      => 'npcomocp/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=npcomocp_codtipcar&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nptipcar_Nnpcomocp/clase/Nptipcar/frame/sf_admin_edit_form/obj1/npcomocp_codtipcar/obj2/npcomocp_destipcar/campo1/codtipcar/campo2/destipcar/param1/')?>
&nbsp;
  <?php $value = object_input_tag($npcomocp, 'getDestipcar', array (
  'size' => 20,
  'control_name' => 'npcomocp[destipcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npcomocp[pascar]', __($labels['npcomocp{pascar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcomocp{pascar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcomocp{pascar}')): ?>
    <?php echo form_error('npcomocp{pascar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php $value = object_input_tag($npcomocp, 'getPascar', array (
  'size' => 20,
  'control_name' => 'npcomocp[pascar]',
  'maxlength' => 3,
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'url'      => 'npcomocp/grid',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=npcomocp_pascar&codtipcar='+document.getElementById('npcomocp_codtipcar').value+'&fecdes='+document.getElementById('npcomocp_fecdes').value+'&columna='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('npcomocp[fecdes]', __($labels['npcomocp{fecdes}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcomocp{fecdes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcomocp{fecdes}')): ?>
    <?php echo form_error('npcomocp{fecdes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npcomocp, 'getFecdes', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npcomocp[fecdes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>


</fieldset>

<?php include_partial('edit_actions', array('npcomocp' => $npcomocp)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npcomocp->getId()): ?>
<?php echo button_to(__('delete'), 'npcomocp/delete?id='.$npcomocp->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
