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
<?php echo form_tag('biedefconloti/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bndefconi, 'getId') ?>
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
<?php echo label_for('bndefconi[codact]', __($labels['bndefconi{codact}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefconi{codact}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefconi{codact}')): ?> <?php echo form_error('bndefconi{codact}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php $value = object_input_tag($bndefconi, 'getCodact', array (
  'size' => 30,
  'maxlength' => strlen($mascaracatalogo),
  'control_name' => 'bndefconi[codact]',
  'onKeypress' => "javascript:cadena=rayitas(this.value);document.getElementById('bndefconi_codact').value=cadena;",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracatalogo')",
  'onBlur'=>remote_function(array(
  			'url'      => 'biedefconloti/ajax',
  			'complete' => 'AjaxJSON(request, json)',
  			'with' => "'ajax=0&cajtexmos=bndefconi_desact&codigo='+this.value",
       		)),

)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndefact_Biedefconlotm/clase/Bndefact/frame/sf_admin_edit_form/obj1/bndefconi_codact/obj2/bndefconi_desact/campo1/codact/campo2/desact'); ?>

<?php $value = object_input_tag($bndefconi, 'getDesact', array (
'size' => 35,
'control_name' => 'bndefconi[desact]',
'disable' => true,
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefconi[codact1]', __($labels['bndefconi{codact1}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefconi{codact1}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefconi{codact1}')): ?> <?php echo form_error('bndefconi{codact}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($bndefconi, 'getCodact1', array (
	'size' => 30,
        'maxlength' => strlen($mascaracatalogo),
	'control_name' => 'bndefconi[codact1]',
	'onKeypress' => "javascript:cadena=rayitas(this.value);document.getElementById('bndefconi_codact1').value=cadena;",
    'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracatalogo')",
	'onBlur'=>remote_function(array(
  			'url'      => 'biedefconloti/ajax',
  			'complete' => 'AjaxJSON(request, json)',
  			'with' => "'ajax=1&cajtexmos=bndefconi_desact1&codigo='+this.value",
       		)),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndefact_Biedefconlotm/clase/Bndefact/frame/sf_admin_edit_form/obj1/bndefconi_codact1/obj2/bndefconi_desact1/campo1/codact/campo2/desact'); ?>

<?php $value = object_input_tag($bndefconi, 'getDesact1', array (
'size' => 35,
'control_name' => 'bndefconi[desact1]',

)); echo $value ? $value : '&nbsp;' ?>
</div>

</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Incorporación/Desincorporación')?></legend>
<div class="form-row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefconi[ctadepcar]', __($labels['bndefconi{ctadepcar}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefconi{ctadepcar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefconi{ctadepcar}')): ?> <?php echo form_error('bndefconi{ctadepcar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('bndefconi[ctadepcar]', $bndefconi->getCtadepcar(),
    'biedefconloti/autocomplete?ajax=1', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconloti/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefconi_descta&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctadepcar/obj2/bndefconi_descta/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefconi, 'getDescta', array (
'disabled' => true,
'size' => 35,
'control_name' => 'bndefconi[descta]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefconi[ctadepabo]', __($labels['bndefconi{ctadepabo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefconi{ctadepabo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefconi{ctadepabo}')): ?> <?php echo form_error('bndefconi{ctadepabo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php echo input_auto_complete_tag('bndefconi[ctadepabo]', $bndefconi->getCtadepabo(),
    'biedefconloti/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconloti/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefconi_desctaabo&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctadepabo/obj2/bndefconi_desctaabo/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefconi, 'getDesctaabo', array (
'disabled' => true,
'size' => 35,
'control_name' => 'bndefconi[desctaabo]',
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
<?php echo label_for('bndefconi[ctaajucar]', __($labels['bndefconi{ctaajucar}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefconi{ctaajucar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefconi{ctaajucar}')): ?> <?php echo form_error('bndefconi{ctaajucar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php echo input_auto_complete_tag('bndefconi[ctaajucar]', $bndefconi->getCtaajucar(),
    'biedefconloti/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconloti/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefconi_desctaajucar&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctaajucar/obj2/bndefconi_desctaajucar/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefconi, 'getDesctaajucar', array (
'disabled' => true,
'control_name' => 'bndefconi[desctaajucar]',
'size' => 35,
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefconi[ctaajuabo]', __($labels['bndefconi{ctaajuabo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefconi{ctaajuabo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefconi{ctaajuabo}')): ?> <?php echo form_error('bndefconi{ctaajuabo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php echo input_auto_complete_tag('bndefconi[ctaajuabo]', $bndefconi->getCtaajuabo(),
    'biedefconloti/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconloti/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefconi_desctaajuabo&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctaajuabo/obj2/bndefconi_desctaajuabo/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefconi, 'getDesctaajuabo', array (
'disabled' => true,
'control_name' => 'bndefconi[desctaajuabo]',
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
<?php echo label_for('bndefconi[ctarevcar]', __($labels['bndefconi{ctarevcar}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefconi{ctarevcar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefconi{ctarevcar}')): ?> <?php echo form_error('bndefconi{ctarevcar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('bndefconi[ctarevcar]', $bndefconi->getCtarevcar(),
    'biedefconloti/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconloti/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefconi_desctarevcar&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctarevcar/obj2/bndefconi_desctarevcar/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefconi, 'getDesctarevcar', array (
'disabled' => true,
'control_name' => 'bndefconi[desctarevcar]',
'size' => 35,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefconi[ctarevabo]', __($labels['bndefconi{ctarevabo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefconi{ctarevabo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefconi{ctarevabo}')): ?> <?php echo form_error('bndefconi{ctarevabo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php echo input_auto_complete_tag('bndefconi[ctarevabo]', $bndefconi->getCtarevabo(),
    'biedefconloti/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconloti/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefconi_desctarevabo&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctarevabo/obj2/bndefconi_desctarevabo/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefconi, 'getDesctarevabo', array (
'disabled' => true,
'control_name' => 'bndefconi[desctarevabo]',
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
<?php echo label_for('bndefconi[ctapercar]', __($labels['bndefconi{ctapercar}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefconi{ctapercar}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefconi{ctapercar}')): ?> <?php echo form_error('bndefconi{ctapercar}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>


<?php echo input_auto_complete_tag('bndefconi[ctapercar]', $bndefconi->getCtapercar(),
    'biedefconloti/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconloti/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefconi_desctapercar&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctapercar/obj2/bndefconi_desctapercar/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefconi, 'getDesctapercar', array (
'disabled' => true,
'control_name' => 'bndefconi[desctapercar]',
'size'=> 35,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo label_for('bndefconi[ctaperabo]', __($labels['bndefconi{ctaperabo}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('bndefconi{ctaperabo}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bndefconi{ctaperabo}')): ?> <?php echo form_error('bndefconi{ctaperabo}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('bndefconi[ctaperabo]', $bndefconi->getCtaperabo(),
    'biedefconloti/autocomplete?ajax=2', array('size' => 30, 'autocomplete' => 'off', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconloti/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=2&cajtexmos=bndefconi_desctaperabo&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Biedefconlotm/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctaperabo/obj2/bndefconi_desctaperabo/campo1/codcta/campo2/descta'); ?>

<?php $value = object_input_tag($bndefconi, 'getDesctaperabo', array (
'disabled' => true,
'control_name' => 'bndefconi[desctaperabo]',
'size'=> 35,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
</div>
</fieldset>
 <?php include_partial('edit_actions', array('bndefconi' => $bndefconi)) ?>

</form>

<ul class="sf_admin_actions">
	<li class="float-left"><?php if ($bndefconi->getId()): ?> <?php echo button_to(__('delete'), 'biedefconloti/delete?id='.$bndefconi->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?></li>
</ul>