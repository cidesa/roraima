<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/02 19:37:05
?>
<?php echo form_tag('biedefconlotm/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bndefcon, 'getId') ?>
<?php use_helper('Javascript') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php use_helper('Grid'); ?>
<?php use_helper('PopUp') ?>

<fieldset id="sf_fieldset_none" class="">
    <legend><?php echo __('Código de Nivel')?></legend>
<div class="form-row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefcon[codact]', __($labels['bndefcon{codact}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefcon{codact}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefcon{codact}')): ?> <?php echo form_error('bndefcon{codact}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php $value = object_input_tag($bndefcon, 'getCodact', array (
  'size' => 30,
  'maxlength' => strlen($mascaracatalogo),
  'control_name' => 'bndefcon[codact]',
  'onKeypress' => "javascript:cadena=rayitas(this.value);document.getElementById('bndefcon_codact').value=cadena;",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracatalogo')",
  'onBlur'=>remote_function(array(
  			'url'      => 'biedefconlotm/ajax',
  			'complete' => 'AjaxJSON(request, json)',
  			'with' => "'ajax=0&cajtexmos=bndefcon_desact&codigo='+this.value",
       		)),

)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndefact_Biedefconlotm/clase/Bndefact/frame/sf_admin_edit_form/obj1/bndefcon_codact/obj2/bndefcon_desact/campo1/codact/campo2/desact'); ?>

