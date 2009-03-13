<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($ciajuste, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div id="divGrid"><?php echo form_tag('ingajustenew/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="refaju" name="refaju" type="hidden" value="<? print $ciajuste->getRefaju(); ?>">
<input id="fecaju" name="fecaju" type="hidden" value="<? print $ciajuste->getFecaju(); ?>">


  <div class="form-row">
    <?php echo label_for('ciajuste[refaju]', __('Referencia'), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('ciajuste{refaju}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('ciajuste{refaju}')): ?>
      <?php echo form_error('ciajuste{refaju}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_tag($ciajuste, 'getRefaju', array (
    'size' => 20,
    'control_name' => 'ciajuste[refaju]',
    'readonly' => true,
    //'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('cireging_refing').value=valor; if(document.getElementById('cireging_refing').value==''){document.getElementById('cireging_refing').value=document.getElementById('cireging_refing').value}",
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div>


  <div class="form-row">
    <?php echo label_for('ciajuste[fecaju]', __('Fecha'), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('ciajuste{fecaju}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('ciajuste{fecaju}')): ?>
      <?php echo form_error('ciajuste{fecaju}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_date_tag($ciajuste, 'getFecaju', array (
    'rich' => true,
    'calendar_button_img' => '/sf/sf_admin/images/date.png',
    'control_name' => 'ciajuste[fecaju]',
    'date_format' => 'dd/MM/yy',
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
	var refanu=document.getElementById('ciajuste_refaju').value;
	var fecanu=document.getElementById('ciajuste_fecaju').value;
	var desanu=document.getElementById('desanu').value;

	f=document.sf_admin_edit_form;
	f.action='salvaranu?refanu='+refanu+'&fecanu='+fecanu+'&desanu='+desanu;
	f.submit();
}



</script>

