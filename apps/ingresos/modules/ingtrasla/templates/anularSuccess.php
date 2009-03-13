<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($citrasla, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div id="divGrid"><?php echo form_tag('ingtrasla/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="reftra" name="reftra" type="hidden" value="<? print $citrasla->getReftra(); ?>">
<input id="fectra" name="fectra" type="hidden" value="<? print $citrasla->getFectra(); ?>">


  <div class="form-row">
    <?php echo label_for('citrasla[reftra]', __('Referencia'), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('citrasla{reftra}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('citrasla{reftra}')): ?>
      <?php echo form_error('citrasla{reftra}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_tag($citrasla, 'getReftra', array (
    'size' => 20,
    'control_name' => 'citrasla[reftra]',
    'readonly' => true,
    //'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('cireging_refing').value=valor; if(document.getElementById('cireging_refing').value==''){document.getElementById('cireging_refing').value=document.getElementById('cireging_refing').value}",
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div>


  <div class="form-row">
    <?php echo label_for('citrasla[fectra]', __('Fecha'), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('citrasla{fectra}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('citrasla{fectra}')): ?>
      <?php echo form_error('citrasla{fectra}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_date_tag($citrasla, 'getFectra', array (
    'rich' => true,
    'calendar_button_img' => '/sf/sf_admin/images/date.png',
    'control_name' => 'citrasla[fectra]',
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
	var refanu=document.getElementById('citrasla_reftra').value;
	var fecanu=document.getElementById('citrasla_fectra').value;
	var desanu=document.getElementById('desanu').value;

	f=document.sf_admin_edit_form;
	f.action='salvaranu?refanu='+refanu+'&fecanu='+fecanu+'&desanu='+desanu;
	f.submit();
}



</script>

