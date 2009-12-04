<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:_edit_form.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/18 15:01:26
?>
<?php echo form_tag('forpoa_uae/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($forencpryaccespmet, 'getId') ?>
<?php use_helper('Javascript') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter','Linktoapp','formulacion/forpoa_uae') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php use_helper('Grid'); ?>
<?php use_helper('PopUp') ?>

<!--  input type="button" name="Submit" value="Enviar" onclick="javascript:CatalogoGrid();"/-->

<?php //echo button_to_popup('...','generales/catalogo?clase=Caprovee&frame=sf_admin_edit_form&obj1=cacotiza_rifpro&obj2=cacotiza_nompro&obj3=cacotiza_rifpro')?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('  Proyecto o Acción Centralizada  ') ; ?></legend>
<div class="form-row">
<table border="0" valign="top">
<tr valign="top" align="left">
  <th valign="top" align="left">
    <?php echo label_for('forencpryaccespmet[codpro]', __($labels['forencpryaccespmet{codpro}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('forencpryaccespmet{codpro}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('forencpryaccespmet{codpro}')): ?>
      <?php echo form_error('forencpryaccespmet{codpro}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

 <?php echo input_auto_complete_tag('forencpryaccespmet[codpro]', $forencpryaccespmet->getCodpro(),
    'forpoa_uae/autocomplete?ajax=1', array('autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'forpoa_uae/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('forencpryaccespmet_codpro').value != ''",
      'script'   => true,
      'with' => "'ajax=1&cajtexmos=forencpryaccespmet_nompro&cajtexcom=forencpryaccespmet_codpro&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefpry_forpoa_uae/clase/fordefpry/frame/sf_admin_edit_form/obj1/forencpryaccespmet_codpro/obj2/forencpryaccespmet_nompro/campo1/codpro/campo2/nompro')?></th>

    <?php $value = object_input_tag($forencpryaccespmet, 'getDesproacc', array (
    'size' => 20,
    'disabled' => true,
    'type' => 'hidden',
    'control_name' => 'forencpryaccespmet[desproacc]',
  )); echo $value ? $value : '&nbsp;' ?>

    </div>
  </th>
</tr>
<tr>
<th valign="top" align="left">
  <?php $value = object_textarea_tag($forencpryaccespmet, 'getNompro', array (
    'disabled' => true,
    'size' => '80x2',
    'control_name' => 'forencpryaccespmet[nompro]',
  )); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</div>
</table>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('  Acción Especificas  ') ; ?></legend>
<div class="form-row">
<table border="0" valign="top">
<tr valign="top" >
<th valign="top" align="left" >
  <?php echo label_for('forencpryaccespmet[codaccesp]', __($labels['forencpryaccespmet{codaccesp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forencpryaccespmet{codaccesp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forencpryaccespmet{codaccesp}')): ?>
    <?php echo form_error('forencpryaccespmet{codaccesp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('forencpryaccespmet[codaccesp]', $forencpryaccespmet->getCodaccesp(),
    'forpoa_uae/autocomplete?ajax=2', array('autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'forpoa_uae/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('forencpryaccespmet_codaccesp').value != ''",
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=forencpryaccespmet_desaccesp&cajtexcom=forencpryaccespmet_codaccesp&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Fordefaccesp_forpoa_uae/clase/fordefaccesp/frame/sf_admin_edit_form/obj1/forencpryaccespmet_codaccesp/obj2/forencpryaccespmet_desaccesp/campo1/codaccesp/campo2/desaccesp/param1/'+$('forencpryaccespmet_codpro').value+'")?></th>
    </div>

</th>
</tr>
<tr>
<th align="left">
    <?php $value = object_textarea_tag($forencpryaccespmet, 'getDesaccesp', array (
    'disabled' => true,
    'size' => '80x3',
    'control_name' => 'forencpryaccespmet[desaccesp]',
  )); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
<tr>
<th  align="left">
  <?php echo label_for('forencpryaccespmet[codmet]', __($labels['forencpryaccespmet{codmet}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forencpryaccespmet{codmet}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forencpryaccespmet{codmet}')): ?>
    <?php echo form_error('forencpryaccespmet{codmet}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('forencpryaccespmet[codmet]', $forencpryaccespmet->getCodmet(),
    'forpoa_uae/autocomplete?ajax=3', array('autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'update' => 'grid',
      'script'   => true,
      'url'      => 'forpoa_uae/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('forencpryaccespmet_codmet').value != ''",
      'with' => "'ajax=3&cajtexmos=forencpryaccespmet_desmet&cajtexcom=forencpryaccespmet_codmet&codigo='+this.value+'&codigo2='+document.getElementById('forencpryaccespmet_codpro').value+'&codigo3='+document.getElementById('forencpryaccespmet_codaccesp').value"
      ))),
     array('use_style' => 'true')
  )

/* echo input_auto_complete_tag('tscheemi[tipdoc]', $tscheemi->getTipdoc(),
    'tesmovemiche/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 4, 'size' => 23, 'onBlur'=> remote_function(array(
       'update'   => 'divGrid',
       'url'      => 'tesmovemiche/ajax',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=1&cajtexmos=tscheemi_destip&cajtexcom=tscheemi_tipdoc&mostrardato=N&tipdoc='+this.value"
        ))),
     array('use_style' => 'true')
  )*/


 /* 'script'   => true,
  * 'onBlur'=> remote_function(array(
              'update'   => 'grid',
              'url' => 'alminvfis2/grid?ajax=1',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'cajtexmos=caordcom_nomext&arthasta='+this.value+'&artdesde='+document.getElementById('cainvfis_artdesde').value+'&fecinv='+document.getElementById('cainvfis_fecinv').value+'&id='+document.getElementById('id').value",
        )),
  */
  ?>
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Fordefpryaccmet_forpoa_uae/clase/fordefpryaccmet/frame/sf_admin_edit_form/obj1/forencpryaccespmet_codmet/obj2/forencpryaccespmet_desmet/campo1/codmet/campo2/desmet/param1/'+$('forencpryaccespmet_codpro').value+'/param2/'+$('forencpryaccespmet_codaccesp').value+'")?>
  </th>
    </div>
</th>
</tr>
<tr>
<th  align="left">
    <?php $value = object_textarea_tag($forencpryaccespmet, 'getDesmet', array (
    'disabled' => true,
     'size' => '80x2',
    'control_name' => 'forencpryaccespmet[desmet]',
  )); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
<tr  align="left">
<th align="left">
  <?php echo label_for('forencpryaccespmet[canmet]', __($labels['forencpryaccespmet{canmet}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('forencpryaccespmet{canmet}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forencpryaccespmet{canmet}')): ?>
    <?php echo form_error('forencpryaccespmet{canmet}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($forencpryaccespmet, 'getCanmet', array (
  'size' => 7,
  'disabled' => 'true',
  'control_name' => 'forencpryaccespmet[canmet]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
<tr>
<th align="left">
  <?php $value = object_textarea_tag($forencpryaccespmet, 'getDesunimed', array (
  'disabled' => true,
  'size' => '80x2',
  'control_name' => 'forencpryaccespmet[desunimed]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>


<tr  align="left">
<th align="left">
  <?php echo label_for('forencpryaccespmet[codcat]', __($labels['forencpryaccespmet{codcat}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('forencpryaccespmet{codcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forencpryaccespmet{codcat}')): ?>
    <?php echo form_error('forencpryaccespmet{codcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($forencpryaccespmet, 'getCodcat', array (
  'size' => 7,
  'disabled' => 'true',
  'control_name' => 'forencpryaccespmet[codcat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>

<tr>
<th align="left">
  <?php $value = object_input_tag($forencpryaccespmet, 'getNomcat', array (
  'disabled' => true,
  'size' => '80',
  'control_name' => 'forencpryaccespmet[nomcat]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>


</div>
</table>
</fieldset>

<div id="grid">
<?
 echo grid_tag($obj);
?>
</div>

<div class="form-row">
<?php echo __('Total a Formular por Meta: ').input_tag('totalactividad', '0'); ?>
</div>

<?php include_partial('edit_actions', array('forencpryaccespmet' => $forencpryaccespmet)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($forencpryaccespmet->getId()): ?>
<?php echo button_to(__('delete'), 'forpoa_uae/delete?id='.$forencpryaccespmet->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
