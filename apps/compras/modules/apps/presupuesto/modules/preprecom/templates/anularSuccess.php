<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cpprecom, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Precompromiso') ?></legend>
<div id="divGrid"><?php echo form_tag('cpprecom/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>
<input id="fecprc" name="fecprc" type="hidden" value="<? print $cpprecom->getFecprc(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">

  <div class="form-row">
  <?php echo label_for('cpprecom[refprc]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpprecom{refprc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpprecom{refprc}')): ?>
    <?php echo form_error('cpprecom{refprc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpprecom, 'getRefprc', array (
  'size' => 20,
  'control_name' => 'cpprecom[refprc]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpprecom[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpprecom{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpprecom{fecanu}')): ?>
    <?php echo form_error('cpprecom{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cpprecom, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cpprecom[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'cpprecom/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('cpprecom_fecanu').value != ''",
        'with' => "'ajax=1&refprc='+$('refprc').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpprecom[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpprecom{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpprecom{desanu}')): ?>
    <?php echo form_error('cpprecom{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpprecom, 'getdesanu', array (
  'size' => 80,
  'control_name' => 'cpprecom[desanu]',
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
$('cpprecom_refprc').value=$('refer').value;

function salvar(){
  var id='<? print $cpprecom->getId(); ?>';
  var refprc=$('refer').value;
  var desanu=$('cpprecom_desanu').value;
  var fecanu=$('cpprecom_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&desanu='+desanu+'&refprc='+refprc+'&fecanu='+fecanu;
  f.submit();
}


</script>