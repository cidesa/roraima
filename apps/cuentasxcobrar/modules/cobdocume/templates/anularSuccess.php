<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cobdocume, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Documentos') ?></legend>
<div id="divGrid">
<?php echo form_tag('cobdocume/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="refdoc" name="refdoc" type="hidden" value="<? print $cobdocume->getRefdoc(); ?>">
<input id="fecemi" name="fecemi" type="hidden" value="<? print $cobdocume->getFecemi(); ?>">
<br>
  <?php echo label_for('cobdocume[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cobdocume{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cobdocume{desanu}')): ?>
    <?php echo form_error('cobdocume{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cobdocume, 'getDesanu', array (
  'size' => 60,
  'control_name' => 'cobdocume[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cobdocume[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cobdocume{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cobdocume{fecanu}')): ?>
    <?php echo form_error('cobdocume{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cobdocume, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cobdocume[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'cobdocume/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('cobdocume_fecanu').value != ''",
        'with' => "'ajax=5&refdoc='+$('refdoc').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>


<div class="form-row" align="center">
   <input type="button" value="Salvar" onClick="salvar();">
   <input type="button" value="Cancelar" onClick="self.close();">
</div>

</form>
</div>
</fieldset>
</div>
<script type="text/javascript">
function salvar()
{
  var id='<? print $cobdocume->getId(); ?>';
  var refdoc=$('refdoc').value;
  var desanu=$('cobdocume_desanu').value;
  var fecanu=$('cobdocume_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&desanu='+desanu+'&refdoc='+refdoc+'&fecanu='+fecanu;
  f.submit();
}
</script>