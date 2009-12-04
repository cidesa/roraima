<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cpcompro, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Compromisos') ?></legend>
<div id="divGrid"><?php echo form_tag('cpcompro/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="refcom" name="refcom" type="hidden" value="<? print $cpcompro->getRefcom(); ?>">
<input id="feccom" name="feccom" type="hidden" value="<? print $cpcompro->getFeccom(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $refcom; ?>">

  <div class="form-row">
  <?php echo label_for('cpcompro[refcom]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpcompro{refcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpcompro{refcom}')): ?>
    <?php echo form_error('cpcompro{refcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpcompro, 'getRefcom', array (
  'size' => 20,
  'control_name' => 'cpcompro[refcom]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpcompro[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpcompro{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpcompro{fecanu}')): ?>
    <?php echo form_error('cpcompro{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cpcompro, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cpcompro[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'cpcompro/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('cpcompro_fecanu').value != ''",
        'with' => "'ajax=1&refcom='+$('refcom').value+'&codigo='+this.value"
        ))),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('cpcompro[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpcompro{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpcompro{desanu}')): ?>
    <?php echo form_error('cpcompro{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpcompro, 'getDesanu', array (
  'size' => 80,
  'control_name' => 'cpcompro[desanu]',
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
$('cpcompro_refcom').value=$('refer').value;

function salvar()
{
  var id='<? print $cpcompro->getId(); ?>';
  var refcom=$('refcom').value;
  var feccom=$('feccom').value;
  var fecanu=$('cpcompro_fecanu').value;
  var desanu=$('cpcompro_desanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&desanu='+desanu+'&fecanu='+fecanu+'&refcom='+refcom+'&feccom='+feccom;
  f.submit();
}
</script>
