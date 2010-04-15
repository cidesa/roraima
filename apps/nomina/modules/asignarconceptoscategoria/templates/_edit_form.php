<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/12/19 12:17:46
?>
<?php echo form_tag('asignarconceptoscategoria/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npconceptoscategoria, 'getId') ?>
<?php echo input_hidden_tag('varcontrol', '') ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','nomina/asignarconceptoscategoria') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Categorias Presupuestaria')?></legend>
<div class="form-row">
  <?php echo label_for('npconceptoscategoria[codcat]', __($labels['npconceptoscategoria{codcat}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npconceptoscategoria{codcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npconceptoscategoria{codcat}')): ?>
    <?php echo form_error('npconceptoscategoria{codcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npconceptoscategoria, 'getCodcat', array (
  'size' => 20,
  'control_name' => 'npconceptoscategoria[codcat]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$formatocategoria')",
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}",
  'readonly' => $npconceptoscategoria->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'condition' => "$('npconceptoscategoria_codcat').value!=''",
        'url'      => 'asignarconceptoscategoria/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=npconceptoscategoria_descat&cajtexcom=npconceptoscategoria_codcat&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;
<?php  if (!$npconceptoscategoria->getId()) echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/NconceptosCat_Asignar/clase/Npcatpre/frame/sf_admin_edit_form/obj1/npconceptoscategoria_codcat/obj2/npconceptoscategoria_descat/campo1/codcat/campo2/nomcat')?>
&nbsp;&nbsp;&nbsp;&nbsp;
  <?php $value = object_input_tag($npconceptoscategoria, 'getDescat', array (
  'size' => 20,
  'control_name' => 'npconceptoscategoria[descat]',
  'readonly' => $npconceptoscategoria->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
</div>
<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>

</fieldset>

<?php include_partial('edit_actions', array('npconceptoscategoria' => $npconceptoscategoria)) ?>

</form>
