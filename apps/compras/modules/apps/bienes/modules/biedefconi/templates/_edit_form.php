<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/31 17:16:07
?>
<?php echo form_tag('biedefconi/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($bndefconi, 'getId') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('dFilter','Linktoapp') ?>
<?php echo javascript_include_tag('tools','observe') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php use_helper('PopUp') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('bndefconi[codact]', __($labels['bndefconi{codact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndefconi{codact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefconi{codact}')): ?>
    <?php echo form_error('bndefconi{codact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php echo input_auto_complete_tag('bndefconi[codact]', $bndefconi->getCodact(),
    'biedefconi/autocomplete?ajax=1', array('autocomplete' => 'off', 'size' => '32', 'onBlur'=> remote_function(array(
      'url'      => 'biedefconi/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'script'   => true,
      'with' => "'ajax=1&cajtexmos=biedefconi_desinm&cajtexcom=biedefconi_codact&codigo='+this.value"
      ))),
     array('use_style' => 'true')
  )
  ?>

  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndefconi_Biedefconi/clase/Bnreginm/frame/sf_admin_edit_form/obj1/bndefconi_codact/obj2/bndefconi_codinm/obj3/bndefconi_desinm/campo1/codact/campo2/codinm/campo3/desinm/param1/1'); ?>

  <?php $value = object_input_tag($bndefconi, 'getDesinm', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'bndefconi[desinm]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>

<br>

  <?php echo label_for('bndefconi[codinm]', __($labels['bndefconi{codinm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bndefconi{codinm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefconi{codinm}')): ?>
    <?php echo form_error('bndefconi{codinm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bndefconi, 'getCodinm', array (
  'size' => 20,
  'control_name' => 'bndefconi[codinm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Incorporación/Desincorporación')  ?></legend>
<div class="form-row">
  <?php echo label_for('bndefconi[ctadepcar]', __($labels['bndefconi{ctadepcar}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bndefconi{ctadepcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefconi{ctadepcar}')): ?>
    <?php echo form_error('bndefconi{ctadepcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_tag($bndefconi, 'getCtadepcar', array (
  'size' => 32,
  'control_name' => 'bndefconi[ctadepcar]',
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('bndefconi_ctadepcar').value=cadena;}",
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $sf_user->getAttribute('lengthmask'),
  'onBlur'=> remote_function(array(
        'url'      => 'biedefconi/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=bndefconi_descta&cajtexcom=bndefconi_ctadepcar&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

   <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/bndefconi_Biedefconi/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctadepcar/obj2/bndefconi_descta/campo1/codcta/campo2/descta/param1/2'); ?>

  <?php $value = object_input_tag($bndefconi, 'getDescta', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'bndefconi[descta]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>

<div class="form-row">
  <?php echo label_for('bndefconi[ctadepabo]', __($labels['bndefconi{ctadepabo}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bndefconi{ctadepabo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefconi{ctadepabo}')): ?>
    <?php echo form_error('bndefconi{ctadepabo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


<?php $value = object_input_tag($bndefconi, 'getCtadepabo', array (
  'size' => 32,
  'control_name' => 'bndefconi[ctadepabo]',
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('bndefconi_ctadepabo').value=cadena;}",
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $sf_user->getAttribute('lengthmask'),
  'onBlur'=> remote_function(array(
        'url'      => 'biedefconi/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=bndefconi_desctaabo&cajtexcom=bndefconi_ctadepabo&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>


  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/bndefconi_Biedefconi/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctadepabo/obj2/bndefconi_desctaabo/campo1/codcta/campo2/descta/param1/2'); ?>

  <?php $value = object_input_tag($bndefconi, 'getDesctaabo', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'bndefconi[desctaabo]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>
</fieldset>


<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Depreciación Mensual')  ?></legend>
<div class="form-row">
  <?php echo label_for('bndefconi[ctaajucar]', __($labels['bndefconi{ctaajucar}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bndefconi{ctaajucar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefconi{ctaajucar}')): ?>
    <?php echo form_error('bndefconi{ctaajucar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


<?php $value = object_input_tag($bndefconi, 'getCtaajucar', array (
  'size' => 32,
  'control_name' => 'bndefconi[ctaajucar]',
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('bndefconi_ctaajucar').value=cadena;}",
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $sf_user->getAttribute('lengthmask'),
  'onBlur'=> remote_function(array(
        'url'      => 'biedefconi/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=bndefconi_desctaajucar&cajtexcom=bndefconi_ctaajucar&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/bndefconi_Biedefconi/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctaajucar/obj2/bndefconi_desctaajucar/campo1/codcta/campo2/descta/param1/2'); ?>

  <?php $value = object_input_tag($bndefconi, 'getDesctaajucar', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'bndefconi[desctaajucar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bndefconi[ctaajuabo]', __($labels['bndefconi{ctaajuabo}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bndefconi{ctaajuabo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefconi{ctaajuabo}')): ?>
    <?php echo form_error('bndefconi{ctaajuabo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


<?php $value = object_input_tag($bndefconi, 'getCtaajuabo', array (
  'size' => 32,
  'control_name' => 'bndefconi[ctaajuabo]',
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('bndefconi_ctaajuabo').value=cadena;}",
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $sf_user->getAttribute('lengthmask'),
  'onBlur'=> remote_function(array(
        'url'      => 'biedefconi/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=bndefconi_desctaajuabo&cajtexcom=bndefconi_ctaajuabo&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/bndefconi_Biedefconi/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctaajuabo/obj2/bndefconi_desctaajuabo/campo1/codcta/campo2/descta/param1/2'); ?>

  <?php $value = object_input_tag($bndefconi, 'getDesctaajuabo', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'bndefconi[desctaajuabo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Depreciación Acumulada')  ?></legend>
<div class="form-row">
  <?php echo label_for('bndefconi[ctarevcar]', __($labels['bndefconi{ctarevcar}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bndefconi{ctarevcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefconi{ctarevcar}')): ?>
    <?php echo form_error('bndefconi{ctarevcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


<?php $value = object_input_tag($bndefconi, 'getCtarevcar', array (
  'size' => 32,
  'control_name' => 'bndefconi[ctarevcar]',
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('bndefconi_ctarevcar').value=cadena;}",
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $sf_user->getAttribute('lengthmask'),
  'onBlur'=> remote_function(array(
        'url'      => 'biedefconi/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=bndefconi_desctarevcar&cajtexcom=bndefconi_ctarevcar&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>


  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/bndefconi_Biedefconi/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctarevcar/obj2/bndefconi_desctarevcar/campo1/codcta/campo2/descta/param1/2'); ?>

  <?php $value = object_input_tag($bndefconi, 'getDesctarevcar', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'bndefconi[desctarevcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('bndefconi[ctarevabo]', __($labels['bndefconi{ctarevabo}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bndefconi{ctarevabo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefconi{ctarevabo}')): ?>
    <?php echo form_error('bndefconi{ctarevabo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_tag($bndefconi, 'getCtarevabo', array (
  'size' => 32,
  'control_name' => 'bndefconi[ctarevabo]',
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('bndefconi_ctarevabo').value=cadena;}",
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $sf_user->getAttribute('lengthmask'),
  'onBlur'=> remote_function(array(
        'url'      => 'biedefconi/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=bndefconi_desctarevabo&cajtexcom=bndefconi_ctarevabo&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/bndefconi_Biedefconi/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctarevabo/obj2/bndefconi_desctarevabo/campo1/codcta/campo2/descta/param1/2'); ?>

  <?php $value = object_input_tag($bndefconi, 'getDesctarevabo', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'bndefconi[desctarevabo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Perdida por Desincorporación')  ?></legend>
<div class="form-row">
  <?php echo label_for('bndefconi[ctapercar]', __($labels['bndefconi{ctapercar}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bndefconi{ctapercar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefconi{ctapercar}')): ?>
    <?php echo form_error('bndefconi{ctapercar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


<?php $value = object_input_tag($bndefconi, 'getCtapercar', array (
  'size' => 32,
  'control_name' => 'bndefconi[ctapercar]',
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('bndefconi_ctapercar').value=cadena;}",
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $sf_user->getAttribute('lengthmask'),
  'onBlur'=> remote_function(array(
        'url'      => 'biedefconi/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=bndefconi_desctapercar&cajtexcom=bndefconi_ctapercar&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/bndefconi_Biedefconi/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctapercar/obj2/bndefconi_desctapercar/campo1/codcta/campo2/descta/param1/2'); ?>

  <?php $value = object_input_tag($bndefconi, 'getDesctapercar', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'bndefconi[desctapercar]',
)); echo $value ? $value : '&nbsp;' ?>

    </div>
</div>


<div class="form-row">
  <?php echo label_for('bndefconi[ctaperabo]', __($labels['bndefconi{ctaperabo}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bndefconi{ctaperabo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bndefconi{ctaperabo}')): ?>
    <?php echo form_error('bndefconi{ctaperabo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


<?php $value = object_input_tag($bndefconi, 'getCtaperabo', array (
  'size' => 32,
  'control_name' => 'bndefconi[ctaperabo]',
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('bndefconi_ctaperabo').value=cadena;}",
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $sf_user->getAttribute('lengthmask'),
  'onBlur'=> remote_function(array(
        'url'      => 'biedefconi/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=bndefconi_desctaperabo&cajtexcom=bndefconi_ctaperabo&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>


  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/bndefconi_Biedefconi/clase/Contabb/frame/sf_admin_edit_form/obj1/bndefconi_ctaperabo/obj2/bndefconi_desctaperabo/campo1/codcta/campo2/descta/param1/2'); ?>

  <?php $value = object_input_tag($bndefconi, 'getDesctaperabo', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'bndefconi[desctaperabo]',
)); echo $value ? $value : '&nbsp;' ?>


    </div>
</div>

</fieldset>


</fieldset>

<?php include_partial('edit_actions', array('bndefconi' => $bndefconi)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bndefconi->getId()): ?>
<?php echo button_to(__('delete'), 'biedefconi/delete?id='.$bndefconi->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
