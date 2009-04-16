<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($ciadidis, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div id="divGrid"><?php echo form_tag('ingreging/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="refadi" name="refadi" type="hidden" value="<? print $ciadidis->getRefadi(); ?>">
<input id="fecadi" name="fecadi" type="hidden" value="<? print $ciadidis->getFecadi(); ?>">
<input id="adidis" name="adidis" type="hidden" value="<? print $ciadidis->getAdidis(); ?>">


  <div class="form-row">
    <?php echo label_for('ciadidis[refadi]', __('Referencia'), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('ciadidis{refadi}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('ciadidis{refadi}')): ?>
      <?php echo form_error('ciadidis{refadi}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_tag($ciadidis, 'getRefadi', array (
    'size' => 10,
    'control_name' => 'ciadidis[refadi]',
    'readonly' => true,
  )); echo $value ? $value : '&nbsp;' ?>
      </div>

<br>

    <?php echo label_for('ciadidis[fecadi]', __('Fecha'), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('ciadidis{fecadi}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('ciadidis{fecadi}')): ?>
      <?php echo form_error('ciadidis{fecadi}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_date_tag($ciadidis, 'getfecadi', array (
    'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ciadidis[fecadi]',
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

function salvar()
{
  var refanu = $('ciadidis_refadi').value;
  var fecanu = $('ciadidis_fecadi').value;
  var desanu = $('desanu').value;
  var adidis = $('adidis').value;


  if ((refanu!='') && (fecanu!='') && (desanu!='')){
    f = document.sf_admin_edit_form;
    f.action = 'salvaranu?refanu='+refanu+'&fecanu='+fecanu+'&desanu='+desanu+'&adidis='+adidis;
    f.submit();
  }else{
    alert('Ante de Continuar, Debe llenar todos los datos');
  }
}

</script>

