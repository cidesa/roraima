<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/15 11:16:29
?>
<?php echo form_tag('nomcomocp/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>
<?php echo object_input_hidden_tag($npcomocp, 'getId') ?>
<?php echo javascript_include_tag('nomina/nomcomocp') ?>


<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npcomocp[codtipcar]', __($labels['npcomocp{codtipcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcomocp{codtipcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcomocp{codtipcar}')): ?>
    <?php echo form_error('npcomocp{codtipcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npcomocp, 'getCodtipcar', array (
  'size' => 5,
  'control_name' => 'npcomocp[codtipcar]',
  'maxlength' => 5,
  'onBlur'=> remote_function(array(
        'update'   => 'grid',
        'url'      => 'nomcomocp/ajax',
        'complete' => 'AjaxJSON(request, json)',
	    'condition' => "$('npcomocp_codtipcar').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexcom=npcomocp_codtipcar&cajtexmos=npcomocp_destipcar&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nptipcar_Nnpcomocp/clase/Nptipcar/frame/sf_admin_edit_form/obj1/npcomocp_codtipcar/obj2/npcomocp_destipcar/campo1/codtipcar/campo2/destipcar/param1/')?>
&nbsp;
  <?php $value = object_input_tag($npcomocp, 'getDestipcar', array (
  'size' => 40,
  'control_name' => 'npcomocp[destipcar]',
  'readonly' => 'true'
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php if($sf_user->getAttribute('varforma','','nomcomocp')!='S'){?>
<div class="form-row">
  <?php echo label_for('npcomocp[pascar]', __($labels['npcomocp{pascar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npcomocp{pascar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npcomocp{pascar}')): ?>
    <?php echo form_error('npcomocp{pascar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php if ($npcomocp->getId()==''){ ?>
<?php $value = object_input_tag($npcomocp, 'getPascar', array (
'size' => 8,
'maxlength' => 4,
'control_name' => 'npcomocp[pascar]',
'onBlur' => "javascript: actualizar_grid(); valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('npcomocp_pascar').value=valor;document.getElementById('npcomocp_pascar').disabled=false;",

)); echo $value ? $value : '&nbsp;' ?>
<?php }else {?>
<?php echo input_tag('npcomocp[pascar]',$maxpas, array(
 'size' => 5,
 'onBlur' => "javascript: actualizar_grid(); valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('npcomocp_pascar').value=valor;document.getElementById('npcomocp_pascar').disabled=false;",))?>
<?php }?>

    </div>
</div>
<?php }?>
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
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php if($sf_user->getAttribute('varforma','','nomcomocp')!='S'){?>
<div class="form-row">
    <?php echo "Ninguno ".radiobutton_tag('incremento_paso', 'p', 'true', array('onClick'=> "bloquear_incremento();")) ?>
    <?php echo "Por Porcentaje ".radiobutton_tag('incremento_paso', 'm', 'false', array('onClick'=> "desbloquear_incremento();")) ?>
    <?php echo "Por Monto ".radiobutton_tag('incremento_paso', 't', 'false', array('onClick'=> "desbloquear_incremento();")) ?>
    <?php echo "Iniciar Montos ".radiobutton_tag('incremento_paso', 'i', 'false', array('onClick'=> "inizializo_descuentos();")) ?>
<br><br><strong>Incrementos por Pasos</strong><br><br>

<?php $value = input_tag('incremento', '', array (
'size' => 8,
'maxlength' => 7,
'control_name' => 'incremento',
'onBlur' => "event.keyCode=13; entermontootro(event, this.id); actualizar_grid_sueldos(this.value)",
)); echo $value ? $value : '&nbsp;' ?>
</div>

<?php } ?>
<div id="grid" class="form-row">
<?
echo grid_tag($obj);
?>
</div>

</fieldset>

<?php include_partial('edit_actions', array('npcomocp' => $npcomocp)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>
