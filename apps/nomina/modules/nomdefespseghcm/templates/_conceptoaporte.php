<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>

<?php echo label_for('npseghcm[codconapo]', __($labels['npseghcm{codconapo}']), 'class="required" Style=" width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('npseghcm{codconapo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npseghcm{codconapo}')): ?>
    <?php echo form_error('npseghcm{codconapo}', array('class' => 'form-error-msg')) ?>
  <?php endif; 

  $value = object_input_tag($npseghcm, 'getCodconapo' , array (
  'size' => '20',
  'control_name' => 'npseghcm[codconapo]',
  'onBlur'=> remote_function(array(
   'script' => true,
   'url'      => sfContext::getInstance()->getModuleName().'/catalogo',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('npseghcm_codconapo').value != ''",
   'with' => "'ajax=0&clase=Npdefcpt&name=npseghcm&campobase=id&camposecundario2=nomconapo&camposecundario=nomcon&campoprincipal=codcon&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp; ';
echo '&nbsp;';

echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/frame/sf_admin_edit_form/metodo/Npdefcpt_Vacdefgen/clase/Npdefcpt/obj1/npseghcm_codconapo/obj2/npseghcm_nomconapo/obj3/npseghcm_id/campo1/codcon/campo2/nomcon/campo3/id//param1/'."'+$('npseghcm_codnom').value+'".'','','','botoncat');
echo '&nbsp;';

  $value = object_input_tag($npseghcm, 'getNomconapo', array (
  'size' => '40',
  'readonly' => true,
  'control_name' => 'npseghcm[nomconapo]',
)); echo $value ? $value : '&nbsp;';