<?php $value = object_input_tag($bndefcon, 'getDesact', array (
'size' => 35,
'control_name' => 'bndefcon[desact]',
'disable' => true,
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefcon[codact1]', __($labels['bndefcon{codact1}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefcon{codact1}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefcon{codact1}')): ?> <?php echo form_error('bndefcon{codact}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($bndefcon, 'getCodact1', array (
	'size' => 30,
        'maxlength' => strlen($mascaracatalogo),
	'control_name' => 'bndefcon[codact1]',
	'onKeypress' => "javascript:cadena=rayitas(this.value);document.getElementById('bndefcon_codact1').value=cadena;",
    'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracatalogo')",
	'onBlur'=>remote_function(array(
  			'url'      => 'biedefconlotm/ajax',
  			'complete' => 'AjaxJSON(request, json)',
  			'with' => "'ajax=1&cajtexmos=bndefcon_desact1&codigo='+this.value",
       		)),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndefact_Biedefconlotm/clase/Bndefact/frame/sf_admin_edit_form/obj1/bndefcon_codact1/obj2/bndefcon_desact1/campo1/codact/campo2/desact'); ?>

<?php $value = object_input_tag($bndefcon, 'getDesact1', array (
'size' => 35,
'control_name' => 'bndefcon[desact1]',

)); echo $value ? $value : '&nbsp;' ?>
</div>

</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Incorporación/Desincorporación')?></legend>
<div class="form-row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefcon[ctadepcar]', __($labels['bndefcon{ctadepcar}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefcon{ctadepcar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefcon{ctadepcar}')): ?> <?php echo form_error('bndefcon{ctadepcar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('bndefcon[ctadepcar]', $bndefcon->getCtadepcar(),
    'biedefconlotm/autocomplete?ajax=1', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconlotm/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefcon_descta&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefcon_ctadepcar/obj2/bndefcon_descta/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefcon, 'getDescta', array (
'disabled' => true,
'size' => 35,
'control_name' => 'bndefcon[descta]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefcon[ctadepabo]', __($labels['bndefcon{ctadepabo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefcon{ctadepabo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefcon{ctadepabo}')): ?> <?php echo form_error('bndefcon{ctadepabo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php echo input_auto_complete_tag('bndefcon[ctadepabo]', $bndefcon->getCtadepabo(),
    'biedefconlotm/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconlotm/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefcon_desctaabo&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefcon_ctadepabo/obj2/bndefcon_desctaabo/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefcon, 'getDesctaabo', array (
'disabled' => true,
'size' => 35,
'control_name' => 'bndefcon[desctaabo]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
</div>
</fieldset>
<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Depreciación Mensual')?></legend>
<div class="form-row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefcon[ctaajucar]', __($labels['bndefcon{ctaajucar}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefcon{ctaajucar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefcon{ctaajucar}')): ?> <?php echo form_error('bndefcon{ctaajucar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php echo input_auto_complete_tag('bndefcon[ctaajucar]', $bndefcon->getCtaajucar(),
    'biedefconlotm/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconlotm/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefcon_desctaajucar&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefcon_ctaajucar/obj2/bndefcon_desctaajucar/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefcon, 'getDesctaajucar', array (
'disabled' => true,
'control_name' => 'bndefcon[desctaajucar]',
'size' => 35,
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefcon[ctaajuabo]', __($labels['bndefcon{ctaajuabo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefcon{ctaajuabo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefcon{ctaajuabo}')): ?> <?php echo form_error('bndefcon{ctaajuabo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php echo input_auto_complete_tag('bndefcon[ctaajuabo]', $bndefcon->getCtaajuabo(),
    'biedefconlotm/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconlotm/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefcon_desctaajuabo&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefcon_ctaajuabo/obj2/bndefcon_desctaajuabo/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefcon, 'getDesctaajuabo', array (
'disabled' => true,
'control_name' => 'bndefcon[desctaajuabo]',
'size' => 35,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
</div>
</fieldset>

<br>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Depreciación Acumulada')?></legend>
<div class="form-row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefcon[ctarevcar]', __($labels['bndefcon{ctarevcar}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefcon{ctarevcar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefcon{ctarevcar}')): ?> <?php echo form_error('bndefcon{ctarevcar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('bndefcon[ctarevcar]', $bndefcon->getCtarevcar(),
    'biedefconlotm/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconlotm/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefcon_desctarevcar&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefcon_ctarevcar/obj2/bndefcon_desctarevcar/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefcon, 'getDesctarevcar', array (
'disabled' => true,
'control_name' => 'bndefcon[desctarevcar]',
'size' => 35,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefcon[ctarevabo]', __($labels['bndefcon{ctarevabo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefcon{ctarevabo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefcon{ctarevabo}')): ?> <?php echo form_error('bndefcon{ctarevabo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php echo input_auto_complete_tag('bndefcon[ctarevabo]', $bndefcon->getCtarevabo(),
    'biedefconlotm/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconlotm/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefcon_desctarevabo&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefcon_ctarevabo/obj2/bndefcon_desctarevabo/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefcon, 'getDesctarevabo', array (
'disabled' => true,
'control_name' => 'bndefcon[desctarevabo]',
'size' => 35,
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
</div>
</fieldset>
<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Pérdida por Desincorporación')?></legend>
<div class="form-row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefcon[ctapercar]', __($labels['bndefcon{ctapercar}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefcon{ctapercar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefcon{ctapercar}')): ?> <?php echo form_error('bndefcon{ctapercar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php echo input_auto_complete_tag('bndefcon[ctapercar]', $bndefcon->getCtapercar(),
    'biedefconlotm/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconlotm/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefcon_desctapercar&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefcon_ctapercar/obj2/bndefcon_desctapercar/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefcon, 'getDesctapercar', array (
'disabled' => true,
'control_name' => 'bndefcon[desctapercar]',
'size'=> 35,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefcon[ctaperabo]', __($labels['bndefcon{ctaperabo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefcon{ctaperabo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefcon{ctaperabo}')): ?> <?php echo form_error('bndefcon{ctaperabo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('bndefcon[ctaperabo]', $bndefcon->getCtaperabo(),
    'biedefconlotm/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconlotm/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefcon_desctaperabo&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefcon_ctaperabo/obj2/bndefcon_desctaperabo/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefcon, 'getDesctaperabo', array (
'disabled' => true,
'control_name' => 'bndefcon[desctaperabo]',
'size'=> 35,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
</div>
</fieldset>
 <?php include_partial('edit_actions', array('bndefcon' => $bndefcon)) ?>

</form>

<ul class="sf_admin_actions">
	<li class="float-left"><?php if ($bndefcon->getId()): ?> <?php echo button_to(__('delete'), 'biedefconlotm/delete?id='.$bndefcon->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?></li>
</ul>