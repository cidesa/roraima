<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cireging, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div id="divGrid"><?php echo form_tag('ingreging/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="refing" name="refing" type="hidden" value="<? print $cireging->getRefing(); ?>">
<input id="fecing" name="fecing" type="hidden" value="<? print $cireging->getFecing(); ?>">


  <div class="form-row">
    <?php echo label_for('cireging[refing]', __('Referencia'), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('cireging{refing}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('cireging{refing}')): ?>
      <?php echo form_error('cireging{refing}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_tag($cireging, 'getRefing', array (
    'size' => 10,
    'control_name' => 'cireging[refing]',
    'readonly' => true,
  )); echo $value ? $value : '&nbsp;' ?>
      </div>

<br>

    <?php echo label_for('cireging[fecanu]', __('Fecha'), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('cireging{fecanu}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('cireging{fecanu}')): ?>
      <?php echo form_error('cireging{fecanu}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_date_tag($cireging, 'getFecanu', array (
    'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cireging[fecanu]',
  'date_format' => 'dd/MM/yyyy',
  'size' => 10,
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
 ),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
      </div>

<br>

  <?php echo label_for('label1', __('Motivo Anulación'), 'class="required" ') ?>

  <?php $value = input_tag('desanu', '', array (
  'control_name' => 'desanu',
  'size' => 80,
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>


<br><br><br>
<div align="center">
   <input type="button" value="       Guardar" onClick="salvar();" class='sf_admin_action_save'>
   &nbsp;
   &nbsp;&nbsp;
   <input type="button" onclick="javascript:self.close();" class="sf_admin_action_cancel" value="        Cerrar" name="cerrar"/>

</div>
</div>

</div>
</form>
</fieldset>
</div>
<script type="text/javascript">
<!--
document.getElementById('desanu').focus();
//-->

function salvar()
{
  var refanu = $('cireging_refing').value;
  var fecanu = $('cireging_fecanu').value;
  var desanu = $('desanu').value;
  var fecing = $('fecing').value;

  if ((refanu!='') && (fecanu!='') && (desanu!='')){
    f = document.sf_admin_edit_form;
    f.action = 'salvaranu?refanu='+refanu+'&fecanu='+fecanu+'&fecing='+fecing+'&desanu='+desanu;
    f.submit();
  }else{
    alert('Ante de Continuar, Debe llenar todos los datos');
  }
}

</script>

