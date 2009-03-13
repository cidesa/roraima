<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter', 'tools', 'ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($fanotent, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Nota de Entrega') ?></legend>
<div id="divGrid">
<?php echo form_tag('fanotent/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="nronot" name="nronot" type="hidden" value="<? print $fanotent->getNronot(); ?>">
<input id="fecnot" name="fecnot" type="hidden" value="<? print $fanotent->getFecnot(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">

  <div class="form-row">
  <?php echo label_for('label1', __('Número:'), 'class="required" ') ?>
  <?php $value = input_tag('refanu', '', array (
  'control_name' => 'refanu',
  'size' => 20,
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>

<br><br>

  <?php echo label_for('fanotent[fecanu]', __('Fecha de Anulación:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fanotent{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fanotent{fecanu}')): ?>
    <?php echo form_error('fanotent{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fanotent, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fanotent[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'fanotent/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('fanotent_fecanu').value != ''",
        'with' => "'ajax=5&nronot='+$('nronot').value+'&codigo='+this.value"
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
  var id='<? print $fanotent->getId(); ?>';
  var nronot=$('nronot').value;
  var fecanu=$('fanotent_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&nronot='+nronot+'&fecanu='+fecanu;
  f.submit();
}
</script>