<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($tsmovlib, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div id="divGrid"><?php echo form_tag('tesmovseglib/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="reflib" name="reflib" type="hidden" value="<? print $tsmovlib->getReflib(); ?>">
<input id="refpag" name="refpag" type="hidden" value="<? print $tsmovlib->getRefpag(); ?>">
<input id="feclib" name="feclib" type="hidden" value="<? print $tsmovlib->getFeclib(); ?>">
<input id="numcomadi" name="numcomadi" type="hidden" value="<? print $tsmovlib->getNumcomadi(); ?>">
<input id="feccomadi" name="feccomadi" type="hidden" value="<? print $tsmovlib->getFeccomadi(); ?>">
<input id="compadic" name="comapdic" type="hidden" value="<? print $compadic; ?>">
<input id="fechacom" name="fechacom" type="hidden" value="<? print $tsmovlib->getFeccom(); ?>">
<input id="numcom" name="numcom" type="hidden" value="<? print $tsmovlib->getNumcom(); ?>">

  <div class="form-row">
    <?php echo label_for('tsmovlib[reflib]', __('Referencia'), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('tsmovlib{reflib}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('tsmovlib{reflib}')): ?>
      <?php echo form_error('tsmovlib{reflib}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_tag($tsmovlib, 'getReflib', array (
    'size' => 20,
    'control_name' => 'tsmovlib[reflib]',
    'readonly' => true,
    'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('tsmovlib_reflib').value=valor; if(document.getElementById('tsmovlib_numcom').value==''){document.getElementById('tsmovlib_numcom').value=document.getElementById('tsmovlib_reflib').value}",
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div>


  <div class="form-row">
    <?php echo label_for('tsmovlib[feclib]', __('Fecha'), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('tsmovlib{feclib}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('tsmovlib{feclib}')): ?>
      <?php echo form_error('tsmovlib{feclib}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_date_tag($tsmovlib, 'getFeclib', array (
    'rich' => true,
    'calendar_button_img' => '/sf/sf_admin/images/date.png',
    'control_name' => 'tsmovlib[feclib]',
    'date_format' => 'dd/MM/yy',
    'value'=>date('d/m/Y'),
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div>

<div class="form-row">
  <?php echo label_for('tsmovlib[numcom]', __('Comprobante'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovlib{numcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovlib{numcom}')): ?>
    <?php echo form_error('tsmovlib{numcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovlib, 'getNumcom', array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'tsmovlib[numcom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('label1', __('Motivo Anulación'), 'class="required" ') ?>

  <?php $value = input_tag('desanu', '', array (
  'control_name' => 'desanu',
  'size' => 80,
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<div class="form-row" align="center">
   <input type="button" value="Salvar" onClick="salvar();">
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
	var reflib=document.getElementById('reflib').value;
	var reflib2=document.getElementById('tsmovlib_reflib').value;
	var refpag=document.getElementById('refpag').value;
	var feclib=document.getElementById('feclib').value;
	var fecanu=document.getElementById('tsmovlib_feclib').value;
	var numcom=document.getElementById('tsmovlib_numcom').value;
	var desanu=document.getElementById('desanu').value;
	var numcomadi=document.getElementById('numcomadi').value;
	var feccomadi=document.getElementById('feccomadi').value;
	var compadic=document.getElementById('compadic').value;
	var fechacom=document.getElementById('fechacom').value;
	var numcom=document.getElementById('numcom').value.replace(/#/gi,'*');
	var numcom2=document.getElementById('tsmovlib_numcom').value.replace(/#/gi,'*');
	var id='<? print $tsmovlib->getId(); ?>';
	var numcue='<? print $tsmovlib->getNumcue(); ?>';
	var tipmov='<? print $tsmovlib->getTipmov(); ?>';
	var monmov='<? print $tsmovlib->getMonmov(); ?>';

	f=document.sf_admin_edit_form;
	f.action='salvaranu?reflib='+reflib+'&reflib2='+reflib2+'&refpag='+refpag+'&feclib='+feclib+'&tipmov='+tipmov+'&id='+id+'&numcue='+numcue+'&numcom='+numcom+'&desanu='+desanu+'&monmov='+monmov+'&numcomadi='+numcomadi+'&feccomadi='+feccomadi+'&compadic='+compadic+'&fechacom='+fechacom+'&numcom='+numcom+'&numcom2='+numcom2+'&fecanu='+fecanu;
	f.submit();
}

valor2=document.getElementById('tsmovlib_reflib').value;
mas2=valor2.substr(1,7);
document.getElementById('tsmovlib_reflib').value="A"+mas2;
document.getElementById('tsmovlib_numcom').value="########";


</script>

