<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cpcausad, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Causado') ?></legend>
<div id="divGrid"><?php echo form_tag('cpcausad/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>
<input id="feccau" name="feccau" type="hidden" value="<? print $cpcausad->getFeccau(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">

  <div class="form-row">
  <?php echo label_for('cpcausad[refcau]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpcausad{refcau}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpcausad{refcau}')): ?>
    <?php echo form_error('cpcausad{refcau}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpcausad, 'getRefcau', array (
  'size' => 20,
  'control_name' => 'cpcausad[refcau]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpcausad[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpcausad{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpcausad{fecanu}')): ?>
    <?php echo form_error('cpcausad{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cpcausad, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cpcausad[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'cpprecom/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('cpcausad_fecanu').value != ''",
        'with' => "'ajax=1&refcau='+$('refcau').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpcausad[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpcausad{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpcausad{desanu}')): ?>
    <?php echo form_error('cpcausad{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpcausad, 'getdesanu', array (
  'size' => 80,
  'control_name' => 'cpcausad[desanu]',
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
$('cpcausad_refcau').value=$('refer').value;

function salvar(){
  var id='<? print $cpcausad->getId(); ?>';
  var refcau=$('refer').value;
  var desanu=$('cpcausad_desanu').value;
  var fecanu=$('cpcausad_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&desanu='+desanu+'&refcau='+refcau+'&fecanu='+fecanu;
  f.submit();
}


</script>