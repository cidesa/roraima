<?php echo form_tag('tesmovtraban', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php echo javascript_include_tag('ajax','tools','dFilter') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<div id="sf_admin_container">
<input id="reftra" name="reftra" type="hidden" value="<? print $tsmovtra->getReftra(); ?>">
<input id="numcom" name="numcom" type="hidden" value="<? print $tsmovtra->getNumcom(); ?>">
<input id="ctaori" name="ctaori" type="hidden" value="<? print $tsmovtra->getCtaori(); ?>">
<input id="ctades" name="ctades" type="hidden" value="<? print $tsmovtra->getCtades(); ?>">
<input id="movdeb" name="movdeb" type="hidden" value="<? print $tsmovtra->getTipmovdesd(); ?>">
<input id="movcre" name="movcre" type="hidden" value="<? print $tsmovtra->getTipmovhast(); ?>">
<input id="monto" name="monto" type="hidden" value="<? print $tsmovtra->getMontra(); ?>">

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Transferencia a Anular')?></legend>
<div class="form-row">
  <?php echo label_for('tsmovtra[reftraanu]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{reftraanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{reftraanu}')): ?>
    <?php echo form_error('tsmovtra{reftraanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovtra, 'getReftraanu', array (
  'size' => 20,
  'control_name' => 'tsmovtra[reftraanu]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
  <?php echo label_for('tsmovtra[fecanu]', __('Fecha'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{fecanu}')): ?>
    <?php echo form_error('tsmovtra{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsmovtra, 'getfecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsmovtra[fecanu]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

 <?php echo label_for('tsmovtra[numcomanu]', __('Comprobante'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{numcomanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{numcomanu}')): ?>
    <?php echo form_error('tsmovtra{numcomanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovtra, 'getNumcomanu', array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'tsmovtra[numcomanu]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

  <?php echo label_for('tsmovtra[destraanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovtra{destraanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovtra{destraanu}')): ?>
    <?php echo form_error('tsmovtra{destraanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovtra, 'getDestraanu', array (
  'size' => 50,
  'control_name' => 'tsmovtra[destraanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<div align="center">
   <input type="button" value="Salvar" onClick="salvar();">
   <input type="button" value="Cancelar" onClick="self.close();">
</div>
</div>
</fieldset>
</div>
</div>
</form>
<script language="JavaScript" type="text/javascript">
  $('tsmovtra_reftraanu').value="A"+$('reftra').value.substr(1,7);
  $('tsmovtra_numcomanu').value='########';
  $('tsmovtra_destraanu').value='Transferencia Anulada';

function salvar()
{
  var reftra=$('reftra').value;
  var reftra2=$('tsmovtra_reftraanu').value;
  var destra=$('tsmovtra_destraanu').value;
  var ctaori=$('ctaori').value;
  var ctades=$('ctades').value;
  var monto=$('monto').value;
  var fecanu=$('tsmovtra_fecanu').value;
  var movdeb=$('movdeb').value;
  var movcre=$('movcre').value;
  var numcom=$('tsmovtra_numcomanu').value.replace(/#/gi,'*');

  var f=document.sf_admin_edit_form;
  f.action='salvaranu?reftra='+reftra+'&reftra2='+reftra2+'&destra='+destra+'&monto='+monto+'&ctaori='+ctaori+'&ctades='+ctades+'&fecanu='+fecanu+'&movdeb='+movdeb+'&numcom='+numcom+'&movcre='+movcre;
  f.submit();
}
</script>
