<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cppagos, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Pagados') ?></legend>
<div id="divGrid"><?php echo form_tag('cppagos/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="refpag" name="refpag" type="hidden" value="<? print $cppagos->getRefpag(); ?>">
<input id="fecpag" name="fecpag" type="hidden" value="<? print $cppagos->getFecpag(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $refpag; ?>">

  <div class="form-row">
  <?php echo label_for('cppagos[refpag]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cppagos{refpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cppagos{refpag}')): ?>
    <?php echo form_error('cppagos{refpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cppagos, 'getRefpag', array (
  'size' => 20,
  'control_name' => 'cppagos[refpag]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cppagos[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cppagos{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cppagos{fecanu}')): ?>
    <?php echo form_error('cppagos{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cppagos, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cppagos[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'cppagos/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('cppagos_fecanu').value != ''",
        'with' => "'ajax=1&refpag='+$('refpag').value+'&codigo='+this.value"
        ))),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('cppagos[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cppagos{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cppagos{desanu}')): ?>
    <?php echo form_error('cppagos{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cppagos, 'getDesanu', array (
  'size' => 80,
  'control_name' => 'cppagos[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row" align="center">
   <input type="button" value="Salvar" onClick="salvar();">
   <input type="button" value="Cancelar" onClick="self.close();">
</div>

</div>
</form>
</fieldset>
</div>

<script type="text/javascript">
$('cppagos_refpag').value=$('refer').value;

function salvar()
{
  var id='<? print $cppagos->getId(); ?>';
  var refpag=$('refpag').value;
  var fecpag=$('fecpag').value;
  var fecanu=$('cppagos_fecanu').value;
  var desanu=$('cppagos_desanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&desanu='+desanu+'&fecanu='+fecanu+'&refpag='+refpag+'&fecpag='+fecpag;
  f.submit();
}
</script>
