<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($caordcon, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Contrato') ?></legend>
<div id="divGrid"><?php echo form_tag('almcontratonew/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>

<input id="numcon" name="numcon" type="hidden" value="<? print $caordcon->getNumcon(); ?>">
<input id="feccon" name="feccon" type="hidden" value="<? print $caordcon->getFeccon(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">

  <div class="form-row">
  <?php echo label_for('caordcon[numcon]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcon{numcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcon{numcon}')): ?>
    <?php echo form_error('caordcon{numcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caordcon, 'getNumcon', array (
  'size' => 20,
  'control_name' => 'caordcon[numcon]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('caordcon[fecanu]', __('Fecha de AnulaciÃ³n'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caordcon{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caordcon{fecanu}')): ?>
    <?php echo form_error('caordcon{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($caordcon, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caordcon[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'almcontratonew/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('caordcon_fecanu').value != ''",
        'with' => "'ajax=6&numcon='+$('numcon').value+'&codigo='+this.value"
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
$('caordcon_numcon').value=$('refer').value;

function salvar()
{
  var id='<? print $caordcon->getId(); ?>';
  var numcon=$('numcon').value;
  var fecanu=$('caordcon_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&numcon='+numcon+'&fecanu='+fecanu;
  f.submit();
}
</script>