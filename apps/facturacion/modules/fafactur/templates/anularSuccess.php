<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter', 'tools', 'ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($fafactur, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Factura') ?></legend>
<div id="divGrid">
<?php echo form_tag('fafactur/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>

<input id="reffac" name="reffac" type="hidden" value="<? print $fafactur->getReffac(); ?>">
<input id="fecfac" name="fecfac" type="hidden" value="<? print $fafactur->getFecfac(); ?>">
<input id="monfac" name="monfac" type="hidden" value="<? print $fafactur->getMonfac(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">


  <div class="form-row">
  <?php echo label_for('label1', __('Referencia'), 'class="required" ') ?>
  <?php $value = input_tag('refanu', '', array (
  'control_name' => 'refanu',
  'size' => 20,
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>

<br><br>

  <?php echo label_for('fafactur[motanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fafactur{motanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fafactur{motanu}')): ?>
    <?php echo form_error('fafactur{motanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fafactur, 'getMotanu', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'fafactur[motanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br><br>

  <?php echo label_for('fafactur[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fafactur{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fafactur{fecanu}')): ?>
    <?php echo form_error('fafactur{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fafactur, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fafactur[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'fafactur/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('fafactur_fecanu').value != ''",
        'with' => "'ajax=10&reffac='+$('reffac').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
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
$('refanu').value=$('refer').value;
function salvar()
{
  var id='<? print $fafactur->getId(); ?>';
  var reffac=$('reffac').value;
  var fecanu=$('fafactur_fecanu').value;
  var motanu=$('fafactur_motanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&reffac='+reffac+'&motanu='+motanu+'&fecanu='+fecanu;
  f.submit();
}
</script>